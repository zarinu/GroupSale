<?php

namespace App\Http\Controllers;

use App\Models\GroupSale;
use App\Models\Payment;
use App\Services\WalletService;
use Illuminate\Support\Facades\DB;

class GroupSaleJoinController extends Controller
{
    public function confirm(GroupSale $groupSale)
    {
        abort_if($groupSale->status !== 'active', 404);

        $joined_before = $groupSale->orders()
            ->where('user_id', auth()->id())
            ->exists();

        abort_if($joined_before, 403);

        $participants = $groupSale->orders()
            ->where('payment_status', '!=', 'pending')
            ->count();

        $tier = $groupSale->priceTiers
            ->where('min_buyers', '<=', $participants)
            ->sortByDesc('min_buyers')
            ->first();

        $price = $tier->price;
        $initialAmount = $price * $groupSale->initial_payment_percentage / 100;

        return view('pages.group-sales.confirm', compact(
            'groupSale',
            'price',
            'initialAmount'
        ));
    }

    public function process(
        GroupSale $groupSale,
        WalletService $walletService
    ) {
        abort_if($groupSale->status !== 'active', 404);

        $user = auth()->user();

        $exists = $groupSale->orders()
            ->where('user_id', $user->id)
            ->exists();

        abort_if($exists, 403);

        $participants = $groupSale->orders()
            ->where('payment_status', '!=', 'pending')
            ->count();

        $tier = $groupSale->priceTiers
            ->where('min_buyers', '<=', $participants)
            ->sortByDesc('min_buyers')
            ->first();

        $price = $tier->price;
        $initialAmount = $price * $groupSale->initial_payment_percentage / 100;

        DB::transaction(function () use (
            $groupSale,
            $user,
            $initialAmount,
            $walletService
        ) {
            $order = $groupSale->orders()->create([
                'user_id' => $user->id,
                'initial_price' => $initialAmount,
                'final_price' => 0,
                'payment_status' => 'pending',
                'joined_at' => now(),
            ]);

            if ($user->wallet->balance >= $initialAmount) {
                $walletService->debit(
                    $user,
                    $initialAmount,
                    'پیش پرداخت خرید گروهی',
                    $order,
                );

                $order->update([
                    'amount_paid' => $initialAmount,
                    'payment_status' => 'completed',
                ]);

            } else {
                // در مرحله بعد → زرین پال
//                throw new \Exception('انتقال به درگاه پرداخت');
                dd($this->get_authority($initialAmount, $user));
            }
        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'با موفقیت به کمپین اضافه شدید');
    }

    private function get_authority($total_price, $user): array
    {
        $post_data = [
            "merchant_id" => "25c38aed-b2f9-4a4c-a14d-020fc198db21",
            "amount" => $total_price,
            "currency" => "IRT",
            "callback_url" => url("panel/payments/verify"),
            "description" => "توضیحات تراکنش درگاه بانکی زرین پال",
            "metadata" => [
                "email" => $user->email,
            ],
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zarinpal.com/pg/v4/payment/request.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($post_data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $result = curl_exec($curl);
        $err = curl_error($curl);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($curl);

        if ($err) {
            return [
                'status' => 'failed',
                'message' => "cURL Error #:" . $err,
            ];
        } else {
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
                    return [
                        'status' => 'success',
                        'authority' => $result['data']["authority"],
                    ];
                }
            } else {
                return [
                    'status' => 'failed',
                    'message' => 'Error Code: ' . $result['errors']['code'] . ' ' . $result['errors']['message'],
                ];
            }
        }

        return [
            'status' => 'failed',
            'message' => "خطایی نامعلوم رخ داده است.",
        ];
    }
}
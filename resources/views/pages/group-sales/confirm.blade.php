@extends('layouts.app')

@section('title', 'تأیید شرکت در خرید گروهی')

@section('content')
    <!-- MAIN -->
    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div>
                <div class="text-lg md:text-xl opacity-70 mb-3 mt-5">
                    جزئیات محصول پیش پرداخت
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 lg:px-16">
                    <span class="card swiper-slide my-2 p-2 md:p-3 ">
                        <div class="image-box mb-6 ">
                          <a href="">
                            <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/1.jpg') }}" alt="" />
                          </a>
                        </div>
                        <div class="space-y-3 text-center">
                          <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                            <a href="">
                              {{ $groupSale->product->title }}
                            </a>
                          </span>
                          <div class="flex justify-center text-xs opacity-75">
                            <div class="line-through">{{ number_format($groupSale->current_price) }}</div>
                            <div class="line-through">تومان</div>
                          </div>
                          <div class="flex justify-center mt-1 mb-2 text-sm">
                            <div>{{ number_format($price) }}</div>
                            <div>تومان</div>
                          </div>
                        </div>
                    </span>
                </div>
            </div>
            <p class="text-sm mb-4">
                با شرکت در این خرید گروهی متعهد می‌شوید در صورت نهایی شدن کمپین،
                مابقی مبلغ را پرداخت نمایید.
            </p>
            <div class="border shadow-xl rounded-2xl mx-auto max-w-xl mt-7 flex flex-col gap-y-5 py-5 px-5 md:px-20">
                <div class="flex justify-between">
                    <div>
                        قیمت اصلی:
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ number_format($groupSale->current_price) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        قیمت در فروش گروهی:
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ number_format($price) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        مبلغ پیش پرداخت:
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ number_format($initialAmount) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="text-red-600">
                        مبلغ قابل پرداخت فعلی:
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ number_format($initialAmount) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('group-sales.process', $groupSale) }}">
                @csrf
                <div class="bg-white rounded-2xl shadow p-4 md:p-6 mt-6">
                    <h3 class="text-sm font-semibold opacity-80 mb-4">
                        انتخاب روش پرداخت
                    </h3>

                    {{-- Wallet --}}
                    @php
                        $walletEnough = auth()->user()->wallet->balance >= $initialAmount;
                    @endphp

                    <label
                            class="flex items-center justify-between p-4 border rounded-xl mb-3
        {{ $walletEnough ? 'cursor-pointer hover:border-red-400' : 'opacity-50 cursor-not-allowed' }}"
                    >
                        <div class="flex items-center gap-x-3">
                            <input
                                    type="radio"
                                    name="payment_method"
                                    value="wallet"
                                    class="accent-red-500"
                                    {{ $walletEnough ? '' : 'disabled' }}
                            >
                            <div class="text-sm">
                                پرداخت با کیف پول
                                <div class="text-xs opacity-60 mt-1">
                                    موجودی: {{ number_format(auth()->user()->wallet->balance) }} تومان
                                </div>
                            </div>
                        </div>

                        @unless($walletEnough)
                            <span class="text-xs text-red-500">
                موجودی کافی نیست
            </span>
                        @endunless
                    </label>

                    {{-- Zarinpal --}}
                    <label
                            class="flex items-center justify-between p-4 border rounded-xl cursor-pointer hover:border-red-400"
                    >
                        <div class="flex items-center gap-x-3">
                            <input
                                    type="radio"
                                    name="payment_method"
                                    value="gateway"
                                    class="accent-red-500"
                                    checked
                            >
                            <div class="text-sm">
                                پرداخت از طریق درگاه زرین‌پال
                                <div class="text-xs opacity-60 mt-1">
                                    پرداخت آنلاین امن
                                </div>
                            </div>
                        </div>

                        <img
                                src="{{ asset('assets/images/others/zarinpal-logo.svg') }}"
                                class="w-20 opacity-80"
                                alt="zarinpal"
                        >
                    </label>
                </div>

                <span class="flex justify-center items-center opacity-90 my-5">
                    <button class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm">
                        پرداخت و شرکت در کمپین
                    </button>
                </span>
            </form>
        </div>
    </div>
@endsection

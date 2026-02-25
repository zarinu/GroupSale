<?php

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariant;

new class extends Component
{
    public $product;
    public $variants = [];

    protected $rules = [
        'variants.*.name' => 'required|string|max:255',
        'variants.*.price' => 'required|numeric',
    ];

    public function mount($product)
    {
        $this->product = $product;
        if ($product) {
            $this->variants = $product->variants->map(function($v){
                return ['id' => $v->id, 'name' => $v->name, 'price' => $v->price];
            })->toArray();
        }
    }

    public function addVariant()
    {
        $this->variants[] = ['id' => null, 'name' => '', 'price' => ''];
    }

    public function removeVariant($index)
    {
        if(isset($this->variants[$index]['id']) && $this->variants[$index]['id']){
            ProductVariant::find($this->variants[$index]['id'])->delete();
        }
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function save()
    {
        $this->validate();

        foreach($this->variants as $v){
            if(isset($v['id']) && $v['id']){
                ProductVariant::find($v['id'])->update([
                    'name' => $v['name'],
                    'price' => $v['price'],
                ]);
            } else {
                $this->product->variants()->create([
                    'name' => $v['name'],
                    'price' => $v['price'],
                ]);
            }
        }

        session()->flash('message', 'Variants ذخیره شد');
    }
};
?>

<div>
    {{-- Because you are alive, everything is possible. - Thich Nhat Hanh --}}
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>نام Variant</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($variants as $index => $variant)
                <tr>
                    <td><input type="text" class="form-control" wire:model.defer="variants.{{ $index }}.name"></td>
                    <td><input type="text" class="form-control" wire:model.defer="variants.{{ $index }}.price"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="removeVariant({{ $index }})">حذف</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-success" wire:click="addVariant">اضافه کردن Variant</button>
        <button type="button" class="btn btn-primary mt-2" wire:click="save">ذخیره Variants</button>
    </div>
</div>
<?php

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductAttributeVa;

new class extends Component
{
//    public $product;
//    public $product_attributes = [];
//
//    protected $rules = [
//        'attributes.*.name' => 'required|string|max:255',
//        'attributes.*.value' => 'required|string|max:255',
//    ];
//
//    public function mount($product)
//    {
//        $this->product = $product;
//        if($product){
//            $this->product_attributes = $product->attributes->map(function($a){
//                return ['id'=>$a->id,'name'=>$a->name,'value'=>$a->value];
//            })->toArray();
//        }
//    }
//
//    public function addAttribute()
//    {
//        $this->product_attributes[] = ['id'=>null,'name'=>'','value'=>''];
//    }
//
//    public function removeAttribute($index)
//    {
//        if(isset($this->product_attributes[$index]['id']) && $this->product_attributes[$index]['id']){
//            ProductAttribute::find($this->product_attributes[$index]['id'])->delete();
//        }
//        unset($this->product_attributes[$index]);
//        $this->product_attributes = array_values($this->product_attributes);
//    }
//
//    public function save()
//    {
//        $this->validate();
//
//        foreach($this->product_attributes as $a){
//            if(isset($a['id']) && $a['id']){
//                ProductAttribute::find($a['id'])->update([
//                    'name'=>$a['name'],
//                    'value'=>$a['value'],
//                ]);
//            } else {
//                $this->product->attributes()->create([
//                    'name'=>$a['name'],
//                    'value'=>$a['value'],
//                ]);
//            }
//        }
//
//        session()->flash('message','ویژگی‌ها ذخیره شد');
//    }
};
?>

<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>نام ویژگی</th>
            <th>مقدار</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach($attributes as $index => $attribute)--}}
{{--            <tr>--}}
{{--                <td><input type="text" class="form-control" wire:model.defer="attributes.{{ $index }}.name"></td>--}}
{{--                <td><input type="text" class="form-control" wire:model.defer="attributes.{{ $index }}.value"></td>--}}
{{--                <td>--}}
{{--                    <button type="button" class="btn btn-danger btn-sm" wire:click="removeAttribute({{ $index }})">حذف</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
        </tbody>
    </table>

    <button type="button" class="btn btn-success" wire:click="addAttribute">اضافه کردن ویژگی</button>
    <button type="button" class="btn btn-primary mt-2" wire:click="save">ذخیره ویژگی‌ها</button>
</div>
{{-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius --}}
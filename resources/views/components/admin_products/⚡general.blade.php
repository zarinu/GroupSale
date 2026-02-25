<?php

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

new class extends Component
{
    public $product;
    public $categories;
    public $name, $en_name, $slug, $short_description, $price, $status, $description, $category_id,
        $is_active, $is_featured, $is_group_buy, $sale_price, $stock, $track_stock;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'en_name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'short_description' => 'nullable|string|max:511',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'is_active' => 'nullable',
        'is_featured' => 'nullable',
        'is_group_buy' => 'nullable',
        'sale_price' => 'nullable|numeric',
        'stock' => 'nullable|numeric',
        'track_stock' => 'nullable',
    ];

    public function mount($product = null)
    {
        if ($product) {
            $this->product = $product;
            $this->name = $product->name;
            $this->en_name = $product->en_name;
            $this->slug = $product->slug;
            $this->short_description = $product->short_description;
            $this->price = $product->price;
            $this->status = $product->status;
            $this->description = $product->description;
            $this->category_id = $product->category_id;
            $this->is_active = $product->is_active;
            $this->is_featured = $product->is_featured;
            $this->is_group_buy = $product->is_group_buy;
            $this->sale_price = $product->sale_price;
            $this->stock = $product->stock;
            $this->track_stock = $product->track_stock;
        }
        $this->categories = Category::tree()->get();
    }

    public function save()
    {
        $this->is_active = $this->is_active ? 1 : 0;
        $this->is_featured = $this->is_featured ? 1 : 0;
        $this->is_group_buy = $this->is_group_buy ? 1 : 0;
        $this->track_stock = $this->track_stock ? 1 : 0;

        $validated = $this->validate();

        if ($this->product) {
            $this->product->fill($validated);
            $this->product->save();

        } else {
            $this->product = Product::create([
                'name' => $this->name,
                'en_name' => $this->en_name,
                'slug' => $this->slug,
                'short_description' => $this->short_description,
                'price' => $this->price,
                'status' => $this->status,
                'description' => $this->description,
                'is_active' => $this->is_active,
                'is_featured' => $this->is_featured,
                'is_group_buy' => $this->is_group_buy,
                'sale_price' => $this->sale_price,
                'stock' => $this->stock,
                'track_stock' => $this->track_stock,
            ]);
        }

        session()->flash('message', 'مشخصات کلی ذخیره شد');
    }
};
?>

<div class="card-body">
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="row mb-2">

        <div class="col-sm-4">
            <div class="form-group">
                <label for="category_id" class="control-label mr-2">دسته بندی</label>
                <select class="form-control @error('category_id') is-invalid @enderror"
                        id="category_id"
                        wire:model="category_id">

                    <option value="">انتخاب کنید</option>

                    @include('components.category-option', [
                        'categories' => $categories,
                        'level' => 0
                    ])

                </select>
                @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="name" class="control-label mr-2">نام محصول</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.defer="name">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="en_name" class="control-label mr-2">نام انگلیسی</label>
                <input type="text" class="form-control @error('en_name') is-invalid @enderror" id="en_name" wire:model.defer="en_name">
                @error('en_name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="slug" class="control-label mr-2">slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" wire:model.defer="slug">
                @error('slug')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="short_description" class="control-label mr-2">توضیحات کوتاه</label>
                <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" wire:model.defer="short_description">
                @error('short_description')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description-editor" class="control-label mr-2">توضیحات</label>
                <textarea class="form-control" id="description-editor" style="width: 100%" wire:model.defer="description"></textarea>
            </div>
            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="is_active" class="control-label mr-2">وضعیت محصول</label>
{{--                <input type="checkbox" @if($is_active) checked @endif id="is_active" data-toggle="toggle" data-on="فعال" data-off="غیر فعال" data-onstyle="success" data-offstyle="danger" wire:model.defer="is_active">--}}
                <input type="checkbox" id="is_active" wire:model="is_active">
                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="is_group_buy" class="control-label mr-2">اجازه فروش گروهی</label>
{{--                <input type="checkbox" @if($is_group_buy) checked @endif id="is_group_buy" data-toggle="toggle" data-on="دارد" data-off="ندارد" data-onstyle="success" data-offstyle="danger" wire:model="is_group_buy">--}}
                <input type="checkbox" id="is_group_buy" wire:model="is_group_buy">
                @error('is_group_buy')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="is_featured" class="control-label mr-2">محصول ویژه</label>
{{--                <input type="checkbox" @if($is_featured) checked @endif id="is_featured" data-toggle="toggle" data-on="هست" data-off="نیست" data-onstyle="success" data-offstyle="danger" wire:model.defer="is_featured">--}}
                <input type="checkbox" id="is_featured" wire:model="is_featured">
                @error('is_featured')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="track_stock" class="control-label mr-2" data-toggle="tooltip" title="محصول میتونه موجودی داشته باشه؟ یا مجازیه مثل یک دوره آنلاین و اصلا موجودی نداره؟">کنترل موجودی</label>
{{--                <input type="checkbox" @if($track_stock) checked @endif id="track_stock" data-toggle="toggle" data-on="آره" data-off="نه" data-onstyle="success" data-offstyle="danger" wire:model.defer="track_stock">--}}
                <input type="checkbox" id="track_stock" wire:model="track_stock">
                @error('track_stock')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="price" class="control-label mr-2">قیمت</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.defer="price">
                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="sale_price" class="control-label mr-2">قیمت تخفیفی</label>
                <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" wire:model.defer="sale_price">
                @error('sale_price')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="stock" class="control-label mr-2">موجودی کلی</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" wire:model.defer="stock">
                @error('stock')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

    </div>

    <button wire:click="save" class="btn btn-primary mt-2">ذخیره مشخصات کلی</button>
</div>
<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

new class extends Component
{
    use WithFileUploads;

    public $product;
    public $cover;
    public $gallery = [];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function save()
    {
        // Cover
        if ($this->cover) {
            $coverPath = $this->cover->store('products', 'public');
            $this->product->update(['cover' => $coverPath]);
        }

        // Gallery
        foreach ($this->gallery as $image) {
            $path = $image->store('products/gallery', 'public');
            $this->product->images()->create(['path' => $path]);
        }

        session()->flash('message', 'عکس‌ها ذخیره شد');
        $this->reset(['cover', 'gallery']);
    }
};
?>


<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="form-group">
        <label>عکس شاخص</label>
        <input type="file" wire:model="cover">
        @error('cover') <span class="text-danger">{{ $message }}</span> @enderror
        @if($product && $product->cover)
            <img src="{{ asset('storage/' . $product->cover) }}" width="150" class="mt-2">
        @endif
    </div>

    <div class="form-group">
        <label>گالری تصاویر</label>
        <input type="file" wire:model="gallery" multiple>
        @error('gallery.*') <span class="text-danger">{{ $message }}</span> @enderror
        @if($product && $product->images)
            <div class="mt-2">
                @foreach($product->images as $img)
                    <img src="{{ asset('storage/' . $img->path) }}" width="100" class="mr-1 mb-1">
                @endforeach
            </div>
        @endif
    </div>

    <button wire:click="save" class="btn btn-primary mt-2">ذخیره عکس‌ها</button>
</div>
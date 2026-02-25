@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">ویرایش محصول: {{ $product->name }}</h1>

        <div>
            <ul class="flex border-b mb-4">
                <li class="-mb-px mr-1">
                    <a class="tab-link bg-white inline-block py-2 px-4 font-semibold cursor-pointer border-l border-t border-r rounded-t" data-tab="general">جزئیات اصلی</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="tab-link bg-white inline-block py-2 px-4 font-semibold cursor-pointer border-l border-t border-r rounded-t" data-tab="images">تصاویر</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="tab-link bg-white inline-block py-2 px-4 font-semibold cursor-pointer border-l border-t border-r rounded-t" data-tab="pricing">قیمت‌ها</a>
                </li>
                <li class="-mb-px">
                    <a class="tab-link bg-white inline-block py-2 px-4 font-semibold cursor-pointer border-l border-t border-r rounded-t" data-tab="features">ویژگی‌ها</a>
                </li>
            </ul>

            <div id="tabs">
                <div class="tab-content" id="general">
                    @livewire('admin_products.general', ['product' => $product])
                </div>

                <div class="tab-content hidden" id="images">
                    @livewire('admin_products.images', ['product' => $product])
                </div>

                <div class="tab-content hidden" id="pricing">
                    @livewire('admin_products.variants', ['product' => $product])
                </div>

                <div class="tab-content hidden" id="features">
                    @livewire('admin_products.attributes', ['product' => $product])
                </div>
            </div>
        </div>
    </div>

    <script>
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-tab');

                contents.forEach(c => c.classList.add('hidden'));
                document.getElementById(target).classList.remove('hidden');

                tabs.forEach(t => t.classList.remove('border-b-0', 'font-bold'));
                tab.classList.add('border-b-0', 'font-bold');
            });
        });
    </script>
@endsection
@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <!-- MAIN -->
    <div class="max-w-[1440px] mx-auto px-3">

        @include('layouts.partials.breadcrumb', ['breadcrumbs' => $breadcrumbs])

        <div class="bg-white shadow-xl my-5 md:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="p-3 w-11/12 mx-auto rounded-2xl">
                <div class="lg:flex">
                    <div class="w-full lg:w-1/3">
                        <div>
              <span class="flex items-center pr-20 pb-2">
                <img onclick="showAlertAddTocomparison()" class="w-6 ml-2 cursor-pointer" src="{{ asset('assets/images/others/comparison.png') }}" alt="" title="مقایسه">
                <svg
                        onclick="showAlertAddToFavorit()"
                        class="h-7 w-7 text-red-500 hover:text-red-600 fill-current transition cursor-pointer inline"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                  <path
                          d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"></path>
                </svg>
              </span>
                        </div>
                        <div>
                            <div class="max-w-[300px] mx-auto">
                                <img class="mySlides rounded-xl md:rounded-3xl" src="{{ asset('assets/images/productSlider/1.jpg') }}" style="width:100%">
                                <img class="mySlides rounded-xl md:rounded-3xl" src="{{ asset('assets/images/productSlider/2.jpg') }}" style="width:100%;display:none">
                                <img class="mySlides rounded-xl md:rounded-3xl" src="{{ asset('assets/images/productSlider/3.jpg') }}" style="width:100%;display:none">
                                <img class="mySlides rounded-xl md:rounded-3xl" src="{{ asset('assets/images/productSlider/4.jpg') }}" style="width:100%;display:none">
                            </div>
                            <div class="flex justify-around gap-x-4 mt-3">
                                <div class="max-w-[80px]">
                                    <img class="rounded-xl opacity-70 hover:opacity-100 transition" src="{{ asset('assets/images/productSlider/1.jpg') }}" onclick="currentDiv(1)">
                                </div>
                                <div class="max-w-[80px]">
                                    <img class="rounded-xl opacity-70 hover:opacity-100 transition" src="{{ asset('assets/images/productSlider/2.jpg') }}" onclick="currentDiv(2)">
                                </div>
                                <div class="max-w-[80px]">
                                    <img class="rounded-xl opacity-70 hover:opacity-100 transition" src="{{ asset('assets/images/productSlider/3.jpg') }}" onclick="currentDiv(3)">
                                </div>
                                <div class="max-w-[80px]">
                                    <img class="rounded-xl opacity-70 hover:opacity-100 transition" src="{{ asset('assets/images/productSlider/4.jpg') }}" onclick="currentDiv(4)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-2/3 mt-5 md:mt-0">
                        <div class="opacity-80 text-lg font-semibold">
                            {{ $product->name }}
                        </div>
                        <div class="opacity-50 text-xs mt-2 mb-4">
                            {{ $product->en_name }}
                        </div>
                        <div class="md:flex sm:pr-7">
                            <div class="md:w-1/2">
                                <div>
                                    <div class="mt-4 mb-2 opacity-80 text-sm font-semibold">
                                        ویژگی های محصول:
                                    </div>
                                    <div class="flex flex-col gap-y-2 text-xs">
                                        @foreach($product->attributeValues as $attrValue)
                                            <div class=" flex items-center">
                                                <h3 class="opacity-60 ml-1">
                                                    {{ $attrValue->attribute->name }}:
                                                </h3>
                                                <div class="opacity-80">
                                                    <div class="text-right">
                                                        {{ $attrValue->value }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-1/2 mt-5 md:mt-0">
                                <div class="pb-5 rounded-2xl shadow-xl border">
                                    <div class="px-3 py-5">
                                        <div class="border border-gray-300 rounded-xl p-4 shadow-sm bg-white">
                                            <p class="text-center text-sm opacity-7 bg-red-100 px-2 py-2 rounded-2xl">
                                                برای مشاهده قیمت و فروش گروهی، لطفاً مشخصات محصول را انتخاب کنید.
                                            </p>

                                            <form method="GET" action="{{ route('products.show', $product->slug) }}">
                                                @foreach ($variantAttributeGroups as $attributeId => $attributeValues)
                                                    @php
                                                        $attribute = \App\Models\Attribute::find($attributeId);
                                                    @endphp

                                                    <div class="variant-attribute">
                                                        <label for="{{ $attribute->code }}" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">
                                                            {{ $attribute->name }}
                                                        </label>

                                                        @if($attribute->type == 'color')
                                                            <div class="flex items-center">
                                                                <div class="flex flex-wrap">
                                                                    <div class="flex items-center gap-x-2">
                                                                        <div class="flex w-max">
                                                                            @foreach ($attributeValues as $value)
                                                                                <div class="inline-flex items-center">
                                                                                    <label
                                                                                            class="relative flex cursor-pointer items-center rounded-full p-3"
                                                                                            for="{{ $attribute->code }}"
                                                                                    >
                                                                                        <input
                                                                                                id="{{ $attribute->code }}"
                                                                                                name="{{ $attribute->code }}"
                                                                                                value="{{ $value->slug }}"
                                                                                                type="radio"
                                                                                                class="before:content[''] peer relative h-7 w-7 cursor-pointer appearance-none rounded-full border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity hover:before:opacity-10"
                                                                                                style="background-color: {{ $value->slug }}; color: {{ $value->slug }};"
                                                                                                {{  ((request()->query($attribute->code)) && request()->query($attribute->code) === $value->slug) ? 'checked' : '' }}
                                                                                        />
                                                                                        <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 opacity-0 transition-opacity peer-checked:opacity-100">
                                                                                            <svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    class="h-3.5 w-3.5"
                                                                                                    viewBox="0 0 16 16"
                                                                                                    fill="currentColor"
                                                                                            >
                                                                                                <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                                                                            </svg>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <select name="{{ $attribute->code }}" id="{{ $attribute->code }}" required class="text-sm block w-full appearance-none rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all">
                                                                <option value="">انتخاب کنید</option>
                                                                @foreach ($attributeValues as $value)
                                                                    <option value="{{ $value->slug }}" {{  ((request()->query($attribute->code)) && request()->query($attribute->code) === $value->slug) ? 'selected' : '' }}>
                                                                        {{ $value->value }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                @endforeach

                                                <span class="flex justify-center items-center opacity-90 py-3">
                                                <button type="submit" class="px-7 py-2 text-center text-black bg-gray-200 align-middle border-0 rounded-lg shadow-md text-sm">
                                                    اعمال
                                                </button>
                                            </span>
                                            </form>
                                        </div>

                                        @if($firstOrNot == 'not')
                                            @if($variant)
                                                <div class="my-3">
                                                    <strong>اطلاعات نوع محصول</strong>
                                                    <div class="flex justify-between items-start px-3 py-5">
                                                        <div class="text-right opacity-80 text-sm flex flex-col gap-y-6">
                                                            <div>
                                                                sku:
                                                            </div>
                                                            <div>
                                                                قیمت:
                                                            </div>
                                                            <div>
                                                                موجود در انبار:
                                                            </div>
                                                        </div>
                                                        <div class="text-left opacity-70 text-sm flex flex-col gap-y-6">
                                                            <div>
                                                                {{ $variant->sku }}
                                                            </div>
                                                            <div>
                                                                {{ number_format($variant->price) }} تومان
                                                            </div>
                                                            <div>
                                                                {{ $variant->stock }} عدد
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($groupSale)
                                                    <hr>
                                                    <div class="my-3">
                                                        <strong>اطلاعات کمپین فروش گروهی</strong>

                                                        <div class="flex justify-between items-start px-3 py-5">
                                                            <div class="text-right opacity-80 text-sm flex flex-col gap-y-6">
                                                                <div>
                                                                    تعداد شرکت کنندگان تا به حال:
                                                                </div>
                                                                <div>
                                                                    آخرین قیمت:
                                                                </div>
                                                                <div>
                                                                    مبلغ پیش پرداخت:
                                                                </div>
                                                            </div>
                                                            <div class="text-left opacity-70 text-sm flex flex-col gap-y-6">
                                                                <div>
                                                                    {{ $groupSale->current_participants }}
                                                                </div>
                                                                <div>
                                                                    {{ number_format($groupSale->current_price) }} تومان
                                                                </div>
                                                                <div>
                                                                    {{ number_format(($groupSale->current_price) * $groupSale->initial_payment_percentage / 100) }}تومان
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- The Timer--}}
                                                    @php $groupSaleEnd = $groupSale->ends_at->timestamp * 1000 @endphp
                                                    <div class="max-w-md mx-auto mt-6 border border-gray-300 rounded-xl p-4 shadow-sm bg-white">
                                                        <!-- عنوان تایمر -->
                                                        <div class="text-center mb-2 text-gray-700 font-medium">
                                                            زمان باقی‌مانده تا پایان فروش گروهی
                                                        </div>
                                                        <div
                                                                id="countdown"
                                                                data-end-time="{{ $groupSaleEnd }}"
                                                                class="flex gap-4 justify-center items-center mt-6"
                                                        >
                                                            <div class="bg-gray-900 text-white rounded-xl px-4 py-3 text-center w-20">
                                                                <div id="days" class="text-2xl font-bold">0</div>
                                                                <div class="text-xs text-gray-300">Days</div>
                                                            </div>

                                                            <div class="bg-gray-900 text-white rounded-xl px-4 py-3 text-center w-20">
                                                                <div id="hours" class="text-2xl font-bold">0</div>
                                                                <div class="text-xs text-gray-300">Hours</div>
                                                            </div>

                                                            <div class="bg-gray-900 text-white rounded-xl px-4 py-3 text-center w-20">
                                                                <div id="minutes" class="text-2xl font-bold">0</div>
                                                                <div class="text-xs text-gray-300">Min</div>
                                                            </div>

                                                            <div class="bg-red-600 text-white rounded-xl px-4 py-3 text-center w-20">
                                                                <div id="seconds" class="text-2xl font-bold">0</div>
                                                                <div class="text-xs text-red-200">Sec</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if(!$joined)
                                                        <form method="POST" action="{{ route('group-sales.join', $groupSale) }}">
                                                            @csrf

                                                            {{-- تعداد --}}
                                                            <div class="flex justify-between items-start px-3 py-5">
                                                                <div class="text-right opacity-80 text-sm flex flex-col gap-y-6">
                                                                    <p>انتخاب تعداد:</p>
                                                                </div>
                                                                <div class="text-left opacity-70 text-sm flex flex-col gap-y-6">
                                                                    <div class="quantity flex items-center">
                                                                        <label>
                                                                            <input class="w-20 h-7 mx-2 text-center border focus:outline-none rounded-lg" type="number" min="1" step="1" value="1" readonly>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- The Price Tiers--}}
                                                            <div class="my-2 max-w-md mx-auto bg-blue-100 rounded-xl shadow-lg p-6 text-center">
                                                                <!-- عنوان اصلی -->
                                                                <h2 class="text-2xl font-bold text-blue-900 mb-2">تخفیف خرید گروهی</h2>
                                                                <p class="text-blue-800 mb-6">به تعداد بیشتر، قیمت کمتر!</p>

                                                                <!-- Price Tiers -->
                                                                <div class="space-y-4">
                                                                    @foreach($priceTiers as $tier)
                                                                        <div class="relative p-4 {{$tier['is_active'] ? 'bg-yellow-400' : 'bg-gray-300'}} rounded-lg">
                                                                            <div class="text-gray-700 font-bold">{{$tier['min_buyers']}} نفر → {{number_format($tier['price'])}} تومان</div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>

                                                                <!-- Call to Action -->
                                                                <button type="submit" class="mt-6 px-6 py-3 bg-orange-500 text-white font-bold rounded-lg hover:bg-orange-600 transition">
                                                                    همین حالا همراه شوید!
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="text-center text-green-600 text-sm">
                                                            شما در این کمپین شرکت کرده‌اید
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="text-center text-sm opacity-70">
                                                        این محصول کمپین فروش فعالی ندارد
                                                    </div>
                                                @endif
                                            @else
                                                <p class="text-center text-sm opacity-70">
                                                    نوع محصولی با این ویژگی ها یافت نشد.
                                                </p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around my-5">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('assets/images/services/cash-on-delivery.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            پرداخت در محل
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('assets/images/services/days-return.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            قابل برگشت
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('assets/images/services/express-delivery.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            ارسال سریع
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('assets/images/services/original-products.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            ضمانت کالا
                        </div>
                    </div>
                </div>
                <!-- TABS -->
                <div class="mx-auto">
                    <div class="border-b border-gray-200 mb-4">
                        <ul class="flex justify-center flex-wrap -mb-px text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2" id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">درباره محصول</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 active" id="test-tab" data-tabs-target="#test" type="button" role="tab" aria-controls="test" aria-selected="true">بررسی تخصصی</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2" id="details-tab" data-tabs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">مشخصات</button>
                            </li>
                            <li role="presentation">
                                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2" id="commentsBuy-tab" data-tabs-target="#commentsBuy" type="button" role="tab" aria-controls="commentsBuy" aria-selected="false">دیدگاه ها</button>
                            </li>
                            <li role="presentation">
                                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2" id="comments-tab" data-tabs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">پرسش ها</button>
                            </li>
                        </ul>
                    </div>
                    <div id="myTabContent">
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="about" role="tabpanel" aria-labelledby="about-tab">
              <span class="border-b-red-500 border-b">
                معرفی کوتاه محصول
              </span>
                            <p class="text-gray-500 text-sm leading-7 mt-3">
                                {!! $product->short_description !!}
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl" id="test" role="tabpanel" aria-labelledby="test-tab">
                            <div class="flex flex-col items-start gap-y-4">
                                <span class="border-b-red-500 border-b">
                                  بررسی تخصصی محصول
                                </span>
                            </div>
                            <div class="md:flex gap-3">
                                <p class="text-gray-500 text-sm leading-7 mt-3">
                                    {!! $product->description !!}
                                </p>
                                {{--                                <img class="max-w-[320px] w-full mx-auto rounded-3xl" src="{{ asset('assets/images/product/good.jpg') }}" alt="">--}}
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <span class="border-b-red-500 border-b">
                                مشخصات فنی محصول
                            </span>
                            <div class="text-gray-500 text-sm grid grid-cols-1 gap-x-3 md:grid-cols-2">
                                @foreach($product->attributeValues as $attrValue)
                                    <div class="flex items-center justify-between bg-gray-100 p-3 w-full my-3 mx-auto rounded-xl">
                                        <div class="text-xs opacity-80">
                                            {{ $attrValue->attribute->name }}:
                                        </div>
                                        <div class="text-xs opacity-70">
                                            {{ $attrValue->value }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="commentsBuy" role="tabpanel" aria-labelledby="commentsBuy-tab">
              <span class="border-b-red-500 border-b">
                دیدگاه های محصول
              </span>
                            <div class="text-gray-500 text-sm">
                                <div class="flex flex-col py-4 px-4 mx-auto my-6 max-w-7xl rounded-2xl bg-white">
                                    <!-- UO COMMENTS -->
                                    <div>
                                        <div>دیدگاه ها</div>
                                        <div class="opacity-70 text-xs">{{count($product->reviews)}} دیدگاه</div>
                                    </div>
                                    @foreach($product->reviews as $review)
                                        <!-- COMMENT -->
                                        <div class="bg-gray-50 rounded-xl px-3 sm:px-5 py-3 my-2">
                                            <div class="flex flex-col items-stat gap-y-2">
                                                <div class="flex items-center">
                                                    <div class="text-green-400 bg-green-100 px-1 rounded-md text-sm">
                                                        {{$review->rating}}
                                                    </div>
                                                    <div class="text-xs opacity-60 pr-1">
                                                        ارسال شده توسط {{$review->name}}
                                                    </div>
                                                    <div class="text-xs opacity-60 pr-1">
                                                        {{$review->created_at}}
                                                    </div>
                                                </div>
                                                <span class="text-{{$review->is_recommended ? 'green' : 'red'}}-400 bg-{{$review->is_recommended ? 'green' : 'red'}}-100 px-1 w-24 rounded-md text-sm text-center">
                                                    {{$review->is_recommended ? 'پیشنهاد شده' : 'پیشنهاد نشده'}}
                                                </span>
                                            </div>
                                            <div>
                                                <div class="opacity-60 text-sm py-3">
                                                    {{$review->comment}}
                                                </div>
                                                <div class="flex flex-col gap-y-2">
                                                    @foreach($review->points as $point)
                                                        <div class="flex text-{{$point->is_positive ? 'green' : 'red'}}-400 text-xs">
                                                            <div>
                                                                {{$point->is_positive ? '+' : '-'}}
                                                            </div>
                                                            <div>
                                                                {{$point->title}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="flex gap-x-4 justify-end">
                                                <a href="" class="flex">
                                                    <span>{{$review->likes}}</span>
                                                    <svg class="hover:fill-green-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#797979" viewBox="0 0 256 256">
                                                        <path d="M232.49,81.44A22,22,0,0,0,216,74H158V56a38,38,0,0,0-38-38,6,6,0,0,0-5.37,3.32L76.29,98H32a14,14,0,0,0-14,14v88a14,14,0,0,0,14,14H204a22,22,0,0,0,21.83-19.27l12-96A22,22,0,0,0,232.49,81.44ZM30,200V112a2,2,0,0,1,2-2H74v92H32A2,2,0,0,1,30,200ZM225.92,97.24l-12,96A10,10,0,0,1,204,202H86V105.42l37.58-75.17A26,26,0,0,1,146,56V80a6,6,0,0,0,6,6h64a10,10,0,0,1,9.92,11.24Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="" class="flex">
                                                    <span>{{$review->dislikes}}</span>
                                                    <svg class="hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#797979" viewBox="0 0 256 256">
                                                        <path d="M237.83,157.27l-12-96A22,22,0,0,0,204,42H32A14,14,0,0,0,18,56v88a14,14,0,0,0,14,14H76.29l38.34,76.68A6,6,0,0,0,120,238a38,38,0,0,0,38-38V182h58a22,22,0,0,0,21.83-24.73ZM74,146H32a2,2,0,0,1-2-2V56a2,2,0,0,1,2-2H74Zm149.5,20.62A9.89,9.89,0,0,1,216,170H152a6,6,0,0,0-6,6v24a26,26,0,0,1-22.42,25.75L86,150.58V54H204a10,10,0,0,1,9.92,8.76l12,96A9.89,9.89,0,0,1,223.5,166.62Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <a src="/home">ثبت نظر</a>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl hidden" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                              <span class="border-b-red-500 border-b">
                                پرسش های محصول
                              </span>
                                <div class="text-gray-500 text-sm">
                                    <div class="flex flex-col py-4 px-4 mx-auto my-6 max-w-7xl rounded-2xl bg-white">
                                        <!-- UO COMMENTS -->
                                        <div>
                                            <div>نظرات</div>
                                            <div class="pr-5 opacity-70 text-xs">2نظر</div>
                                        </div>
                                        <!-- COMMENT -->
                                        <div class="bg-gray-50 rounded-xl px-5 py-3 my-2">
                                            <div class="flex items-center">
                                                <div>
                                                    <img class="w-10" src="{{ asset('assets/images/others/userNotImage.png') }}" alt="">
                                                </div>
                                                <div class="text-sm opacity-60 pr-1">
                                                    نوشته شده توسط امیررضا کریمی
                                                </div>
                                            </div>
                                            <div class="opacity-60 text-sm py-3">
                                                لورم است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
                                            </div>
                                            <div>
                                                <button class="mr-auto px-2 sm:px-4 py-2 opacity-80 md:w-auto text-xs sm:text-sm xl:text-base flex justify-center items-center">
                                                    پاسخ
                                                </button>
                                            </div>
                                            <!-- RESPONSE -->
                                            <div class="bg-gray-100 rounded-xl pl-2 pr-5 sm:pr-8 py-3">
                                                <div class="flex items-center">
                                                    <div>
                                                        <img class="w-10" src="{{ asset('assets/images/others/userNotImage.png') }}" alt="">
                                                    </div>
                                                    <div class="text-sm opacity-60 pr-1">
                                                        پاسخ داده شده توسط امیررضا کریمی
                                                    </div>
                                                </div>
                                                <div class="opacity-60 text-sm py-3">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحامه و مجله در ستون و سطرآنچنان که لازم است.
                                                </div>
                                                <div>
                                                    <button class="mr-auto px-2 sm:px-4 py-2 opacity-80 md:w-auto text-xs sm:text-sm xl:text-base flex justify-center items-center">
                                                        پاسخ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 rounded-xl px-5 py-3 my-2">
                                            <div class="flex items-center">
                                                <div>
                                                    <img class="w-10" src="{{ asset('assets/images/others/userNotImage.png') }}" alt="">
                                                </div>
                                                <div class="text-sm opacity-60 pr-1">
                                                    نوشته شده توسط امیررضا کریمی
                                                </div>
                                            </div>
                                            <div class="opacity-60 text-sm py-3">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهو است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
                                            </div>
                                            <div>
                                                <button class="mr-auto px-2 sm:px-4 py-2 opacity-80 md:w-auto text-xs sm:text-sm xl:text-base flex justify-center items-center">
                                                    پاسخ
                                                </button>
                                            </div>
                                        </div>
                                        <!-- BOX SENT COMMENT -->
                                        <div>
                                            <div class="mb-4">
                                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نام شما:</label>
                                                <input type="text" class="text-sm block w-full rounded-lg border border-gray-400 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="mailTicket" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نظر شما:</label>
                                            <textarea cols="30" rows="5" class="text-sm block w-full rounded-lg border border-gray-400 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"></textarea>
                                        </div>
                                        <button class="inline-block px-8 py-2 ml-auto font-semibold text-center text-white bg-red-500 rounded-lg shadow-md text-xs">ارسال نظر</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SLIDER -->
                        <div class="bg-white rounded-2xl pt-10">
                            <!-- TOP SLIDER -->
                            <div class="flex justify-between px-5 md:px-10 items-center">
                                <div class="border-b-2 border-red-500 pb-1">مرتبط ترین ها</div>
                                <a href="#"><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">دیدن همه<img class="w-4" src="{{ asset('assets/images/others/arrow-left.png') }}" alt=""></div></a>
                            </div>
                            <!-- SLIDER -->
                            <div class="containerPSlider swiper">
                                <div class="slide-container1 px-2">
                                    <div class="card-wrapper swiper-wrapper py-4">
                <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/1.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        گوشی شیائومی m11
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                        <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/2.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        اپل واچ m32
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                        <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/3.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        ریش تراش دایاک
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                        <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/4.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        تلویزیون 40 اینچ سامسونگ
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                        <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/5.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        کاپشن زمستانه
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                        <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset('assets/images/productSlider/6.jpg') }}" alt="" />
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="">
                        هنذفری بلوتوثی شیائومی
                      </a>
                    </span>
                    <div class="flex justify-center text-xs opacity-75">
                      <div class="line-through">1.350.000</div>
                      <div class="line-through">تومان</div>
                    </div>
                    <div class="flex justify-center mt-1 mb-2 text-sm">
                      <div>1.100.000</div>
                      <div>تومان</div>
                    </div>
                  </div>
                </span>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-navBtn"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- PRODUCT SLIDER CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.product.slider.css') }}" />

    <!-- TOAST -->
    <link rel="stylesheet" href="{{ asset('/assets/css/toastify.css') }}">
@endpush

@push('scripts')
    <!-- TOAST -->
    <script src="{{ asset('assets/js/toastify.js') }}"></script>
    <!-- PRODUCT SLIDER -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scriptSlider.style.js') }}"></script>
    <!-- showImageSingleProduct -->
    <script src="{{ asset('assets/js/showImageSingleProduct.js') }}"></script>
    <!-- TABS -->
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <!-- INPUTS ADD NUMBER -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const countdownEl = document.getElementById('countdown');
            const endTime = parseInt(countdownEl.dataset.endTime);

            const daysEl = document.getElementById('days');
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');

            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    daysEl.textContent = 0;
                    hoursEl.textContent = 0;
                    minutesEl.textContent = 0;
                    secondsEl.textContent = 0;
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                daysEl.textContent = days;
                hoursEl.textContent = hours;
                minutesEl.textContent = minutes;
                secondsEl.textContent = seconds;
            };

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>

@endpush
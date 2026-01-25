@section('title', 'عدم دسترسی')

<x-app-layout>
    <!-- MAIN -->
    <div class="max-w-[1440px] mx-auto px-3">
        <div class="my-3 lg:my-10 p-3">
            <img class="mx-auto rounded-3xl" src="{{ asset('assets/images/others/403.jpg') }}" alt="">
            <div class="opacity-90 text-center mt-7 mb-5 text-lg">
                اجازه دسترسی به این صفحه ندارید!!!
            </div>
            <div class="flex justify-center items-center mb-5">
                <a class="border-b-2 border-red-500 hover:text-red-600 transition" href="{{route('home')}}">
                    صفحه اصلی
                </a>
                <img class="w-5" src="{{ asset('assets/images/others/arrow-left.png') }}" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
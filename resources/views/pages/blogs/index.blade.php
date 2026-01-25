@section('title', 'لیست وبلاگ ها')

<x-app-layout>
    <!-- MAIN -->
    <div class="max-w-[1440px] mx-auto px-3">
        <div class="my-5 lg:my-10 p-1 md:p-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/1.jpeg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            ساعت مچی هوشمند سامسونگ
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/2.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            سکانس های بیادماندنی فرندز
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/3.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            محبوب ترین ایرپادها
                        </div>
                    </a>
                </div>
                <div class="grid gap-4">
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/4.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            نسخه جدید شائومی
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/5.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            کتاب های رمانتیک
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/6.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            تمیز کننده های مدرن
                        </div>
                    </a>
                </div>
                <div class="grid gap-4">
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/7.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            قدم هایی برای خانه ای زیبا تر
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/8.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            استایل پاییزی
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/9.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            پرچمدارهای جدید سامسونگ
                        </div>
                    </a>
                </div>
                <div class="grid gap-4">
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/10.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            ایستراگ های بازی دوم
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/11.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            معرفی رزیدنت اویل برای آیفون
                        </div>
                    </a>
                    <a href="./blog(single).html" class="relative hover:scale-105 transition">
                        <img class="h-auto w-full rounded-xl" src="{{ asset('assets/images/blogHTML/12.jpg') }}" alt="">
                        <div class="absolute top-0 bg-neutral-900 bg-opacity-70 rounded-xl w-full h-full flex justify-center items-center text-center text-white text-lg md:text-xl">
                            بهترین ریش تراش بازار
                        </div>
                    </a>
                </div>
            </div>
            <div class="md:flex w-full mt-14 gap-x-7">
                <div class="w-full md:w-8/12 lg:w-9/12">
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <a href="./blog(single).html" class="flex flex-col sm:flex md:flex-row items-center shadow-sm p-2 mx-auto my-6 max-w-md md:max-w-full rounded-2xl bg-white ">
                        <div class="md:ml-6 mb-3 md:mb-0">
                            <img class="hover:scale-105 transition rounded-xl w-full md:w-auto mx-auto max-h-56" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="grid gap-y-5 w-full">
                            <div class="text-lg opacity-80 mx-auto md:mx-0 md:h-10 pt-3 flex justify-start items-center">لپ تاپ های جدید اپل</div>
                            <div class="text-sm opacity-80 md:h-16 flex justify-start items-start">در این مقاله سعی داریم مقایسه ای کوتاه و جذاب  میان دو پرچم دار قوی دنیای لپ تاپ های جدید انجام دهیم.</div>
                            <div class="flex justify-end text-xs opacity-75 md:gap-x-2 mx-auto md:mx-0">
                                <div>امیررضا کریمی</div>
                                <div>1402/04/30</div>
                            </div>
                        </div>
                    </a>
                    <div class="mb-10">
                        <ul class="flex items-center justify-center gap-x-2 md:gap-x-3 h-8 text-sm">
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 ms-0 text-gray-500 bg-white rounded-lg hover:bg-gray-100">
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-red-600  bg-red-200 rounded-lg hover:bg-gray-100">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg hover:bg-gray-100">2</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 rounded-lg text-gray-500 bg-white hover:bg-gray-100">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg hover:bg-gray-100">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg hover:bg-gray-100">8</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg hover:bg-gray-100">
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-4/12 lg:w-3/12 max-w-xl mx-auto">
                    <div class="lg:block p-3 space-y-4 mx-2 md:ml-3 bg-white rounded-2xl">
                        <div class="opacity-90 border-b pb-3">
                            جدیدترین مقاله ها:
                        </div>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                        <a href="./blog(single).html" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset('assets/images/blog/1.jpg') }}" alt="" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">معرفی لپ تاپ wat32</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>1402/04/30</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
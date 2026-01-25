@section('title', 'بلاگ')

<x-app-layout>
    <!-- MAIN -->
    <div class="max-w-[1440px] mx-auto px-3">
        <div class="mt-0 mb-5 lg:mt-10 lg:mb-8 p-1 md:p-3">
            <div class="md:flex w-full gap-x-7">
                <div class="w-full md:w-8/12 lg:w-9/12">
          <span class="flex flex-col py-2 px-3 mt-6 lg:mt-0 max-w-5xl rounded-2xl bg-white">
            <div>
              <div class="flex flex-wrap gap-x-3 text-xs opacity-75 py-1">
                <div class="flex">
                  <div>تاریخ: </div>
                  <div>1402/04/30</div>
                </div>
                <div class="flex">
                  <div>نویسنده: </div>
                  <div>امیررضا کریمی</div>
                </div>
                <div class="flex">
                  <div>دسته بندی: </div>
                  <div>تکنولوژی</div>
                </div>
                <div class="flex">
                  <div>امتیاز: </div>
                  <div>4.2</div>
                </div>
              </div>
            </div>
            <img class="rounded-2xl my-3" src="{{ asset('assets/images/singleBlog/workspace.jpg') }}" alt="">
            <div>
              <div class="text-2xl opacity-95 py-3">تکنولوژی های مورد استفاده شرکت های بزرگ</div>
              <div class="opacity-70 pb-3 leading-6 text-sm">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
              </div>
              <div class="opacity-70 pb-3 leading-6 text-sm">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
              </div>
            </div>
          </span>
                    <!-- BOX COMMENTS -->
                    <div class="flex flex-col py-4 px-4 my-6 max-w-5xl rounded-2xl bg-white">
                        <!-- UO COMMENTS -->
                        <div>
                            <div>نظرات</div>
                            <div class="pr-5 opacity-70 text-xs">3نظر</div>
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
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گ ستون و سطرآنچنان که لازم است.
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
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکهلازم است.
                                </div>
                                <div>
                                    <button class="mr-auto px-2 sm:px-4 py-2 opacity-80 md:w-auto text-xs sm:text-sm xl:text-base flex justify-center items-center">
                                        پاسخ
                                    </button>
                                </div>
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
                <div class="w-full md:w-4/12 lg:w-3/12 max-w-xl mx-auto">
                    <div class="lg:block p-3 space-y-4 mx-2 md:ml-3 bg-white rounded-2xl">
                        <div class="opacity-90 border-b pb-3">
                            مرتبط ترین مقاله ها:
                        </div>
                        <a href="#" class="flex flex-row items-center p-1">
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
                        <a href="#" class="flex flex-row items-center p-1">
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
                        <a href="#" class="flex flex-row items-center p-1">
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
                        <a href="#" class="flex flex-row items-center p-1">
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
                        <a href="#" class="flex flex-row items-center p-1">
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
                        <a href="#" class="flex flex-row items-center p-1">
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
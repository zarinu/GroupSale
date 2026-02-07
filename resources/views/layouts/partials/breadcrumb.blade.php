<nav class="breadcrumb">



    <div class="flex gap-x-2 px-10 mt-5 md:mt-10">
        <div>
            <a href="{{ url('/') }}" class="hover:text-red-500 transition text-sm opacity-70">خانه</a>
        </div>

        @foreach($breadcrumbs as $crumb)
            <div class="opacity-70">/</div>
            @if(!$loop->last)
                <div>
                    <a
                            href="{{ route('category.show', $crumb->slug) }}"
                            class="hover:text-red-500 transition text-sm opacity-70"
                    >
                        {{ $crumb->name }}
                    </a>
                </div>
            @else
                <div>
                    <a href="" class="hover:text-red-500 transition text-sm opacity-70"> {{ $crumb->name }}</a>
                </div>
            @endif
        @endforeach

    </div>
</nav>

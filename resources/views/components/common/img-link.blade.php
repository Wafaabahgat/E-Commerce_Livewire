<div class="flex items-center justify-center border rounded-md overflow-hidden shadow-2xl">
    <div class="flex flex-col px-2 py-4 ">
        <a href={{ $link ?? '' }} class="">
            <img class=" min-w-[200px] min-h-[200px] rounded-md" src={{ $src??'' }} alt={{ $alt ??''}} />
            <h2 class="text-[12px] text-gray-400 px-2 pt-2">{{ $ttl }}</h2>
        </a>
        <div>{{ $slot ?? '' }}</div>
    </div>
</div>

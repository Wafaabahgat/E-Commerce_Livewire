<div class="flex items-center justify-center  border rounded-md bg-red-400">
    <div class="flex flex-col px-2 py-4 ">
        <a href={{ $link ?? '' }} class="">
            <img class=" w-[200px] h-[200px] rounded-md" src={{ $src }} alt={{ $alt }} />
            <h2 class="text-[12px] text-gray-400 px-2 pt-2">{{ $ttl }}</h2>
        </a>
        <div>{{ $slot ?? '' }}</div>
    </div>
</div>

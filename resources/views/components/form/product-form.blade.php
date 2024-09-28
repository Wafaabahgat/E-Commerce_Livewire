<div class="flex flex-col ">
    <h1 class="text-2xl font-bold">{{ $title ?? '' }}</h1>
    <div class="grid sm:grid-cols-plog grid-cols-plogSm sm:gap-6 gap-3 {{ $class ?? '' }}">
        {{ $slot }}
    </div>
</div>

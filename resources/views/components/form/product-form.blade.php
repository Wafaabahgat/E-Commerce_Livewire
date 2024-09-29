<div class="flex flex-col">
    <h1 class="text-2xl font-bold">{{ $title ?? '' }}</h1>
    <div class="grid grid-cols-plog sm:gap-6 gap-2 {{ $class ?? '' }}">
        {{ $slot }}
    </div>
</div>

<section class="py-20 {{ $className ?? '' }}">
    <div class="max-w-xl mx-auto">
        <div class="text-center">
            <div class="relative flex flex-col items-center">
                <h1 class="text-5xl font-bold ">{{ $ttl }}<span class="text-blue-500">
                        {{ $spanttl }}
                    </span> </h1>
                <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                    <div class="flex-1 h-2 bg-blue-200">
                    </div>
                    <div class="flex-1 h-2 bg-blue-400">
                    </div>
                    <div class="flex-1 h-2 bg-blue-600">
                    </div>
                </div>
            </div>
            <p class="mb-12 text-base text-center text-gray-500">
                {{ $desc }}
            </p>
        </div>
    </div>
    {{ $slot }}
</section>

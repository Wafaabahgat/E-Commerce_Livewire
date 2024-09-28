<div class="w-full pr-2 col-span-1 lg:block ">

    {{-- Categories --}}
    <x-common.filter-product-form ttl="Categories">
        <ul>
            @foreach ($cats as $item)
                <li class="mb-4" wire:key='{{ $item->id }}'>
                    <label for="{{ $item->slug }}" class="flex items-center dark:text-gray-400 ">
                        <input type="checkbox" class="w-4 h-4 mr-2" value="{{ $item->id }}" id="{{ $item->slug }}">
                        <span class="text-lg"> {{ $item->name }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </x-common.filter-product-form>

    {{-- Brand --}}
    <x-common.filter-product-form ttl="Brand">
        <ul>
            @foreach ($brand as $branditem)
                <li class="mb-4" wire:key='{{ $branditem->id }}'>
                    <label for="{{ $branditem->slug }}" class="flex items-center dark:text-gray-300">
                        <input type="checkbox" class="w-4 h-4 mr-2" id="{{ $branditem->slug }}"
                            value="{{ $branditem->id }}>
                    <span class="text-lg
                            dark:text-gray-400">{{ $branditem->name }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </x-common.filter-product-form>

    {{-- Product Status --}}
    {{-- <x-common.filter-product-form ttl="Product Status">
        <ul>
            <li class="mb-4">
                <x-common.checkbox ttl="In Stock" />
            </li>
            <li class="mb-4">
                <x-common.checkbox ttl="On Sale" />
            </li>
        </ul>
    </x-common.filter-product-form> --}}

    {{-- price --}}
    <x-common.filter-product-form ttl="Price">
        <div>
            <input type="range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer"
                max="500000" value="100000" step="100000">
            <div class="flex justify-between">
                <span class="inline-block text-lg font-bold text-blue-400 ">&#8377; 1000</span>
                <span class="inline-block text-lg font-bold text-blue-400 ">&#8377; 500000</span>
            </div>
        </div>
    </x-common.filter-product-form>

</div>

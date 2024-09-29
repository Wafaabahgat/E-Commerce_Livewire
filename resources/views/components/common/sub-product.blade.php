@props([
    'prod' => null,
    'type' => 'text',
    'name' => '',
    'value' => '',
    'label' => '',
])


<x-common.img-link link="/products/{{ $prod->slug }}" ttl="{{ $prod->brand->name_en ?? 'Snack & Munchies' }}"
    src="{{ url('storage', $prod->images) }}" alt="{{ $prod->name }}"
    >
    <div class="mt-3 px-2 flex flex-col gap-y-1.5">

        <a href="/product_details/{{ $prod->id }}" class="block text-sm">{{ $prod->name ?? 'test' }}</a>

        <x-common.rate />

        <div class="flex items-center justify-between mt-3">
            <h3 class="text-[13px] text-gray-400">
                {{ Number::currency($prod->price, 'INR') }}
                {{-- @isset($prod->price_discount)
                    <span class="line-through"> ${{ $prod->price_discount }}</span>
                @endisset --}}
            </h3>
            <button class="bg-blue-600 px-3 py-1 rounded-md text-white">+ Add</button>
            {{-- <livewire:add-to-cart :id="$prod->id ?? '1'" :className="'bg-main'" /> --}}
        </div>
    </div>
</x-common.img-link>

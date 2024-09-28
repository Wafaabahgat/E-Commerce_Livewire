@props([
    'prod' => null,
    'type' => 'text',
    'name' => '',
    'value' => '',
    'label' => '',
])


<x-common.img-link link="/products/{{ $prod->slug }}" ttl="{{ $prod->brand->name_en ?? 'Snack & Munchies' }}"
    src="{{ url('storage', $prod->images) }}" alt="{{ $prod->name }}">
    <div class="mt-3 px-2 flex flex-col gap-y-1.5">

        <a href="/product_details/{{ $prod->id }}" class="block text-sm">{{ $prod->name ?? 'test' }}</a>

        <x-common.rate />

        <div class="flex items-center justify-between">
            <h3 class="text-[13px] text-gray-400">
                {{-- ${{ $prod->price ?? '0' }} --}}
                {{ Number::currency($prod->price, 'INR') }}
                {{-- @isset($prod->price_discount)
                    <span class="line-through"> ${{ $prod->price_discount }}</span>
                @endisset --}}
            </h3>
            {{-- <livewire:add-to-cart :id="$prod->id ?? '1'" :className="'bg-main'" /> --}}
        </div>
    </div>
</x-common.img-link>

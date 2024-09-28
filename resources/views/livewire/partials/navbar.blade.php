<header
    class="sticky top-0 z-50 flex flex-wrap w-full py-3 text-sm bg-white shadow-md md:justify-start md:flex-nowrap md:py-0 ">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold" href="/" aria-label="Brand">Store</a>
                <div class="md:hidden">
                    <button type="button"
                        class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-gray-200 rounded-lg hs-collapse-toggle w-9 h-9 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <x-svg.menu />
                        <x-svg.close />
                    </button>
                </div>
            </div>

            <div id="navbar-collapse-with-animation"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block">
                <div
                    class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <div
                        class="flex flex-col mt-5 divide-y divide-gray-200 gap-x-0 divide-dashed md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid">

                        <a wire:navigate
                            class="py-3 {{ request()->is('/') ? 'text-blue-600' : '' }} font-medium  md:py-6"
                            href="/" aria-current="page">Home</a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->is('categories') ? 'text-blue-600' : '' }} hover:text-gray-400 md:py-6"
                            href="/categories">
                            Categories
                        </a>

                        <a wire:navigate
                            class="py-3 font-medium {{ request()->is('products') ? 'text-blue-600' : '' }} hover:text-gray-400 md:py-6"
                            href="/products">
                            Products
                        </a>

                        <a wire:navigate
                            class="flex {{ request()->is('cart') ? 'text-blue-600' : '' }} items-center py-3 font-medium  hover:text-gray-400 md:py-6"
                            href="/cart">
                            <x-svg.cart />
                            <span class="mr-1">Cart</span> <span
                                class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">4</span>
                        </a>

                        <div class="pt-3 md:pt-0">
                            <a wire:navigate
                                class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="/login">
                                <x-svg.user />
                                Log in
                            </a>
                        </div>

                        {{-- <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4">
                <button type="button" class="flex items-center w-full font-medium text-gray-500 hover:text-gray-400">
                  User Name
              <svg class="w-4 h-4 ms-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6" />
              </svg>
              </button>
  
              <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 bg-white md:shadow-md rounded-lg p-2 before:absolute top-full md:border before:-top-5 before:start-0 before:w-full before:h-5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                  My Order
                </a

                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                  My Accoun
                </a
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                  Logout
                </a>
              </div>
            </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

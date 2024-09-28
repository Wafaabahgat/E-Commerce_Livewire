<div class="py-10 sm:p-6 md:px-12">
    <section class="container rounded-lg font-poppins">
        <div class="py-4 lg:py-6">
            {{-- sort  --}}
            <div class="w-full mb-6 shadow-lg border rounded-md">
                <div class="items-center justify-between hidden px-3 py-2 bg-white rounded-lg md:flex">
                    <div class="text-lg text-gray-600"> Showing
                        <span class="font-bold text-black">
                            3456 Items
                        </span>
                    </div>
                    <div class="flex items-center justify-between p-1 border rounded-md">
                        <select name="" id=""
                            class="block border-none outline-none cursor-pointer w-44 text-show">
                            <option value="">Sort by latest</option>
                            <option value="">Sort by Price</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid mb-24 md:grid-cols-4">
                {{-- filter --}}
                <div class="hidden md:block">
                    <x-common.filter-all :cats="$categories" :brand="$brands" />
                </div>
                {{-- products --}}
                <div class="w-full col-span-3">
                    <x-form.product-form>
                        @foreach ($products as $product)
                            <x-common.sub-product :prod="$product" />
                        @endforeach
                    </x-form.product-form>
                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        <nav aria-label="page-navigation">
                            <ul class="flex list-style-none">
                                <li class="page-item disabled ">
                                    <a href="#"
                                        class="relative block pointer-events-none px-3 py-1.5 mr-3 text-base text-gray-700 transition-all duration-300  rounded-md dark:text-gray-400 hover:text-gray-100 hover:bg-blue-600">Previous
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a href="#"
                                        class="relative block px-3 py-1.5 mr-3 text-base hover:text-blue-700 transition-all duration-300 hover:bg-blue-200 dark:hover:text-gray-400 dark:hover:bg-gray-700 rounded-md text-gray-100 bg-blue-400">1
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a href="#"
                                        class="relative block px-3 py-1.5 text-base text-gray-700 transition-all duration-300 dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-blue-100 rounded-md mr-3  ">2
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a href="#"
                                        class="relative block px-3 py-1.5 text-base text-gray-700 transition-all duration-300 dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-blue-100 rounded-md mr-3 ">3
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a href="#"
                                        class="relative block px-3 py-1.5 text-base text-gray-700 transition-all duration-300 dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-blue-100 rounded-md ">Next
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination end -->
                </div>

            </div>
        </div>
    </section>

</div>

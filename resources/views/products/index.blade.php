<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nos produits') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Remove py-8 -->
            <div class="mx-auto container py-8">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($products as $product)
                    <!-- Card 1 -->
                    <div tabindex="0" class="focus:outline-none mx-2 w-72">
                        <div>
                            <img alt="person capturing an image" src="{{ $product->image }}" tabindex="0" class="focus:outline-none w-full h-44" />
                        </div>
                        <div class="bg-white">
                            <div class="flex items-center justify-between px-4 pt-4">
                                {{-- <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                    </svg>
                                </div> --}}
                                <div class="bg-yellow-200 py-1.5 px-6 rounded-full">
                                    <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">{{ $product->formatted_price }}</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{ $product->name }}</h2>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5"></p>
                                </div>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{ $product->description }}</p>
                                {{-- <div class="flex mt-4">
                                    <div>
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">12 months warranty</p>
                                    </div>
                                    <div class="pl-2">
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Complete box</p>
                                    </div>
                                </div> --}}
                                <add-to-cart :product-id="{{ $product->id }}"></add-to-cart>
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 Ends -->
                    @endforeach
                </div>
            </div>
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        </div>
    </div>
</x-app-layout>
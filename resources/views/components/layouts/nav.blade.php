@php
    $styles = Route::is('home')
        ? 'absolute inset-x-0 top-0 z-50'
        : 'sticky top-0 bg-emerald-100 z-50 backdrop-blur-3xl ';
@endphp
<header class="{{ $styles }}">
    <nav class=" w-[90%] mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <x-layouts.navlink path="/" name="home">
                Home
            </x-layouts.navlink>

            <x-layouts.navlink path="/shop" name="shop">
                Shop
            </x-layouts.navlink>

            <x-layouts.navlink path="/about" name="about">
                About Us
            </x-layouts.navlink>

            <x-layouts.navlink path="/join-us" name="join-us">
                Join Us
            </x-layouts.navlink>

            {{-- <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a> --}}
        </div>
        <div class="hidden space-x-4 lg:flex lg:flex-1 lg:justify-end">
            @guest
                <a href="/login" class="text-sm font-bold leading-6 text-gray-900">Log in <span
                        aria-hidden="true"></span></a>
                <a href="/signup"
                    class="text-[14px] font-semibold leading-6 pb-1 text-white text-center flex items-center justify-center px-2 py-[2px] bg-emerald-600 rounded-2xl">Sign
                    up
                    </span>
                </a>
            @endguest

            @auth
                <div class="w-fit  relative">
                    <svg class="w-8 h-8 text-emerald-600 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span
                        class=" bg-amber-500 w-4 h-4 flex items-center justify-center text-xs shadow-md text-white absolute top-0 right-0 rounded-3xl">0</span>
                </div>


                <x-forms.form method="POST" name="logout" action="/logout" class="">
                    <input type="submit" value="Logout"
                        class="text-[14px] cursor-pointer font-semibold leading-6 pb-1 text-emerald-600 text-center  px-2 py-[2px] border-2 border-emerald-600 rounded-2xl hover:bg-emerald-50 active:opacity-30" />
                </x-forms.form>
            @endauth

        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    {{-- <div class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</header>

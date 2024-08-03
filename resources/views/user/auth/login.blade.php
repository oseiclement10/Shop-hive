<x-layouts.index>
    <section class="bg-slate-100  min-h-dvh flex justify-center items-center">


        <div class="grid relative grid-cols-2 place-items-center bg-white w-5/6 my-10 rounded-xl shadow-sm ">
            <div
                class="absolute -top-8 shadow-sm flex items-center justify-center  left-[45%] w-24 h-24 rounded-full bg-slate-100 p-4">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="w-8 h-8 mt-3" />
            </div>


            <div class="min-w-[400px]">
                <h2 class="text-3xl text-center font-bold leading-tight text-slate-800 sm:text-4xl"> Login Here</h2>
                <p class="mt-2 text-base text-center text-gray-600">Don&apos;t have an account? <a href="/signup"
                        title=""
                        class="font-medium text-emerald-600 transition-all duration-200 hover:text-emerald-700 hover:underline focus:text-emerald-700">Sign
                        up</a></p>

                <form action="/login" method="POST" class="mt-8">
                    @csrf
                    <div class="space-y-5">

                        <x-forms.field placeholder="Enter account email" type="email" name="email" label="Email"
                            required />

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="" class="text-base font-medium text-gray-900"> Password </label>

                                <a href="#" title=""
                                    class="text-sm font-medium text-emerald-600 hover:underline hover:text-emerald-700 focus:text-emerald-700">
                                    Forgot password? </a>
                            </div>
                            <div class="mt-2.5">
                                <input type="password" name="password" id="" placeholder="Enter your password"
                                    class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-emerald-600 focus:bg-white caret-emerald-600"
                                    required />
                                @error('password')
                                    <p class="text-base text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-emerald-600 border border-transparent rounded-md focus:outline-none hover:bg-emerald-700 focus:bg-emerald-700">Log
                                in</button>
                        </div>
                    </div>
                </form>


            </div>

            <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24  sm:px-6 lg:px-8">
                <div>
                    <img class=" max-w-[500px] mx-auto" src="{{ Vite::asset('resources/images/login.png') }}"
                        alt="login image" />
                </div>
            </div>
        </div>
    </section>
</x-layouts.index>

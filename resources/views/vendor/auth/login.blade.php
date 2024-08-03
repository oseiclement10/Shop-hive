    <x-layouts.index>
        <section class="grid  min-h-dvh grid-cols-5">
            <div class="col-span-2 bg-emerald-500 flex items-center justify-center">
                <div class="flex flex-col items-center ">
                    <div
                        class="w-10 h-10 bg-white shadow-md rounded-lg text-xl text-emerald-600 font-semibold flex items-center justify-center">
                        Sh
                    </div>
                    <h2 class="text-5xl mb-4 font-semibold tracking-wide text-white"> Welcome Back!</h2>
                    <p class="text-slate-50 text-center">To keep connected, log in with your vendor credentials</p>
                    <p class="text-slate-50 text-center mb-8">don't have a vendor account ?</p>
                    <a href="/signup"
                        class="text-sm py-[10px] px-12 border-2 rounded-3xl  text-white hover:bg-slate-100 hover:text-emerald-600 active:opacity-20 font-semibold">
                        BE A VENDOR</a>
                </div>
            </div>
            <div class="col-span-3 flex flex-col items-center justify-center">
                <div class="flex rounded-2xl flex-col justify-center px-6 py-12 min-w-[500px] lg:px-12 ">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <img class="mx-auto h-10 mb-4 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}"
                            alt="Your Company">
                        <h2 class="text-center text-3xl mt-2 font-bold  text-slate-600">
                            Vendor Login
                        </h2>
                    </div>

                    <div class="  sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="/vendor/login" method="POST">
                            @csrf
                            <x-forms.field type="email" placeholder="enter vendor email" name="email" label="Email"
                                required />
                            <x-forms.field type="password" placeholder="enter password" name="password" label="Password"
                                required />
                            <div class="text-sm text-center">
                                <a href="#" class="font-semibold text-emerald-600 hover:text-emerald-500">Forgot
                                    password?</a>
                            </div>


                            <div>
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Sign
                                    in</button>
                            </div>
                        </form>

                        <p class="mt-10 text-center text-sm text-gray-500">
                            Not a member?
                            <a href="/signup"
                                class="font-semibold leading-6 text-emerald-600 hover:text-emerald-500">Start
                                a
                                14 day
                                free
                                trial</a>
                        </p>

                    </div>
                </div>
            </div>
        </section>

        </x-layout>

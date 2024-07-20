<x-layout>
    <section class="min-h-dvh bg-emerald-50 flex flex-col items-center justify-center">
        <section>
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="shop hive" class="max-w-[40px] mb-4 mx-auto">
            <x-forms.form name="verify-email" class="w-[500px] py-10 shadow-sm bg-white px-8 rounded-lg"
                action="/email/verification-notification" method="post">
                @if (session('resent'))
                    <p class="bg-emerald-100 py-2 text-slate-800 ">A new verification link has been sent to your email
                        address.</p>
                @endif
                <img src="{{ Vite::asset('resources/images/mail-sent.png') }}" alt="shop hive"
                    class="max-w-[100px] mb-4 mx-auto">
                <h4 class="font-semibold text-lg text-slate-700 mb-1 text-center">Email Verification</h4>
                <p class="text-center text-slate-700 mb-2">
                    Email Verification Link has been sent to your email address Click on the link sent to your email to verify your email address
                </p>

                <p class="text-center text-slate-600">If you did not receive the email,
                    <button type="submit" class="text-amber-500 underline font-semibold"> Request new
                        email </button>
                </p>

            </x-forms.form>
        </section>

    </section>
</x-layout>

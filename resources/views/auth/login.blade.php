<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 via-white to-blue-50 px-4 py-10 antialiased font-sans">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden transition-all duration-300">

        <div class="text-center px-8 py-8 bg-gradient-to-r from-[#005a9c] to-blue-800 relative">
            <div class="absolute top-4 right-4">
                <span class="bg-white/20 text-white backdrop-blur-sm text-[10px] font-extrabold px-2.5 py-0.5 rounded-full uppercase tracking-wider">
                    EMS Portal
                </span>
            </div>

            <img src="{{ asset('images/lesco.png') }}"
                 alt="LESCO Logo"
                 class="h-20 mx-auto mb-4 object-contain drop-shadow-md">

            <h1 class="text-3xl font-black text-white tracking-tight">
                LESCO EMS
            </h1>

            <p class="text-blue-100 text-xs font-bold uppercase tracking-widest mt-1">
                Electricity Management System
            </p>
        </div>

        <div class="p-8">

            <x-auth-session-status class="mb-5 text-sm font-semibold text-emerald-600" :status="session('status')" />

            <x-input-error :messages="$errors->get('email')" class="mb-3" />
            <x-input-error :messages="$errors->get('password')" class="mb-3" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">
                        Email Address
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           autocomplete="username"
                           placeholder="username@lesco.gov.pk"
                           class="w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:ring-2 focus:ring-[#005a9c]/20 focus:border-[#005a9c] focus:bg-white font-semibold outline-none transition text-sm shadow-inner">
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-xs font-extrabold text-slate-700 uppercase tracking-wider">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs font-bold text-[#005a9c] hover:text-blue-900 hover:underline transition">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="••••••••"
                           class="w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:ring-2 focus:ring-[#005a9c]/20 focus:border-[#005a9c] focus:bg-white font-semibold outline-none transition text-sm shadow-inner">
                </div>

                <div class="flex items-center pt-1">
                    <label class="flex items-center text-sm cursor-pointer select-none group">
                        <input id="remember_me"
                               type="checkbox"
                               name="remember"
                               class="rounded border-slate-300 text-[#005a9c] shadow-sm focus:ring-[#005a9c] w-4 h-4 cursor-pointer transition">
                        <span class="ml-2 text-sm font-bold text-slate-600 group-hover:text-slate-900 transition">
                            Remember Me
                        </span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="w-full h-12 bg-slate-900 hover:bg-[#005a9c]  text-sm font-black rounded-xl shadow-xl transition-all duration-300 uppercase tracking-widest transform active:scale-[0.99] flex items-center justify-center">
                        Login
                    </button>
                </div>

            </form>

            <div class="mt-6 text-center border-t border-slate-100 pt-5">
                <p class="text-slate-500 text-sm font-semibold">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="font-black text-[#005a9c] hover:underline ml-1 transition">
                        Register Here
                    </a>
                </p>
            </div>

        </div>

    </div>

</div>

</x-guest-layout>

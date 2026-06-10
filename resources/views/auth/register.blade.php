<x-guest-layout>

<div class="min-h-screen w-full flex items-center justify-center bg-[#f4f6f9] py-12 px-4 antialiased font-sans">

    <div class="w-full max-w-md bg-white border border-slate-200 shadow-2xl rounded-2xl overflow-hidden transition-all duration-300">

        <div class="bg-gradient-to-b from-slate-50 to-white border-b border-slate-100 text-center pt-8 pb-6 px-6 relative">
            <div class="absolute top-4 right-4">
                <span class="bg-amber-100 text-amber-800 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full uppercase tracking-wider border border-amber-200">
                    EMS Terminal
                </span>
            </div>

            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/lesco.png') }}" class="h-20 w-auto object-contain drop-shadow" alt="LESCO Logo">
            </div>
            <h1 class="text-2xl font-black tracking-tight text-[#005a9c]">Create Account</h1>
            <p class="text-xs font-bold text-emerald-600 tracking-wider uppercase mt-1">
                LESCO Electricity Portal Registration
            </p>
        </div>

        <div class="p-6 sm:p-8 space-y-6">

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <x-input-label for="name" value="Full Name" class="text-xs font-extrabold text-slate-700 uppercase tracking-wider" />
                    <x-text-input id="name"
                                  class="block w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:border-[#005a9c] focus:ring-2 focus:ring-[#005a9c]/20 focus:bg-white font-semibold transition text-sm shadow-inner"
                                  type="text"
                                  name="name"
                                  placeholder="John Doe"
                                  required
                                  autofocus />
                </div>

                <div class="space-y-1.5">
                    <x-input-label for="email" value="Email Address" class="text-xs font-extrabold text-slate-700 uppercase tracking-wider" />
                    <x-text-input id="email"
                                  class="block w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:border-[#005a9c] focus:ring-2 focus:ring-[#005a9c]/20 focus:bg-white font-semibold transition text-sm shadow-inner"
                                  type="email"
                                  name="email"
                                  placeholder="username@lesco.gov.pk"
                                  required />
                </div>

                <div class="space-y-1.5">
                    <x-input-label for="password" value="Password" class="text-xs font-extrabold text-slate-700 uppercase tracking-wider" />
                    <x-text-input id="password"
                                  class="block w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:border-[#005a9c] focus:ring-2 focus:ring-[#005a9c]/20 focus:bg-white font-semibold transition text-sm shadow-inner"
                                  type="password"
                                  name="password"
                                  placeholder="••••••••"
                                  required />
                </div>

                <div class="space-y-1.5">
                    <x-input-label for="password_confirmation" value="Confirm Password" class="text-xs font-extrabold text-slate-700 uppercase tracking-wider" />
                    <x-text-input id="password_confirmation"
                                  class="block w-full h-12 px-4 rounded-xl border border-slate-300 text-slate-900 bg-slate-50/50 placeholder-slate-400 focus:border-[#005a9c] focus:ring-2 focus:ring-[#005a9c]/20 focus:bg-white font-semibold transition text-sm shadow-inner"
                                  type="password"
                                  name="password_confirmation"
                                  placeholder="••••••••"
                                  required />
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="w-full py-3 bg-slate-900 hover:bg-[#005a9c] text-lg font-black rounded-xl shadow-xl transition-all duration-300 uppercase tracking-widest transform active:scale-[0.99]">
                        Register Account
                    </button>
                </div>
            </form>

            <div class="border-t border-slate-100 pt-5 text-center">
                <p class="text-sm font-semibold text-slate-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[#005a9c] font-black hover:underline ml-1 transition">
                        Login
                    </a>
                </p>
            </div>

        </div>
    </div>

</div>

</x-guest-layout>

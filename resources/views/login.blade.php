@extends('component.master')
@section('judul', 'Login - Sistem Ujian Online')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-blue-900 p-4 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse delay-500"></div>
        </div>

        <!-- Main Card -->
        <div class="w-full max-w-md relative z-10 animate-fade-in">
            <!-- Logo Header -->
            <div class="text-center mb-6 transform transition-all duration-500 hover:scale-105">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-2xl mb-3 ring-4 ring-blue-500/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-1 bg-gradient-to-r from-blue-300 to-white bg-clip-text text-transparent">ExamPro</h1>
                <p class="text-blue-200 text-xs font-light tracking-wider">SISTEM UJIAN ONLINE</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-6 sm:p-8 border border-white/20 transform transition-all duration-500 hover:shadow-3xl">
                <!-- Header -->
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-white mb-1">Selamat Datang</h2>
                    <p class="text-blue-100 text-sm opacity-80">Masukkan kredensial Anda</p>
                </div>

                <!-- Login Form -->
                <form action="{{ route('proses_login') }}" method="POST" id="logForm" class="space-y-4">
                    @csrf

                    <!-- Username Field -->
                    <div class="space-y-2 group">
                        <label for="username" class="block text-sm font-medium text-blue-100">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-blue-300 group-focus-within:text-blue-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" id="username" name="username"
                                class="w-full px-4 py-2.5 pl-11 bg-white/5 border border-white/20 rounded-xl text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 @error('username') border-red-400/50 @enderror"
                                placeholder="Masukkan username" value="{{ old('username') }}" autocomplete="off">
                        </div>
                        @error('username')
                            <div class="flex items-center space-x-2 text-red-300 text-sm animate-shake">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2 group">
                        <label for="password" class="block text-sm font-medium text-blue-100">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-blue-300 group-focus-within:text-blue-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-2.5 pl-11 pr-11 bg-white/5 border border-white/20 rounded-xl text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-transparent transition-all duration-300 @error('password') border-red-400/50 @enderror"
                                placeholder="Masukkan password">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-300 hover:text-blue-400 transition-colors">
                                <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <div class="flex items-center space-x-2 text-red-300 text-sm animate-shake">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center pt-1">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-4 h-4 text-blue-500 bg-white/5 border-white/20 rounded focus:ring-blue-500/50 focus:ring-offset-gray-900">
                        <label for="remember" class="ml-2 text-sm text-blue-100">Ingat perangkat ini</label>
                    </div>

                    <!-- Error Message -->
                    @if ($errors->has('login_gagal'))
                        <div class="bg-red-500/10 border border-red-500/20 rounded-xl p-3 animate-shake">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-red-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-red-200 text-sm">{{ $errors->first('login_gagal') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl font-semibold tracking-wide shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-indigo-700 transform hover:-translate-y-0.5 transition-all duration-300 active:scale-95 mt-2">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Masuk ke Sistem
                        </span>
                    </button>
                </form>
            </div>

            <!-- Copyright -->
            <div class="mt-4 text-center">
                <p class="text-xs text-blue-300/60">© 2024 ExamPro • v2.1.0</p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const button = eyeIcon.closest('button');

            button.classList.add('scale-90');
            setTimeout(() => button.classList.remove('scale-90'), 150);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                    </path>`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>`;
            }
        }

        // Enhanced focus effects
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');

            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.parentElement.classList.add('group-focus');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.parentElement.classList.remove('group-focus');
                });

                input.addEventListener('input', function () {
                    if (this.value.trim() !== '') {
                        this.classList.add('border-blue-400/50');
                    } else {
                        this.classList.remove('border-blue-400/50');
                    }
                });
            });

            // Form submission animation
            const form = document.getElementById('logForm');
            form.addEventListener('submit', function (e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = `
                    <span class="flex items-center justify-center">
                        <svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Memproses...
                    </span>`;
                submitBtn.disabled = true;
            });

            // Auto focus username field
            const usernameInput = document.getElementById('username');
            if (usernameInput && !usernameInput.value) {
                setTimeout(() => usernameInput.focus(), 300);
            }

            // Card entrance animation
            const card = document.querySelector('.bg-white\\/10');
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px) scale(0.95)';

                setTimeout(() => {
                    card.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, 100);
            }
        });
    </script>

    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }

        /* Smooth transitions */
        * {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }

        /* Glass morphism enhancement */
        .backdrop-blur-lg {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #6366f1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #4f46e5);
        }

        /* Selection color */
        ::selection {
            background-color: rgba(59, 130, 246, 0.3);
            color: white;
        }

        /* Placeholder styling */
        input::placeholder {
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        input:focus::placeholder {
            opacity: 0.5;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .min-h-screen {
                padding: 1rem;
            }
        }

        @media (min-height: 700px) and (max-height: 900px) {
            .min-h-screen > div {
                transform: scale(0.95);
            }
        }
    </style>
@endsection
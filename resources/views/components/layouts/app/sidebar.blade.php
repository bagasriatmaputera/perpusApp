<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

<body class="bg-base-100 text-base-content min-h-screen">
    <div class="drawer drawer-mobile">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-200 shadow-md px-4">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                </div>
                <div class="flex-1 px-2 text-xl font-semibold">📚 PerpusApp</div>
                <div class="hidden lg:flex gap-4 items-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-ghost">Dashboard</a>
                    <a href="{{ route('user') }}" class="btn btn-ghost">User</a>
                    <a href="{{ route('member') }}" class="btn btn-ghost">Member</a>
                    <a href="{{ route('buku') }}" class="btn btn-ghost">Buku</a>
                    <a href="{{ route('kategori') }}" class="btn btn-ghost">Kategori</a>
                    <a href="{{ route('pinjam') }}" class="btn btn-ghost">Pinjam</a>

                    {{-- Avatar & Auth --}}
                    <div class="flex items-center gap-2">
                        <div class="avatar">
                            <div class="w-10 rounded-full bg-neutral text-white flex items-center justify-center">
                                <span class="text-lg">
                                    {{ collect(explode(' ', auth()->user()->nama ?? 'G'))->map(fn($word) => strtoupper($word[0]))->implode('') }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="font-medium leading-tight text-sm">{{ auth()->user()->nama ?? 'Guest' }}</div>
                            <div class="text-xs text-gray-500">{{ auth()->user()->email ?? 'guest@email.com' }}</div>
                        </div>
                    </div>
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-error btn-sm">Logout</button>
                    </form>
                    @endauth
                </div>
            </div>

            {{-- Page Content --}}
            <main class="p-4 w-full">
                {{ $slot }}
            </main>
        </div>

        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 w-72 bg-base-200 text-base-content">
                <!-- User Info -->
                <div class="mb-6 flex gap-3 items-center">
                    <div class="avatar">
                        <div class="w-12 rounded-full bg-neutral text-white flex items-center justify-center">
                            <span class="text-lg">
                                {{ collect(explode(' ', auth()->user()->nama ?? 'G'))->map(fn($word) => strtoupper($word[0]))->implode('') }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="font-semibold truncate">{{ auth()->user()->nama ?? 'Guest' }}</div>
                        <div class="text-sm text-gray-500 truncate">{{ auth()->user()->email ?? 'guest@email.com' }}</div>
                    </div>
                </div>

                <!-- Menu -->
                <li><a href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
                <li><a href="{{ route('user') }}">👤 User</a></li>
                <li><a href="{{ route('member') }}">👥 Member</a></li>
                <li><a href="{{ route('buku') }}">📘 Buku</a></li>
                <li><a href="{{ route('kategori') }}">🏷️ Kategori</a></li>
                <li><a href="{{ route('pinjam') }}">📤 Pinjam</a></li>

                <!-- Auth -->
                <div class="mt-4">
                    @guest
                    <a href="/login" class="btn btn-info w-full mt-4">Login</a>
                    @endguest

                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-error w-full mt-4">Logout</button>
                    </form>
                    @endauth
                </div>
            </ul>
        </div>
    </div>
</body>


</html>

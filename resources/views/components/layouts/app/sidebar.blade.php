<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />

<body class="min-h-screen bg-white darkbg-zinc-800">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-300 w-full">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-2 flex-1 px-2 !text-zinc-800">PerpusApp</div>
                <div class="hidden flex-none lg:block">
                    <ul class="menu menu-horizontal">
                        <!-- Navbar menu content here -->
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('user')}}">User</a></li>
                        <li><a href="{{route('member')}}">Member</a></li>
                        <li><a href="{{route('buku')}}">Buku</a></li>
                        <li>{{-- profile --}}
                            <div class="avatar avatar-placeholder h-10">
                                <div class="bg-neutral text-neutral-content w-10 rounded-full">
                                    <span class="text-3xl">{{ collect(explode(' ', auth()->user()->nama ??
                                        'G'))->map(fn($word)
                                        => strtoupper($word[0]))->implode('') }}
                                    </span></span>
                                </div>
                                <div class="flex flex-col leading-none">
                                    <div class="font-semibold text-start">{{auth()->user()->nama ?? 'Guest'}}</div>
                                    <div class="text-sm text-gray-500">{{auth()->user()->email ?? 'gueat@email.com'}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="mt-auto">
                            @guest
                            <a href="/login">
                                <button type="button" class="btn btn-info w-full">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                        </svg>
                                    </i>
                                    Login
                                </button>
                            </a>
                            @endguest

                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-error w-full">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                        </svg>
                                    </i>
                                    Log Out
                                </button>
                            </form>
                            @endauth
                        </div>
                    </ul>
                </div>
            </div>
            <!-- Page content here -->
        </div>
        {{ $slot }}

        @fluxScripts
        {{-- side bar --}}
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 min-h-full w-72 p-4 overflow-hidden">
                <!-- Sidebar content -->
                <div class="avatar avatar-placeholder w-full h-10 mb-4">
                    <div class="bg-neutral text-neutral-content w-10 rounded-full flex items-center justify-center">
                        <span class="text-2xl">
                            {{ collect(explode(' ', auth()->user()->nama ?? 'G'))->map(fn($word) =>
                            strtoupper($word[0]))->implode('') }}
                        </span>
                    </div>
                    <div class="flex flex-col justify-center ml-3">
                        <div class="font-semibold text-start truncate">{{ auth()->user()->nama ?? 'Guest'}}</div>
                        <div class="text-sm text-gray-500 truncate">{{ auth()->user()->email ?? 'guest@email.com' }}
                        </div>
                    </div>
                </div>
                <li class="mt-5">
                    <a class="truncate" href="{{ route('dashboard') }}"><i><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </i>Dashboard</a>
                </li>
                <li>
                    <a class="truncate" href="{{ route('user') }}"><i><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </i>User</a>
                </li>
                <li>
                    <a class="truncate" href="{{ route('member') }}"><i><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </i>Member</a>
                </li>
                <li>
                    <a class="truncate" href="{{ route('buku') }}"><i><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>

                        </i>Buku</a>
                </li>
                {{-- Logout --}}
                <div class="mt-auto">
                    @guest
                    <a href="/login">
                        <button type="button" class="btn btn-info w-full mt-4">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                </svg>
                            </i>
                            Login
                        </button>
                    </a>
                    @endguest

                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-error w-full mt-4">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                </svg>
                            </i>
                            Log Out
                        </button>
                    </form>
                    @endauth
                </div>
            </ul>
        </div>

    </div>

</body>

</html>

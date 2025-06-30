<div class="p-4">
    <div class="text-2xl font-bold text-gray-800">📊 Dashboard Perpustakaan</div>
    <hr class="my-4 border-base-300">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Kartu: Member --}}
        <div class="card bg-primary text-primary-content shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-white text-lg font-semibold">Jumlah Member</h2>
                        <p class="text-4xl font-bold">{{$jumlahMember}}</p>
                    </div>
                    <div class="text-white">
                        <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198v.031a11.944 11.944 0 01-11.598 0 6.062 6.062 0 01.599-3.228 5.995 5.995 0 015.058-2.772 5.995 5.995 0 015.058 2.772M15 6.75a3 3 0 11-6 0 3 3 0 016 0Zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0Zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu: Buku --}}
        <div class="card bg-warning text-white shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Jumlah Buku</h2>
                        <p class="text-4xl font-bold">{{$jumlahBuku}}</p>
                    </div>
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103Z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kartu: Pinjam --}}
        <div class="card bg-success text-white shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Jumlah Pinjam</h2>
                        <p class="text-4xl font-bold">{{$jumlahPinjam}}</p>
                    </div>
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 000 1.06l3 3a.75.75 0 101.06-1.06l-1.72-1.72h5.69a.75.75 0 100-1.5h-5.69l1.72-1.72a.75.75 0 10-1.06-1.06l-3 3Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kartu: Admin --}}
        <div class="card bg-error text-white shadow-xl">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Jumlah Admin</h2>
                        <p class="text-4xl font-bold">{{$jumlahUser}}</p>
                    </div>
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0ZM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

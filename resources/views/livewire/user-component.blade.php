<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-center text-xl font-bold text-blue-700 mb-4 border border-blue-400 rounded-full py-2">Kelola User</h1>
    <hr>
    {{-- Kelola User --}}
    {{-- alert berhasi tambah user --}}
    @if(session()->has('success'))
    <div role="alert" class="alert alert-success mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{session('success')}}</span>
    </div>
    @endif

    {{-- alert error --}}
    @if(session()->has('error'))
    <div role="alert" class="alert alert-error mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{session('error')}}</span>
    </div>
    @endif

    {{-- tambah user --}}
    <dialog wire:ignore.self id="my_modal_3" class="modal">
        <div class="modal-box p-6 space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tambah User</h3>

            <div class="form-control">
                <label class="label">Nama</label>
                <input type="text" class="input input-bordered" wire:model='nama' placeholder="Masukkan nama" />
                @error('nama')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Email</label>
                <input type="email" class="input input-bordered" wire:model='email' placeholder="contoh@email.com" />
                @error('email')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Password</label>
                <input type="password" class="input input-bordered" wire:model='password'
                    placeholder="8 karakter/lebih" />
                @error('password')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="modal-action">
                <button type="button" wire:click='tambahUser' class="btn btn-info btn-sm">Tambah</button>
            </div>
        </div>
    </dialog>

    {{-- edit User --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box p-6 space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Edit User</h3>

            <div class="form-control">
                <label class="label">Nama</label>
                <input type="text" class="input input-bordered" wire:model='nama' placeholder="Masukkan nama" />
                @error('nama')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Email</label>
                <input type="email" class="input input-bordered" wire:model='email' placeholder="contoh@email.com" />
                @error('email')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Password</label>
                <input type="password" class="input input-bordered" wire:model='password'
                    placeholder="8 karakter/lebih" />
                @error('password')
                <span class="text-error text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="modal-action">
                <button type="button" wire:click='update' class="btn btn-info btn-sm">Update</button>
            </div>
        </div>
    </dialog>

    {{-- Hapus User --}}
    <dialog wire:ignore.self id="hapus" class="modal">
        <div class="modal-box p-6 text-center space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Hapus User</h3>
            <p>Apakah kamu yakin ingin menghapus user <span class="font-semibold text-error">{{ $nama }}</span>?</p>
            <div class="modal-action justify-center">
                <button wire:click='destroy' class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>


    {{-- Input Cari --}}
    <div class="flex justify-between items-center">
            {{-- Tombol Tambah --}}
            <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah User</button>
            <input type="text" wire:model.live='cari' placeholder="Cari user"
                class="input input-bordered input-sm w-1/3" />
        </div>

    {{-- Tabel User --}}
    <div class="overflow-x-auto rounded-box border border-base-content/10 bg-base-100">
        <table class="table table-zebra">
            <thead class="bg-base-200 text-base-content font-semibold">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $users)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $users->nama }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->jenis }}</td>
                    <td class="flex gap-2 justify-center">
                        <button class="btn btn-xs btn-info" onclick="edit.showModal()"
                            wire:click='edit({{ $users->id }})'>Edit</button>
                        <button class="btn btn-xs btn-error" onclick="hapus.showModal()"
                            wire:click='confirm({{ $users->id }})'>Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-400 italic">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $user->links() }}
        </div>
    </div>

</div>

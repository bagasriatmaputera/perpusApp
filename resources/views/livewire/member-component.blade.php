<div>
    <div>
        {{-- In work, do what you enjoy. --}}
        <h1 class="text-center text-xl font-bold text-blue-700 mb-4 border border-blue-400 rounded-full py-2">Kelola
            Member</h1>
        <hr>
        {{-- Kelola member --}}
        {{-- alert berhasi tambah member --}}
        @if(session()->has('success'))
        <div role="alert" class="alert alert-success mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{session('success')}}</span>
        </div>
        @endif

        {{-- alert error --}}
        @if(session()->has('error'))
        <div role="alert" class="alert alert-error mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{session('error')}}</span>
        </div>
        @endif

        {{-- Modal Tambah Member --}}
        <dialog wire:ignore.self id="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <form wire:submit.prevent="tambahMember">
                    <h3 class="font-bold text-lg mb-4">Tambah Member</h3>
                    <div class="space-y-2">

                        <label class="label">Nama</label>
                        <input type="text" class="input input-bordered w-full" wire:model="nama"
                            placeholder="Masukan nama" />
                        @error('nama')
                        <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                        <label class="label">Email</label>
                        <input type="email" class="input input-bordered w-full" wire:model="email"
                            placeholder="Masukan email" />
                        @error('email')
                        <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                        <label class="label">Password</label>
                        <input type="password" class="input input-bordered w-full" wire:model="password"
                            placeholder="Minimal 8 karakter" />
                        @error('password')
                        <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                        <label class="label">Alamat</label>
                        <input type="text" class="input input-bordered w-full" wire:model="alamat"
                            placeholder="Jl. Contoh No.04" />
                        @error('alamat')
                        <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                        <label class="label">Telepon</label>
                        <input type="tel" class="input input-bordered w-full" wire:model="telepon"
                            placeholder="08xxxxxxxxxx" />
                        @error('telepon')
                        <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </dialog>

        {{-- Edit member --}}
        <dialog wire:ignore.self id="edit" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <form wire:submit.prevent="update">
                    <h3 class="font-bold text-lg mb-4">Edit Member</h3>
                    <div class="space-y-2">

                        <label class="label">Nama</label>
                        <input type="text" class="input input-bordered w-full" wire:model="nama"
                            placeholder="Masukan nama" />
                        @error('nama') <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div> @enderror

                        <label class="label">Email</label>
                        <input type="email" class="input input-bordered w-full" wire:model="email"
                            placeholder="Masukan email" />
                        @error('email') <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div> @enderror

                        <label class="label">Password</label>
                        <input type="password" class="input input-bordered w-full" wire:model="password"
                            placeholder="Minimal 8 karakter (opsional)" />
                        @error('password') <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                        <label class="label">Alamat</label>
                        <input type="text" class="input input-bordered w-full" wire:model="alamat"
                            placeholder="Alamat lengkap" />
                        @error('alamat') <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div> @enderror

                        <label class="label">Telepon</label>
                        <input type="tel" class="input input-bordered w-full" wire:model="telepon"
                            placeholder="08xxxxxxxx" />
                        @error('telepon') <div class="alert alert-error py-1 px-2 text-sm">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-sm btn-info">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </dialog>

        {{-- hapus --}}
        <dialog wire:ignore.self id="hapus" class="modal">
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold">Hapus Member</h3>
                <p class="py-4 text-sm">Yakin ingin menghapus member: <strong>{{ $nama }}</strong>?</p>
                <div class="modal-action justify-end">
                    <button wire:click="destroy" class="btn btn-sm btn-error">Hapus</button>
                </div>
            </div>
        </dialog>

        <div class="mt-4">
            {{-- Input Pencarian --}}
            <div class="flex justify-between items-center mb-2">
                {{-- Tombol Tambah --}}
                <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Member</button>
                <input type="text" wire:model.live="cari" placeholder="🔍 Cari member..."
                    class="input input-bordered input-sm w-full max-w-xs" />
            </div>

            {{-- Tabel Member --}}
            <div class="overflow-x-auto rounded-box border border-base-content/10 shadow-sm bg-base-100">
                <table class="table table-zebra">
                    <thead class="bg-base-200 text-base-content">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($member as $members)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="font-medium">{{ $members->nama }}</td>
                            <td>{{ $members->email }}</td>
                            <td>{{ $members->alamat }}</td>
                            <td>{{ $members->telepon }}</td>
                            <td class="flex gap-2">
                                <button class="btn btn-xs btn-info" wire:click="edit({{ $members->id }})"
                                    onclick="edit.showModal()">Edit</button>
                                <button class="btn btn-xs btn-error" wire:click="confirm({{ $members->id }})"
                                    onclick="hapus.showModal()">Hapus</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-sm text-gray-500">Data member tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-2 px-4">
                    {{ $member->links() }}
                </div>
            </div>
        </div>


    </div>

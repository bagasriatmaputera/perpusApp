<div class="p-4">
    <h1 class="text-center text-xl font-bold text-blue-700 mb-4 border border-blue-400 rounded-full py-2">Kelola Kategori</h1>

    {{-- Alert --}}
    @if(session()->has('success'))
    <div class="alert alert-success mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-error mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    {{-- Tombol dan Pencarian --}}
    <div class="flex justify-between items-center my-2">
        <button class="btn btn-sm btn-info" onclick="my_modal_3.showModal()">Tambah Kategori</button>
        <input type="text" wire:model.live="cari" placeholder="Cari kategori..." class="input input-bordered input-sm w-1/3" />
    </div>
    {{-- Tabel --}}
    <div class="overflow-x-auto mt-3 rounded-lg border">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $categories)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categories->nama }}</td>
                    <td>{{ $categories->deskripsi }}</td>
                    <td class="flex gap-2">
                        <button class="btn btn-xs btn-info" onclick="edit.showModal()" wire:click='edit({{ $categories->id }})'>Edit</button>
                        <button class="btn btn-xs btn-error" onclick="hapus.showModal()" wire:click='confirm({{ $categories->id }})'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2">
            {{ $kategori->links() }}
        </div>
    </div>

    {{-- Modal Tambah --}}
    <dialog id="my_modal_3" class="modal" wire:ignore.self>
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg mb-2">Tambah Kategori</h3>
            <form wire:submit.prevent="tambahKategori">
                <div class="form-control">
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input input-bordered" wire:model="nama" placeholder="Masukkan nama kategori" />
                    @error('nama')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control mt-2">
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input input-bordered" wire:model="deskripsi" placeholder="Masukkan deskripsi" />
                    @error('deskripsi')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- Modal Edit --}}
    <dialog id="edit" class="modal" wire:ignore.self>
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg mb-2">Edit Kategori</h3>
            <form wire:submit.prevent="update">
                <div class="form-control">
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input input-bordered" wire:model="nama" placeholder="Masukkan nama" />
                    @error('nama')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control mt-2">
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input input-bordered" wire:model="deskripsi" placeholder="Masukkan deskripsi" />
                    @error('deskripsi')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-info btn-sm">Perbarui</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- Modal Hapus --}}
    <dialog id="hapus" class="modal" wire:ignore.self>
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg text-center">Yakin ingin menghapus kategori:</h3>
            <p class="text-center font-semibold text-red-600 mt-1">{{ $nama }}</p>
            <div class="flex justify-end mt-4">
                <button wire:click="destroy" class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>
</div>

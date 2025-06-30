<div class="p-4">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-4">Kelola Kategori</h1>

    {{-- Alert Success --}}
    @if(session()->has('success'))
    <div class="alert alert-success mb-3">
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Alert Error --}}
    @if(session()->has('error'))
    <div class="alert alert-error mb-3">
        <span>{{ session('error') }}</span>
    </div>
    @endif

    {{-- Input Cari & Tombol Tambah --}}
    <div class="flex justify-between mb-4 flex-wrap gap-2">
        <input type="text" wire:model.live='cari' placeholder="Cari kategori..."
            class="input input-bordered w-full sm:w-1/2" />
        <button class="btn btn-primary" onclick="my_modal_3.showModal()">+ Tambah Kategori</button>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow border">
        <table class="table w-full">
            <thead class="bg-base-200 text-base-content">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $categories)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categories->nama }}</td>
                    <td>{{ $categories->deskripsi }}</td>
                    <td class="flex gap-2">
                        <button class="btn btn-sm btn-info" onclick="edit.showModal()"
                            wire:click='edit({{ $categories->id }})'>Edit</button>
                        <button class="btn btn-sm btn-error" onclick="hapus.showModal()"
                            wire:click='confirm({{ $categories->id }})'>Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-4">Tidak ada kategori ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-2">
            {{ $kategori->links() }}
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='tambahKategori'>
                <h3 class="font-bold text-lg mb-2">Tambah Kategori</h3>
                <div class="form-control mb-2">
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input input-bordered" wire:model='nama' placeholder="Masukan nama">
                    @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input input-bordered" wire:model='deskripsi'
                        placeholder="Masukan deskripsi">
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- MODAL EDIT --}}
    <dialog id="edit" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='update'>
                <h3 class="font-bold text-lg mb-2">Edit Kategori</h3>
                <div class="form-control mb-2">
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input input-bordered" wire:model='nama' placeholder="Masukan nama">
                    @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input input-bordered" wire:model='deskripsi'
                        placeholder="Masukan deskripsi">
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="btn btn-info">Update Kategori</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- MODAL HAPUS --}}
    <dialog id="hapus" class="modal">
        <div class="modal-box text-center">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-semibold mb-4">Yakin ingin hapus kategori:</h3>
            <p class="mb-4 text-red-600 font-bold">{{ $nama }}</p>
            <div class="flex justify-center">
                <button wire:click='destroy' class="btn btn-error">Ya, Hapus</button>
            </div>
        </div>
    </dialog>
</div>

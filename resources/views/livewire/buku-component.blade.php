<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-center text-xl font-bold text-blue-700 mb-4 border border-blue-400 rounded-full py-2">Kelola Buku
    </h1>
    <hr>
    {{-- Kelola Buku --}}

    {{-- alert berhasi tambah buku --}}
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


    {{-- Modal Tambah Buku --}}
    <dialog wire:ignore.self id="my_modal_3" class="modal">
        <div class="modal-box max-w-xl p-6 space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">✕</button>
            </form>
            <form wire:submit.prevent='tambahBuku' class="space-y-4">
                <h2 class="text-lg font-semibold mb-2">Tambah Buku</h2>

                <div class="form-control">
                    <label class="label font-semibold">Judul Buku</label>
                    <input type="text" class="input input-bordered w-full" wire:model='judul'
                        placeholder="Masukkan judul buku">
                    @error('judul') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Kategori</label>
                    <select class="select select-bordered w-full" wire:model='kategori'>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($category as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Penulis</label>
                    <input type="text" class="input input-bordered w-full" wire:model='penulis'
                        placeholder="Masukkan nama penulis">
                    @error('penulis') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Penerbit</label>
                    <input type="text" class="input input-bordered w-full" wire:model='penerbit'
                        placeholder="Masukkan nama penerbit">
                    @error('penerbit') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Tahun Terbit</label>
                    <input type="number" class="input input-bordered w-full" wire:model='tahun'
                        placeholder="Masukkan tahun terbit">
                    @error('tahun') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">ISBN</label>
                    <input type="text" class="input input-bordered w-full" wire:model='isbn'
                        placeholder="Masukkan ISBN">
                    @error('isbn') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Jumlah</label>
                    <input type="number" class="input input-bordered w-full" wire:model='jumlah'
                        placeholder="Masukkan jumlah buku">
                    @error('jumlah') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Tambah Buku</button>
                </div>
            </form>
        </div>
    </dialog>


    {{-- Modal Edit Buku --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box max-w-xl p-6 space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">✕</button>
            </form>
            <form wire:submit.prevent='update' class="space-y-4">
                <h2 class="text-lg font-semibold mb-2">Edit Buku</h2>

                <div class="form-control">
                    <label class="label font-semibold">Judul Buku</label>
                    <input type="text" class="input input-bordered w-full" wire:model='judul'
                        placeholder="Masukkan judul buku">
                    @error('judul') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Kategori</label>
                    <select class="select select-bordered w-full" wire:model='kategori'>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($category as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Penulis</label>
                    <input type="text" class="input input-bordered w-full" wire:model='penulis'
                        placeholder="Masukkan nama penulis">
                    @error('penulis') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Penerbit</label>
                    <input type="text" class="input input-bordered w-full" wire:model='penerbit'
                        placeholder="Masukkan nama penerbit">
                    @error('penerbit') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Tahun Terbit</label>
                    <input type="number" class="input input-bordered w-full" wire:model='tahun'
                        placeholder="Masukkan tahun terbit">
                    @error('tahun') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">ISBN</label>
                    <input type="text" class="input input-bordered w-full" wire:model='isbn'
                        placeholder="Masukkan ISBN">
                    @error('isbn') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label class="label font-semibold">Jumlah</label>
                    <input type="number" class="input input-bordered w-full" wire:model='jumlah'
                        placeholder="Masukkan jumlah buku">
                    @error('jumlah') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Update Buku</button>
                </div>
            </form>
        </div>
    </dialog>


    {{-- Modal Hapus Buku --}}
    <dialog wire:ignore.self id="hapus" class="modal">
        <div class="modal-box max-w-md p-6 space-y-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4">✕</button>
            </form>
            <h2 class="text-lg font-semibold text-center">Konfirmasi Hapus</h2>
            <p class="text-center">Yakin ingin menghapus buku <span class="font-bold text-error">{{ $judul }}</span>?
            </p>
            <div class="modal-action justify-end">
                <button wire:click='destroy' class="btn btn-error">Hapus</button>
            </div>
        </div>
    </dialog>


    {{-- Cari INput --}}
    <div class="space-y-4">
        {{-- Input Pencarian --}}
        <div class="flex justify-between items-center">
            {{-- Tombol Tambah --}}
            <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Buku</button>
            <input type="text" wire:model.live='cari' placeholder="Cari judul / penulis"
                class="input input-bordered input-sm w-1/3" />
        </div>

        {{-- Tabel Buku --}}
        <div class="overflow-x-auto rounded-xl border border-base-200 bg-base-100 shadow-md">
            <table class="table table-zebra table-sm md:table-md w-full">
                <thead class="bg-base-200 text-base-content text-sm font-semibold">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>ISBN</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->kategori->nama ?? '-' }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->tahun }}</td>
                        <td>{{ $book->jumlah }}</td>
                        <td class="flex gap-1 justify-center">
                            <button class="btn btn-xs btn-info" onclick="edit.showModal()"
                                wire:click="edit({{ $book->id }})">Edit</button>
                            <button class="btn btn-xs btn-error" onclick="hapus.showModal()"
                                wire:click="confirm({{ $book->id }})">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-sm py-4">Tidak ada data buku ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-2">
            {{ $buku->links() }}
        </div>
    </div>

</div>

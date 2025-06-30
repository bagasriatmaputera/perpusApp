<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-center text-xl font-bold text-blue-700 mb-4 border border-blue-400 rounded-full py-2">Kelola Pinjam</h1>
    <hr>
    {{-- Kelola Pinjam --}}

    {{-- Tombol Tambah --}}
    <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Pinjam</button>
    {{-- alert berhasi tambah member --}}
    @if(session()->has('success'))
    <div role="alert" class="alert alert-success mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{session('success')}}</span>
    </div>
    @endif

    {{-- Tambah Peminjaman --}}
    <dialog wire:ignore.self id="my_modal_3" class="modal">
        <div class="modal-box max-w-md">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="font-bold text-lg mb-4">Tambah Peminjaman</h3>

            <form wire:submit.prevent='tambahPinjam' class="space-y-4">
                {{-- Pilih Member --}}
                <div>
                    <label class="label font-semibold">Nama Peminjam</label>
                    <select wire:model='member' class="select select-bordered w-full">
                        <option value="" disabled selected>--Pilih--</option>
                        @foreach($orang as $users)
                        <option value="{{ $users->id }}">{{ $users->nama }}</option>
                        @endforeach
                    </select>
                    @error('member') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Pilih Buku --}}
                <div>
                    <label class="label font-semibold">Judul Buku</label>
                    <select wire:model='buku' class="select select-bordered w-full">
                        <option value="" disabled selected>--Pilih Buku--</option>
                        @foreach($book as $books)
                        <option value="{{ $books->id }}">{{ $books->judul }}</option>
                        @endforeach
                    </select>
                    @error('buku') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Tombol --}}
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah Pinjam</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- Detail Pinjaman --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box max-w-md">
            <h3 class="text-lg font-bold mb-4">Detail Peminjaman</h3>

            <div class="space-y-2">
                <div>
                    <label class="label font-semibold">Nama Peminjam</label>
                    <input type="text" readonly class="input input-bordered w-full" value="{{ $this->nama }}" />
                </div>

                <div>
                    <label class="label font-semibold">Judul Buku</label>
                    <input type="text" readonly class="input input-bordered w-full" value="{{ $this->buku }}" />
                </div>

                <div>
                    <label class="label font-semibold">Tanggal Pinjam</label>
                    <input type="text" readonly class="input input-bordered w-full" value="{{ $this->tgl_pinjam }}" />
                </div>

                <div>
                    <label class="label font-semibold">Batas Pengembalian</label>
                    <input type="text" readonly class="input input-bordered w-full" value="{{ $this->tgl_kembali }}" />
                </div>

                <div>
                    <label class="label font-semibold">Tanggal Dikembalikan</label>
                    <input type="text" readonly class="input input-bordered w-full"
                        value="{{ $this->kembalikan ?? 'Belum Dikembalikan' }}" />
                </div>

                <div>
                    <label class="label font-semibold">Denda</label>
                    <input type="text" readonly class="input input-bordered w-full" value="{{ $this->denda ?? '-' }}" />
                </div>
            </div>

            <div class="modal-action mt-4">
                <form method="dialog">
                    <button class="btn btn-sm">Tutup</button>
                </form>
                <form wire:submit.prevent='update'>
                    <button onclick="return confirm('Apakah denda sudah dibayar?')" class="btn btn-sm btn-accent">Ubah
                        Status</button>
                </form>
            </div>
        </div>
    </dialog>

    {{-- Hapus Pinjam --}}
    <dialog wire:ignore.self id="hapus" class="modal">
        <div class="modal-box max-w-sm">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>

            <h3 class="text-lg font-bold text-center">Konfirmasi Hapus</h3>
            <p class="text-center mt-2">Yakin ingin menghapus peminjaman oleh <span class="font-semibold text-error">{{
                    $nama ?? 'null' }}</span>?</p>

            <div class="modal-action justify-end mt-4">
                <button wire:click='destroy' class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>


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

    {{-- Cari INput --}}
    {{-- Input Pencarian --}}
    <input type="text" wire:model.live="cari" placeholder="Cari peminjam..."
        class="input input-bordered w-full max-w-xs" />

    {{-- Tabel Data --}}
    <div class="overflow-x-auto rounded-box border border-base-300 bg-base-100 shadow-sm">
        <table class="table table-zebra w-full">
            <thead class="bg-base-200 text-base font-semibold text-base-content">
                <tr>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Batas Pengembalian</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinjam as $loans)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loans->user->nama }}</td>
                    <td>{{ $loans->buku->judul ?? '-' }}</td>
                    <td>{{ $loans->tgl_pinjam }}</td>
                    <td>{{ $loans->tgl_kembali }}</td>
                    <td>
                        <span class="badge {{ $loans->status === 'pinjam' ? 'badge-warning' : 'badge-success' }}">
                            {{ $loans->status }}
                        </span>
                    </td>
                    <td class="flex gap-2 justify-center">
                        <button wire:click="edit({{ $loans->id }})" onclick="edit.showModal()"
                            class="btn btn-xs btn-accent">Status</button>
                        <button wire:click="confirm({{ $loans->id }})" onclick="hapus.showModal()"
                            class="btn btn-xs btn-error">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">Data peminjam tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pinjam->links() }}
    </div>
</div>

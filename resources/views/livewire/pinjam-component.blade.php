<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-black-800 text-center border border-blue-400 rounded-full font-bold mb-3">Kelola Pinjam</h1>
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

    {{-- Modal Tambah Pinjam --}}
    <dialog wire:ignore.self id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='tambahPinjam'>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                    <legend class="fieldset-legend">Tambah Pinjam</legend>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Nama Peminjam</legend>
                        <select wire:model='member' class="select">
                            <option value="" disabled selected>--Pilih--</option>
                            @foreach($orang as $users)
                            <option value="{{ $users->id }}">{{ $users->nama }}</option>
                            @endforeach
                        </select>

                    </fieldset>
                    @error('member')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Buku</label>
                    <select class="select select-neutral" wire:model='buku'>
                        <option value="" disabled selected>Pilih Buku</option>
                        @foreach($book as $books)
                        <option value="{{$books->id}}">{{$books->judul}}</option>
                        @endforeach
                    </select>
                    @error('buku')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                </fieldset>
                <button type="submit" class="btn btn-sm btn-info mt-2 ">Tambah Pinjam</button>
            </form>
        </div>
    </dialog>

    {{-- modal Edit Pinjam --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama Peminjam:</legend>
                <input type="text" readonly class="input input-info" value="{{$this->nama}}" />
            </fieldset>

            {{-- judul buku --}}
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Buku:</legend>
                <input type="text" readonly class="input input-info" value="{{$this->buku}}" />
            </fieldset>

            {{-- Tgl info --}}
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tgl Dikembalikan:</legend>
                <input type="text" readonly class="input input-success"
                    value="{{$this->kembalikan ?? 'Belum Dikembalikan'}}" />
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tgl Pinjam:</legend>
                <input type="text" readonly class="input input-warning" value="{{$this->tgl_pinjam}}" />
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Batas Tgl Pinjam:</legend>
                <input type="text" readonly class="input input-warning" value="{{$this->tgl_kembali}}" />
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Denda:</legend>
                <input readonly class="input input-error" value="{{$this->denda ?? '-'}}" />
            </fieldset>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-sm">Close</button>
                </form>
                <form wire:submit.prevent='update'>
                    <button onclick="return confirm('Apakah ada denda, dan sudah terbayarkan?')" class="btn btn-sm btn-accent">Ubah Status</button>
                </form>
            </div>
        </div>
    </dialog>

    {{-- modal Hapus User --}}
    <dialog wire:ignore.self id="hapus" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div class="flex justify-center mt-4">
                <p>Yakin ingin hapus data Pinjam: <strong>{{$nama ?? 'null'}}</strong></p>
            </div>
            <div class="flex justify-end mt-4">
                <button wire:click='destroy' class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>

    {{-- Cari INput --}}
    <input type="text" wire:model.live='cari' placeholder="Cari" class="input" />

    {{-- table peminjam --}}
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-2">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam </th>
                    <th>Batas Waktu Pinjam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($pinjam as $loans)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$loans->user->nama}}</td>
                    <td>{{$loans->buku->judul ?? ''}}</td>
                    <td>{{$loans->tgl_pinjam}}</td>
                    <td>{{$loans->tgl_kembali}}</td>
                    <td>{{$loans->status}}</td>
                    <td><a wire:click='edit({{$loans->id}})' class="btn btn-xs btn-dash btn-accent"
                            onclick="edit.showModal()">Status</a> <a wire:click='confirm({{$loans->id}})'
                            class="btn btn-xs btn-dash btn-error" onclick="hapus.showModal()">Hapus</a></td>
                </tr>
                @endforeach
                {{ $pinjam->links() }}
            </tbody>
        </table>
    </div>
</div>

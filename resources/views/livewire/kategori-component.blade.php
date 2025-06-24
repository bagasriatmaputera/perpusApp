<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-black-800 text-center border border-blue-400 rounded-full font-bold mb-3">Kelola Kategori</h1>
    <hr>
    {{-- Kelola Kategori --}}

    {{-- Tombol Tambah --}}
    <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Kategori</button>
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

    {{-- Modal Tambah Kategori --}}
    <dialog wire:ignore.self id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='tambahKategori'>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                    <legend class="fieldset-legend">Tambah Kategori</legend>
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input w-auto" wire:model='nama' placeholder="Masukan nama."
                        value="{{@old('nama')}}" />
                    @error('nama')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input w-auto" wire:model='deskripsi' placeholder="Masukan Deskripsi."
                        value="{{@old('deskripisi')}}" />
                    @error('email')
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
                <button type="submit" class="btn btn-sm btn-info mt-2 ">Tambah Member</button>
            </form>
        </div>
    </dialog>

    {{-- modal Edit Member --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='update'>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                    <legend class="fieldset-legend">Tambah Kategori</legend>
                    <label class="label">Nama Kategori</label>
                    <input type="text" class="input w-auto" wire:model='nama' placeholder="Masukan nama."
                        value="{{@old('nama')}}" />
                    @error('nama')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <label class="label">Deskripsi</label>
                    <input type="text" class="input w-auto" wire:model='deskripsi' placeholder="Masukan Deskripsi."
                        value="{{@old('deskripisi')}}" />
                    @error('email')
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
                <button type="submit" class="btn btn-sm btn-info mt-2 ">Tambah Member</button>
            </form>
        </div>
    </dialog>

    {{-- modal Hapus User --}}
    <dialog wire:ignore.self id="hapus" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div class="flex justify-center mt-4">
                <p>Yakin ingin hapus kategori: <strong>{{$nama}}</strong></p>
            </div>
            <div class="flex justify-end mt-4">
                <button wire:click='destroy' class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>

    {{-- Cari INput --}}
    <input type="text" wire:model.live='cari' placeholder="Cari" class="input" />

    {{-- table user --}}
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-2">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($kategori as $categories)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$categories->nama}}</td>
                    <td>{{$categories->deskripsi}}</td>
                    <td>{{$categories->telepon}}</td>
                    <td><a class="btn btn-xs btn-dash btn-info" onclick="edit.showModal()"
                            wire:click='edit({{$categories->id}})'>Edit</a> <a wire:click='confirm({{$categories->id}})'
                            class="btn btn-xs btn-dash btn-error" onclick="hapus.showModal()">Hapus</a></td>
                </tr>
                @endforeach
                {{ $kategori->links() }}
            </tbody>
        </table>
    </div>
</div>

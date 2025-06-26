<div>
    {{-- In work, do what you enjoy. --}}
    <h1 class="text-black-800 text-center border border-blue-400 rounded-full font-bold mb-3">Kelola Buku</h1>
    <hr>
    {{-- Kelola Buku --}}

    {{-- Tombol Tambah --}}
    <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Buku</button>
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
        <div class="modal-box p-4">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='tambahBuku'>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                    <legend class="fieldset-legend">Tambah Buku</legend>
                    <label class="label">Judul Buku</label>
                    <input type="text" class="input w-auto" wire:model='judul' placeholder="Masukan judul buku."
                        value="{{@old('judul')}}" />
                    @error('judul')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Kategori</label>
                    <select class="select select-neutral" wire:model='kategori'>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($category as $categories)
                        <option value="{{$categories->id}}">{{$categories->nama}}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Penulis</label>
                    <input type="text" class="input w-auto" wire:model='penulis' placeholder="Masukan nama penulis."
                        value="{{@old('penulis')}}" />
                    @error('penulis')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Penerbit</label>
                    <input type="text" class="input w-auto" wire:model='penerbit' placeholder="Masukan nama penerbit."
                        value="{{@old('penerbit')}}" />
                    @error('penerbit')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <label class="label">Tahun</label>
                    <input type="number" class="input w-auto" wire:model='tahun' placeholder="Masukan tahun terbit."
                        value="{{@old('tahun')}}" />
                    @error('tahun')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">ISBN</label>
                    <input type="text" class="input w-auto" wire:model='isbn' placeholder="Masukan isbn."
                        value="" />
                    @error('isbn')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Jumah</label>
                    <input type="numeric" class="input w-auto" wire:model='jumlah' placeholder="Masukan jumlah."
                        value="{{@old('jumlah')}}" />
                    @error('jumlah')
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
                <button type="submit" class="btn btn-sm btn-info mt-2 ">Tambah Buku</button>
            </form>
        </div>
    </dialog>

    {{-- modal Edit Buku --}}
    <dialog wire:ignore.self id="edit" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <form wire:submit.prevent='update'>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                    <legend class="fieldset-legend">Edit Buku</legend>
                    <label class="label">Judul Buku</label>
                    <input type="text" class="input w-auto" wire:model='judul' placeholder="Masukan judul buku."
                        value="{{@old('judul')}}" />
                    @error('judul')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Kategori</label>
                    <select class="select select-neutral" wire:model='kategori'>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($category as $categories)
                        <option value="{{$categories->id}}">{{$categories->nama}}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Penulis</label>
                    <input type="text" class="input w-auto" wire:model='penulis' placeholder="Masukan nama penulis."
                        value="{{@old('penulis')}}" />
                    @error('penulis')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Penerbit</label>
                    <input type="text" class="input w-auto" wire:model='penerbit' placeholder="Masukan nama penerbit."
                        value="{{@old('penerbit')}}" />
                    @error('penerbit')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                    <label class="label">Tahun</label>
                    <input type="number" class="input w-auto" wire:model='tahun' placeholder="Masukan tahun terbit."
                        value="{{@old('tahun')}}" />
                    @error('tahun')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">ISBN</label>
                    <input type="text" class="input w-auto" wire:model='isbn' placeholder="Masukan isbn."
                        value="{{@old('isbn')}}" />
                    @error('isbn')
                    <div role="alert" class="alert alert-error mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror

                    <label class="label">Jumah</label>
                    <input type="text" class="input w-auto" wire:model='jumlah' placeholder="Masukan jumlah."
                        value="{{@old('jumlah')}}" />
                    @error('jumlah')
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
                <button type="submit" class="btn btn-sm btn-info mt-2 ">Edit Buku</button>
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
                <p>Yakin ingin hapus buku: <strong>{{$judul}}</strong></p>
            </div>
            <div class="flex justify-end mt-4">
                <button wire:click='destroy' class="btn btn-sm btn-error">Hapus</button>
            </div>
        </div>
    </dialog>

    {{-- Cari INput --}}
    <input type="text" wire:model.live='cari' placeholder="Cari" class="input" />

    {{-- table Buku --}}
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 mt-2">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>ISBN</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($buku as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->judul}}</td>
                    <td>{{$book->kategori->nama ?? 'null'}}</td>
                    <td>{{$book->penulis}}</td>
                    <td>{{$book->penerbit}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->tahun}}</td>
                    <td>{{$book->jumlah}}</td>
                    <td><a class="btn btn-xs btn-dash btn-info" onclick="edit.showModal()"
                            wire:click='edit({{$book->id}})'>Edit</a> <a wire:click='confirm({{$book->id}})'
                            class="btn btn-xs btn-dash btn-error" onclick="hapus.showModal()">Hapus</a></td>
                </tr>
                @endforeach
                {{ $buku->links() }}
            </tbody>
        </table>
    </div>
</div>

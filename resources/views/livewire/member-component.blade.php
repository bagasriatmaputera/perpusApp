<div>
    <div>
        {{-- In work, do what you enjoy. --}}
        <h1 class="text-black-800 text-center border border-blue-400 rounded-full font-bold mb-3">Kelola Member</h1>
        <hr>
        {{-- Kelola member --}}

        {{-- Tombol Tambah --}}
        <button class="btn btn-sm btn-info mb-2 mt-2" onclick="my_modal_3.showModal()">Tambah Member</button>
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
                <form wire:submit.prevent='tambahMember'>
                    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4">
                        <legend class="fieldset-legend">Tambah Member</legend>
                        <label class="label">Nama</label>
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
                        <label class="label">Email</label>
                        <input type="email" class="input w-auto" wire:model='email' placeholder="Masukan Email."
                            value="{{@old('email')}}" />
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
                        <label class="label">Password</label>
                        <input type="password" class="input w-auto" wire:model='password'
                            placeholder="Masukan password minimal 8 karakter" value="{{@old('')}}" />
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
                        <label class="label">Alamat</label>
                        <input type="text" class="input w-auto" wire:model='alamat' placeholder="Jl.contoh No 04"
                            value="{{@old('alamat')}}" />
                        @error('alamat')
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                        <label class="label">Telepon</label>
                        <input type="number" class="input w-auto" wire:model='telepon' placeholder="083xxxxxxxx"
                            value="{{@old('telepon')}}" />
                        @error('telepon')
                        <div role="alert" class="alert alert-error">
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
                        <legend class="fieldset-legend">Edit Member</legend>
                        <label class="label">Nama</label>
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
                        <label class="label">Email</label>
                        <input type="email" class="input w-auto" wire:model='email' placeholder="Masukan Email."
                            value="{{@old('email')}}" />
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
                        <label class="label">Password</label>
                        <input type="password" class="input w-auto" wire:model='password'
                            placeholder="Masukan password minimal 8 karakter" value="{{@old('')}}" />
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
                        <label class="label">Alamat</label>
                        <input type="text" class="input w-auto" wire:model='alamat' placeholder="Jl.contoh No 04"
                            value="{{@old('alamat')}}" />
                        @error('alamat')
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                        <label class="label">Telepon</label>
                        <input type="number" class="input w-auto" wire:model='telepon' placeholder="083xxxxxxxx"
                            value="{{@old('telepon')}}" />
                        @error('telepon')
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{$message}}</span>
                        </div>
                        @enderror
                    </fieldset>
                    <button type="submit" class="btn btn-sm btn-info mt-2 ">Edit Member</button>
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
                    <p>Yakin ingin hapus member: <strong>{{$nama}}</strong></p>
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
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($member as $members)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$members->nama}}</td>
                        <td>{{$members->email}}</td>
                        <td>{{$members->alamat}}</td>
                        <td>{{$members->telepon}}</td>
                        <td><a class="btn btn-xs btn-dash btn-info" onclick="edit.showModal()"
                                wire:click='edit({{$members->id}})'>Edit</a> <a wire:click='confirm({{$members->id}})'
                                class="btn btn-xs btn-dash btn-error" onclick="hapus.showModal()">Hapus</a></td>
                    </tr>
                    @endforeach
                    {{ $member->links() }}
                </tbody>
            </table>
        </div>
    </div>

</div>

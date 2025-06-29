<div>
    <div class="title text-3xl font-semibold">Dashboard Perpustakaan</div>
    <hr>
    {{-- card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
        {{-- card for key index --}}
        <div class="h-full">
            <div class="card bg-primary text-primary-content h-full">
                <div class="card-body flex flex-col justify-between">
                    <div class="flex justify-between">
                        <h2 class="card-title"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                                </svg>
                                </svg>
                            </i>Jumlah Member</h2>
                        <div class="jumlah-member text-xl font-semibold">{{$jumlahMember}}</div>
                    </div>
                    <div class="card-actions justify-end mt-auto">
                        <button class="btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full">
            <div class="card bg-warning text-primary-content h-full">
                <div class="card-body flex flex-col justify-between">
                    <div class="flex justify-between">
                        <h2 class="card-title"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path
                                        d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>
                            </i>Buku</h2>
                        <div class="jumlah-buku text-xl font-semibold">{{$jumlahBuku}}</div>
                    </div>
                    <div class="card-actions justify-end mt-auto">
                        <button class="btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full">
            <div class="card bg-success text-primary-content h-full">
                <div class="card-body flex flex-col justify-between">
                    <div class="flex justify-between">
                        <h2 class="card-title"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </i>Pinjam</h2>
                        <div class="jumlah-pinjam text-xl font-semibold">{{$jumlahPinjam}}</div>
                    </div>
                    <div class="card-actions justify-end mt-auto">
                        <button class="btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-full">
            <div class="card bg-error text-primary-content h-full">
                <div class="card-body flex flex-col justify-between">
                    <div class="flex justify-between">
                        <h2 class="card-title"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </i>Admin</h2>
                        <div class="jumlah-member text-xl font-semibold">{{$jumlahUser}}</div>
                    </div>
                    <div class="card-actions justify-end mt-auto">
                        <button class="btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

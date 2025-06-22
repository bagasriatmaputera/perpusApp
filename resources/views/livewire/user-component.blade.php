<div>
    {{-- In work, do what you enjoy. --}}
    <h1>Ini User Page</h1>
    {{-- Table User --}}
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($user as $users)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$users->nama}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->alamat}}</td>
                    <td>{{$users->telepon}}</td>
                    <td>{{$users->jenis}}</td>
                </tr>
                @endforeach
                {{ $user->links() }}
            </tbody>
        </table>
    </div>
</div>

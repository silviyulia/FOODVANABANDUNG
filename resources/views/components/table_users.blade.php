<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
    <table class="w-full text-sm text-left text-gray-800">
<caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar Nama User
        </caption>
        <thead class="text-xs uppercase bg-gray-200 text-gray-700">
            <tr>
                <th class="px-6 py-3">No.</th>
                <th class="px-6 py-3">Username</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Alamat</th>
                <th class="px-6 py-3">No. HP</th>
                <th class="px-6 py-3">Role</th>
                <th class="px-6 py-3">Photo Profile</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b hover:bg-gray-100">
                <td class="px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">{{ $user->username }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">{{ $user->alamat }}</td>
                <td class="px-6 py-4">{{ $user->no_hp }}</td>
                <td class="px-6 py-4">{{ $user->role }}</td>
                <td class="px-6 py-4">
                <img src="{{ asset('storage/profile/' . $user-> profile_photo) }}" alt="Gambar profile {{ $user->username }}" class="w-20 h-20 object-cover rounded-lg">

                </td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin hapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-600 hover:text-red-800 font-semibold px-3 py-1 bg-red-100 hover:bg-red-200 rounded transition text-sm">
                            <i class="fas fa-trash-alt me-1"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
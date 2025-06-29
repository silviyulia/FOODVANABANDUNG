<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700"> 
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar Nama users
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-200"> 
            <tr>
                <th scope="col" class="px-6 py-3">
                    no
                </th>
                <th scope="col" class="px-6 py-3">
                    username
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    No.HP
                </th>
                <th scope="col" class="px-6 py-3">
                    role
                </th>
                <th scope="col" class="px-6 py-3">
                    photo profile
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50"> 
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"> 
               {{ $loop-> iteration }}
            </th>
            <td class="px-6 py-4 text-gray-800"> 
                {{ $user->username }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $user->email }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $user-> alamat }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $user-> no_hp }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $user-> role }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                <img src="{{ asset('storage/profile/' . $user-> profile_photo) }}" alt="Gambar profile {{ $user->username }}" class="w-20 h-20 object-cover rounded-lg">
            </td>
            <td>
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="font-medium text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">Delete</button>
                </form>
            </td>
        </tr>
                @endforeach
        </tbody>
    </table>
</div>


                
                     
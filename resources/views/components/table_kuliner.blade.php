
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700"> 
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar kuliner Bandung
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-200"> 
            <tr>
                <th scope="col" class="px-6 py-3">
                    no
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama kuliner
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Rating
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $index => $item)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50"> 
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"> 
                        {{$index + 1}}
                    </th>
                    <td class="px-6 py-4 text-gray-800"> 
                        {{ $item->nama }}
                    </td>
                    <td class="px-6 py-4 text-gray-700"> 
                        {{ $item->deskripsi }}
                    </td>
                    <td class="px-6 py-4 text-gray-800"> 
                        Rp{{ $item->harga }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Kuliner {{ $item->nama }}" class="w-20 h-20 object-cover rounded-lg">
                    </td>
                    <td class="px-6 py-4 text-gray-800"> 
                        {{ $item->rating }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#"
                           class="font-medium text-blue-600 hover:underline me-3 edit-menu-button" 
                           data-modal-target="edit-menu-modal"
                           data-modal-toggle="edit-menu-modal"
                           data-menu-id="{{ $item->id }}"
                           data-menu-nama="{{ $item->nama }}"
                           data-menu-deskripsi="{{ $item->deskripsi }}"
                           data-menu-harga="{{ $item->harga }}"
                           data-menu-gambar="{{ $item->gambar }}"
                           data-menu-rating="{{ $item->rating }}">
                           Edit
                        </a>
                        <form action="{{ route('kuliner.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data menu yang tersedia.</td> 
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700"> 
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar data kontak
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-200"> 
            <tr>
                <th scope="col" class="px-6 py-3">
                    no
                </th>
                <th scope="col" class="px-6 py-3">
                    nama
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    pesan
                </th>
                <th scope="col" class="px-6 py-3">
                    tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontaks as $kontak)
              <tr class="bg-white border-b border-gray-200 hover:bg-gray-50"> 
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"> 
               {{ $loop->iteration }}
            </th>
            <td class="px-6 py-4 text-gray-800"> 
                {{ $kontak->nama }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $kontak->email }}
             </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $kontak->pesan }}
            </td>
            <td class="px-6 py-4 text-gray-800">
                {{ $kontak->created_at ? $kontak->created_at->format('d-m-Y H:i') : '' }}
            </td>
            </tr>
            @endforeach
        </tbody>
     </table>
</div>
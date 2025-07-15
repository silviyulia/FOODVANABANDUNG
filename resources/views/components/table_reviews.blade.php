<div class="container mt-6">
    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 text-sm px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700"> 
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar Ulasan Pelanggan
        </caption>
                <thead class="text-xs uppercase bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Menu</th>
                        <th class="px-6 py-3">Rating</th>
                        <th class="px-6 py-3">Komentar</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $review->user->username ?? 'Anonim' }}</td>
                            <td class="px-6 py-4">{{ $review->menu->nama }}</td>
                            <td class="px-6 py-4 text-yellow-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas {{ $i <= $review->rating ? 'fa-star' : 'fa-star text-gray-300' }}"></i>
                                @endfor
                                <span class="ml-1 text-sm text-gray-600">({{ $review->rating }})</span>
                            </td>
                            <td class="px-6 py-4 italic text-gray-700">{{ $review->komentar }}</td>
                            <td class="px-6 py-4">{{ $review->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus ulasan ini?');">
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
    </div>
</div>
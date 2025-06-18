<div id="edit-menu-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm"> 
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200"> 
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Item Menu
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-menu-modal"> {{-- Menghapus kelas dark --}}
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-menu-form" action="" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('PUT') 

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="edit_nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Kuliner</label> {{-- Menghapus kelas dark --}}
                        <input type="text" name="nama" id="edit_nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Masukkan nama kuliner" required> {{-- Menghapus kelas dark --}}
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label> 
                        <input type="number" name="harga" id="edit_harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Contoh: 15000" step="0.01" required> {{-- Menghapus kelas dark --}}
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_rating" class="block mb-2 text-sm font-medium text-gray-900">Rating (0-5)</label> 
                        <input type="number" name="rating" id="edit_rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Contoh: 4.5" step="0.1" min="0" max="5"> {{-- Menghapus kelas dark --}}
                    </div>
                    <div class="col-span-2">
                        <label for="edit_gambar" class="block mb-2 text-sm font-medium text-gray-900">Gambar Kuliner</label> 
                        <input type="file" name="gambar" id="edit_gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG or JPEG (MAX. 2MB).</p> 
                        <div id="current_image_preview" class="mt-2">
                            <p class="text-sm text-gray-700">Gambar saat ini:</p> 
                            <img src="" alt="Current Image" class="w-24 h-24 object-cover rounded-lg border border-gray-300" id="current_image_display"> 
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="edit_deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Produk</label> 
                        <textarea id="edit_deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis deskripsi kuliner di sini"></textarea> {{-- Menghapus kelas dark --}}
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"> {{-- Menghapus kelas dark --}}
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update Item Menu
                </button>
            </form>
        </div>
    </div>
</div>



<script>
    function setUpdateForm(actionUrl, nama, harga, deskripsi, fotoUrl) {
        // Set form action (URL update produk)
        document.getElementById('form-update-produk').action = actionUrl;

        // Isi field input di form update
        document.getElementById('update-nama').value = nama;
        document.getElementById('update-harga').value = harga;
        document.getElementById('update-deskripsi').value = deskripsi;

        // Set preview gambar lama
        document.getElementById('preview-foto').src = fotoUrl;
    }
</script>
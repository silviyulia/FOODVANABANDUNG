<!-- Modal Edit Menu -->
<div id="edit-menu-modal" tabindex="-1" aria-hidden="true"
     class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden flex items-center justify-center">
    <div class="relative w-full max-w-md p-4">
        <div class="bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Edit Item Menu</h3>
                <button type="button"
                    class="text-gray-500 hover:text-red-600 transition"
                    data-modal-toggle="edit-menu-modal">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Form -->
            <form id="edit-menu-form" action="" method="POST" enctype="multipart/form-data" class="px-4 py-5">
                @csrf
                @method('PUT')

                <div class="grid gap-4">
                    <!-- Nama -->
                    <div>
                        <label for="edit_nama" class="block mb-1 text-sm font-medium text-gray-700">Nama Kuliner</label>
                        <input type="text" name="nama" id="edit_nama"
                               class="w-full border border-gray-300 rounded-lg p-2 text-sm text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan nama kuliner" required>
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="edit_harga" class="block mb-1 text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="harga" id="edit_harga"
                               class="w-full border border-gray-300 rounded-lg p-2 text-sm text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Contoh: 15000" step="0.01" required>
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="edit_gambar" class="block mb-1 text-sm font-medium text-gray-700">Gambar Kuliner</label>
                        <input type="file" name="gambar" id="edit_gambar"
                               class="w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer">
                        <p class="text-xs text-gray-500 mt-1">Format: PNG, JPG, JPEG (maks. 2MB)</p>

                        <div id="current_image_preview" class="mt-3">
                            <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                            <img src="" id="current_image_display" alt="Preview"
                                 class="w-24 h-24 object-cover border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="edit_deskripsi" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="edit_deskripsi" rows="3"
                                  class="w-full border border-gray-300 rounded-lg p-2 text-sm text-gray-800 focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Tulis deskripsi kuliner..."></textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full bg-blue-700 hover:bg-blue-800 text-white rounded-lg py-2 mt-2 font-medium text-sm flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        Update Item Menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.edit-menu-button').forEach(button => {
        button.addEventListener('click', () => {
            const menuId = button.getAttribute('data-menu-id');
            const nama = button.getAttribute('data-menu-nama');
            const harga = button.getAttribute('data-menu-harga');
            const deskripsi = button.getAttribute('data-menu-deskripsi');
            const gambar = button.getAttribute('data-menu-gambar');
            const rating = button.getAttribute('data-menu-rating');

            // Set URL form sesuai route update
            const form = document.getElementById('edit-menu-form');
            form.action = `/kuliner/${menuId}`;

            // Isi input dengan data
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_deskripsi').value = deskripsi;
            document.getElementById('edit_rating').value = rating ?? '';

            // Preview gambar saat ini
            const imagePreview = document.getElementById('current_image_display');
            imagePreview.src = `/storage/${gambar}`;
        });
    });
</script>

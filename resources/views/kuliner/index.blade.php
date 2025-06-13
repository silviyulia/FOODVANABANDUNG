

@extends('layouts.appadmin')
@section('title', 'Daftar Menu Kuliner - FoodVana Bandung')



@section('content')

<main>
   
    <div class="container mx-auto px-4 py-6 pt-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Menu Kuliner</h1>

        <div class="mb-4 text-right">
            <a href="{{ route('kuliner.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Tambah Menu Baru</a>
        </div>

        @include('components.table_kuliner', ['menus' => $menus])

    </div>
</main>


@include('kuliner.edit')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace(); 

        const editMenuModal = document.getElementById('edit-menu-modal');
        const editMenuForm = document.getElementById('edit-menu-form');
        const currentImageDisplay = document.getElementById('current_image_display');

        // Event listener untuk tombol Edit di dalam tabel
        document.querySelector('table').addEventListener('click', function(event) {
            const editButton = event.target.closest('.edit-menu-button');

            if (editButton) {
                event.preventDefault(); // Mencegah navigasi default tautan

                // Ambil data dari atribut data-* pada tombol edit
                const menuId = editButton.dataset.menuId;
                const menuNama = editButton.dataset.menuNama;
                const menuDeskripsi = editButton.dataset.menuDeskripsi; // Gunakan 'data-menu-deskripsi'
                const menuHarga = editButton.dataset.menuHarga;
                const menuGambar = editButton.dataset.menuGambar;
                const menuRating = editButton.dataset.menuRating;

                console.log('Menu ID:', menuId);
                console.log('Target URL:', `{{ url('kuliner') }}/${menuId}`);
                // Isi field form modal dengan data yang diambil
                document.getElementById('edit_nama').value = menuNama;
                document.getElementById('edit_deskripsi').value = menuDeskripsi; // Mengisi textarea deskripsi
                document.getElementById('edit_harga').value = menuHarga;
                document.getElementById('edit_rating').value = menuRating;

                // Atur action form untuk update (penting untuk metode PUT)
                editMenuForm.action = `{{ url('kuliner') }}/${menuId}`; // URL: /kuliner/{id}

                // Tampilkan pratinjau gambar saat ini
                if (menuGambar) {
                    currentImageDisplay.src = `{{ asset('storage') }}/${menuGambar}`; // Sesuaikan path jika berbeda
                    currentImageDisplay.style.display = 'block';
                } else {
                    currentImageDisplay.src = '';
                    currentImageDisplay.style.display = 'none';
                }

                // Inisialisasi dan tampilkan modal menggunakan Flowbite
                // Pastikan `Modal` dari Flowbite tersedia. Flowbite 2.x+
                const { Modal } = flowbite;
                const modalInstance = new Modal(editMenuModal, {
                    backdrop: 'static',
                    backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40'
                });
                modalInstance.show();
            }
        });
    });
</script>

@endsection
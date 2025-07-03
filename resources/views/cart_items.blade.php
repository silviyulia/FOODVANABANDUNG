@extends('layouts.app2')

@section('content')
<div class="container mt-4">
    
<!-- notifikasi -->
    @if(session('error') || isset($error))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') ?? $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <h2 class="mb-3" style="color:rgb(195, 133, 10); text-shadow: 1px 1px 2px rgba(255, 255, 255, 1.7);">Keranjang Belanja</h2>
    @foreach($cartItems as $item)
        <div class="card mb-2 p-2" style="background-color:rgb(255, 255, 255); border-radius: 6px;">
            <div class="d-flex justify-content-between align-items-center">
                
                <!-- Gambar menu -->
                <div>
                    <img 
                        src="{{ asset('storage/' . $item->menu->gambar) }}" 
                        alt="{{ $item->menu->nama }}" 
                        width="75" 
                        height="75" 
                        style="object-fit: cover; border-radius: 8px;"
                    >
                </div>
                
                <!-- Info menu dan kontrol jumlah -->
                <div class="flex-grow-1 ms-3">
                    <h6>{{ $item->menu->nama }}</h6>

                    <form action="{{ route('cartitem.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        @method('PUT')

                        <label for="jumlah-{{ $item->id }}" class="me-2 mb-0">Jumlah:</label>

                        <div class="input-group input-group-sm w-auto me-2">
                            <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary">-</button>
                            <input 
                                type="number" 
                                id="jumlah-{{ $item->id }}" 
                                name="jumlah" 
                                value="{{ $item->jumlah }}" 
                                min="1" 
                                class="form-control text-center" 
                                style="max-width: 40px;"
                                readonly
                            />
                            <button type="submit" name="action" value="increase" class="btn btn-outline-secondary">+</button>
                        </div>
                    </form>

                    <div class="text-success fw-bold me-3" data-harga="{{ $item->menu->harga }}">
                    Rp{{ number_format($item->menu->harga, 0, ',', '.') }}
                </div>
                </div>

                <div class="item-total-price text-success fw-bold" id="total-{{ $item->id }}">
                 Rp{{ number_format($item->menu->harga * $item->jumlah, 0, ',', '.') }}
                        </div>

                <!-- Tombol hapus -->
                <form action="{{ route('cartitem.destroy', $item->id) }}" method="POST" class="ms-3">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>

            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-end ">
        <h4 style="color:rgb(195, 133, 10); text-shadow: 1px 1px 2px rgba(255, 255, 255, 1.7); ">Total: 
            <span class="text-success" id="grand-total" >
                Rp{{ number_format($cartItems->sum(function($item) { return $item->menu->harga * $item->jumlah; }), 0, ',', '.') }}
            </span>
        </h4>
    </div>
    <!-- Tombol Checkout -->
    @if($cartItems->count() > 0)
        <form action="{{ route('checkout') }}" method="POST" class="text-center">
        @csrf
        <input type="hidden" name="total" value="{{ $cartItems->sum(function($item) { return $item->menu->harga * $item->jumlah; }) }}">
        <button class="btn btn-success mt-3">Checkout</button>
        </form>
    


    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnDecrease = document.querySelectorAll('.btn-decrease');
        const btnIncrease = document.querySelectorAll('.btn-increase');

        function formatRupiah(angka) {
            return angka.toLocaleString('id-ID');
        }

        function updateTotalPrice(itemId) {
            const input = document.getElementById(`jumlah-${itemId}`);
            const pricePerItem = parseInt(input.getAttribute('data-harga'));
            const totalPriceElement = document.getElementById(`total-${itemId}`);
            const quantity = parseInt(input.value);
            const totalPrice = pricePerItem * quantity;
            totalPriceElement.innerText = `Rp${formatRupiah(totalPrice)}`;
            updateGrandTotal();
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.item-total-price').forEach(item => {
                const priceText = item.innerText.replace(/[^\d]/g, '');
                grandTotal += parseInt(priceText) || 0;
            });
            document.getElementById('grand-total').innerText = `Rp${formatRupiah(grandTotal)}`;
        }

        btnDecrease.forEach(btn => {
            btn.addEventListener('click', function () {
                const inputId = this.getAttribute('data-target');
                const input = document.getElementById(inputId);
                let currentVal = parseInt(input.value);
                if (currentVal > 1) {
                    input.value = currentVal - 1;
                    const itemId = inputId.split('-')[1];
                    updateTotalPrice(itemId);
                }
            });
        });

        btnIncrease.forEach(btn => {
            btn.addEventListener('click', function () {
                const inputId = this.getAttribute('data-target');
                const input = document.getElementById(inputId);
                let currentVal = parseInt(input.value);
                input.value = currentVal + 1;
                const itemId = inputId.split('-')[1];
                updateTotalPrice(itemId);
            });
        });
    });
    document.querySelector('form[action="{{ route('cartitem.checkout') }}"]').addEventListener('submit', function (e) {
    const grandTotalText = document.getElementById('grand-total').innerText.replace(/[^\d]/g, '');
    const totalInput = document.createElement('input');
    const btnDecrease = document.querySelectorAll('.btn-decrease');
    const btnIncrease = document.querySelectorAll('.btn-increase');
    totalInput.type = 'hidden';
    totalInput.name = 'total';
    totalInput.value = grandTotalText;
    this.appendChild(totalInput);

});

</script>
@endsection
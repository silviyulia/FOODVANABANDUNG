@extends('layouts.app2')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div class="container text-center mt-5">
    <div class="row justify-content-center" >
    <h4>Silakan lanjutkan pembayaran</h4>
    <button id="pay-button" class="btn btn-primary mt-3">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                // 👇 Ganti alert jadi redirect
                window.location.href = "/pesanan"; // atau sesuaikan dengan route pesananmu
            },
            onPending: function(result){
                alert("Menunggu pembayaran...");
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                alert("Kamu menutup popup tanpa menyelesaikan pembayaran");
            }
        });
    });
</script>

@endsection
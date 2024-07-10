<script>
$('.img').click(function() {
    $('.img').removeClass('z-index-1');
    $(this).addClass('z-index-1')
});

// code untuk menghitung estimasi lemari
document.addEventListener('DOMContentLoaded', function() {
    const panjangInput = document.getElementById('panjang');
    const tinggiInput = document.getElementById('tinggi');

    panjangInput.addEventListener('input', hitungEstimasiHarga);
    tinggiInput.addEventListener('input', hitungEstimasiHarga);

    function hitungEstimasiHarga() {
        let panjangCm = parseFloat(panjangInput.value) || 0;
        let tinggiCm = parseFloat(tinggiInput.value) || 0;

        // Konversi dari cm ke meter
        let panjangM = panjangCm / 100;
        let tinggiM = tinggiCm / 100;

        // Hitung luas dalam meter persegi
        let luasM2 = panjangM * tinggiM;

        // Harga per meter persegi
        let hargaPerM2 = 2350000;

        // Hitung harga estimasi
        let estimasiHarga = luasM2 * hargaPerM2;

        // Tampilkan hasilnya di input harga estimasi
        let hargaEstimasiInput = document.getElementById('harga-estimasi');
        hargaEstimasiInput.value = estimasiHarga.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    }
});
</script>
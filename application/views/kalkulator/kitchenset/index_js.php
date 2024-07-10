<script>
$('.img').click(function() {
    $('.img').removeClass('z-index-1');
    $(this).addClass('z-index-1')
});

// code untuk menghitung estimasi kitchen set
document.addEventListener('DOMContentLoaded', function() {
    function hitungHarga() {
        let kabAtas = document.getElementById('kab-atas').value;
        let kabBawah = document.getElementById('kab-bawah').value;

        // Konversi nilai dari cm ke meter
        let kabAtasMeter = kabAtas / 100;
        let kabBawahMeter = kabBawah / 100;

        // Harga per meter
        let hargaPerMeter = 2350000;

        let hargaKabAtas = kabAtasMeter * hargaPerMeter;
        let hargaKabBawah = kabBawahMeter * hargaPerMeter;

        document.getElementById('hasil-kab-atas').textContent = "Harga Kabinet Atas   : Rp " + hargaKabAtas
            .toLocaleString();
        document.getElementById('hasil-kab-bawah').textContent = "Harga Kabinet Bawah : Rp " + hargaKabBawah
            .toLocaleString();

        let hargaEstimasi = hargaKabAtas + hargaKabBawah;

        document.getElementById('harga-estimasi').value = "Rp " + hargaEstimasi.toLocaleString();
    }

    document.querySelector('.btn-cta1').addEventListener('click', function(event) {
        event.preventDefault();
        hitungHarga();
    });
});
</script>
<script>
    $(document).ready(function() {

        $('.btn-service').removeClass('service-active');
        $('#btn-service-<?= $this->uri->segment(3); ?>').addClass('service-active');
        $('#btn-konsep-<?= $this->uri->segment(5); ?>').addClass('serv-kons-active');
        var target_layanan = $('.service-active'); // Select the element with class .service-active
        if (target_layanan.length) {
            var scroll_layanan = $('#service-list-layanan');
            scroll_layanan.animate({
                scrollLeft: target_layanan.position().left + scroll_layanan.scrollLeft() - scroll_layanan.offset().left
            }, 1000); // Smooth scroll to the target element within the ul
        }
        var target_konsep = $('.serv-kons-active'); // Select the element with class .service-active
        if (target_konsep.length) {
            var scroll_konsep = $('#service-list-konsep');
            scroll_konsep.animate({
                scrollLeft: target_konsep.position().left + scroll_konsep.scrollLeft() - scroll_konsep.offset().left
            }, 1000); // Smooth scroll to the target element within the ul
        }

    });
    const elementId = 'btn-konsep-<?= $this->uri->segment(5); ?>';
    const originalUrl = document.getElementById(elementId).href;
    const urlParts = originalUrl.split('/');

    // Keep the segments up to 'Arsitektur'
    const newUrl = urlParts.slice(0, 7).join('/') + '/<?= preg_replace("![^a-z0-9]+!i", "-", $lokasi); ?>';

    console.log(newUrl);
    $('#' + elementId).attr('href', newUrl);

    $(document).ready(function() {});
    $('.img').click(function() {
        $('.img').removeClass('z-index-1');
        $(this).addClass('z-index-1')
    });
</script>
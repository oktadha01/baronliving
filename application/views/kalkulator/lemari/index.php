<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .gallery {
        --anim-time--hi: 266ms;
        --anim-time--med: 400ms;
        --anim-time--lo: 600ms;

        display: flex;
        place-content: center;
        max-width: clamp(30rem, 95%, 50rem);
        width: max(22.5rem, 100%);
        min-height: 100vh;
        margin-inline: auto;
        padding: clamp(0px, (30rem - 100vw) * 9999, 1rem);

    }

    .gallery__content--flow {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .gallery__content--flow>* {
        flex-grow: 1;
        flex-basis: calc((30rem - 100%) * 999);
    }

    figure {
        display: flex;
        min-width: 32rem;
        max-height: 32rem;
        position: relative;
        border-radius: .35rem;
        box-shadow:
            rgb(40, 40, 40, 0.1) 0px 2px 3px,
            rgb(20, 20, 20, 0.2) 0px 5px 8px,
            rgb(0, 0, 0, 0.25) 0px 10px 12px;
        overflow: hidden;
        transition: transform var(--anim-time--med) ease;
    }

    figure::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top,
                hsla(0, 0%, 0%, 0.8) 0%,
                hsla(0, 0%, 0%, 0.7) 12%,
                hsla(0, 0%, 0%, 0.2) 41.6%,
                hsla(0, 0%, 0%, 0.125) 50%,
                hsla(0, 0%, 0%, 0.01) 59.9%,
                hsla(0, 0%, 0%, 0) 100%);
        opacity: 0;
        transition-property: opacity, transform;
        transition-duration: var(--anim-time--med), var(--anim-time--med);
        transition-timing-function: ease, ease;
        z-index: 4;
    }

    .header__caption {
        z-index: 10;
        position: absolute;
        display: inline-flex;
        flex-direction: column;
        align-self: flex-end;
        width: 100%;
        gap: 0.5rem;
        padding: 1rem;
        justify-content: center;
        text-align: center;
        transform: translateY(100%);
        transition: transform var(--anim-time--hi) linear,
            opacity var(--anim-time--hi) linear;
    }

    figure:hover::before {
        opacity: 0.8;
    }

    figure:hover .header__caption {
        transform: translateY(0);
        opacity: 1;
    }

    figure:hover .img-grid-news {
        transform: scale(1);
    }

    .title {
        color: #fff;

    }

    .title--primary {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .title--secondary {
        text-transform: uppercase;
        font-weight: bold;
    }

    .img-grid-news {
        display: block;
        width: 100%;
        object-position: center;
        height: 100%;
        transform: scale(1.15);
        transition: 400ms ease-in-out;
    }

    .form-group {
    position: relative;
    width: 100%;
    }

    .satuan {
        position: absolute;
        right: 45%;
        top: 58%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 2;
    }
    .ket-harga{
        position: relative;
        text-align: left;
        margin-left: 6%;
    }

    .harga {
        border-color: #1893A8;
    }

    .harga:focus {
        border-color: #1893A8;
        box-shadow: 0 0 5px rgba(24, 147, 168, 0.5);
    }

    #panjang:focus, #tinggi:focus {
        border-color: #1893A8;
        box-shadow: 0 0 12px rgba(24, 147, 168, 0.5);
    }

    #harga-estimasi {
        color: #1893A8;
        font-weight: bold;
    }

    .flex-container {
        color: #fa7777;
        font-size: 14px;
        font-weight: bold;
    }

    .info {
        padding-top: 3px;
        font-size: 14px;
        color: #fa7777;
        font-weight: bold;
        max-width: 40cm;
    }

    .judul {
        padding-top: 3px;
        margin-bottom: -6px;
    }



@media (max-width: 576px) {

    .satuan {
        right: 34px;
        top:75%;
    }
    .form-group {
        margin-bottom: -22px;
    }

    .form-group .col-sm-3,
    .form-group .col-sm-4 {
        margin-bottom: 3px;
    }

    .label{
        margin-bottom: 1px;
    }

    .ket-harga{
        position: relative;
        text-align: left;
        margin-left: 0%;
    }

    #harga-estimasi {
        color: #1893A8;
        font-weight: bold;
    }
}
</style>

<main id="main">
    <section id="" class="portfolio mb-3 pb-3" style="position: fixed;width: -webkit-fill-available;z-index: 63; background: white;padding-bottom: 1px;">
        <div class="breadcrumbs mt-0">
            <div class="container">
                <div id="service" class="d-flex justify-content-between align-items-center">
                    <h2>Hitung Estimasi harga</h2>
                    <ol>
                        <li><a class="btn-service" href="<?php echo base_url('Kalkulate_estimasi/kitchen_set'); ?>">Kitchen Set</a></li>
                        <li><a class="btn-service" href="<?php echo base_url('Kalkulate_estimasi/lemari'); ?>">Lemari</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>
    <section id="" class="section pb-5 mb-5">
        <div class="container" style="background: #eceeef6e; border-radius: 14px;">
            <div class="section-header pt-3 mt-3" style="padding-bottom: 23px;">
                <h3 data-aos="fade-down" class="judul" >Kalkulator Harga Kabinet Lemari</h3>
                <span data-aos="fade-down" class="info">Tebal max 60cm, perhitungan P x T = ... m2</span>
                <form class="forms-sample pt-3">
                    <div class="form-group row">
                        <label for="kab-atas" class="col-sm-3 col-form-label">Panjang</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="panjang" placeholder=""><i class="satuan"> Cm</i>
                        </div>
                    </div>
                    <div class="form-group row mt-2 pt-2 kab-bawah">
                        <label for="kab-bawah" class="col-sm-3 col-form-label text-left">Tinggi</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="tinggi" placeholder=""><i class="satuan"> Cm</i>
                        </div>
                    </div>
                    <div class="form-group row mt-2 pt-2">
                        <label for="est-harga" class="col-sm-3 col-form-label text-left">Harga Estimasi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control harga" id="harga-estimasi" disabled>
                        </div>
                    </div>
                    <div class="ket-harga">
                        <h5 class="mt-3 pt-3">Keterangan:</h5>
                        <div class="flex-container">
                            <h6 class="mt-0 pt-0 mb-0 pb-0">Tebal standar kabinet lemari 60cm ( P x T )</h6>
                            <h6 class="mt-0 pt-0">Perhitungan m2 ( Meter persegi )</h6>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
</main>


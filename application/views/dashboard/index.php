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
        /* object-fit: cover; */
        object-position: center;
        height: 100%;
        transform: scale(1.15);
        /* aspect-ratio: 16 / 13; */
        transition: 400ms ease-in-out;
    }
</style>
<section id="home" class="pt-5rem pb-5 d-flex align-items-center">
    <div class="d-flex flex-column align-items-center position-relative min-height-video w-100" data-aos="zoom-out">
        <section class="video-container">
            <video src="assets/video/Kayunara.mp4" autoplay loop playsinline muted></video>
            <div class="callout">
                <h1 class="text-light tile-video-header">AT THE WATER’S EDGE – FISHERMAN’S HOUSE BY STUDIO PRINEAS</h1>
                <div class="button">
                    <div class="inner">Watch Video</div>
                </div>
            </div>
        </section>
    </div>
</section>

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class=" p-0">
        <div class="container" style="background: #eceeef6e;border-radius: 14px;">

            <div class="section-header pt-2">
                <!-- <span><span class="font-auto size-50px">A</span><span class="font-auto size-30px">bout us</span></span> -->
                <h2 data-aos="fade-down">Realisasikan Idemu <br>
                    Bersama Baron Living Studio
                </h2>
                <p class="text-dark" data-aos="fade-left">
                    Baron Living Studio menawarkan One Stop Solution untuk semua kebutuhan Interiormu.
                    Kami merencanakan, merancang, melakukan konstruksi, dan custom furnitur dengan penuh dedikasi dan kreativitas.
                    Membantumu mewujudkan ruangan yang nyaman, fungsional, dan estetis untuk beristirahat, bekerja, serta menikmati kehidupan.
                    Cukup ceritakan desain impianmu dan tim kami akan bekerja untuk merealisasikannya.
                </p>
                <center class="mt-5" data-aos="fade-right">
                    <p><a class="btn-cta" href="#">Ceritakan Idemu </a></p>
                </center>
            </div>
            <!-- <hr> -->
        </div>
    </section><!-- End About Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="services" class="p-0">
        <div class="container container-service" data-aos="fade-up">
            <div class="section-header pb-2">
                <h2>Pilih Kebutuhanmu</h2>
            </div>
            <div class="row services">
                <?php
                $no = 1;
                foreach ($data_service as $data) {
                    $id_service = $data->id_service;
                    $tittle_service = $data->tittle_service;
                    $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                ?>

                    <div class="col-xl-3 col-md-6" data-aos="fade-left" data-aos-delay="<?= $no++; ?>00" style="margin-top: 8rem;">
                        <div class="service-item">
                            <div class="details position-relative" style="min-height: 12rem;">
                                <div class="icon">
                                    <img src="<?php echo base_url('assets'); ?>/img/<?= $data->tittle_service; ?>.png" alt="" class="img-fluid">
                                    <!-- <i class="bi bi-person-workspace"></i> -->
                                </div>
                                <a href="<?php echo base_url(); ?>detail/data/<?php echo $tittle; ?>" class="stretched-link">
                                    <h3><?= $data->tittle_service; ?></h3>
                                </a>
                                <p class="font-title-service text-dark"><?= $data->desc; ?></p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                <?php
                }
                ?>
            </div>
        </div>
        <div class="container cta aos-init aos-animate mt-5" data-aos="zoom-out">

            <div class="row g-5">
                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first" data-aos="fade-right">
                    <h3>Konsultasi <em>Gratis</em></h3>
                    <p>Ceritakan setiap ide dan harapanmu dan dapatkan solusi terbaik secara cuma - cuma dari tim arsitek berpengalaman.</p>
                    <a class="btn-cta align-self-start" href="#">Coba Sekarang</a>
                </div>

                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center" data-aos="fade-left">
                    <div class="img">
                        <img src="assets/img/20231106-TMA06483.jpg" alt="" class="img-fluid">
                    </div>
                </div>

            </div>

        </div>
        <div class="container services" data-aos="fade-up">

            <div class="section-header">
                <h2>Mengapa Harus Baron Living Studio ?</h2>
                <!-- <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p> -->
            </div>
            <div class="row gy-5">
                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="img">
                            <img src="assets/img/services-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <img src="assets/img/desain-berkualitas.png" class="img-fluid" alt="">
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Desain Berkualitas</h3>
                            </a>
                            <p>Kami tidak sekadar menciptakan desain yang estetis, melainkan juga mengedepankan fungsionalitas ruang dan
                                didukung oleh tim profesional yang berpengalaman.
                            </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="img">
                            <img src="assets/img/services-2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <img src="assets/img/harga-kompetitif.png" class="img-fluid" alt="">
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Harga Kompetitif</h3>
                            </a>
                            <p>Dengan harga yang dapat disesuaikan dengan budget,
                                kami memastikan bahwa setiap orang bisa menikmati desain interior berkualitas tanpa perlu merogoh kocek terlalu dalam. </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="service-item">
                        <div class="img">
                            <img src="assets/img/services-3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <img src="assets/img/cs.png" class="img-fluid" alt="">
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Customer Service</h3>
                            </a>
                            <p>Jarak bukanlah halangan bagi kami untuk memberikan layanan terbaik kepada customers. Kami menawarkan pelayanan secara online maupun offline dengan respon cepat dan profesional.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="service-item">
                        <div class="img">
                            <img src="assets/img/services-4.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <img src="assets/img/one-step-solution.png" class="img-fluid" alt="">
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>One Stop Solution</h3>
                            </a>
                            <p>Kamu tidak perlu repot mencari berbagai penyedia jasa, karena Baron Living Studio menyediakan semua kebutuhan desain dan bangun dalam satu tempat.</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>
    </section>

    <section id="portfolio" class="pb-0">

        <div class="container">
            <div class="section-header">
                <h2>Project Kami </h2>
                <!-- <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p> -->
            </div>
            <div class="container mt-3">
                <?php
                foreach ($data_service as $data) {
                ?>
                    <?php if ($data->tittle_service == 'Arsitektur') { ?>
                        <?php
                        $id_arsitek = $data->id_service;
                        $service = "(SELECT * FROM project, project_service, foto Where 
                        project_service.tittle_project = project.project_id 
                        AND foto.id_foto_service = project_service.id_project 
                        AND project_service.id_service_project = " . $id_arsitek . " ORDER BY RAND() LIMIT 1)";
                        $query = $this->db->query($service);
                        foreach ($query->result() as $rows) {
                            $nm_project = $rows->nm_project;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                        ?>
                            <div class="row" data-aos="fade-down">
                                <a href="<?php echo base_url(); ?>detail/project/Arsitektur/<?php echo $tittle; ?>">

                                    <div class="col-12 img-col12">
                                        <img src="<?= base_url('upload'); ?>\service\<?= $rows->foto_service; ?>" class="img-fluid" style="position: relative; bottom: 50%;">
                                    </div>
                                    <div style="position: relative;">
                                        <h1 class="text-pos size-col12">Arsitektur <?= $rows->nm_project; ?></h1>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    <?php } ?>
                <?php } ?>
                <div class="row">
                    <?php
                    foreach ($data_service as $data) {
                    ?>
                        <?php if ($data->tittle_service == 'Desain Interior') { ?>
                            <?php
                            $id_interior = $data->id_service;
                            $service = "(SELECT * FROM project, project_service, foto Where 
                        project_service.tittle_project = project.project_id 
                        AND foto.id_foto_service = project_service.id_project 
                        AND project_service.id_service_project = " . $id_interior . " ORDER BY RAND() LIMIT 1)";
                            $query = $this->db->query($service);
                            foreach ($query->result() as $rows) {
                                $nm_project = $rows->nm_project;
                                $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                            ?>

                                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right">
                                    <a href="<?php echo base_url(); ?>detail/project/Desain-Interior/<?php echo $tittle; ?>">
                                        <div class="img-col6">
                                            <img src="<?= base_url('upload'); ?>\service/<?= $rows->foto_service; ?>" class="img-fluid">
                                        </div>
                                        <div style="position: relative;">
                                            <h1 class="text-pos size-col12">Interior <?= $rows->nm_project; ?></h1>

                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        <?php } ?>
                        <?php if ($data->tittle_service == 'Custom Furnitur') { ?>
                            <?php
                            $id_furnitur = $data->id_service;
                            $service = "(SELECT * FROM project, project_service, foto Where 
                        project_service.tittle_project = project.project_id 
                        AND foto.id_foto_service = project_service.id_project 
                        AND project_service.id_service_project = " . $id_furnitur . " ORDER BY RAND() LIMIT 1)";
                            $query = $this->db->query($service);
                            foreach ($query->result() as $rows) {
                                $nm_project = $rows->nm_project;
                                $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                            ?>
                                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left">
                                    <a href="<?php echo base_url(); ?>detail/project/Custom-Furnitur/<?php echo $tittle; ?>">
                                        <div class="img-col6">
                                            <img src="<?= base_url('upload'); ?>\service\<?= $rows->foto_service; ?>" class="img-fluid">
                                        </div>
                                        <div style="position: relative;">
                                            <h1 class="text-pos size-col6">Furnitur <?= $rows->nm_project; ?></h1>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="row" data-aos="fade-down">
                    <?php
                    foreach ($data_service as $data) {
                    ?>
                        <?php if ($data->tittle_service == 'Kontraktor') { ?>
                            <?php
                            $id_kontraktor = $data->id_service;
                            $service = "(SELECT * FROM project, project_service, foto Where 
                        project_service.tittle_project = project.project_id 
                        AND foto.id_foto_service = project_service.id_project 
                        AND project_service.id_service_project = " . $id_kontraktor . " ORDER BY RAND() LIMIT 1)";
                            $query = $this->db->query($service);
                            foreach ($query->result() as $rows) {
                                $nm_project = $rows->nm_project;
                                $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                            ?>
                                <a href="<?php echo base_url(); ?>detail/Kontraktor/Arsitektur/<?php echo $tittle; ?>">

                                    <div class="col-12 img-col12">
                                        <img src="<?= base_url('upload'); ?>\service\<?= $rows->foto_service; ?>" class="img-fluid" style="position: relative; bottom: 50%;">
                                    </div>
                                    <div style="position: relative;">
                                        <h1 class="text-pos size-col12">Kontraktor <?= $rows->nm_project; ?></h1>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="section-header">
                <h2>Teman Perjalananmu</h2>
                <p>Baron Living Studio bukan sekadar jasa desain interior. Kami bersedia menjadi mitra dan teman perjalananmu dalam mewujudkan ruang ideal sesuai keinginan. Dengan komunikasi yang terbuka dan informatif, kami akan mendengarkan setiap kebutuhan dan ide-ide unikmu.</p>
            </div>
            <hr>
        </div>
    </section><!-- End Services Section -->
    <!-- ======= artikel Section ======= -->
    <section id="Artikel" class="recent-blog-posts pt-0">

        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-header">
                <h2>Artikel</h2>
                <!-- <p>Recent posts form our Blog</p> -->
            </div>

            <div class="row">
                <?php
                foreach ($data_artikel as $data) :
                    $judul_berita = $data->judul_berita;
                    $tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);
                ?>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img"><img src="<?= base_url('upload'); ?>/<?= $data->foto_berita; ?>" class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date"><?= $data->tgl_berita; ?></span>
                                <span class="post-author" style="float: right;"><?= $data->view_berita; ?> <i class="bi bi-eye"></i></span>
                            </div>
                            <h3 class="post-title"><?= $data->judul_berita; ?></h3>
                            <!-- <p>Illum voluptas ab enim placeat. Adipisci enim velit nulla. Vel omnis laudantium. Asperiores eum ipsa est officiis. Modi cupiditate exercitationem qui magni est...</p> -->
                            <a href="<?= base_url('Artikel/page/') . $tittle_news; ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <center>
                        <a href="<?php echo base_url('Artikel'); ?>" class="btn-cta">Lihat Artikel Lainnya >></a>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact p-0">


        <div class="map mb-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.362989887481!2d110.81096251509858!3d-7.535330694565338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a171d65386257%3A0x79b21376dda5cd5b!2sBaron%20Living%20Studio!5e0!3m2!1sid!2sid!4v1669359251622!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
        </div><!-- End Google Maps -->


    </section><!-- End Contact Section -->

</main><!-- End #main -->
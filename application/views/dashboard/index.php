<section id="home" class="pt-5rem d-flex align-items-center">
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
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span><span class="font-auto size-50px">A</span><span class="font-auto size-30px">bout us</span></span>
                <p class="font-desk-service font-initial text-dark">We are a professional contractor engaged in the manufacture of custom furniture and interiors
                    for homes, offices, apartments, restaurants. Experienced and ready to make your dream home come true.
                    Our commitment is to provide the best service for international class interiors at affordable prices.
                </p>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="services" class="p-0">
        <div class="container container-service" data-aos="fade-up">
            <div class="section-header pb-0">
                <span><span class="font-auto size-50px">O</span><span class="font-auto size-30px">ur service</span></span>
            </div>
            <hr>
            <?php
            foreach ($data_architec as $data) {
                $id_service = $data->id_service;
            ?>
                <div class="row g-5">
                    <span>
                        <?php
                        $sql = "SELECT * FROM project_service, foto WHERE project_service.id_service_project = '$id_service' AND foto.id_foto_service = project_service.id_project ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="img img-fluid" alt="gambar duniailkom" style="height: auto;margin: 0px 0px 5px 11px;max-width: 193px;" align="right" data-aos="zoom-in" data-aos-delay="200" />
                        <?php
                            }
                        }
                        ?>
                        <h4 class="font-title-service"><?php echo $data->tittle_service; ?></h4>
                        <p class="font-desk-service font-initial" style="text-indent: 22px;">
                            The house is set in a plot with a long-wide ratio of 6 to 1, which emerges from rocks bathed by the sea.
                            This two-story house plus basement has been built in an area of consolidated constructions The extreme proportion
                            of the site together with the fact that the views are towards the north, have been the main conditions of the project.
                            A 47 meters long dry stone wall is the backbone of the house.
                        </p>
                    </span>
                </div>
                <div class="row g-0 portfolio container over-height">
                    <?php
                    $sql = "SELECT * FROM project_service, foto WHERE foto.id_foto_service = project_service.id_project AND project_service.id_service_project = '$id_service' GROUP BY project_service.id_project ORDER BY RAND() limit 4 ";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $project) {
                            $id_project = $project->id_project;
                            $tittle_project = $project->tittle_project;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_project);

                    ?>
                            <div class="col-lg-3 col-md-3 col-6 portfolio-item filter-app">
                                <?php
                                $sql = "SELECT * FROM foto WHERE id_foto_service = $id_project ORDER BY RAND() limit 1";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $foto_rand) {
                                ?>
                                        <!-- <div class="" style="height: 100%; width: max-content; min-width: -webkit-fill-available; position: relative;overflow: hidden;"> -->
                                        <div class="" style="height: 100%; width: max-content; min-width: -webkit-fill-available; position: relative;overflow: hidden;">
                                            <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto_rand->foto_service; ?>" class="max-height img img-fluid p-relative" alt="" data-aos="zoom-in" data-aos-delay="300">
                                        </div>
                                        <div class="portfolio-info">
                                            <h4 class="title-project-dash"><?php echo $project->tittle_project; ?></h4>
                                            <!-- <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto_rand->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a> -->
                                            <a href="<?php echo base_url(); ?>detail/project/<?php echo $tittle; ?>/<?php echo $project->id_project; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                        </div>
                                        <div id="icon_drag_mobile"></div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="row mt-3">
                    <div class="text-center section-header pb-0">
                        <a href="<?php echo base_url(); ?>detail/data/<?php echo $data->tittle_service; ?>" class="btn-more">More detail</a>
                    </div>
                </div>
                <hr class="mt-5 mb-5">
            <?php
            }
            ?>
        </div>
    </section>
    <!-- ======= On Focus Section ======= -->

    <section id="portfolio" class="p-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header pb-0">
                <span><span class="font-auto size-50px">P</span><span class="font-auto size-30px">ortfolio</span></span>

            </div>
            <hr>
            <div class="row gy-1">
                <?php
                foreach ($data_portfolio as $porto) {
                    $id_project = $porto->id_project;
                    $tittle_project = $porto->tittle_project;
                    $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_project);
                ?>
                    <div class="col-lg-3 col-md-3 col-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <?php
                            $sql = "SELECT * FROM foto WHERE id_foto_service = $id_project ORDER BY RAND() limit 1";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $foto_rand) {
                            ?>
                                    <div class="img border-r-0px">
                                        <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto_rand->foto_service; ?>" class=" size-img-dash img-fluid" alt="">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <span class="mb-0 font-text-port"><?php echo $porto->tittle_service; ?></span>
                            <span class="mb-0 font-text-port float-right"><?php echo $porto->view; ?> views</span>
                            <hr class="m-0">
                            <a href="<?php echo base_url(); ?>detail/project/<?php echo $tittle; ?>/<?php echo $porto->id_project; ?>" class="stretched-link text-dark">
                                <h3 class="font-size-title mt-0"><?php echo $porto->tittle_project; ?></h3>
                                <p class="desk-port"><?php echo $porto->desc_project; ?>.</p>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <hr>
        </div>
    </section><!-- End Services Section -->



    <!-- ======= Contact Section ======= -->
    <section class="contact pb-0">


        <div class="map mb-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.362989887481!2d110.81096251509858!3d-7.535330694565338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a171d65386257%3A0x79b21376dda5cd5b!2sBaron%20Living%20Studio!5e0!3m2!1sid!2sid!4v1669359251622!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
        </div><!-- End Google Maps -->


    </section><!-- End Contact Section -->

</main><!-- End #main -->
<style>

</style>
<main id="main" class="mt-4">
    <section id="" class="services pb-4 pt-4" style="position: fixed;width: -webkit-fill-available;z-index: 63;background: #ebebeb;top: 64px;margin: 1px 10px;border-radius: 10px;border: 4px solid whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4 style="color: #485664;">Layanan</h4>
                    <ul class="ul-list-heriz" id="service-list-layanan">

                        <?php
                        foreach ($data_service as $data) :
                            $tittle_service = $data->tittle_service;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                        ?>
                            <li class="mt-2 mb-3"><a id="btn-service-<?= $tittle; ?>" class="btn-service" href="<?php echo base_url(); ?>Layanan/jasa/<?= $tittle; ?>/<?= preg_replace("![^a-z0-9]+!i", "-", $lokasi); ?>"><?= $data->tittle_service; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h4 style="color: #485664;">konsep</h4>
                    <ul class="ul-list-heriz" id="service-list-konsep">
                        <?php

                        $displayed_titles = []; // Initialize an array to keep track of displayed titles

                        foreach ($konsep as $data) :
                            $titles = explode(',', $data->data_konsep);
                            foreach ($titles as $title) {
                                $title = trim($title); // Remove any leading/trailing whitespace
                                $sanitized_title = preg_replace("![^a-z0-9]+!i", "-", htmlspecialchars($title, ENT_QUOTES, 'UTF-8'));
                                if (!in_array($sanitized_title, $displayed_titles)) {

                                    $displayed_titles[] = $sanitized_title; // Add title to displayed titles array
                        ?>
                                    <li class="mt-2 mb-3"><a id="btn-konsep-<?= $sanitized_title; ?>" class="btn-service" href="<?php echo base_url(); ?>Layanan/jasa/<?= $this->uri->segment(3); ?>/konsep/<?= $sanitized_title; ?>/<?= preg_replace("![^a-z0-9]+!i", "-", $lokasi); ?>"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></a></li>
                        <?php
                                }
                            }
                        endforeach;
                        ?>
                </div>
            </div>
        </div>
    </section>
    
    <section id="services" class="p-service" data-aos="fade-up">
        <!-- <div class="container" > -->
        <div class="container">
            <?php if ($this->uri->segment(3) == 'all') {
            ?>
                <div class="section-header">
                    <p class="text-dark">Baron Living Studio menawarkan One Stop Solution untuk semua kebutuhan Interiormu.
                        Kami merencanakan, merancang, melakukan konstruksi, dan custom furnitur dengan penuh dedikasi dan kreativitas.
                        Membantumu mewujudkan ruangan yang nyaman, fungsional, dan estetis untuk beristirahat, bekerja, serta menikmati kehidupan.
                        Cukup ceritakan desain impianmu dan tim kami akan bekerja untuk merealisasikannya.</p>
                </div>

                <?php
            } else {

                foreach ($detail_service as $data) :
                    $id_service = $data->id_service;
                ?>
                    <div class="section-header">
                        <h3 class="font-auto"> <?= $_title; ?></h3>
                        <p class="text-dark"><?= $data->desc; ?></p>
                    </div>
            <?php
                endforeach;
            }

            ?>

        </div>
        <div id="" class="container gallery__content--flow">
            <?php
            foreach ($project as $data_project) {
                $id_project = $data_project->id_project;
                $nm_project = $data_project->nm_project;
                $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
            ?>
                <a href="<?php echo base_url(); ?>detail/project/<?= $this->uri->segment(3); ?>/<?php echo $tittle; ?>" class="figure">
                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $data_project->foto_service; ?>" class="img-grid-news">

                    <figcaption class="header__caption" role="presentation">
                        <?php if ($this->uri->segment(3) == 'all') {
                        ?>
                            <h4 class="title title--secondary">
                                <?php echo $data_project->tittle_service; ?> <?php echo $data_project->nm_project; ?>
                            </h4>
                        <?php
                        } else {
                        ?>
                            <h3 class="title title--secondary">
                                <?php echo $data_project->nm_project; ?>
                            </h3>
                        <?php
                        }
                        ?>
                    </figcaption>
                </a>
            <?php
            }
            ?>
        </div>
        <!-- </div> -->
    </section><!-- End Services Section -->
</main>
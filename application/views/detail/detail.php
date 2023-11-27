<style>

</style>
<main id="main" class="mt-4">
    <section id="" class="portfolio" style="position: fixed;width: -webkit-fill-available;z-index: 63; background: white;padding-bottom: 1px;">
        <div class="breadcrumbs mt-0">
            <div class="container">

                <div id="service" class="d-flex justify-content-between align-items-center">
                    <h2>Project</h2>
                    <ol>
                        <?php
                        foreach ($data_service as $data) :
                            $tittle_service = $data->tittle_service;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                        ?>
                            <li><a class="btn-service" href="<?php echo base_url(); ?>detail/data/<?= $tittle; ?>"><?= $data->tittle_service; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                        <li><a class="btn-service" href="<?php echo base_url(); ?>detail/data/all">ALL</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>
    <section id="portfolio" class="pt-12rem">
        <div class="container" data-aos="fade-up">
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
                            <!-- <h2 class="font-auto"><?php echo $data->tittle_service; ?></h2> -->
                            <p class="text-dark"><?= $data->desc; ?></p>
                        </div>
                <?php
                    endforeach;
                }

                ?>

            </div>
            <div class="container gallery__content--flow">
                <?php
                foreach ($detail_service as $data) :
                    $id_service = $data->id_service;
                ?>
                    <?php
                    $sql = "SELECT * FROM service, project_service, project WHERE service.id_service = project_service.id_service_project AND project.project_id = project_service.tittle_project AND project_service.id_service_project = '$id_service'";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $project) {
                            $id_project = $project->id_project;
                            $nm_project = $project->nm_project;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_project);
                    ?>
                            <a href="<?php echo base_url(); ?>detail/project/<?= $this->uri->segment(3); ?>/<?php echo $tittle; ?>" class="figure">
                                <?php
                                $sql = "SELECT * FROM foto WHERE foto.id_foto_service = '$id_project' ORDER BY RAND() limit 1";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $foto) {
                                ?>
                                        <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="img-grid-news" alt="A light brown, long-haired chihuahua sitting next to three rubber duckies. " title="Photo by Giacomo Lucarini for Unsplash">
                                <?php
                                    }
                                }
                                ?>
                                <figcaption class="header__caption" role="presentation">
                                    <?php if ($this->uri->segment(3) == 'all') {
                                    ?>
                                        <h4 class="title title--secondary">
                                            <?php echo $project->tittle_service; ?> <?php echo $project->nm_project; ?>
                                        </h4>
                                    <?php
                                    } else {
                                    ?>
                                        <h3 class="title title--secondary">
                                            <?php echo $project->nm_project; ?>
                                        </h3>
                                    <?php
                                    }
                                    ?>
                                </figcaption>
                            </a>
                    <?php
                        }
                    }
                    ?>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section><!-- End Services Section -->
</main>
<style>

</style>
<main id="main" class="mt-4">
    <section id="portfolio" class="">
        <div class="container" data-aos="fade-up">
            <div class="container">

                <?php
                foreach ($detail_service as $data) :
                    $id_service = $data->id_service;
                ?>
                    <div class="section-header">
                        <h2 class="font-auto"><?php echo $data->tittle_service; ?></h2>
                        <p class="font-desk-service font-initial text-dark"><?= $data->desc; ?></p>
                    </div>
                <?php
                endforeach;
                ?>

            </div>
            <div class="container gallery__content--flow">
                <?php
                $sql = "SELECT * FROM project_service, project WHERE project.project_id = project_service.tittle_project AND project_service.id_service_project = '$id_service'";
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
                                <h1 class="title title--secondary">
                                    <?php echo $project->nm_project; ?>
                                </h1>
                            </figcaption>
                        </a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section><!-- End Services Section -->
</main>
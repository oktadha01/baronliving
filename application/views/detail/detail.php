<main id="main" class="mt-4">
    <section id="portfolio" class="">
        <div class="container" data-aos="fade-up">
            <?php
            foreach ($detail_service as $data) :
                $id_service = $data->id_service;
            ?>
                <div class="container">

                    <div class="section-header">
                        <h2 class="font-auto"><?php echo $data->tittle_service; ?></h2>
                        <p class="font-desk-service font-initial text-dark">Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p>
                    </div>

                </div>
                <hr>
                <div class="row gy-1">
                    <?php
                    $sql = "SELECT * FROM project_service WHERE project_service.id_service_project = '$id_service'";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $project) {
                            $id_project = $project->id_project;
                            $tittle_project = $project->tittle_project;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_project);
                    ?>
                            <div class="col-lg-3 col-md-3 col-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="service-item">
                                    <div class="img border-r-0px">
                                        <?php
                                        $sql = "SELECT * FROM foto WHERE foto.id_foto_service = '$id_project' ORDER BY RAND() limit 1";
                                        $query = $this->db->query($sql);
                                        if ($query->num_rows() > 0) {
                                            foreach ($query->result() as $foto) {
                                        ?>
                                                <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class=" size-img-dash img-fluid" alt="">
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a href="<?php echo base_url(); ?>detail/project/<?php echo $tittle; ?>/<?php echo $project->id_project; ?>" class="stretched-link text-dark">
                                        <h3 class="font-size-title"><?php echo $project->tittle_project; ?></h3>
                                        <p class="desk-port"><?php echo $project->desc_project; ?></p>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <hr>
            <?php
            endforeach;
            ?>
        </div>
    </section><!-- End Services Section -->



</main>
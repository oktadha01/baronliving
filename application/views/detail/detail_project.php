<main id="main" class="mt-4">
    <section id="" class="portfolio" data-aos="fade-up">
        <?php
        foreach ($detail_project as $data) :
            $id_project = $data->id_project;
        ?>
            <div class="container">

                <div class="section-header">
                    <h2 class="font-auto"><?php echo $data->tittle_project; ?></h2>
                    <p class="font-desk-service font-initial text-dark">Non hic nulla eum consequatur maxime ut vero memo vero totam officiis pariatur eos dolorum sed fug dolorem est possimus esse quae repudiandae. Dolorem id enim officiis sunt deserunt esse soluta consequatur quaerat</p>
                </div>

            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                    <div class="row g-0 portfolio-container">
                        <!-- LANDSCAPE -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='landscape' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-landscape img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- PORTRAIT -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='portrait' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item max-col-portrait" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-portrait img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- LANDSCAPE -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='landscape' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-landscape img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- PORTRAIT -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='portrait' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item max-col-portrait" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-portrait img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- PORTRAIT -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='portrait' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item max-col-portrait" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-portrait img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- LANDSCAPE -->
                        <?php
                        $sql = "SELECT * FROM foto WHERE id_foto_service = '$id_project' AND orientasi_foto='landscape' ORDER BY RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                        ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item" data-aos="zoom-in" data-aos-delay="200">
                                    <img src="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" class="max-landscape img-fluid img p-relative" alt="">
                                    <div class="portfolio-info">
                                        <h4>App 1</h4>
                                        <a href="<?php echo base_url('upload'); ?>/service/<?php echo $foto->foto_service; ?>" title="App 1" data-gallery="portfolio-gallery" class="right-50px glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <div id="icon_drag_mobile"></div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </section>
</main>
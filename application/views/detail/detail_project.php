<style>
    .portfolio-details .portfolio-details-slider img {
        width: 100%;
        border-radius: 20px;
    }
</style>
<main id="main" class="mt-4">
    <section id="" class="portfolio" data-aos="fade-up">
        <div class="breadcrumbs mt-3">
            <div class="container">

                <div id="service" class="d-flex justify-content-between align-items-center">
                    <h2><?= $this->uri->segment(4); ?></h2>
                    <ol>
                        <?php
                        foreach ($service as $data) :
                            $tittle_service = $data->tittle_service;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                        ?>
                            <li><a class="btn-service" href="<?php echo base_url(); ?>detail/project/<?= $tittle; ?>/<?= $this->uri->segment(4); ?>"><?= $data->tittle_service; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                        <li><a class="btn-service" href="<?php echo base_url(); ?>detail/project/all/<?= $this->uri->segment(4); ?>">ALL</a></li>
                    </ol>
                </div>

            </div>
        </div>



        <?php
        foreach ($detail_project as $row) {
            $idservice = $row->id_service;
        ?>
            <section id="portfolio-details" class="portfolio-details pb-0">
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                <div class="swiper-wrapper align-items-center" id="swiper-wrapper-aabe2730f2cdf199" aria-live="off" style="transform: translate3d(-4415.93px, 0px, 0px); transition-duration: 0ms;">
                                    <?php
                                    $no = 0;
                                    foreach ($foto_project as $data) {


                                    ?>
                                        <?php
                                        if ($data->id_service == $idservice) {
                                        ?>
                                            <div class="swiper-slide" data-swiper-slide-index="<?= $no++; ?>" role="group">
                                                <img src="<?= base_url('upload'); ?>\service\<?= $data->foto_service; ?>" alt="">
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    <?php
                                    } ?>
                                </div>
                                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">

                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <!-- <h3>Project information</h3> -->
                                <h2><?= $row->tittle_service; ?></h2>
                                <hr>
                                <p>
                                    <?= $data->desc_project; ?>
                                </p>
                            </div>
                            <div class="portfolio-description">
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </section>
        <?php
        }
        ?>
    </section>
</main>

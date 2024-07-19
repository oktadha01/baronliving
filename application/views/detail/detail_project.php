<style>
    .portfolio-details .portfolio-details-slider img {
        width: 100%;
        border-radius: 20px;
    }
</style>
<main id="main" class="mt-4">
    <section id="" class="portfolio pb-1 pt-1" style="position: fixed;width: -webkit-fill-available;z-index: 63;background: #ebebeb;top: 64px;margin: 1px 10px;border-radius: 10px;border: 4px solid whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 style="color: #485664;"><?= $this->uri->segment(4); ?></h4>
                    <ul class="ul-list-heriz m-0" id="service-list-layanan">
                        <?php
                        foreach ($service as $data) :
                            $tittle_service = $data->tittle_service;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                        ?>
                            <li class="mt-2 mb-3"><a id="btn-service-<?= $tittle; ?>" class="btn-service" href="<?php echo base_url(); ?>detail/project/<?= $tittle; ?>/<?= $this->uri->segment(4); ?>"><?= $data->tittle_service; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                        <li class="mt-2 mb-3"><a id="btn-service-all" class="btn-service" href="<?php echo base_url(); ?>detail/project/all/<?= $this->uri->segment(4); ?>">ALL</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <?php
    foreach ($detail_project as $row) {
        $idservice = $row->id_service;
    ?>
        <section id="portfolio" class="portfolio-details p-service">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-7">
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
                    <div class="col-lg-5">
                        <div class="">
                            <!-- <h3>Project information</h3> -->
                            <h2><?= $row->tittle_service; ?></h2>
                            <hr>
                            <p>
                                <?= $row->desc_project; ?>
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
</main>
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
                            <li><a class="btn-service" href="<?php echo base_url(); ?>detail/project/<?= $tittle; ?>/<?= $this->uri->segment(4); ?>"><?= $data->tittle_service; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                        <li><a class="btn-service" href="<?php echo base_url(); ?>detail/project/all/<?= $this->uri->segment(4); ?>">ALL</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>
</main>
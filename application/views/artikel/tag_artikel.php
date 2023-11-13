<style>
    .tag-active {
        color: white !important;
        border: 1px solid var(--color-primary);
        background: var(--color-primary);
    }
</style>

<main class="mt-5" id="main">

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <?php
                        $tag = $this->uri->segment(3);
                        $tag_berita = preg_replace("![^a-z0-9]+!i", " ", $tag);
                        ?>
                        <input type="text" id="tag-berita" value="<?= $tag_berita; ?>" hidden>
                        <div id="load_data_tag" class="row">
                            <!-- data pagination -->
                            <br />
                            <br />
                        </div>
                        <!-- akhir data pagination -->
                        <div id="load_data_message"></div>
                        <div class="text-center mt-3">
                            <button id="read-more" class="btn btn-xs btn-outline-info"> <i class="bi bi-box-arrow-in-down"></i>
                                Read More</button>
                        </div>
                        <!-- end berita -->
                        <hr>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div id="tag" class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
                                <?php
                                foreach ($data_tag as $data) :
                                    $tag_berita = $data->tag_berita;
                                    $tag = preg_replace("![^a-z0-9]+!i", "-", $tag_berita);
                                ?>
                                    <li><a class="btn-tag" href="<?php echo base_url('Artikel'); ?>/tag/<?php echo $tag; ?>"><?= $data->tag_berita; ?></a></li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div><!-- End sidebar tags-->

                    </div>
                    <!-- End Blog Sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->
</main>
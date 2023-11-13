<main class="mt-5" id="main">
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <!--Berita artikel infinity scrool-->
                        <div id="load_data" class="row">
                            <!-- data pagination -->
                            <br />
                            <br />
                            <!-- akhir data pagination -->
                        </div>
                        <div id="load_data_message"></div>
                        <div class="text-center mt-3">
                            <button id="read-more-art" class="btn btn-xs btn-outline-info"> <i class="bi bi-box-arrow-in-down"></i>
                                Read More</button>
                        </div>
                        <!-- end berita -->

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
                                <?php
                                foreach ($data_tag as $data) :
                                    $tag_berita = $data->tag_berita;
                                    $tag = preg_replace("![^a-z0-9]+!i", "-", $tag_berita);
                                ?>
                                    <li><a href="<?php echo base_url('Artikel'); ?>/tag/<?php echo $tag; ?>"><?= $data->tag_berita; ?></a></li>
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
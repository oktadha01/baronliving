<main class="mt-5"  id="main">

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <div class="row">
                            <div class="col-12">
                                <?php
                                $no = 3;
                                foreach ($data_berita_detail as $data) {
                                    $id_berita = $data->id_berita;

                                ?>
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid border-radius img-berita" data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                                    <span class="float-right"><?php echo $data->tgl_berita; ?></span>
                                    <hr>
                                    <h3 style="font-family: auto;"><?php echo $data->judul_berita; ?></h3>
                                    <?php
                                    foreach ($data_artikel_berita as $desk) {
                                        $id_data_berita = $desk->id_data_berita;
                                        if ($id_berita == $desk->berita_id) {

                                    ?>
                                            <div class="gallery__content--flow">
                                                <?php
                                                foreach ($data_foto_berita as $foto) :
                                                    if ($id_data_berita == $foto->data_berita_id) {

                                                ?>
                                                        <figure>
                                                            <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->file_foto_berita; ?>" class="img-grid-news" alt="A light brown, long-haired chihuahua sitting next to three rubber duckies. " title="Photo by Giacomo Lucarini for Unsplash">
                                                            <figcaption class="header__caption" role="presentation">
                                                                <h2 class="title title--secondary">
                                                                    <!-- <button type="button" id="" data-id-foto-berita="<?php echo $foto->id_foto_berita; ?>" data-file-foto-berita="<?php echo $foto->file_foto_berita; ?>" class="btn-hapus-foto-berita-other browse btn btn-danger">Hapus Foto</button> -->
                                                                </h2>
                                                            </figcaption>
                                                        </figure>
                                                <?php
                                                    } else {
                                                    }
                                                endforeach;
                                                ?>
                                            </div>
                                            <?php echo $desk->text_berita; ?>
                                            <center>
                                                <a href="<?= $desk->link_btn; ?>" target="_blank">
                                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $desk->file_foto_btn; ?>" class="img-fluid" alt="" style="width: 25rem;">
                                                </a>
                                            </center>
                                            <!-- <p class="text-konten-news"><?php echo $data->desk_berita; ?></p> -->
                                    <?php
                                        } else {
                                        }
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="mt-3">
                                <?php
                                foreach ($data_berita_5 as $data) :
                                    $judul_berita = $data->judul_berita;
                                    $tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);
                                ?>
                                    <div class="post-item mt-3">
                                        <img src="<?= base_url('upload') . '/' . $data->foto_berita; ?>" alt="" class="flex-shrink-0">
                                        <div>
                                            <h4><a href="<?= base_url('Artikel/page/') . $tittle_news; ?>"><?= $data->judul_berita; ?></a></h4>
                                            <time datetime="2020-01-01"><?= $data->tgl_berita; ?></time>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul  class="mt-3">
                                <?php
                                foreach ($data_tag as $data) :
                                    $tag_berita = $data->tag_berita;
                                    $tag = preg_replace("![^a-z0-9]+!i", "-", $tag_berita);
                                ?>
                                    <li ><a href="<?php echo base_url('Artikel'); ?>/tag/<?php echo $tag; ?>"><?= $data->tag_berita; ?></a></li>
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
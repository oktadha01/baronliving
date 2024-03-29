<header id="header" class="header fixed-top" data-scrollto-offset="0" style="max-height: 67px !important;">
   <div class="container-fluid d-flex align-items-center justify-content-between pr-var">

      <a href="#" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <i class="fa-brands fa-instagram" style="color: #00000085;font-size: 35px;"></i>
      </a>
      <a href="<?php echo base_url('dashboard'); ?>" class="logo d-flex align-items-center scrollto me-auto mr-0">
         <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="assets/img/logo.png" alt=""> -->
         <h1 class="mb-0 font-size-nav-baro"> Baron Living Studio<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
         <ul>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#home">Home</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#about">About</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#services">Services</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#Artikel">Artikel</a></li>
            <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>#contact">Contact</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

   </div>
   <?php if (!$this->session->userdata('is_login')) : ?>
   <?php else : ?>
      <?php if ($this->session->userdata("privilage") == 'Admin') { ?>

         <aside class="sidebar-menu mt-15px">
            <nav id="navbar">
               <ul class="sidebar__nav">
                  <?php
                  $service = "(SELECT * FROM service)";
                  $query = $this->db->query($service);
                  foreach ($query->result() as $rows) {
                     $tittle_service = $rows->tittle_service;
                     $tittle = preg_replace("![^a-z0-9]+!i", "-", $tittle_service);
                  ?>
                     <li>
                        <a href="<?php echo base_url('Service'); ?>/data/<?= $tittle; ?>" class="sidebar__nav__link">
                           <!-- <i class="mdi side-icon-side fa-solid fa-pen-ruler"></i> -->
                           <img src="<?php echo base_url('assets'); ?>/img/<?= $rows->tittle_service; ?>.png" class="mdi side-icon-side">
                           <span class="sidebar__nav__text"><?= $rows->tittle_service; ?></span>
                        </a>
                     </li>
                  <?php
                  }
                  ?>
                  <!-- <li>
                     <a href="<?php echo base_url(); ?>Service/data/architec" class="sidebar__nav__link">
                        <i class="mdi side-icon-side fa-solid fa-pen-ruler"></i>
                        <span class="sidebar__nav__text">Architecture</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url(); ?>Service/data/contraction" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-person-digging"></i>
                        <span class="sidebar__nav__text">Contraction</span>
                     </a>
                  </li> -->
                  <li>
                     <a href="<?php echo base_url('Berita'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-couch"></i>
                        <span class="sidebar__nav__text">Artikel</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url('logout'); ?>" class="sidebar__nav__link">
                        <i class="side-icon-side fa-solid fa-right-from-bracket"></i>
                        <span class="sidebar__nav__text">Logout || <?= $this->session->userdata("privilage"); ?></span>
                     </a>
                  </li>
               </ul>
            </nav>
         </aside>
      <?php
      } ?>
   <?php endif ?>
</header><!-- End Header -->
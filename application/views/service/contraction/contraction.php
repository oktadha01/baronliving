<main id="main" class="pt-5rem">

    <div class="m-3">
        <div class="col-md-12">
            <h2 class="row__title">aaaaa</h2>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <label class="desk" for="">Description</label>
            </div>
            <div class="col-6">
                <button type="button" id="btn-edit-desc" class="btn btn-sm float-right btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i> Edit Description</button>
                <button type="button" id="btn-save-desc" class="btn btn-sm float-right btn-outline-success" hidden><i class="fa-regular fa-pen-to-square"></i> Save Description</button>
            </div>
            <div class="form-group mt-2">
                <textarea id="desc" class="form-control" name="desc" required readonly></textarea>
            </div>
        </div>
        <hr class="mt-3">
        <div id="form-add-foto" class="card" hidden>
            <div class="card-header">
                <h6 class="m-0"><i class="fa-solid fa-cloud-arrow-up"></i> Form Add Photo</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label class="" for="foto">Photo</label>
                        <div class="input-group">
                            <input type="file" id="foto" name="foto" class="file-foto" hidden required>
                            <input type="text" class="pilih-foto form-control" placeholder="Upload Gambar ..." id="nm-foto" required readonly>
                            <div class="input-group-append">
                                <button type="button" id="" class="pilih-foto browse btn btn-dark">Pilih Gambar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <label class="" for="tittle">Tittle</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tittle ..." id="nm-fot-produk" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo base_url('assets'); ?>/img/80x80.png" id="preview-fot-produk" class="pilih-foto img-thumbnail max-height-14rem">
                    </div>
                </div>
            </div>
        </div>
        <div class="row row--top-20">
            <div class="col-md-12">
                <div class="table-container">
                    <table class="table">
                        <thead class="table__thead">
                            <tr>
                                <th class="table__th">Name</th>
                                <th class="table__th"></th>
                            </tr>
                        </thead>
                        <tbody class="table__tbody">
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">

                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">
                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">
                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">

                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">

                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">

                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">

                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('assets'); ?>/img/architecture1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name">Christin Ericssen</p>
                                    </div>
                                </td>
                                <td class="row-td-action">

                                    <a href="#" class="btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
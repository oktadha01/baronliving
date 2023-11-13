<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <?php
        foreach ($data_service as $data) :
        ?>
            <div class="col-md-12">
                <h2 class="row__title"><?php echo $data->tittle_service; ?></h2>
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
                    <textarea id="desc" class="form-control" name="desc" required readonly><?php echo $data->desc; ?></textarea>
                    <input type="text" id="id-service" value="<?php echo $data->id_service; ?>" hidden>
                </div>
            </div>
            <hr class="mt-3">
        <?php
        endforeach;
        ?>
        <div id="form-add-project" class="card" hidden>
            <div class="card-header">
                <h6>New Project</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <label class="desk" for="">Project</label>
                        <div class="form-group mt-2">
                            <select id="select-project" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 add-project">
                        <label class="" for="">Project</label>
                        <div class="form-group mt-2">
                            <input type="text" id="nm-project" class="form-control" name="tittle_project" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 add-project">
                        <div style="margin-top: 2rem;">
                            <button type="button" id="btn-save-add-project" class=" btn btn-md btn-outline-primary" data-id-project=""><i class="fa-solid fa-cloud-arrow-up"></i> Save Project</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="desk" for="">Description</label>
                        <div class="form-group mt-2">
                            <textarea id="desc-project" class="form-control" name="desc_project" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" id="btnSave Project-add-project" class=" btn btn-sm btn-outline-danger" data-id-project="" hidden><i class="fa-regular fa-rectangle-xmark"></i> Cencel</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn-add-project" class=" btn btn-sm float-right btn-outline-primary" data-id-project=""><i class="fa-solid fa-diagram-project"></i> Add Project</button>
                <button type="button" id="btn-save-project" class=" btn btn-sm float-right btn-outline-success" data-id-project="" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Save New Project</button>
            </div>
        </div>
        <hr>
        <div class="row row--top-20">
            <div class="col-md-12">
                <div class="table-container">
                    <div id="data-service-project"></div>
                </div>
            </div>
        </div>
    </div>
</main>
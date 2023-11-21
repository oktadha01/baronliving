<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <?php
                foreach ($data_service_project as $data) :
                ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed data-project" type="button" data-id-project="<?php echo $data->id_project; ?>" data-project-id="<?php echo $data->project_id; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_project; ?>">
                                <i class="bi bi-question-circle question-icon"></i>
                                <?php echo $data->nm_project; ?>
                            </button>
                        </h3>
                        <div id="faq-content-<?php echo $data->id_project; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="desk" for="">Tittle & Description</label>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" id="btn-edit-<?= $data->project_id; ?>" class="btn-edit-desc-project btn btn-sm float-right btn-outline-warning" data-project-id="<?= $data->project_id; ?>"><i class="fa-regular fa-pen-to-square"></i> Edit Description</button>
                                        <button type="button" id="btn-save-<?= $data->project_id; ?>" class="btn-save-desc-project btn btn-sm float-right btn-outline-success" data-project-id="<?= $data->project_id; ?>" hidden><i class=" fa-regular fa-pen-to-square"></i> Save Description</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="load-foto-meta-service-<?php echo $data->id_project; ?>" class="col-lg-2 col-md-2 col-12 remove-load-foto-meta-service">

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <div class="form-group mt-2">
                                            <input type="text" id="tittle-project-<?= $data->project_id; ?>" class="form-control" name="tittle_project" required readonly value="<?php echo $data->nm_project; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <textarea id="desc-project-edit-<?= $data->project_id; ?>" class="form-control" name="desc_project" required readonly><?php echo $data->desc_project; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="data<?php echo $data->id_project; ?>" class="data"></div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
                <input type="text" name="" id="id-project" value="" hidden>
                <input type="text" name="" id="project-id" value="" hidden>
            </div>
        </div>
    </div>
</div>
<script>
    $('.data-project').click(function() {
        // $('#load-foto-meta-service').html('0');
        $('.data-foto-service').hide();
        $('.data-foto-service').hide().html('0');
        $('.data').removeClass('data-foto-service')
        $('#data' + $(this).data('id-project')).addClass('data-foto-service');
        $('#id-project').val($(this).data('id-project'));
        $('#project-id').val($(this).data('project-id'));

        let formData = new FormData();
        formData.append('id-service', $(this).data('id-project'));

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/data_foto_architec'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-foto-service').html(data).show();
                load_foto_meta_service();

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.btn-save-desc-project').removeAttr('hidden', true).hide();
    $('.btn-edit-desc-project').click(function() {
        $('#btn-save-' + $(this).data('project-id')).show();
        $('#btn-edit-' + $(this).data('project-id')).hide();
        $('#desc-project-edit-' + $(this).data('project-id')).removeAttr('readonly', true);
        $('#tittle-project-' + $(this).data('project-id')).removeAttr('readonly', true);
    });
    $('.btn-save-desc-project').click(function() {
        $('#btn-save-' + $(this).data('project-id')).hide();
        $('#btn-edit-' + $(this).data('project-id')).show();
        $('#desc-project-edit-' + $(this).data('project-id')).attr('readonly', true);
        $('#tittle-project-' + $(this).data('project-id')).attr('readonly', true);
        let formData = new FormData();
        formData.append('id-project', $('#id-project').val());
        formData.append('project-id', $('#project-id').val());
        formData.append('tittle-project', $('#tittle-project-'+ $(this).data('project-id')).val());
        formData.append('desc-project', $('#desc-project-edit-'+ $(this).data('project-id')).val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/edit_project'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {},
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    $(document).on("click", "#preview-foto-meta-service", function() {
        var file = $(this).parents().find(".file-foto-meta-service");
        file.trigger("click");
    });

    function load_foto_meta_service() {
        // alert($('#id-project').val())
        var delayInMilliseconds = 1000; //1 second
        $('.remove-load-foto-meta-service').html('0');
        setTimeout(function() {

            let formData = new FormData();
            formData.append('id-project', $('#id-project').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Service/load_foto_meta_service'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#load-foto-meta-service-' + $('#id-project').val()).html(data);

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }, delayInMilliseconds);
    }
</script>
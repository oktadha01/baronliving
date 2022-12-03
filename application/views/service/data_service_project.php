<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <?php
                foreach ($data_service_project as $data) :
                ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed data-project" type="button" data-id-project="<?php echo $data->id_project; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_project; ?>">
                                <i class="bi bi-question-circle question-icon"></i>
                                <?php echo $data->tittle_project; ?>
                            </button>
                        </h3>
                        <div id="faq-content-<?php echo $data->id_project; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="desk" for="">Tittle & Description</label>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" id="btn-edit<?php echo $data->id_project; ?>" class="btn-edit-desc-project btn btn-sm float-right btn-outline-warning" data-id-project="<?php echo $data->id_project; ?>"><i class="fa-regular fa-pen-to-square"></i> Edit Description</button>
                                        <button type="button" id="btn-save<?php echo $data->id_project; ?>" class="btn-save-desc-project btn btn-sm float-right btn-outline-success" data-id-project="<?php echo $data->id_project; ?>" hidden><i class=" fa-regular fa-pen-to-square"></i> Save Description</button>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="text" id="tittle-project<?php echo $data->id_project; ?>" class="form-control" name="tittle_project" required readonly value="<?php echo $data->tittle_project; ?>">
                                    </div>
                                    <div class="form-group mt-2">
                                        <textarea id="desc-project<?php echo $data->id_project; ?>" class="form-control" name="desc_project" required readonly><?php echo $data->desc_project; ?></textarea>
                                        <input type="text" name="" id="id-project<?php echo $data->id_project; ?>" value="<?php echo $data->id_project; ?>" hidden>
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
            </div>
        </div>
    </div>
</div>
<input type="text" id="id-project" value="" hidden>
<script>
    $('.data-project').click(function() {
        $('.data-foto-service').hide();
        $('.data-foto-service').hide().html('0');
        $('.data').removeClass('data-foto-service')
        $('#data' + $(this).data('id-project')).addClass('data-foto-service');
        $('#id-project').val($(this).data('id-project'));
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
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
    $('.btn-save-desc-project').removeAttr('hidden', true).hide();
    $('.btn-edit-desc-project').click(function() {
        $('#btn-save' + $(this).data('id-project')).show();
        $('#btn-edit' + $(this).data('id-project')).hide();
        $('#desc-project' + $(this).data('id-project')).removeAttr('readonly', true);
        $('#tittle-project' + $(this).data('id-project')).removeAttr('readonly', true);
    });
    $('.btn-save-desc-project').click(function() {
        $('#btn-save' + $(this).data('id-project')).hide();
        $('#btn-edit' + $(this).data('id-project')).show();
        $('#desc-project' + $(this).data('id-project')).attr('readonly', true);
        $('#tittle-project' + $(this).data('id-project')).attr('readonly', true);
        let formData = new FormData();
        formData.append('id-project', $('#id-project' + $(this).data('id-project')).val());
        formData.append('tittle-project', $('#tittle-project' + $(this).data('id-project')).val());
        formData.append('desc-project', $('#desc-project' + $(this).data('id-project')).val());

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
</script>
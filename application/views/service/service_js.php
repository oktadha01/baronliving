<script>
    load_data_project();
    $('#btn-save-desc').removeAttr('hidden', true).hide();
    $('#btn-edit-desc').click(function() {
        $('#btn-save-desc').show();
        $('#btn-edit-desc').hide();
        $('#desc').removeAttr('readonly', true);
    });

    $('#btn-save-desc').click(function() {
        let formData = new FormData();
        formData.append('id-service', $('#id-service').val());
        formData.append('desc', $('#desc').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/edit_desc_service'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#btn-save-desc').hide();
                $('#btn-edit-desc').show();
                $('#desc').attr('readonly', true);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('#btn-cencel-add-project, #btn-save-project, #form-add-project').hide().removeAttr('hidden', true);
    $('#btn-add-project').click(function() {
        $('#btn-cencel-add-project, #btn-save-project, #form-add-project').show();
        $('#btn-add-project').hide();
    });
    $('#btn-save-project').click(function() {
        let formData = new FormData();
        formData.append('id-service', $('#id-service').val());
        formData.append('tittle-project', $('#tittle-project').val());
        formData.append('desc-project', $('#desc-project').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/save_project'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#btn-cencel-add-project, #btn-save-project, #form-add-project').hide();
                $('#btn-add-project').show();
                load_data_project();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    });
    $('#btn-cencel-add-project').click(function() {
        $('#btn-cencel-add-project, #btn-save-project, #form-add-project').hide();
        $('#btn-add-project').show();
    });

    function load_data_project() {
        let formData = new FormData();
        formData.append('id-service', $('#id-service').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/data_project_service'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-service-project').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>
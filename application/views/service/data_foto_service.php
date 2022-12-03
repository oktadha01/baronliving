<div id="form-add-foto" class="card" hidden>
    <div class="card-header">
        <h6 class="m-0"><i class="fa-solid fa-cloud-arrow-up"></i> Form Add Photo</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <label class="" for="foto">Photo</label>
                <div class="input-group">
                    <input type="text" id="id-foto" value="" hidden>
                    <input type="text" id="foto-lama" value="" hidden>
                    <input type="file" id="foto-service" name="foto" class="file-foto" hidden>
                    <input type="text" class="pilih-foto form-control" placeholder="Upload Gambar ..." id="nm-foto-service" readonly>
                    <div class="input-group-append">
                        <button type="button" id="" class="pilih-foto browse btn btn-dark">Pilih Gambar</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label class="" for="tittle">Tittle</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tittle ..." id="tittle-foto-service" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <img src="<?php echo base_url('assets'); ?>/img/80x80.png" id="preview-foto-service" class="pilih-foto img-thumbnail" style="max-height: 15rem;">
            </div>
            <div class="col-6">
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input ceklis-orientasi-foto" type="checkbox" id="cheklis-landscape" value="landscape">
                        <label for="cheklis-landscape" class="custom-control-label">Landscape</label>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input ceklis-orientasi-foto" type="checkbox" id="cheklis-portrait" value="portrait">
                        <label for="cheklis-portrait" class="custom-control-label">Portrait</label>
                    </div>
                </div>
                <input type="text" id="orientasi-foto" hidden>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="ceklis-ubah-foto" class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-service" value="">
                        <label for="ceklis-ubah-foto-service" class="custom-control-label">Cheklis untuk mengubah foto</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-6">
        <button type="button" id="btn-cencel" class="btn btn-sm mb-2 btn-outline-danger" hidden><i class="fa-regular fa-rectangle-xmark"></i> Cencel</button>
    </div>
    <div class="col-6">
        <button type="button" id="btn-add-foto" class="btn btn-sm mb-2 float-right btn-outline-primary" data-id-project="<?php echo $data->id_project; ?>"><i class="fa-solid fa-cloud-arrow-up"></i> Add Photo</button>
        <button type="button" id="btn-save-foto" class="btn btn-sm mb-2 float-right btn-outline-success" value="" hidden><i class="fa-solid fa-file-arrow-up"></i> Save Photo</button>
    </div>
</div>
<table class="table">
    <thead class="table__thead">
        <tr>
            <th class="table__th">Photo & Tittle</th>
            <th class="table__th">Orientation Photo</th>
            <th class="table__th">Edit & Delete</th>
        </tr>
    </thead>
    <tbody class="table__tbody">
        <?php
        foreach ($data_foto_service as $data) :
        ?>
            <tr class="table-row table-row--chris">
                <td class="table-row__td">
                    <div class="table-row__img">
                        <img src="<?php echo base_url('upload'); ?>/service/<?php echo $data->foto_service; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="table-row__info">
                        <p class="table-row__name"><?php echo $data->tittle_foto_service; ?></p>
                    </div>
                </td>
                <td class="table-row__td">
                    <?php echo $data->orientasi_foto; ?>
                </td>
                <td class="row-td-action">
                    <a href="#" class="btn-edit" data-id-foto="<?php echo $data->id_foto; ?>" data-id-foto-service="<?php echo $data->id_foto_service; ?>" data-foto-service="<?php echo $data->foto_service; ?>" data-tittle="<?php echo $data->tittle_foto_service; ?>" data-orientasi="<?php echo $data->orientasi_foto; ?>">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" class="btn-delete" data-id-foto="<?php echo $data->id_foto; ?>" data-foto-service="<?php echo $data->foto_service; ?>">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.ceklis-orientasi-foto').click(function(e) {
            $('.ceklis-orientasi-foto').not(this).prop('checked', false);
            if ($(this).is(":checked")) {
                $('#orientasi-foto').val($(this).val())
            } else {

            }
        });
        $('#foto-service').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#nm-foto-service").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview-foto-service").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    })
    $('.btn-edit').click(function() {
        $('#btn-save-foto').val('edit')
        $('#btn-save-foto, #btn-cencel, #ceklis-ubah-foto').show();
        $('#btn-add-foto').hide();
        $('#form-add-foto').show(100);
        $(this).data('id-foto');
        $(this).data('foto-service');
        $(this).data('tittle');
        $("#nm-foto-service, #foto-lama").val($(this).data('foto-service'));
        $('#preview-foto-service').attr({
            src: "<?php echo base_url('upload'); ?>/service/" + $(this).data('foto-service')
        });
        $("#tittle-foto-service").val($(this).data('tittle'));
        $("#id-foto").val($(this).data('id-foto'));
        $("#id-project").val($(this).data('id-foto-service'));
        $("#orientasi-foto").val($(this).data('orientasi'));
        if ($('#orientasi-foto').val() == 'landscape') {
            $('#cheklis-landscape').prop('checked', true);
        } else {
            $('#cheklis-landscape').prop('checked', false);
        }
        if ($('#orientasi-foto').val() == 'portrait') {
            $('#cheklis-portrait').prop('checked', true);
        } else {
            $('#cheklis-portrait').prop('checked', false);
        }
    });


    $('#btn-save-foto, #form-add-foto, #btn-cencel').removeAttr('hidden', true).hide();
    $('#btn-add-foto').click(function() {
        $('#btn-save-foto, #btn-cencel').show();
        $('#btn-add-foto, #ceklis-ubah-foto').hide();
        $('#form-add-foto').show(100);
        $('#btn-save-foto').val('save');
    });
    $('#ceklis-ubah-foto-service').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-service').val('change-foto');
        } else {
            $('#ceklis-ubah-foto-service').val('');
        }
    });
    $('#btn-save-foto').click(function() {

        const foto_service = $('#foto-service').prop('files')[0];
        let formData = new FormData();
        formData.append('id-foto', $('#id-foto').val());
        formData.append('id-service', $("#id-project").val());
        formData.append('foto-service', foto_service);
        formData.append('tittle-foto-service', $('#tittle-foto-service').val());
        formData.append('orientasi-foto', $('#orientasi-foto').val());
        formData.append('foto-lama', $('#foto-lama').val());
        formData.append('action-foto', $('#ceklis-ubah-foto-service').val());
        if ($('#btn-save-foto').val() == 'save') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Service/save_foto_service'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    empty_form();
                    $('#btn-save-foto').hide();
                    $('#btn-add-foto').show();
                    $('#form-add-foto, #btn-cencel').hide(100);
                    load_data_foto();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Service/edit_foto_service'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    empty_form();
                    $('#btn-save-foto').hide();
                    $('#btn-add-foto').show();
                    $('#form-add-foto, #btn-cencel').hide(100);
                    load_data_foto();

                },
                error: function(msg) {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('#btn-cencel').click(function() {
        $('#btn-save-foto, #ceklis-ubah-foto').hide();
        $('#btn-add-foto').show();
        $('#form-add-foto, #btn-cencel').hide(100);
        empty_form();
    })

    $('.btn-delete').click(function(e) {
        var el = this;

        // Delete id
        var id_foto = $(this).data('id-foto');
        var foto_lama = $(this).data('foto-service');;
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-foto', id_foto);
            formData.append('foto-lama', foto_lama);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Service/hapus_foto_service') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                }
            });
        }
    });

    function load_data_foto() {
        let formData = new FormData();
        formData.append('id-service', $("#id-project").val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Service/data_foto_architec'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-foto-service').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }

    function empty_form() {
        $("#nm-foto-service").val('');
        $('#preview-foto-service').attr({
            src: "<?php echo base_url('assets'); ?>/img/80x80.png"
        });
        $("#tittle-foto-service").val('');
        $('#ceklis-ubah-foto-service').prop('checked', false);
        $("#orientasi-foto").val();
        $('.ceklis-orientasi-foto').prop('checked', false);

    }
</script>
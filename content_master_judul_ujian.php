<?php
$get_master_user = $md->getMasterUserById($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
<title>Ujian Sekolah</title>
    <?php require "header.php"; ?>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>
            <?php require "navbar.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Master Judul Ujian</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Master Judul Ujian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p><a href="form_master_judul_ujian.php" class="btn btn-primary">Tambah</a></p>
                                        <di class="table-responsive">
                                            <table class="table table-bordered table-striped" id="myTable"></table>
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </section>
            </div>
    <?php require "footer.php"; ?>
</html>

<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        ajax: {
            url: 'ajax_get_data_judul_ujian.php',
            dataType: 'json',
            "dataSrc": function (json) {
                if(json != null){
                    return json
                } else {
                    return "";
                }
            } 
        },
        "sAjaxDataProp": "",
        "width": "100%",
        "order": [[ 0, "asc" ]],
        "aoColumns": [
            {
                "mData": null,
                "title": "No",
                "width": "5%",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "mData": null,
                "title": "Nama",
                "render": function (data, row, type, meta) {
                    return data[1];
                }
            },
            {
                "mData": null,
                "title": "Kelas",
                "render": function (data, row, type, meta) {
                    return data[2];
                }
            },
            {
                "mData": null,
                "title": "Tanggal",
                "render": function (data, row, type, meta) {
                    return data[3];
                }
            },
            {
                "mData": null,
                "title": "",
                "sortable": false,
                "width": "15%",
                "render": function (data, row, type, meta) {
                    var myText = "Are you sure?";
                    let btn = '';
                        btn += "<div style='text-align:center'>";
                        btn += "<a href='form_master_judul_ujian.php?id="+data[0]+"' class='btn btn-primary btn-sm' role='button' style='margin-right:5px'><i class='fa fa-pencil-alt'></i></a>";
                        btn += '<a href="delete.php?id='+data[0]+'&source=judulUjian" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\''+myText+'\')"><i class="fa fa-trash"></i></a>';
                        btn += "</div>";

                    return btn;
                }
            }
        ]
        // columns: [ ... ]
    } );
});
</script>
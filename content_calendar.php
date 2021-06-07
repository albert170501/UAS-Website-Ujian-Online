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
                                <h1 class="m-0">Kalender</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
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
                                <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            </div>
                    </div>
                </section>
            </div>
    <?php require "footer.php"; ?>
</html>
<script>
  $(function () {

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;
    var calendarEl = document.getElementById('calendar');

    $.ajax({
        url: "ajax_get_data_judul_ujian.php",
        type: "POST",
        dataType: "json",
        async: false,
        success: function(result){
            // console.log(JSON.parse(JSON.stringify(result)));
            var newResult = [];
            for(var i = 0; i < result.length; i++) {
                newResult.push({title:result[i][1], start: new Date(result[i][3]), end: new Date(result[i][4]), backgroundColor: result[i][5], borderColor: result[i][5]});   
            }
            
            var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: 
                newResult
    
            });

            calendar.render();
        }
    });
    
  })
</script>
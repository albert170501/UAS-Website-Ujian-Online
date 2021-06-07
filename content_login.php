<?php include "header.php" ?>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Ujian Online</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in</p>

        <form action="login.php" method="POST">
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" name="btnSubmit">Sign In</button>
            </div>
            
            </div>
        </form>

        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
</body>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm Admin</h1>
                    <br>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pwd = md5($_POST['password']);
                        $qr = mysqli_query($conn,"INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$name','$email','$pwd')");
                        if($qr) {
                            echo '<script>window.location="admin/userAdmin";</script>';
                        }
                       
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nhập Tên Admin">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Nhập Địa Chỉ Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php require_once '../template/inc/footer.php' ?>
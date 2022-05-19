<?php $page = "BLOG";?>
<?php require_once 'public/inc/header.php' ?>
<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <?php require_once 'public/inc/navbar.php' ?>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
</header>
<!--/ End Header -->

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index.html">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog.html">Trang Tin Tức</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trang Tin Tức</h2>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
         $qr = mysqli_query($conn,"SELECT * FROM blog ORDER BY id DESC");
         while($row_blog = mysqli_fetch_assoc($qr)) {
        ?>
            <div class="col-6 col-md-4">
                <div class="shop-single-blog">
                    <img src="admin/upload/<?php echo $row_blog['img']?>" alt="#">
                    <div กclass="content">
                        <p class="date"><?php echo $row_blog['created_at']?></p>
                         <h6><?php echo $row_blog['name']?></h6>
                        <a href="blog-single-sidebar.php?id=<?php echo $row_blog['id']?>" class="more-btn">Xem Tiếp</a>
                    </div>
                </div>
            </div>
        <?php 
         }
        ?>
        </div>
    </div>
</section>
<!--/ End Blog Single -->

<!-- Start Footer Area -->
<?php require_once 'public/inc/footer.php' ?>
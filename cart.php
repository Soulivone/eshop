<?php $page = "CART";?>
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
						<li class="active"><a href="cart.html">Giỏ Hàng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section" id="listCart">
	<div class="container" id="cartx">
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>Hình Ảnh</th>
							<th>Tên Sản Phẩm</th>
							<th class="text-center">Giá</th>
							<th class="text-center">Số Lượng</th>
							<th class="text-center">Tổng</th>
							<th class="text-center"><i class="ti-trash remove-icon"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total = 0;
						$sum = 0;
						if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $key => $value) {
								$total = $value['price'] * $value['num'];
								$sum += $total;

						?>
								<tr>
									<td class="image" data-title="No"><img src="admin/upload/<?php echo $value['image'] ?>" alt="#"></td>
									<td class="product-des" data-title="Description">
										<p class="product-name"><a href="#"><?php echo $value['name'] ?></a></p>

									</td>
									<td class="price" data-title="Price"><span>$ <?php echo $value['price'] ?> </span></td>
									<td class="qty" data-title="Qty">
										<!-- Input Order -->
										<div class="input-group">

											<input type="number" onchange="updateCart(<?php echo $key ?>)" id="quantity_<?php echo $key ?>" name="quantity_<?php echo $key ?>" class="input-number" data-min="1" data-max="50" value="<?php echo $value['num'] ?>">

										</div>
										<!--/ End Input Order -->
									</td>
									<td class="total-amount" data-title="Total"><span>$<?php echo $total ?></span></td>
									<td class="action" onclick="return confirm('Are you sure you want to delete this item?');" data-title="Remove"><a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ?>)"><i class="ti-trash remove-icon"></i></a></td>
								</tr>
						<?php
							}
						}
						?>
				</table>
				<!--/ End Shopping Summery -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
							<div class="left">
							</div>
						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Tổng đơn hàng<span>$ <?php echo $sum ?></span></li>
									<li>Phí giao hàng<span>$10</span></li>
									<li class="last">Tổng cộng<span>$ <?php
																	if ($sum > 0) {
																		echo $sum + 10;
																	} else {
																		0;
																	}
																	?></span></li>
								</ul>
								<div class="button5">
									<a href="checkout.php" class="btn">Đặt Hàng</a>
									<a href="index.php" class="btn">Tiếp tục mùa hàng</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>
<!--/ End Shopping Cart -->

<!-- Modal -->

<!-- Modal end -->

<?php require_once 'public/inc/footer.php' ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function updateCart(id) {
		var num = $("#quantity_" + id).val();
		$.post('update_cart.php', {
			'id': id,
			'num': num
		}, function(data) {
			$("#listCart").load("cart.php #cartx");
		});

	}
	function deleteCart(id) {
		$.post('update_cart.php', {
			'id': id,
			'num': 0
		}, function(data) {
			$("#listCart").load("cart.php #cartx");
			
		});
	}
</script>
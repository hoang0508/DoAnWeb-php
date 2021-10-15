<?php
	if(isset($_POST['themgiohang'])) {
		$tensanpham = $_POST['tensanpham'];
		$sanpham_id = $_POST['sanpham_id'];
		$hinhanh = $_POST['hinhanh'];
		$gia = $_POST['giasanpham'];
		$soluong = $_POST['soluong'];

		$sql_giohang = mysqli_query($con, "INSERT INTO tbl_giohang(tensanpham, sanpham_id, giasanpham, hinhanh, soluong) VALUES ('$tensanpham','$sanpham_id','$gia', '$hinhanh','$soluong')");
		if($sql_giohang==0) {
			header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);
		}
	}
?>
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng của bạn
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<?php
					$sql_lay_giohang = mysqli_query($con, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
				?>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i =0;
								while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)) {
									$i++;
							?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span><?php echo $row_fetch_giohang['soluong'] ?></span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
								<td class="invert"><?php echo  number_format($row_fetch_giohang['giasanpham']).'vnd' ?></td>
								<td class="invert">
									<div class="rem">
										<div class="close1"> </div>
									</div>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
					<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn">Thanh toán tới địa chỉ này</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->
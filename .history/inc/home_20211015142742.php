<style>
h3.heading-tittle {
  margin-bottom: 50px !important;
}

.inner-men-cart-pro .link-product-add-cart {
    left: 15% !important;
}

.product-new-top {
  top: -50px;
}

.btn-buy {
	justify-content: space-between;
	align-items: center;
}

.btn-buy i.fa-cart-plus {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 15px;
		font-size: 21px;
		color: #fff;
}
button.button {
	width: 50px;
	height: 45px;
	background-color: #3D6EF7;
	border: none;
	outline: none;
	border-radius: 5px;
	cursor: pointer;
	transition: all 0.25s linear;
}

button.button:hover {
	opacity: 0.6;
}
.social-cart {
	color: #ccc;
	cursor: pointer;
}
.social-cart i {
	margin-left: 10px;
}

a.icon-heart:hover {
	color: red;
}
</style>
<?php 
	if(!isset($_SESSION['luottruycap'])) {
		$_SESSION['luottruycap'] = 0;
	}
	else {
		$_SESSION['luottruycap']+=1;
	}
?>
<?php 
	if(isset($_GET['yeuthich']) && $_GET['id']) {
		$yt = $_GET['yeuthich'];
		$id = $_GET['id'];
	}
	else {
		$yt = "";
		$id= "";
	}
	$update_yt = mysqli_query($con, "UPDATE tbl_sanpham SET sanpham_yeuthich = '$yt' WHERE sanpham_id = '$id'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			Danh mục sản phẩm
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<?php
							$sql_category_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");
							while($row_cate_home = mysqli_fetch_array($sql_category_home)) {
								$id_category = $row_cate_home['category_id'];
						?>
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4 slider-product">
							<h3 class="heading-tittle text-center heading-title1"><?php echo $row_cate_home['category_name'] ?></h3>
							<div class="row product-row">
								<?php
									$sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY tbl_sanpham.sanpham_id DESC");
									while($row_sanpham = mysqli_fetch_array($sql_product)) {
										$sanpham_id = $row_sanpham['sanpham_id'];
										if($row_sanpham['category_id'] == $id_category) {
								?>
								<div class="col-md-4 product-men mt-5 product-item">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" width="200px" height="200px" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a class="pd-name" href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnd'?></span>
												<del><?php echo number_format($row_sanpham['sanpham_gia']).'vnd'?></del>
											</div>
											<div class="star-buy d-flex mt-3 justify-content-around">
												<div class="star-vote flex">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
										</div>
											<?php 
												$sql_soluongban = mysqli_query($con,"SELECT *, SUM(tbl_sanpham.sanpham_soluong) - SUM(tbl_sanpham.sanpham_soluong-tbl_donhang.soluong) AS 'daban'  FROM tbl_donhang, tbl_sanpham WHERE tbl_sanpham.sanpham_id = tbl_donhang.sanpham_id AND tbl_sanpham.sanpham_id = '$sanpham_id'" );
														$row_ban = mysqli_fetch_array($sql_soluongban);
														if($row_sanpham['sanpham_id'] = $sanpham_id) {
											?>
														<span class="number-buy" style="font-size: 14px">
														<?php
														if($row_ban['soluong'] >= 1) {
														?>
														Đã bán
														<?php
															echo $row_ban['daban']
														?>
														sp
														<?php
														}
														else {
															echo 'Đang còn hàng';
															?>
															<?php
														}
														?>
												</span>
												<?php
														}
												?>
											</div>
											<br>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />	
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />	
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />
													<!-- <input type="hidden" name="mahang" value="<?php echo $row_ban['mahang'] ?>" /> -->
													<div class="btn-buy">
														<!-- <input  type="submit" name="themgiohang" value = "" class="button" /></div> -->
														<button type="submit" name="themgiohang" value = "" class="button" >
															<i class="fa fa-cart-plus" aria-hidden="true"></i>
														</button>
														<div class="social-cart">
															<?php
																$sql_yt = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$sanpham_id'");
																while($row_yeuthich = mysqli_fetch_array($sql_yt)) {
															?>
																<?php
																if($row_yeuthich['sanpham_yeuthich']!=0) {
																	?>
																	<?php
																	$sql_yt1 =  mysqli_query($con, "SELECT *, COUNT(sanpham_yeuthich) AS 'YT' FROM tbl_sanpham");
																	$row_yt1 = mysqli_fetch_array($sql_yt1);
																	$i=0;
																	$dd = array($row_yt1['sanpham_yeuthich']);
																	$counthh = count($dd);
																	while($i < $counthh) {
																		?>
																		<a style="color:#3D6EF7" class="icon-heart" href="index.php?id=<?php echo $row_yeuthich['sanpham_id'] ?>&yeuthich=<?php echo $i ?>"><i class="fa fa-heart-o icon-heart" style="color:#3D6EF7;" aria-hidden="true">
																		</i>
																		</a>	
																	<!-- ?> -->
																<?php
																$i++;
																	}
																?>
																	<?php
																}
																else {
																	?>	
																<a style="color: #ccc;" class="icon-heart" href="?index.php&id=<?php echo $row_yeuthich['sanpham_id'] ?>&yeuthich=<?php echo $i++ ?>"><i class="fa fa-heart-o icon-heart" style="color: #ccc;" aria-hidden="true"></i>
																</a>
																	<?php
																}
																?>
															<?php
																}
															?>
															<i class="fa fa-share" aria-hidden="true"></i>
														</div>
													</div>
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<!-- //first section -->
						<?php
							}
						?>
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
					<div class="access-eye mb-2">
						<span>Lượt truy cập: 
							<?php
								if(isset($_SESSION['luottruycap'])) {
									echo $_SESSION['luottruycap'];
								}
							?>
						</span>
					</div>
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm kiếm</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Sản phẩm" name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Dưới 1 triệu</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Khách hàng review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<ul>
							<?php
						$sql_category_sidebar = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
						while($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)) {
							?>
								<li>
									<!-- <input type="checkbox" class="checked"> -->
									<span class="span"><a href="danhmucsanpham.php?id=<?php echo $row_category_sidebar['category_id'] ?>"><?php echo $row_category_sidebar['category_name'] ?></a></span>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
						<!-- //electronics -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
							<div class="box-scroll">
								<div class="scroll">
								<?php
									$sql_product_sidebar = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot = '0'  ORDER BY sanpham_id DESC");
									while($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
									?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image']?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_sanpham_sidebar['sanpham_name']?></a>
											<a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).'vnd'?></a>
											<del><?php echo number_format( $row_sanpham_sidebar['sanpham_gia']).'vnd'?></del>
										</div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->
	<div class="banner-smart container">
		<div class="smart-slider">
			<img src="images/anh5.jpg" alt="">
			<img src="images/anh6.png" alt="">
			<img src="images/anh7.png" alt="">
		</div>
		<div class="smart-trend">

		</div>
	</div>

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->
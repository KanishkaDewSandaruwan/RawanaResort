<!DOCTYPE html>
<html lang="en">
<?php include 'template/head.php'; ?>

<body>
	<div class="wrapper">

		<?php include 'template/navbar.php'; ?>

		<div class="main">

			<?php include 'template/topbar.php'; ?>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-4">
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Today Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">Rs.
													<?php
													$getData = dataforCountToday();
													$row = mysqli_fetch_assoc($getData);
													echo $row['sum'];
													?>.00
												</h3>

											</div>
										</div>
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Customers</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">
													<?php echo dataCountCustomer('customer') ?>
												</h3>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">Rs.
													<?php echo dataforCount('booking', 'total') ?>.00
												</h3>
											</div>
										</div>
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Rooms</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">
													<?php echo dataCount('room') ?>
												</h3>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">This Month Earnings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">Rs.
													<?php echo dataforCountMonth('booking', 'total') ?>.00
												</h3>
											</div>
										</div>
										<div class="card bg-navyblue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Booking</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h3 class="mt-1 mb-3">
													<?php echo dataCount('booking') ?>
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<?php include 'template/footer.php'; ?>

		</div>
	</div>

	<?php include 'template/footer_script.php'; ?>

</body>

</html>
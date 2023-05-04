<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classess/cart.php');
include_once($filepath . '/../helpers/format.php');

?>
<?php
$ct = new cart();
if (isset($_GET['shiftedid'])) {
	$id = $_GET['shiftedid'];
	$shifted = $ct->shifted($id);
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$del_shifted = $ct->del_shifted($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">
			<?php
			if (isset($shifted)) {
				echo $shifted;
			}
			?>
			<?php
			if (isset($del_shifted)) {
				echo $del_shifted;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Order time</th>
						<th>Order code</th>
						<th>Customer Name</th>
						<th>Action</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$ct = new cart();
					$fm = new Format();
					$get_inbox_cart = $ct->get_inbox_cart();
					if ($get_inbox_cart) {
						$i = 0;
						while ($result = $get_inbox_cart->fetch_assoc()) {
							$i++
								?>
							<tr class="odd gradeX">
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $fm->formatDate($result['date_created']); ?>
								</td>
								<td>
									<?php echo $result['order_code']; ?>
								</td>
								<td>
									<?php echo $result['fullname']; ?>
								</td>
								<td><a
										href="customer.php?customerid=<?php echo $result['customer_id']; ?>&order_code=<?php echo $result['order_code']; ?>">View
										order</a>
								</td>
								<td>
									<?php
									if ($result['status'] == 0) {
										?>
										<a href="?shiftedid=<?php echo $result['order_code']; ?>">Pending</a>
										<?php
									} elseif ($result['status'] == 1) {
										echo 'Shifting...';
										?>

										<?php
									} else {
										?>
										<!-- <a href="?del=	<?php echo $result['order_code']; ?>">Remove</a> -->
										<a href="#">Received</a>
										<?php
									}
									?>

								</td>
							</tr>
							<?php

						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>
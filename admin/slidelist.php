<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/slide.php'; ?>
<?php
$slide = new slide();
if (isset($_GET['delid'])) {
	$id = $_GET['delid'];
	$delSlide = $slide->delete_slide($id);
}


?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Slide List</h2>
		<div class="block">
			<?php
			if (isset($delSlide)) {
				echo $delSlide;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Short description</th>
						<th>Description</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$show_slide = $slide->show_slide();
					if ($show_slide) {
						$i = 0;
						while ($result = $show_slide->fetch_assoc()) {
							$i++;
							?>
							<tr class="odd gradeX">
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $result['slideTitle']; ?>
								</td>
								<td>
									<?php echo $result['shortDescription']; ?>
								</td>
								<td>
									<?php echo $result['description']; ?>
								</td>
								<td>
									<img src="uploads/slide/<?php echo $result['image']; ?>" width="200">
								</td>
								<td><a href="slideedit.php?slideId=<?php echo $result['slideId']; ?>">Edit</a> ||
									<a onclick="return confirm('Are you want to delete?')"
										href="?delid=<?php echo $result['slideId'] ?>">Delete</a>
								</td>
							</tr>
							<?php
						}
					} ?>
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
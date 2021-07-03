<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>

						<th>#</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					include 'db_connect.php';
					$qry = $conn->query("SELECT * FROM orders ");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['address'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['mobile'] ?></td>
							<?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-success">Confirmed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>">View Order</button>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<script>
	$('.view_order').Onclick(function() {
		uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id'))
	})
</script>
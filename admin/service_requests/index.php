<?php if($_settings->chk_flashdata('success')): ?>

<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Service Requests</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="25%">
					<col width="25%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Created</th>
						<th>Client Name</th>
						<th>Service</th>
						<th>Status</th>
						<?php 
							if(isset($_SESSION['userdata']['type']) && $_SESSION['userdata']['type'] != 3){
								echo '<th>Action</th>';
							}
						?>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
					// Query to fetch service requests ordered by creation date
					$qry = $conn->query("SELECT * FROM service_requests ORDER BY unix_timestamp(date_created) DESC");

					while ($row = $qry->fetch_assoc()):
						// Fetch all meta fields related to this request_id
						$meta_qry = $conn->query("SELECT meta_field, meta_value FROM request_meta WHERE request_id = '{$row['id']}'");
						$meta_data = [];
						while ($meta_row = $meta_qry->fetch_assoc()) {
							$meta_data[$meta_row['meta_field']] = $meta_row['meta_value'];
						}

						// Fetch services if service_id exists
						$services = [];
						if (!empty($meta_data['service_id'])) {
							$service_ids = $meta_data['service_id'];
							$service_qry = $conn->query("SELECT service FROM service_list WHERE id IN ({$service_ids})");
							while ($service_row = $service_qry->fetch_assoc()) {
								$services[] = htmlspecialchars($service_row['service']);
							}
						}

						// Check user access type for display logic
						if (isset($_SESSION['userdata']['type']) && $_SESSION['userdata']['type'] == 3 && $_SESSION['userdata']['email'] == $meta_data['email']): 
				?>
				<tr>
					<td class="text-center"><?php echo $i++; ?></td>
					<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])); ?></td>
					<td><?php echo ucwords($row['owner_name']); ?></td>
					<td>
						<p class="m-0 truncate-3">
							<?php echo !empty($services) ? implode(", ", $services) : 'No services listed'; ?>
						</p>
					</td>
					<td class="text-center">
						<?php 
							switch ($row['status']) {
								case 1: echo '<span class="badge badge-primary">Confirmed</span>'; break;
								case 2: echo '<span class="badge badge-warning">On-progress</span>'; break;
								case 3: echo '<span class="badge badge-success">Done</span>'; break;
								case 4: echo '<span class="badge badge-danger">Cancelled</span>'; break;
								default: echo '<span class="badge badge-secondary">Pending</span>';
							}
						?>
					</td>
					<?php if (isset($_SESSION['userdata']['type']) && $_SESSION['userdata']['type'] != 3): ?>
					<td align="center">
						<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
							Action <span class="sr-only">Toggle Dropdown</span>
						</button>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">
								<span class="fa fa-eye text-primary"></span> View
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">
								<span class="fa fa-edit text-primary"></span> Edit
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">
								<span class="fa fa-trash text-danger"></span> Delete
							</a>
						</div>
					</td>
					<?php endif; ?>
				</tr>
				<?php 
						endif; // End access type check
					endwhile; 
				?>
			</tbody>

			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this service request permanently?","delete_service_request",[$(this).attr('data-id')])
		})
		$('.view_data').click(function(){
			uni_modal("Service Request Details","service_requests/view_request.php?id="+$(this).attr('data-id'),'large')
		})
		$('#create_new').click(function(){
			uni_modal("Service Request Details","service_requests/manage_request.php",'large')
		})
		$('.edit_data').click(function(){
			uni_modal("Service Request Details","service_requests/manage_request.php?id="+$(this).attr('data-id'),'large')
		})
		$('.table').dataTable();
	})
	function delete_service_request($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_request",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
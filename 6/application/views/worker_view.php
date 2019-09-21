<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pangkalan Data Karyawan</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css');?>">
</head>
<body>
	<div class="container">
		<h1>ARKADEMY BOOTCAMP</h1>
		<button class="btn btn-warning" onclick="add_worker()">ADD</button>
		<br>
		<br>
		
		<table id="table_id" class="table table-stripped table-bordered">
			<thead>
			<tr>
				<th>Name</th>
				<th>Work</th>
				<th>Salary</th>
				<th>Action</th>
			</tr>
			</thead>
			
			<tbody>
			<?php
			foreach($workers as $worker){
			
			?>
				<tr>
					<td><?php echo $worker->worker_name ;?></td>
					<td><?php echo $worker->worker_work ;?></td>
					<td><?php echo $worker->worker_salary ;?></td>
					<td>
						<button class="btn btn-danger"><i class= "glyphicon glyphicon-remove"></i></button>
						<button class="btn btn-warning" onclick="edit_worker(<?php echo $worker->worker_name; ?>")"><i class= "glyphicon glyphicon-pencil"></i></button>
					</td>
				</tr>
			<?php
			}
			?>
			
			</tbody>
		</table>
	</div>
	

	<!-- link to js -->
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js');?>"></script>
	
	<!-- js -->
	<script type="text/javascript">	
		var save_method;
		var table;
		
		function add_worker(){
			save_method = 'add';
			$('#form')[0].reset();
			$('#modal_form').modal('show');
			
		}
		
		function save(){
			var url;
			if (save_method == 'add'){
				url = '<?php echo site_url('index.php/Worker/worker_add');?>';
			}else {
				url = '<?php echo site_url('index.php/Worker/worker_update');?>';
			}
			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data){
					$('modal_form').modal('hide');
					locaion.reload();
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert("Error updating data");
				}
			});
		}		

		function edit_worker(id){
			save_method = 'update';
			$('#form')[0].reset();
			
			//load data dari ajax
			$.ajax({
				url: "<?php echo site_url('index.php/worker/ajax_edit/');?>/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(data){
					$('[name="worker_name"]').val(data.worker_name);
					$('[name="worker_work"]').val(data.worker_work);
					$('[name="worker_salary"]').val(data.worker_salary);
					
					$('#modal_form').modal('show');
					
					$('modal_title').text('Edit Worker');
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert("Error getting data from ajax");
				}
			});
			
		}
			
	</script>


<!-- https://getbootstrap.com/docs/3.4/javascript/#modals -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add data</h4>
      </div>
      <div class="modal-body form">
		<form action="#" id="form" class="form-horizontal">
		<input type="hidden" value="" name="name_id">
		
		<div class="form-body">
			<div class="form-group">
				<label class="control-label col-md-3">Name</label>
				<div class="col-md-9">
					<input type="text" name="worker_name" placeholder="Name" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="form-body">
			<div class="form-group">
				<label class="control-label col-md-3">Work</label>
				<div class="col-md-9">
					<input type="text" name="worker_work" placeholder="Work" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="form-body">
			<div class="form-group">
				<label class="control-label col-md-3">Salary</label>
				<div class="col-md-9">
					<input type="text" name="worker_salary" placeholder="Salary" class="form-control">
				</div>
			</div>
		</div>
		
		
		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">ADD</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>


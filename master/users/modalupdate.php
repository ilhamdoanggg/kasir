<?php
	// $kode = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Kode Error.');
		$users->username = $
		$users->ShowOne();
		echo $users->username . "USERNAME";
		echo $users->password;
		echo $users->userlevel;
	if($_POST){
			
			$users->username = $_POST['username'];
			$users->password = $_POST['password'];
			$users->userlevel = $_POST['userlevel'];
			$users->isactive = $_POST['isactive'];
			
			$users->username = $kode;	 
			$users->update();
			header("refresh: 0");
	}
?>
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Data User</h4>
			</div>
		<div class="modal-body">
			<form class="form-horizontal" action="" method="post">
				<div class="row">
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="username">User Name</label>
					<div class="col-md-7">
						<input type="text" id="username" name="username" placeholder="Masukan Username/nama pegawai" class="form-control" value="<?php echo $users->username; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="password">Password</label>
					<div class="col-md-7">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php echo $users->username; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="userlevel">User Level</label>
					<div class="col-md-7">
						<select id="userlevel" name="userlevel" class="form-control">
							<option>- PILIH -</option>
							<?php 
									if($users->userlevel > 0) {
									$rdoadmin = 'selected';
									$rdouser = null;
									}
									else {
									$rdoadmin = null;
									$rdouser = 'selected';
									}
									echo "<option value = 1 {$rdoadmin}>ADMIN</option>";
									echo "<option value = 0 {$rdouser}>USER</option>";
							?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="isactive">User Level</label>
					<div class="col-md-7">
						<select id="isactive" name="isactive" class="form-control">
							<option>- PILIH -</option>
							<?php 
									if($users->isactive > 0) {
									$rdoadmin = 'selected';
									$rdouser = null;
									}
									else {
									$rdoadmin = null;
									$rdouser = 'selected';
									}
									echo "<option value = 1 {$rdoadmin}>Aktif</option>";
									echo "<option value = 0 {$rdouser}>Tidak Aktif</option>";
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8"></div>				
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Tambah</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="glyphicon glyphicon-remove"></i> Batal</button>
					</div>				
				</div>				
			</form>
			</div>
		</div>
		</div>
	</div>
</div>
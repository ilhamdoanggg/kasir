<?php
	session_start();
	if (!$_SESSION['current_user']){
		header("location:/pages/failed.php");
	}
	$path = $_SERVER['DOCUMENT_ROOT'];
	if($_SESSION['current_user'] != null)
	{		
			include_once $path . '/config/database.php';
			$database = new database();
			$db = $database->getConnection();
		
			$page_title = "Data Jasa Salon";
			include_once $path . '/pages/header.php';
			
			echo "<div class='row'>";
			//echo "<div class='container'>";
			echo "<div class='col-sm-3'>";
			include_once $path . '/pages/sidebarmenu.php';
			echo "</div>";		

		include_once $_SERVER['DOCUMENT_ROOT'] . '/objects/items.php';
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$records_per_page = 20;
		$from_record_num = ($records_per_page * $page) - $records_per_page;

		$items = new items($db);

		$statement = $items->readJasa($from_record_num, $records_per_page);
		$num = $statement->rowCount();
		echo "<div class='container'>";
		echo "<div class='col-md-9'>";
		//menampilkan barang
		
		if($num>0){
?>
		
		<div>
			<ol class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Data Jasa Salon</li>
			</ol>
		</div>
			
			<div class="row">
            <div class="col-md-12">
			<div class="panel panel-primary">
                        <div class="panel-heading">			
			               Data Jasa Salon
                        </div>
                        <div class="panel-body">
						
				<div class="row">
				<div class="col-md-12">
				<div class="table-responsive">
                                <table id='example' class="table table-striped table-bordered table-hover" cellspacing='0' width='100%'>
                                    <thead>
                                        <tr>
                                        		<th>No</th>
                                        		<th>Kode Jasa</th>
												<th>Nama Jasa</th>
												<th>Harga</th>
                                        		<th>Keterangan</th>
                                        		<th>Tersedia / Tidak</th>
												<th>Action</th>
                                        </tr>
                                    </thead>
									<?php		

								$total_rows = $items->countAll();
				//$nomor=($page-1)*$total_rows;
				//$nomor=($page-1)*5;
								$halaman = 0;
								$no = 0;
								$subtotal = 0;
	
									while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
										extract($row);
										echo "<tr>";
									$no = $no + 1;
				
									echo"<tr>";
									echo	"<th>$no</th>";
                                    echo    "<th>{$item_kode}</th>";
                                    echo    "<th>{$item_name}</th>";
                                    echo    "<th>Rp . " . number_format($harga, 2, ',','.') . "</th>";
                                    //echo    "<th>-</th>";
                                    echo    "<th>{$item_note}</th>";
									
									if($isavailable==1)
										echo    "<th>Tersedia</th>";
									else
										echo    "<th>Tidak Tersedia</th>";
									
                                    echo    "<th style='width:150px;'>";
							echo "<a href='update.php?id={$item_kode}' title='Ubah' class='btn btn-success col-md-5 glyphicon glyphicon-edit'></button>";
							//echo "<a href='detail.php?id={$username}' title='Detail' class='btn btn-default col-sm-4  glyphicon glyphicon-zoom-in'></a>";
							echo "<a href='delete.php' kode={$item_kode} title='Hapus' class='btn btn-danger delete-object col-sm-5  glyphicon glyphicon-trash'></a>";

                              echo      "</th>";

                                    echo"</tr>";
                                   //tutup while
                                }
									echo"</table>";
echo "</div>";
?>
				<button name="action" id="" class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">
					Tambah Data
				</button>
<?php

				echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			
			echo "<div class='row text-center'>";
			include_once 'paging.php';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	else
		{
			echo "<div>Data Tidak Ada</div>";
		}
		include_once 'modalinsert.php';
		include_once $path . '/pages/footer.php';
		}
	else
	{
		
		header("location:/pages/403.php");
	}
	
?>
<script>$(document).on('click', '.delete-object', function(){	 
	    var id = $(this).attr('kode');
	    var q = confirm("Anda yakin hapus data ini?");	 
	    if (q == true){	 
	        $.post('Delete.php', {
	            object_id: id
	        }, function(data,status){
					alert(data);	        	
	            location.reload();
	        }).fail(function() {
	            alert('Gagal menghapus.');
	        });	 
	    }
	    return false;
	});
</script>
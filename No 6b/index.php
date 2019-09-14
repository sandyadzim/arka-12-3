<!DOCTYPE html>
<html>
	<head>
		<title>Data Karyawan</title>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
		<style type="text/css">
			.wrap-container {
    			overflow: hidden;
			}
			.add-btn {
				margin-top: 50px;
				float: right;
			}
            .tombol {
                color: white;
                padding: 5px 25px;
                float: right;
            }
		</style>
	</head>
	<body>
		
		<div class="wrap-container">
			<div class="container">
                <!-- NAVIGASI -->
				<nav class="navbar navbar-expand-lg navbar-light bg-white">
					<a href="index.php" class="navbar-brand">
					<img src="assets/logo.png" class="align-top" height="30">
						ARKADEMY BOOTCAMP
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
				    	<span class="navbar-toggler-icon"></span>
				  </button>
				</nav>
                <!-- END NAVIGASI -->

				<!-- MAIN -->
				<div class="container mt-4">
					<!-- Modal ADD -->
					<form method="post">
                        <button style="float: right; color: white;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modaladd">ADD</button>
                    </form>
					<!-- End Modal ADD -->

					<!-- TABEL DATA UTAMA -->
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-light">
							<thead class="thead-light">
								<tr align="center">
									<th>Name</th>
									<th>Work</th>
									<th>Salary</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody >
								<?php
									include_once("koneksi.php");

									$query = mysqli_query($koneksi, "SELECT a.*, b.name as work, c.salary
																	 FROM name a, work b, kategori c
																	 WHERE a.id_work=b.id AND a.id_salary=c.id
																	 ORDER BY a.id ASC");
									while ($row = mysqli_fetch_assoc($query)):					
								?>
								<tr align="center">
									<td><?=$row['name']?></td>
									<td><?=$row['work']?></td>
									<td><?=rupiah($row['salary'])?></td>
									<td>
										<a href="proses-hapus.php?id=<?=$row['id'];?>">
                                        <button type="button" class="btn btn-danger" onclick="swal('Data Berhasil Terhapus', '', 'success');">
                                            Delete
                                        </button>
                                        </a>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit<?= $row['id']; ?>">
										    Edit
                                        </button>


         <!-- MODAL EDIT -->                                                         
           
            <div id="myModaledit<?=$row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        	<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            	<span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                        	<!-- Form Edit -->
                            
                                <form action="proses-edit.php?id=<?=$row['id'];?>" method="post">
                                    <div class="form-group">                                
                                        <input type="text" class="form-control" name="name" value="<?=$row['name'];?>">
                                    </div>

                                    <div class="form-group">                                        
                                        <select name="work" class="form-control">
                                            <option>Work</option>
                                            <?php
                                            $c=mysqli_query($koneksi,"SELECT * FROM work");
                                            foreach ($c as $d)
                                            { 
                                            ?>
                                            <option value="<?=$d["id"]?>"<?php if($d["id"] == $row["id_work"]){ echo " selected"; } ?>>
                                            <?=$d["name"]?>
                                            </option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        
                                        <select name="salary" class="form-control">
                                            <option>Salary</option>
                                            <?php
                                            $c=mysqli_query($koneksi,"SELECT * FROM kategori");
                                            foreach ($c as $d)
                                            { 
                                            ?>
                                            <option value="<?=$d['id']?>"<?php if($d['id'] == $row['id_salary']){ echo "selected"; } ?>>
                                                <?=rupiah($d['salary']);?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" name="edit" class="btn btn-warning tombol">
                                                Edit
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            <!-- End Form Edit -->
                        </div>        
                    </div>
                </div>
            </div>
        
        <!-- MODAL EDIT AKHIR -->
                                                                
									</td>	
								</tr>
								<?php
									endwhile;
								?>
							</tbody>
						</table>
						
					</div>
				</div>

			</div>
		</div>

		

		<!-- Modal Add -->
		<div id="Modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        	<h4 class="modal-title" id="ModalLabel">Add Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            	<span aria-hidden="true">&times;</span>
                            </button>     
                        </div>

                        <div class="modal-body">
                            <!-- Form Add -->
                                <form action="proses-add.php" method="post">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="form-group">                                        
                                        <select name="work" class="form-control">
                                            <option>Work</option>
                                            <?php
                                            $a=mysqli_query($koneksi,"SELECT * FROM work");
                                            foreach ($a as $b)
                                            { 
                                            ?>
                                            <option value="<?=$b['id']?>"><?=$b['name']?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        
                                        <select name="salary" class="form-control">
                                            <option>Salary</option>
                                            <?php
	                                            $a=mysqli_query($koneksi,"SELECT * FROM kategori");
	                                            foreach ($a as $b)
	                                            { 
                                            ?>
                                            <option value="<?=$b['id']?>"><?=rupiah($b['salary']);?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" name="add" class="btn btn-warning tombol">
                                                Add
                                            </button>
                                            
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form Add -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Add -->

	</body>
</html>
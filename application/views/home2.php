	<p>view file: /application/views/home.php</p>
	<h1>I'm Front End</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Mahasiswa</h3>
				</div>
				<div class="box-header">
					<a href=" <?php echo base_url()?>home/tambah_siswa" class="btn btn-primary "><i class="fa fa-plus"></i>
						Tambah Siswa baru</a>
					</div>
					<br>
					<table id="table_id" class="display">
						<thead>
							<tr>
								<th>Nim</th>
								<th>Nama</th>
								<th>Telp</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $item): ?>
								<tr>
									<td><?php echo $item->nim ?></td>
									<td><?php echo $item->nama ?></td>
									<td><?php echo $item->telp ?></td>
									<td>
										<a href="http://localhost/starter/auth/edit_user/1" class="badge bg-blue">Edit</a>
										<a href="#" data-id="1" data-name="Admin" class="badge bg-red delete-info" data-toggle="modal" data-target="#modal-default">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>


							<script type="text/javascript">
							$(document).ready( function () {
								$('#table_id').DataTable();
							} );
							</script>

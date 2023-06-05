<!DOCTYPE html>
<html>
	<head>
		<title>Data Provinsi</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
	</head>
	<body>
		@include('navbar')
		<main id="main" class="main">
			<div class="pagetitle">
				<h1>Data Provinsi</h1>
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/">Home</a>
						</li>
						<li class="breadcrumb-item active">Edit Data Provinsi</li>
					</ol>
				</nav>
			</div>
			<!-- End Page Title -->
			<section class="section dashboard">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-xxl-4 col-md-12">
								<div class="card info-card revenue-card">
									{{-- tabel --}}
									<div class="card-body">
										<br />
										<div style="margin-bottom: 10px;">
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
										</div>
										<!-- Modal Tambah Data -->
										<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="addModalLabel">Tambah Data Provinsi</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- Isi form tambah data akan dimuat di sini -->
														<!-- Contoh form tambah data -->
														<form action="{{ route('provinsi.store') }}" method="POST">
															@csrf
															<div class="mb-3">
																<label for="namaProvinsi" class="form-label">Nama Provinsi</label>
																<input type="text" class="form-control" id="namaProvinsi" name="provinsi" placeholder="Nama Provinsi" />
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Simpan</button>
															  </div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<br />
										<div class="table-responsive">
											<table id="provinsiTable" class="table">
												<thead>
													<tr>
														<th>ID Provinsi</th>
														<th>Provinsi</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													@foreach($provinsis as $provinsi)
													<!-- Modal Update -->
													<div class="modal fade" id="updateModal{{ $provinsi->id_provinsi }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $provinsi->id_provinsi }}" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="updateModalLabel{{ $provinsi->id_provinsi }}">Update Data Provinsi</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<!-- Isi form update akan dimuat di sini -->
																	<!-- Contoh form update -->
																	<form action="{{ route('provinsi.update', $provinsi->id_provinsi) }}" method="POST">
																		@csrf @method('PUT')
																		<h5>Nama Provinsi</h5>
																		<input type="text" name="provinsi" value="{{ $provinsi->provinsi }}" />
																		<button type="submit" class="btn btn-primary">Update</button>
																	</form>
																</div>
															</div>
														</div>
													</div>

													<tr>
														<td>{{ $provinsi->id_provinsi }}</td>
														<td>{{ $provinsi->provinsi }}</td>
														<td>
															<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $provinsi->id_provinsi }}">Update</a>
															<form action="{{ route('provinsi.destroy', $provinsi->id_provinsi) }}" method="POST" style="display: inline">
																@csrf @method('DELETE')
																<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $provinsi->id_provinsi }}">Delete</button>

																<!-- Modal Konfirmasi Hapus -->
																<div class="modal fade" id="confirmDelete{{ $provinsi->id_provinsi }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $provinsi->id_provinsi }}" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="confirmDeleteLabel{{ $provinsi->id_provinsi }}">Konfirmasi Hapus</h5>
																				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																			</div>
																			<div class="modal-body">
																				Apakah Anda yakin ingin menghapus data ini?
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
																				<button type="submit" class="btn btn-danger">Hapus</button>
																			</div>
																		</div>
																	</div>
																</div>
															</form>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									{{-- end tabel --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer id="footer" class="footer">
			<div class="copyright">
				&copy; Copyright <strong><span>MyWeather</span></strong>. All Rights Reserved
			</div>
		</footer>
		<!-- End Footer -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
			  $('#provinsiTable').DataTable();
			});
		</script>
		<script>
			$(document).ready(function() {
			  $('.btn-update').click(function(e) {
			    e.preventDefault(); // Menghentikan tindakan default dari link

			    // Mendapatkan URL aksi dari atribut href
			    var url = $(this).attr('href');

			    // Mengirim permintaan AJAX untuk memuat isi form update
			    $.get(url, function(data) {
			      // Menampilkan data form dalam menu popup (misalnya, menggunakan library modal Bootstrap)
			      // Di sini Anda dapat menggunakan kode JavaScript atau library UI lainnya untuk menampilkan menu popup
			      // dan memuat data form update ke dalamnya.
			      // Misalnya, jika Anda menggunakan modal Bootstrap, Anda dapat menggunakan kode seperti berikut:
			      $('#updateModalBody').html(data); // Memuat data form ke dalam elemen dengan ID "updateModalBody"
			      $('#updateModal').modal('show'); // Menampilkan menu popup dengan ID "updateModal"
			    });
			  });
			});
		</script>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<title>Data Kota</title>
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
				<h1>Data Kota</h1>
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/">Home</a>
						</li>
						<li class="breadcrumb-item active">Edit Data Kota</li>
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
									<div class="card-body">
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
															<h5 class="modal-title" id="addModalLabel">Tambah Data kota</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<!-- Isi form tambah data akan dimuat di sini -->
															<form action="{{ route('kota.store') }}" method="POST">
																@csrf
																<div class="mb-3">
																	<label for="namaKota" class="form-label">Nama Kota</label>
																	<input type="text" class="form-control" id="namaKota" name="kota" placeholder="Nama Kota" />
																</div>
																<div class="mb-3">
																	<label for="namaProvinsi" class="form-label">Nama Provinsi</label>
																	<select class="form-select" id="namaProvinsi" name="id_provinsi">
																		@foreach($provinsis as $provinsi)
																		<option value="{{ $provinsi->id_provinsi }}">{{ $provinsi->provinsi }}</option>
																		@endforeach
																	</select>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button  type="submit" class="btn btn-primary">Simpan</button>
																  </div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<br />

											<div class="col">
												<div class="form-group">
													<select id="provinsi" class="form-control">
														<option value="">Pilih Provinsi</option>
														@foreach ($provinsis as $provinsi)
														<option value="{{ $provinsi->id_provinsi }}">{{ $provinsi->provinsi }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="table-responsive">
												<table id="kotaTable" class="table">
													<thead>
														<tr>
															<th>ID kota</th>
															<th>kota</th>
															<th>Provinsi</th>
															<th>Edit</th>
														</tr>
													</thead>
													<tbody>
														@foreach($kotas as $kota)
														<tr>
															<td>{{ $kota->id_kota }}</td>
															<td>{{ $kota->kota }}</td>
															<td>{{ $kota->provinsi->provinsi }}</td>
															<td>
																<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $kota->id_kota }}">Update</a>

																<!-- Modal Update -->
																<div class="modal fade" id="updateModal{{ $kota->id_kota }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $kota->id_kota }}" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="updateModalLabel{{ $kota->id_kota }}">Update Kota</h5>
																				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																			</div>
																			<div class="modal-body">
																				<form action="{{ route('kota.update', $kota->id_kota) }}" method="POST">
																					@csrf @method('PUT')
																					<div class="mb-3">
																						<label for="namaKota" class="form-label">Nama Kota</label>
																						<input type="text" class="form-control" id="namaKota" name="kota" value="{{ $kota->kota }}" />
																					</div>
																					<div class="mb-3">
																						<label for="namaProvinsi" class="form-label">Nama Provinsi</label>
																						<select class="form-select" id="namaProvinsi" name="id_provinsi">
																							@foreach($provinsis as $provinsi)
																							<option value="{{ $provinsi->id_provinsi }}" {{ $provinsi->id_provinsi == $kota->id_provinsi ? 'selected' : '' }}>{{ $provinsi->provinsi }}</option>
																							@endforeach
																						</select>
																					</div>
																					<button type="submit" class="btn btn-primary">Simpan</button>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>

																<form action="{{ route('kota.destroy', $kota->id_kota) }}" method="POST" style="display: inline">
																	@csrf @method('DELETE')
																	<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $kota->id_kota }}">Delete</button>

																	<!-- Modal Konfirmasi Hapus -->
																	<div class="modal fade" id="confirmDelete{{ $kota->id_kota }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $kota->id_kota }}" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h5 class="modal-title" id="confirmDeleteLabel{{ $kota->id_kota }}">Konfirmasi Hapus</h5>
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
			  $('#kotaTable').DataTable();
			});
		</script>
		<script>
			$(document).ready(function() {
			  $('.btn-update').click(function(e) {
			    e.preventDefault();
			    var url = $(this).attr('href');

			    // Mengirim permintaan AJAX untuk memuat isi form update
			    $.get(url, function(data) {
			     
			      $('#updateModalBody').html(data); // Memuat data form ke dalam elemen dengan ID "updateModalBody"
			      $('#updateModal').modal('show'); // Menampilkan menu popup dengan ID "updateModal"
			    });
			  });
			});
		</script>
	</body>
</html>

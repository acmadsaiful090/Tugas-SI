<!DOCTYPE html>
<html>
	<head>
		<title> Data Lokasi</title>
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
				<h1>Data Lokasi</h1>
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/">Home</a>
						</li>
						<li class="breadcrumb-item active">Edit Data Lokasi</li>
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
														<h5 class="modal-title" id="addModalLabel">Tambah Data Lokasi</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<!-- Isi form tambah data akan dimuat di sini -->
														<form action="{{ route('lokasi.store') }}" method="POST">
															@csrf
															<div class="mb-3">
																<label for="namaKota" class="form-label">Nama Lokasi</label>
																<input type="text" class="form-control" id="namaKota" name="lokasi" placeholder="Nama Lokasi" />
															</div>
															<div class="mb-3">
																<label for="namaProvinsi" class="form-label">Nama Kota/Kabupaten</label>
																<select class="form-select" id="namaProvinsi" name="id_kota">
																	@foreach($kotas as $kota)
																	<option value="{{ $kota->id_kota }}">{{ $kota->kota }}</option>
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
										<div class="table-responsive">
											<table id="lokasiTable" class="table">
												<thead>
													<tr>
														<th>ID Lokasi</th>
														<th>Lokasi</th>
														<th>Kota</th>
														<th>Provinsi</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													@foreach($kotas as $kota) @foreach($kota->lokasis as $lokasi)
													<tr>
														<td>{{ $lokasi->id_lokasi }}</td>
														<td>{{ $lokasi->lokasi }}</td>
														<td>{{ $kota->kota }}</td>
														<td>{{ $kota->provinsi->provinsi }}</td>
														<td>
															<!-- Tombol Update -->
															<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $lokasi->id_lokasi }}">Update</a>
															<!-- Tombol Delete -->
															<form action="{{ route('lokasi.destroy', $lokasi->id_lokasi) }}" method="POST" style="display: inline">
																@csrf @method('DELETE')
																<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $lokasi->id_lokasi }}">Delete</button>

																<!-- Modal Konfirmasi Hapus -->
																<div class="modal fade" id="confirmDelete{{ $lokasi->id_lokasi }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $lokasi->id_lokasi }}" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="confirmDeleteLabel{{ $lokasi->id_lokasi }}">Konfirmasi Hapus</h5>
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
															<!-- Modal Update -->
															<div class="modal fade" id="updateModal{{ $lokasi->id_lokasi }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $lokasi->id_lokasi }}" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="updateModalLabel{{ $lokasi->id_lokasi }}">Edit Lokasi</h5>
																			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																		</div>
																		<div class="modal-body">
																			<form action="{{ route('lokasi.update', $lokasi->id_lokasi) }}" method="POST">
																				@csrf @method('PUT')
																				<!-- Tambahkan input dan elemen lain sesuai kebutuhan -->
																				<div class="mb-3">
																					<label for="namaLokasi" class="form-label">Nama Lokasi</label>
																					<input type="text" class="form-control" id="namaLokasi" name="lokasi" value="{{ $lokasi->lokasi }}" />
																				</div>
																				<div class="mb-3">
																					<label for="kota" class="form-label">Kota</label>
																					<select name="id_kota" class="form-control">
																						@foreach($kotas as $kotaOption)
																						<option value="{{ $kotaOption->id_kota }}" {{ $lokasi->id_kota == $kotaOption->id_kota ? 'selected' : '' }}>{{ $kotaOption->kota }}</option>
																						@endforeach
																					</select>
																				</div>
																				<!-- Tambahkan opsi provinsi jika diperlukan -->
																				<button type="submit" class="btn btn-primary">Simpan</button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</td>
													</tr>
													@endforeach @endforeach
												</tbody>
											</table>
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
			  $('#lokasiTable').DataTable();
			});
		</script>
		<script>
			$(document).ready(function() {
			  $('.btn-update').click(function(e) {
			    e.preventDefault(); // Menghentikan tindakan default dari link
			    // Mendapatkan URL aksi dari atribut href
			    var url = $(this).attr('href');	 
			    $.get(url, function(data) {

			      $('#updateModalBody').html(data); // Memuat data form ke dalam elemen dengan ID "updateModalBody"
			      $('#updateModal').modal('show'); // Menampilkan menu popup dengan ID "updateModal"
			    });
			  });
			});
		</script>
	</body>
</html>

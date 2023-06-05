<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	</head>
	<body>
		@if(Auth::check() && Auth::user()->getRole() === 'admin')
    @include('navbar')
@else
    @include('navbar-user')
@endif
		<main id="main" class="main">
			<div class="pagetitle">
				<h1>Dashboard</h1>
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</nav>
			</div>
			<!-- End Page Title -->
			<div class="card">
				<div class="card-header">
					<div class="row align-items-start">
						<div class="col">
							Pilih Lokasi :
						</div>
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
						<div class="col">
							<div class="form-group">
								<select id="kota" class="form-control">
									<option value="">Pilih Kota/Kabupaten</option>
								</select>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<select id="lokasi" class="form-control">
									<option value="">Pilih Lokasi</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<div class="row align-items-start">
						<div class="col">
							Pilih tanggal dan jam:
						</div>
						<div class="col">
							<input type="datetime-local" id="tanggal-jam" value="" />
						</div>
					</div>
				</div>
			</div>			
			<section class="section dashboard">
				<div class="row">
					<!-- Left side columns -->
					<div class="col-lg-12">
						<div class="row">
							<div class="col-xxl-4 col-md-3">
								<div class="card info-card revenue-card">
									<div class="card-body">
										<h5 class="card-title">Kelembaban</h5>
										<div class="d-flex align-items-center">
											<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="fas fa-tint" style="color: #2061cf;"></i>
											</div>
											<div class="ps-3">
												{{-- <h6>{{ $kelembabanTerbaru }}%</h6> --}}
												<span class="text-success small pt-1 fw-bold">{{ number_format($persentase, 2) }}%</span>
												<span class="text-muted small pt-2 ps-1">{{ $peningkatan }}</span>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<!-- Kelembaban -->
							<!-- Suhu Card -->
							<div class="col-xxl-4 col-md-3">
								<div class="card info-card sales-card">
									<div class="card-body">
										<h5 class="card-title">Suhu</h5>
										<div class="d-flex align-items-center">
											<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="fa-solid fa-temperature-quarter"></i>
											</div>
											<div class="ps-3">
												<h6>{{ $suhuTerbaru}}°C</h6>
												<span class="text-success small pt-1 fw-bold">{{ number_format($persentase, 2) }}%</span>
												<span class="text-muted small pt-2 ps-1">{{ $peningkatan }}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Suhu Card -->

							<div class="col-xxl-4 col-md-3">
								<div class="card info-card revenue-card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#">Today</a></li>
											<li><a class="dropdown-item" href="#">This Month</a></li>
											<li><a class="dropdown-item" href="#">This Year</a></li>
										</ul>
									</div>
									<div class="card-body">
										<h5 class="card-title">Tekanan <span>| This Month</span></h5>
										<div class="d-flex align-items-center">
											<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="fas fa-tachometer-alt" style="color: #4e4677;"></i>
											</div>
											<div class="ps-3">
												<h6>1008 hPa</h6>
												<span class="text-success small pt-1 fw-bold">8%</span>
												<span class="text-muted small pt-2 ps-1">increase</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- angin Card -->
							<div class="col-xxl-4 col-md-3">
								<div class="card info-card revenue-card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#">Today</a></li>
											<li><a class="dropdown-item" href="#">This Month</a></li>
											<li><a class="dropdown-item" href="#">This Year</a></li>
										</ul>
									</div>
									<div class="card-body">
										<h5 class="card-title">Angin <span>| This Month</span></h5>
										<div class="d-flex align-items-center">
											<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="fas fa-wind" style="color: #277c4c;"></i>
											</div>
											<div class="ps-3">
												<h6>5 Km/h</h6>
												<span class="text-success small pt-1 fw-bold">8%</span>
												<span class="text-muted small pt-2 ps-1">increase</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End angin Card -->

							<div class="col-6">
								<div class="card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#">Today</a></li>
											<li><a class="dropdown-item" href="#">This Month</a></li>
											<li><a class="dropdown-item" href="#">This Year</a></li>
										</ul>
									</div>
									<div class="card-body">
										<h5 class="card-title">Kelembaban <span>/ Today</span></h5>
										<!-- Line Chart -->
										<div id="humidityChart"></div>
										<script>
											document.addEventListener("DOMContentLoaded", () => {
											  new ApexCharts(document.querySelector("#humidityChart"), {
											    series: [{
											      name: 'Humidity',
											      data: [45, 32, 56, 38, 51, 64, 49],
											    }],
											    chart: {
											      height: 350,
											      type: 'line',
											      toolbar: {
											        show: false
											      },
											    },
											    markers: {
											      size: 4
											    },
											    colors: ['#2eca6a'],
											    dataLabels: {
											      enabled: false
											    },
											    stroke: {
											      curve: 'smooth',
											      width: 2
											    },
											    xaxis: {
											      type: 'datetime',
											      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
											    },
											    tooltip: {
											      x: {
											        format: 'dd/MM/yy HH:mm'
											      },
											    }
											  }).render();
											});
										</script>
										<!-- End Line Chart -->
									</div>
								</div>
							</div>
							<!-- End Kelembaban -->
							<!-- Suhu -->
							<div class="col-6">
								<div class="card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#">Today</a></li>
											<li><a class="dropdown-item" href="#">This Month</a></li>
											<li><a class="dropdown-item" href="#">This Year</a></li>
										</ul>
									</div>
									<div class="card-body">
										<h5 class="card-title">Suhu <span>/ Today</span></h5>
										<!-- Line Chart -->
										<div id="temperatureChart"></div>
										<script>
											document.addEventListener("DOMContentLoaded", () => {
											  new ApexCharts(document.querySelector("#temperatureChart"), {
											    series: [{
											      name: 'Temperature',
											      data: [31, 40, 28, 51, 42, 82, 56],
											    }],
											    chart: {
											      height: 350,
											      type: 'line',
											      toolbar: {
											        show: false
											      },
											    },
											    markers: {
											      size: 4
											    },
											    colors: ['#4154f1'],
											    dataLabels: {
											      enabled: false
											    },
											    stroke: {
											      curve: 'smooth',
											      width: 2
											    },
											    xaxis: {
											      type: 'datetime',
											      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
											    },
											    tooltip: {
											      x: {
											        format: 'dd/MM/yy HH:mm'
											      },
											    }
											  }).render();
											});
										</script>
										<!-- End Line Chart -->
									</div>
								</div>
							</div>
							<!-- End Suhu -->
							<!-- Tekanan Udara -->
							<div class="col-6">
								<div class="card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#">Today</a></li>
											<li><a class="dropdown-item" href="#">This Month</a></li>
											<li><a class="dropdown-item" href="#">This Year</a></li>
										</ul>
									</div>
									<div class="card-body">
										<h5 class="card-title">Tekanan Udara <span>/ Today</span></h5>
										<!-- Line Chart -->
										<div id="pressureChart"></div>
										<script>
											document.addEventListener("DOMContentLoaded", () => {
											  new ApexCharts(document.querySelector("#pressureChart"), {
											    series: [{
											      name: 'Pressure',
											      data: [1013, 1012, 1014, 1011, 1010, 1013, 1012],
											    }],
											    chart: {
											      height: 350,
											      type: 'line',
											      toolbar: {
											        show: false
											      },
											    },
											    markers: {
											      size: 4
											    },
											    colors: ['#ff771d'],
											    dataLabels: {
											      enabled: false
											    },
											    stroke: {
											      curve: 'smooth',
											      width: 2
											    },
											    xaxis: {
											      type: 'datetime',
											      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
											    },
											    tooltip: {
											      x: {
											        format: 'dd/MM/yy HH:mm'
											      },
											    }
											  }).render();
											});
										</script>
										<!-- End Line Chart -->
									</div>
								</div>
							</div>
							<!-- End Tekanan Udara -->
							<!-- Kecepatan Angin -->
							<div class="col-6">
								<div class="card">
									<div class="filter">
										<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
										<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
											<li class="dropdown-header text-start">
												<h6>Filter</h6>
											</li>
											<li><a class="dropdown-item" href="#" id="todayFilter">Today</a></li>
											<li><a class="dropdown-item" href="#" id="thisMonthFilter">This Month</a></li>
											<li><a class="dropdown-item" href="#" id="thisYearFilter">This Year</a></li>
										</ul>
									</div>
									<div class="card-body" id="windSpeedCardBody">
										<h5 class="card-title">Kecepatan Angin <span>/ Today</span></h5>
										<!-- Line Chart -->
										<div id="windSpeedChart"></div>
										<script>
											document.addEventListener("DOMContentLoaded", () => {
											  const options = {
											    series: [{
											      name: 'Wind Speed',
											      data: [10, 12, 8, 15, 9, 11, 13],
											    }],
											    chart: {
											      height: 350,
											      type: 'line',
											      toolbar: {
											        show: false
											      },
											      zoom: {
											        enabled: false
											      },
											    },
											    markers: {
											      size: 4
											    },
											    colors: ['#4154f1'],
											    dataLabels: {
											      enabled: false
											    },
											    stroke: {
											      curve: 'smooth',
											      width: 2
											    },
											    xaxis: {
											      type: 'datetime',
											      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
											    },
											    tooltip: {
											      x: {
											        format: 'dd/MM/yy HH:mm'
											      },
											    },
											    legend: {
											      show: false
											    },
											    responsive: [{
											      breakpoint: 480,
											      options: {
											        chart: {
											          width: '100%',
											          height: 300
											        },
											        dataLabels: {
											          enabled: false
											        },
											        xaxis: {
											          labels: {
											            show: false
											          }
											        }
											      }
											    }]
											  };

											  const chart = new ApexCharts(document.querySelector("#windSpeedChart"), options);
											  chart.render();
											});
										</script>
										<!-- End Line Chart -->
									</div>
								</div>
							</div>
							<!-- End Kecepatan Angin -->
						</div>
					</div>
					<!-- End Left side columns -->
				</div>
			</section>
		</main>
		<footer id="footer" class="footer">
			<div class="copyright">
				&copy; Copyright <strong><span>MyWeather</span></strong>. All Rights Reserved
			</div>
		</footer>
		<!-- End Footer -->
		<script>
			$(document).ready(function() {
			    $('#provinsi').change(function() {
			        var provinsiId = $(this).val();
			        if (provinsiId) {
			            $.ajax({
			                url: '{{ route('getKotaByProvinsi') }}',
			                type: 'GET',
			                data: {id_provinsi: provinsiId},
			                success: function(data) {
			                    $('#kota').empty();
			                    $('#kota').append($('<option>').text('Pilih Kota/Kabupaten').attr('value', ''));
			                    $.each(data, function(i, kota) {
			                        $('#kota').append($('<option>').text(kota.kota).attr('value', kota.id_kota));
			                    });
			                }
			            });
			        } else {
			            $('#kota').empty();
			            $('#kota').append($('<option>').text('Pilih Kota/Kabupaten').attr('value', ''));
			        }
			    });
			    $('#kota').change(function() {
			        var kotaId = $(this).val();
			        if (kotaId) {
			            $.ajax({
			                url: '{{ route('getLokasiByKota') }}',
			                type: 'GET',
			                data: {id_kota: kotaId},
			                success: function(data) {
			                    $('#lokasi').empty();
			                    $('#lokasi').append($('<option>').text('Pilih Lokasi').attr('value', ''));
			                    $.each(data, function(i, lokasi) {
			                        $('#lokasi').append($('<option>').text(lokasi.lokasi).attr('value', lokasi.id_lokasi));
			                    });
			                }
			            });
			        } else {
			            $('#lokasi').empty();
			            $('#lokasi').append($('<option>').text('Pilih Lokasi').attr('value', ''));
			        }
			    });
			});
		</script>
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				var inputTanggalJam = document.getElementById("tanggal-jam");
				
				// Periksa jika value input kosong
				if (!inputTanggalJam.value) {
					var currentTime = new Date().toISOString().slice(0, 16);
					inputTanggalJam.value = currentTime;
				}
			});
		</script>

		
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>

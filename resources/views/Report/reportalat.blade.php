<!DOCTYPE html>
<html>
<head>
    <title>Report Data Alat</title>

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
            <h1>Report Data alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Report Data alat</li>
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Unduh Report</button>
                                    </div>
                                    <br />
                                    <div class="table-responsive">
                                        <table id="alatTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID alat</th>
                                                    <th>alat</th>
                                                    <th>Id Suhu</th>
                                                    <th>Id Kelambaban</th>
                                                    <th>Id Tekanan Udara</th>
                                                    <th>Id Kecepatan Angin</th>
                                                    <th>Id Lokasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($alats as $alat)
                                                <tr>
                                                    <td>{{ $alat->id_alat }}</td>
                                                    <td>{{ $alat->alat }}</td>
                                                    <td>{{ $alat->waktu }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
                &copy; Copyright <strong><span>MyWeather</span></strong>.
                All Rights Reserved
            </div>
        </footer>
        <!-- End Footer -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#alatTable').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.btn-update').click(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, function(data) {
                        $('#updateModalBody').html(data);
                        $('#updateModal').modal('show');
                    });
                });
            });
        </script>
    </body>
</html>

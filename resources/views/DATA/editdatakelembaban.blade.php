<!DOCTYPE html>
<html>
<head>
    <title>Data Kelembaban</title>

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
            <h1>Data Kelembaban</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Data Kelembaban</li>
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
                                                    <h5 class="modal-title" id="addModalLabel">Tambah Data Kelembaban</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Isi form tambah data akan dimuat di sini -->
                                                    <!-- Contoh form tambah data -->
                                                    <form action="{{ route('kelembabans.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="pilihanalat" class="form-label">Pilihan alat</label>
                                                            <select class="form-select" id="id_alat" name="id_alat">
                                                                @foreach($alats as $alat)
                                                                    <option value="{{ $alat->id_alat }}">{{ $alat->alat }}</option>
                                                                @endforeach
                                                            </select>                                                    
                                                        </div>  
                                                        <div class="mb-3">
                                                            <label for="inputkelembaban" class="form-label">Kelembaban</label>
                                                            <input type="number" step="any" class="form-control" id="inputkelembaban" name="kelembaban" placeholder="kelembaban" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputWaktu" class="form-label">Waktu</label>
                                                            <input type="datetime-local" class="form-control" id="inputWaktu" name="waktu" placeholder="Waktu" />
                                                        </div>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button  type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="table-responsive">
                                        <table id="kelembabanTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID Kelembaban</th>
                                                    <th>ID Alat</th>
                                                    <th>Kelembaban</th>
                                                    <th>Waktu</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kelembabans as $kelembaban)
                                                <tr>
                                                    <td>{{ $kelembaban->id_kelembaban }}</td>
                                                    <td>{{ $kelembaban->alat->alat }}</td>
                                                    <td>{{ $kelembaban->kelembaban }}</td>
                                                    <td>{{ $kelembaban->waktu }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $kelembaban->id_kelembaban }}">Update</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $kelembaban->id_kelembaban }}">Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal Update -->
                                                <div class="modal fade" id="updateModal{{ $kelembaban->id_kelembaban }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $kelembaban->id_kelembaban }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateModalLabel{{ $kelembaban->id_kelembaban }}">Update Data kelembaban</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Isi form update akan dimuat di sini -->
                                                                <!-- Contoh form update -->
                                                                <form action="{{ route('kelembabans.update', ['id_kelembaban' => $kelembaban->id_kelembaban]) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="id_alat" class="form-label">Alat</label>
                                                                        <select class="form-select" id="id_alat" name="id_alat">
                                                                            @foreach($alats as $alat)
                                                                                <option value="{{ $alat->id_alat }}" {{ $alat->id_alat == $kelembaban->id_alat ? 'selected' : '' }}>{{ $alat->alat }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="kelembaban" class="form-label">Kelembaban</label>
                                                                        <input type="text" class="form-control" id="kelembaban" name="kelembaban" value="{{ $kelembaban->kelembaban }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="waktu" class="form-label">Waktu</label>
                                                                        <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $kelembaban->waktu }}">
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
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="confirmDelete{{ $kelembaban->id_kelembaban }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $kelembaban->id_kelembaban }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteLabel{{ $kelembaban->id_kelembaban }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('kelembabans.destroy', ['id_kelembaban' => $kelembaban->id_kelembaban]) }}" method="POST" style="display: inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                $('#kelembabanTable').DataTable();
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

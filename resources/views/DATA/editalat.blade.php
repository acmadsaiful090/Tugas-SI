<!DOCTYPE html>
<html>
<head>
    <title>Data alat</title>

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
            <h1>Data alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Data alat</li>
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
                                                    <h5 class="modal-title" id="addModalLabel">Tambah Data alat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('alats.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="inputalat" class="form-label">Alat</label>
                                                            <input type="text" class="form-control" id="inputalat" name="alat" placeholder="Alat" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputlokasi" class="form-label">Lokasi</label>
                                                            <select class="form-select" id="inputlokasi" name="id_lokasi">
                                                                @foreach($lokasis as $lokasi)
                                                                <option value="{{ $lokasi->id_lokasi }}">{{ $lokasi->lokasi }}</option>
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
                                        <table id="alatTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID alat</th>
                                                    <th>alat</th>
                                                    <th>Lokasi</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($alats as $alat)
                                                <tr>
                                                    <td>{{ $alat->id_alat }}</td>
                                                    <td>{{ $alat->alat }}</td>
                                                    <td>{{ $alat->lokasi->lokasi}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $alat->id_alat }}">Update</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $alat->id_alat }}">Delete</button>
                                                    </td>
                                                </tr>
                                               <!-- Modal Update -->
<div class="modal fade" id="updateModal{{ $alat->id_alat }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $alat->id_alat }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel{{ $alat->id_alat }}">Update Data Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alats.update', ['id_alat' => $alat->id_alat]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="alat{{ $alat->id_alat }}" class="form-label">Alat</label>
                        <input type="text" class="form-control" id="alat{{ $alat->id_alat }}" name="alat" value="{{ $alat->alat }}" />
                    </div>
                    <div class="mb-3">
                        <label for="id_lokasi{{ $alat->id_alat }}" class="form-label">Lokasi</label>
                        <select class="form-select" id="id_lokasi{{ $alat->id_alat }}" name="id_lokasi">
                            @foreach($lokasis as $lokasi)
                                <option value="{{ $lokasi->id_lokasi }}" {{ $lokasi->id_lokasi == $alat->id_lokasi ? 'selected' : '' }}>
                                    {{ $lokasi->lokasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                                                
            </div>
        </div>
    </div>
</div>
                                                                                                                                             
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="confirmDelete{{ $alat->id_alat }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $alat->id_alat }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteLabel{{ $alat->id_alat }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('alats.destroy', ['id_alat' => $alat->id_alat]) }}" method="POST" style="display: inline">
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

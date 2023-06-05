<!DOCTYPE html>
<html>
<head>
    <title>Data Session</title>

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
            <h1>Data Session</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Data Session</li>
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
                                    <br />
                                    <div class="table-responsive">
                                        <table id="suhuTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID Session</th>
                                                    <th>User ID</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sessions as $session)
                                                <tr>
                                                    <td>{{ $session->id_session }}</td>
                                                    <td>{{ $session->id_user }}</td>
                                                    <td>{{ $session->start_time }}</td>
                                                    <td>{{ $session->end_time }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $session->id_session }}">Update</a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $session->id_session }}">Delete</button>
                                                    </td>                                                    
                                                </tr>
                                                <div class="modal fade" id="updateModal{{ $session->id_session }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $session->id_session }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateModalLabel{{ $session->id_session }}">Update Data Session</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            
                                                                <form action="{{ route('sessions.update', ['session' => $session->id_session]) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <!-- Isi form sesuai dengan kolom yang ingin diperbarui -->
                                                                    <div class="mb-3">
                                                                    <label class="form-label"for="Start Time">Start Time</label>
                                                                    <input type="datetime-local" class="form-control" name="start_time" value="{{ $session->start_time }}" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                    <h5>End Time</h5>
                                                                    <input type="datetime-local" class="form-control" name="end_time" value="{{ $session->end_time }}" />
                                                                    </div>
                                                                    
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="confirmDelete{{ $session->id_session }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $session->id_session }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteLabel{{ $session->id_session }}">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('sessions.destroy', ['session' => $session->id_session]) }}" method="POST" style="display: inline">
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
                $('#suhuTable').DataTable();
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

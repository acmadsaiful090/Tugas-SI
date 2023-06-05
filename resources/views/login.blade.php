<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
</head>
<body>
  @if(Auth::check() && Auth::user()->getRole() === 'admin')
  @include('navbar')
@else
  @include('navbar-user')
@endif
      <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your username & password to login</p>
                    </div>
                    <form class="row g-3 needs-validation" novalidate action="{{ route('login') }}" method="POST">
                      @csrf
                      <div class="col-12">
                          <label for="yourUsername" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="yourUsername" required>
                              <div class="invalid-feedback">Please enter your username.</div>
                          
                      </div>
                      <div class="col-12">
                          <label for="yourPassword" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      <div class="col-12">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                              <label class="form-check-label" for="rememberMe">Remember me</label>
                          </div>
                      </div>
                      <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Login</button>
                      </div>
                      <div class="col-12">
                          <p class="small mb-0">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></p>
                      </div>
                  </form>
                                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      <<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('register.submit') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
      </form>
      
      </div>
    </div>
  </div>
</div>
      
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

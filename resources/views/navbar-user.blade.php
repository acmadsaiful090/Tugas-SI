<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
			<div class="d-flex align-items-center justify-content-between">
				<a href="/" class="logo d-flex align-items-center">
					<i class="fa-solid fa-cloud-sun" style="color: #008efa;"></i>
					<span class="d-none d-lg-block">MyWeather</span>
				</a>
				<i class="bi bi-list toggle-sidebar-btn"></i>
			</div>
			<!-- End Logo -->
			<div class="search-bar">
				<form class="search-form d-flex align-items-center" method="POST" action="#">
					<input type="text" name="query" placeholder="Search" title="Enter search keyword" />
					<button type="submit" title="Search"><i class="bi bi-search"></i></button>
				</form>
			</div>
			<!-- End Search Bar -->
			<nav class="header-nav ms-auto">
				<ul class="d-flex align-items-center">
					<li class="nav-item d-block d-lg-none">
						<a class="nav-link nav-icon search-bar-toggle" href="#">
							<i class="bi bi-search"></i>
						</a>
					</li>
					<li class="nav-item dropdown pe-3">
						@guest
						<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
							<i class="far fa-user-circle" style="color: #000000;" title="Profile"></i>
							<span class="d-none d-md-block dropdown-toggle ps-2">Guest</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
							<li class="dropdown-header">
								<h6>Guest</h6>
							</li>
							<li>
								<hr class="dropdown-divider" />
							</li>
							
						</ul>
						@else
						<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
							<i class="far fa-user-circle" style="color: #000000;" title="Profile"></i>
							<span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
							<li class="dropdown-header">
								<h6>{{ Auth::user()->username }}</h6>
							</li>
							<li>
								<hr class="dropdown-divider" />
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
									<i class="bi bi-person"></i>
									<span>My Profile</span>
								</a>
							</li>
							<li>
								<hr class="dropdown-divider" />
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
									<i class="bi bi-gear"></i>
									<span>Account Settings</span>
								</a>
							</li>
							<li>
								<hr class="dropdown-divider" />
							</li>
							<li>
								<a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
								   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="bi bi-box-arrow-right"></i>
									<span>Sign Out</span>
								</a>
			
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
			
							</li>
						</ul>
						@endguest
					</li>
				</ul>
			</nav>
			<!-- End Icons Navigation -->
			
		</header>
		<!-- ======= Sidebar ======= -->
		<aside id="sidebar" class="sidebar">
			<ul class="sidebar-nav" id="sidebar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/">
						<i class="bi bi-grid"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-journal-text"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i> </a>
					<ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
						<li>
							<a href="/reportsuhu"> <i class="bi bi-circle"></i><span>Report suhu</span> </a>
						</li>
						<li>
							<a href="/reportkelembaban"> <i class="bi bi-circle"></i><span>Report kelembaban udara</span> </a>
						</li>
						<li>
							<a href="/reporttekanan"> <i class="bi bi-circle"></i><span>Report tekanan udara</span> </a>
						</li>
						<li>
							<a href="/reportangin"> <i class="bi bi-circle"></i><span>Report kecepatan angin</span> </a>
						</li>
						<li>
							<a href="/reportalat"> <i class="bi bi-circle"></i><span>Report Alat</span> </a>
						</li>
					</ul>
				</li>
				@guest
				<li class="nav-item">
					<a class="nav-link collapsed" href="\login">
						<i class="bi bi-box-arrow-in-right"></i>
						<span>Login</span>
					</a>
				</li>
			@endguest
			
			@auth
				<!-- Tambahkan menu yang sesuai untuk pengguna yang sudah login -->
			@endauth
			
				<!-- End Login Page Nav -->
			</ul>
		</aside>
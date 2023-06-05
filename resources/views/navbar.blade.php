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
						<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
							<i class="far fa-user-circle" style="color: #000000;" title="Profile"></i>
							<span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
						</a>
						<!-- End Profile Image Icon -->
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
						<!-- End Profile Dropdown Items -->
					</li>
					<!-- End Profile Nav -->
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
				<!-- End Dashboard Nav -->
				<li class="nav-item">
					<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i> </a>
					<ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
						<li>
							<a href="/editprovinsi"> <i class="bi bi-circle"></i><span>Data Provinsi</span> </a>
						</li>
						<li>
							<a href="/editkota"> <i class="bi bi-circle"></i><span>Data Kota</span> </a>
						</li>
						<li>
							<a href="/editlokasi"> <i class="bi bi-circle"></i><span>Data Lokasi</span> </a>
						</li>
						<li>
							<a href="/editsuhu"> <i class="bi bi-circle"></i><span>Data Suhu</span> </a>
						</li>
						<li>
							<a href="/editkelembaban"> <i class="bi bi-circle"></i><span>Data Kelembaban</span> </a>
						</li>
						<li>
							<a href="/edittekanan"> <i class="bi bi-circle"></i><span>Data Tekanan Udara</span> </a>
						</li>
						<li>
							<a href="/editangin"> <i class="bi bi-circle"></i><span>Data Kecepatan Angin</span> </a>
						</li>
						<li>
							<a href="/editalat"> <i class="bi bi-circle"></i><span>Data Alat</span> </a>
						</li>
					</ul>
				</li>
				<!-- End Components Nav -->
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
				<!-- End Profile Page Nav -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="\Session">
						<i class="bi bi-activity"></i>
						<span>Session</span>
					</a>
				</li>
				<!-- End Profile Page Nav -->
			</ul>
		</aside>
		<!-- End Sidebar-->
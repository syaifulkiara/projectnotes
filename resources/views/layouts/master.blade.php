<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('templates/images/favicon.png')}}">
	<link rel="stylesheet" href="{{ asset('templates/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('templates/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{ asset('templates/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	@stack('styles')
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('templates/images/lolo.png')}}" alt="">
                <img class="logo-compact" src="{{ asset('templates/images/lg.png')}}" alt="">
                <img class="brand-title" src="{{ asset('templates/images/lg.png')}}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
       
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								{{ config('app.name', 'Laravel') }}
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li>
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{ asset(Auth::user()->avatar)}}" width="20" alt=""/>
									<div class="header-info">
										<span class="text-black"><strong>{{ Auth::user()->name }}</strong></span>
                                        @if(Auth::user()->is_admin == 1)
										<p class="fs-12 mb-0">Super Admin</p>
                                        @else
                                        <p class="fs-12 mb-0">User</p>
                                        @endif
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('profile.index') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
       
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{ route('home') }}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Projects</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('projects.index') }}">All Projects</a></li>
							<li><a href="{{ route('project.my_project') }}">My Projects</a></li>
						</ul>
                    </li>
                    <li><a href="{{ route('activity.index')}}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">My Activity</span>
						</a>
					</li>
                    @if ( Auth::user()->is_admin == 1)
                    <li><a href="{{route('users.index')}}" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-users"></i> 
                            <span class="nav-text"> Users </span>
                        </a>
                    </li>
                    @endif
                </ul>
				<div class="add-menu-sidebar">
					<img src="{{ asset('templates/images/calendar.png')}}" alt="" class="mr-3">
					<p class="font-w500 mb-0">Create Projects Plan Now</p>
				</div>
				<div class="copyright">
					<p><strong>Admin Dashboard</strong> © 2020 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by Dalusy</p>
				</div>
			</div>
        </div>		
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>
        
        <div class="footer">
            <div class="copyright">
                <p>Copyright © 2023</p>
            </div>
        </div>    
    </div>
    <!-- Required vendors -->
    <script src="{{ asset('templates/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('templates/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('templates/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('templates/js/custom.min.js')}}"></script>
	<script src="{{ asset('templates/js/deznav-init.js')}}"></script>
	<script src="{{ asset('templates/vendor/owl-carousel/owl.carousel.js')}}"></script>
	@stack('scripts')
</body>
</html>
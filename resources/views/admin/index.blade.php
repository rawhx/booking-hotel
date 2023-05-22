<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
        
        
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/admin/assets')}}/images/favicon.png">
        <!-- Custom CSS -->
        <link href="{{url('/admin/assets')}}/extra-libs/c3/c3.min.css" rel="stylesheet">
        <link href="{{url('/admin/assets')}}/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="{{url('/admin/assets')}}/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="{{url('/admin/dist')}}/css/style.min.css" rel="stylesheet">
        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- DataTable -->
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
       <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        
        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
            
            <header class="topbar" data-navbarbg="skin6">
                @include('admin/nav')
            </header>
            
            <aside class="left-sidebar" data-sidebarbg="skin6">
                
                <div class="scroll-sidebar" data-sidebarbg="skin6">
                    
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="sidebar-item dashboard selected"> <a class="sidebar-link sidebar-link active" href="javascript:;"
                                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                            {{-- <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Master</span></li>

                            <li class="sidebar-item rooms"> <a class="sidebar-link" href="ticket-list.html"
                                    aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                        class="hide-menu">Rooms
                                    </span></a>
                            </li> --}}
                            
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Report</span></li>
                            
                            <li class="sidebar-item guest"> <a class="sidebar-link" href="javascript:;"
                                    aria-expanded="false"><i class="fa fa-users"></i><span
                                        class="hide-menu">Guest
                                    </span></a>
                            </li>

                            <li class="sidebar-item history"> <a class="sidebar-link" href="javascript:;"
                                    aria-expanded="false"><i class='fas fa-history'></i></i><span
                                        class="hide-menu">History
                                    </span></a>
                            </li>

                            <li class="sidebar-item income"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i class="fas fa-dollar-sign"></i><span
                                        class="hide-menu">Income</span></a>
                                <ul aria-expanded="false" class="collapse first-level base-level-line">
                                    <li class="sidebar-item"><a href="javascript:;" class="sidebar-link active income-rooms"><span
                                                class="hide-menu"> Rooms
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="javascript:;" class="sidebar-link"><span
                                                class="hide-menu"> Restaurant
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                            <li class="sidebar-item profile"> <a class="sidebar-link sidebar-link" href="javascript:;"
                                    aria-expanded="false"><i class="fas fa-user"></i><span
                                        class="hide-menu">My Profile
                                    </span></a>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                    href="authentication-register1.html" aria-expanded="false"><i data-feather="lock"
                                        class="feather-icon"></i><span class="hide-menu">Register
                                    </span></a>
                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i data-feather="crosshair" class="feather-icon"></i><span
                                        class="hide-menu">Multi
                                        level
                                        dd</span></a>
                                <ul aria-expanded="false" class="collapse first-level base-level-line">
                                    <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                class="hide-menu"> item 1.1</span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                class="hide-menu"> item 1.2</span></a>
                                    </li>
                                    <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                            aria-expanded="false"><span class="hide-menu">Menu 1.3</span></a>
                                        <ul aria-expanded="false" class="collapse second-level base-level-line">
                                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                        class="hide-menu"> item
                                                        1.3.1</span></a></li>
                                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                        class="hide-menu"> item
                                                        1.3.2</span></a></li>
                                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                        class="hide-menu"> item
                                                        1.3.3</span></a></li>
                                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                        class="hide-menu"> item
                                                        1.3.4</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                                class="hide-menu"> item
                                                1.4</span></a></li>
                                </ul>
                            </li>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="docs/docs.html"
                                    aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span
                                        class="hide-menu">Documentation</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link text-danger" href="authentication-login1.html"
                                    aria-expanded="false"><i data-feather="log-out" class="feather-icon text-danger"></i><span
                                        class="hide-menu">Logout</span></a></li>
                        </ul>
                    </nav>
                  
                </div>
                
            </aside>
           
            <div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-7 align-self-center">
                            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="texttime"></span> {{auth()->user()->name ?? 'Root'}}!</h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{route('dashboardadmin')}}">Dashboard</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="container-fluid">
                    
                    <div class="card-group">
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">{{$guest}}</h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Visitor</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                            @php
                                                $pay = 0;
                                            @endphp
                                        
                                            @foreach ($payment as $payment)  
                                                @if (date('Y-m', strtotime($payment['deleted_at'])) == date('Y-m', strtotime(now())))
                                                    @php
                                                        $pay += $payment['payment'];
                                                    @endphp    
                                                @endif
                                            @endforeach
                                            <sup class="set-doller">Rp</sup>{{number_format($pay)}}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings of Month
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">{{$hguest}}</h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">History Visitor</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">{{$rooms}}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Rooms</h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Sales</h4>
                                    <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                                    <ul class="list-style-none mb-0">
                                        <li>
                                            <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                            <span class="text-muted">Direct Sales</span>
                                            <span class="text-dark float-right font-weight-medium">$2346</span>
                                        </li>
                                        <li class="mt-3">
                                            <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                            <span class="text-muted">Referral Sales</span>
                                            <span class="text-dark float-right font-weight-medium">$2108</span>
                                        </li>
                                        <li class="mt-3">
                                            <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                            <span class="text-muted">Affiliate Sales</span>
                                            <span class="text-dark float-right font-weight-medium">$1204</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Net Income</h4>
                                    <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                                    <ul class="list-inline text-center mt-5 mb-2">
                                        <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Earning by Location</h4>
                                    <div class="" style="height:180px">
                                        <div id="visitbylocate" style="height:100%"></div>
                                    </div>
                                    <div class="row mb-3 align-items-center mt-1 mt-5">
                                        <div class="col-4 text-right">
                                            <span class="text-muted font-14">India</span>
                                        </div>
                                        <div class="col-5">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-4 text-right">
                                            <span class="text-muted font-14">UK</span>
                                        </div>
                                        <div class="col-5">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-4 text-right">
                                            <span class="text-muted font-14">USA</span>
                                        </div>
                                        <div class="col-5">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-4 text-right">
                                            <span class="text-muted font-14">China</span>
                                        </div>
                                        <div class="col-5">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <h4 class="card-title mb-0">Earning Statistics</h4>
                                        <div class="ml-auto">
                                            <div class="dropdown sub-dropdown">
                                                <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                    id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                    <a class="dropdown-item" href="#">Insert</a>
                                                    <a class="dropdown-item" href="#">Update</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-4 mb-5">
                                        <div class="stats ct-charts position-relative" style="height: 315px;"></div>
                                    </div>
                                    <ul class="list-inline text-center mt-4 mb-0">
                                        <li class="list-inline-item text-muted font-italic">Earnings for this month</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Activity</h4>
                                    <div class="mt-4 activity">
                                        <div class="d-flex align-items-start border-left-line pb-3">
                                            <div>
                                                <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">
                                                    <i data-feather="shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="ml-3 mt-2">
                                                <h5 class="text-dark font-weight-medium mb-2">New Product Sold!</h5>
                                                <p class="font-14 mb-2 text-muted">John Musa just purchased <br> Cannon 5M
                                                    Camera.
                                                </p>
                                                <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start border-left-line pb-3">
                                            <div>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-danger btn-circle mb-2 btn-item">
                                                    <i data-feather="message-square"></i>
                                                </a>
                                            </div>
                                            <div class="ml-3 mt-2">
                                                <h5 class="text-dark font-weight-medium mb-2">New Support Ticket</h5>
                                                <p class="font-14 mb-2 text-muted">Richardson just create support <br>
                                                    ticket</p>
                                                <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start border-left-line">
                                            <div>
                                                <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                                    <i data-feather="bell"></i>
                                                </a>
                                            </div>
                                            <div class="ml-3 mt-2">
                                                <h5 class="text-dark font-weight-medium mb-2">Notification Pending Order!
                                                </h5>
                                                <p class="font-14 mb-2 text-muted">One Pending order from Ryne <br> Doe</p>
                                                <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours
                                                    Ago</span>
                                                <a href="javascript:void(0)" class="font-14 border-bottom pb-1 border-info">Load More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h4 class="card-title">Top Leaders</h4>
                                        <div class="ml-auto">
                                            <div class="dropdown sub-dropdown">
                                                <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                    id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                    <a class="dropdown-item" href="#">Insert</a>
                                                    <a class="dropdown-item" href="#">Update</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table no-wrap v-middle mb-0">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Team Lead
                                                    </th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Project
                                                    </th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Team</th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                        Status
                                                    </th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                        Weeks
                                                    </th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Budget</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border-top-0 px-2 py-4">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div class="mr-3"><img
                                                                    src="{{url('/admin/assets')}}/images/users/widget-table-pic1.jpg"
                                                                    alt="user" class="rounded-circle" width="45"
                                                                    height="45" /></div>
                                                            <div class="">
                                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                                    Gover</h5>
                                                                <span class="text-muted font-14">hgover@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>
                                                    <td class="border-top-0 px-2 py-4">
                                                        <div class="popover-icon">
                                                            <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                                href="javascript:void(0)">DS</a>
                                                            <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                                href="javascript:void(0)">SS</a>
                                                            <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                                href="javascript:void(0)">RP</a>
                                                            <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                                href="javascript:void(0)">+</a>
                                                        </div>
                                                    </td>
                                                    <td class="border-top-0 text-center px-2 py-4"><i
                                                            class="fa fa-circle text-primary font-12" data-toggle="tooltip"
                                                            data-placement="top" title="In Testing"></i></td>
                                                    <td
                                                        class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                        35
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-0 px-2 py-4">$96K
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-4">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div class="mr-3"><img
                                                                    src="{{url('/admin/assets')}}/images/users/widget-table-pic2.jpg"
                                                                    alt="user" class="rounded-circle" width="45"
                                                                    height="45" /></div>
                                                            <div class="">
                                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                                                                    Kristeen
                                                                </h5>
                                                                <span class="text-muted font-14">Kristeen@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>
                                                    <td class="px-2 py-4">
                                                        <div class="popover-icon">
                                                            <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                                href="javascript:void(0)">DS</a>
                                                            <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                                href="javascript:void(0)">SS</a>
                                                            <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                                href="javascript:void(0)">+</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center px-2 py-4"><i
                                                            class="fa fa-circle text-success font-12" data-toggle="tooltip"
                                                            data-placement="top" title="Done"></i>
                                                    </td>
                                                    <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>
                                                    <td class="font-weight-medium text-dark px-2 py-4">$85K</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-4">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div class="mr-3"><img
                                                                    src="{{url('/admin/assets')}}/images/users/widget-table-pic3.jpg"
                                                                    alt="user" class="rounded-circle" width="45"
                                                                    height="45" /></div>
                                                            <div class="">
                                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                                                                    Josephs
                                                                </h5>
                                                                <span class="text-muted font-14">Josephs@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>
                                                    <td class="px-2 py-4">
                                                        <div class="popover-icon">
                                                            <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                                href="javascript:void(0)">DS</a>
                                                            <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item"
                                                                href="javascript:void(0)">SS</a>
                                                            <a class="btn btn-cyan rounded-circle btn-circle font-12 popover-item"
                                                                href="javascript:void(0)">RP</a>
                                                            <a class="btn btn-success text-white rounded-circle btn-circle font-20"
                                                                href="javascript:void(0)">+</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center px-2 py-4"><i
                                                            class="fa fa-circle text-primary font-12" data-toggle="tooltip"
                                                            data-placement="top" title="Done"></i>
                                                    </td>
                                                    <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>
                                                    <td class="font-weight-medium text-dark px-2 py-4">$81K</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-2 py-4">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div class="mr-3"><img
                                                                    src="{{url('/admin/assets')}}/images/users/widget-table-pic4.jpg"
                                                                    alt="user" class="rounded-circle" width="45"
                                                                    height="45" /></div>
                                                            <div class="">
                                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                                                                    Petrovic
                                                                </h5>
                                                                <span class="text-muted font-14">hgover@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-muted px-2 py-4 font-14">Hosting Press HTML</td>
                                                    <td class="px-2 py-4">
                                                        <div class="popover-icon">
                                                            <a class="btn btn-primary rounded-circle btn-circle font-12"
                                                                href="javascript:void(0)">DS</a>
                                                            <a class="btn btn-success text-white font-20 rounded-circle btn-circle"
                                                                href="javascript:void(0)">+</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center px-2 py-4"><i
                                                            class="fa fa-circle text-danger font-12" data-toggle="tooltip"
                                                            data-placement="top" title="In Progress"></i></td>
                                                    <td class="text-center text-muted font-weight-medium px-2 py-4">23</td>
                                                    <td class="font-weight-medium text-dark px-2 py-4">$80K</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <footer class="footer d-sm-flex justify-content-between text-center text-muted">
                    <p>Rawh</p>
                    <p>
                        All Rights Reserved by Adminmart. Designed and Developed by <a
                            href="https://wrappixel.com">WrapPixel</a>.
                    </p>
                </footer>

            </div>
            
        </div>
        
        <!-- All Jquery -->
        <script src="{{url('/admin/assets')}}/libs/jquery/dist/jquery.min.js"></script>
        <script src="{{url('/admin/assets')}}/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{url('/admin/assets')}}/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- apps -->
        <script src="{{url('/admin/dist')}}/js/app-style-switcher.js"></script>
        <script src="{{url('/admin/dist')}}/js/feather.min.js"></script>
        <script src="{{url('/admin/assets')}}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{url('/admin/dist')}}/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="{{url('/admin/dist')}}/js/custom.min.js"></script>
        <!--This page JavaScript -->
        <script src="{{url('/admin/assets')}}/extra-libs/c3/d3.min.js"></script>
        <script src="{{url('/admin/assets')}}/extra-libs/c3/c3.min.js"></script>
        <script src="{{url('/admin/assets')}}/libs/chartist/dist/chartist.min.js"></script>
        <script src="{{url('/admin/assets')}}/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="{{url('/admin/assets')}}/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="{{url('/admin/assets')}}/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{url('/admin/dist')}}/js/pages/dashboards/dashboard1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{url('/admin')}}/navigasi.js" type="text/javascript"></script>
        <!-- sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- DataTable -->
        <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/af-2.5.3/r-2.4.1/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                textime();
                updateClock();
            });


            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                var amPm = hours < 12 ? " AM" : " PM";

                hours = hours % 12;
                hours = hours ? hours : 12;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                var timeString = hours + ":" + minutes + amPm;
                document.getElementById("clock").innerHTML = timeString;
            }
            
            setInterval(updateClock, 1000);

            function number(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
                return true;
            }

            function textime() {
                var time = new Date().getHours();
                var message;

                if (time >= 5 && time < 11) {
                    message = 'Good Morning';
                } else if (time >= 11 && time < 17) {
                    message = 'Good Afternoon';
                } else {
                    message = 'Good Night';
                }
                document.getElementById("texttime").innerHTML = message;

            }

            setInterval(textime, 120000);
        </script>
    </body>

</html>
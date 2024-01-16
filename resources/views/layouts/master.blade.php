<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Adicione a tag CSRF aqui -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Programa Eficiência @yield('title')</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('build/assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('build/assets/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <!-- Custom styles for Datatables -->
        <link href="{{ asset('build/assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this Select2-->
        <link href="{{ asset('build/assets/sb-admin-2/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('build/assets/sb-admin-2/vendor/select2/css/select2-bootstrap4.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        @vite('resources/css/app.css')

        @hasSection ('css')
            @yield('css')
        @endif

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">EFICIÊNCIA</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Início</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    APLICAÇÃO
                </div>

                
                
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    SISTEMA
                </div>

                <!-- Nav Item - Usuários -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs(['users.index', 'users.create']) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUser"
                        aria-expanded="true" aria-controls="collapseUser">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Usuários</span>
                    </a>
                    
                    <div id="collapseUser" class="{{ request()->routeIs(['users.index', 'users.create']) ? 'collapse show' : 'collapse' }}" aria-labelledby="headingBudget" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ isActive('users.index') }}" href="{{ route('users.index') }}">Usuários</a>
                            <a class="collapse-item {{isActive('roles.index')}}" href="{{route('roles.index')}}">Perfis de Usuário</a>
                            <a class="collapse-item {{isActive('permissions.index')}}" href="{{route('permissions.index')}}">Permissões</a>
                            
                        </div>
                    </div>
                </li>
                

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    @if (Auth::check())
                                        Olá, {{ Auth::user()->user_name }}!
                                    @endif
                                </span>
                            </a>
                             <!-- Dropdown - User Information -->
                             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('users.profile', auth()->user()->id)}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Meu Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <span>Sair</span>
                                    </button>
                                </form>
                            </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @if ($errors->all())
                            @foreach ($errors->all() as $error)
                                <x-message color="danger">
                                    <p class="icon-asterisk">{{ $error}}</p>
                                </x-message>
                            @endforeach
                        @endif

                        @if (session()->exists('message'))
                            <x-message color="{{ session()->get('color')}}">
                                <p class="icon-asterisk">{{ session()->get('message')}}</p>
                            </x-message>
                        @endif

                        @yield('content')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Programa Eficiência 2022-2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('build/assets/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('build/assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('build/assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('build/assets/sb-admin-2/vendor/jquery-mask/jquery.mask.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('build/assets/sb-admin-2/js/sb-admin-2.min.js') }}"></script>
        <!-- Page level plugin Datatables -->
        <script src="{{ asset('build/assets/sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('build/assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Page level plugin Select2 -->
        <script src="{{ asset('build/assets/sb-admin-2/vendor/select2/js/select2.min.js') }}"></script>
        @vite('resources/js/app.js')
        

        @hasSection ('js')
            @yield('js')
        @endif


    </body>
</html>

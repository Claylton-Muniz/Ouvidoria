<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Programa Eficiência - login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('build/assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    
    <link href="{{ asset('build/assets/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Painel de Gerenciamento</h1>
                                        <p class="mb-4">digite seu email e senha para acesar o painel</p>
                                    </div>
                                    <hr>
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger mt-1">{{ $error}}</div>
                                        @endforeach
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" value="{{old('email')}}"
                                                required placeholder="Digite seu Email">  
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Sua senha" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Acessar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    
    <link href="{{ asset('build/assets/sb-admin-2/vendor/jquery/jquery.min.js') }}" rel="stylesheet">

    <link href="{{ asset('build/assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" rel="stylesheet">
    <!-- Core plugin JavaScript-->
    <link href="{{ asset('build/assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}" rel="stylesheet">

    <!-- Custom scripts for all pages-->
    <link href="{{ asset('build/assets/sb-admin-2/js/sb-admin-2.min.js') }}" rel="stylesheet">
</body>

</html>
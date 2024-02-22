<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EGP - Recuperação de Senha</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('build/assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('build/assets/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('build/assets/sb-admin-2/img/login.jpg') }}" style="max-width: 45%;">
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <h2 class="h4 text-gray-700 mb-3">Recuperação de Senha de usuário</h2>
                                        <p class="mb-3">Para sua segurança crie uma nova senha</p>
                                    </div>
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissable fade show">
                                                <p class="icon-asterisk">{{ $error}}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                    <hr>
                                    <form method="POST" action="{{ route('password.store') }}" class="user">
                                        @csrf
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" value="{{ old('email') ?? $request->email }}" required
                                                placeholder="Digite seu Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password"
                                            aria-describedby="senha" placeholder="Digite uma nova Senha" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirme sua senha" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">confirmar</button>
                                    </form>
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
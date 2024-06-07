<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="2IUdvThqPkyU2oEKUrS8SPRs8fa1bLAGAV2cEQuB">


    <title> AdminLTE 3            </title>

    <link rel="stylesheet" href="/vendor/icheck-bootstrap/icheck-bootstrap.min.css">
            <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">

                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="login-page" style="min-height: 351.438px;">
    <div class="login-box">
        <div class="login-logo">
            <a href="/home">
                <img src="/assets/img/simbaltri2.png" alt="Admin Logo" height="50">
                <!-- <b>Admin</b>LTE -->
            </a>
        </div>
        <div class="card card-primary">
            <div class="card-header ">
                <h3 class="card-title float-none text-center text-dark">
                    <strong>
                    SELAMAT DATANG
                    </strong>
                </h3>
            </div>
            <div class="card-body">

                <form action="/proses_login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control " value="" placeholder="Username" autofocus="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope "></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control " placeholder="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock "></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary" title="adminlte: :adminlte. remember_me_hint">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="text-primary-dark">
                                    remember me
                                </label>
                            </div>
                        </div>

                        <div class="col-5">
                            <button type="submit" class="btn btn-block btn-flat btn-primary text-dark rounded">
                                <span class=" fas fa-sign-in-alt"></span>
                                sign in
                            </button>
                        </div>
                    </div>
                </form>
                <style>
                    :root {
                        color: var(--text-primary-dark);
                    }
                    body {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        /* background: linear-gradient(135deg, #bfdfcf 0%, #5fc5bd 100%); */
                        background-image: url('/assets/img/backgroundimage.jpg');
                        background-color: rgba(255,255,255,0.5);
                        background-blend-mode: lighten;
                        background-size: cover;
                        index: -1000;
                    }

                    /* .login-page .card-body, */
                    .login-page .card-header {
                        /* position: absolute; */
                        /* top: 0; */
                        /* left: 0; */
                        /* width: 100%; */
                        /* height: 100%; */
                        background: linear-gradient(135deg, #bfdfcf 0%, #5fc5bd 100%);
                    }

                    form {
                            margin-bottom: 0;
                        }
                </style>
            </div>
            <div class="card-footer ">
                <p class="my-0">
                    <a href="/register" class="text-primary-dark">
                        Register a new membership
                    </a>
                </p>
            </div>
        </div>


        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>

    </div>
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/css/app.css',
    ])
  <link href="{{ asset('vendor/bootstrap/custom.css') }}" rel="stylesheet">
</body>
</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desa Karangmalang Masaran Sragen</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/app.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{asset('assets/admin')}}/images/logo/logo.png" alt="Logo" style="height: 50px; width: auto"></a>
                    </div>
                    <!-- <h1 class="auth-title">Admin</h1> -->
                    <p class="auth-subtitle mb-5">Masukkan Email dan Password yang sesuai</p>

                    
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email/username" name="email" id="email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat saya (pada perangkat ini)
                            </label>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 text-xs">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ __($error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>
                    {{-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
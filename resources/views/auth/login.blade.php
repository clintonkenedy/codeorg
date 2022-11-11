<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/login.css">

    <title>Code.org</title>
</head>

<body>

    <div class="container w-75 bg-dark mt-5 rounded shadow">
        <div class="row align-items-stretch"> 
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fa fa-cubes fa-3x me-3" style="color: #A62103;"></i>
                    <span class="h1 fw-bold mb-0">Login Code.org</span>
                  </div>
                {{-- <h2 class="fw-bold py-5 text-center">Bienvenido Code.org</h2> --}}

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('Usuario') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                        <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                        <label class="form-check-label" for="remember">{{ __('Recordar sesión') }}</label>
                    </div>

                    <div class="d-grid my-5">
                        <button type="submit" class="btn btn-outline-dark">{{ __('Ingresar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html
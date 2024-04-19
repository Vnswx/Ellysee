<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Login-Register/Login.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div id="main-wrapper" class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-10" style="margin-top: 30px">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    </div>

                                    <h6 class="h5 mb-0"></h6>
                                    <p class="text-muted mt-2 mb-5"></p>

                                    <form method="POST" action="{{ route('actionregister') }}">
                                        @csrf
                                        <div class="form-group mb-1">
                                            <label for="namalengkap">Full Name</label>
                                            <input type="text" class="form-control" id="namalengkap"
                                                name="namalengkap" value="{{ old('namalengkap') }}" required>
                                            @error('namalengkap')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="name">Username</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="email">Email </label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-1">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required autocomplete="new-password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="alamat">Address</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ old('alamat') }}" required>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-theme">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">This beautiful theme yours!</h4>
                                        <p class="lead text-white">"Best investment i made for a long time. Can only
                                            recommend it for other users."</p>
                                        <p>- Ellysee.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                        class="text-primary ml-1">Login</a></p>

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $.ajax({
            type: "POST",
            url: "{{ route('actionregister') }}",
            data: formData,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '{{ route("login") }}';
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    </script>
</body>

</html>

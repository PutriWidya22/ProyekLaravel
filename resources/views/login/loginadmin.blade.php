@extends('login.main')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url({{ asset('03Login') }}/images/bg1.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('errors'))
                        <div class="alert alert-danger">
                            {{ session('errors')->first()}}
                        </div>
                        @endif

                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Login Admin</h3>
                            </div>
                        </div>

                        <form action="/adminAksiLogin" class="signin-form" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                        </form>
                        <p>Belum punya akun?<a href="/register"> Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
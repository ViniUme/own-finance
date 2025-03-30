@extends('admin.layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                <div class="card radius-10">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4>Admin Log In</h4>
                            <p>Acesso apenas para administradores</p>
                        </div>
                        <form id="auth-form">
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="remember_me" name="remember_me">
                                    <label class="form-check-label" for="remember_me">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelector('#auth-form').addEventListener('submit', function (event) {
            event.preventDefault()

            axios({
                url: "{{ route('admin.login.auth') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    email: document.querySelector('#email').value,
                    password: document.querySelector('#password').value
                }
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        })
    </script>
@endpush

@extends('admin.layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                <div class="card radius-10">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4>Área Admin</h4>
                            <p>Acesso apenas para administradores</p>
                        </div>
                        <form class="d-flex flex-column gap-3" id="auth-form">
                            @csrf
                            <div class="alert alert-warning visually-hidden" id="main-header-error"></div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <div class="alert alert-warning mt-2 mb-1 visually-hidden" id="email-error"></div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="alert alert-warning mt-2 mb-1 visually-hidden" id="password-error"></div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="remember_me" name="remember_me">
                                    <label class="form-check-label" for="remember_me">Lembrar de mim</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
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

            clearOldErrors();

            axios({
                url: "{{ route('api.admin.login.auth') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    email: document.querySelector('#email').value,
                    password: document.querySelector('#password').value,
                    remember_me: document.querySelector('#remember_me').checked
                }
            })
            .then(function (response) {
                const data = response.data;

                if (data.status === 200 && data.success === true) {
                    window.location.href = "{{ route('admin.dashboard') }}";
                }
            })
            .catch(function (response) {
                const data = response.response.data;

                showAllValidationErrors(data);
            });
        })

        function showAllValidationErrors(response) {
            if (!response.errors) {
                const errorMainHeader = document.querySelector('#main-header-error');
                errorMainHeader.textContent = response.message;
                errorMainHeader.classList.remove('visually-hidden');
            };

            Object.entries(response.errors).forEach(([fieldName, messages]) => {
                const errorElement = document.getElementById(`${fieldName}-error`);
                const inputElement = document.getElementById(fieldName);

                if (errorElement && messages.length > 0) {
                    errorElement.textContent = typeof(messages) == 'array' ? messages[0] : messages;
                    errorElement.classList.remove('visually-hidden');
                }

                if (inputElement) {
                    inputElement.classList.add('is-invalid');
                }
            });
        }

        function clearOldErrors() {
            const errorElements = document.querySelectorAll('.alert-warning');
            const inputElements = document.querySelectorAll('.form-control');

            errorElements.forEach( function(error) {
                error.classList.add('visually-hidden');
            })
            inputElements.forEach( function(input) {
                input.classList.remove('is_invalid');
            })
        }
    </script>
@endpush

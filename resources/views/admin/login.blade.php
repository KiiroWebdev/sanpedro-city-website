<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login | City Government of San Pedro</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

</head>

<body class="admin-login-page">

    <div class="admin-login-container">

        <div class="admin-login-card">

            <div class="text-center">

                <img
                    src="{{ asset('images/city-logo.png') }}"
                    alt="City Government of San Pedro"
                    class="admin-logo"
                >

                <h1>
                    Administration
                </h1>

                <p>
                    City Government of San Pedro
                </p>

            </div>


            @if($errors->any())

                <div class="alert alert-danger">

                    {{ $errors->first() }}

                </div>

            @endif


            <form
                action="{{ route('admin.login.submit') }}"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label
                        for="username"
                        class="form-label"
                    >
                        Username
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        required
                        autofocus
                    >

                </div>


                <div class="mb-4">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary w-100"
                >
                    <i class="bi bi-box-arrow-in-right"></i>
                    Sign In
                </button>

            </form>

            <div class="text-center mt-4">

                <small>
                    City Government of San Pedro, Laguna
                </small>

            </div>

        </div>

    </div>

</body>

</html>
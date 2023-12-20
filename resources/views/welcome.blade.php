<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Database Query Tool</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</head>

<body>
    <div class="container">
        <div class="row my-2">
            <h2 class="text-center">Welcome to Database Query Tool</h2>
        </div>
        <div class="row">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="row g-3 border border-1 my-2 p-3">
                    <div class="col-md-6">
                        <label for="mysqlHost" class="form-label">MySQL Host</label>
                        <input required value="{{ old('mysqlHost') }}" type="text"
                            class="form-control @error('mysqlHost') is-invalid @enderror" id="mysqlHost"
                            name="mysqlHost" placeholder="MySQL Host">
                        @error('mysqlHost')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mysqlDatabase" class="form-label">MySQL Database</label>
                        <input required value="{{ old('mysqlDatabase') }}" type="text"
                            class="form-control @error('mysqlDatabase') is-invalid @enderror" id="mysqlDatabase"
                            name="mysqlDatabase" placeholder="MySQL Database">
                        @error('mysqlDatabase')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mysqlUsername" class="form-label">Mysql Username</label>
                        <input required value="{{ old('mysqlUsername') }}" type="text"
                            class="form-control @error('mysqlUsername') is-invalid @enderror" id="mysqlUsername"
                            name="mysqlUsername" placeholder="Mysql Username">
                        @error('mysqlUsername')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mysqlPassword" class="form-label">Mysql Password</label>
                        <input required value="{{ old('mysqlPassword') }}" type="password"
                            class="form-control @error('mysqlPassword') is-invalid @enderror" id="mysqlPassword"
                            name="mysqlPassword" placeholder="Mysql Password">
                        @error('mysqlPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row g-3 border border-1 my-2 p-3">
                    <div class="col-md-12">
                        <label for="mysqlQuery" class="form-label">Mysql Query</label>
                        <textarea required value="{{ old('mysqlQuery') }}" class="form-control @error('mysqlQuery') is-invalid @enderror"
                            id="mysqlQuery" name="mysqlQuery" rows="3">{{ old('mysqlQuery') }}</textarea>
                        @error('mysqlQuery')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>


    </div>

</body>

</html>

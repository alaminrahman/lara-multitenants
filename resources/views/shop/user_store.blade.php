<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
               
                <div class="card">
                    <div class="card-header">
                        <h3> User Register</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ url('http://'.$tenant.'.localhost:8000/users/store') }}" method="POST">
                            @csrf 

                            <input type="text" name="domain" value="{{ $tenant }}">
                            <div class="mb-3">
                                <label for="name" class="form-label"> Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>

                            </div>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

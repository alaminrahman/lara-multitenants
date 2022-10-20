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
                        <h3>Shop Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shops.store') }}" method="POST">
                            @csrf 

                            <div class="mb-3">
                                <label for="shop_name" class="form-label">Shop Name</label>
                                <input type="text" class="form-control" name="shop_name" placeholder="Enter Shop name">
                            </div>

                            <div class="mb-3">
                                <label for="domain" class="form-label">Sub Domain</label>
                                <input type="text" class="form-control" name="domain" placeholder="Subdomain Prefix">
                                <small class="text-danger">Just enter "test" it will be access "test.localhost:8000"</small>
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

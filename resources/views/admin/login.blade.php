<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class=".container" style="overflow: hidden;">
        <div class="row align-items-center justify-content-md-center" style="height: 80vh; ">
            <div class="col-lg-2 col-6 px-4 py-4 rounded" style="background-color: rgb(224, 224, 224);">
                <form action="login" method="post">
                    @csrf
                    <div class="form-group text-center">
                        <label for="inputname"><strong>Username</strong></label>
                        <input name="email" type="text" class="form-control" id="inputname">
                    </div>
                    <div class="form-group text-center">
                        <label for="inputpw"><strong>Password</strong></label>
                        <input name="password" type="password" class="form-control" id="inputpw">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

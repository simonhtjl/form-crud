<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ganti Password</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
<style>
     body{
        font-family: 'Montserrat', sans-serif;
        font-family: 'Poppins', sans-serif;
    }

    .container-fluid{
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;

        
    }
    .login-form {
        width: 400px;
        font-size: 15px;
        background: #f7f7f7;
    }
    .login-form form {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 30px;
        border-radius : 15px;
    }
    .login-form h2 {
        margin: 0 0 20px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="login-form">
        @foreach ($user as $key=>$u) 
            <form action="/ubahpassword/{{$u->id}}" method="post">
            @csrf
                <h2 class="text-center">Ubah Password</h2><hr />   

                    <div class="form-group">
                        <input type="email" class="form-control" value="{{$u->email}}" required="required">
                    </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="pw1" name="password" placeholder="Password Baru" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pw2" name="konfirmasi_password" placeholder="Konfirmasi Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                </div>
            </form>
        @endforeach
        </div>
    </div>
    <script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
        </script>
</body>
</html>
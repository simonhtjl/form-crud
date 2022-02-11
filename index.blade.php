<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body{

                font-family: 'Montserrat', sans-serif;
                font-family: 'Poppins', sans-serif;
            }
            .container-fluid{
                display:flex;
                justify-content:center;
                align-items:center;

            }

            form{
  	            font-size: 15px;
                background: #f7f7f7;
                border-radius : 15px;
                margin-top:15px;
                width:800px;
                padding:30px;
                margin-bottom:15px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            }
            .container form{
                padding: 30px; 
            }
        </style>
</head>
<body>
@include('sweetalert::alert')
    <nav class="navbar navbar-dark bg-dark" style="display:flex;justify-content:flex-end;">
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="nav-icon fas fa-user-alt"></i>&nbsp {{Auth::user()->nama}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/actionlogout">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <form action="/user/tambah" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <center>
                    <legend>FORM TAMU</legend>
                    </center>             
                </div><hr />

                <div class="form-group">
                    <label for="nama" style="font-size:18px;">Nama Lengkap*</label>
                    <input type="text" class="form-control" name="nama" placeholder="masukan nama lengkap" autocomplete="off" required>
                </div>

                <div class="form-group">
                <label for="exampleDataList" style="font-size:18px;" class="form-label">Usia*</label>
                <input class="form-control" type="text" list="datalistOptions" id="exampleDataList" name="usia" placeholder="pilih atau masukan usia" autocomplete="off" required>
                <datalist id="datalistOptions">
                    <option value="20-29">
                    <option value="30-39">
                    <option value="40-50">
                </datalist>
                </div>

                <div class="form-group">
                <label for="alamat" style="font-size:18px;">Alamat*</label>
                <input type="text" class="form-control" name="alamat" placeholder="masukan daerah tempat tinggal" autocomplete="off" required>
                </div>

                <div class="form-group">
                <label for="notel" style="font-size:18px;">Telepon/Wa*</label>
                <input type="number" class="form-control" name="notel" placeholder="masukan nomor telepon" autocomplete="off" required>
                </div>

                <div class="form-group">
                <label for="exampleDataList" style="font-size:18px;" class="form-label">Pekerjaan*</label>
                <input class="form-control" list="datalistpekerjaan" id="exampleDataList" name="pekerjaan" placeholder="pilih atau masukan usia" autocomplete="off" required>
                <datalist id="datalistpekerjaan">
                    <option value="Wiraswasta">
                    <option value="Pegawai Swasta">
                    <option value="Pegawai Negeri">
                </datalist>
                </div>

                <div class="form-group">
                <label for="exampleDataList" style="font-size:18px;" class="form-label">Sumber Info*</label>
                <input class="form-control" list="datalistsumberinfo" id="exampleDataList" name="sumberinfo" placeholder="pilih atau masukan usia" autocomplete="off" required>
                <datalist id="datalistsumberinfo">
                    <option value="Pasar123.com">
                    <option value="Olx">
                    <option value="Facebook">
                    <option value="Instagram">
                    <option value="Referensi Teman">
                </datalist>
                </div>
                
                <div class="form-group">
                <label for="saran" style="font-size:18px;">Kritik & Saran*</label>
                <textarea id="saran" placeholder="masukan kritik & saran" name="kritiksaran" class="form-control" autocomplete="off" required></textarea>
                </div>

                <div class="form-group">
                <label for="gambar" style="font-size:18px;">Gambar*</label>
                <input type="file" name="gambar" class="form-control" >
                </div>
                <div class="text-right"><button type="submit" class="btn btn-primary">Upload</button></div>
            </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body{

                font-family: 'Montserrat', sans-serif;
                font-family: 'Poppins', sans-serif;
            }
            table{
              box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
              border-radius:10px;
            }
            .container-fluid{
              display:flex;
              justify-content:center;
              padding:10px;
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
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Marketing</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody> 
        @foreach ($tamu as $key=>$t)
          <tr>            
            <th scope="row">{{$key+1}}</th>
            <td>{{$t->nama}}</td>
            <td>{{$t->marketing}}</td>
            <td>{{$t->created_at->format('d/m/Y')}}</td>
            <td>
            <button type="button" class="btn btn-success btn-sm" style="margin-top:2px;" data-toggle="modal" data-target="#modal-edit{{$t->id}}"><i class="far fa-eye"></i>View
              </button>
              <a href="/supervisi/cetakdocs/{{$t->id}}" class="btn btn-primary btn-sm" style="margin-top:2px;"><i class="far fa-file-word"></i>  Doc</a>
              <a href="/supervisi/cetakpdf/{{$t->id}}" class="btn btn-danger btn-sm" style="margin-top:2px;"><i class="far fa-file-pdf"></i>  PDF </a>                                           
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Modal -->
    @foreach($tamu as $key=>$t)
    <div class="modal fade" id="modal-edit{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><legend>Detail Tamu</legend></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <p><strong>Nama         :</strong> {{$t->nama}}</p>
                <p><strong>Usia         :</strong> {{$t->usia}} Tahun</p>
                <p><strong>Alamat       :</strong> {{$t->alamat}}</p>
                <p><strong>Telepon      :</strong> {{$t->notel}}</p>
                <p><strong>Pekerjaan    :</strong> {{$t->pekerjaan}}</p>
                <p><strong>Sumber Info  :</strong> {{$t->sumberinfo}}</p>
                <p><strong>Kritik/Saran :</strong> {{$t->kritiksaran}}</p>
              </div>
              <div class="col-sm">
                <img src="{{asset('gambar/'.$t->gambar)}}" style="width:250px;height:250px;">
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
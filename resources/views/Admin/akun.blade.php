@extends('layouts_admin.main')
@section('content')
<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Akun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">            
          <form action="/admin/tambah/" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
             <label for="exampleFormControlSelect1">Kategori</label>
              <select class="form-control " id="exampleFormControlSelect1" name="kategori">
                <option value="Tamu" selected >Tamu</option>
                <option value="Supervisi">Supervisi</option>
                <option value="Admin">Admin</option>
              </select>
            </div>

            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama"  id="nama" placeholder="masukan nama lengkap" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"  id="email" placeholder="masukan email" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"  id="password" placeholder="masukan password" required>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>  
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">AKUN USER</h3>
                    <div class="float-right">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Tambah Akun
                    </button>
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($user as $key=>$u)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$u->nama}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->password}}</td>
                        <td>{{$u->kategori}}</td>
                        <td>
                           <a href="#" class="btn btn-danger btn-sm delete" akun-id="{{$u->id}}" akun-name="{{$u->nama}}" nama-produk="" produk-id="">Hapus</a>                 
                        </td>
                    </tr>  
                    @endforeach            
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
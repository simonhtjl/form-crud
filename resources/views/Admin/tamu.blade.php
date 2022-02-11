@extends('layouts_admin.main')
@section('content')

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
                    <h3 class="card-title">DAFTAR TAMU</h3>
                    <div class="float-right">
                </div>
            </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>No WA/HP</th>
                    <th>Pekerjaan</th>
                    <th>Sumber Info</th>
                    <th>Kritik Saran</th>
                    <th>Marketing</th>
                    <th>Gambar</th>
                    <th>Cetak</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($tamu as $key=>$t)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$t->nama}}</td>
                        <td>{{$t->usia}}</td>
                        <td>{{$t->alamat}}</td>
                        <td>{{$t->notel}}</td>
                        <td>{{$t->pekerjaan}}</td>
                        <td>{{$t->sumberinfo}}</td>
                        <td>{{$t->kritiksaran}}</td>
                        <td>{{$t->marketing}}</td>
                        <td>
                          <img src="{{asset('gambar/'.$t->gambar)}}" style="width:100px;height:80px">
                        </td>
                        <td>
                          <a href="/admin/cetakdocs/{{$t->id}}" class="btn btn-primary btn-sm" style="margin-top:2px;" nama-produk="" produk-id="">Doc</a>&nbsp
                          <a href="/admin/cetakpdf/{{$t->id}}" class="btn btn-danger btn-sm" style="margin-top:2px;" nama-produk="" produk-id="">PDF</a>                                           
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
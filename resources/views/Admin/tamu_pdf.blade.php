<html>
<head>
	<title>PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Usia</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Pekerjaan</th>
                <th>Sumber Info</th>
                <th>Kritik Saran</th>
                <th>Gambar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tamu as $key=>$t)
			<tr>
				<td>{{$t->nama}}</td>
				<td>{{$t->usia}}</td>
				<td>{{$t->alamat}}</td>
				<td>{{$t->notel}}</td>
				<td>{{$t->pekerjaan}}</td>
                <td>{{$t->sumberinfo}}</td>
                <td>{{$t->kritiksaran}}</td>
                <td>{{$t->gambar}}</td>
			</tr>
            
			@endforeach
		</tbody>
	</table>
	<table class='table table-bordered' style="width:200px;margin-left:68%;">
		<thead>
			<tr>
				<th style="text-align: center;">Profil Tamu</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tamu as $key=>$t)
			<tr>
				<td><img src="{{ public_path('gambar/'.$t->gambar) }}" style="width: 200px; height: 200px;"></td>
			</tr>
		
			@endforeach
		</tbody>
	</table> 
 
</body>
</html>
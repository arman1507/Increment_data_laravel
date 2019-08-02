<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>

	<h2>www.malasngoding.com</h2>
	<h3>Data </h3>

	<a href="/index/tambah"> + Tambah Data</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>
			<th>Id</th>
			<th>Kode Unik</th>
			<th>Harga</th>
			<th>Total</th>
			
		</tr>
		@foreach($data as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->kode_unik }}</td>
			<td>{{ $p->harga }}</td>
			<td>{{ $p->total }}</td>
			
		</tr>
		@endforeach
	</table>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Pembelian Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
<img src="kop.png" style="width: 100%;margin-top: 0;padding-top:0">

<h1>Pembelian Barang</h1>
<table>
    <thead>
    <tr>
        <th>Nama Karyawan</th>
        <th>ID Barang</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Deskripsi</th>
        <th>No Form</th>
        <th>Tanggal</th>
        <th>Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->nama_karyawan }}</td>
            <td>{{ $item->id_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->no_form }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->harga }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="footer">
    <p>Dicetak pada tanggal {{ \Carbon\Carbon::now()->format('d-m-Y') }} oleh Super Admin</p>
</div>
</body>
</html>

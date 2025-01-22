<!DOCTYPE html>
<html>
<head>
    <title>Laporan pertty cash</title>
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
            padding-right: 20px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<img src="kop.png" style="width: 100%; margin-top: 0; padding-top: 0;">
<h1>Laporan pertty cash</h1>
<table>
    <thead>
    <tr>
        <td>Nama Barang</td>
        <td>tanggal</td>
        <td>jumlah</td>
        <td>harga</td>
        <td>deskripsi</td>

    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->deskripsi }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="footer">
    <p>Jakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    <p>Mengetahui,</p>
    <br><br><br>
    <p><u>Marvin Limanjaya</u><br>
        Direktur Utama</p>
</div>
</body>
</html>

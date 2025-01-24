<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stock Barang</title>
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

        .superadmin-footer {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            background-color: white;
        }
    </style>
</head>
<body>
<img src="kop.png" style="width: 100%;margin-top: 0;padding-top:0">

<h1>Laporan Stock Barang</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Stock</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->stock }}</td>
            <td>{{ $item->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="footer">
    <p>Jakarta, {{ \Carbon\Carbon::now()->locale('id')->dayName }} {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    <p>Mengetahui,</p>
    <br><br><br>
    <p><u>Marvin Limanjaya</u><br>
        Direktur Utama</p>
</div>
<div class="superadmin-footer">
    <p>dicetak pada {{ \Carbon\Carbon::now()->format('d F Y') }} oleh superadmin</p>
</div>
</body>
</html>

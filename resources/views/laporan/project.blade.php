<!DOCTYPE html>
<html>
<head>
    <title>Project Data</title>
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
<h1>Project Data</h1>
<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->tanggal_mulai }}</td>
            <td>{{ $item->tanggal_selesai }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="footer">
    <p>Dicetak pada tanggal {{ \Carbon\Carbon::now()->format('d-m-Y') }} oleh Super Admin</p>
</div>
</body>
</html>

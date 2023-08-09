<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Hasil Testing</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-size: 9pt;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center !important;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center !important;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Berkualitas</th>
            <th>Buruk</th>
            <th>Fakta</th>
            <th>Klasifikasi</th>
            <th>Prediksi</th>
        </tr>
        @foreach ($dataResult as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ round($item['berkualitas'], 4) }}</td>
                <td>{{ round($item['buruk'], 4) }}</td>
                <td>{{ $item['fakta'] }}</td>
                <td>{{ $item['result'] }}</td>
                <td>{{ $item['prediksi'] }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
        <style>
            #transaksis {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
            }

            #transaksis-title {
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
            }
            
            #transaksis td, #transaksis th {
            border: 1px solid #ddd;
            padding: 8px;
            }
            
            #transaksis tr:nth-child(even){background-color: #f2f2f2;}
            
            #transaksis tr:hover {background-color: #ddd;}
            
            #transaksis th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            }
        </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <div class="table-responsive col-lg-12 py-2">
        <h3 id="transaksis-title">Top 5 Driver di 6 Bulan Terakhir</h3>
        <table class="table table-striped table-sm" id="transaksis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Driver</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Rerata Rating</th>
                    <th scope="col">Total Pendapatan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver->nama }}</td>
                        <td>Rp @convert($driver->tarif)</td>
                        <td>{{ round($driver->rating, 2) }}</td>
                        <td>Rp @convert($driver->pendapatan)</td>
                    </tr>
                @endforeach
                @dd($data)
            </tbody>
        </table>
    </div>
</body>
</html>

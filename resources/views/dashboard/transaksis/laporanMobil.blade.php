
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #transaksis {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        border-collapse: collapse;
        width: 100%;
        }

        #transaksis-title {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 20px;
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

        .heading {
            font-size: 25px;
            margin-right: 25px;
        }

        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial;
            margin: 0 auto; 
            max-width: 1200px;
            padding: 20px;
        }

        #generated {
            font-size: 13px;
            display: flex; 
            text-align: right;
            justify-content: flex-end;
            
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <span class="heading">ATMA JAYA RENTAL</span>
    <p>Earnings Rp @convert($pendapatan_total) based on {{ $count }} total transactions.</p>
    <hr style="border:3px solid #f1f1f1">

    <div class="table-responsive col-lg-12 py-2">
        <h3 id="transaksis-title">{{ $tahun }}/{{ strtoupper(DateTime::createFromFormat('!m', $bulan)->format('F')) }} CAR REPORT </h3>
        <p id="generated">Generated at {{ \Carbon\Carbon::now('GMT+7')->toDayDateTimeString() }}</p>

        <table class="table table-striped table-sm" id="transaksis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe Mobil</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Plat Nomor Mobil</th>
                    <th scope="col">Jumlah Transaksi</th>
                    <th scope="col">Pendapatan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mobils as $mobil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mobil->tipe }}</td>
                        <td>{{ $mobil->nama_mobil }}</td>
                        <td>{{ $mobil->no_plat }}</td>
                        <td>{{ $mobil->jumlah }}</td>
                        <td>Rp @convert($mobil->subtotal)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

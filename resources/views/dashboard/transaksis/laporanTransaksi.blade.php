
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                justify-content: flex-end;
                text-align: right;
            }

        </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

</head>
<body>
    <span class="heading">ATMA JAYA RENTAL</span>
    <p>Rating is {{ round($transaksis->avg('rating_rental'), 2) }} average based on {{ $count_rating }} reviews.</p>
    <hr style="border:3px solid #f1f1f1">

    <div class="table-responsive">
        <h3 id="transaksis-title">{{ $tahun }}/{{ strtoupper(DateTime::createFromFormat('!m', $bulan)->format('F')) }} TRANSACTION REPORT</h3>
        <p id="generated">Generated at {{ \Carbon\Carbon::now('GMT+7')->toDayDateTimeString() }}</p>

        <table class="table table-striped table-sm" id="transaksis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Nota</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Mobil Sewaan</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Subtotal Transaksi</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Rating Rental</th>
                </tr>
            </thead>

            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>TRN{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('d') }}
                            @if ($transaksi->driver_id)01 
                            @elseif($transaksi->driver_id == '0')00 
                            @endif
                            - 0{{ $transaksi->id }}
                        </td>
                        <td>{{ $transaksi->customer->user->nama }}</td>
                        <td>{{ $transaksi->mobil->nama }}</td>
                        <td>
                            @if ($transaksi->driver_id == '0')
                                -
                            @else
                                {{ $transaksi->driver->user->nama }}
                            @endif
                        </td>
                        <td>Rp @convert($transaksi->biaya)</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_pengembalian)->toFormattedDateString() }}</td>
                        <td>{{ $transaksi->rating_rental }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

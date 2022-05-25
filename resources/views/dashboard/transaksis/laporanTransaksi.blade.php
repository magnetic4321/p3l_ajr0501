
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
        <h3 id="transaksis-title">Detail Transaksi 6 Bulan Terakhir</h3>
        <table class="table table-striped table-sm" id="transaksis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Nota</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Mobil Sewaan</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Subtotal Transaksi</th>
                    <th scope="col">Tanggal Selesai</th>
                </tr>
            </thead>

            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>TRN{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('d') }}@if ($transaksi->driver_id)01 
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

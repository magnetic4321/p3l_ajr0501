
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
    <span class="heading">ATMA JAYA RENTAL (Mobil)</span>
    <hr style="border:3px solid #f1f1f1">
    <div class="table-responsive">

        <table class="table table-striped table-sm" id="transaksis">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Tarif /hari</th>
                    <th scope="col">Fasilitas</th>
                    <th scope="col">Kapasitas (Penumpang)</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mobils as $mobil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mobil->nama }}</td>
                        <td>{{ $mobil->tipe }}</td>
                        <td>Rp @convert($mobil->tarif)</td>
                        <td>{{ $mobil->fasilitas }}</td>
                        <td>{{ $mobil->kapasitas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

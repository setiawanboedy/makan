<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        p {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <center>
            <h4>Laporan Transaksi</h4>
        </center>
        <br />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pemesan</th>
                    <th>Meja</th>
                    <th>Tanggal dan Waktu</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->detailHeaders->pluck('booking_number')->implode(', ') }}</td>
                        <td>{{$item->date}} & {{$item->time}}</td>
                        <td>{{ $item->detailHeaders->flatMap(function ($detailHeader) {
                            return $detailHeader->trans_details->pluck('quantity');
                        })->sum() }}</td>
                        <td>Rp {{ $item->transaction_total }}</td>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>

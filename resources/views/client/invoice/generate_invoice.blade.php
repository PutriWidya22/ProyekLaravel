<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{$pesanan->invoice}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Alesha</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice : {{$pesanan->invoice}}</span> <br>
                    <span>Tanggal: {{$pesanan->created_at->format('d-m-Y h:i A')}}</span> <br>
                    <span>Status : {{$pesanan->status}}</span> <br>
                    <span>Alamat: {{$pesanan->address_detail. ', ' . $pesanan->destination}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Invoice:</td>
                <td>{{$pesanan->invoice}}</td>

                <td>Nama:</td>
                <td>{{$pesanan->nama_order}}</td>
            </tr>
           
            <tr>
                <td>Ordered Date:</td>
                <td>{{$pesanan->created_at->format('d-m-Y h:i A')}}</td>

                <td>Phone:</td>
                <td>{{$pesanan->no_hp}}</td>
            </tr>
            <tr>
                <td>Kurir:</td>
                <td>{{$pesanan->courier}}</td>

                <td>Alamat:</td>
                <td>{{$pesanan->address_detail. ', ' . $pesanan->destination}}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$pesanan->status}}</td>

                <td>Total:</td>
                <td>@currency($pesanan->total)</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terimakasih Sudah Belanja di Alesha <span>:)</span>
    </p>

</body>
</html>
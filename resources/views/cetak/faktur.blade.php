<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Faktur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            line-height: 1.6;
            width: 100%;
            text-align: center; /* Center all elements */
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-inline: auto;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        h5 {
            color: #666;
            font-size: 16px;
            margin-bottom: 5px;
            text-align: center;
        }

        hr {
            border: none;
            border-top: 1px dashed #ccc;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
            margin: 0 auto; /* Center the table */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-size: 18px;
        }

        td {
            font-size: 16px;
        }

        tfoot td {
            font-weight: bold;
            font-size: 18px;
        }

        @media screen and (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border-bottom: 1px dashed #ccc;
                margin-bottom: 10px;
                position: relative;
            }

            td {
                border: none;
                border-bottom: 1px solid #ddd;
                position: relative;
                padding-left: 50%;
                text-align: left;
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            td:nth-of-type(1):before {
                content: "Qty:";
            }

            td:nth-of-type(2):before {
                content: "Item:";
            }

            td:nth-of-type(3):before {
                content: "Harga:";
            }

            td:nth-of-type(4):before {
                content: "Total:";
            }
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="ketengahin">
            <h2>Myeongdong Night Market</h2>
            <h5>Massachusetts Hall, Cambridge, MA 02138</h5>
            <hr>
            <div class="invoice-details">
                <h5>No. Faktur: {{ $transaksi->id }}</h5>
                <h5>Tanggal: {{ $transaksi->tanggal }}</h5>
            </div>
            <table border="0">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Item</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detailTransaksi as $item)
                    <tr>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>Rp {{ number_format($item->menu->harga, 0, ",", ".") }}</td>
                        <td>Rp {{ number_format($item->subtotal, 0, ",", ".") }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total:</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 0, ",", ".") }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        body {
            font-family: sans-serif;
        }
        body > div {
            display: block;
            float: left;
            width: 50%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin-bottom: 16px;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div>
        <img src="{{ $shipping_label }}" alt="shipping label" style="width: 450px" />
    </div>
    <div>
        <h1>Bestelinformatie</h1>
        <p>Ordernummer: {{ $order['number'] }}</p>
        <h3>Klantgegevens</h3>
        <table>
            <tr>
                <th></th>
                <th>Factuuradres</th>
                <th>Afleveradres</th>
            </tr>
            @foreach($order['billing_address'] as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                    <td>{{ $order['delivery_address'][$key] ?? '' }}</td>
                </tr>
            @endforeach
        </table>
        <h3>Bestelling</h3>
        <table>
            <tr>
                <th>Naam</th>
                <th>Aantal</th>
                <th>SKU</th>
                <th>EAN</th>
            </tr>
            @foreach($order['order_lines'] as $line)
                <tr>
                    <td>{{ $line['name'] }}</td>
                    <td>{{ $line['amount_ordered'] }}</td>
                    <td>{{ $line['sku'] }}</td>
                    <td>{{ $line['ean'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

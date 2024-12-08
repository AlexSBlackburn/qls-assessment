<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
</head>
<body class="flex">
    <div>
        <img src="{{ $shipping_label }}" alt="shipping label" />
    </div>
    <div>
        <h1>Bestelinformatie</h1>
        <p>Ordernummer: {{ $order['number'] }}</p>
        <h3>Factuuradres</h3>
        @foreach($order['billing_address'] as $key => $value)
            <p>{{ $key }}: {{ $value }}</p>
        @endforeach
        <h3>Afleveradres</h3>
        @foreach($order['delivery_address'] as $key => $value)
            <p>{{ $key }}: {{ $value }}</p>
        @endforeach
        <h3>Orderinformatie</h3>
        @foreach($order['order_lines'] as $line)
            <p>Name: {{ $line['name'] }}</p>
            <p>Amount: {{ $line['amount_ordered'] }}x</p>
            <p>SKU: {{ $line['sku'] }}x</p>
            <p>EAN: {{ $line['ean'] }}x</p>
        @endforeach
    </div>
</body>
</html>

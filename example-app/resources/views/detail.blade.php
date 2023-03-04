<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="/">Back</a>
    <br>
    <br>
    <h1>Nama wisata: {{ $detail['wisata'] }}</h1>
    <h2>Harga/Price:</h2>
    @if ($session == 'USD')
        <h2>$ {{ $detail['harga'] / $rateIDR }}</h2>
    @endif
    @if ($session == 'MYR')
        <h2>MYR {{ number_format(($detail['harga'] / $rateIDR) * $rateMYR, 0, ',', '.') }}</h2>
    @endif
    @if ($session == 'SGD')
        <h2>SGD {{ number_format(($detail['harga'] / $rateIDR) * $rateSGD, 0, ',', '.') }}</h2>
    @endif
    @if ($session == 'IDR')
        <h2>Rp {{ number_format($detail['harga'], 0, ',', '.') }}</h2>
    @endif
</body>

</html>

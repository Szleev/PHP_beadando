<!doctype html>
<html lang="en">
<head>
    <style>
        .design{
            text-align: center;
            margin: auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$order->id}}. - rendelés részletei</title>
</head>
<body>
    <div class="design">
        <h1>Rendelés részletei</h1>
        Azonosító: <h3>{{$order->id}}</h3>
        Név: <h3>{{$order->name}}</h3>
        E-mail: <h3>{{$order->email}}</h3>
        Telefonszám: <h3>{{$order->phone}}</h3>
        Cím: <h3>{{$order->address}}</h3>
        Termék azonosító: <h3>{{$order->product_id}}</h3>
        Termék neve: <h3>{{$order->product_title}}</h3>
        Termék ára: <h3>{{$order->price}}Ft</h3>
        Rendelt mennyiség: <h3>{{$order->quantity}}</h3>
        Fizetési státusz: <h3>{{$order->payment_status}}</h3>
        Szállítási státusz: <h3>{{$order->delivery_status}}</h3>
        <br>
        <img height="250px" width="250px" src="product/{{$order->image}}" alt="">
    </div>

</body>
</html>

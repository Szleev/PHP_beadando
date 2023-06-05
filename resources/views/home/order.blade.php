<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <style>
        .center{
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }
        table,th,td{
            border: 1px solid black;
        }
        th{
            font-size: 30px;
            padding: 10px;
            background-color: #f7444e;
            color: whitesmoke;
            font-weight: bold;
        }
    </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>LRB - Levente Hangszerboltja</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>
<body>

    <!-- header section starts -->
    @include('home.header')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

    @endif
    <div class="center">
        <table>
            <tr>
                <th>Termék neve</th>
                <th>Darab</th>
                <th>Ár</th>
                <th>Fizetési státusz</th>
                <th>Szállítási státusz</th>
                <th>Termék képe</th>
                <th>Visszamondás</th>
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td><img height="200px" width="200px" src="product/{{$order->image}}" alt=""></td>
                <td>
                    @if($order->delivery_status=='Folyamatban')
                    <a onclick="return confirm('Biztosan vissza akarod mondani a rendelést?')" href="{{url('cancel_order',$order->id)}}" class="btn btn-danger">
                        <i class="fa fa-close" style="font-size:24px"></i>
                    </a>
                    @else
                        <p>-</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->

<!-- why section -->

<!-- end why section -->

<!-- arrival section -->

<!-- end arrival section -->

<!-- product section -->

<!-- end product section -->

<!-- subscribe section -->

<!-- end subscribe section -->
<!-- client section -->

<!-- end client section -->
<!-- footer start -->
@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2023 Minden jog fenntartva <a href="">LRB</a><br>

        Weboldalt készítette: <a href="https://www.instagram.com/szleev/" target="_blank">Szlev</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <style>
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {
            border: 1px solid black;
            margin: auto;
        }
        .th_deg{

            font-size: 30px;
            padding: 5px;
            background: #f7444e;
            color: white;
        }
        .img_deg{
            height: 200px;
            width: 200px;
        }
        .total_price{
            font-size: 22px;
            color: white;
            padding: 15px;
            background-color: grey;
            border-radius: 25px;
            width: 40%;
            margin: auto;
        }
        .td-deg{
            font-size: 22px;
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
    <title>LRB - Levente ruhaboltja</title>
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
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

    @endif
    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->

<!-- why section -->

<div class="center">
    <table>
        <tr>
            <th class="th_deg">Termék neve</th>
            <th class="th_deg">Darab</th>
            <th class="th_deg">Ár</th>
            <th class="th_deg">Termék képe</th>
            <th class="th_deg">Eltávolítás</th>
        </tr>

        <?php
            $totalprice=0;
        ?>



        @foreach($cart as $cart)
        <tr>
            <td class="td-deg">{{$cart->product_title}}</td>
            <td class="td-deg">{{$cart->quantity}}</td>
            <td class="px-5; td-deg">{{$cart->price}}Ft</td>
            <td><img class="img_deg" src="/product/{{$cart->image}}" alt=""></td>
            <td><a class="btn btn-danger fa fa-trash-o" style="font-size: 30px" href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('Biztosan el akarod távolítani ezt a terméket?')"></a></td>
        </tr>

            <?php
                $totalprice=$totalprice + $cart->price

                ?>
        @endforeach


    </table>

    <div class="p-3">
        <h1 class="total_price">Teljes összeg: {{$totalprice}}Ft</h1>
    </div>
    <div style="margin: auto;text-align: center">
        <h1 style="font-size: 22px;background-color: #f7444e;border-radius: 25px; color: whitesmoke; margin-bottom: 10px">Tovább a fizetéshez</h1>
        @if($totalprice==0)
            <h1 style="font-weight: bold; font-size: 20px; padding: 4px">Ha fizetni szeretnél, először adj hozzá valamit a kosaradhoz!</h1>
        @else
            <a href="{{url('cash_order')}}" class="btn btn-danger">Készpénzes fizetés</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Kártyás fizetés</a>
        @endif
    </div>
</div>

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


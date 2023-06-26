<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <style>
        .title_deg{
            text-align: center;
            font-size: 35px;
            font-weight: bold;
            padding-bottom: 40px;
        }
        .table_design{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        .th_deg{
            background-color: #f7444e;
        }
        .img_size{
            width: 200px;
            height: 200px;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LHB - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">Összes rendelés</h1>
                <div style="text-align: center; padding-bottom: 30px;padding-right: 30px">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" placeholder="Keresés" style="color: black; padding-right: 30px"></input>
                        <input type="submit" value="Keresés" placeholder="Keresés a rendelések között" class="btn btn-danger"></input>
                    </form>
                </div>
                <table class="table_design">
                    <tr class="th_deg">
                        <th>Név</th>
                        <th>E-mail</th>
                        <th>Cím</th>
                        <th>Telefonszám</th>
                        <th>Termék neve</th>
                        <th>Darab</th>
                        <th>Ár</th>
                        <th>Fizetési státusz</th>
                        <th>Szállítási státsuz</th>
                        <th>Kép</th>
                        <th>Művelet</th>
                        <th>PDF Letöltése</th>
                        <th>E-mail küldése</th>

                    </tr>
                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$order->image}}" alt="">
                        </td>
                        <td>
                            @if($order->delivery_status=='Folyamatban')
                            <a href="{{url('delivered',$order->id)}}" class="btn btn btn-success" style="font-size: 25px" onclick="return confirm('Biztosan ki van szállítva a termék?')"><i class="fas fa-shipping-fast" style="color: whitesmoke;"></i></a>
                            @else
                            <p style="font-size: 20px"><span>&#10003;</span></p>

                            @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="fa fa-download" style="font-size: 25px"></a>
                        </td>
                        <td>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-danger" style="text-align: center"><i class="fa fa-envelope" style="font-size:25px"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="16">Nincs találat</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>

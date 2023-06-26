<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <style type="text/css">
        .center{
            margin: auto;
            width: 100%;
            border: solid 2px white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding: 40px;
        }
        .img_size{
            width: 150px;
            height: 150px;
        }
        .th_color{
            background-color: gray;
        }
        .th_deg{
            padding: 30px;
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

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>

                @endif
                <h2 class="font_size">Összes termék</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Termék neve</th>
                        <th class="th_deg">Leírás</th>
                        <th class="th_deg">Darab</th>
                        <th class="th_deg">Kategória</th>
                        <th class="th_deg">Ár</th>
                        <th class="th_deg">Akciós ár</th>
                        <th class="th_deg">Kép</th>
                        <th class="th_deg">Törlés</th>
                        <th class="th_deg">Szerkesztés</th>
                    </tr>

                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>

                            <img class="img_size" src="/product/{{$product->image}}" alt="">

                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Biztosan ki akarod törölni?')" href="{{url('delete_product', $product->id)}}">Törlés</a>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('update_product', $product->id)}}">Szerkesztés</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>

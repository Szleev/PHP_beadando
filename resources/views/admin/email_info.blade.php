<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <base href="/public"></base>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
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
                <h1 style="text-align: center; font-size: 25px">E-mail küldése {{$order->email}} számára</h1>
                <form action="{{url('send_user_email',$order->id)}}" method="POST">

                    @csrf
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>Köszöntés</label>
                        <input type="text" name="greeting" style="color: black">
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>E-mail első sor</label>
                        <input type="text" name="firstline" style="color: black">
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>E-mail szövege:</label>
                        <input type="text" name="body" style="color: black">
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>E-mail gomb</label>
                        <input type="text" name="button" style="color: black">
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>E-mail link</label>
                        <input type="text" name="url" style="color: black">
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px">
                        <label>E-mail utolsó sor</label>
                        <input type="text" name="lastline" style="color: black">
                    </div>
                </form>
                    <div style="padding-left: 35%; padding-top: 50px; margin-left: 150px">
                        <input type="submit" value="Küldés" class="btn btn-danger" style="font-size: 25px">
                    </div>
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

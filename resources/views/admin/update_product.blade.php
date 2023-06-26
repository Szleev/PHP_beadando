<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public"></base>
    <style>

        .div_center{
            text-align: center;
            padding-top: 40px;
        }

        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h1 class="font_size">Termék szerkesztése</h1>

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="div_design">
                            <label>Termék neve :</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                        </div>
                        <div class="div_design">
                            <label>Termék leírása :</label>
                            <input class="text_color" type="text" name="description" placeholder="Adj meg valamit" required="" value="{{$product->description}}">
                        </div>
                        <div class="div_design">
                            <label>Termék ára :</label>
                            <input class="text_color" type="number" min="0" name="price" placeholder="Adj meg valamit" required="" value="{{$product->price}}">
                        </div>
                        <div class="div_design">
                            <label>Termék akciós ára :</label>
                            <input class="text_color" type="number" name="dis_price" placeholder="Adj meg valamit" value="{{$product->discount_price}}">
                        </div>
                        <div class="div_design">
                            <label>Termék darabszáma :</label>
                            <input class="text_color" type="number" min="0" name="quantity" placeholder="Adj meg valamit" required="" value="{{$product->quantity}}">
                        </div>
                        <div class="div_design">
                            <label>Termék kategória :</label>
                            <select class="text_color" name="category" required="" >

                                <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                @foreach($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="div_design">
                            <label>Jelenlegi kép :</label>
                            <img style="margin:auto;" height="150" width="150" src="/product/{{$product->image}}" alt="">
                        </div>
                        <div class="div_design">
                            <label>Kép cseréje :</label>
                            <input type="file" min="0" name="image">
                        </div>
                        <div class="div_design">

                            <input type="submit" value="Mentés" class="btn btn-primary">
                        </div>

                    </form>
                </div>

            </div>


        </div>

    </div>

</div>

</div>

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



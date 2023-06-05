<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Vásárolható <span>termékeink</span>
            </h2>

            <br>
            <div>
                <form action="{{url('product_search')}}" method="GET">
                    @csrf
                    <input style="width: 500px" type="text" name="search" placeholder="Mit keresel?">
                    <input type="submit" value="Keresés">
                </form>
            </div>
        </div>

        <div class="row">
            @foreach($product as $products)

            <div style="display: flex; flex-wrap: wrap; justify-content: space-between">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details',$products->id)}}" class="option1">
                                Termék részletei
                            </a>
                            <form action="{{url('add_cart',$products->id)}}" method="Post">

                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="submit" value="Kosárhoz adás">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>

                        @if($products->discount_price!=null)
                        <h6  style="color: #f7444e">
                            {{$products->discount_price}}Ft
                        </h6>
                            <del>
                                <h6>
                                    {{$products->price}}Ft
                                </h6>
                            </del>
                        @else
                            <h6>
                                {{$products->price}}Ft
                            </h6
                        @endif

                    </div>
                </div>
            </div>

            @endforeach




    </div>
        <div style="margin-top: 20px">
                <span>
                {!!$product->links('pagination::bootstrap-5')!!}
               </span>
        </div>
</section>

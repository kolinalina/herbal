@extends('/master')
@section('content')

  <div class="slider-area">
            <div class="zigzag-bottom"></div>
            <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

                <div class="slide-bulletz">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="carousel-indicators slide-indicators">
                                    <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                    <li data-target="#slide-list" data-slide-to="1"></li>
                                    <li data-target="#slide-list" data-slide-to="2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="single-slide">
                            <div class="slide-bg slide-one"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>Complete Product</h2>
                                                    <p>Menyediakan berbagai jenis tanaman herbal, mulai dari bibit dan tanamannya.
                                                    </p>
                                                    <p>Diambil dari tanaman yang berkualitas.</p>
                                                    <!-- <a href="" class="readmore">Learn more</a> -->
                                                    <p>
                                                        <div class="product-wid-rating" style="text-align: right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-two"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>Trusted</h2>
                                                    <p>Mengedepankan kepuasaan pelanggan dengan cara menjaga bibit tanaman yang
                                                        unggul dan berkualitas.</p>
                                                    <p>Proses pengiriman yang aman dan cepat merupakan cara untuk menjaga kualitas
                                                        produk sampai ditangan customer.
                                                    </p>

                                                    <!-- <a href="" class="readmore">Learn more</a> -->
                                                    <p>
                                                        <div class="product-wid-rating" style="text-align: right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-three"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>Modern</h2>
                                                    <p>Pemanfaatan teknologi untuk mengoptimalkan penjualan yang maksimal</p>
                                                    <p>Efisien merupakan salah satu misi dari perusahaan</p>
                                                    <!-- <a href="" class="readmore">Learn more</a> -->
                                                    <p>
                                                        <div class="product-wid-rating" style="text-align: right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End slider area -->

       

        <br>
        
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">New Product</h2>
                           
  
                            <div class="product-carousel">
                            @foreach( $all_product_info as $v_product)
                                <div class="single-product">
                                    
                                    <div class="product-f-image">
                                        
                                        <img src="{{URL::to($v_product->product_image)}}" alt="">
                                        <div class="product-hover">
                                            <a href="{{URL::to('/view-product/'.$v_product->product_id)}}" class="add-to-cart-link">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart</a>
                                            
                                        </div>
                                    </div>

                                    <h2>
                                        <a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a>
                                    </h2>

                                    <div class="product-carousel-price">
                                        <ins>Rp.{{$v_product->product_price2}}</ins>
                                        <del>Rp.{{$v_product->product_price}}</del>
                                    </div>
                                </div>
                                
                                @endforeach
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End main content area -->

        

        <div class="product-widget-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                        <h2 class="section-title">Top Product</h2><br>
                    <div class="col-md-4">
                        <div class="single-product-widget">

                                @foreach( $all_product_info as $v_product)
                          
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="{{URL::to($v_product->product_image)}}" alt="" class="product-thumb"></a>
                                <h2>
                                    <a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                        <ins>Rp.{{$v_product->product_price2}}</ins>
                                        <del>Rp.{{$v_product->product_price}}</del>
                                </div>
                            </div>
                            @endforeach

                            
                           
                        </div>

                        
                    </div>

                    <div class="col-md-4">
                            <div class="single-product-widget">
    
                                    @foreach( $all_product_info as $v_product)
                              
                                <div class="single-wid-product">
                                    <a href="single-product.html"><img src="{{URL::to($v_product->product_image)}}" alt="" class="product-thumb"></a>
                                    <h2>
                                        <a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a>
                                    </h2>
                                    <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-wid-price">
                                            <ins>Rp.{{$v_product->product_price2}}</ins>
                                            <del>Rp.{{$v_product->product_price}}</del>
                                    </div>
                                </div>
                                @endforeach
    
                                
                               
                            </div>
    
                            
                        </div>

                        <div class="col-md-4">
                                <div class="single-product-widget">
        
                                        @foreach( $all_product_info as $v_product)
                                  
                                    <div class="single-wid-product">
                                        <a href="single-product.html"><img src="{{URL::to($v_product->product_image)}}" alt="" class="product-thumb"></a>
                                        <h2>
                                            <a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a>
                                        </h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                                <ins>Rp.{{$v_product->product_price2}}</ins>
                                                <del>Rp.{{$v_product->product_price}}</del>
                                        </div>
                                    </div>
                                    @endforeach
        
                                    
                                   
                                </div>
        
                                
                            </div>
                </div>
            </div>
        </div>
        <!-- End product widget area -->

@endsection

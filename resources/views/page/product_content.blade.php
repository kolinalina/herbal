@extends('/master')
@section('content')

 <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Produk</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                     <div class="single-sidebar">
                        <h2 class="sidebar-title">Category</h2>
                        <ul>
                             <?php
                                $all_product_category=DB::table('category')
                                    ->where('category_status',1)
                                    ->get();

                                foreach($all_product_category as $v_categoryy){
                            ?>

                            <li><a href="{{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a></li>
                            <?php } ?>
                        </ul>
                           
                    </div>
                  
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                            <div class="product-breadcroumb">
                                    <a href="{{url('/product')}}">All Product</a>
                                        {{-- <a href="{{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a> --}}
                                        {{-- <a href="#">{{$all_product_detail->product_name}}</a> --}}
                            </div>
                        </div>
                    
                        
                       
                        
          <div class="container">
            <div class="row">
            @foreach( $all_product_info as $v_product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{URL::to($v_product->product_image)}}" alt="">
                        </div>
                        <h2><a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp.{{$v_product->product_price2}}</ins> <del>Rp.{{$v_product->product_price}}</del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{URL::to('/view-product/'.$v_product->product_id)}}">Add to cart</a>
                        </div>                       
                    </div>

                </div>
                @endforeach  
               
            </div>
            </div>
           
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
           

                        
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                           
                            <div class="related-products-carousel">
                            @foreach( $all_product_info as $v_product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{URL::to($v_product->product_image)}}"  alt="">
                                        <div class="product-hover">
                                            <a href="{{URL::to('/view-product/'.$v_product->product_id)}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                           
                                        </div>
                                    </div>

                                    

                                    <h2><a href="{{URL::to('/view-product/'.$v_product->product_id)}}">{{$v_product->product_name}}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>Rp.{{$v_product->product_price2}}</ins> <del>Rp.{{$v_product->product_price2}}</del>
                                    </div> 
                                </div>
                                @endforeach   
                                                                 
                            </div>
                           
                        </div>
                       
                    </div> 
                           
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@extends('/master')
@section('content')

 <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Detail Product</h2>
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

                {{-- @foreach($all_product_detail as $v_detail) --}}
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                        <a href="{{url('/product')}}">All Product</a>
                            <a href="{{URL::to('/product-category/'.$all_product_detail->category_id)}}">{{$all_product_detail->category_add}}</a>
                            <a href="#">{{$all_product_detail->product_name}}</a>
                        </div>
                    </div>
               
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{URL::to($all_product_detail->product_image)}}" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="{{URL::to($all_product_detail->product_image)}}" alt="">
                                        <img src="{{URL::to($all_product_detail->product_image)}}" alt="">
                                        <img src="{{URL::to($all_product_detail->product_image)}}" alt="">
                                        <img src="{{URL::to($all_product_detail->product_image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$all_product_detail->product_name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>Rp.{{$all_product_detail->product_price2}}</ins> <del>Rp.{{$all_product_detail->product_price}}</del>
                                    </div>    
                                    
                                <form action="{{url('/add-to-cart')}}" method="post" class="cart">
                                        {{ csrf_field() }}
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="qty" min="1" step="1">
                                            <input type="hidden" name="product_id" value="{{$all_product_detail->product_id}}">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                        </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a>. {{$all_product_detail->product_description1}} . </p>
                                    </div> 
                                            
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>{{$all_product_detail->product_description2}} .
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                             
                        
                        
                        {{-- <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                           
                            <div class="related-products-carousel">
                            @foreach( $$all_product_detail as $v_product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{URL::to($all_product_detail->product_image)}}"  alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="{{URL::to('/view-product/'.$all_product_detail->product_id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    

                                    <h2><a href="{{URL::to('/view-product/'.$all_product_detail->product_id)}}">{{$all_product_detail->product_name}}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>Rp.{{$all_product_detail->product_price2}}</ins> <del>Rp.{{$all_product_detail->product_price2}}</del>
                                    </div> 
                                </div>
                                @endforeach   
                                                                 
                            </div>
                           
                        </div> --}}
                       
                    </div> 
                           
                </div>
                {{-- @endforeach  --}}
            </div>
        </div>
    </div>
    </div>

@endsection
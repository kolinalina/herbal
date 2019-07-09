@extends('/master')
@section('content')

 <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-1">
                </div>

                {{-- @foreach($all_product_detail as $v_detail) --}}
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                        <a href="{{url('/product')}}">All Product</a>
                            {{-- <a href="{{URL::to('/product-category/'.$all_product_detail->category_id)}}">{{$all_product_detail->category_add}}</a>
                            <a href="#">{{$all_product_detail->product_name}}</a> --}}
                        </div>
                    </div>
               
                        

                        
                    <div class="col-md-12">
                            <div class="product-content-right">
                                <div class="woocommerce">
                                   
                                        <?php
                                            $contents=Cart::content();
                                                    // echo "<pre>";
                                                    // print_r($contents);
                                                    // echo "</pre>";
                                        ?>
                                        <table cellspacing="0" class="shop_table cart">
                                            <thead>
                                                
                                                <tr>
                                                   
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($contents as $v_contents) { ?>
                                                <tr class="cart_item">
                                                   
        
                                                    <td class="product-thumbnail">
                                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{URL::to($v_contents->options->image)}}">
                                                    </td>

                                                           
                                                    <td class="product-name">
                                                        {{$v_contents->name}}
                                                    </td>
        
                                                    <td class="product-price">
                                                        <span class="amount">Rp.{{$v_contents->price}}</span> 
                                                    </td>
        
                                                    <td class="product-quantity">
                                                        <div class="quantity buttons_added">
                                                        <form action="{{url('/update-cart')}}" method="POST" >
                                                             {{ csrf_field() }}

                                                             <input type="hidden" name="rowId" value="{{ $v_contents->rowId }}" >
                                                                
                                                                <input type="number" class="input-text qty text" disabled  name="qty" value="{{$v_contents->qty}}" min="1" step="1">
                                                                
                                                               
                                                              
                                                        </form>
                                                        </div>
                                                    </td>
        
                                                    <td class="product-subtotal">
                                                        <span class="amount">Rp.{{$v_contents->total}}</span> 
                                                    </td>
                                                </tr>
        
                                               
                                                <?php
                                                     }
                                                ?>
                                               
                                            </tbody>
                                        </table>
                                   
        
                                    <div class="cart-collaterals">
        
        
                                  
        
                                    <div class="cart_totals ">
                                        <h2>Cart Totals</h2>
        
                                        <table cellspacing="0">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                <td><span class="amount">Rp.{{Cart::subtotal()}}</span></td>
                                                </tr>
        
                                                <tr class="shipping">
                                                    <th>Shipping and Handling</th>
                                                    <td>Free Shipping</td>
                                                </tr>
        
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">Rp.{{Cart::total()}}</span></strong> </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                   
                                    </div>
                                   

                                <form action="{{('/place-order')}}" method="post">
                                {{ csrf_field() }}

                                        <div id="payment" class="col-md-7">
                                                <ul class="payment_methods methods">
                                                    <li class="payment_method_bacs">
                                                        <input type="radio" data-order_button_text="" checked="checked" value="bank" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                        <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                        <div class="payment_box payment_method_bacs">
                                                            <p>Transfer melalui Teller Bank dengan menyerahkan Order ID</p>
                                                        </div>
                                                    </li>
                                                    <li class="payment_method_bacs">
                                                            <input type="radio" data-order_button_text=""  value="atm" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                            <label for="payment_method_bacs">Direct ATM Transfer </label>
                                                            <div class="payment_box payment_method_bacs">
                                                                <p>Transfer melalui ATM atau M-Banking</p>
                                                            </div>
                                                        </li>
                                                 
                                                </ul>
        
                                                <div class="form-row place-order">
        
                                                    <input type="submit" data-value="Place order" value="DONE" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
        
        
                                                </div>
        
                                                <div class="clear"></div>
        
                                            </div>
                                        </form>
                                   
                                  
                                   

                                   
        
                                   
        
                                    </div>
                                </div>                        
                            </div>                    
                        </div>
                       
                    </div> 
                           
                </div>
                {{-- @endforeach  --}}
            </div>
        </div>
    </div>
    </div>

@endsection
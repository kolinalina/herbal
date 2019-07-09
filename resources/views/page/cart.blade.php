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
                                                    <th class="product-remove">Remove</th>
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
                                                    <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="{{('/delete-cart/'.$v_contents->rowId)}}">×</a> 
                                                    </td>
        
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
                                                                
                                                                <input type="number" class="input-text qty text" name="qty" value="{{$v_contents->qty}}" min="1" step="1">
                                                                
                                                               
                                                                <input type="submit" name="submit" value="update" class="btn btn-sm btn-success">
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
                                                <tr>
                                                    <td colspan="2">
                                                            <?php
                                                            $customer_id=Session::get('customer_id');
                                                            $ship_id=Session::get('ship_id');
                                                            print_r($customer_id);
                                                            print_r($ship_id);

                                                        ?>
                                                        <?php if($customer_id != NULL && $ship_id==NULL){ ?>
                                                            <a href="{{URL::to('/checkout')}}" class="btn btn-success" style="background:#004D40; width:100%" style="width:100%;">CHECKOUT</a>
                                                        <?php }elseif($customer_id != NULL && $ship_id!=NULL){ ?>
                                                                <a href="{{URL::to('/customer-payment')}}" class="btn btn-success" style="background:#004D40; width:100%" style="width:100%;">CHECKOUT</a>
                                                        <?php }else{ ?>
                                                    <a href="{{URL::to('/login-check')}}" class="btn btn-success" style="background:#004D40; width:100%" style="width:100%;">CHECKOUT</a>

                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                   
                                    </div>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        
        
        
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
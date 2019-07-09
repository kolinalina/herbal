<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@extends('/master') @section('content')

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

                        <li>
                            <a href="{{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a>
                        </li>
                        <?php } ?>
                    </ul>

                </div>

            </div>

            <div class="col-md-1"></div>

            <form
                enctype="multipart/form-data"
                style=""
                action="{{url('/save-checkout')}}"
                class="checkout"
                method="post"
                name="checkout">

                {{ csrf_field() }}

                <div id="customer_details" class="col2-set">
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <h3>Delivery Details</h3>
                            <p
                                id="billing_country_field"
                                class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">

                                <p
                                    id="billing_last_name_field"
                                    class="form-row form-row-last validate-required">
                                    <label class="" for="billing_last_name">Nama Lengkap
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input
                                        type="text"
                                        value=""
                                        placeholder=""
                                        maxlength="200"
                                        id="billing_last_name"
                                        name="ship_fullname"
                                        class="input-text "
                                        required>
                                </p>
                                <div class="clear"></div>

                                <p
                                    id="billing_address_1_field"
                                    class="form-row form-row-wide address-field validate-required">
                                    <label class="" for="billing_address_1">Alamat
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <textarea name="ship_address" id="billing_address_1" class="input-text " cols="30" rows="3" required></textarea>
                                </textarea>
                                </p>

                               
                                {{-- <p
                                    id="billing_city_field"
                                    class="form-row form-row-wide address-field validate-required"
                                    data-o_class="form-row form-row-wide address-field validate-required">
                                    <label class="" for="billing_city">Kecamatan
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <select name="kec" id="kec" class="input-text " data-dependent="kel" required>
                                        <option value="">Select Kecematan</option>
                                        @foreach($kec as $kec)
                                        <option value="{{ $kec->kec_id}}">{{ $kec->kec }}</option>
                                        @endforeach
                                    </select>
                                    
                                </p>

                                <p
                                    id="billing_city_field"
                                    class="form-row form-row-wide address-field validate-required"
                                    data-o_class="form-row form-row-wide address-field validate-required">
                                    <label class="" for="billing_city">Kelurahan
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <select name="kel" id="kel" class="input-text "  required>
                                        <option value="">Select State</option>
                                    </select>
                                    
                                </p> --}}

                                <p
                                    id="billing_postcode_field"
                                    class="form-row form-row-last address-field validate-required validate-postcode"
                                    data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                    <label class="" for="billing_postcode">Kode Pos
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input
                                        type="text"
                                        value=""
                                        placeholder=""
                                        id="billing_postcode"
                                        name="ship_kodepos"
                                        maxlength="6"
                                        class="input-text " required>
                                </p>

                                <div class="clear"></div>

                                <p
                                    id="billing_email_field"
                                    class="form-row form-row-first validate-required validate-email">
                                    <label class="" for="billing_email">Alamat Email
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input
                                        type="email"
                                        value=""
                                        placeholder=""
                                        id="billing_email"
                                        name="ship_email"
                                        maxlength="200"
                                        style="width:360px;"
                                        class="input-text "
                                        required>
                                </p>

                                <p
                                    id="billing_phone_field"
                                    class="form-row form-row-last validate-required validate-phone">
                                    <label class="" for="billing_phone">No.Hp
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input
                                        type="text"
                                        value=""
                                        placeholder=""
                                        maxlength="15"
                                        id="billing_phone"
                                        name="ship_phone"
                                        class="input-text "
                                        required>
                                </p>

                                <p
                                id="billing_address_1_field"
                                class="form-row form-row-wide address-field">
                                <label class="" for="billing_address_1">Note
                                    
                                </label>
                                <textarea name="ship_note" id="billing_address_1" class="input-text " cols="30" rows="3" required></textarea>
                            </textarea>
                            </p>

                                <div class="clear"></div>

                            </div>
                        </div>

                        <div class="col-2">
                            <div class="woocommerce-shipping-fields">
                                <br><br><br>

                                {{-- <h3 id="order_review_heading">Your order</h3> --}}

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                      

                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td>
                                                    <span class="amount">Rp.{{Cart::subtotal()}}</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input
                                                        type="hidden"
                                                        class="shipping_method"
                                                        value="free_shipping"
                                                        id="shipping_method_0"
                                                        data-index="0"
                                                        name="shipping_method[0]">
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount">Rp.{{Cart::total()}}</span></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                        <input
                                                        type="submit"
                                                        data-value="Place order"
                                                        value="Place order"
                                                        id="place_order"
                                                        name="woocommerce_checkout_place_order"
                                                        class="button alt"
                                                        style="width:100%">
                                                </td>
                                              
                                            </tr>

                                          
                                        </tfoot>
                                    </table>

                                
                                       


                                </div>

                            </div>
                        </form>

                     
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


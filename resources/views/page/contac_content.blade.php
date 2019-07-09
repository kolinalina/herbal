{{-- maps --}}

{{-- <link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/mystyle.css')}}"> --}}
@extends('/master') @section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
           

            <div class="col-md-2"></div>
            <form
                enctype="multipart/form-data"
                action="{{url('/index')}}"
                class="checkout"
                name="checkout">

                <div id="customer_details" >
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <h3>Contact Us</h3>
                            <p
                                id="billing_country_field"
                                class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">

                                <p
                                    id="billing_last_name_field"
                                    class="form-row form-row-last validate-required">
                                    <label class="" for="email">Email Address
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input
                                        type="text"
                                        value=""
                                        placeholder=""
                                        id="email"
                                        name="email"
                                        class="input-text ">
                                </p>
                                <div class="clear"></div>

                                <p
                                    id="billing_phone_field"
                                    class="form-row form-row-last validate-required validate-phone">
                                    <label class="" for="billing_phone">Message
                                        <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <textarea
                                        value=""
                                        placeholder=""
                                        id="billing_phone"
                                        rows="4"
                                        name="billing_phone"
                                        class="input-text "></textarea>
                                </p>

                                <div class="clear"></div>

                                <div class="form-row place-order">

                                    <input
                                        type="submit"
                                        data-value="Send"
                                        value="Send"
                                        id="place_order"
                                        name="woocommerce_checkout_place_order"
                                        class="button alt">

                                </div>
                            </div>
                        </div>
                        
                         
                    </div>
                    


                            <div id="customer_details" >
                                <div class="col-1">
                                        <br><br>
                                    
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1642509248513!2d110.42012441450059!3d-6.989925970396007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b592bbd8ed7%3A0xddbb6b6596ae4a35!2sJl.+Simpang+Lima%2C+Kota+Semarang%2C+Jawa+Tengah!5e0!3m2!1sen!2sid!4v1561358706657!5m2!1sen!2sid" width="400" height="280" frameborder="0" style="border-radius: 10px;" allowfullscreen></iframe>

                                    <br><br><br>

                                    
                                </div>

                              
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

@endsection


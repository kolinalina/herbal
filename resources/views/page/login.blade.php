@extends('/master') @section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Login</h2>
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

                        <li>
                            <a href="{{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a>
                        </li>
                        <?php } ?>
                    </ul>

                </div>

            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="{{url('/product')}}">All Product</a>
                        {{-- <a href="{{URL::to('/product-category/'.$v_categoryy->category_id)}}">{{$v_categoryy->category_add}}</a>
                    --}}
                    {{-- <a href="#">{{$all_product_detail->product_name}}</a>
                --}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="product-content-right">
                <div class="woocommerce">
                    <div class="woocommerce-info">
                        <b>
                            <p align="center">Login</p>
                        </b>
                        <a
                            class="showlogin"
                            data-toggle="collapse"
                            href="#login-form-wrap"
                            aria-expanded="false"
                            aria-controls="login-form-wrap"></a>
                    </div>

                    <p class="alert-danger" align="center">
                            <?php
    
                            $message=Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message',null);
    
                            }
    
                            ?>
                            </p>

                    <form id="login-form-wrap" class="" action="{{url('/customer-login')}}" method="post">
                        {{ csrf_field() }}

                        <p></p>

                        <p class="form-row form-row-first">
                            <label for="username">Email
                                <span class="required">*</span>
                            </label>
                            <input
                                type="email"
                                id="username"
                                name="customer_email"
                                style="width: 250px;"
                                class="input-text"
                                required="required">
                        </p>
                        <p class="form-row form-row-last">
                            <label for="password">Password
                                <span class="required">*</span>
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="customer_pass"
                                class="input-text"
                                required="required">
                        </p>
                        <div class="clear"></div>

                        <p class="form-row">
                            <input type="submit" value="Login" name="login" class="button">

                        </p>
                        

                        <div class="clear"></div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="woocommerce-info">
                <b>
                    <p align="center">Registrasi</p>
                </b>
                <a
                    class="showlogin"
                    data-toggle="collapse"
                    href="#login-form-wrap"
                    aria-expanded="false"
                    aria-controls="login-form-wrap"></a>
            </div>

        <form id="login-form-wrap" method="post" action="{{('/registrasi-customer')}}" class="">
            {{ csrf_field() }}

                <p></p>

                <p class="form-row form-row-first">
                    <label for="username">Username<span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="username"
                        style="width:250px;"
                        maxlength="255"
                        name="customer_username"
                        class="input-text"
                        required="required">
                </p>
                <p class="form-row form-row-first">
                    <label for="email">Email
                        <span class="required">*</span>
                    </label>
                    
                    <input
                        type="email"
                        id="email"
                        name="customer_email"
                        style="width: 250px;"
                        class="input-text"
                        maxlength="255"
                        required="required">
                </p>
                <p class="form-row form-row-last">
                    <label for="password">Password
                        <span class="required">*</span>
                    </label>
                    <input
                        type="password"
                        id="password"
                        style="width:250px;"
                        name="customer_pass"
                        maxlength="255"
                        class="input-text"
                        required="required">
                </p>
                <div class="clear"></div>

                <p class="form-row">
                    <input type="submit" value="Sign Up" name="login" class="button">

                </p>
                <p class="lost_password"></p>

                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
@extends('admin_page') @section('content')
<!-- start: Content -->

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title="data-original-title">
                <h2>
                    <i class="halflings-icon edit"></i>
                    <span class="break"></span>Add Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting">
                        <i class="halflings-icon wrench"></i>
                    </a>
                    <a href="#" class="btn-minimize">
                        <i class="halflings-icon chevron-up"></i>
                    </a>
                    <a href="#" class="btn-close">
                        <i class="halflings-icon remove"></i>
                    </a>
                </div>
            </div>
            <div class="box-content">

                <p class="alert-success">
                    <?php
							$message=Session::get('message');
							echo $message;
							Session::put('message',null);
							?>

                </p>

                    <form
        class="form-horizontal"
        action="{{ url('/save-product') }}"
        method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}
        <fieldset>

            <div class="control-group success">
                <label class="control-label" for="date01">Product Name</label>
                <div class="controls">
                    <input
                        type="text"
                        class="form-control"
                        name="product_name"
                        placeholder="Nama Produk"
                        required="required">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="selectError">Category</label>
                <div class="controls">
                    <select id="selectError" name="category_id" data-rel="chosen">

                        <?php
                                            $all_category=DB::table('category')
                                                ->where('category_status',1)
                                                ->get();

                                            foreach($all_category as $v_category){
                                        ?>
                        <option value="{{$v_category->category_id}}">{{$v_category->category_add}}</option>
                        <?php
                                            }
                                        ?>

                    </select>
                </div>
            </div>

            <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Short Description</label>
                <div class="controls">
                    <textarea
                        class="cleditor"
                        name="product_description1"
                        rows="3"
                        required="required"></textarea>
                </div>
            </div>

            <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Long Description</label>
                <div class="controls">
                    <textarea
                        class="cleditor"
                        name="product_description2"
                        rows="3"
                        required="required"></textarea>
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="date01">Price Old</label>
                <div class="controls">
                    <input
                        type="text"
                        class="form-control"
                        name="product_price"
                        placeholder="Harga Lama"
                        required="required">
                </div>
            </div>

            <div class="control-group success">
                <label class="control-label" for="date01">Price New</label>
                <div class="controls">
                    <input
                        type="text"
                        class="form-control"
                        name="product_price2"
                        placeholder="Harga Baru"
                        required="required">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input
                        type="file"
                        class="input-file uniform_on"
                        id="fileInput"
                        name="product_image">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="date01">Status Publication</label>
                <div class="controls">
                    <input type="checkbox" class="form-control" name="product_status" value="1">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset>
    </form>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

    <!-- end: Content -->
    @endsection
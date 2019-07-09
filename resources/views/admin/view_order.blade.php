@extends('admin_page')
@section('content')

<!-- start: Content -->
		
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orderan</a></li>
			</ul>

			<p class="alert-success" align="center">
				
						<?php
						$message=Session::get('message');
						echo $message;
						Session::put('message',null);


						?>
					
					</p>

			<div >
						
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Detail Pengiriman</h2>
						
						
					</div>
					
					<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Address||Kode Pos</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Note</th>
                
            </tr>
        </thead>

        @foreach( $order as $v_order)
        @endforeach

        <tbody>
            <tr>
                
                <td class="center">{{ $v_order -> ship_fullname }}</td>
                <td class="center">{{ $v_order -> ship_address }} || {{ $v_order -> ship_kodepos }}</td>
                <td class="center">{{ $v_order -> ship_phone }}</td>
                <td class="center">{{ $v_order -> ship_email }}</td>
                <td class="center">{{ $v_order -> ship_note }}</td>

               
                   
                  
                   

                </tr>

            </tbody>
            

        </table>
    </div>
				</div><!--/span-->
			
            </div><!--/row-->
            

            {{-- kedua --}}

            <div class="row-fluid sortable">
						
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Detail Pembelian</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>
					
					<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Sub Total</th>
                
            </tr>
        </thead>

        @foreach( $order as $v_order)
       

        <tbody>
            <tr>
                <td>{{ $v_order -> order_id }}</td>
                
                <td class="center">{{ $v_order -> product_name }}</td>
                <td class="center">{{ $v_order -> product_price }}</td>
                <td class="center">{{ $v_order -> product_qty }}</td>
                <td class="center">{{ $v_order -> product_price*$v_order ->product_qty }}</td>
                   
                @endforeach  
               
                    {{-- <td class="center">
                        @if($v_product -> product_status==1)
                        <span class="label label-success">Post</span>
                        @else
                        <span class="label label-danger">Unpost</span>
                        @endif
                    </td> --}}
                   

                </tr>
               
                <tr>
                    <td colspan="4">
                        <b>TOTAL</b> 
                    </td>
                    <td>
                      <b>Rp. {{ $v_order -> order_total }}</b>  
                    </td>
                </tr>

            </tbody>
            

        </table>
    </div>
				</div><!--/span-->
			
            </div><!--/row-->
            

			
						 
					</div>
				</div><!--/span-->
			</div><!--/row-->
    

	
			<!-- end: Content -->

@endsection
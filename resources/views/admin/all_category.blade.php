@extends('admin_page')
@section('content')

<!-- start: Content -->
	
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<p class="alert-success" align="center">
				
						<?php
						$message=Session::get('message');
						echo $message;
						Session::put('message',null);


						?>
					
					</p>

			<div class="row-fluid sortable">
						
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
						
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Category</th>
								  <th>Deskripsi</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

						  @foreach( $info as $v_category)

						  
						  <tbody>
							<tr>
								<td>{{ $v_category -> category_id }}</td>
								<td class="center">{{ $v_category -> category_add }}</td>
								<td class="center">{{ $v_category -> category_deskripsi }}</td>
								<td class="center">
									@if($v_category -> category_status==1)
									<span class="label label-success">Post</span>
									@else
									<span class="label label-danger">Unpost</span>
									@endif
								</td>
								<td class="center">
									@if($v_category -> category_status!=1)
									<a class="btn btn-success" href="{{URL('/status-aktif/'.$v_category->category_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{URL('/status-nonaktif/'.$v_category->category_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{ URL::to('/edit-category/'.$v_category->category_id) }}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL('/delete-category/'.$v_category->category_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
    

	
			<!-- end: Content -->

@endsection
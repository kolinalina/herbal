@extends('admin_page')
@section('content')
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
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
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

					
						<form class="form-horizontal" action="{{URL('/save-category')}}" method="post">

						{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group success">
							  <label class="control-label" for="date01">Category</label>
							  <div class="controls">
								<input type="text" class="form-control" name="category_add" placeholder="Nama Category" required="required">
							  </div>
							</div>
							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Deskripsi</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_deskripsi" rows="3" required="required"></textarea>
							  </div>
                            </div>
                       	
                            <div class="control-group">
							  <label class="control-label" for="date01">Status Publikasi</label>
							  <div class="controls">
								<input type="checkbox" class="form-control" name="status" value="1">
							  </div>
                            </div>
                            
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
	
			<!-- end: Content -->
@endsection
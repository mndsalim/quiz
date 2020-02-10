@extends('defaults.base')






@section('content')



				<div class="col-md-9" dir="rtl">
					<div class="content">

						<div class="module">
						
							<div class="module-body">
							
							@if ($errors->any())
							    <div class="alert alert-danger" dir="ltr">
							        <ul type="none">
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif

								<ul class="widget widget-menu unstyled">
									<li>
										<a class="collapsed" data-toggle="collapse" href="#togglePages">
											<i class="menu-icon icon-cog"></i>
											<i class="icon-chevron-down pull-left"></i>
											<i class="icon-chevron-up pull-left"></i>
											تسحيل مستخدم جديد
										</a>

								

								<div id="togglePages" class="collapse unstyled">

									<br />

									<form action="user" method="post" class="form-horizontal row-fluid" dir="rtl">
										{{ csrf_field()}}

										<div class="control-group" dir="rtl">

											<label class="" for="name">الاسم</label>
											<input type="text" id="name" name="name" placeholder="الاسم ..." class="span12 form-conttrol">

										</div>





										<div class="control-group row">
											<div class=" col-md-6" dir="rtl">

												<label class="" for="address">العنوان</label>
												<input type="text" id="address" name="address" placeholder="العنوان ..." class="span12 form-conttrol">

											</div>

											<div class=" col-md-6" dir="rtl">

												<label class="" for="phone">رقم الجوال</label>
												<input type="text" id="phone" name="phone" placeholder="رقم الجوال  ..." class="span12 form-conttrol">

											</div>
										</div>



										<div class="control-group row">
											<div class=" col-md-6" dir="rtl">

												<label class="" for="password_confirmation">تأكيد كلمة المرور</label>
												<input type="password" id="password_confirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور ..." class="span12 form-conttrol">

											</div>

											<div class=" col-md-6" dir="rtl">

												<label class="" for="password">كلمة المرور</label>
												<input type="password" id="password" name="password" placeholder="كلمة المرور   ..." class="span12 form-conttrol">

											</div>
										</div>








										<div class="control-group">

												<button type="submit" class="btn btn-primary pull-left">تسجــيــل</button>

										</div>



									</form>
							</div>

								</li>
							</ul>
						</div>




						<div class="module">
							<div class="module-head">
								<h3>DataTables</h3>
							</div>
							<div class="module-body table">
								<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>الترقيم</th>
											<th>الاسم</th>
											<th>رقم الجوال</th>
											<th>العنوان</th>
											<th>تعطيل/تفعيل</th>
										</tr>
									</thead>
									<tbody>

										@if(!empty($users))
											@foreach($users as $user)

											<tr class="odd gradeX">
												<td>{{ $user->id ?? '--' }}</td>
												<td>{{ $user->name ?? '--' }}</td>
												<td>{{ $user->phone ?? '--' }}</td>
												<td>{{ $user->address ?? 0 }}</td>
												<td><a href="{{ $user->id}}"></a></td>
											</tr>
											@endforeach
										@endif

									</tbody>
								</table>
							</div>
						</div><!--/.module-->

						
						
					</div><!--/.content-->
				</div><!--/.span9-->


@endsection

@section('libs')


	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>

	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>


@endsection
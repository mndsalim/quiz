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

									<form action="students" method="post" class="form-horizontal row-fluid" dir="rtl">
										{{ csrf_field()}}

										<div class="control-group" dir="rtl">

											<label class="" for="user_name">الاسم</label>
											<input type="text" id="user_name" name="user_name" placeholder="الاسم ..." class="span12 form-conttrol">

										</div>




										<div class="control-group" dir="rtl">

											<label class="" for="user_email">البريد الإلكتروني</label>
											<input type="text" id="user_email" name="user_email" placeholder="البريد الإلكتروني ..." class="span12 form-conttrol">


										</div>


										<div class="control-group" dir="rtl">

											<label class="" for="user_phone">رقم الجوال</label>
											<input type="text" id="user_phone" name="user_phone" placeholder="رقم الجوال ..." class="span12 form-conttrol">


										</div>


										<div class="control-group row">
											<div class=" col-md-6" dir="rtl">

												<label class="" for="user_address">العنوان</label>
												<input type="text" id="user_address" name="user_address" placeholder="العنوان ..." class="span12 form-conttrol">

											</div>

											<div class=" col-md-6" dir="rtl">

												<label class="" for="user_password">كلمة المرور</label>
												<input type="password" id="user_password" name="user_password" placeholder="كلمة المرور ..." class="span12 form-conttrol">

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
											<th>عدد الإختبارات</th>
										</tr>
									</thead>
									<tbody>

										@if(!empty($students))
											@foreach($students as $student)

											<tr class="odd gradeX">
												<td>{{ $student->id ?? '--' }}</td>
												<td>{{ $student->name ?? '--' }}</td>
												<td>{{ $student->phone ?? '--' }}</td>
												<td>{{ $student->quiz ?? 0 }}</td>
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
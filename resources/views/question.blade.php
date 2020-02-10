@extends('defaults.base')






@section('content')



				<div class="col-md-9" dir="rtl">
					<div class="content">

						<div class="module">
						
							<div class="module-body">
							
							@if ($errors->any())
							    <div class="alert alert-danger">
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
											إضافة أسئلة
										</a>

								

								<div id="togglePages" class="collapse unstyled" style="direction: rtl !important;">

									<br />

									<form action="questions" dir="rtl" method="post" class="form-horizontal row-fluid" dir="rtl">
										{{ csrf_field()}}

										<div class="form-group row">

											<div class=" col-md-4" dir="rtl">
												<label class="" for="question">السؤال</label>
												<input type="text" id="question" name="question" placeholder="السؤال ..." class="span12 form-conttrol">
											</div>


											<div class=" col-md-4" dir="rtl">
												<label class="" for="question_type">نوع السؤال</label>
												<select id="question_type" name="question_type" class="form-conttrol">
													<option value="1">ضرب</option>
													<option value="2">قسمة</option>
												</select>
											</div>

											<div class=" col-md-4" dir="rtl">
												<label class="" for="question_level">درجة الصعوبة</label>
												<select id="question_level" name="question_level" class="form-conttrol">
													@for($i = 1; $i <= 20; $i++)
													<option value="{{ $i }}">{{ $i }}</option>
													@endfor
												</select>
											</div>

										</div>





										<div class="control-group row">
											<div class=" col-md-6" dir="rtl">

												<label class="" for="second_answer">الخيار الثاني</label>
												<input type="text" id="second_answer" name="second_answer" placeholder="" class="span12 form-conttrol">

											</div>

											<div class=" col-md-6" dir="rtl">

												<label class="" for="first_answer">الخيار الأول</label>
												<input type="text" id="first_answer" name="first_answer" placeholder="" class="span12 form-conttrol">

											</div>
										</div>


										<div class="control-group row">
											<div class=" col-md-6" dir="rtl">

												<label class="" for="fourth_answer">الخيار الرابع</label>
												<input type="text" id="fourth_answer" name="fourth_answer" placeholder="" class="span12 form-conttrol">

											</div>

											<div class=" col-md-6" dir="rtl">

												<label class="" for="third_answer">الخيار الثالث</label>
												<input type="text" id="third_answer" name="third_answer" placeholder="" class="span12 form-conttrol">

											</div>
										</div>








										<div class="control-group">

												<select name="correct_answer" class="span6 form-conttrol">
													<option>رقم الإجابة الصحيحة</option>
													<option value="1">الأولى</option>
													<option value="2">الثانية</option>
													<option value="3">الثالثة</option>
													<option value="4">الرابعة</option>
												</select>

												<button type="submit" class="btn btn-primary pull-left">تسجــيــل</button>

										</div>



									</form>
							</div>

								</li>
							</ul>
						</div>




						<div class="module">
							<div class="module-head">
								<h3>الأسئلة</h3>
							</div>
							<div class="module-body table">
								<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>الترقيم</th>
											<th>السؤال</th>
											<th>الجواب الأول</th>
											<th>الجواب الثاني</th>
											<th>الجواب الثالث</th>
											<th>الجواب الرابع</th>
											<th> رقم الجواب الصحيح</th>
											<th>تفعيل\تعطيل</th>
											<th>جذف</th>
										</tr>
									</thead>
									<tbody>

										@if(!empty($questions))
											@foreach($questions as $question)

											<tr class="odd gradeX">
												<td>{{ $question->id ?? '--' }}</td>
												<td>{{ $question->question ?? '--' }}</td>
												<td>{{ $question->first_answer ?? '--' }}</td>
												<td>{{ $question->second_answer ?? '--' }}</td>
												<td>{{ $question->third_answer ?? '--' }}</td>
												<td>{{ $question->fourth_answer ?? '--' }}</td>
												<td>{{ $question->correct_answer ?? '--' }}</td>
												<td>{{ $question->is_active ?? 0 }}</td>
												<td> <a onclick="return confirm('هل تريد حذف هذا السؤال')" class="btn btn-danger" href="/questions/{{ $question->id}}/cancel">حذف</a></td>
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
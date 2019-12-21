@extends('defaults.base')






@section('content')



				<div class="col-md-9" dir="rtl">
					<div class="content">

						<div class="module">
						







						<div class="module">
							<div class="module-head">
								<h3>الإختبارات</h3>
							</div>
							<div class="module-body table">
								<table dir="rtl" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>الترقيم</th>
											<th>نوع الإمتحان</th>
											<th>الأجوبة</th>
										</tr>
									</thead>
									<tbody>

										@if(!empty($quizzes))
											@foreach($quizzes as $quiz)

												<tr class="odd gradeX">
													<td>{{ $quiz->id ?? '--' }}</td>
													<td>{{ ($quiz->group_type == 1)? 'ضرب': 'قسمة' ?? '--' }}</td>
													<td>{{ $quiz->answer ?? '--' }}</td>
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
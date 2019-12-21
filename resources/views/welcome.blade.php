

@extends('defaults.base')


@section('content')





                    <div class="col-md-9">
                        <div class="content">
                            <div class="btn-controls">
                                

                                <div class="btn-box-row row-fluid">
                                    
                                    <a href="#" class="btn-box big span4">
                                        <i class="fa fa-question"></i>
                                        <b>{{ (isset($quizzes))? count($quizzes): '--' }}</b>
                                        <p class="text-muted">
                                            جملة الإختبارات</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                        <i class="">%</i>
                                        <b>{{ (isset($divisions))? count($divisions): '--' }}</b>
                                        <p class="text-muted">إختبارات القسمة</p>
                                    </a>


                                    <a href="#" class="btn-box big span4">
                                        <i class="">x</i>
                                        <b>{{ (isset($multiplications))? count($multiplications): '--' }}</b>
                                        <p class="text-muted">إختبارات الضرب</p>
                                    </a>

                                </div>                                

                                <div class="btn-box-row row-fluid">
                                    
                                    <a href="#" class="btn-box big span4">
                                        <i class="fa fa-question"></i>
                                        <b>{{ (isset($questions))? count($questions): '--' }}</b>
                                        <p class="text-muted">
                                            الأشئلة</p>
                                    </a>

                                    <a href="#" class="btn-box big span4">
                                        <i class="icon-group"></i>
                                        <b>{{ (isset($admins))? count($admins): '--' }}</b>
                                        <p class="text-muted">المشرفين</p>
                                    </a>


                                    <a href="#" class="btn-box big span4">
                                        <i class="icon-user"></i>
                                        <b>{{ (isset($students))? count($students): '--' }}</b>
                                        <p class="text-muted">الطلاب</p>
                                    </a>

                                </div>

                            </div>
                            
                            <!--/#btn-controls-->
                       


                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->







@endsection
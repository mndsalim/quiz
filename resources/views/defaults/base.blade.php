<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>إبتدائية ١٠٧</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            


            <div class="navbar-inner" style="direction: rtl;">
                <div class="container">
                    
                    <div class="pull-right">
                        <a class="brand b" style="font-size: 22px;" href="index.html">إبتدائية 107</a>
                    </div>


              <!--       <div class="nav-collapse collapse navbar-inverse-collapse pull-left">
                        <ul class="nav pull-right">
                            
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div> -->

                        <!-- <a class="brand" style="font-size: 14px;" href="index.html">تسجيل خروج</a> -->

                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->




        </div>




        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 pull-right" style="direction: rtl;">
                        <!-- <div class="sidebar"> -->
                            <ul class="widget widget-menu ">
                                
                                <li class="active">
                                    <a href="/../">
                                        <i class="menu-icon icon-dashboard"></i>
                                        الرئيسية
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="/students">
                                        <i class="menu-icon icon-bullhorn"></i>
                                        الطلاب
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="/quizzes">
                                        <i class="menu-icon icon-inbox"></i>
                                        الإختبارات 
                                        <b class="label green pull-left">{{ App\studentQuiz::where('finishing_date', '<>', null)->get()->count() ?? '--' }}</b>
                                    </a>
                                </li>

                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu">

                                <li>
                                    <a href="/questions">
                                        <i class="menu-icon icon-tasks"></i>
                                        الأسئلة
                                        <b class="label orange pull-left"> {{ App\question::all()->count() ?? '--' }}</b>
                                    </a>
                                </li>


                                <li>
                                    <a href="">
                                        <i class="menu-icon icon-bold"></i>
                                        المشرفين
                                    </a>
                                </li>
                                
<!--                                 <li>
                                    <a href="ui-typography.html">
                                        <i class="menu-icon icon-book"></i>
                                        Typography
                                    </a>
                                </li> -->
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu">
                                <li><a href="/../logout"><i class="menu-icon icon-signout"></i> تسجيل خروج </a></li>
                            </ul>
                        <!-- </div> -->
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->









@section('content')

@show


                

                </div>
            </div>
        </div>



        <div class="footer">
            <div class="container " style="text-align: center;">
                 جميع الحقوق محفوظة <b class="copyright">&copy; إبتدائية ١٠٧</b>
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      
    </body>
</html>





@section('libs')

@show
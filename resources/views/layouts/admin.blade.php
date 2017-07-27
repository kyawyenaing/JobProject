<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title',"MomoJob Adminpanel")</title>

    <!-- Bootstrap -->
    <link href="{{url('')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('')}}/admin/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('')}}/admin/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->

    <!-- bootstrap-progressbar -->
    <link href="{{url('')}}/admin/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->

    <!-- summernote richtexteditor -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">

    <!-- date time picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- unicode font -->
    <link rel="stylesheet" href="{{url('')}}/admin/css/font.css" media="screen">

    <!--  datatable -->
    <link href="{{url('')}}/admin/css/datatables.bootstrap.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{url('')}}/admin/css/custom.min.css" rel="stylesheet">

    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

    <style type="text/css">
      .form-delete{
        display:inline;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i>
              <span>MomoJob</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @if(Auth::user())
            <div class="profile">
              <div class="profile_pic">
              @if(isset(Auth::user()->social_account))
                @if(Auth::user()->social_account->provider == 'facebook')
                <img src="https://graph.facebook.com/{{Auth::user()->social_account->provider_user_id}}/picture" alt="..." class="img-circle profile_img">
                @else
                <img src="{{Auth::user()->social_account->avatar}}" alt="..." class="img-circle profile_img">
                @endif
              @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            @endif
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-dashboard"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a><i class="fa fa-user"></i> <span class="unicode">အသုံးပြုသူများ</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('')}}/admin/users">Users</a></li>
                      <li><a href="{{url('')}}/admin/roles">Roles</a></li>
                      <li><a href="#">Permission</a></li>
                      <li><a href="#">Role-Permission</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-newspaper-o"></i> <span class="unicode"> သတင်းနှင့်ပတ်သတ်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu unicode">
                      <li><a href="{{url('admin/article-category')}}">သတင်းအမျိုးအစားများ(category)</a></li>
                      <li><a href="{{url('admin/article')}}">သတင်းနှင့်ဆောင်းပါးများ</a></li>
                      <li><a href="{{url('admin/slides')}}">Slide</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-globe"></i> <span class="unicode"> တည်နေရာနှင့်ဆိုင်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu unicode">
                      <li><a href="{{url('admin/city')}}">မြို့နှင့်မြို့နယ်များ(city)</a></li>
                      <li><a href="{{url('admin/region')}}">တိုင်းနှင့်ပြည်နယ်များ(region)</a></li>
                      <li><a href="{{url('admin/country')}}">တိုင်းပြည်(country)</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-product-hunt"></i> <span class="unicode">အလုပ်အကိုင်များနှင့်ဆိုင်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu unicode">
                      <li><a href="{{url('admin/job')}}">အလုပ်အကိုင်များ(Jobs)</a></li>
                      <li><a href="{{url('admin/category')}}">  အမျိုးအစားများ(Category)</a></li>
                      <li><a href="{{url('admin/salary')}}">လစာ(Salary)</a></li>
                      <li><a href="{{url('admin/type')}}">ယူနစ်(Unit)</a> </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-buysellads"></i><span class="unicode"> တင်ဒါများနှင့်ဆိုင်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu unicode">
                      <li><a href="{{url('admin/buy')}}">တင်ဒါများ</a></li>
                      <li><a href="{{url('admin/tender-types')}}">တင်ဒါအမျိုးအစားများ</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-building"></i> <span class="unicode">လုပ်ငန်းများနှင့် ဆိုင်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/company')}}">Company</a> </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-question-circle"></i> <span class="unicode">အမေး၊ အဖြေ</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/help')}}">Help</a> </li>
                      <li><a href="{{url('admin/help-category')}}">Category</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-archive"></i> <span class="unicode">အဖွဲ့ဝင်များနှင့်ဆိုင်သော</span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('admin/packages')}}">package type</a> </li>
                      <li><a href="{{url('admin/members')}}">members</a> </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
<!--                   <li><a><i class="fa fa-bug"></i> Articles <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li> -->


                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <!-- <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{url('')}}/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li> -->
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="clearfix"></div>
        @yield('content')


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('')}}/admin/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{url('')}}/admin/js/bootstrap.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{url('')}}/admin/js/custom.min.js"></script>
    <!-- summernote js -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
    <!-- date time picker -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="{{url('')}}/admin/js/handlebars.js"></script>
    <script src="{{url('')}}/admin/js/datatables.bootstrap.js"></script>

    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>

    <script type="text/javascript">
      $(".form-delete").on("submit",function(){
        return confirm("Are you sure to delete?");
      });
    </script>

    <script>

      $(document).ready(function() {
          $('#summernote,#summernote2').summernote({
                placeholder: 'ဒီမွာေရးပါ ..',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
                    ['genixcms', ['elfinder']],
                    ['view', ['fullscreen']],
                    ['help', ['help','codeview']]
                ],
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
      });
    </script>
    <script>
      $(function() {
        $( "#datepicker,#datepicker2" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd'
        });
      });
    </script>
    <script type="text/javascript">
    @yield('js')
    </script>
  </body>
</html>

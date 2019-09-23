<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FKIP | {{ $headerName }}</title>    
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="/"><img src="images/logo.png" width="32%" height="62%"></a>
        <!-- Sidebar toggle button-->
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        @if(Route::current()->getName() != 'error')
            <span class="header-name">{{ isset($headerName) ? $headerName : '' }}</span>
        @else
            <span class="header-name"></span>
        @endif

        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <span class="nav-name">{{ Auth::user()->name }}</span><i class="fa fa-angle-double-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="Password"><i class="fa fa-key fa-lg"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="locked"><i class="fa fa-lock fa-lg"></i> Lock Screen</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img class="app-sidebar__user-avatar" src="images/{{Auth::user()->profile_img}}" alt="User Image" width="48px">
                <div>
                    <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
                    <small>{{Auth::user()->user_type}}</small>
                </div>
            </div>
            <ul class="app-menu">
                @if(Auth::user()->ugroup == "SIA")
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'Supervisor' ? 'active' : '' }}" href="supervisor">
                            <i class="app-menu__icon fa fa-dashboard"></i>
                            <span class="app-menu__label">Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'release_data' ? 'active' : '' }}" href="release_data">
                            <i class="app-menu__icon fa fa-sticky-note"></i>
                            <span class="app-menu__label">Release Non Audited <br>Unique IDs</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'dump' ? 'active' : '' }}" href="dump">
                            <i class="app-menu__icon fa fa-cloud-download"></i>
                            <span class="app-menu__label">Dump</span>
                        </a>
                    </li>
                    <!-- is-expanded -->
                    <li class="treeview {{ Route::current()->getName() == 'call_blk_upload' || Route::current()->getName() == 'call_assignment' || Route::current()->getName() == 'call_view' || Route::current()->getName() == 'call_view_blank' ? 'is-expanded' : '' }}">
                        <a class="app-menu__item" href="#" data-toggle="treeview">
                            <i class="app-menu__icon fa fa-phone"></i>
                            <span class="app-menu__label">Call</span>
                            <i class="treeview-indicator fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'call_blk_upload' ? 'active' : '' }}" href="call_blk_upload">
                                    <i class="icon fa fa-circle-o"></i> Call Bulk Upload
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'call_assignment' ? 'active' : '' }}" href="call_assignment"  rel="noopener">
                                    <i class="icon fa fa-circle-o"></i> Call Assignment
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'call_view' ? 'active' : '' }}" href="call_view">
                                    <i class="icon fa fa-circle-o"></i> Team View Calls
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'call_view_blank' ? 'active' : '' }}" href="call_view_blank">
                                    <i class="icon fa fa-circle-o"></i> Team View Blank Form
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview {{ Route::current()->getName() == 'email_blk_upload' || Route::current()->getName() == 'email_assignment' || Route::current()->getName() == 'email_view' ? 'is-expanded' : '' }}">
                        <a class="app-menu__item" href="#" data-toggle="treeview">
                            <i class="app-menu__icon fa fa-envelope-o"></i>
                            <span class="app-menu__label">Emails</span>
                            <i class="treeview-indicator fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a class="treeview-item {{ Route::current()->getName() == 'email_blk_upload' ? 'active' : '' }}" href="email_blk_upload"><i class="icon fa fa-circle-o"></i> Emails Bulk Upload</a></li>
                            <li><a class="treeview-item {{ Route::current()->getName() == 'email_assignment' ? 'active' : '' }}" href="email_assignment"><i class="icon fa fa-circle-o"></i> Email Assignment</a></li>
                            <li><a class="treeview-item {{ Route::current()->getName() == 'email_view' ? 'active' : '' }}" href="email_view"><i class="icon fa fa-circle-o"></i> Team View Emails</a></li>
                        </ul>
                    </li>
                    <li class="treeview {{ Route::current()->getName() == 'agent_trending' ||Route::current()->getName() == 'category_wise' ||Route::current()->getName() == 'attribute' ||Route::current()->getName() == 'fatal_report' ||Route::current()->getName() == 'overall_analyst_report' ||Route::current()->getName() == 'agent_evaluation' ? 'is-expanded' : '' }}">
                        <a class="app-menu__item" href="#" data-toggle="treeview">
                            <i class="app-menu__icon fa fa-th-list"></i>
                            <span class="app-menu__label">Reports</span>
                            <i class="treeview-indicator fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'agent_trending' ? 'active' : '' }}" 
                                    href="agent_trending" ><i class="icon fa fa-circle-o"></i> Analyst Trending
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'category_wise' ? 'active' : '' }}" 
                                    href="category_wise">
                                    <i class="icon fa fa-circle-o"></i> Category Trending
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'attribute' ? 'active' : '' }}" href="attribute">
                                    <i class="icon fa fa-circle-o"></i> Attribute Trending
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'fatal_report' ? 'active' : '' }}" href="fatal_report">
                                    <i class="icon fa fa-circle-o"></i> Fatal Report
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'overall_analyst_report' ? 'active' : '' }}" 
                                    href="overall_analyst_report"><i class="icon fa fa-circle-o"></i> Overall Analyst Report
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'agent_evaluation' ? 'active' : '' }}" 
                                    href="agent_evaluation"><i class="icon fa fa-circle-o"></i> Agent Evaluation
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(Auth::user()->ugroup == "A")
                    <li class="treeview {{ Route::current()->getName() == 'agent_registration' || Route::current()->getName() == 'agent_upload' ? 'is-expanded' : '' }}">
                        <a class="app-menu__item" href="#" data-toggle="treeview">
                            <i class="app-menu__icon fa fa-user-secret"></i>
                            <span class="app-menu__label">Agent</span>
                            <i class="treeview-indicator fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'agent_registration' ? 'active' : '' }}" href="agent_registration">
                                    <i class="icon fa fa-circle-o"></i> Agent Registration
                                </a>
                            </li>
                            <li>
                                <a class="treeview-item {{ Route::current()->getName() == 'agent_upload' ? 'active' : '' }}" href="agent_upload"  rel="noopener">
                                    <i class="icon fa fa-circle-o"></i> Agent Upload
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'remove_unique' ? 'active' : '' }}" href="remove_unique">
                            <i class="app-menu__icon fa fa-dashboard"></i>
                            <span class="app-menu__label">Remove Unique IDs </span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'Analyst' ? 'active' : '' }}" href="Evaluator">
                            <i class="app-menu__icon fa fa-home"></i>
                            <span class="app-menu__label">Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::current()->getName() == 'BlankForm' ? 'active' : '' }}" href="BlankForm">
                            <i class="app-menu__icon fa fa-dashboard"></i>
                            <span class="app-menu__label">Blank From</span>
                        </a>
                    </li>
                @endif
            </ul>
        </aside>
        <main class="app-content">
            @yield('content')
        </main>
        <!-- Essential javascripts for application to work-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/plugins/select2.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">
            var curl = '{{ Route::current()->getName()}}';
            $('.date-picker').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
            });
            $('.searchSelect').select2();
            if(curl === 'BlankForm')
                $('.app-sidebar__toggle').click();
            $(document).ready(function() {
                $(".toggle-accordion").on("click", function() {
                    var accordionId = $(this).attr("accordion-id"),
                        numPanelOpen = $(accordionId + ' .collapse.in').length;
                    $(this).toggleClass("active");
                    if (numPanelOpen == 0) {
                        openAllPanels(accordionId);
                    } else {
                        closeAllPanels(accordionId);
                    }
                })
                openAllPanels = function(aId) {
                    console.log("setAllPanelOpen");
                    $(aId + ' .panel-collapse:not(".in")').collapse('show');
                }
                closeAllPanels = function(aId) {
                    console.log("setAllPanelclose");
                    $(aId + ' .panel-collapse.in').collapse('hide');
                }  
                $('.collapse').on('shown.bs.collapse', function(){
                    $(this).parent().find(".fa-chevron-right").removeClass("fa-chevron-right").addClass("fa-chevron-down");
                }).on('hidden.bs.collapse', function(){
                    $(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-right");
                }); 
            });

            /*notification */
                function notify(title,data){
                    if(title.toLowerCase().trim() == 'error'){
                        $.notify({
                            title: "  "+title +": ",
                            message: data,
                            icon: 'fa fa-times' 
                            },{
                            type: "danger"
                        }); 
                        return false;
                    }
                    else{
                        $.notify({
                            title: "  "+title +": ",
                            message: data,
                            icon: 'fa fa-check' 
                            },{
                            type: "info"
                        });
                    }
                    return false;
                }
            /*nofication */

            localStorage.removeItem('on_load_counter');
        </script>
        <!-- Page specific javascripts-->
    </body>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</html>


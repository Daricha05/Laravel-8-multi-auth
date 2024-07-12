<?php
    $descendents = DB::table('descendents')
                    ->where('statut','mineur')
                    ->get();

    $date = Date('Ymd');

    foreach($descendents as $descendent)
    {
        $dateN = str_replace('-','',$descendent->DateN);
        $value = $date - $dateN;
        if($value >= 180000)
        {
            $datasave = [
                'descendent_id' => $descendent->id,
            ];
            $dataUp =[
                'statut' => 'majeur',
            ];
            Db::table('descendents')
                ->where('id',$descendent->id)
                ->update($dataUp);
        
            DB::table('notifications')
                ->insert($datasave);
        }

     
    }

    $notifications = DB::table('notifications')
                        ->where('etat','pas_encore_vue')
                        ->count();


?>

      <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            <img  style="height:75px ;whidth:500px;margin-left:50px;" src="https://www.instat.mg/wp-content/uploads/2019/05/cropped-Logo-INSTAT-05.png" alt="">
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                        <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink">{{ $notifications }}</span>
                                </a>
                                <ul class="show-notification">
                                    
                                    <li>
                                        <a href="{{ route('descendent.dmajeur') }}">
                                        <div class="media">
                                           
                                            <div class="media-body">
                                                @if($notifications == 0)
                                                    <h5 class="notification-user">Rien à afficher</h5>
                                                @elseif($notifications == 1)
                                                    <h5 class="notification-user">{{$notifications }} personne</h5>
                                                    <p class="notification-msg">vient d' avoir 18 ans</p>
                                                @else
                                                    <h5 class="notification-user">{{$notifications }} personnes</h5>
                                                    <p class="notification-msg">viennent d' avoir 18 ans</p>
                                                @endif
                                 
                                            </div>
                                        </div>
                                     </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <i class="ti-layout-sidebar-left"></i>
                                        <a :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Se déconnecter') }}
                                        </a>
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    
                                    <div class="user-details">
                                        <h2>{{ Auth::user()->name }}</h2>
                                        
                                    </div>
                                </div>

                               
                            </div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Accueil</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{ route('dashboard') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de bord</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Gestion de Ménages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="{{ route('ChefM.index') }}">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Chéfs de ménage </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Cotisation.index')}}">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cotisations</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                            </ul>

                           

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Autres</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="icofont icofont-ui-user-group"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Utilisateurs</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content " style="background-image:url('{{asset('assets/images/.jpg')}}')" >              
                                
                        {{ $slot }}

                    </div>
                </div>
            </div>
            </div>
            </div>

  <script type="text/javascript" src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/popper.js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="{{asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="{{asset('assets/js/modernizr/modernizr.js')}}"></script>
  <!-- am chart -->
  <script src="{{asset('assets/pages/widget/amchart/amcharts.min.js')}}"></script>
  <script src="{{asset('assets/pages/widget/amchart/serial.min.js')}}"></script>
  <!-- Todo js -->
  <script type="text/javascript " src="{{asset('assets/pages/todo/todo.js')}} "></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/custom-dashboard.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
  <script type="text/javascript " src="{{asset('assets/js/SmoothScroll.js')}}"></script>
  <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
  <script src="{{asset('assets/js/demo-12.js')}}"></script>
  <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script>
  var $window = $(window);
  var nav = $('.fixed-button');
      $window.scroll(function(){
          if ($window.scrollTop() >= 200) {
           nav.addClass('active');
       }
       else {
           nav.removeClass('active');
       }
   });
  </script>



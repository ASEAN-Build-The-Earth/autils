<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: dash-php/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: dash-php/login.php'); 
    }


    
    $userself = $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>aDashboard | ASEAN BTE</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="dash-public/img/favicon.ico">


    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="dash-css/charts/chartist.css">
    <link rel="stylesheet" href="dash-css/charts/chartist-plugin-tooltip.css">

    <!-- Template -->
    <link rel="stylesheet" href="dash-css/dashboard.css">

    <!-- PYLS -->
    <link rel="stylesheet" href="dash-css/h-self-pyls.css">

    <!-- API CALL -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="api-call-serverinfo/scripts.js"></script>

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
<!-- Header -->
<header class="header bg-body">
    <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
            <!-- Logo For Mobile View -->
            <a class="navbar-brand navbar-brand-mobile" href="/">
                <img class="img-fluid w-100" src="dash-public/img/logo-mini.png" alt="Graindashboard">
            </a>
            <!-- End Logo For Mobile View -->

            <!-- Logo For Desktop View -->
            <a class="navbar-brand navbar-brand-desktop" href="/">
                <img class="side-nav-show-on-closed" src="dash-public/img/logo-mini.png" alt="aDashBoard" style="width: auto; height: 33px;">
                <img class="side-nav-hide-on-closed" src="dash-public/img/logo.png" alt="aDashBoard" style="width: auto; height: 33px;">
            </a>
            <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3">
            <div class="d-flex align-items-center">
                <!-- Side Nav Toggle -->
                <a  class="js-side-nav header-invoker d-flex mr-md-2" href="#"
                    data-close-invoker="#sidebarClose"
                    data-target="#sidebar"
                    data-target-wrapper="body">
                    <i class="gd-align-left"></i>
                </a>
                <!-- End Side Nav Toggle -->

                <!-- User Notifications -->
                <div class="dropdown ml-auto">
                    <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <span class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span>
                        <i class="gd-bell"></i>
                    </a>

                    <div id="notifications" class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden" aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-bottom py-3">
                                <h5 class="mb-0">Notifications</h5>
                                <a class="link small ml-auto" href="#"></a></a>
                            </div>

                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10000</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#">inspect</a>
                                    </div>
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10001</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#">inspect</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End User Notifications -->
                <!-- User Avatar -->
                <div class="dropdown mx-3 dropdown ml-2">
                    <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                        <?php if (isset($_SESSION['username'])) : ?>

                        <img class="avatar rounded-circle mr-md-2" src="dash-public/img/aseanlogo.png" alt="self_profile_profilepic.png">
                        <span class="d-none d-md-block"><?php echo $_SESSION['username']; ?></span>
                        <i class="gd-angle-down d-none d-md-block ml-2"></i>
                    </a>

                    <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                    <li class="unfold-item">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="gd-user"></i>
                    </span>
                                Upload Profile Picture⠀
                            </a>
                        </li>    
                        <li class="unfold-item">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="index.php?logout='1'">
                    <span class="unfold-item-icon mr-3">
                      <i class="gd-power-off"></i>
                    </span>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif ?>
                <!-- End User Avatar -->
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->

<main class="main">
    <!-- Sidebar Nav -->
    <aside id="sidebar" class="js-custom-scroll side-nav">
        <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
            <!-- Title -->
            <li class="sidebar-heading h6">aDashboard</li>
            <!-- End Title -->

            <!-- Dashboard -->
            <li class="side-nav-menu-item active">
                <a class="side-nav-menu-link media align-items-center" href="/">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-dashboard"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Overall</span>
                </a>
            </li>
            <!-- End Dashboard -->

            <!-- Documentation -->
            <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="https://adashboard.ga/phpmyadmin" target="_blank">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-file"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Admin Panel</span>
                </a>
            </li>
            <!-- End Documentation -->

            <!-- Title -->
            <li class="sidebar-heading h6">aUtils</li>
            <!-- End Title -->

            <!-- Users -->
            <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subUsers">
                  <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-user"></i>
                  </span>
                    <span class="side-nav-fadeout-on-closed media-body">aAccount</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Users: subUsers -->
                <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="users.html">Profile</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="user-edit.html">All Users Profiles</a>
                    </li>
                </ul>
                <!-- End Users: subUsers -->
            </li>
            <!-- End Users -->

            <!-- Authentication -->
            <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subPages">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-lock"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">aMenu</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Pages: subPages -->
                <ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="login.html">Submit Your Warps</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="register.html">Warps Databases</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="password-reset.html">Configuration</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="password-reset-2.html">Patch Notes</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="email-verification.html">Requests</a>
                    </li>
                </ul>
                <!-- End Pages: subPages -->
            </li>
            <!-- End Authentication -->

            <!-- Settings -->
            <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="settings.html">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-settings"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">aCommands</span>
                </a>
            </li>
            <!-- End Settings -->

            <!-- Static -->
            <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="static-non-auth.html">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-file"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">About aUtils</span>
                </a>
            </li>
            <!-- End Static -->

        </ul>
    </aside>
    <!-- End Sidebar Nav -->

    <div class="content">
        <div class="py-4 px-3 px-md-4">
            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0">Dashboard Overall</div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header d-flex">
                            <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">Profile Overall</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="media align-items-center px-3 px-md-4 mb-3 mb-md-4">
                                <div class="media-body">
                                    <h4 class="h3 lh-1 mb-2"><?php echo $userself?></h4>
                                    <p class="small text-muted mb-0">           
                                        <span class="text-success mx-1">placeholder</span>
                                    </p>
                                </div>
                            </div>

                            <div class="js-area-chart chart--points-invisible chart--labels-hidden position-relative"
                                 data-series='[
                             [
                               {"meta":"Items","value":"700"},
                               {"meta":"Items","value":"520"},
                               {"meta":"Items","value":"470"},
                               {"meta":"Items","value":"580"},
                               {"meta":"Items","value":"380"},
                               {"meta":"Items","value":"600"},
                               {"meta":"Items","value":"707"},
                               {"meta":"Items","value":"400"},
                               {"meta":"Items","value":"301"},
                               {"meta":"Items","value":"530"},
                               {"meta":"Items","value":"600"},
                               {"meta":"Items","value":"403"},
                               {"meta":"Items","value":"550"},
                               {"meta":"Items","value":"400"},
                               {"meta":"Items","value":"300"},
                               {"meta":"Items","value":"700"},
                               {"meta":"Items","value":"630"}
                             ]
                           ]'
                                 data-height="115"
                                 data-high="1000"
                                 data-chart-padding='{"top": 5}'
                                 data-is-hide-area="true"
                                 data-line-colors='["#8069f2"]'
                                 data-line-dasharrays='[0,0]'
                                 data-line-width='["2px","2px"]'
                                 data-is-line-smooth='[false]'
                                 data-fill-opacity="1"
                                 data-fill-colors='["#8069f2"]'
                                 data-stroke-dash-array-axis-y="4"
                                 data-is-show-tooltips="true"
                                 data-tooltip-custom-class="chart-tooltip chart-tooltip--sections-blocked chart-tooltip__meta--text-muted small text-white text-nowrap p-2"
                                 data-tooltip-currency="In Stock "
                                 data-is-show-points="true"
                                 data-point-custom-class='chart__point--donut chart__point--border-xs border-primary rounded-circle'
                                 data-point-dimensions='{"width":15,"height":15}'></div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header d-flex">
                            <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">General</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="media align-items-center px-3 px-md-4 mb-3 mb-md-4">
                                <div class="media-body">
                                    <h4 class="h3 lh-1 mb-2">$6,926.32</h4>
                                    <p class="small text-muted mb-0">
                                        +$570.5 <span class="text-success mx-1">+2.31%</span> This Month
                                    </p>
                                </div>
                            </div>

                            <div class="js-area-chart chart chart--axis-x chart--points-invisible position-relative chart--labels-hidden"
                                 data-series='[
                             [
                               {"meta":"Orders","value":"40"},
                               {"meta":"Orders","value":"42"},
                               {"meta":"Orders","value":"45"},
                               {"meta":"Orders","value":"80"},
                               {"meta":"Orders","value":"70"},
                               {"meta":"Orders","value":"70"},
                               {"meta":"Orders","value":"40"},
                               {"meta":"Orders","value":"20"},
                               {"meta":"Orders","value":"20"},
                               {"meta":"Orders","value":"35"},
                               {"meta":"Orders","value":"35"},
                               {"meta":"Orders","value":"32"},
                               {"meta":"Orders","value":"32"},
                               {"meta":"Orders","value":"35"},
                               {"meta":"Orders","value":"40"},
                               {"meta":"Orders","value":"50"},
                               {"meta":"Orders","value":"50"},
                               {"meta":"Orders","value":"80"},
                               {"meta":"Orders","value":"80"},
                               {"meta":"Orders","value":"90"},
                               {"meta":"Orders","value":"90"},
                               {"meta":"Orders","value":"100"},
                               {"meta":"Orders","value":"100"},
                               {"meta":"Orders","value":"80"},
                               {"meta":"Orders","value":"80"}
                             ]
                           ]'
                                 data-height="115"
                                 data-high="115"
                                 data-is-line-smooth='[false]'
                                 data-line-width='["1px"]'
                                 data-line-colors='["#8069f2"]'
                                 data-fill-opacity=".3"
                                 data-is-fill-colors-gradient="true"
                                 data-fill-colors='[
                             ["rgba(128,105,242,.7)","rgba(255,255,255,.6)"]
                           ]'
                                 data-is-show-tooltips="true"
                                 data-is-tooltips-append-to-body="true"
                                 data-tooltip-custom-class="chart-tooltip chart-tooltip--sections-blocked chart-tooltip__meta--text-muted small text-white p-2"
                                 data-tooltip-currency="Qty "
                                 data-is-show-points="true"
                                 data-point-custom-class='chart__point--donut chart__point--border-xxs border-primary rounded-circle'
                                 data-point-dimensions='{"width":8,"height":8}'></div>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header d-flex">
                            <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">ASEAN BTE Server</h5>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="h2 lh-1 mb-2 sv-ip"></h4>

                            <p class="mb-3 mb-md-4">42.188.151.18</p>

                            <div class="d-flex align-items-center">
                                <div>
                                    <strong class="d-block mb-3 sv-status"></strong>

                                    <div class="d-flex align-items-center text-muted mb-2">
                                        <span class="mr-2 sv-runon"></span>
                                    </div>

                                    <div class="d-flex align-items-center text-muted">
                                        <span class="mr-2 sv-location"></span>
                                    </div>
                                </div>              
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                    <!-- Widget -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                            <i class="icon-text d-inline-block text-primary"><img src="dash-public/ico-mc-grassblock.png" alt="today" width="32px" height="32px"></i>
                        </div>
                        <div>
                            <h4 class="lh-1 mb-1">Blocks Built (Today)</h4>
                            <h6 class="mb-0">Conversion Rate</h6>
                        </div>
                        <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                    </div>
                    <!-- End Widget -->
                </div>

                <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                    <!-- Widget -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                            <i class="icon-text d-inline-block text-primary"><img src="dash-public/ico-mc-woodplanks.gif" alt="thismonth" width="32px" height="32px"></i>
                        </div>
                        <div>
                            <h4 class="lh-1 mb-1">Blocks Built (2021)</h4>
                            <h6 class="mb-0">Total Sales</h6>
                        </div>
                        <i class="gd-arrow-down icon-text d-flex text-danger ml-auto"></i>
                    </div>
                    <!-- End Widget -->
                </div>

                <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                    <!-- Widget -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                            <i class="icon-text d-inline-block text-primary"><img src="dash-public/ico-mc-goldblock.png" alt="thismonth" width="32px" height="32px"></i>
                        </div>
                        <div>
                            <h4 class="lh-1 mb-1">Blocks Built (Event)</h4>
                            <h6 class="mb-0">Net Revenue</h6>
                        </div>
                        <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                    </div>
                    <!-- End Widget -->
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card mb-3 mb-md-4">
                        <div class="card-header border-bottom p-0">
                            <ul id="wallets" class="nav nav-v2 nav-primary nav-justified d-block d-xl-flex w-100" role="tablist">
                                <li class="nav-item border-bottom border-xl-bottom-0">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4 active" href="#bitcoin" role="tab" aria-selected="true"
                                       data-toggle="tab">
                                        <span>PLAYERS ONLINE :</span>
                                        <small class="text-muted ml-auto sv-serverplayers"></small>
                                    </a>
                                </li>
                                <li class="nav-item border-bottom border-xl-bottom-0 border-xl-left">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#bitcoinCash" role="tab" aria-selected="false"
                                       data-toggle="tab">
                                        <span>SERVER STATUS :</span>
                                        <small class="text-muted ml-auto">asean.my.to</small>
                                    </a>
                                </li>
                                <li class="nav-item border-bottom border-xl-bottom-0 border-xl-left">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#etherium" role="tab" aria-selected="false"
                                       data-toggle="tab">
                                        <span>aUtils STATUS :</span>
                                        <small class="text-muted ml-auto">$19,234.23</small>
                                    </a>
                                </li>
                                <li class="nav-item border-xl-left">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 p-xl-4" href="#litecoin" role="tab" aria-selected="false"
                                       data-toggle="tab">
                                        <span>OVERALL STATUS :</span>
                                        <small class="text-muted ml-auto">$23,844.44</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="walletsContent" class="card-body tab-content">
                            <div class="tab-pane fade show active" id="bitcoin" role="tabpanel">
                                <div class="row text-center">
                                    <div class="col-6 col-md-4 mb-3 mb-md-0">
                                        <div class="h3 mb-0 sv-onlineplayers"></div>
                                        <small class="text-muted">PLAYERS ONLINE</small>
                                    </div>

                                    <div class="col-6 col-md-4 mb-3 mb-md-0 border-left">
                                        <div class="h3 mb-0 sv-maxplayers"></div>
                                        <small class="text-muted">PLAYERS MAX</small>
                                    </div>

                                    <div class="col-12 col-md-4 border-left">
                                        <div class="h3 mb-0">3</div>
                                        <small class="text-muted">aUtils ADMIN ONLINE</small>
                                    </div>
                                </div>

                                <div class="position-relative mh-15_6 safari-overflow-hidden pt-4 pt-md-5 pb-1">
                                <ul id="parent">
                                    <li><img class="svplayer_0profile" align="left"><h5 class="text-muted svplayer_0name">⠀</h5></li>
                                    <li><img class="svplayer_1profile" align="left"><h5 class="text-muted svplayer_1name">⠀</h5></li>
                                    <li><img class="svplayer_2profile" align="left"><h5 class="text-muted svplayer_2name">⠀</h5></li>
                                    <li><img class="svplayer_3profile" align="left"><h5 class="text-muted svplayer_3name">⠀</h5></li>
                                    <li><img class="svplayer_4profile" align="left"><h5 class="text-muted svplayer_4name">⠀</h5></li>
                                </ul>
                                <ul id="parent">
                                    <li><img class="svplayer_5profile" align="left"><h5 class="text-muted svplayer_5name">⠀</h5></li>
                                    <li><img class="svplayer_6profile" align="left"><h5 class="text-muted svplayer_6name">⠀</h5></li>
                                    <li><img class="svplayer_7profile" align="left"><h5 class="text-muted svplayer_7name">⠀</h5></li>
                                    <li><img class="svplayer_8profile" align="left"><h5 class="text-muted svplayer_8name">⠀</h5></li>
                                    <li><img class="svplayer_9profile" align="left"><h5 class="text-muted svplayer_9name">⠀</h5></li>
                                </ul>
                                <ul id="parent">
                                    <li><img class="svplayer_10profile" align="left"><h5 class="text-muted svplayer_10name">⠀</h5></li>
                                    <li><img class="svplayer_11profile" align="left"><h5 class="text-muted svplayer_11name">⠀</h5></li>
                                    <li><img class="svplayer_12profile" align="left"><h5 class="text-muted svplayer_12name">⠀</h5></li>
                                    <li><img class="svplayer_13profile" align="left"><h5 class="text-muted svplayer_13name">⠀</h5></li>
                                    <li><img class="svplayer_14profile" align="left"><h5 class="text-muted svplayer_14name">⠀</h5></li>
                                </ul>
                                <ul id="parent">
                                    <li><img class="svplayer_15profile" align="left"><h5 class="text-muted svplayer_15name">⠀</h5></li>
                                    <li><img class="svplayer_16profile" align="left"><h5 class="text-muted svplayer_16name">⠀</h5></li>
                                    <li><img class="svplayer_17profile" align="left"><h5 class="text-muted svplayer_17name">⠀</h5></li>
                                    <li><img class="svplayer_18profile" align="left"><h5 class="text-muted svplayer_18name">⠀</h5></li>
                                    <li><img class="svplayer_19profile" align="left"><h5 class="text-muted svplayer_19 name">⠀</h5></li>
                                </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bitcoinCash" role="tabpanel">
                                <div class="row text-center">
                                    <div class="col-6 col-md-4 mb-3 mb-md-0">
                                        <div class="h3 mb-0 sv-isonline text-success"></div>
                                        <small class="text-muted">Server Status</small>
                                    </div>

                                    <div class="col-6 col-md-4 mb-3 mb-md-0 border-left">
                                        <div class="h3 mb-0 sv-serverplayers"></div>
                                        <small class="text-muted">Total Players</small>
                                    </div>

                                    <div class="col-12 col-md-4 border-left">
                                        <div class="h3 mb-0">999 ms</div>
                                        <small class="text-muted">Server Ping</small>
                                    </div>
                                </div>

                                <div class="position-relative mh-15_6 safari-overflow-hidden pt-4 pt-md-5 pb-1"> 
                                    <h4 class=text-muted><strong>IP:</strong>⠀asean.my.to:25565⠀(42.188.151.18:25565)⠀|⠀<strong>Operated On:</strong> Mohist 1.12.2-R0.1-SNAPSHOT⠀|⠀<strong>Map:</strong> TerraPreGenerated</h4>
                                    <h4 class=text-muted><strong>Server Protocol:</strong>⠀340⠀|⠀<strong>Version:</strong> 1.12.2⠀|⠀<strong>MOTD:</strong> A BTE server</h4>
                                    <br>
                                    <h5 class=text-muted><strong>Plugins:</strong>⠀aCommands, AdvancedBan, BannerMaker, BKCommonLib, ChatManager, CommandPanels, CoreProtect, DiscordSRV, Essentials, ExtraContexts, HeadDatabase, LightCleaner, LuckPerms, PlaceholderAPI, ProtocolLib, TAB, Vault, VoxelSniper, WorldEdit, WorldGuard, WorldGuardExtraFlags</h5>
                                    <h5 class=text-muted><strong>Mods:</strong>⠀cubicchunks, cubicchunkscore, cubicgen, FML, forge, mcp, minecraft, mohist, terramap, terraplusplus</h5>                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="etherium" role="tabpanel">
                                <div class="row text-center">
                                    <div class="col-6 col-md-4 mb-3 mb-md-0">
                                        <div class="h3 mb-0 text-success">Operating...</div>
                                        <small class="text-muted">aMenu</small>
                                    </div>

                                    <div class="col-6 col-md-4 mb-3 mb-md-0 border-left">
                                        <div class="h3 mb-0 text-success">Operating...</div>
                                        <small class="text-muted">aCommands</small>
                                    </div>

                                    <div class="col-12 col-md-4 border-left">
                                        <div class="h3 mb-0 text-success">Operating...</div>
                                        <small class="text-muted">aDashBoard</small>
                                    </div>
                                </div>

                                <div class="position-relative mh-15_6 safari-overflow-hidden pt-4 pt-md-5 pb-1">
                                    <h4 class=text-muted><strong>aMenu:</strong></h4>
                                    <h5 class=text-muted><strong>Status: </strong>Operated | <strong>Version: </strong>3.0.2R | <strong>ADMIN: </strong> StoneMCYT</h5>
                                    <h4 class=text-muted><strong>aCommands:</strong></h4>
                                    <h5 class=text-muted>Status: Online</h5>
                                    <h4 class=text-muted><strong>aDashBoard:</strong></h4>
                                    <h5 class=text-muted>Status: Online</h5>
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="litecoin" role="tabpanel">
                                <div class="row text-center mb-4 mb-md-5">
                                    <div class="col-6 col-md-4 mb-3 mb-md-0">
                                        <div class="h3 mb-0">
                                            $23,844<sup class="h5">.44</sup>
                                        </div>
                                        <small class="text-muted">Total Sales</small>
                                    </div>

                                    <div class="col-6 col-md-4 mb-3 mb-md-0 border-left">
                                        <div class="h3 mb-0">
                                            <span class="text-success">+</span>$952<sup class="h5">.43</sup>
                                        </div>
                                        <small class="text-muted">Today Sales (USD)</small>
                                    </div>

                                    <div class="col-12 col-md-4 border-left">
                                        <div class="h3 mb-0">
                                            <span class="text-success">+</span>10.25<sup class="h5">%</sup>
                                        </div>
                                        <small class="text-muted">Net Profit (%)</small>
                                    </div>
                                </div>

                                <div class="js-area-chart chart chart--axis-x--nowrap chart--points-invisible position-relative mh-15_6 safari-overflow-hidden pt-4 pt-md-5 pb-1"
                                     data-series='[
                           [
                             {"meta":"6/01/2019 9:00 PM","value":"2100"},
                             {"meta":"6/02/2019 9:00 PM","value":"2200"},
                             {"meta":"6/03/2019 9:00 PM","value":"2300"},
                             {"meta":"6/04/2019 9:00 PM","value":"1900"},
                             {"meta":"6/05/2019 9:00 PM","value":"1850"},
                             {"meta":"6/06/2019 9:00 PM","value":"2150"},
                             {"meta":"6/07/2019 9:00 PM","value":"2200"},
                             {"meta":"6/08/2019 9:00 PM","value":"2250"},
                             {"meta":"6/09/2019 9:00 PM","value":"2800"},
                             {"meta":"6/10/2019 9:00 PM","value":"2900"},
                             {"meta":"6/11/2019 9:00 PM","value":"3000"},
                             {"meta":"6/12/2019 9:00 PM","value":"2500"},
                             {"meta":"6/13/2019 9:00 PM","value":"2550"},
                             {"meta":"6/14/2019 9:00 PM","value":"2600"},
                             {"meta":"6/15/2019 9:00 PM","value":"2700"},
                             {"meta":"6/16/2019 9:00 PM","value":"2800"},
                             {"meta":"6/17/2019 9:00 PM","value":"2950"},
                             {"meta":"6/18/2019 9:00 PM","value":"3200"},
                             {"meta":"6/19/2019 9:00 PM","value":"3100"},
                             {"meta":"6/20/2019 9:00 PM","value":"2700"},
                             {"meta":"6/21/2019 9:00 PM","value":"3300"},
                             {"meta":"6/22/2019 9:00 PM","value":"3350"},
                             {"meta":"6/23/2019 9:00 PM","value":"3400"},
                             {"meta":"6/24/2019 9:00 PM","value":"3450"},
                             {"meta":"6/25/2019 9:00 PM","value":"3200"},
                             {"meta":"6/26/2019 9:00 PM","value":"3350"},
                             {"meta":"6/27/2019 9:00 PM","value":"3450"},
                             {"meta":"6/28/2019 9:00 PM","value":"3600"},
                             {"meta":"6/29/2019 9:00 PM","value":"3650"},
                             {"meta":"6/30/2019 9:00 PM","value":"3700"}
                           ]
                         ]'
                                     data-labels='["June 01","June 02","June 03","June 04","June 05","June 06","June 07","June 08","June 09","June 10","June 11","June 12","June 13","June 14","June 15","June 16","June 17","June 18","June 19","June 20","June 21","June 22","June 23","June 24","June 25","June 26","June 27","June 28","June 29","June 30"]'
                                     data-labels-qty="6"
                                     data-labels-start-from="1"
                                     data-prefix="$"
                                     data-height="250"
                                     data-mobile-height="75"
                                     data-high="4000"
                                     data-low="1000"
                                     data-offset-x="30"
                                     data-offset-y="60"
                                     data-is-line-smooth='[false]'
                                     data-line-width='["1px"]'
                                     data-line-colors='["#8069f2"]'
                                     data-fill-opacity="1"
                                     data-fill-colors='["#ecebfa"]'
                                     data-text-size-x="14px"
                                     data-text-color-x="#4a4e69"
                                     data-text-offset-top-x="10"
                                     data-text-align-axis-x="center"
                                     data-text-size-y="14px"
                                     data-text-color-y="#868e96"
                                     data-is-show-tooltips="true"
                                     data-is-tooltip-divided="true"
                                     data-tooltip-custom-class="chart-tooltip--divided chart-tooltip__value--bg-black chart-tooltip__meta--bg-primary small text-white"
                                     data-tooltip-currency="USD "
                                     data-is-show-points="true"
                                     data-point-custom-class='chart__point--donut chart__point--has-line-helper chart__point--border-xxs border-primary rounded-circle'
                                     data-point-dimensions='{"width":8,"height":8}'></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header d-flex">
                            <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">aMenu</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="border-bottom p-3 p-md-4 mt-3 pb-md-6">
                                <div class="js-bar-chart position-relative" style="height: 160px;"
                                     data-series="[
                               [160,160,160,160,160,160,160,160,160,160,160,160],
                               [92,97,124,137,97,124,46,97,90,97,111,90],
                               [69,47,69,53,45,94,34,31,68,73,83,68]
                             ]"
                                     data-height="160"
                                     data-high="160"
                                     data-low="0"
                                     data-distance="20"
                                     data-stroke-width="5"
                                     data-stroke-color='["#e0f6fc","#a0eee7","#8069f2"]'
                                     data-is-stack-bars="true"
                                     data-is-show-axis-x="false"
                                     data-is-show-axis-y="false"
                                     data-is-show-label-axis-x="false"
                                     data-is-show-label-axis-y="false"
                                     data-is-stroke-rounded="true"
                                     data-is-show-tooltips="true"
                                     data-postfix="%"
                                     data-tooltip-custom-class="chart-tooltip chart-tooltip--black small text-white px-2 py-1"></div>
                            </div>

                            <div class="border-bottom media align-items-center p-3">
                                <div class="media-body d-flex align-items-center mr-2">
                                    <span>Expenses</span>
                                    <span class="ml-auto">$393.15</span>
                                </div>

                                <i class="gd-arrow-down icon-text icon-text-xs d-flex text-danger ml-auto"></i>
                            </div>

                            <div class="media align-items-center p-3">
                                <div class="media-body d-flex align-items-center mr-2">
                                    <span>Profit</span>
                                    <span class="ml-auto">$7,040.87</span>
                                </div>

                                <i class="gd-arrow-up icon-text icon-text-xs d-flex text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header d-flex">
                            <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">aCommands</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="border-bottom text-center p-3 p-md-4 pb-md-6">
                                <div class="js-donut-chart position-relative d-flex mx-auto mb-3 mb-md-4" style="width: 130px; height: 130px;"
                                     data-series="[65,35]"
                                     data-border-width="12"
                                     data-slice-margin="2"
                                     data-start-angle="0"
                                     data-fill-colors='["#8069f2","#0cdcB9"]'
                                     data-is-show-tooltips="true"
                                     data-tooltip-currency="%"
                                     data-is-tooltip-currency-reverse="true"
                                     data-tooltip-custom-class="chart-tooltip chart-tooltip--triangle-right chart-tooltip--black small text-white px-2 py-1 mt-5 ml-n5"></div>

                                <div class="small text-muted">Total Balance ≈ 32,754.56 USD</div>
                            </div>

                            <div class="border-bottom media align-items-center p-3">
                                <div class="media-body d-flex align-items-center mr-2">
                                    <span>Cash</span>
                                    <span class="ml-auto">$13,380.25</span>
                                </div>

                                <i class="gd-arrow-up icon-text icon-text-xs d-flex text-success ml-auto"></i>
                            </div>

                            <div class="media align-items-center p-3">
                                <div class="media-body d-flex align-items-center mr-2">
                                    <span>Bank Account</span>
                                    <span class="ml-auto">$19,432.80</span>
                                </div>

                                <i class="gd-arrow-up icon-text icon-text-xs d-flex text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-lg-6 col-xl-4 mb-3 mb-lg-4">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="h6 text-uppercase font-weight-semi-bold mb-0">aDashBoard</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="border-top p-3 px-md-4 mx-0">
                                <div class="row justify-content-between small mb-2">
                                    <div class="col">
                                        <span class="text-primary mr-3">TOK</span>

                                        <span class="mr-1">$3,320.98</span>
                                        <i class="gd-arrow-left text-success mr-3"></i>
                                    </div>

                                    <div class="col-auto text-muted">
                                        3h ago
                                    </div>
                                </div>

                                Balance update
                            </div>
                            <div class="border-top p-3 px-md-4 mx-0">
                                <div class="row justify-content-between small mb-2">
                                    <div class="col">
                                        <span class="text-primary mr-3">NYC</span>

                                        <span class="mr-1">$4,320.98</span>
                                        <i class="gd-arrow-left text-success mr-3"></i>
                                    </div>

                                    <div class="col-auto text-muted">
                                        5h ago
                                    </div>
                                </div>

                                Balance update
                            </div>
                            <div class="border-top p-3 px-md-4 mx-0">
                                <div class="row justify-content-between small mb-2">
                                    <div class="col">
                                        <span class="text-primary mr-3">NYC</span>

                                        <span class="mr-1">$3,320.98</span>
                                        <i class="gd-arrow-right text-danger mr-3"></i>
                                    </div>

                                    <div class="col-auto text-muted">
                                        7h ago
                                    </div>
                                </div>
                                Marketing Expenses
                            </div>
                            <div class="border-top p-3 px-md-4 mx-0">
                                <div class="row justify-content-between small mb-2">
                                    <div class="col">
                                        <span class="text-primary mr-3">NYC</span>

                                        <span class="mr-1">$1,320.98</span>
                                        <i class="gd-arrow-left text-success mr-3"></i>
                                    </div>

                                    <div class="col-auto text-muted">
                                        12h ago
                                    </div>
                                </div>

                                Balance update
                            </div>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div>
                            <h5 class="lh-1 mb-0">Orers</h5>
                            <small>125 (+5)</small>
                        </div>
                        <div class="js-area-chart chart--points-invisible chart--labels-hidden py-1 ml-auto"
                             data-series='[
                           [
                            {"value":"25"},
                            {"value":"35"},
                            {"value":"10"},
                            {"value":"40"},
                            {"value":"20"}
                           ]
                         ]'
                             data-width="100"
                             data-height="40"
                             data-high="40"
                             data-is-line-smooth='["simple"]'
                             data-line-width='["1px"]'
                             data-line-colors='["#0cdcB9"]'
                             data-fill-opacity=".3"
                             data-is-fill-colors-gradient="true"
                             data-fill-colors='[
                           ["rgba(28,240,221,.6)","rgba(255,255,255,.6)"]
                         ]'
                             data-is-show-tooltips="true"
                             data-is-tooltips-append-to-body="true"
                             data-tooltip-custom-class="chart-tooltip chart-tooltip--none-triangle d-flex align-items-center small text-white p-2 mt-5 ml-5"
                             data-tooltip-badge-markup='<span class="indicator indicator-sm bg-secondary rounded-circle mr-1"></span>'
                             data-is-show-points="true"
                             data-point-custom-class='chart__point--hidden'
                             data-point-dimensions='{"width":8,"height":8}'></div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div>
                            <h5 class="lh-1 mb-0">Visitors</h5>
                            <small>1,450 (+325)</small>
                        </div>
                        <div class="js-area-chart chart--points-invisible chart--labels-hidden py-2 ml-auto"
                             data-series='[
                           [
                             {"value":"40"},
                             {"value":"40"},
                             {"value":"40"},
                             {"value":"25"},
                             {"value":"30"},
                             {"value":"35"},
                             {"value":"50"},
                             {"value":"35"},
                             {"value":"35"},
                             {"value":"35"},
                             {"value":"30"},
                             {"value":"30"},
                             {"value":"40"},
                             {"value":"35"},
                             {"value":"35"},
                             {"value":"55"},
                             {"value":"50"},
                             {"value":"45"},
                             {"value":"60"},
                             {"value":"70"},
                             {"value":"80"}
                           ]
                         ]'
                             data-width="100"
                             data-height="40"
                             data-high="100"
                             data-is-line-smooth='[false]'
                             data-line-width='["1px"]'
                             data-line-colors='["#8069f2"]'
                             data-fill-opacity=".3"
                             data-is-fill-colors-gradient="true"
                             data-fill-colors='[
                           ["rgba(128,105,242,.7)","rgba(255,255,255,.6)"]
                         ]'
                             data-is-show-tooltips="true"
                             data-is-tooltips-append-to-body="true"
                             data-tooltip-custom-class="chart-tooltip chart-tooltip--none-triangle d-flex align-items-center small text-white p-2 mt-5 ml-5"
                             data-tooltip-badge-markup='<span class="indicator indicator-sm bg-primary rounded-circle mr-1"></span>'
                             data-is-show-points="true"
                             data-point-custom-class='chart__point--hidden'
                             data-point-dimensions='{"width":8,"height":8}'></div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-xl-4 mb-3 mb-md-4">
                    <!-- Card -->
                    <div class="card flex-row align-items-center p-3 p-md-4">
                        <div>
                            <h5 class="lh-1 mb-0">Customers</h5>
                            <small>320 (+20)</small>
                        </div>
                        <div class="js-area-chart chart--points-invisible chart--labels-hidden py-2 ml-auto"
                             data-series='[
                           [
                             {"value":"35"},
                             {"value":"20"},
                             {"value":"10"},
                             {"value":"20"},
                             {"value":"20"},
                             {"value":"0"},
                             {"value":"10"},
                             {"value":"0"},
                             {"value":"10"},
                             {"value":"10"},
                             {"value":"15"},
                             {"value":"35"},
                             {"value":"15"},
                             {"value":"20"},
                             {"value":"35"},
                             {"value":"35"},
                             {"value":"40"},
                             {"value":"42"}
                           ]
                         ]'
                             data-is-hide-area="true"
                             data-width="123"
                             data-height="42"
                             data-high="42"
                             data-is-line-smooth='[false]'
                             data-line-width='["2px"]'
                             data-line-colors='["#8069f2"]'
                             data-is-show-tooltips="true"
                             data-is-tooltips-append-to-body="true"
                             data-tooltip-custom-class="chart-tooltip chart-tooltip--none-triangle d-flex align-items-center small text-white p-2 mt-5 ml-5"
                             data-tooltip-badge-markup='<span class="indicator indicator-sm bg-primary rounded-circle mr-1"></span>'
                             data-is-show-points="true"
                             data-point-custom-class='chart__point--hidden'
                             data-point-dimensions='{"width":8,"height":8}'></div>
                    </div>
                    <!-- End Card -->
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-3 mb-md-4">
                        <div class="card-header">
                            <h5 class="font-weight-semi-bold mb-0">LOG</h5>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive-xl">
                                <table class="table text-nowrap mb-0">
                                    <thead>
                                    <tr>
                                        <th class="font-weight-semi-bold border-top-0 py-2">DATE</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">OBJECTS</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">ACTIONS</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">TYPE</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">SUBTYPE</th>
                                        <th class="font-weight-semi-bold border-top-0 py-2">LOG ID</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="py-3">unknown</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown16Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown16" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown16" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown16" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown16Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">unknown</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-success">Fulfilled</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown15Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown15" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown15" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown15" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown15Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">unknown</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown14Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown14" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown14" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown14" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown14Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">unknown</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-danger">Cancelled</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown13Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown13" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown13" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown13" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown13Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">unknown</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-success">Fulfilled</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown12Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown12" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown12" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown12" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown12Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">149531</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-light">Draft</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown11Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown11" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown11" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown11" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown11Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">149531</td>
                                        <td class="py-3">
                                            <div>John Doe</div>
                                            <div class="text-muted">Acme Inc.</div>
                                        </td>
                                        <td class="py-3">(000) 111-1234</td>
                                        <td class="py-3">$1,230.00</td>
                                        <td class="py-3">
                                            <span class="badge badge-pill badge-success">Fulfilled</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="position-relative">
                                                <a id="dropDown10Invoker" class="link-dark d-flex" href="#" aria-controls="dropDown10" aria-haspopup="true" aria-expanded="false" data-unfold-target="#dropDown10" data-unfold-event="click" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                                                    <i class="gd-more-alt icon-text"></i>
                                                </a>

                                                <ul id="dropDown10" class="unfold unfold-light unfold-top unfold-right position-absolute py-3 mt-1 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="dropDown10Invoker" style="min-width: 150px; animation-duration: 300ms; right: 0px;">
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-pencil unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="unfold-item">
                                                        <a class="unfold-link media align-items-center text-nowrap" href="#">
                                                            <i class="gd-close unfold-item-icon mr-3"></i>
                                                            <span class="media-body">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto">
            <div class="row justify-content-between">
                <div class="col-lg text-center text-lg-right">
                    &copy; 2021 ASEAN BTE aUtils | aDashboard All Rights Reserved.
                    <br>
                    Website & Databases Powered CookieGMVN#9173
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</main>


<script src="dash-javascripts/aDashBoard.js"></script>
<script src="dash-javascripts/aDashBoard.vendor.js"></script>

<!-- DEMO CHARTS -->
<script src="dash-javascripts/resizeSensor.js"></script>
<script src="dash-javascripts/chartist.js"></script>
<script src="dash-javascripts/chartist-plugin-tooltip.js"></script>
<script src="dash-javascripts/gd.chartist-area.js"></script>
<script src="dash-javascripts/gd.chartist-bar.js"></script>
<script src="dash-javascripts/gd.chartist-donut.js"></script>
<script>
    $.GDCore.components.GDChartistArea.init('.js-area-chart');
    $.GDCore.components.GDChartistBar.init('.js-bar-chart');
    $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
</script>
</body>
</html>
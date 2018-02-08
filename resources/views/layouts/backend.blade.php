<!DOCTYPE html>
<html>

<head>

    <title>BITROSEED | {{ $title }}</title>

    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">

    <meta content="BITROSEED" name="keywords">
    <meta content="BITROSEED" name="author">
    <meta content="BITROSEED, Peer to Peer Donations" name="description">

    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset( 'images/favicon/apple-touch-icon.png' ) }}">
    <link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-32x32.png' ) }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-16x16.png' ) }}" sizes="16x16">
    
    <link href="{{ asset( 'css/select2.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset( 'css/dataTables.bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset( 'css/perfect-scrollbar.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset( 'css/backend.css' ) }}" rel="stylesheet">

    <style type="text/css">
        

        select.form-control:not([size]):not([multiple]) {
            padding: 6px;
        }

        .yellow {
            background: #FFFF00 ;
        }

    </style>

</head>

<body>


    <div class="all-wrapper menu-side with-side-panel">

        <div class="layout-w">

            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a href="#"><img src="{{ asset( 'images/logo/logo.png' ) }}" alt="BITROSEED"></a>
                    <div class="mm-buttons">
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w"><img alt="" src="{{ asset( $avatar ) }}"></div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">{{ $name }}</div>
                            <div class="logged-user-role">{{ $level }}</div>
                        </div>
                    </div>

                    <ul class="main-menu">
                        <li>
                            <a href="{{ url('/home') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/messages') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-mail-07"></div>
                                </div>
                                <span>Messages</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/transactions') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/profile') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/logout') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-signs-11"></div>
                                </div>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="desktop-menu menu-side-w menu-activated-on-click">
                <div class="logo-w">
                    <a class="logo" href="index.html">
                        <img src="{{ asset( 'images/favicon/favicon-32x32.png' ) }}">
                        <div class="logo-label">ITROSEED</div>
                    </a>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="logged-user-i">
                            <div class="avatar-w"><img alt="" src="{{ asset( $avatar ) }}"></div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">{{ $name }}</div>
                                <div class="logged-user-role">LEVEL {{ $level }}</div>
                            </div>
                            <div class="logged-user-menu">
                                <div class="logged-user-avatar-info">
                                    <div class="avatar-w"><img alt="" src="{{ asset( $avatar ) }}"></div>
                                    <div class="logged-user-info-w">
                                        <div class="logged-user-name">{{ $name }}</div>
                                        <div class="logged-user-role">LEVEL {{ $level }}</div>
                                    </div>
                                </div>
                                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                <ul>
                                    <li><a href="{{ url('/logout') }}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="main-menu">
                        <li>
                            <a href="{{ url('/home') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/messages') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-mail-07"></div>
                                </div>
                                <span>Messages</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/transactions') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/profile') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Profile</span>
                            </a>

                        </li>

                        <li>
                            <a href="{{ url('/logout') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-signs-11"></div>
                                </div>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="content-w">

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ $page_name }}</a></li>
                    <li class="breadcrumb-item"><a href="index.html">{{ $page_description }}</a></li>
                </ul>

                <div class="content-panel-toggler">
                    <i class="os-icon os-icon-grid-squares-22"></i>
                    <span>Sidebar</span>
                </div>
                <div class="content-i">
                    <div class="content-box">

                        <div class="row">
                            <div class="container">
                                @include('flash::message')
                            </div>
                        </div>

                        @yield('content')
                        
                    </div>
                    
                </div>


            </div>
            
        </div>

        <div class="display-type"></div>

    </div>

    <script src="{{ asset( 'js/jquery.js' ) }}"></script>
    <script src="{{ asset( 'js/select2.full.min.js' ) }}"></script>
    <script src="{{ asset( 'js/daterangepicker.js' ) }}"></script>
    <script src="{{ asset( 'js/perfect-scrollbar.jquery.min.js' ) }}"></script>
    <script src="{{ asset( 'js/jquery.dataTables.min.js' ) }}"></script>
    <script src="{{ asset( 'js/dataTables.bootstrap.min.js' ) }}"></script>

    <script src="{{ asset( 'js/dashboard.js' ) }}"></script>
    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(6000).fadeOut(350);
    </script>

    @yield('js')

</body>

</html>
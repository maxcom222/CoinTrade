<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{$gnl->title}} | Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
              <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
              <link href="{{ asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
              <link href="{{ asset('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
              <link href="{{ asset('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
              <link href="{{ asset('assets/admin/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
              <link href="{{ asset('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
              <!-- END GLOBAL MANDATORY STYLES -->
              <!-- BEGIN THEME GLOBAL STYLES -->
              <link href="{{ asset('assets/admin/global/css/components-rounded.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
              <link href="{{ asset('assets/admin/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
              <!-- END THEME GLOBAL STYLES -->
              <!-- BEGIN PAGE LEVEL STYLES -->
              <link href="{{ asset('assets/admin/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="{{ asset('assets/images/logo/icon.png') }}" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>

        <div class="logo">
                <img src="{{ asset('assets/images/logo/logo.png') }}" style="width: 10%;" /> 
        </div>
        <div class="content">

@yield('content')
            
        </div>
        <script src="{{ asset('assets/admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('assets/admin/pages/scripts/login.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

    </body>

</html>
            

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/user/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  
    <script src="{{ asset('assets/user/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('assets/user/plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('assets/user/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/user/js/dashboard.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/apps.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
        $(document).ready(function() {
            App.init();
            Dashboard.init();
        });
    </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

</script>
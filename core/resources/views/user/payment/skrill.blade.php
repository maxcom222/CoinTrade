@extends('layouts.user')
@section('content')
    <section>
        {!!$send_pay_request!!}
    </section>
 <script type="text/javascript">
           $(document).ready(function(){
               $( "body" ).contextmenu(function() {
                  alert( "Right Click Not Allow!" );
                });
                  $("#pament_form" ).submit();
           });
       </script>
@endsection

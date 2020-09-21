@if (session('success'))
<script type="text/javascript">
        $(document).ready(function(){
        	swal("Success!", "{{ session('success') }}", "success");
        });
</script>
@endif
@if (session('alert'))
<script type="text/javascript">
        $(document).ready(function(){
        	swal("Sorry!", "{{ session('alert') }}", "error");
        });
</script>
@endif
@if (session('error'))
<script type="text/javascript">
        $(document).ready(function(){
        	swal("Sorry!", "{{ session('error') }}", "error");
        });
</script>
@endif
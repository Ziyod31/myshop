<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Website title - bootstrap html template</title>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <!-- Font awesome 5 -->
    <!-- <script src="https://kit.fontawesome.com/bd48b8b78e.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- custom style -->
    <link href="css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
    // jQuery code

}); 
// jquery end
</script>

</head>
<body>


    <header class="section-header">
        @include('inc.header')
    </header> <!-- section-header.// -->
    @include('inc.errors')
    @yield('content')

    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer border-top bg">
        <div class="container">

            @include('inc.footer')
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->
    <script type="text/javascript">
       $(document).ready(function() {
        $('#city').on('change', function() {
            var city_id = this.value;
            $("#district").html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{url('district')}}",
                type: "GET",
                data: {
                    city_id: city_id,
                    _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                    $('#district').html(' ');
                    $('#district').append('<option value="">Choose ...</option>'); 
                    $.each(result.districts,function(key,value){
                        $("#district").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    // $('#region').html('<option value="">Select City First</option>'); 
                }
            });
        });    
    });
</script>

</body>
</html>
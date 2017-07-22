<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Test</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span>Coding</span>Test</a>
            <ul class="user-menu">
                @if(Auth::check())
                    <li class="btn btn-primary ">
                        <a href="/form">Submission Form</a>
                    </li>
                    <li class="btn btn-primary ">
                        <a href="/result">Result</a>
                    </li>
                    <li class="btn btn-primary ">
                        <a href="/logout">logut</a>
                    </li>
                @else
                <li class="btn btn-primary ">
                    <a href="/">Login</a>
                </li>
                <li class="btn btn-primary ">
                    <a href="/reg">Registration</a>
                </li>

                    @endif
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<br/><br/>
@yield('content')




<script src="{{URL::asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/chart.min.js')}}"></script>
<script src="{{URL::asset('js/chart-data.js')}}"></script>
<script src="{{URL::asset('js/easypiechart.js')}}"></script>
<script src="{{URL::asset('js/easypiechart-data.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('js/jquery-3.1.1.js') }}"></script>
<script src="{{ URL::asset('js/jquery-validator.js') }}"></script>

<script>
    var ajax_url = '/';

    function ajx(url, type, data, successCallback, dataType) {
        if (dataType == '' || dataType == undefined)
            dataType = 'json';
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: dataType,
            headers: {
                //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
                .done(successCallback)
                .fail(function (res) {
                    //(res);
                });
    }

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
@yield('custom_js')
</body>

</html>

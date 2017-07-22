@extends('layout.layout')
@section('content')
    <div class="col-lg-12">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">Let's login "Yourself"</div>
                <div class="panel-body">
                    <form role="form" class="login_form" id="login_form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <fieldset>

                            <div class="form-group">
                                <input class="form-control" placeholder="Your Email" name="email" type="email" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                            </div>

                           <button type="submit" class="btn btn-success pull-right login_user">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection
@section('custom_js')
    <script>

        $(".login_form").validate({
            rules: {

                email: "required",
                password: "required"

            },

            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                console.log(element);
                if (element.parent('.form-control').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {

            }

        });

        $(".login_user").click(function () {

            if ($("#login_form").valid())
            {


                var params = $("#login_form").serialize();

                var url = "/login_user";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == true)
                    {

                        window.location.href = ajax_url +'form';
                    } else
                    {
                        alert(data.msg);

                    }
                };

                ajx(url, 'post', params, successCallback, 'html');
            }

        });
    </script>
@endsection
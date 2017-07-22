@extends('layout.layout')
@section('content')
    <div class="col-lg-12">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">Let's register "Yourself"</div>
                <div class="panel-body">
                    <form role="form" class="registration" id="registration">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Name" name="name" type="text" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Email" name="email" type="email" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                            </div>

                            <a href="#" class="btn btn-success pull-right registered">Register</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
    @endsection
@section('custom_js')
    <script>

        $(".registration").validate({
            rules: {

                email: "required",
                password: "required",
                name: "required"
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

        $(".registered").click(function () {

            if ($("#registration").valid())
            {


                var params = $("#registration").serialize();

                var url = "/new_user";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 'success')
                    {

                        window.location.href = ajax_url +'login';
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
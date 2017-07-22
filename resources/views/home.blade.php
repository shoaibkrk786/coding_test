@extends('layout.layout')
@section('content')
    <div class="col-lg-12">
        <div class="col-md-8 col-md-offset-2" style="margin-left: 40px;">

            <div class="panel panel-danger">
                <div class="panel-heading">Submission Form</div>
                <div class="panel-body">
                    <!--Form Start-->
                    <form class="submission_form" id="submission_form" enctype="multipart/form-data">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="project_name"  aria-describedby="passwordHelpInline" style="width: 55%;">
                        </div>
                        <!--Brand-->

                        <!--Style-->
                        <div class="form-group">
                            <label>Project type</label>
                            <select  name = "project_type"  style="height: 29px; width:56%;border-color: #d2d6de;" >
                                <option value="">Select type</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Services</label>
                            <input type="checkbox" name="service[]" value="Detailing" />
                            <label>Detailing</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="service[]"  value="Design"/>
                            <label>Design</label>

                            <input type="checkbox" name="service[]" value="Construction" />
                            <label>Construction</label>

                            <input type="checkbox" name="service[]" value="Review" />
                            <label>Review</label>

                            <input type="checkbox" name="service[]" value="Inspection"/>
                            <label>Inspection</label>

                        </div>

                        <div class="form-group">
                            <label>Comments</label>
                            <textarea  name="comment" style="width: 56%;"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Terms & Conditions</label><br>
                            <input type="checkbox" name="terms" value="agreed"  />
                            <label>I Agree</label>
                        </div>

                        <button type="submit"  class="btn btn-default submit_data">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>

        $(".submission_form").validate({
            rules: {

                project_name: "required",
                project_type: "required",
                "service[]": {
                    required: true,
                    minlength: 1
                },
                comment: "required",
                terms: "required"
            },

            messages: {
                "service[]": "Please select at least one checkbox."
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

        $(".submit_data").click(function () {

            if ($("#submission_form").valid())
            {


                var params = $("#submission_form").serialize();

                var url = "/new_data";

                var successCallback = function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 'success')
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
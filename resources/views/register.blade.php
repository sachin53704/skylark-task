<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="loader" class="loader-overlay" style="display: none;">
            <div class="loader"></div>
        </div>
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row">
                                <img src="{{asset('img/logo.png')}}" class="logo">
                            </div>
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                                <img src="{{asset('img/company.png')}}" class="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form id="registerForm" class="mt-5">
                            @csrf
                            <div class="card2 card border-0 px-4 py-5">
                                <h3 class="text-center">Register</h3>
                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Name <span class="text-danger">*</span></h6>
                                    </label>
                                    <input class="mb-4" type="text" name="name" placeholder="Enter name"  id="name" required autocomplete="name" autofocus>
                                    <span class="text-danger name_err"></span>
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Email <span class="text-danger">*</span></h6>
                                    </label>
                                    <input class="mb-4" type="email" name="email" placeholder="Enter email"  id="email" required autocomplete="email" autofocus>
                                    <span class="text-danger email_err"></span>
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password <span class="text-danger">*</span></h6>
                                    </label>
                                    <input type="password" id="password" name="password" placeholder="Enter password" required autocomplete="off">
                                    <span class=" text-danger password_err"></span>
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Mobile <span class="text-danger">*</span></h6>
                                    </label>
                                    <input class="mb-4" type="text" name="mobile" placeholder="Enter mobile"  id="mobile" required autocomplete="mobile" autofocus>
                                    <span class="text-danger mobile_err"></span>
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Age <span class="text-danger">*</span></h6>
                                    </label>
                                    <input class="mb-4" type="text" name="age" placeholder="Enter age"  id="age" required autocomplete="age" autofocus>
                                    <span class="text-danger age_err"></span>
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Position <span class="text-danger">*</span></h6>
                                    </label>
                                    <input class="mb-4" type="text" name="position" placeholder="Enter position"  id="position" required autocomplete="position" autofocus>
                                    <span class="text-danger position_err"></span>
                                </div>

                                <div class="row mb-3 mt-2 px-3">
                                    <button type="submit" id="registerFormSubmit" class="btn btn-blue text-center" style="margin-right: 5px">
                                        Register
                                    </button>

                                    <a href="{{ route('login') }}" class="btn btn-primary text-center">Back</a>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#registerForm").submit(function(e) {
                    e.preventDefault();
                    $("#registerFormSubmit").prop('disabled', true);
                    var formdata = new FormData(this);
                    
                    $.ajax({
                        url: '{{ route('postRegister') }}',
                        type: 'POST',
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (!data.error) {
                                alert(data.message)
                                window.location.href = '{{ route('login') }}';
                            } else {
                                $("#registerFormSubmit").prop('disabled', false);
                                resetErrors();
                                printErrMsg(data.error);
                            }
                        },
                        error: function(error) {
                            $("#registerFormSubmit").prop('disabled', false);
                            alert("Error occured!", "Something went wrong please try again", "error");
                        },
                        statusCode: {
                            422: function(responseObject, textStatus, jqXHR) {
                                $("#registerFormSubmit").prop('disabled', false);
                                resetErrors();
                                printErrMsg(responseObject.responseJSON.errors);
                            },
                            500: function(responseObject, textStatus, errorThrown) {
                                $("#registerFormSubmit").prop('disabled', false);
                                alert("Error occured!", "Something went wrong please try again", "error");
                            }
                        }
                    });
                });
        
                function resetErrors() {
                    var form = document.getElementById('registerForm');
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        $('.' + key + '_err').text('');
                    }
                }
        
                function printErrMsg(msg) {
                    $.each(msg, function(key, value) {
                        $('.' + key + '_err').text(value);
                    });
                }
            });
        </script>
    </body>
</html>
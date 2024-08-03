<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    </head>
    <body id="body-pd">
        
        <x-header />

        <x-sidebar />

        <!--Container Main start-->
        <div class="height-100 mt-5 bg-light">
            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>

        <x-footer />
        <script>
            function logout() {
                $.ajax({
                    url: '{{ route('logout') }}',
                    type: 'POST',
                    beforeSend: function()
                    {
                        $('#preloader').css('opacity', '0.5');
                        $('#preloader').css('visibility', 'visible');
                    },
                    success: function(data)
                    {
                        if (!data.error)
                            window.location.href = '{{ route('login') }}';
                        else
                            swal("Error!", data.error, "error");
                    },
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            resetErrors();
                            printErrMsg(responseObject.responseJSON.errors);
                        },
                        500: function(responseObject, textStatus, errorThrown) {
                            swal("Error occured!", "Something went wrong please try again", "error");
                        }
                    },
                    complete: function() {
                        $('#preloader').css('opacity', '0');
                        $('#preloader').css('visibility', 'hidden');
                    },
                });

            }
        </script>

        <script>
            $(document).ready(function() {

                $("#btnCancel").click(function() {
                    $("#addContainer").slideUp();
                    $("#editContainer").slideUp();
                    $(this).hide();
                    $("#addToTable").show();
                });
            });

            $(document).ready(function() {
                $("#addToTable").click(function(e) {
                    e.preventDefault();
                    // var id = $(this).attr('data-id');
                    $("#addContainer").slideDown();
                    $("#editContainer").slideUp();
                    $("#btnCancel").show();

                });
            });

            function editFormBehaviour() {
                $("#addContainer").slideUp();
                $("#btnCancel").show();
                $("#addToTable").hide();
                $("#editContainer").slideDown();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            function printErrMsg(msg) {
                $.each(msg, function(key, value) {
                    var field = key.replace('[]', '');
                    $('.' + field + '_err').text(value);
                });
            }

            function resetErrors() {
                var form = document.getElementById('addForm');
                if(form)
                {
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        var field = key.replace('[]', '');
                        $('.' + field + '_err').text('');
                    }
                }

                var form = document.getElementById('editForm');
                if(form)
                {
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        var field = key.replace('[]', '');
                        $('.' + field + '_err').text('');
                    }
                }
            }

        </script>
        @stack('script')
    </body>
</html>
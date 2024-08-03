<x-layout>
    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter name">
                                <span class="text-danger text-danger name_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter email">
                                <span class="text-danger text-danger email_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Enter bobile">
                                <span class="text-danger text-danger mobile_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="age">Age <span class="text-danger">*</span></label>
                                <input class="form-control" id="age" name="age" type="text" placeholder="Enter age">
                                <span class="text-danger text-danger age_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="position">Position <span class="text-danger">*</span></label>
                                <input class="form-control" id="position" name="position" type="text" placeholder="Enter position">
                                <span class="text-danger text-danger position_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter password">
                                <span class="text-danger text-danger password_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- Edit Form --}}
    <div class="row" id="editContainer" style="display:none;">
        <div class="col">
            <form class="form-horizontal form-bordered" method="post" id="editForm">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body py-2">
                        <input type="hidden" id="id" name="id" value="">
                        
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter name">
                                <span class="text-danger text-danger name_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter email">
                                <span class="text-danger text-danger email_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Enter bobile">
                                <span class="text-danger text-danger mobile_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="age">Age <span class="text-danger">*</span></label>
                                <input class="form-control" id="age" name="age" type="text" placeholder="Enter age">
                                <span class="text-danger text-danger age_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="position">Position <span class="text-danger">*</span></label>
                                <input class="form-control" id="position" name="position" type="text" placeholder="Enter position">
                                <span class="text-danger text-danger position_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="password">New Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter password">
                                <span class="text-danger text-danger password_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="editSubmit">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('employee.index') }}">Employee</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </nav>
                        <div class="d-flex flex-wrap">
                            <div class="px-1">
                                <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Age</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyData">
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    
    $(document).ready(function() {
        function getEmployeeList(){
            $.ajax({
                url: "{{ route('employee.index') }}",
                type: 'GET',
                success: function(data)
                {
                    let html = "";
                    let count = 1;
                    $.each(data.data, function(key, value){
                        html += `<tr>
                                    <td>${count}</td>
                                    <td>${value.name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.mobile}</td>
                                    <td>${value.age}</td>
                                    <td>${value.position}</td>
                                    <td>
                                        <div class="d-flex flex-wrap">
                                            <button class="edit-element btn btn-sm btn-warning" style="margin-right: 5px;" title="Edit employee" data-id="${value.id}">Edit</button>
                                            
                                            <button class="rem-element btn btn-sm btn-danger" title="Delete employee" data-id="${value.id}">Delete </button>
                                        </div>    
                                    </td>
                                </tr>`;
                        count++;
                    });
                    if(count == 1){
                        html += `<tr><td colspan="7"></td></tr>`;
                    }

                    $('#tbodyData').html(html);
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                },
            });
        }

        getEmployeeList()

        $("#addForm").submit(function(e) {
            e.preventDefault();
            $("#addSubmit").prop('disabled', true);

            var formdata = new FormData(this);
            $.ajax({
                url: '{{ route('employee.store') }}',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                beforeSend: function()
                {
                    $('#preloader').css('opacity', '0.5');
                    $('#preloader').css('visibility', 'visible');
                },
                success: function(data)
                {
                    $("#addSubmit").prop('disabled', false);
                    if (!data.error){
                        alert('Employee created successfully');
                        $("#addContainer").slideUp();
                        $("#editContainer").slideUp();
                        getEmployeeList();
                    }
                    else{
                        alert(data.error);
                    }
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#addSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#addSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                },
                complete: function() {
                    $('#preloader').css('opacity', '0');
                    $('#preloader').css('visibility', 'hidden');
                },
            });

        });

        $("body").on("click", ".edit-element", function(e) {
            e.preventDefault();
            var model_id = $(this).attr("data-id");
            var url = "{{ route('employee.edit', ":model_id") }}";

            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'GET',
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                beforeSend: function()
                {
                    $('#preloader').css('opacity', '0.5');
                    $('#preloader').css('visibility', 'visible');
                },
                success: function(data, textStatus, jqXHR) {
                    editFormBehaviour();
                    if (!data.error)
                    {
                        $("#editForm input[name='id']").val(data.employee.id);
                        $("#editForm input[name='name']").val(data.employee.name);
                        $("#editForm input[name='email']").val(data.employee.email);
                        $("#editForm input[name='mobile']").val(data.employee.mobile);
                        $("#editForm input[name='age']").val(data.employee.age);
                        $("#editForm input[name='position']").val(data.employee.position);
                    }
                    else
                    {
                        alert(data.error);
                    }
                },
                error: function(error, jqXHR, textStatus, errorThrown) {
                    alert("Some thing went wrong");
                },
                complete: function() {
                    $('#preloader').css('opacity', '0');
                    $('#preloader').css('visibility', 'hidden');
                },
            });
        });

        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#id').val();
            var url = "{{ route('employee.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    console.log(data)
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error){
                        alert('employee updated successfully');
                        $("#addContainer").slideUp();
                        $("#editContainer").slideUp();
                        getEmployeeList();
                    }
                    else{
                        alert(data.error);
                    }
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                },
            });

        });

        $("body").on("click", ".rem-element", function(e) {
            e.preventDefault();
            if(confirm('Are you sure you want to remove this employee')){
                var model_id = $(this).attr("data-id");
                var url = "{{ route('employee.destroy', ":model_id") }}";
                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error) {
                            alert('employee remove successfully');
                            $("#addContainer").slideUp();
                            $("#editContainer").slideUp();
                            getEmployeeList();
                        } else {
                            swal("Error!", data.error, "error");
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
            
        });
    });
</script>

    


@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Employee Leave</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Employee Leave</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                @if (@$editData)
                                Edit Employee Leave
                                @else
                                Add Employee Leave
                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('employees.leave.view') }}"><i class="fa fa-list"></i> Employee Leave List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ (@$editData)?route('employees.leave.update', $editData->id):route('employees.leave.store') }}" id="myForm">
                                @csrf

                                <div class="form row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Employee</label>
                                        <select name="employee_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}" {{ (@$editData->employee_id == $employee->id)?'selected':'' }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Start Date</label>
                                        <input type="text" name="start_date" value="{{ @$editData->start_date }}" class="form-control form-control-sm singledatepicker" autocomplete="off" placeholder="Start Date">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>End Date</label>
                                        <input type="text" name="end_date" value="{{ @$editData->end_date }}" class="form-control form-control-sm singledatepicker" autocomplete="off" placeholder="End Date">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="name">Leave Purpose</label>
                                        <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Purpose</option>
                                            @foreach ($leave_purpose as $purpose)
                                                <option value="{{ $purpose->id }}" {{ (@$editData->leave_purpose_id == $purpose->id)?'selected':'' }}>{{ $purpose->name }}</option>
                                            @endforeach
                                            <option value="0">New Purpose</option>
                                        </select>
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose" id="add_others" style="display:none">
                                    </div>

                                    <div class="form-group col-md-4" style="padding-top: 30px;">
                                        <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)?"Update":"Submit" }}</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#leave_purpose_id', function() {
            var leave_purpose_id = $(this).val();
            if (leave_purpose_id == 0) {
                $('#add_others').show();
            } else {
                $('#add_others').hide();
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter Divison",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection

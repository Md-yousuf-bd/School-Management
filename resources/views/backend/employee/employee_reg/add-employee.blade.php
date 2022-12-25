@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
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
                                Edit Employee
                                @else
                                Add Employee
                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('employees.registration.view') }}"><i class="fa fa-list"></i> Employee List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ (@$editData)?route('employees.registration.update', $editData->id):route('employees.registration.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form row">
                                    <div class="form-group col-md-4">
                                        <label>Employee Name <font style="color: red">*</font></label>
                                        <input type="text" name="name" value="{{ @$editData->name }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Father's Name <font style="color: red">*</font></label>
                                        <input type="text" name="fname" value="{{ @$editData->fname }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mother's Name <font style="color: red">*</font></label>
                                        <input type="text" name="mname" value="{{ @$editData->mname }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mobile Number <font style="color: red">*</font></label>
                                        <input type="text" name="mobile" value="{{ @$editData->mobile }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Address <font style="color: red">*</font></label>
                                        <input type="text" name="address" value="{{ @$editData->address }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Gender <font style="color: red">*</font></label>
                                        <select name="gender" class="form-control form-control-sm" id="">
                                            <option value="">Select Gender</option>
                                            <Option value="Male" {{ (@$editData->gender == 'Male')?'selected':'' }}>Male</Option>
                                            <Option value="Female" {{ (@$editData->gender == 'Female')?'selected':'' }}>Female</Option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Religion <font style="color: red">*</font></label>
                                        <select name="religion" class="form-control form-control-sm" id="">
                                            <option value="">Select Religion</option>
                                            <Option value="Islam" {{ (@$editData->religion == 'Islam')?'selected':'' }}>Islam</Option>
                                            <Option value="Hindu" {{ (@$editData->religion == 'Hindu')?'selected':'' }}>Hindu</Option>
                                            <Option value="Khristan" {{ (@$editData->religion == 'Khristan')?'selected':'' }}>Khristan</Option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Date of Birth <font style="color: red">*</font></label>
                                        <input type="text" name="dob" value="{{ @$editData->dob }}" class="form-control form-control-sm singledatepicker" autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Designation <font style="color: red">*</font></label>
                                        <select name="designation_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}" {{ (@$editData->designation_id == $designation->id)?'selected':'' }}>{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if (!@$editData)
                                    <div class="form-group col-md-3">
                                        <label>Join Date <font style="color: red">*</font></label>
                                        <input type="text" name="joint_date" value="{{ @$editData->joint_date }}" class="form-control form-control-sm singledatepicker" autocomplete="off">
                                    </div>
                                    @endif

                                    @if (!@$editData)
                                    <div class="form-group col-md-3">
                                        <label>Salary <font style="color: red">*</font></label>
                                        <input type="text" name="salary" value="{{ @$editData->salary }}" class="form-control form-control-sm">
                                    </div>
                                    @endif


                                    <div class="form-group col-md-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control form-control-sm" id="image">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <img id="showImage" src="{{ (!empty($editData->image))?url('upload/employee_images/'.$editData->image):url('upload/no_image.png') }}" style="width: 150px;height:160px;border: 1px solid #000;">
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)?"Update":"Submit" }}</button>
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
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                fname: {
                    required: true,
                },
                mname: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                address: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                religion: {
                    required: true,
                },
                dob: {
                    required: true,
                },
                designation_id: {
                    required: true,
                },
                salary: {
                    required: true,
                },
                joint_date: {
                    required: true,
                },
            },
            messages: {
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

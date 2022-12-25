@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Student</li>
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
                                Edit Student
                                @else
                                Add Student
                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('students.registration.view') }}"><i class="fa fa-list"></i> Student List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ (@$editData)?route('students.registration.update', $editData->student_id):route('students.registration.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ @$editData->id }}">

                                <div class="form row">
                                    <div class="form-group col-md-4">
                                        <label>Student Name <font style="color: red">*</font></label>
                                        <input type="text" name="name" value="{{ @$editData['student']['name'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Father's Name <font style="color: red">*</font></label>
                                        <input type="text" name="fname" value="{{ @$editData['student']['fname'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mother's Name <font style="color: red">*</font></label>
                                        <input type="text" name="mname" value="{{ @$editData['student']['mname'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Mobile Number <font style="color: red">*</font></label>
                                        <input type="text" name="mobile" value="{{ @$editData['student']['mobile'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Address <font style="color: red">*</font></label>
                                        <input type="text" name="address" value="{{ @$editData['student']['address'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Gender <font style="color: red">*</font></label>
                                        <select name="gender" class="form-control form-control-sm" id="">
                                            <option value="">Select Gender</option>
                                            <Option value="Male" {{ (@$editData['student']['gender'] == 'Male')?'selected':'' }}>Male</Option>
                                            <Option value="Female" {{ (@$editData['student']['gender'] == 'Female')?'selected':'' }}>Female</Option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Religion <font style="color: red">*</font></label>
                                        <select name="religion" class="form-control form-control-sm" id="">
                                            <option value="">Select Religion</option>
                                            <Option value="Islam" {{ (@$editData['student']['religion'] == 'Islam')?'selected':'' }}>Islam</Option>
                                            <Option value="Hindu" {{ (@$editData['student']['religion'] == 'Hindu')?'selected':'' }}>Hindu</Option>
                                            <Option value="Khristan" {{ (@$editData['student']['religion'] == 'Khristan')?'selected':'' }}>Khristan</Option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Date of Birth <font style="color: red">*</font></label>
                                        <input type="text" name="dob" value="{{ @$editData['student']['dob'] }}" class="form-control form-control-sm singledatepicker" autocomplete="off">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Discount <font style="color: red">*</font></label>
                                        <input type="text" name="discount" value="{{ @$editData['discount']['discount'] }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Year <font style="color: red">*</font></label>
                                        <select name="year_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}" {{ (@$editData->year_id == $year->id)?'selected':'' }}>{{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Class <font style="color: red">*</font></label>
                                        <select name="class_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $cls)
                                                <option value="{{ $cls->id }}" {{ $year->id }}" {{ (@$editData->class_id == $cls->id)?'selected':'' }}>{{ $cls->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Group</label>
                                        <select name="group_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Group</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}" {{ $year->id }}" {{ (@$editData->group_id == $group->id)?'selected':'' }}>{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Shift</label>
                                        <select name="shift_id" class="form-control form-control-sm" id="">
                                            <option value="">Select Shift</option>
                                            @foreach ($shifts as $shift)
                                                <option value="{{ $shift->id }}" {{ $year->id }}" {{ (@$editData->shift_id == $shift->id)?'selected':'' }}>{{ $shift->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control form-control-sm" id="image">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <img id="showImage" src="{{ (!empty($editData['student']['image']))?url('upload/student_images/'.$editData['student']['image']):url('upload/no_image.png') }}" style="width: 150px;height:160px;border: 1px solid #000;">
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
                discount: {
                    required: true,
                },
                year_id: {
                    required: true,
                },
                class_id: {
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

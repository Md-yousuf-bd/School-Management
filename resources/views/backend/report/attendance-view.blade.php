@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Employee Attandance Rreport</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"></li> Employee Attandance Rreport</li>
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
                            <h3>Select Criteria</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="GET" action="{{ route('reports.attendance.get') }}" id="myForm" target="_blank">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Employee <font style="color: red">*</font></label>
                                        <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                                            <option value="">Select Employee</option>
                                            @foreach ($employeess as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Date <font style="color: red">*</font></label>
                                        <input type="text" name="date" class="form-control form-control-sm singledatepicker" placeholder="DD-MM-YYYY" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group col-md-3" style="padding-top: 31px">
                                        <button id="search" class="btn btn-primary btn-sm btn-block" name="search">Search</button>
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
        $('#myForm').validate({
            rules: {
                employee_id: {
                    required: true,
                },
                date: {
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

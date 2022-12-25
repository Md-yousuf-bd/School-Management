@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Examination Fee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Examination Fee</li>
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
                            <h3>Search Criteria
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Year <font style="color: red">*</font></label>
                                    <select name="year_id" id="year_id" class="form-control form-control-sm" id="">
                                        <option value="">Select Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Class <font style="color: red">*</font></label>
                                    <select name="class_id" id="class_id" class="form-control form-control-sm" id="">
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $cls)
                                            <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Exam Type <font style="color: red">*</font></label>
                                    <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm" id="">
                                        <option value="">Select Exam Type</option>
                                        @foreach ($exam_types as $xm)
                                            <option value="{{ $xm->id }}">{{ $xm->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3" style="padding-top: 30px">
                                    <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                                </div>
                            </div> <br>
                        </div>
                        <div class="card-body">
                            <div id="DocumentResults"></div>
                            <script id="document-templete" type="text/x-handlebars-template">
                                <table class="table-sm table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>
                                        @{{/each}}
                                    </tbody>
                                </table>
                            </script>
                        </div>
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
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $('.notifyjs-corner').html('');
        if (year_id == '') {
            $.notify("Year required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if (class_id == '') {
            $.notify("Class required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if (exam_type_id == '') {
            $.notify("Exam Type required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        $.ajax({
           url: "{{ route('students.exam.fee.get-student') }}",
           type: "GET",
           data: {'year_id':year_id, 'class_id':class_id, 'exam_type_id':exam_type_id},
           beforeSend: function() {

           },
           success: function (data) {
               var source = $("#document-templete").html();
               var template = Handlebars.compile(source);
               var html = template(data);
               $('#DocumentResults').html(html);
               $('[data-toggle="tooltip"]').tooltip();
           }
        });
    });
</script>


@endsection

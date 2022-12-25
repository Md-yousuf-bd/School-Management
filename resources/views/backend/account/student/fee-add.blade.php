@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Student Fee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Student Fee</li>
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
                                Add/Edit Student Fee
                                <a class="btn btn-success float-right btn-sm" href="{{ route('accounts.fee.view') }}"><i class="fa fa-list"></i> Student Fee List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Year <font style="color: red">*</font></label>
                                    <select name="year_id" id="year_id" class="form-control">
                                        <option value="">Select Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Class <font style="color: red">*</font></label>
                                    <select name="class_id" id="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $cls)
                                            <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fee Category <font style="color: red">*</font></label>
                                    <select name="fee_category_id" id="fee_category_id" class="form-control">
                                        <option value="">Select Fee Category</option>
                                        @foreach ($fee_categories as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date <font style="color: red">*</font></label>
                                    <input type="text" name="date" id="date" class="form-control singledatepicker" placeholder="DD-MM-YYYYY" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <a id="search" class="btn btn-primary" name="search">Search</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="DocumentResults"></div>
                            <script id="document-templete" type="text/x-handlebars-template">
                                <form action="{{ route('accounts.fee.store') }}" method="POST">
                                    @csrf

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
                                    <button type="submit" class="btn btn-primary bt-sm" style="margin-top: 30px;">Submit</button>
                                </form>
                            </script>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
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
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();
        $('.notifyjs-corner').html('');
        if (year_id == '') {
            $.notify("Year required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if (class_id == '') {
            $.notify("Class required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if (fee_category_id == '') {
            $.notify("Fee Category required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        if (date == '') {
            $.notify("Date required", {globalPosition: 'top right',className: 'error'});
            return false;
        }
        $.ajax({
           url: "{{ route('accounts.fee.getstudent') }}",
           type: "GET",
           data: {'year_id':year_id, 'class_id':class_id, 'fee_category_id':fee_category_id, 'date':date},
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

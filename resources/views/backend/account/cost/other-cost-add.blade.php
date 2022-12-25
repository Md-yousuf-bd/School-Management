@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage  Others Costs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Others Costs</li>
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
                                @if (isset($editData))
                                    Edit Cost
                                @else
                                    Add Cost
                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('accounts.cost.view') }}"><i class="fa fa-list"></i>  Others Costs List</a>
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <form method="post" action="{{ (@$editData)?route('accounts.cost.update', $editData->id):route('accounts.cost.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form row">
                                    <div class="form-group col-md-3">
                                        <label>Date</label>
                                        <input type="text" name="date" class="form-control singledatepicker" value="{{ @$editData->date }}" autocomplete="off" placeholder="Date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Amount</label>
                                        <input type="text" name="amount" value="{{ @$editData->amount }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <img id="showImage" src="{{ (!empty(@$editData))?url('upload/cost_images/'.@$editData->image):url('upload/no_image.png') }}" style="width: 150px;height:160px;border: 1px solid #000;">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ @$editData->description }}</textarea>
                                    </div>

                                    <div class="form-group col-md-3" style=" padding-top: 30px">
                                        <button type="submit" class="btn btn-primary">{{ (@$editData)?"Update":"Submit" }}</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- /.card-body -->

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
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                date: {
                    required: true,
                },
                amount: {
                    required: true,
                },
                description: {
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

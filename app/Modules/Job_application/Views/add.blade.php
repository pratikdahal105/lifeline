@extends('admin.layout.main')
@section('content')

    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Job_applications </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.job_applications') }}">job_application</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
            <div class="page-header-actions">
            </div>
        </div>
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" action="{{ route('admin.job_applications.store') }}"  method="post">
                        <div class="box-body">
                            <div class="form-group">
                                    <label for="full_name">Full_name</label><input type="text" name="full_name" id="full_name" class="form-control" ></div><div class="form-group">
                                    <label for="phone">Phone</label><input type="text" name="phone" id="phone" class="form-control" ></div><div class="form-group">
                                    <label for="email">Email</label><input type="text" name="email" id="email" class="form-control" ></div><div class="form-group">
                                    <label for="job_id">Job_id</label><input type="text" name="job_id" id="job_id" class="form-control" ></div><div class="form-group">
                                    <label for="no_of_days">No_of_days</label><input type="text" name="no_of_days" id="no_of_days" class="form-control" ></div><div class="form-group">
                                    <label for="drive">Drive</label><input type="text" name="drive" id="drive" class="form-control" ></div><div class="form-group">
                                    <label for="access_to_car">Access_to_car</label><input type="text" name="access_to_car" id="access_to_car" class="form-control" ></div><div class="form-group">
                                    <label for="postcode">Postcode</label><input type="text" name="postcode" id="postcode" class="form-control" ></div><div class="form-group">
                                    <label for="cv">Cv</label><input type="file" name="cv" id="cv" class="form-control" ></div><div class="form-group">
{{--                                    <label for="status">Status</label><input type="text" name="status" id="status" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.job_applications') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

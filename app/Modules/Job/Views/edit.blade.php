@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Jobs </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.jobs') }}">jobs</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <div class="page-header-actions">
            </div>
        </div>
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" action="{{ route('admin.jobs.update') }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                    <label for="position">Position</label><input type="text" value = "{{$job->position}}"  name="position" id="position" class="form-control" ></div><div class="form-group">
                                    <label for="number">Number</label><input type="number" value = "{{$job->number}}"  name="number" id="number" class="form-control" ></div><div class="form-group">
                                    <label for="requirements">Requirements</label><input type="text" value = "{{$job->requirements}}"  name="requirements" id="requirements" class="form-control" ></div><div class="form-group">
                                    <label for="till">Till</label><input type="date" value = "{{$job->till}}"  name="till" id="till" class="form-control" ></div><div class="form-group">
                                <label for="status">Status</label><select name="status" id="status" class="form-control" >
                                    @if($job->status == 1)
                                        <option value="1" selected>Active</option>
                                        <option value="0">Expired</option>
                                    @else
                                        <option value="1">Active</option>
                                        <option value="0" selected>Expired</option>
                                    @endif
                                </select>{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$job->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$job->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$job->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$job->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.jobs') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

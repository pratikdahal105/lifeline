@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Booking_infos </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.booking_infos') }}">booking_info</a></li>
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
                    <form role="form" action="{{ route('admin.booking_infos.update') }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
{{--                                    <label for="booking_id">Booking_id</label><input type="text" value = "{{$booking_info->booking_id}}"  name="booking_id" id="booking_id" class="form-control" ></div><div class="form-group">--}}
                                    <label for="staff_id">Staff_id</label><input type="text" value = "{{$booking_info->staff_id}}"  name="staff_id" id="staff_id" class="form-control" ></div><div class="form-group">
                                    <label for="date">Date</label><input type="text" value = "{{$booking_info->date}}"  name="date" id="date" class="form-control" ></div><div class="form-group">
                                    <label for="from">From</label><input type="text" value = "{{$booking_info->from}}"  name="from" id="from" class="form-control" ></div><div class="form-group">
                                    <label for="to">To</label><input type="text" value = "{{$booking_info->to}}"  name="to" id="to" class="form-control" ></div><div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$booking_info->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$booking_info->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$booking_info->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$booking_info->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.booking_infos') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

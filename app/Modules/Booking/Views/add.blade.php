@extends('admin.layout.main')
@section('content')

    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Bookings </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bookings') }}">booking</a></li>
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
                    <form role="form" action="{{ route('admin.bookings.store') }}"  method="post">
                        <div class="box-body">
                            <div class="form-group">
                                    <label for="full_name">Full_name</label><input type="text" name="full_name" id="full_name" class="form-control" ></div><div class="form-group">
                                    <label for="company_name">Company_name</label><input type="text" name="company_name" id="company_name" class="form-control" ></div><div class="form-group">
                                    <label for="postcode">Postcode</label><input type="text" name="postcode" id="postcode" class="form-control" ></div><div class="form-group">
                                    <label for="contact">Contact</label><input type="tel" name="contact" id="contact" class="form-control" ></div><div class="form-group">
                                    <label for="email">Email</label><input type="email" name="email" id="email" class="form-control" ></div><div class="form-group">
                                    <label for="special_requirement">Special_requirement</label><textarea type="text" rows="5" name="special_requirement" id="special_requirement" class="form-control" ></textarea></div><div class="form-group">
                                    <label for="parking_id">Parking_id</label><select name="parking_id" id="parking_id" class="form-control" >
                                    <option value="" disabled selected>-- Select Parking Information --</option>
                                    @foreach($parkings as $parking)
                                        <option value="{{$parking->id}}">{{$parking->type}}</option>
                                    @endforeach
                                </select>
                            </div><div class="form-group">
                                    <label for="other">Other</label><textarea type="text" rows="5" name="other" id="other" class="form-control" ></textarea></div><div class="form-group">
{{--                                    <label for="status">Status</label><input type="text" name="status" id="status" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.bookings') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

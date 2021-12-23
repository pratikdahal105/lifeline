@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Bookings </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bookings') }}">booking</a></li>
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
                    <form role="form" action="{{ route('admin.bookings.update') }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                    <label for="full_name">Full_name</label><input type="text" value = "{{$booking->full_name}}"  name="full_name" id="full_name" class="form-control" ></div><div class="form-group">
                                    <label for="company_name">Company_name</label><input type="text" value = "{{$booking->company_name}}"  name="company_name" id="company_name" class="form-control" ></div><div class="form-group">
                                    <label for="postcode">Postcode</label><input type="text" value = "{{$booking->postcode}}"  name="postcode" id="postcode" class="form-control" ></div><div class="form-group">
                                    <label for="contact">Contact</label><input type="text" value = "{{$booking->contact}}"  name="contact" id="contact" class="form-control" ></div><div class="form-group">
                                    <label for="email">Email</label><input type="text" value = "{{$booking->email}}"  name="email" id="email" class="form-control" ></div><div class="form-group">
                                    <label for="special_requirement">Special_requirement</label><textarea type="text" rows="5" name="special_requirement" id="special_requirement" class="form-control" >{{$booking->special_requirement}}</textarea></div><div class="form-group">
                                    <label for="parking_id">Parking_id</label><select name="parking_id" id="parking_id" class="form-control" >
                                    @foreach($parkings as $parking)
                                        @if($parking->id == $booking->parking_id)
                                            <option value="{{$parking->id}}" selected>{{$parking->type}}</option>
                                        @else
                                            <option value="{{$parking->id}}">{{$parking->type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div><div class="form-group">
                                    <label for="other">Other</label><textarea type="text" rows="5" name="other" id="other" class="form-control" >{{$booking->other}}</textarea>
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$booking->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$booking->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$booking->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$booking->id}}" />
                            {{ csrf_field() }}
                        </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Staff</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($booking->booking_infos as $info)
                                    <tr>
                                        <td>{{$info->staff->type}}</td>
                                        <td>{{$info->date}}</td>
                                        <td>{{date("g:i a", strtotime($info->from))}}</td>
                                        <td>{{date("g:i a", strtotime($info->to))}}</td>
                                        <td>
                                            <a class='btn btn-sm btn-success btn-outline'  title='Edit' href="{{route('admin.booking_infos.edit', $info->id)}}"><i class='icon wb-pencil' aria-hidden='true'></i></a>
                                            <a class='btn btn-sm btn-danger btn-outline' onclick='return confirm("are you sure you want to delete this data?")' href="{{route('admin.booking_infos.delete', $info->id)}}" ><i class='icon wb-trash' aria-hidden='true'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="status">Status</label><select name="status" id="status" class="form-control" >
                                    @if($booking->status == 1)
                                        <option value="1" selected>Processed</option>
                                        <option value="0">Pending</option>
                                    @else
                                        <option value="1">Processed</option>
                                        <option value="0" selected>Pending</option>
                                    @endif
                                </select>
                            </div>
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

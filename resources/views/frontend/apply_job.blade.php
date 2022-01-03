@extends('frontend.layouts.main')
@section('content')
    <section class="slice slice-lg">
        <div class="container">
            @include('frontend.includes.message')
            <form action="{{route('job.apply', $job->slug)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" id="no_of_days" name="no_of_days" placeholder="No. of days available per week" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Contact Number" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-12">
                        <select class="form-control" id="drive" name="drive" required>
                            <option value="" selected disabled>Do You Drive</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <select class="form-control" id="access_to_car" name="access_to_car" required>
                            <option value="" selected disabled>Do You Have Access To A Car?</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Postcode" required>
                    </div>
                    <div class="form-group col-md-12">
                        Resume: <input type="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpeg" class="form-control" id="cv" name="cv" required>
                    </div>
                </div>
                <div class="form-group col-12">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">I consent to Lifeline Recruitment using my email address and phone number to contact me regarding employment and course opportunities.</label>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </section>
@endsection

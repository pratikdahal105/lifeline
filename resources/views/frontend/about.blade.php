@extends('frontend.layouts.main')
@section('content')
    <section class="slice slice-lg">
        <div class="container">
            {!! $about->body !!}
        </div>
    </section>
@endsection

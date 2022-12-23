@extends('layouts.app')

@section('content')
@include('layouts.inc.slider')
 <div class="container">

    <div class="row p-3 mb-2 bg-secondary text-white">
        <h4 class="text-center p-4">Book Resort Now !</h4>


        @foreach ($resorts as $resort)
            <div class="col-md-4 p-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div style="max-width:450px; max-height:450px; overflow: hidden;">
                        <img src="{{ $resort->image }}" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $resort->name }}</h3>
                        <p class="text-muted">Per Day ৳{{ $resort->price }} Taka</p>
                        <p class="card-text">
                            {{ $resort->description }}
                        </p>

                        <a class="btn btn-primary btn-sm" href="{{ route('bookings.create', $resort->id) }}"> Book
                            Now</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
 @include('layouts.inc.footer')

@endsection

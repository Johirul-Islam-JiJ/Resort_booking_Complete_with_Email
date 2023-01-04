@extends('layouts.app')
@section('styles')
    <style>
        .w-5 {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row p-3 padding-left-6 mb-2 bg-secondary text-white text-center">
            <h4 class="text-center p-4">Offer and Promotions !</h4>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">30 % Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Turag Resort</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">25% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Rupsa Resort</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">15% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Anondo Park</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">14% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Bhawal Resort</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">45% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Bhawal Resort and Spa</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">55% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Rajendra Eco Resort & Village</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">20% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">The Base Camp</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">40% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Neel Komol Resort</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">60% Discount</div>
                <div class="card-body">
                    <h5 class="card-title">Lakeshore Resort</h5>
                    <p class="card-text">AC/Non-AC,Couple,Single and
                        Family room has many facilities with the discount</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.inc.footer')
@endsection

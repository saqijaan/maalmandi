@extends('user.layouts.master')
@section('page')
<!--===============================
    =            Hero Area            =
    ================================-->
<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                </div>
                <!-- Advance Search -->
                @include('user.layouts.advanceSearch')
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
<!--==========================================
    =            All Category Section            =
    ===========================================-->
<section class=" section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
                <div class="section-title">
                    <h2>All Categories</h2>
                    <p>There are a Lot of categories to Search from. Please click on any category to Filter Related Records</p>
                </div>
                <div class="row">
                    <!-- Category list -->
                    @foreach ($categories as $category)
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <div class="category-block">
                            <div class="header">
                                <a href="{{ $category->postsPath() }}">
                                <i class="fa fa-cutlery icon-bg-1"></i> 
                                    <h4>
                                        {{ $category->name }} 
                                        <p style="display: inline">({{ $category->posts->count() }})</p>
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /Category List -->           
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
@endsection
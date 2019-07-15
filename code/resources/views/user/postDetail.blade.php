@extends('user.layouts.master')

@section('page')
<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                @include('user.layouts.advanceSearch')
            </div>
        </div>
    </div>
</section>

<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
        <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-8">
                <div class="product-details">
                    <h1 class="product-title">{{ $post->title }}</h1>
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="{{ $post->category->postsPath() }}">
                                <span class="label label-info label-many">{{ $post->category->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="{{ $post->city->postsPath() }}">{{ $post->city->name }}</a></li>
                        </ul>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ $post->main_image_path }}" target="_blank">
                                        <img class="card-img-top img-fluid" id="mainImage" src="{{  $post->main_image_path }}"/>
                                    </a>
                                </div>
                            </div>  
                            <div class="row mt-3" id="otherImages">
                                <div class="col">
                                    <img class="card-img-top img-fluid" src="http://maalmandi.test/images/logo.png"/>
                                </div>
                                <div class="col">
                                    <img class="card-img-top img-fluid" src="{{  $post->main_image_path }}"/>
                                </div>
                                <div class="col">
                                    <img class="card-img-top img-fluid" src="{{  $post->main_image_path }}"/>
                                </div>
                            </div>                  
                        </div>
                        <div class="col-md-8 pt-0 content">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Post Details</h3>
                                    <h4 class="tab-title">Price : <i><u>{{ $post->price }}</u></i> Rs.</h4>
                                    <h4 class="tab-title">Seller Name : <i><u>{{ $post->name }}</u></i></h4>
                                    <h4 class="tab-title">Phone : <i><u>{{ $post->phone }}</u></i></h4>
                                    <h4 class="tab-title">Address : <i><u>{{ $post->address }}</u></i></h4>
                                    <p>{{ $post->description }}</p>
                                </div>
                                {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Where to find</h3>
                                    <p>9299 Bernier Lodge Apt. 641
                                        South Ismael, MA 55152
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 pt-5">
                <div class="sidebar">
                    <!-- User Profile widget -->
                    <div class="widget user">
                        <h4>Publisher Details</h4>
                        <ul>
                            <li class="border-bottom border-info p-2"> {{ $post->user->name }}</li>
                            <li class="border-bottom border-info p-2"> {{ $post->user->email }}</li>
                            <li class="border-bottom border-info p-2"> {{ $post->user->phone }}</li>
                            <li class="border-bottom border-info p-2"> {{ $post->user->address }}</li>
                        </ul>
                    </div>
                    <!-- Map Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
@endsection

@section('js')
    <script>
        $(function(){
            $('#otherImages').on('click','img',function(){
                $('#mainImage').attr('src',$(this).attr('src'));
                $("#mainImage").closest('a').attr('href',$(this).attr('src'));
            });
        })
    </script>
@endsection
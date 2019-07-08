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
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>Results For "{{ $category->name }}"</h2>
                    <p>{{ $category->posts->count() }} Results</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach ($categories as $cat)
                                <li><a href="{{ $cat->postsPath() }}">{{ $cat->name }} <span>{{ $cat->posts->count() }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-grid-list">
                    <div class="row mt-30">

                        @foreach ($posts as $post)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <a href="{{ $post->postPath() }}">
                                            <img class="card-img-top img-fluid" src="{{ $post->main_image_path }}"/>
                                        </a>                                        
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ $post->postPath() }}">{{ $post->title }}</a>
                                        </h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="http://mallmandi-old.test/categories/2">
                                                    <i class="fa fa-folder-open-o"></i>{{ $post->category->name }}
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="card-text">{{ $post->description }}</p>
                                        <h4 class="card-text text-danger">Price: {{ $post->price }} Rs.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="pagination justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
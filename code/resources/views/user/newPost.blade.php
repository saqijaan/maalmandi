@extends('user.layouts.master')

@section('page')
<section class="content mb-4">
    <div class="row m-0">
        <div class="col-md-12">
            <h3 class="page-title">
                <div class="container text-light">
                    Create New Post
                </div>
            </h3>
            <form class="container" action="{{ route('user.post.store') }}" enctype="multipart/form-data" method="POST" accept-charset="UTF-8">
                @csrf     
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Title*</label>
                                <input name="title" class="form-control" id="title" required="" type="text" placeholder="" value="">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="description">Description*</label>
                                <textarea name="description" class="form-control h-75" id="description" required="" placeholder="Write down Some Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="city_id">City*</label>
                                <select name="city_id" class="form-control" id="city_id" title="Select City">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="email">Category*</label>
                                <select name="category_id" class="form-control" title="Category Name">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Price*</label>
                                <input name="price" class="form-control" id="Price" required="" type="number" min="0" placeholder="" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="main_image">Image*</label>
                                <input name="main_image" class="form-control" id="main_image" required="" type="file" accept="image/*" placeholder="" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-danger" type="submit" value="Save">
            </form>
        </div>
    </div>
</section>
@endsection
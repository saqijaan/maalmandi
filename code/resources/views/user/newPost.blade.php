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
                                <input name="title" class="form-control" id="title" required="" type="text" placeholder="" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <div class="alert-danger text-light">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="description">Description*</label>
                                <textarea name="description" class="form-control h-75" id="description" required="" placeholder="Write down Some Description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="city_id">City*</label>
                                <select name="city_id" class="form-control" id="city_id" title="Select City">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected':'' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="email">Category*</label>
                                <select name="category_id" class="form-control" title="Category Name">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Price*</label>
                                <input name="price" class="form-control" id="Price" required="" type="number" min="0" placeholder="" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="main_image">Image*</label>
                                <input name="main_image" class="form-control" id="main_image" required="" type="file" accept="image/*" placeholder="" value="">
                            </div>
                        </div>

                        <hr>
                        <h3>Contact Information</h3>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Name*</label>
                                <input name="contact[name]" class="form-control" id="contact[name]" required="" type="text" min="0" placeholder="Name" value="{{ old('contact.name') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Phone*</label>
                                <input name="contact[phone]" class="form-control" id="contact[phone]" required="" type="text" min="0" placeholder="Phone" value="{{ old('contact.phone') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="title">Address*</label>
                                <input name="contact[address]" class="form-control" id="contact[address]" required="" type="text" min="0" placeholder="Address" value="{{ old('contact.address') }}">
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

@section('js')
    {{ print_r(old('contact.name')) }}
@endsection
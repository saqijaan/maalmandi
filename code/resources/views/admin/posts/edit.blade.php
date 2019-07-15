@extends('admin.layouts.master')

@section('page')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Users</h3>
        <form method="POST" action="{{ route('post.update',$post->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Post        
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="title" class="control-label">Title*</label>
                            <input class="form-control" placeholder="" required="" value="{{ old('title',$post->title) }}" name="title" type="text" id="title">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="description" class="control-label">Description*</label>
                            <textarea class="form-control" placeholder="" required="" name="description" type="text" id="description">{{ old('description',$post->description) }}</textarea>
                            @if ($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="city_id" class="control-label">City*</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id',$post->city_id) == $city->id? 'selected':'' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <p class="text-danger">{{ $errors->first('city_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="email" class="control-label">Category*</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id',$post->category_id) == $category->id? 'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <p class="text-danger">{{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="price" class="control-label">Price*</label>
                            <input type="number" min="0" class="form-control" placeholder="" required="" value="{{ old('price',$post->price) }}" name="price" type="text" id="price">
                            @if ($errors->has('price'))
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="main_image" class="control-label">Image*</label>
                            <input class="form-control" type="file" accept="image/*" placeholder="" name="main_image" type="main_image" value="" id="main_image">
                            <img src="{{ $post->main_image_path }}" style="width:100px;height:100px;" alt="">
                            @if ($errors->has('main_image'))
                            <p class="text-danger">{{ $errors->first('main_image') }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="active" class="control-label">Status*</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ old('active',$post->active) == '1' ? 'selected':'' }}>Active</option>
                                <option value="0" {{ old('active',$post->active) == '0' ? 'selected':'' }}>Disabled</option>
                            </select>
                            @if ($errors->has('active'))
                                <p class="text-danger">{{ $errors->first('active') }}</p>
                            @endif
                        </div>
                    </div>

                    <hr>
                    <h3>Contact Details</h3>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="Name" class="control-label">Name*</label>
                            <input type="text" min="0" class="form-control" placeholder="" required="" value="{{ old('contact[name]',$post->name) }}" name="contact[name]" type="text" id="Name">
                            @if ($errors->has('contact_name'))
                                <p class="text-danger">{{ $errors->first('contact_name') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="contact_phone" class="control-label">Contact Phone*</label>
                            <input type="text" min="0" class="form-control" placeholder="" required="" value="{{ old('contact[phone]',$post->phone) }}" name="contact[phone]" type="text" id="contact_phone">
                            @if ($errors->has('contact_phone'))
                                <p class="text-danger">{{ $errors->first('contact_phone') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="contact_address" class="control-label">Contact Address*</label>
                            <input type="text" min="0" class="form-control" placeholder="" required="" value="{{ old('contact[address]',$post->address) }}" name="contact[address]" type="text" id="contact_address">
                            @if ($errors->has('contact_address'))
                                <p class="text-danger">{{ $errors->first('contact_address') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <input class="btn btn-danger" type="submit" value="Save">
        </form>
    </div>
</div>

@endsection
@extends('admin.layouts.master')

@section('page')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Edit city</h3>
        <form method="POST" action="{{ route('city.update',$city->id) }}" accept-charset="UTF-8">
            @csrf
            @method('PUT')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit city        
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="name" class="control-label">Name*</label>
                            <input class="form-control" placeholder="" value="{{ old('name',$city->name) }}" required="" name="name" type="text" id="name">
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
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
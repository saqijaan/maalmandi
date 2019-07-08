@extends('admin.layouts.master')

@section('page')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Users</h3>
        <form method="POST" action="{{ route('user.update',$user->id) }}" accept-charset="UTF-8">
            @csrf
            @method('PUT')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create        
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="name" class="control-label">Name*</label>
                            <input class="form-control" placeholder="" value="{{ old('name',$user->name) }}" required="" name="name" type="text" id="name">
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="name" class="control-label">Phone*</label>
                            <input class="form-control" placeholder="" required="" value="{{ old('phone',$user->phone) }}" name="phone" type="text" id="phone">
                            @if ($errors->has('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="email" class="control-label">Email*</label>
                            <input class="form-control" placeholder="" required="" value="{{ old('email',$user->email) }}" name="email" type="email" id="email">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="password" class="control-label">Password*</label>
                            <input class="form-control" placeholder="" name="password" type="password" value="" id="password">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="password" class="control-label">Confirm Password*</label>
                            <input class="form-control" placeholder="" name="password_confirmation" type="password" value="" id="password">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="status" class="control-label">Status*</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status',$user->status) == '1' ? 'selected':'' }}>Active</option>
                                <option value="0" {{ old('status',$user->status) == '0' ? 'selected':'' }}>Disabled</option>
                            </select>
                            @if ($errors->has('status'))
                                <p class="text-danger">{{ $errors->first('status') }}</p>
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
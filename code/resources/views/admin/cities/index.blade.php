@extends('admin.layouts.master')

@section('page')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Cities</h3>
        <p>
            <a href="{{ route('city.create') }}" class="btn btn-success">Add new</a>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading">
                List        
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped datatable  dt-select ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                        <tr>
                            <td>{{ $city->name }}</td>
                            <td>
                                <a href="{{ route('city.edit',$city->id) }}" class="btn btn-xs btn-info">Edit</a>
                                <form method="POST" action="{{ route('city.destroy',$city->id) }}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(&#039;Are you sure?&#039;);"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="VwswwFEfOs3wQucy1dV57z349Iulha5ZgHuCDhTK">
                                    @csrf
                                    @method('Delete')
                                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
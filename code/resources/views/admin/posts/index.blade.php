@extends('admin.layouts.master')

@section('page')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">Posts</h3>
        <p>
            <a href="{{ route('post.create') }}" class="btn btn-success">Add new</a>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading">
                List        
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped datatable  dt-select ">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>City</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->city->name }}</td>
                            <td>{{ $post->description }}</td>
                            <td><img style="width:150px;height:100px;" src="{{ $post->main_image_path }}"></td>
                            <td>{{ $post->user ?$post->user->name:'' }}</td>
                            <td>{{ $post->actives ?'Active':'Disabled' }}</td>
                            <td>
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-xs btn-info">Edit</a>
                                <form method="POST" action="{{ route('post.destroy',$post->id) }}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(&#039;Are you sure?&#039;);"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="VwswwFEfOs3wQucy1dV57z349Iulha5ZgHuCDhTK">
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
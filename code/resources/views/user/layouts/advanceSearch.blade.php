@if (\Request::route()->getName() != 'user.home')
<style>
        .advance-search .form-control{
            background:#5672f9;
        }
    </style>
@endif
<div class="advance-search">
        <form method="GET" action="{{ route('user.posts.search') }}" accept-charset="UTF-8">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input class="form-control" placeholder="Searh By Post Name" name="search" type="text">
                    <p class="help-block"></p>
                </div>
                <div class="form-group col-md-3">
                    <select class="form-control form-control-lg" name="category" title="Search By Category">
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <p class="help-block"></p>
                </div>
                <div class="form-group col-md-3">
                    <select class="form-control form-control-lg" name="city" title="Search By City">
                        @foreach ($cities as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <p class="help-block"></p>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit"
                        class="btn btn-primary">
                    Search Now
                    </button>
                </div>
            </div>
        </form>
    </div>
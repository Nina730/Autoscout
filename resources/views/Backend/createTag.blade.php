@extends('Backend.dashboard')
@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="margin-top: 50px;">
        <h3 style="text-decoration: underline;">List Tags</h3><br>
        <ul class="nav navbar-nav">
            @if(!empty($tags))
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Tag ID</th>
                            <th>Tag Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                        </tr>
                        @empty
                            <li>No Tag</li>
                        @endforelse
                        </tbody>  
                    </table>
                </div>
            @endif
        </ul>
        <br><br>
        <form action="{{route('admin.tags.store')}}" method="post" role="form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Tag name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Tag name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection
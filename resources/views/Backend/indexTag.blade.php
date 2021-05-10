@extends('Backend.dashboard')
@section('content')
<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="margin-top: 50px;">
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
        </main>
@endsection
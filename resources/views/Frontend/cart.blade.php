@extends('layouts.app')
@section('content')

@if(Session::has('cart'))
 <div class="container">
    <div class="row">
       <div class="col-sm-s col-md-6 col-md-offset-3 col-sm-offset-3">
          <ul class="list-group">
                @foreach($autos as $key=>$auto)
                    <li class="list-group-item">
                        <span class="badge">{{$auto['qty']}}</span>
                        <strong>{{$auto['item']['model']}}</strong>
                        <span class="label label-success">$ {{$auto['price']}}</span>
                        <div class="btn-group">
                        <button type="button" id="delete" class="btn btn-danger btn-xs" value="{{$key}}">Delete </button>
                    </div>
                    </li>
                @endforeach
          </ul>
       </div>
    </div>
    <form action="{{route('processPaypal')}}"  method="POST" >
        @csrf
        <input type="hidden" name="autos[]" value="{{ json_encode($autos,TRUE) }}">
        <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
            <div class="row">
                <div class="col-sm-s col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total:${{$totalPrice}}</strong>
                </div>
            </div>
        <hr>
        <div class="row">
            <div class="col-sm-s col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="submit" class="btn btn-success">Checkout</button>
            </div>
        </div>
    </form>
@push('scripts')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    var array =  {!! json_encode($autos) !!};
    $('.btn-group').click('.btn-danger', function(e) {
     item=e.target.value
     console.log(item)
     var key = item;
     delete array[key];
     console.log(e.target)
     $(this).parent().remove();
     console.log(array)
});
</script>
@endpush
@else
    <div class="row">
            <div class="col-sm-s col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
    </div>
@endif
</div>
@endsection


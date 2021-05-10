@extends('layouts.app')
@section('content')
<div class="container">
 <header class="section-heading mb-5">
       <div class="row align-items-center">
            <div class="col-lg-2 col-6">
               <h3><a href="" class="brand-wrap">
                  Our Cars   </a>
               </h3>
            </div>
            <div class="col-lg-6 col-12 col-sm-12">
               <form action="{{route('search')}}" class="search">
                  @csrf
                  <div class="input-group w-100">
                     <input type="text" name="search" class="form-control" placeholder="Search" required>
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
        </div>
 </header>
   <div class="row">
      <div class="col-sm-6">
         <div class = "product-imgs">
            <div class = "img-display">
              <div class = "img-showcase">
                  <img src="{{('/images/'. $auto->image)}}">
              </div>
            </div>
          </div>
      </div>
      <div class="col-sm-6" style="margin-top:30px;">
         <a href="/"> Go Back </a><br><br>
            <h2>{{$auto->brand}}</h2>
               <h3>Model: {{$auto->model}}</h3>
                  <h3>Price: ${{$auto->price}}</h3>
                     <a href="{{route('addToCart', $auto->id)}}"><button class="butoni">Add to Cart</button>
                  <br>
                  <br>
                  <h5><b>Tags: <a href="">{{ $auto->tags->pluck('name')->implode(',')}} </a></b></h5><br>
      </div>
   </div>
</div>
<style>
 .butoni{
   color:white;
   padding:2px;
   background-color:green;
   border-radius:1px!important;
   }
            
</style>
@endsection
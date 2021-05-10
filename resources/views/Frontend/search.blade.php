@extends('layouts.app')
@section('content')
<a href="{{ url('/') }}" style="margin-left:20px;"> Go Back </a><br><br>
@if($auto->isNotEmpty())
<section class="section-name " style="padding-bottom:40px;">
   <div class="container">
      <header class="section-heading mb-5">
         <div class="row align-items-center">
            <div class="col-lg-2 col-6">
               <h3><a href="{{ url('/') }}" class="brand-wrap">
                Our Cars   </a>
               </h3>
               <!-- brand-wrap.// -->
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
               <!-- search-wrap .end// -->
            </div>
         </div>
      </header>
      <div class="row">
         @foreach($auto as $a)
         <div class="col-xs-4 col-sm-3">
            <figure class="itemBox">
               <a href="{{ route('show', $a->id) }}">
                   <img src="{{('/images/'. $a->image)}}">
                  <figcaption class="border-top pt-2 ">{{$a->model}}</figcaption>
                  <div class="price">${{$a->price}}</div>
                  <div class="contents">
                  <a href="{{route('addToCart', $a->id)}}"><button class="butoni">Add to Cart</button>
                  </div>
               </a>
            </figure>
         </div>
         @endforeach 
      </div>
   </div>
</section>
@else 
<div class="container">
   <div class="row">
      <div class="col-sm-6">
         <h2>No auto found</h2>
      </div>
   </div>
</div>
@endif
<style>
            .butoni{
            color:white;
            padding:2px;
            background-color:green;
            border-radius:1px!important;
            }
            
     </style>
@endsection
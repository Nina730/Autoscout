@extends('backend.dashboard')
@section('content')
<div class="forma" style="width:50%; padding-left:200px;" >
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2><b> One of our cars</b></h2>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 "style="margin-top:20px;">
         <div class="form-group">
            <strong>BRAND:</strong>
            {{ $auto->brand }}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>MODEL:</strong>
            {{ $auto->model }}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>ENGINE_SIZE:</strong>
            {{ $auto->engine_size }}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>PRICE:</strong>
            ${{ $auto->price }}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>REGISTRATION_DATE:</strong>
            {{ $auto->registration_date }}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>CATEGORIES:</strong>
           {{ $auto->tags->pluck('name')->implode(',')}}
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
           <img src="{{('/images/'. $auto->image)}}">
         </div>
      </div>
   </div>
</div>
@endsection
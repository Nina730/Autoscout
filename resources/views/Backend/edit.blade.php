@extends('Backend.dashboard')
@section('content')
<div class="container center_div" style="width:50%"; >
@if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
@endif
<form action="{{route('admin.autos.update',$auto->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
      <div class="form-group" >
         <label for="exampleFormControlInput1">Brand</label>
         <input type="text" class="form-control" name="brand" value="{{$auto->brand}}">
      </div>
      <div class="form-group" >
         <label for="exampleFormControlInput1">Model</label>
         <input type="text" class="form-control" name="model" value="{{$auto->model}}">
      </div>
      <div class="form-group" >
         <label for="exampleFormControlInput1">Engine_Size</label>
         <input type="text" name="engine_size"  class="form-control" value="{{$auto->engine_size}}" >
      </div>
      <div class="form-group" >
         <label for="exampleFormControlInput1">Price</label>
         <input type="text" name="price"  class="form-control" value="{{$auto->price}}" >
     </div>
     <div class="form-group" >
         <label for="exampleFormControlInput1">Registration_date</label>
         <input type="date" name="registration_date"  class="form-control" value="{{$auto->registration_date}}" >
      </div>
      <div class="form-group" >
         <label for="exampleFormControlInput1">Image</label>
         <input type="file" id="myfile" name="image" value="{{$auto->image}}">
         <img id="img" src="#" alt="" />
       </div>
     <div class="form-group" >
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
   function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#img').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }
      $("#myfile").change(function() {
       readURL(this);
      });
</script>
@endsection
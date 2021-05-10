@extends('backend.dashboard')
@section('content')
<div class="forma" style="width:50%; padding-left:200px;" >
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
   <form action="{{route('admin.autos.store')}}" method="POST"  enctype="multipart/form-data">
      @csrf
      <div class="form-group" >
         <label for="exampleFormControlInput1">Brand</label>
         <input type="text" name="brand"  class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="form-group" >
         <label for="exampleFormControlInput1">Model</label>
         <input type="text" name="model"  class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="form-group" >
         <label for="exampleFormControlInput1">Engine_Size</label>
         <input type="text" name="engine_size"  class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="form-group" >
         <label for="exampleFormControlInput1">Price</label>
         <input type="text" name="price"  class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="form-group" >
         <label for="exampleFormControlInput1">Registration_date</label>
         <input type="date" name="registration_date"  class="form-control" id="exampleFormControlInput1" >
      </div>

      <div class="form-group">
        <label class="control-label">Choose tags</label>
        <select data-placeholder="Begin typing a name to filter..." multiple="multiple" class="chosen-select" name="tag_id[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group" >
         <label for="exampleFormControlInput1">Image</label>
         <input type="file" id="myfile" name="image">
         <img id="img" src="#" alt="" />
      </div>

      <div class="form-group" >
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      
   </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
$(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})
</script>
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
@extends('Backend.dashboard')
@section('content')
@if($autos->isNotEmpty())
<div class="container" style="margin-left:70px;">
   <table class="table table-bordered">
      <thead>
         <tr>
            <th>BRAND</th>
            <th>MODEL</th>
            <th>ENG_SIZE</th>
            <th>PRICE</th>
            <th>REGISTRATION_DATE</th>
            <th>IMAGE</th>
            <th width="300px;">ACTION</th>
         </tr>
      </thead>
      <tbody>
         @if(!empty($autos))
         @foreach($autos as $key => $auto)
         <tr>
            <td>{{ $auto->brand }}</td>
            <td>{{ $auto->model }}</td>
            <td>{{ $auto->engine_size }}</td>
            <td>${{ $auto->price }}</td>
            <td>{{ $auto->registration_date }}</td>
            <td><img src="{{('/images/'. $auto->image)}}" style="width:70px; height:70px;"> </td>
            <td>
               <div class="row">
                  <div class="col-md-6">
                     <a  href="{{route('admin.autos.edit', $auto->id)}}" class="btn btn-warning">Edit</a>
                     <a href="{{route('admin.autos.show', $auto->id)}}"  class="btn btn-secondary">Show</a>
                  </div>
                  <div class="col-md-6">
                     <a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="submit" class="btn btn-danger">Delete</button></a>
                     <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                           <div class="modal-content">
                              <div class="modal-header flex-column">
                                 <div class="icon-box">
                                    <i class="material-icons">&#xE5CD;</i>
                                 </div>
                                 <h4 class="modal-title w-100">Are you sure?</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <p>Do you really want to delete this auto? This process cannot be undone.</p>
                              </div>
                              <div class="modal-footer justify-content-center">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 <form action="{{route('admin.autos.destroy', $auto->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </td>
         </tr>
         @endforeach
         @else
         <tr>
            <td colspan="10">There are no data.</td>
         </tr>
         @endif
      </tbody>
   </table>
   {{ $autos->links() }}  
</div>
@else 
<div class="container">
   <div class="row">
      <div class="col-sm-6">
         <h2>No auto found</h2>
      </div>
   </div>
</div>
@endif
@endsection
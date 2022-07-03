@extends('admin.layouts.adminhome')
@section('title', 'Users')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success" id ="message">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h2 class="my-3">Users</h2>
    <table class="table table-striped table-dark" id="datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Member Since</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    @if(Auth::user()->id != $user->id)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at->format('j F, Y')}}</td>
      <td>{{$user->status == 0 ? 'Active' : 'Inactive'}} </td>
      <td class="text-center">
      <ul class="list-inline m-0">
            <li class="list-inline-item">
              <input type="checkbox"  data-toggle="toggle" data-style="slow" data-size="xs" onChange="getStatus(this)" id="getStatus" value="{{$user->id}}" {{$user->status == 1 ? 'checked' : ''}} >
            </li>
            <li class="list-inline-item">
               <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="POST">
                  @csrf
                  {{ method_field("GET") }}
                 <button class="btn btn-success btn-sm rounded-0 button-height" type="submit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
            </form>
            </li>
            <li class="list-inline-item">
              <form action="{{ URL::route('users.destroy', ['user' => $user->id]) }}" method="POST">
               @csrf
               {{ method_field("DELETE") }}
                  <button class="btn btn-danger btn-sm rounded-0 button-height delete-confirm" id="delete" type="submit" data-toggle="tooltip" onsubmit="confirmDelete(this.)" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
            </li>
        </ul>
      </td>
    </tr>
    @endif
    @endforeach

  </tbody>
</table>
    </div>
    <div class="col-md-1"></div>
</div>

@endsection

@section('script')
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
} );

$('[data-toggle="tooltip"]').tooltip();

  function getStatus(status) {
     var status= $('#getStatus').prop('checked');
     var id = $('#getStatus').val();
     $.ajax({
      url: "{{url('changeStatus')}}",
      method : "POST",
      data : {id, status, _token:"{{csrf_token()}}"},
      success: function(response) {
        if(response) {
                $("#message").html(response.message);
                window.location.reload();
          }
      }
     });

   }

$('.delete-confirm').click(function(event) {
     var form =  $(this).closest("form");

     event.preventDefault();
     swal({
         title: `Are you sure you want to delete this record?`,
         text: "If you delete this, it will be gone forever.",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
         form.submit();
       }
     });
 });
</script>

@endsection

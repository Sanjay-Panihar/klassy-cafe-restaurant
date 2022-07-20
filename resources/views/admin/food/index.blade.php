@extends('admin.layouts.adminhome')

@section('title' , 'Food')

@section('content')
  @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-6">
          <h2 class="my-3">Food</h2>
        </div>
        <div class="col-md-6">
          <a href="{{ route('food.create') }}" class="btn btn-success my-3 pull-right">Create Food</a>
        </div>
      </div>
    <table class="table table-striped table-dark" id="datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Price</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($foods as $food)
    <tr>
      <th scope="row">{{$food->id}}</th>
      <td>{{$food->price}}</td>
      <td>{{$food->title}}</td>
      <td>{{ Str::limit($food->description, 50) }}</td>
      <td> <img src="{{ asset('/storage/images/' . $food->photo) }}" height="250" width="200"/> </td>
      <td class="text-center">
      <ul class="list-inline m-0">
            <li class="list-inline-item">
                 <a class="btn btn-success btn-sm rounded-0 button-height"  href="{{ route('food.edit', ['food' => $food->id]) }}"><i class="fa fa-edit"></i></a>
            </li>
            <li class="list-inline-item">
              <form action="{{ URL::route('food.destroy', ['food' => $food->id]) }}" method="POST">
               @csrf
               {{ method_field("DELETE") }}
                  <button class="btn btn-danger btn-sm rounded-0 button-height delete-confirm" id="delete" type="submit" data-toggle="tooltip" onsubmit="confirmDelete(this.)" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                </form>
            </li>
        </ul>
      </td>
    </tr>

    @endforeach

  </tbody>
  </table>
    </div>
    <div class="col-md-2"> </div>
  </div>

  @endsection

  @section('script')
  <script>
      $(document).ready( function () {
      $('#datatable').DataTable();
  } );

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

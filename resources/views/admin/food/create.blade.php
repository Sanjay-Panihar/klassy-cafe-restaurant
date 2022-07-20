@extends('admin.layouts.adminhome')

@section('title', 'Create Food')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-2 my-3">
        <h3>Create Food</h3>
      </div>
      <div class="col-md-8">
        <a href="/food" class="btn btn-success my-3 pull-right">Back</a>
      </div>
      <div class="col-md-2">

      </div>
    </div>
    <div class="row">
      <form class="" action="{{ route('food.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Title" autocomplete="off" class="form-control @error('title') is-invalid @enderror">
          @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" value="{{ old('price') }}" placeholder="Enter Price" autocomplete="off" class="form-control @error('price') is-invalid @enderror">
          @error('price')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" value="{{ old('description') }}" placeholder="Enter Description" class="form-control @error('description') is-invalid @enderror"  rows="4">
          </textarea>
          @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Photo</label>
          <input type="file" name="image" class="form-control @error('photo') is-invalid @enderror">
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
          <input type="submit" name="submit" value="Save" class="btn btn-success">
      </form>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
@endsection

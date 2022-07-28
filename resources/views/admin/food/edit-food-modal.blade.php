<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Food</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="foodData">
      <form class="" action="{{ route('food.update', ['food' => $food->id])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" value=" {{ old ('price') }}" class="form-control" id="price">
          @error('price')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="{{ old ('title') }}" class="form-control" id="title">
          @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" rows="8" cols="40" class="form-control" id="description">{{ old ('description') }}</textarea>
          @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" value="" class="form-control">
          @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

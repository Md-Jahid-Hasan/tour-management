@extends('base')

@section('java-script')
<script>
      tinymce.init({
        selector: 'textarea#description',
        plugins: 'lists advlist link'
      });
</script>
@endsection


@section('content')

<form action="{{ route('article') }}" method="POST">
@csrf

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Article Title">
</div>

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="Articel name">
</div>

<div class="mb-3">
  <label for="desscription" class="form-label">Description</label>
  <textarea class="form-control" id="description" name="description" rows="7"></textarea>
</div>

<div class="mb-3">
  <label for="tag" class="form-label">Title</label>
  <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag should be separated by comma and dont use unwanted space">
</div>
<button type="submit" class="btn btn-secondary">Save</button>
</form>
@endsection
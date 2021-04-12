@extends('base')

@section('content')

    <form>
    <div class="mb-3 row">
        <label for="tag" class="col-sm-2 col-form-label">Room Tag</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('tag') border border-danger border-2 @enderror"
            id="tag" name="tag" placeholder="Your Tag" value="{{old('tag')}}">
            @error('tag')
            {{$message}}
            @enderror
        </div>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div>

    </form>

@endsection

  
<div class="form-group">
    <label for="discription">discription</label>
    <input type="text" class="form-control @error('discription') is-invalid @enderror"
     name="discription" id="discription" value="{{old('discription',$blogs->discription)}}">
    @error('discription')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="image">image</label>
    <div class="d-flex">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
         id="image">
        @if($blogs->image)
        <img class="rounded border" src="{{asset ('/images/books/'.$blogs->image)}}" height="150px">
        @endif
    </div>
    @error('image')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>
           
  <button type="submit" class="btn btn-primary"><i class="fa fa-folder"> save </i></button>
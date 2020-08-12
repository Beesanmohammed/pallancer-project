@csrf

<div class="form-group">

    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
    id="name" value="{{ old('name', $book->name) }}">
    @error('name')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">category ID</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="{{old('category_id'),$book->category_id}}">Select Category</option>

        @foreach (App\Category::all() as $cat)

        <option @if($cat->id == $book->category_id) selected @endif
            value="{{ $cat->id }}" > {{ $cat->name }}</option>

        @endforeach

    </select>
    @error('category_id')
    <p class="text-danger">{{ $message }}</p>
    @enderror

</div>

<div class="form-group">
    <label for="auther">auther</label>
    <input type="text" class="form-control @error('auther') is-invalid @enderror" name="auther" id="auther" value="{{ old('auther', $book->auther) }}">

    @error('auther')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="discription">discription</label>
    <input type="text" class="form-control @error('discription') is-invalid @enderror" name="discription" id="discription" value="{{old('discription',$book->discription)}}">
    @error('discription')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="image">image</label>
    <div class="d-flex">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
         id="image">
        @if($book->image)
        <img class="rounded border" src="{{asset ('/images/books/'.$book->image)}}" height="150px">
        @endif
    </div>
    @error('image')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="file">File</label>
    <div class="d-flex">
        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file"
         id="file">
        @if($book->file)
        <img class="rounded border" src="{{asset ('/images/books/'.$book->file)}}" height="150px">
        @endif
    </div>
    @error('file')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>


<button type="submit" class="btn btn-primary"><i class="fa fa-folder">save</i></button>


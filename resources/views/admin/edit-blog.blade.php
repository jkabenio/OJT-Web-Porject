@extends('layouts.admin-app')
@section('content')

<style>
  body {
      margin: 0;
      padding: 0;
      background-color: #1d2634;
      color: #9e9ea4;
      font-family: "Montserrat", sans-serif;
  }
  .main-container {
      grid-area: main;
      overflow-y: auto;
      padding: 20px 20px;
      color: rgba(255, 255, 255, 0.95);
  } 
  .grid-container {
      display: grid;
      grid-template-columns: 260px 1fr 1fr 1fr;
      grid-template-rows: 0.2fr 3fr;
      grid-template-areas:
      "sidebar header header header"
      "sidebar main main main";
      height: 100vh;
  }
  .main-title {
      display: flex;
      justify-content: space-between;
  }
  /* Form Style */
  .form-body {
        max-width: 600px;
        margin: 0 auto;
        background-color: #263043;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
      }
   
  .form-body label {
      display: block;
      margin-top: 10px;
      margin-bottom: 10px;
      color: #9e9ea4;
      font-weight: bold;
      text-align: left;
  }
  
  .form-control{
      background-color: #1d2634;
      border: 1px solid rgb(124, 124, 124);
      color: white;
  } 
  .form-control:focus{
      background-color: #313f55;
      color: rgb(255, 255, 255);
  }
  .form-body button {
    padding: 10px 20px;
    background-color: #008CBA;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
  }
  
  input[type="file"]::-webkit-file-upload-button {
    padding: 10px 20px;
    background-color: #008CBA;
    margin-bottom: 10px;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
  }
  
  input {
      display: block;
  }
  .hint, #blogDescHint, #blogTitleHint  {
  font-size: 12px;
  color: #ff1e1e;
  margin-bottom: 5px;
}
.hint{
  font-size: 12px;
  color: #999;
  margin-bottom: 5px;
} 
#blogTitleCount, #blogDescCount{
    font-size: 12px;
    color: #999;
    margin-bottom: 5px;
    float: right;
}
  </style>

<main class="main-container">
    <div class="error">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" style="text-align: center">
                {{$error}}
            </div>
            @endforeach
        @endif

        @if(session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="text-align: center">
                {{session('error')}}
            </div>
        @endif
    </div>
    <h4 class="main-title">Edit Blog</h4>
    <br><br>
{!! Form::open(['action' => ['App\Http\Controllers\BlogController@updateBlog',$blog_id->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    @method('PUT')
    <div class="form-body">

        <div>
            <label for="blog_title">Title:</label>
            <div id="blogTitleCount"></div>
            <input class="form-control @error('blog_title') is-invalid @enderror" type="text" name="blog_title" value="{{ $blog_id->blog_title }}" required minlength="5" maxlength="50" oninput="updateBlogTitleCount(this)">
            <span id="blogTitleHint"></span>
        </div>

        <div>
            <label for="blog_desc">Description:</label>
            <div id="blogDescCount"></div>
            <textarea class="form-control @error('blog_desc') is-invalid @enderror" name="blog_desc" rows="10" required minlength="20" maxlength="2000" oninput="updateBlogDescriptionCount(this)">{{ old('blog_desc',$blog_id->blog_desc) }}</textarea>
            <span id="blogDescHint"></span>
        </div> 
        <div>
            <label class="main-title"for="blog_comment">Change Image</label>
            {{ Form::file('blog_img', ['id' => 'blog_img_input', 'accept' => 'image/jpeg, image/png, image/jpg, image/HEIC', 'maxlength' => '50048', 'onchange' => 'showSelectedImage()']) }}
            <span class="hint">You can upload an image file (JPEG, PNG, JPG, HEIC) up to 50MB.</span>
        </div>
        <br>
        <figure>
            <figcaption style="color:red">Below is the current Image</figcaption>
            <img id="selected_image" src="{{ asset('storage/upload_img/'.$blog_id->blog_img) }}" width="400px" height="250px" alt="Image">
        </figure>

        <br>
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
{!! Form::close() !!}
</main>
<script>
    function showSelectedImage() {
        const input = document.getElementById('blog_img_input');
        const selectedImage = document.getElementById('selected_image');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                selectedImage.setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } 
</script>
@endsection

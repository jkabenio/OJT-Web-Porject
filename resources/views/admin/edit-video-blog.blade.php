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
    .hint, #videoBlogDescHint, #videoBlogTitleHint {
        font-size: 12px;
        color: #ff1e1e;
        margin-bottom: 5px;
    }
    .hint{
        font-size: 12px;
        color: #999;
        margin-bottom: 5px;
    } 
    #videoBlogTitleCount, #videoBlogDescCount{
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
    <h4 class="main-title">Edit Video Blog</h4>
    <br><br>
    {!! Form::open(['action' => ['App\Http\Controllers\VideoController@updateVideoBlog',$video_id->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
    @method('PUT') 
    <div class="form-body">
        <div>
            <label for="video_title">Title:</label>
            <div id="videoBlogTitleCount"></div> 
            <input id="video_title" type="text" class="form-control @error('video_title') is-invalid @enderror" name="video_title" value="{{ old('video_title', $video_id->video_title) }}" required minlength="5" maxlength="100" oninput="updateVideoBlogTitleCount(this)">
            <span id="videoBlogTitleHint"></span>
        </div>
        
        <div>
            <label for="video_description">Description:</label>
            <div id="videoBlogDescCount"></div>
            <textarea id="video_description" class="form-control @error('video_description') is-invalid @enderror" name="video_description" rows="10" required minlength="20" maxlength="2000" oninput="updateVideoBlogDescriptionCount(this)">{{ old('video_description', $video_id->video_description) }}</textarea>
            <span id="videoBlogDescHint"></span>
        </div>
        
        {{-- <div>
            <label class="main-title"for="thumbnail">Change Video Thumbnail</label>
            {{ Form::file('video_thumbnail_path', ['class' => 'form-control-file']) }}
            <figure>
                <figcaption style="color:red">The image below is the current video thumbnail</figcaption>
                <img src="{{ Storage::url($video_id->video_thumbnail_path) }}" width="400px" height="250px" alt="Thumbnail">
            </figure>   
        </div> --}}
        <div> 
            <label class="main-title"for="video">Change Video</label>   
            {{ Form::file('video_path', ['id' => 'video_path_input', 'accept' => 'video/mp4, video/mov, video/avi', 'maxlength' => '500240', 'onchange' => 'showSelectedVideo()']) }}
            <span class="hint">You can upload an video file (MP4,MOV,AVI) up to 500MB.</span>
            <figcaption style="color: #999; font-size: 12px">Below is the current video.</figcaption>
            <video id="selected_video" src="{{asset('storage/upload_vid/'.$video_id->video_path)}}" width="100%" height="100%" controls>
            </video>
        </div> 
        
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
{!! Form::close() !!}
</main>
<script>
    function showSelectedVideo() {
        const input = document.getElementById('video_path_input');
        const selectedImage = document.getElementById('selected_video');
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

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
    
    .form-body button {
      padding: 10px 20px;
      background-color: #008CBA;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
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

.hint, #productDescHint, #productTitleHint  {
  font-size: 12px;
  color: #ff1e1e;
  margin-bottom: 5px;
}
.hint{
  font-size: 12px;
  color: #999;
  margin-bottom: 5px;
} 
#productTitleCount, #productDescCount{
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
    <h4 class="main-title">Add New Product</h4>
    <br><br>
    {!! Form::open(['action' => 'App\Http\Controllers\ProductController@storeProduct', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{csrf_field()}}

        <div class="form-body">
            <div>
                <label for="">Category</label>
                    <select name="prod_cat_id" class="form-control" required>
                        <option selected disabled>--Select the product category--</option>
                        @foreach ($category_id  as $cateitem)
                            <option value="{{$cateitem->id}}" {{ old('prod_cat_id') == $cateitem->id ? 'selected' : '' }}>{{$cateitem->cat_title}}</option>
                        @endforeach
                    </select> 
            </div>

            <div>
                <label class="product_label" for="prod_title">Product Title</label>
                <div id="productTitleCount"></div>
                <input type="text" id="prod_title" class="form-control @error('prod_title') is-invalid @enderror" name="prod_title" value="{{ old('prod_title') }}" required minlength="5" maxlength="50" oninput="updateProductTitleCount(this)">
                <span id="productTitleHint"></span>
            </div>

            <div>
                <label class="main-title" for="prod_description">Description</label>
                <div id="productDescCount"></div>
                <textarea type="text" id="prod_description" class="form-control @error('prod_description') is-invalid @enderror" name="prod_description" value="{{ old('prod_description') }}" style="width: 560px; height:300px" required minlength="20" maxlength="500" oninput="updateProductDescriptionCount(this)">{{ old('prod_description') }}</textarea>
                <span id="productDescHint"></span>
            </div>

            <div>
                <label class="main-title" for="cat_comment">Change Image</label>
                {{ Form::file('prod_img', ['id' => 'prod_img_input', 'accept' => 'image/jpeg, image/png, image/jpg, image/HEIC', 'maxlength' => '50048', 'onchange' => 'showSelectedImage()']) }}
                <span class="hint">You can upload an image file (JPEG, PNG, JPG, HEIC) up to 50MB.</span>
            </div>
            <figure>
                <figcaption style="color: #999; font-size: 12px">Below is the current image</figcaption>
                <img id="selected_image" src="" width="400px" height="250px" alt="NO SELECTED IMAGE">
            </figure>
            <div>
                <button class="btn btn-primary" type="submit">Post</button>
            </div>
        </div>
    {!! Form::close() !!}
</main>
<script>
    function showSelectedImage() {
        const input = document.getElementById('prod_img_input');
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

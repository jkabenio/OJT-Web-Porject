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
    .form-body{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  width: 90%;
  height: 450px;
  background-color: rgb(228, 224, 224);
  padding: 10px;
  color: black;
  border: 1px solid #ddd;
  box-shadow: 0 0 30px rgba(0, 26, 255, 0.2);
  transition: box-shadow 0.3s ease;
}

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: auto;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid rgb(117, 117, 117);
        background-color: #f1f1f1;
        color: #000000;
    }

    th {
        background-color: rgb(1,99,174);
        /* font-weight: bold; */
        font-weight: 100;
        text-align: center;
        font-size: 15px;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #29323f;

    }

/* Search Bar */
.search-wrapper {
  position: relative;
 margin-left: 135px;
}
.trash-btn-column{
    float: left;
    width: 33.33%;
}

#input-prod-search-id {
  padding: 5px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  background-color: #f1f1f1;
  outline: none;
}

#input-prod-search-id::placeholder {
  color: #aaa;
  font-style: italic;
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
    <h4 class="main-title">Trash List</h4>
    <br><br>
    @php
    $row_count = 1;
@endphp

<table>
    
    <thead>
        <tr>
            <div class="search-wrapper">
                <div class="trash-btn-column">
                    <input type="search" name="productsearch" id="input-prod-search-id" placeholder="Search by: Title or Description"/>
                </div>
                <div class="trash-btn-column">
                    <form action="{{ route('admin.restore-all-soft-deletes') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Restore All Soft Deletes</button>
                    </form>
                </div>
                <div class="trash-btn-column">
                    <form action="{{ route('admin.delete-all-soft-deletes') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete All Soft Deletes</button>
                    </form>
                </div>
            </div>
            <th>No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Restore</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trashed_category as $item)
            <tr>

                <td style="text-align:center">{{$row_count}}.</td>
                <td>{{$item->cat_title}}</td>
                <td>{{$item->cat_description}}</td>
                <td style="text-align:center"><img src="{{ asset('storage/upload_img/'.$item->cat_img) }}" width="50px" height="50px" alt="Image"></td>
                <td style="text-align:center">
                    <a href="{{url ('/admin/restore-category/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
                </td>
                <td style="text-align:center">
                    <a href="{{ route('admin.permanent-delete-category', ['category_id' => $item->id]) }}"
                        onclick="event.preventDefault();
                                 if(confirm('Are you sure you want to permanently delete this item?')) {
                                     document.getElementById('delete-form-{{ $item->id }}').submit();
                                 }">
                        <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                     </a>

                     <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-category', ['category_id' => $item->id]) }}" method="POST" style="display: none;">
                         @csrf
                         @method('DELETE')
                     </form>
                </td>
            </tr>
            @php
                $row_count++;
            @endphp
        @endforeach
        @foreach ($trashed_product as $item)
            <tr>

                <td style="text-align:center">{{$row_count}}.</td>
                <td>{{$item->prod_title}}</td>
                <td>{{$item->prod_description}}</td>
                <td style="text-align:center"><img src="{{ asset('storage/upload_img/'.$item->prod_img) }}" width="50px" height="50px" alt="Image"></td>
                <td style="text-align:center">
                    <a href="{{url ('/admin/restore-product/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
                </td>
                <td style="text-align:center">
                    <a href="{{ route('admin.permanent-delete-product', ['product_id' => $item->id]) }}"
                        onclick="event.preventDefault();
                                 if(confirm('Are you sure you want to permanently delete this item?')) {
                                     document.getElementById('delete-form-{{ $item->id }}').submit();
                                 }">
                        <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                     </a>

                     <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-product', ['product_id' => $item->id]) }}" method="POST" style="display: none;">
                         @csrf
                         @method('DELETE')
                     </form>
                </td>
            </tr>
            @php
                $row_count++;
            @endphp
        @endforeach
        {{-- Blog --}}
        @foreach ($trashed_blog as $item)
            <tr>

                <td style="text-align:center">{{$row_count}}.</td>
                <td>{{$item->blog_title}}</td>
                <td>{{$item->blog_desc}}</td>
                <td style="text-align:center"><img src="{{ asset('storage/upload_img/'.$item->blog_img) }}" width="50px" height="50px" alt="Image"></td>
                <td style="text-align:center">
                    <a href="{{url ('/admin/restore-blog/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
                </td>
                <td style="text-align:center">
                    <a href="{{ route('admin.permanent-delete-blog', ['blog_id' => $item->id]) }}"
                        onclick="event.preventDefault();
                                 if(confirm('Are you sure you want to permanently delete this item?')) {
                                     document.getElementById('delete-form-{{ $item->id }}').submit();
                                 }">
                        <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                     </a>

                     <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-blog', ['blog_id' => $item->id]) }}" method="POST" style="display: none;">
                         @csrf
                         @method('DELETE')
                     </form>
                </td>
            </tr>
            @php
                $row_count++;
            @endphp
        @endforeach
        {{-- video blog  --}}
        @foreach ($trashed_video_blog as $item)
        <tr>

            <td style="text-align:center">{{$row_count}}.</td>
            <td>{{$item->video_title}}</td>
            <td>{{$item->video_description}}</td>
            <td style="text-align:center"><img src="{{ Storage::url($item->video_thumbnail_path) }}" width="50px" height="50px" alt="Image"></td>
            <td style="text-align:center">
                <a href="{{url ('/admin/restore-video-blog/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
            </td>
            <td style="text-align:center">
                <a href="{{ route('admin.permanent-delete-video-blog', ['video_blog_id' => $item->id]) }}"
                    onclick="event.preventDefault();
                             if(confirm('Are you sure you want to permanently delete this item?')) {
                                 document.getElementById('delete-form-{{ $item->id }}').submit();
                             }">
                    <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                 </a>

                 <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-video-blog', ['video_blog_id' => $item->id]) }}" method="POST" style="display: none;">
                     @csrf
                     @method('DELETE')
                 </form>
            </td>
        </tr>
        @php
            $row_count++;
        @endphp
    @endforeach
    @foreach ($trashed_status_blog as $item)
    <tr>

        <td style="text-align:center">{{$row_count}}.</td>
        <td>N/A</td>
        <td>{{$item->status_description}}</td>
        <td style="text-align:center">N/A</td>
        <td style="text-align:center">
            <a href="{{url ('/admin/restore-status-blog/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
        </td>
        <td style="text-align:center">
            <a href="{{ route('admin.permanent-delete-status-blog', ['status_blog_id' => $item->id]) }}"
                onclick="event.preventDefault();
                         if(confirm('Are you sure you want to permanently delete this item?')) {
                             document.getElementById('delete-form-{{ $item->id }}').submit();
                         }">
                <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
             </a>
             <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-status-blog', ['status_blog_id' => $item->id]) }}" method="POST" style="display: none;">
                 @csrf
                 @method('DELETE')
             </form>
        </td>
    </tr>
    @php
        $row_count++;
    @endphp
@endforeach
        {{-- Faq --}}
        @foreach ($trashed_faq as $item)
            <tr>

                <td style="text-align:center">{{$row_count}}.</td>
                <td>{{$item->questions}}</td>
                <td>{{$item->answers}}</td>
                {{-- <td style="text-align:center"><img src="{{ asset('storage/upload_img/'.$item->prod_img) }}" width="50px" height="50px" alt="Image"></td> --}}
                <td>N/A</td>
                <td style="text-align:center">
                    <a href="{{url ('/admin/restore-faq/'.$item->id)}}" ><img src="{{ asset('img/edit.png') }}" alt="Restore" style="max-height: 30px; max-width:30px;"></a>
                </td>
                <td style="text-align:center">
                    <a href="{{ route('admin.permanent-delete-faq', ['faq_id' => $item->id]) }}"
                        onclick="event.preventDefault();
                                 if(confirm('Are you sure you want to permanently delete this item?')) {
                                     document.getElementById('delete-form-{{ $item->id }}').submit();
                                 }">
                        <img src="{{ asset('img/Delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                     </a>

                     <form id="delete-form-{{ $item->id }}" action="{{ route('admin.permanent-delete-faq', ['faq_id' => $item->id]) }}" method="POST" style="display: none;">
                         @csrf
                         @method('DELETE')
                     </form>
                </td>
            </tr>
            @php
                $row_count++;
            @endphp
        @endforeach
    </tbody>
</table>

<p style="margin-left: 100px;margin-top:10px">Showing {{$row_count-1}} data.</p>
</main>
@endsection

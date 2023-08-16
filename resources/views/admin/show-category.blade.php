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
        padding: 20px 20px;
        color: rgba(255, 255, 255, 0.95);
        overflow-y: auto;   
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

    table {
        border-collapse: collapse;
        width: 100%;
        /* max-width: 100%; */
        margin: none;
    }
    th, td {
        padding: 10px;
        text-align: justify;
        border: 1px solid rgb(117, 117, 117);
        max-width: 500px;
        max-height: 50px;
        overflow: hidden;
    }
    td{
        /* overflow: hidden;
        min-height: 50px; */
    }
    tr{
        background-color: ;
        color: rgb(170, 170, 170);
        
    } 
    th {
        background-color: rgb(1,99,174);
        font-weight: 100;
        text-align: center;
        font-size: 15px;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #263043 !important;
        color: rgb(170, 170, 170) !important;
    }

    /* Search Bar */
    .search-wrapper {
        position: relative;
        /* margin-left: 7%; */
        margin-bottom: 1%;
    }

    #input-cat-search-id {
    width: 100%;
    max-width: 220px;
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    background-color: #f1f1f1;
    outline: none;
    }

    #input-cat-search-id::placeholder {
        color: #aaa;
        font-style: italic;
        font-size: 14px;
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
    <h4 class="main-title">Category List</h4>
    <br><br>
    @php
    $row_count = 1;
@endphp

<table>
    <thead>
        <tr>
            <div class="search-wrapper">
                <input type="search" name="categorysearch" id="input-cat-search-id" placeholder="Search by: Title or Description"/>
            </div>

            <th>No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead> 
    <tbody id="tbody-cat-search-id">
        @foreach ($category_data as $item)
            <tr >
                <td>{{$row_count}}.</td>
                <td>{{$item->cat_title}}</td>
                <td>{{$item->cat_description}}</td>
                <td><img src="{{ asset('storage/upload_img/'.$item->cat_img) }}" width="50px" height="50px" alt="Image"></td>
                <td> <a href="{{url ('/admin/edit-category/'.$item->id)}}"><img src="{{ asset('img/editfinal.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                <td>
                    <a href="{{ route('admin.delete-category.delete', ['id' => $item->id]) }}"
                        onclick="event.preventDefault();
                                 if(confirm('Are you sure you want to delete this item?')) {
                                     document.getElementById('delete-form-{{ $item->id }}').submit();
                                 }">
                        <img src="{{ asset('img/delete.png') }}" alt="Edit" style="max-height: 30px; max-width:30px;">
                     </a>

                     <form id="delete-form-{{ $item->id }}" action="{{ route('admin.delete-category.delete', ['id' => $item->id]) }}" method="POST" style="display: none;">
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

<p style="margin-top:10px">Showing {{$row_count-1}} rows.</p>
{{ $category_data->links() }}
</main>
@endsection

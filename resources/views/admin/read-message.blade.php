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

    
    .main-container ul{
        /* border: 1px solid rgb(177, 176, 176); */
        /* padding: 50px; */
        list-style: none;
        color:rgb(167, 167, 167);
        text-align:justify;
    }
    .main-container ul li p{
        /* border: 1px solid rgb(177, 176, 176); */
        /* padding: 50px; */
        margin: 0px;
    }
    .main-container ul li a{
        color: #007bff; 
        display: inline;
    }
    .main-container ul li a:hover{
        color: #007bff; 
        display: inline;
        text-decoration: underline;
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
    {{-- <h2 class="main-title"><b>Blog List</b></h2>
        <h1>{{ $message_details->email }}</h1> --}}
        <ul>
            <li>
                <h4>{{ $message_details->name }}</h4>
                <p><strong>From:</strong> <a href="mailto:{{$message_details->email}}">{{ $message_details->email }}</a></p>
                <p><strong>Contact:</strong> {{ $message_details->contact_number }}</p>
                <p><strong>Company:</strong> {{ $message_details->company_name }}</p>
                <br>
                <p><strong>Message:</strong> {!! nl2br(e($message_details->message)) !!}</p>
            </li>
             
        </ul>
        <a href="{{url ('/admin/show-notification')}}">Back to Message List</a>
</main>
@endsection
  
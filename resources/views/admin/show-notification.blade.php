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
    
    .tab {
        overflow: hidden;
        /* border: 1px solid #ccc; */
        background-color: #263043;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* position: fixed; */
       
    }
 
    /* Style for the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 14px;
        flex: 1;
        color: white;   
    }

    /* Change background color of button on hover */
    .tab button:hover {
        background-color: #ddd;
        color: black;
    }

    /* Active button */
    .tab button.active {
        background-color: #ccc;
        color: black;
    }

    /* Style for the content section */
    .main-container .tabcontent {
        
        display: none;
        padding: 10px 10px 0 10px;
        border-top: none;
        width: 100%;
        height: auto;
        /* add scrolling for content that exceeds the height */
         /* background-color: rgb(0, 0, 0); */
    }
    .main-container .tabcontent ul li{
        /* border: 1px solid rgb(177, 176, 176); */
        padding: 10px;
        
    }
    .main-container .tabcontent ul li p{
        margin: 0px;
        font-size: 11px;
    }
    .main-container .tabcontent ul li a{
        font-size: 11px;
        margin:1px;
        color: #007bff; 
        display: inline;
    }
    .main-container .tabcontent ul li .notif-date{
        font-size: 11px;
    }
    .main-container .tabcontent ul li h4{
        margin: 0px;
        font-size: 14px;
       
    }
    .main-container .tabcontent ul{
        /* border: 1px solid rgb(177, 176, 176); */
        /* padding: 50px; */
        list-style: none;
        height: calc(70vh - 50px); /* set a fixed height */
        overflow-y: auto;
    }

    .main-container .tabcontent ul li .message-container{
        max-height: 20px;
        overflow: hidden;
        white-space: normal;
        text-overflow: ellipsis;
        margin: 0px;
    }
    /* .main-container .tabcontent li:nth-child(even) {
        background-color: #29323f;

    } */
    

    .nav-social-media{
  margin-bottom:100px;
  margin-left: 50px;
  margin-right: 50px;
}

/* social media btn css */
.nav-social-media button a {
  display: inline-block;
  width: 100%;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
  transition: background-color 0.3s ease;
  padding: 5px;
}

.nav-social-media button{
    float: left;
    width: 20%;
    border-radius: 0px;
}
.nav-social-media button a:hover {
  background-color: rgba(255,255,255,0.2);
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
    <h4>Notifications</h4>
    <div class="tab">
        <button id="AllMessages"  class="tablinks" onclick="openCategory(event, 'AllListTab')">All Messages ({{$allNotificationCount}})</button>
        <button id="NewMessages"  class="tablinks" onclick="openCategory(event, 'NewMesaagesTab')">New Messages ({{$newNotificationCount}})</button>
        <button id="ReadMessages"  class="tablinks" onclick="openCategory(event, 'ReadMesaagesTab')">Read Messages</button>
    </div>




<div id="AllListTab" class="tabcontent">
    <ul> 
        @foreach($all_notification as $notification)
            @if($notification->read_at == null)
                <li> 
                    <strong><h4 style="color:rgb(255, 255, 255)">{{ $notification->name }}</h4>
                    <p style="color:rgb(255, 255, 255)">From: <a href="mailto:{{$notification->email}}">{{$notification->email}}</a></p>
                    <p class="notif-date"  style="color:rgb(255, 255, 255)">Date: {{ date('F j, Y \a\t g:i a', strtotime($notification->created_at)) }}</p>
                    <p style="color:rgb(255, 255, 255)" class="message-container">Message: {{ $notification->message }}</p>
                    <a href="{{url ('/admin/read-message/'.$notification->id)}}">open message</a></strong>
                    <hr style="border-color: rgba(134, 134, 134, 0.568); margin: 0px">
                </li>
 
            @else
            <li>
                <h4 style="color:rgb(177, 176, 176)">{{ $notification->name }}</h4>
                <p style="color:rgb(177, 176, 176)">From: <a href="mailto:{{$notification->email}}">{{$notification->email}}</a></p>
                <p class="notif-date" style="color:rgb(177, 176, 176)  ">Date: {{ date('F j, Y \a\t g:i a', strtotime($notification->created_at)) }}</p>
                <p style="color:rgb(177, 176, 176)" class="message-container">Message: {{ $notification->message }}</p>
                <a href="{{url ('/admin/read-message/'.$notification->id)}}">open message</a>
                <hr style="border-color: rgba(134, 134, 134, 0.568); margin: 0px">
            </li>
            @endif
        @endforeach
    </ul>
</div>
      
<div id="NewMesaagesTab" class="tabcontent">
    <ul> 
        @foreach($new_notifications as $notification)
            <li>
                <strong><h4 style="color:rgb(255, 255, 255)">{{ $notification->name }}</h4>
                <p style="color:rgb(255, 255, 255)">From: <a href="mailto:{{$notification->email}}">{{$notification->email}}</a></p>
                <p style="color:rgb(255, 255, 255)" class="message-container">Message: {{ $notification->message }}</p>
                <a href="{{url ('/admin/read-message/'.$notification->id)}}">open message</a></strong>
                <hr style="border-color: rgba(134, 134, 134, 0.568); margin: 0px">
            </li>
        @endforeach
    </ul>
</div>

<div id="ReadMesaagesTab" class="tabcontent">
    <ul> 
        @foreach($all_notification as $notification)
            @if($notification->read_at !== null)
                <li>
                    <h4 style="color:rgb(177, 176, 176)">{{ $notification->name }}</h4>
                    <p style="color:rgb(177, 176, 176)">From: <a href="mailto:{{$notification->email}}">{{$notification->email}}</a></p>
                    <p style="color:rgb(177, 176, 176)" class="message-container">Message: {{ $notification->message }}</p>
                    <a href="{{url ('/admin/read-message/'.$notification->id)}}">open message</a>
                    <hr style="border-color: rgba(134, 134, 134, 0.568); margin: 0px">
                </li>
            @endif
        @endforeach
    </ul>
</div>
<div class="nav-social-media">
    <button style="background-color: #c94438;"><a href="https://mail.google.com/" target="_blank"><img src="/img/gmail_contact.png" width="15%" height="15%">&nbsp;Email</a></button>
    <button style="background-color: #6056a1;"><a href="viber://chat?number=%2B123456789" ><img src="/img/viber_contact.png" width="15%" height="15%">&nbsp;Viber</a></button>
    <button style="background-color: #026ca5;"><a href="https://www.linkedin.com/" ><img src="/img/linkedin_contact.png" width="15%" height="15%">&nbsp;LinkedIn</a></button>
    <button style="background-color: #324c83;"><a href="https://www.facebook.com/" ><img src="/img/facebook_contact.png" width="15%" height="15%">&nbsp;Facebook</a></button>
    <button style="background-color: #187fc0;"><a href="https://twitter.com/" ><img src="/img/twitter_contact.png" width="15%" height="15%">&nbsp;Twitter</a></button>
  </div>


        
<script>

    // Open the default tab
    document.getElementById("AllMessages").click();
    
    // Open the selected category
    function openCategory(evt, categoryName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
    
        // Hide all tab content
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
    
        // Deactivate all tab links
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    
        // Show the selected tab content and activate the button
        document.getElementById(categoryName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    
    </script>
 









        {{-- <ul> 
            @foreach($notifications as $notification)
                <li>
                    <h4>{{ $notification->name }}</h4>
                    <p>From:> <a href="mailto:{{$notification->email}}">{{$notification->email}}</a></p>
                    <p>Message:> {{ $notification->message }}</p>
                    <a href="{{url ('/admin/read-message/'.$notification->id)}}">open message</a>
                </li>
                
            @endforeach
        </ul> --}}
</main>
@endsection
  
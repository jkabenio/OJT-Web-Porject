@extends('layouts.app')
@section('content')
<style>
@media screen and (min-width: 768px) {
    #desktop-event-csr-content{
        display: block !important;
    }
    #mobile-event-csr-content{
        display: none !important;
    }
    video {
        object-fit: fill; 
    }

    body {
        margin: 0;
    }

    #bg-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }
    .event-csr-header{
        margin-top:100px;
        color:rgb(24,79,0);
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    /* Style for the tab buttons */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
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
    }

    /* Change background color of button on hover */
    .tab button:hover {
        background-color: #ddd;
        
    }

    /* Active button */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style for the content section */
    .tabcontent {
        border-top: none;
        width: 100%;
        height: auto;
        background-color: #ddd;
    }

    /* Show the selected tab */
    #Category1 {
        display: block;
    }

    /* Container for image and figcaption */

   .tabcontent:after{
        content: "";
        display: table;
        clear: both; 
   }
    .tabcontent .blog-content img {
        min-width: 100%;
        max-width: 100%;
        max-height: 400px;
        display: block;
        margin: 0 auto;
       
    }

    .tabcontent .blog-content .content-video {
        min-width: 100%;
        max-width: 100%;
        min-height: 300px;
        max-height: 400px;
        display: block;
        margin: 0 auto;
       
    }
    .tabcontent .blog-content{
        float: left;
        width: 32%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        height: calc(200vh - 250px); /* set a fixed height */
        overflow-y: auto; /* add scrolling for content that exceeds the height */
        overscroll-behavior: contain;
    }
    
    .tabcontent .blog-content .blog-info{
        margin: 20px;
        padding: 10px;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .blog-content p{
        text-align: left;

    }
    
    .blog-buttons {
    width: 100%;
    border-top: 2px solid rgb(177, 177, 177);
    border-bottom: 2px solid rgb(177, 177, 177);
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
}

    .blog-buttons .blog-see-more {
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        border: none;
        border-radius: 3px;
        font-size: 13px;
        padding: 0px;
        display: flex;
        
    }

    .blog-buttons .blog-see-more .blog-icons {
        width: 24px !important;
        height: 24px !important;
        min-width: 0%;
    }

    .blog-buttons .blog-see-more .blog-icons:hover {
        width: 25px;
        height: 25px;
    }

    .button-text {
        margin-left: 0px;
    }

/* status view css only  */
    .tabcontent .status-blog-content{
        float: left;
        width: 32%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    
    .tabcontent .status-blog-content .blog-info{
        margin: 20px;
        padding: 10px;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .status-blog-content p{
        text-align: left;

    }
    /* images post view css only */
    .tabcontent .imagepost-blog-content{
        float: left;
        width: 32%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    
    .tabcontent .imagepost-blog-content .blog-info{
        margin: 20px;
        padding: 10px;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .imagepost-blog-content p{
        text-align: left;

    }
    .tabcontent .imagepost-blog-content img {
        min-width: 100%;
        max-width: 100%;
        max-height: 300px;
        display: block;
        margin: 0 auto;
       
    }
/* video post view css only */
    .tabcontent .video-blog-content{
        float: left;
        width: 32%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    
    .tabcontent .video-blog-content .blog-info{
        margin: 20px;
        padding: 10px;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .video-blog-content p{
        text-align: left;

    }
    .tabcontent .video-blog-content .content-video {
        min-width: 100%;
        max-width: 100%;
        min-height: 300px;
        max-height: 400px;
        display: block;
        margin: 0 auto;
    }

    h2{
        font-family: 'Times New Roman', Times, serif;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    .blog-description{
        word-spacing: 5px;
        text-align:left;
        max-height: 3rem;
        overflow: hidden;
    }
}
@media screen and (max-width: 768px) {
    #mobile-event-csr-content{
        display: block !important;
    }
    #desktop-event-csr-content{
        display: none !important;
    }
    ::-webkit-scrollbar-track {
    background-color: #ffffff !important;
    width: 4px !important;
    height: 4px !important;
  }
  .mobile-product-logo{
  height:5rem;
  width: 7rem;
  margin-left: 9.5rem;
  }
  .mobile-product-logo img{
  
  }
  video {
        object-fit: fill; 
    }

    body {
        margin: 0;
    }

    #bg-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }
#product-header{
  font-family: 'Times New Roman', Times, serif;
    font-size: 1.5rem;
    font-weight: bold;
    color:rgb(24,79,0);
    text-align: center;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    position: absolute;
    margin: 0px 0  0 3rem;
    
}
    .event-csr-header{
        font-size: 1rem;
        color:rgb(24,79,0);
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
 /* Style for the tab buttons */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
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
        font-size: 0.7rem;
        flex: 1;
    }

    /* Change background color of button on hover */
    .tab button:hover {
        background-color: #ddd;
        
    }

    /* Active button */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style for the content section */
    .tabcontent {
        
        display: none;
        padding: 0rem;
        border-top: none;
        width: 100%;
        height: auto;
        height: calc(200vh - 250px); /* set a fixed height */
        overflow-y: auto; /* add scrolling for content that exceeds the height */
        background-color: rgb(255, 255, 255);
    }




    #Category1 {
        display: block;
    }

    /* Container for image and figcaption */

   .tabcontent:after{
        content: "";
        display: table;
        clear: both; 
   }
    .tabcontent .blog-content img {
        min-width: 100%;
        max-width: 100%;
        max-height: 400px;
        display: block;
        margin: 0 auto;
       
    }

    .tabcontent .blog-content .content-video {
        min-width: 100%;
        max-width: 100%;
        min-height: 300px;
        max-height: 400px;
        display: block;
        margin: 0 auto;
       
    }
    .tabcontent .blog-content{
        float: left;
        width: 100%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        /* height: calc(200vh - 250px);
         overflow-y: auto; 
         overscroll-behavior: contain; */
    }
    
    .tabcontent .blog-content .blog-info{
        margin: 0.5rem;
        padding: 0.5rem;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .blog-content .blog-info h4{
        font-size: 1rem;
    }
    .tabcontent .blog-content .blog-info p{
        font-size: 0.875;
        margin-top: 0px;
    }
    .blog-description{
        word-spacing: 5px;
        text-align:left;
        max-height: 3rem;
        overflow: hidden;
        /* font-size: 0.7rem; */
        font-size: 0.875;
        text-align:justify;
        margin-bottom: 1rem;
    }
    .tabcontent .blog-content p{
        text-align: left;
        font-size: 0.875;

    }
    
    .blog-buttons {
    width: 100%;
    border-top: 2px solid rgb(177, 177, 177);
    border-bottom: 2px solid rgb(177, 177, 177);
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
}

    .blog-buttons .blog-see-more {
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        border: none;
        border-radius: 3px;
        font-size: 13px;
        padding: 0px;
        display: flex;
        
    }

    .blog-buttons .blog-see-more .blog-icons {
        width: 24px !important;
        height: 24px !important;
        min-width: 0%;
    }

    .blog-buttons .blog-see-more .blog-icons:hover {
        width: 25px;
        height: 25px;
    }

    .button-text {
        margin-left: 0px;
    }
    
    /* status view css only  */
    .tabcontent .status-blog-content{
        float: left;
        width: 100%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 1rem;
    }
    
    .tabcontent .status-blog-content .blog-info{
        margin: 0.5rem;
        padding: 0.5rem;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .status-blog-content p{
        text-align: left;
        font-size: 0.875;
        margin-top: 0px;
    }
     /* images post view css only */
     .tabcontent .imagepost-blog-content{
        float: left;
        width: 100%;
        margin-left: 1%;
        margin-bottom: 2%;
        background-color:rgb(255, 255, 255);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }
    
    .tabcontent .imagepost-blog-content .blog-info{
        margin: 0.5rem;
        padding: 0.5rem;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .imagepost-blog-content p{
        text-align: left;
        font-size: 0.875;
        margin-top: 0px;    
    }
    .tabcontent .imagepost-blog-content h4{
        text-align: left;
        font-size: 1rem;
        margin-top: 0px; 
    }
    .tabcontent .imagepost-blog-content img {
        min-width: 100%;
        max-width: 100%;
        max-height: 300px;
        display: block;
        margin: 0 auto;
       
    }
/* video post view css only */
.tabcontent .video-blog-content{
    float: left;
    width: 100%;
    margin-left: 1%;
    margin-bottom: 2%;
    background-color:rgb(255, 255, 255);
    border: 2px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
    
    .tabcontent .video-blog-content .blog-info{
        margin: 0.5rem;
        padding: 0.5rem;
        border: 1px solid rgb(15, 88, 0);
        border-radius: 10px;
    }
    .tabcontent .video-blog-content p{
        text-align: left;
        font-size: 0.875;
        margin-top: 0px;
    }
    .tabcontent .video-blog-content h4{
        font-size: 1rem;
        margin-top: 0px; 
    }
    .tabcontent .video-blog-content .content-video {
        min-width: 100%;
        max-width: 100%;
        min-height: 300px;
        max-height: 400px;
        display: block;
        margin: 0 auto;
        
       
    }
}
</style>

<body>
    <video id="bg-video" autoplay loop muted>
      <source  id="bg-video"  src="/vids/leaves_falling(123).mp4" type="video/mp4">
    </video>
    <!-- rest of your HTML content -->
  </body>
  <h2 class="event-csr-header"align="center">EVENTS AND CSR</h2>
  <div class="tab"> 
    <button id="buttonidsBLogs" class="tablinks" onclick="openCategory(event, 'Category1')">All Posts</button>
    {{-- <button  class="tablinks" onclick="openCategory(event, 'Category1')">About the Company</button> --}}
    <button class="tablinks" onclick="openCategory(event, 'status')">Status</button>
    <button class="tablinks" class="tablinks" onclick="openCategory(event, 'imagespost')">Images Posts</button>
    <button class="tablinks" class="tablinks" onclick="openCategory(event, 'videoblog')">Videos Posts</button>
    </div>

    <div id="Category1" class="tabcontent">
        <div id="desktop-event-csr-content">
        {{--status content  --}}
        <div class="blog-content">
            @foreach($status_blog_data as $status_list)
            <style>
                #see-more-button-status-blog-{{$status_list->id}}, #see-less-button-status-blog-{{$status_list->id}} {
                    display: none;
                    background-color: none;
                    color: rgb(24,79,0);;
                    border: none;
                    font-size: 12px;
                    cursor: pointer;
                    margin-top: 5px;
                    margin-bottom: 5px;
                }
            </style>
            <div class="blog-info">
                <p>
                    @foreach($admin as $item)
                        @if ($item->id == $status_list->user_id)
                            Author: {{$item->name}}
                        @else
                            Unknown Author
                        @endif
                    @endforeach
                    <br>{{ date('F j, Y \a\t g:i a', strtotime($status_list->created_at)) }}
                </p>
                <figcaption class="blog-description" id="idStatusBlog{{$status_list->id}}">
                    {!! nl2br(e($status_list->status_description)) !!}
                </figcaption>
                <a id="see-less-button-status-blog-{{$status_list->id}}" onclick="seeLessStatusBlog{{$status_list->id}}()">See Less...</a>
                <a id="see-more-button-status-blog-{{$status_list->id}}" onclick="seeMoreStatusBlog{{$status_list->id}}()">See More...</a>
                {{-- <div class="blog-buttons">    
                    <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
                </div> --}}
            </div>
            <script>
                const myDivStatusBlog{{$status_list->id}} = document.getElementById("idStatusBlog{{$status_list->id}}");
                const seeMoreButtonStatusBlog{{$status_list->id}} = document.getElementById("see-more-button-status-blog-{{$status_list->id}}");
                const seeLessButtonStatusBlog{{$status_list->id}} = document.getElementById("see-less-button-status-blog-{{$status_list->id}}");

                if (myDivStatusBlog{{$status_list->id}}.scrollHeight > myDivStatusBlog{{$status_list->id}}.offsetHeight) {
                    seeMoreButtonStatusBlog{{$status_list->id}}.style.display = "block";
                }

                function seeMoreStatusBlog{{$status_list->id}}() {
                    myDivStatusBlog{{$status_list->id}}.style.maxHeight = "none";
                    seeMoreButtonStatusBlog{{$status_list->id}}.style.display = "none";
                    seeLessButtonStatusBlog{{$status_list->id}}.style.display = "block";
                }

                function seeLessStatusBlog{{$status_list->id}}() {
                    myDivStatusBlog{{$status_list->id}}.style.maxHeight = "3rem";
                    seeMoreButtonStatusBlog{{$status_list->id}}.style.display = "block";
                    seeLessButtonStatusBlog{{$status_list->id}}.style.display = "none";
                }
            </script>
            @endforeach
        </div>     
    
    {{-- post with images content --}}
        <div class="blog-content">
            @foreach($blog_data as $list)
                <style>
                    #see-more-button-{{$list->id}}, #see-less-button-{{$list->id}} {
                        display: none;
                        background-color: none;
                        color: rgb(24,79,0);;
                        border: none;
                        font-size: 12px;
                        cursor: pointer;
                        margin-top: 5px;
                        margin-bottom: 5px;
                    }
                </style>
                <div class="blog-info">
                    <h4 style="margin: 0px"><b>{!! nl2br(e($list->blog_title)) !!}</b></h4>
                    <p>
                        @foreach($admin as $item)
                            @if ($item->id == $list->user_id)
                                Author Desktop: {{$item->name}}
                            @else
                                Unknown Author
                            @endif
                        @endforeach
                        <br>{{ date('F j, Y \a\t g:i a', strtotime($list->created_at)) }}
                    </p>
                    <figcaption id="id{{$list->id}}" class="blog-description">
                        {!! nl2br(e($list->blog_desc)) !!}
                    </figcaption>
                    <a id="see-less-button-{{$list->id}}" onclick="seeLess{{$list->id}}()">See Less...</a>
                    <a id="see-more-button-{{$list->id}}" onclick="seeMore{{$list->id}}()">See More...</a>
                    <img src="{{ asset('storage/upload_img/'.$list->blog_img)}}" alt="{{$list->blog_img}}">
                    {{-- <div class="blog-buttons">
                        <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" width="100%" height="100%"> like</button>
                        <button class="blog-see-more"><img class="blog-icons" src="/img/comment.png" width="100%" height="100%"> comment</button>
                        <button class="blog-see-more"><img class="blog-icons" src="/img/share.png" width="100%" height="100%"> share</button>
                    </div> --}}
                </div>

                <script>
                    const myDiv{{$list->id}} = document.getElementById("id{{$list->id}}");
                    const seeMoreButton{{$list->id}} = document.getElementById("see-more-button-{{$list->id}}");
                    const seeLessButton{{$list->id}} = document.getElementById("see-less-button-{{$list->id}}");

                    if (myDiv{{$list->id}}.scrollHeight > myDiv{{$list->id}}.offsetHeight) {
                        seeMoreButton{{$list->id}}.style.display = "block";
                    }

                    function seeMore{{$list->id}}() {
                        myDiv{{$list->id}}.style.maxHeight = "none";
                        seeMoreButton{{$list->id}}.style.display = "none";
                        seeLessButton{{$list->id}}.style.display = "block";
                    }

                    function seeLess{{$list->id}}() {
                        myDiv{{$list->id}}.style.maxHeight = "3rem";
                        seeMoreButton{{$list->id}}.style.display = "block";
                        seeLessButton{{$list->id}}.style.display = "none";
                    }
                </script>
            @endforeach
        </div>        

    {{-- video contents --}}
        <div class="blog-content">
            @foreach($video_blog_data as $video_list)
                <style>
                    #see-more-button-video-blog-{{$video_list->id}}, #see-less-button-video-blog-{{$video_list->id}} {
                        display: none;
                        background-color: none;
                        color: rgb(24,79,0);;
                        border: none;
                        font-size: 12px;
                        cursor: pointer;
                        margin-top: 5px;
                        margin-bottom: 5px;
                    }
                </style>
                <div class="blog-info">
                    <h4 style="margin: 0px"><b>{!!nl2br(e($video_list->video_title))!!}</b></h4>
                    <p>
                        @foreach($admin as $item)
                            @if ($item->id == $video_list->user_id)
                                Author: {{$item->name}}
                            @else
                                Unknown Author
                            @endif
                        @endforeach
                        <br>{{ date('F j, Y \a\t g:i a', strtotime($video_list->created_at)) }}
                    </p>
                    <figcaption id="idVideoBlog{{$video_list->id}}" class="blog-description">
                        {!! nl2br(e($video_list->video_description)) !!}   
                    </figcaption>
                    <a id="see-less-button-video-blog-{{$video_list->id}}" onclick="seeLessVideoBlog{{$video_list->id}}()">See Less...</a>
                    <a id="see-more-button-video-blog-{{$video_list->id}}" onclick="seeMoreVideoBlog{{$video_list->id}}()">See More...</a>
                    <video class="content-video" controls>
                        
                        <source src="{{asset('storage/upload_vid/'.$video_list->video_path)}}" type="video/mp4">
                    </video>       
                    {{-- <div class="blog-buttons">    
                        <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                        <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                        <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
                    </div> --}}
                </div>

                <script>
                    const myDivVideoBlog{{$video_list->id}} = document.getElementById("idVideoBlog{{$video_list->id}}");
                    const seeMoreButtonVideoBlog{{$video_list->id}} = document.getElementById("see-more-button-video-blog-{{$video_list->id}}");
                    const seeLessButtonVideoBlog{{$video_list->id}} = document.getElementById("see-less-button-video-blog-{{$video_list->id}}");

                    if (myDivVideoBlog{{$video_list->id}}.scrollHeight > myDivVideoBlog{{$video_list->id}}.offsetHeight) {
                        seeMoreButtonVideoBlog{{$video_list->id}}.style.display = "block";
                    }

                    function seeMoreVideoBlog{{$video_list->id}}() {
                        myDivVideoBlog{{$video_list->id}}.style.maxHeight = "none";
                        seeMoreButtonVideoBlog{{$video_list->id}}.style.display = "none";
                        seeLessButtonVideoBlog{{$video_list->id}}.style.display = "block";
                    }

                    function seeLessVideoBlog{{$video_list->id}}() {
                        myDivVideoBlog{{$video_list->id}}.style.maxHeight = "3rem";
                        seeMoreButtonVideoBlog{{$video_list->id}}.style.display = "block";
                        seeLessButtonVideoBlog{{$video_list->id}}.style.display = "none";
                    }
                </script>
            @endforeach    
        </div> 
    </div>
    <div id="mobile-event-csr-content">
        {{--status content  --}}
        <div class="blog-content">
            @foreach($sortedData  as $item)
            
            @if ($item->status_table_name === 'status')
            <style>
                #see-more-button-status-blog-mobile-{{$item->id}}, #see-less-button-status-blog-mobile-{{$item->id}} {
                    display: none;
                    background-color: none;
                    color: rgb(24,79,0);;
                    border: none;
                    font-size: 0.7rem;
                    cursor: pointer;
                    margin-top: 5px;
                    margin-bottom: 5px;
                }
            </style>
            <div class="blog-info">
                <p>
                    @foreach($admin as $adminitem)
                        @if ($adminitem->id == $item->user_id)
                            Author: {{$adminitem->name}}
                        @else
                            Unknown Author
                        @endif
                    @endforeach
                    <br>{{ date('F j, Y \a\t g:i a', strtotime($item->created_at)) }}
                </p>
                <figcaption class="blog-description" id="idStatusBlogMobile{{$item->id}}">
                    {!! nl2br(e($item->status_description)) !!}
                </figcaption>
                <a id="see-less-button-status-blog-mobile-{{$item->id}}" onclick="seeLessStatusBlogMobile{{$item->id}}()">See Less...</a>
                <a id="see-more-button-status-blog-mobile-{{$item->id}}" onclick="seeMoreStatusBlogMobile{{$item->id}}()">See More...</a>
                {{-- <div class="blog-buttons">    
                    <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
                </div> --}}
            </div>
            <script>
                const myDivStatusBlogMobile{{$item->id}} = document.getElementById("idStatusBlogMobile{{$item->id}}");
                const seeMoreButtonStatusBlogMobile{{$item->id}} = document.getElementById("see-more-button-status-blog-mobile-{{$item->id}}");
                const seeLessButtonStatusBlogMobile{{$item->id}} = document.getElementById("see-less-button-status-blog-mobile-{{$item->id}}");

                if (myDivStatusBlogMobile{{$item->id}}.scrollHeight > myDivStatusBlogMobile{{$item->id}}.offsetHeight) {
                    seeMoreButtonStatusBlogMobile{{$item->id}}.style.display = "block";
                }

                function seeMoreStatusBlogMobile{{$item->id}}() {
                    myDivStatusBlogMobile{{$item->id}}.style.maxHeight = "none";
                    seeMoreButtonStatusBlogMobile{{$item->id}}.style.display = "none";
                    seeLessButtonStatusBlogMobile{{$item->id}}.style.display = "block";
                }

                function seeLessStatusBlogMobile{{$item->id}}() {
                    myDivStatusBlogMobile{{$item->id}}.style.maxHeight = "3rem";
                    seeMoreButtonStatusBlogMobile{{$item->id}}.style.display = "block";
                    seeLessButtonStatusBlogMobile{{$item->id}}.style.display = "none";
                }
            </script>  
    {{-- post with images content --}}
            @elseif ($item->blog_table_name === 'blog')
                <style>
                    #see-more-button-mobile-{{$item->id}}, #see-less-button-mobile-{{$item->id}} {
                        display: none;
                        background-color: none;
                        color: rgb(24,79,0);;
                        border: none;
                        font-size: 0.7rem;
                        cursor: pointer;
                        margin-top: 5px;
                        margin-bottom: 5px;
                    }
                </style>
                <div class="blog-info">
                    <h4 style="margin: 0px"><b>{!! nl2br(e($item->blog_title)) !!}</b></h4>
                    <p>
                        
                        @foreach($admin as $adminitem)
                            @if ($adminitem->id == $item->user_id)
                                Author: {{$adminitem->name}}
                            @else
                                Unknown Author
                            @endif
                        @endforeach
                        <br>{{ date('F j, Y \a\t g:i a', strtotime($item->created_at)) }}
                    </p>
                    <figcaption id="idMobile{{$item->id}}" class="blog-description">
                        {!! nl2br(e($item->blog_desc)) !!}
                    </figcaption>
                    <a id="see-less-button-mobile-{{$item->id}}" onclick="seeLessMobile{{$item->id}}()">See Less...</a>
                    <a id="see-more-button-mobile-{{$item->id}}" onclick="seeMoreMobile{{$item->id}}()">See More...</a>
                    <img src="{{ asset('storage/upload_img/'.$item->blog_img)}}" alt="{{$item->blog_img}}">
                    {{-- <div class="blog-buttons">
                        <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" width="100%" height="100%"> like</button>
                        <button class="blog-see-more"><img class="blog-icons" src="/img/comment.png" width="100%" height="100%"> comment</button>
                        <button class="blog-see-more"><img class="blog-icons" src="/img/share.png" width="100%" height="100%"> share</button>
                    </div> --}}
                </div>

                <script>
                    const myDivMobile{{$item->id}} = document.getElementById("idMobile{{$item->id}}");
                    const seeMoreButtonMobile{{$item->id}} = document.getElementById("see-more-button-mobile-{{$item->id}}");
                    const seeLessButtonMobile{{$item->id}} = document.getElementById("see-less-button-mobile-{{$item->id}}");

                    if (myDivMobile{{$item->id}}.scrollHeight > myDivMobile{{$item->id}}.offsetHeight) {
                        seeMoreButtonMobile{{$item->id}}.style.display = "block";
                    }

                    function seeMoreMobile{{$item->id}}() {
                        myDivMobile{{$item->id}}.style.maxHeight = "none";
                        seeMoreButtonMobile{{$item->id}}.style.display = "none";
                        seeLessButtonMobile{{$item->id}}.style.display = "block";
                    }

                    function seeLessMobile{{$item->id}}() {
                        myDivMobile{{$item->id}}.style.maxHeight = "3rem";
                        seeMoreButtonMobile{{$item->id}}.style.display = "block";
                        seeLessButtonMobile{{$item->id}}.style.display = "none";
                    }
                </script>
    {{-- video contents --}}
                @elseif ($item->video_table_name === 'video')
                <style>
                    #see-more-button-video-blog-mobile-{{$item->id}}, #see-less-button-video-blog-mobile-{{$item->id}} {
                        display: none;
                        background-color: none;
                        color: rgb(24,79,0);;
                        border: none;
                        font-size: 0.7rem;
                        cursor: pointer;
                        margin-top: 5px;
                        margin-bottom: 5px;
                    } 
                </style>
                <div class="blog-info">
                    
                    <h4 style="margin: 0px"><b>{!!nl2br(e($item->video_title))!!}</b></h4>
                    <p>
                        @foreach($admin as $adminitem)
                            @if ($adminitem->id == $item->user_id)
                                Author: {{$adminitem->name}}
                            @else
                                Unknown Author
                            @endif
                        @endforeach
                        <br>{{ date('F j, Y \a\t g:i a', strtotime($item->created_at)) }}
                    </p>
                    <figcaption id="idVideoBlogMobile{{$item->id}}" class="blog-description">
                        {!! nl2br(e($item->video_description)) !!}   
                    </figcaption>
                    <a id="see-less-button-video-blog-mobile-{{$item->id}}" onclick="seeLessVideoBlogMobile{{$item->id}}()">See Less...</a>
                    <a id="see-more-button-video-blog-mobile-{{$item->id}}" onclick="seeMoreVideoBlogMobile{{$item->id}}()">See More...</a>
                    <video class="content-video" controls>
                        {{-- <source src="{{ Storage::url($item->video_path) }}" type="video/mp4"> --}}
                            <source src="{{ asset('/storage/upload_vid/' . $item->video_path) }}" type="video/mp4">
                    </video>       
                    {{-- <div class="blog-buttons">    
                        <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                        <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                        <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
                    </div> --}}
                </div>

                <script>
                    const myDivVideoBlogMobile{{$item->id}} = document.getElementById("idVideoBlogMobile{{$item->id}}");
                    const seeMoreButtonVideoBlogMobile{{$item->id}} = document.getElementById("see-more-button-video-blog-mobile-{{$item->id}}");
                    const seeLessButtonVideoBlogMobile{{$item->id}} = document.getElementById("see-less-button-video-blog-mobile-{{$item->id}}");

                    if (myDivVideoBlogMobile{{$item->id}}.scrollHeight > myDivVideoBlogMobile{{$item->id}}.offsetHeight) {
                        seeMoreButtonVideoBlogMobile{{$item->id}}.style.display = "block";
                    }

                    function seeMoreVideoBlogMobile{{$item->id}}() {
                        myDivVideoBlogMobile{{$item->id}}.style.maxHeight = "none";
                        seeMoreButtonVideoBlogMobile{{$item->id}}.style.display = "none";
                        seeLessButtonVideoBlogMobile{{$item->id}}.style.display = "block";
                    }

                    function seeLessVideoBlogMobile{{$item->id}}() {
                        myDivVideoBlogMobile{{$item->id}}.style.maxHeight = "3rem";
                        seeMoreButtonVideoBlogMobile{{$item->id}}.style.display = "block";
                        seeLessButtonVideoBlogMobile{{$item->id}}.style.display = "none";
                    }
                </script>
                @endif
            @endforeach    
        </div>      
    </div>
</div>
<div id="status" class="tabcontent">
    {{--status content  --}}
    @foreach($status_blog_data as $status_list)
        <div class="status-blog-content">
            <style>
                #see-more-button-status-blog-only-{{$status_list->id}}, #see-less-button-status-blog-only-{{$status_list->id}} {
                    display: none;
                    background-color: none;
                    color: rgb(24,79,0);
                    border: none;
                    font-size: 0.7rem;
                    cursor: pointer;
                    margin-top: 5px;
                    margin-bottom: 5px;
                }
            </style>
            <div class="blog-info">
                <p>
                    @foreach($admin as $item)
                        @if ($item->id == $status_list->user_id)
                            Author: {{$item->name}}
                        @else
                            Unknown Author
                        @endif
                    @endforeach
                    <br>{{ date('F j, Y \a\t g:i a', strtotime($status_list->created_at)) }}
                </p>
                <figcaption class="blog-description" id="idStatusBlogOnly{{$status_list->id}}">
                    {!! nl2br(e($status_list->status_description)) !!}
                </figcaption>
                <a id="see-less-button-status-blog-only-{{$status_list->id}}" onclick="seeLessStatusBlogOnly{{$status_list->id}}()">See Less...</a>
                <a id="see-more-button-status-blog-only-{{$status_list->id}}" onclick="seeMoreStatusBlogOnly{{$status_list->id}}()">See More...</a>
                    
            {{-- <div class="blog-buttons">    
                <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
            </div> --}}
        </div>
        <script>
                const myDivStatusBlogOnly{{$status_list->id}} = document.getElementById("idStatusBlogOnly{{$status_list->id}}");
                const seeMoreButtonStatusBlogOnly{{$status_list->id}} = document.getElementById("see-more-button-status-blog-only-{{$status_list->id}}");
                const seeLessButtonStatusBlogOnly{{$status_list->id}} = document.getElementById("see-less-button-status-blog-only-{{$status_list->id}}");

                if (myDivStatusBlogOnly{{$status_list->id}}.scrollHeight >= myDivStatusBlogOnly{{$status_list->id}}.offsetHeight) {
                    seeMoreButtonStatusBlogOnly{{$status_list->id}}.style.display = "block";
                }

                function seeMoreStatusBlogOnly{{$status_list->id}}() {
                    myDivStatusBlogOnly{{$status_list->id}}.style.maxHeight = "none";
                    seeMoreButtonStatusBlogOnly{{$status_list->id}}.style.display = "none";
                    seeLessButtonStatusBlogOnly{{$status_list->id}}.style.display = "block";
                }

                function seeLessStatusBlogOnly{{$status_list->id}}() {
                    myDivStatusBlogOnly{{$status_list->id}}.style.maxHeight = "3rem";
                    seeMoreButtonStatusBlogOnly{{$status_list->id}}.style.display = "block";
                    seeLessButtonStatusBlogOnly{{$status_list->id}}.style.display = "none";
                }
            </script>
        </div>
   @endforeach
</div>


{{--  imagespost only --}}
<div id="imagespost" class="tabcontent">
    @foreach($blog_data as $list)
        <div class="imagepost-blog-content">
            <style>
                #see-more-button-imagespost-only-{{$list->id}}, #see-less-button-imagespost-only-{{$list->id}} {
                    display: none;
                    background-color: none;
                    color: rgb(24,79,0);
                    border: none;
                    font-size: 0.7rem;
                    cursor: pointer;
                    margin-top: 5px;
                    margin-bottom: 5px;
                }
            </style>
            <div class="blog-info">
                <h4 style="margin-bottom: 0px"><b>{!! nl2br(e($list->blog_title)) !!}</b></h4>
                <p>
                    @foreach($admin as $item)
                        @if ($item->id == $list->user_id)
                            Author: {{$item->name}}
                        @else
                            Unknown Author
                        @endif
                    @endforeach
                    <br>{{ date('F j, Y \a\t g:i a', strtotime($list->created_at)) }}
                </p>
                <figcaption id="idImagesPostonly{{$list->id}}" class="blog-description">
                    {!! nl2br(e($list->blog_desc)) !!}
                </figcaption>
                <a id="see-less-button-imagespost-only-{{$list->id}}" onclick="seeLessImagesPostonly{{$list->id}}()">See Less...</a>
                <a id="see-more-button-imagespost-only-{{$list->id}}" onclick="seeMoreImagesPostonly{{$list->id}}()">See More...</a>
                <img src="{{ asset('storage/upload_img/'.$list->blog_img)}}" alt="{{$list->blog_img}}">
                {{-- <div class="blog-buttons">
                    <button class="blog-see-more"><img class="blog-icons" src="/img/like.png"> like</button>
                    <button class="blog-see-more"><img class="blog-icons" src="/img/comment.png"> comment</button>
                    <button class="blog-see-more"><img class="blog-icons" src="/img/share.png"> share</button>
                </div> --}}
            </div>

            <script>
                const myDivImagesPostonly{{$list->id}} = document.getElementById("idImagesPostonly{{$list->id}}");
                const seeMoreButtonImagesPostonly{{$list->id}} = document.getElementById("see-more-button-imagespost-only-{{$list->id}}");
                const seeLessButtonImagesPostonly{{$list->id}} = document.getElementById("see-less-button-imagespost-only-{{$list->id}}");

                if ( myDivImagesPostonly{{$list->id}}.scrollHeight >=  myDivImagesPostonly{{$list->id}}.offsetHeight) {
                    seeMoreButtonImagesPostonly{{$list->id}}.style.display = "block";
                }

                function seeMoreImagesPostonly{{$list->id}}() {
                     myDivImagesPostonly{{$list->id}}.style.maxHeight = "none";
                    seeMoreButtonImagesPostonly{{$list->id}}.style.display = "none";
                    seeLessButtonImagesPostonly{{$list->id}}.style.display = "block";
                }

                function seeLessImagesPostonly{{$list->id}}() {
                     myDivImagesPostonly{{$list->id}}.style.maxHeight = "3rem";
                    seeMoreButtonImagesPostonly{{$list->id}}.style.display = "block";
                    seeLessButtonImagesPostonly{{$list->id}}.style.display = "none";
                }
            </script> 
        </div>
    @endforeach                 
</div>

{{-- video blog only  --}}


<div id="videoblog" class="tabcontent">
    @foreach($video_blog_data as $video_list)
        <div class="video-blog-content">
            <style>
                #see-more-button-video-blog-only-{{$video_list->id}}, #see-less-button-video-blog-only-{{$video_list->id}} {
                    display: none;
                    background-color: none;
                    color: rgb(24,79,0);;
                    border: none;
                    font-size: 0.7rem;
                    cursor: pointer;
                    margin-top: 5px;
                    margin-bottom: 5px;
                }
            </style>
            <div class="blog-info">
                <h4 style="margin: 0px"><b>{!!nl2br(e($video_list->video_title))!!}</b></h4>
                    <p>
                        @foreach($admin as $item)
                            @if ($item->id == $video_list->user_id)
                                Author: {{$item->name}}
                            @else
                                Unknown Author
                            @endif
                        @endforeach
                        <br>{{ date('F j, Y \a\t g:i a', strtotime($video_list->created_at)) }}
                    </p>
                    <figcaption id="idVideoBlogOnly{{$video_list->id}}" class="blog-description">
                        {!! nl2br(e($video_list->video_description)) !!}   
                    </figcaption>
                    <a id="see-less-button-video-blog-only-{{$video_list->id}}" onclick="seeLessVideoBlogOnly{{$video_list->id}}()">See Less...</a>
                    <a id="see-more-button-video-blog-only-{{$video_list->id}}" onclick="seeMoreVideoBlogOnly{{$video_list->id}}()">See More...</a>
                    <video class="content-video" controls>
                        {{-- <source src="{{ Storage::url($video_list->video_path) }}" type="video/mp4"> --}}
                            <source src="{{ asset('/storage/upload_vid/' . $video_list->video_path) }}" type="video/mp4">
                    </video>      
                {{-- <div class="blog-buttons">    
                    <button class="blog-see-more"><img class="blog-icons" src="/img/like.png" >  like</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
                    <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
                </div> --}}
            </div>
            <script>
                const myDivVideoBlogOnly{{$video_list->id}} = document.getElementById("idVideoBlogOnly{{$video_list->id}}");
                const seeMoreButtonVideoBlogOnly{{$video_list->id}} = document.getElementById("see-more-button-video-blog-only-{{$video_list->id}}");
                const seeLessButtonVideoBlogOnly{{$video_list->id}} = document.getElementById("see-less-button-video-blog-only-{{$video_list->id}}");

                if (myDivVideoBlogOnly{{$video_list->id}}.scrollHeight >= myDivVideoBlogOnly{{$video_list->id}}.offsetHeight) {
                    seeMoreButtonVideoBlogOnly{{$video_list->id}}.style.display = "block";
                }

                function seeMoreVideoBlogOnly{{$video_list->id}}() {
                    myDivVideoBlogOnly{{$video_list->id}}.style.maxHeight = "none";
                    seeMoreButtonVideoBlogOnly{{$video_list->id}}.style.display = "none";
                    seeLessButtonVideoBlogOnly{{$video_list->id}}.style.display = "block";
                }

                function seeLessVideoBlogOnly{{$video_list->id}}() {
                    myDivVideoBlogOnly{{$video_list->id}}.style.maxHeight = "3rem";
                    seeMoreButtonVideoBlogOnly{{$video_list->id}}.style.display = "block";
                    seeLessButtonVideoBlogOnly{{$video_list->id}}.style.display = "none";
                }
            </script>
        </div>
    @endforeach         
</div>

<script>

// Open the default tab
document.getElementById("buttonidsBLogs").click();

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

@include('pages.faqs')
@endsection



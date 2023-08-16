@extends('layouts.app')
@section('content')
<style>
@media screen and (min-width: 768px) {

  ::-webkit-scrollbar {
    width: 4px !important;
    height: 4px !important;
    background-color: #adadad !important;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }
    ::-webkit-scrollbar:hover {
    opacity: 1;
  }
  
  /* Change the color of the scrollbar thumb */
  ::-webkit-scrollbar-thumb {
    background-color: #adadad !important;
    width: 4px !important;
    height: 4px !important;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }
  ::-webkit-scrollbar-thumb:hover {
    background-color: #adadad !important;
    width: 4px !important;
    height: 4px !important;
    opacity: 1;
  }
  
  /* Change the color of the scrollbar track */
  ::-webkit-scrollbar-track {
    background-color: #ffffff !important;
    width: 4px !important;
    height: 4px !important;
  }
  video {
    /* object-fit: fill;  */
  }

  body {
    margin: 0;
  }
  #product-header{
    font-family: 'Times New Roman', Times, serif;
      font-size: 40px;
      font-weight: bold;
      color:rgb(24,79,0);
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      position: absolute;
      margin: 150px 0  0 35%;
  }
  h2{
      font-family: 'Times New Roman', Times, serif;
      font-size: 40px;
      font-weight: bold;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }
  #bg-video {
    /* position: relative; */
    top: 0;
    left: 0;
    width: 100%;
    height: 300px;
    object-fit: cover;
    z-index: -1;
    margin-top: 50px;
  }
    /* Style for the tab buttons */
  .tab {
    overflow: hidden;
    background-color: #f1f1f1;
    display: flex;
    overflow-x: scroll;
    -webkit-overflow-scrolling: touch;
    white-space: nowrap; /* Prevent buttons from wrapping to new lines */ 
    /* border: none; */
 
  }

  /* Style for the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 14px;
    white-space: normal; /* Allow button text to wrap if needed */
    min-width: unset; /* Remove the 'min-width' property */
    flex: none; /* Disable flex behavior for the buttons */
    border: none;
  }
  /* .tab .tablinks{
    background-color: yellow;
  } */
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
    padding: 10px;
    border-top: none;
    width: 100%;
    height: auto;
    height: calc(200vh - 250px); /* set a fixed height */
    overflow-y: auto; /* add scrolling for content that exceeds the height */
    background-color: rgb(255, 255, 255);
  }

    /* Show the selected tab */
  #AllList {
      display: block;
  }

    /* Container for image and figcaption */
  .category-row-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin: 0 30px;
    position: relative;  
  }
  /* .category-row-container:after {
    content: "";
    display: table;
    clear: both;   
  } */
  .category-row-container .category-column-container{
    width: 100%;
    text-align: justify;
    max-width: 700px;
    word-wrap: break-word;
  }
  .category-row-container .category-column-container img{
    object-fit: fill;
    max-height: 400px;
    width: 100%;
    height: 100%;
    float: left;
  }

  .category-column-container .comment-profile{
    max-width: 35px;
    max-height: 35px;
    margin-left: 10px
  }
  .category-row-container .category-column-container .comment-name{
    font-size: 14px;
    margin: 0px;
    padding-left: 10px
  }
  .category-row-container .category-column-container h3{
    margin-top: 0px;
    font-weight: bold;
  }
  .category-row-container .category-column-container .comment-date{
    margin: 0px;
    font-size: 10px;
    padding-left: 10px
  }
  .category-row-container .category-column-container .comment-details{
    margin-top: 0px;
    font-size: 12px;
    padding-left: 25px;
  }
  .category-row-container .category-column-container .comment-star-container{
    margin-left:25px;
  }
  /* .image-container img {
      max-width: 50%;
      max-height: 400px;
      margin-left: 20px;
      width: 60%;
      padding: 10px;
  }
  .image-container figcaption {
      width: 50%;
      margin-left: 20px;
      text-align: justify;
  } */

  .unit-container{
      width: 100%;
      
  }
  .unit-row{
    width: 100%;
  }
  .unit-row:after{
    content: "";
    display: table;
    clear: both;
  }
  .unit-column{
      border: 2px solid #ccc;
      float: left;
      width: 23%;
      text-align: center; 
      background-color: rgb(255, 255, 255);
      margin: 1%;
      
  }
  .unit-column img{
      /* max-width: 200px;
      height: 200px;
      padding-top: 10px; */
      width: 100%;
    height: 300px;
    object-fit: cover;
    padding: 10px;
  }
  .add-to-cart-btn{
      background-color: rgb(24,79,0);
      color: white;
      border-radius: 5px;
      margin-bottom: 10px;
      font-size: 12px;
      border: none;
  }
    /* rate icon css */
    .heading {
      font-size: 18px;
      /* margin-right: 25px; */
      font-weight: bold;
    }
    .fa {
      font-size: 18px;
    }
    .comment-star{
      font-size: 15px;
      
    }
    .general-rating-column{
      width: 20%;
      float: left;
      text-align: center; 
    }
    .general-rating-column h1{
      font-size: 60px;
      padding-left: 30px;
      margin-bottom: 0px;
      color: rgba(0, 0, 0, 0.904);
      font-weight: 500;
    }
    .bar-rating-column{
      width: 80%;
      float: left;
    }
    .general-rating-column .star-column{
      padding-left: 25px;
    }
    .checked {
      color: rgb(0, 83, 33);
    }

    /* Three column layout */
    .side {
      float: left;
      width: 15%;
      margin-top:7px;
    }

    .side .star-num {
      float: right;
      padding-right: 10px;
    }
    .side .star-num-value {
      float: left;
      padding-left: 10px;
    }

    .middle {
      margin-top:10px;
      float: left;
      width: 70%;
    }

    /* Place text to the right */
    .right {
      text-align: right;
      
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* The bar container */
    .bar-container {
      width: 100%;
      background-color: #f1f1f1;
      text-align: center;
      color: white;
      border-radius: 5px;
    }

    /* Individual bars */
    .bar-5 {width: 60%; border-radius: 5px; height: 18px; background-color: rgb(0, 83, 33);;}
    .bar-4 {width: 30%; border-radius: 5px; height: 18px; background-color: rgb(0, 83, 33);;}
    .bar-3 {width: 10%; border-radius: 5px; height: 18px; background-color: rgb(0, 83, 33);;}
    .bar-2 {width: 4%; border-radius: 5px; height: 18px; background-color: rgb(0, 83, 33);;}
    .bar-1 {width: 15%; border-radius: 5px; height: 18px; background-color: rgb(0, 83, 33);;}

    .rating-body {
      font-family: Arial;
      margin: 0 auto; /* Center website */
      width: 100%; /* Max width */
      padding: 0 0px;
    } 

    .category-column-container .rating-body .row{
    margin-top: 70px;
    }
    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {
      .side, .middle {
        width: 100%;
      }
      .right {
        display: none;
      }
    }
}
/* mobile CSS */
@media screen and (max-width: 768px) {
  ::-webkit-scrollbar {
    width: 4px !important;
    height: 4px !important;
    background-color: #adadad !important;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }
    ::-webkit-scrollbar:hover {
    opacity: 1;
  }
  
  /* Change the color of the scrollbar thumb */
  ::-webkit-scrollbar-thumb {
    background-color: #adadad !important;
    width: 4px !important;
    height: 4px !important;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }
  ::-webkit-scrollbar-thumb:hover {
    background-color: #adadad !important;
    width: 4px !important;
    height: 4px !important;
    opacity: 1;
  }
  
  /* Change the color of the scrollbar track */
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

 /* Style for the tab buttons */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      /* width: 100%;
      min-width: 100%; */
      display: flex;
      /* justify-content: center;
      align-items: center; */
      overflow-x: scroll !important;
      -webkit-overflow-scrolling: touch !important;
      white-space: nowrap; /* Prevent buttons from wrapping to new lines */ 
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
      font-size: 0.875rem;
      white-space: normal; /* Allow button text to wrap if needed */
      min-width: unset; /* Remove the 'min-width' property */
      flex: none; /* Disable flex behavior for the buttons */
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
        /* Show the selected tab */
    /* Container for image and figcaption */
    .category-row-container {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 1rem;
      padding: 0 0.5rem;
      position: relative;  
    }
    .category-row-container .category-column-container{
      width: 100%;
      text-align: justify;
      height: auto;
      width: 100%;
      max-width:30rem;
      /* width: 300px; */
      word-wrap: break-word;
    }
    .category-row-container .category-column-container img{
      object-fit: fill;
      max-height: 20rem;
      width: 100%;
      height: 100%;
      float: left;
    }

    .category-column-container .comment-profile{
      max-width: 2.5rem;
      max-height: 2.5rem;
      margin-left: 0rem;
    }
    .category-row-container .category-column-container .comment-name{
      font-size: 0.875rem;
      margin: 1.5rem 0px 0px 0px;
      padding-left: 0px;
    }
    .category-row-container .category-column-container h3{
      margin-top: 0px;
      font-weight: bold;
      font-size: 0.875rem;
    }
    .category-row-container .category-column-container .comment-date{
      margin: 0px;
      font-size: 0.6rem;
      padding-left: 0px;
    }
    .category-row-container .category-column-container .comment-details{
      margin-top: 0px;
      font-size: 0.875rem;
      padding-left: 0rem;
    }
    .category-row-container .category-column-container .category-description-details{
      font-size: 0.875rem;
    }
    .category-row-container .category-column-container .comment-star-container{
      margin-left:25px;
      margin: 0px;
    }
    .unit-container{
        width: 100%;
        
    }
    .unit-container h3{
       font-size: 1rem;
        
    }
    .unit-row{
      width: 100%;
    }
    .unit-row:after{
      content: "";
      display: table;
      clear: both;
    }
    .unit-column{
        border: 2px solid #ccc;
        float: left;
        width: 48%;
        text-align: center; 
        background-color: rgb(255, 255, 255);
        margin: 1%;
        
    }
    .unit-column img{
        /* max-width: 200px;
        height: 200px;
        padding-top: 10px; */
        width: 100%;
        height: 100%;
      max-height: 10rem;
      min-height: 10rem;
      object-fit: cover;
      padding: 0px;
    }
    .unit-container .unit-row .unit-column h3{
      font-size: 0.875rem;
      
    }
    .unit-container .unit-row .unit-column hr{
      margin: 0px;
    }
    .unit-container .unit-row .unit-column p{
      font-size: 0.875rem;
    }
    .add-to-cart-btn{
        background-color: rgb(24,79,0);
        color: white;
        /* border-radius: 1rem; */
        margin-bottom: 0.5rem;
        font-size: 0.6rem;
        border: none;
    }
    .tabcontent hr{
      margin: 0px;
    }
   
  .heading {
    font-size: 0.875rem;
    /* margin-right: 25px; */
    font-weight: bold;
  }
  .fa {
    font-size: 0.875rem;
  }
  .comment-star{
    font-size: 0.7rem;
    
  }

  .rating-small-description{
    font-size: 0.7rem;
  }
  .general-rating-column{
    width: 20%;
    float: left;
    text-align: center; 
  }
  .general-rating-column h1{
    font-size: 2.5rem;
    padding-left: 1rem;
    margin-bottom: 0px;
    color: rgba(0, 0, 0, 0.904);
    font-weight: 500;
  }
  .bar-rating-column{
    width: 80%;
    float: left;
  }
  .general-rating-column .star-column{
    padding-left: 1rem;
  }
  .checked {
    color: rgb(0, 83, 33);
  }

  /* Three column layout */
  .side {
    float: left;
    width: 15%;
    margin-top:0.3rem;
  }

  .side .star-num {
    float: right;
    padding-right: 0.1rem;
    font-size: 0.5rem;
  }
  .side .star-num-value {
    float: left;
    padding-left: 0.1rem;
    font-size: 0.5rem;
  }

  .middle {
    margin-top: 0.2rem;
    float: left;
    width: 70%;
  }

  /* Place text to the right */
  .right {
    text-align: right;
    
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* The bar container */
  .bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
    border-radius: 5px;
  }

  /* Individual bars */
  .bar-5 {width: 60%; border-radius: 5px; height: 0.5rem; background-color: rgb(0, 83, 33);;}
  .bar-4 {width: 30%; border-radius: 5px; height: 0.5rem; background-color: rgb(0, 83, 33);;}
  .bar-3 {width: 10%; border-radius: 5px; height: 0.5rem; background-color: rgb(0, 83, 33);;}
  .bar-2 {width: 4%; border-radius: 5px; height: 0.5rem; background-color: rgb(0, 83, 33);;}
  .bar-1 {width: 15%; border-radius: 5px; height: 0.5rem; background-color: rgb(0, 83, 33);;}

  .rating-body {
    font-family: Arial;
    margin: 0 auto; /* Center website */
    width: 100%; /* Max width */
    padding: 0 0px;
  } 

  .category-column-container .rating-body .row{
  margin-top: 1rem;
  }
#AllList {
  display: block;
}
}

</style>
<div class="product-header-container" id="mobile-product-content">
{{-- <h2 id="product-header">PRODUCTS CATEGORY</h2> --}}
  <div>
  <img class="mobile-product-logo" type="image/png" src="{{ asset('/img/ActivPack_logo_darkmode.png') }}">
  </div>
  <div class="tab">
    <button id="AllCategory" class="tablinks" onclick="openCategory(event, 'AllList')">All Category</button>
    @foreach($category_data as $list)
      <button id="category{{$list->id}}"  class="tablinks" onclick='openCategory(event, "{{$list->cat_title}}-mobile")'>{{$list->cat_title}}</button>
    @endforeach
  </div>
</div>



<div id="desktop-product-content">
  <h2 id="product-header">PRODUCTS CATEGORY</h2>
  <body>
      <video id="bg-video" autoplay loop muted>
        <source  id="bg-video"  src="/vids/product-bg-final.mp4" type="video/mp4">
      </video>
    
      <!-- rest of your HTML content -->
  </body>
  <div class="tab">
    <button id="AllCategory" class="tablinks" onclick="openCategory(event, 'AllList')">All Category</button>
    @foreach($category_data as $list)
      <button id="category{{$list->id}}"  class="tablinks" onclick='openCategory(event, "{{$list->cat_title}}-desktop")'>{{$list->cat_title}}</button>
    @endforeach
  </div>
</div>



{{-- <div id="id02" class="w3-modal">
  <div class="w3-modal-content" style="overscroll-behavior: contain;">
    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('id02').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2 style="text-align:center"><b>ACTIVPACK E-COMMERCE</b></h2>
    </header> 
    <div class="w3-container" style="color:black">
      <figure class="slide-services">
        <div style="width:100%;height:0;padding-bottom:67%;position:relative;"><iframe src="https://giphy.com/embed/iTWomlMFQXIA5DN0VZ" width="100%" height="70%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
      </figure>
      </div>
  </div>
</div> --}}

    <div id="desktop-specific-product-category-content">
  @foreach($category_data as $list)
  <div id="{{$list->cat_title}}-desktop" class="tabcontent">
      <div class="category-row-container">
        <div class="category-column-container">
          <img class="category-img" src="{{ asset('storage/upload_img/'.$list->cat_img) }}"> 
        </div>
        <div class="category-column-container">
          <div class="rating-body">
            <span class="heading">User Ratings and Reviews</span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <p class="rating-small-description" style="margin: 0px">Ratings and reviews have been verified and provided by individuals who use the same type of product.</p>


            <div class="row">
              <div class="general-rating-column">
              <h1>4.5</h1>
              <div class="star-column">
              <span class="fa fa-star comment-star checked"></span>
                <span class="fa fa-star comment-star checked"></span>
                <span class="fa fa-star comment-star checked"></span>
                <span class="fa fa-star comment-star checked"></span>
                <span class="fa fa-star comment-star"></span>
              </div>
              </div>
              <div class="bar-rating-column">
                <div class="side">
                  <div class="star-num">5</div>
                </div>
                <div class="middle">
                  <div class="bar-container">
                    <div class="bar-5"></div>
                  </div>
                </div>
                <div class="side right">
                  <div class="star-num-value">150</div>
                </div>
                <div class="side">
                  <div class="star-num">4</div>
                </div>
                <div class="middle">
                  <div class="bar-container">
                    <div class="bar-4"></div>
                  </div>
                </div>
                <div class="side right">
                  <div class="star-num-value">63</div>
                </div>
                <div class="side">
                  <div class="star-num">3</div>
                </div>
                <div class="middle">
                  <div class="bar-container">
                    <div class="bar-3"></div>
                  </div>
                </div>
                <div class="side right">
                  <div class="star-num-value">15</div>
                </div>
                <div class="side">
                  <div class="star-num">2</div>
                </div>
                <div class="middle">
                  <div class="bar-container">
                    <div class="bar-2"></div>
                  </div>
                </div>
                <div class="side right">
                  <div class="star-num-value">6</div>
                </div>
                <div class="side">
                  <div class="star-num">1</div>
                </div>
                <div class="middle">
                  <div class="bar-container">
                    <div class="bar-1"></div>
                  </div>
                </div>
                <div class="side right">
                  <div class="star-num-value">20</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="category-column-container">
          <h3 style="margin: 0px;">{{$list->cat_title}}</h3>
          <p class="category-description-details">{!! nl2br(e($list->cat_description)) !!}</p>
        </div>
        <div class="category-column-container">
          <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Reynald Marticio</h5>
          <p class="comment-date">January, 26 2023</p>
          <div class="comment-star-container">
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star"></span>
          </div>
            <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Rhonda Rada</h5>
          <p class="comment-date">January, 26 2023</p>
          <div class="comment-star-container">
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star"></span>
          </div>
            <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Elvis Barrios</h5>
          <p class="comment-date">January, 26 2023</p>
          <div class="comment-star-container">
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star"></span>
          </div>
            <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
      </div>
      <div class="unit-container">
        <h3  style="color:rgb(24,79,0)" align="center"><b>(Unit: mm)</b></h3>
        <div class="unit-row">
          @foreach($product_data as $product_list)
          @if($product_list->prod_cat_id == $list->id)
            <div class="unit-column">
              <img src="{{ asset('storage/upload_img/'.$product_list->prod_img) }}">
                <h3><b>{{$product_list->prod_title}}</b></h3>
                <hr style="border-color: blue">
                <p>{{$product_list->prod_description}}</p>
                {{-- <button class="add-to-cart-btn">Add to Cart</button> --}}
            </div>
            @endif
          @endforeach  
        </div>
      </div>
    </div>
    @endforeach
    </div>


      <div id="mobile-specific-product-category-content">
        @foreach($category_data as $list)
  <div id="{{$list->cat_title}}-mobile" class="tabcontent">
        <div class="category-row-container">
          <div class="category-column-container">
            <img class="category-img" src="{{ asset('storage/upload_img/'.$list->cat_img) }}"> 
          </div>
          <div class="category-column-container">
            <h3 style="margin: 0px;">{{$list->cat_title}}</h3>
            <p class="category-description-details">{!! nl2br(e($list->cat_description)) !!}</p>
          </div>
          <div class="category-column-container">
            <div class="rating-body">
              <span class="heading">User Ratings and Reviews</span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <p class="rating-small-description" style="margin: 0px">Ratings and reviews have been verified and provided by individuals who use the same type of product.</p>


              <div class="row">
                <div class="general-rating-column">
                <h1>4.5</h1>
                <div class="star-column">
                <span class="fa fa-star comment-star checked"></span>
                  <span class="fa fa-star comment-star checked"></span>
                  <span class="fa fa-star comment-star checked"></span>
                  <span class="fa fa-star comment-star checked"></span>
                  <span class="fa fa-star comment-star"></span>
                </div>
                </div>
                <div class="bar-rating-column">
                  <div class="side">
                    <div class="star-num">5</div>
                  </div>
                  <div class="middle">
                    <div class="bar-container">
                      <div class="bar-5"></div>
                    </div>
                  </div>
                  <div class="side right">
                    <div class="star-num-value">150</div>
                  </div>
                  <div class="side">
                    <div class="star-num">4</div>
                  </div>
                  <div class="middle">
                    <div class="bar-container">
                      <div class="bar-4"></div>
                    </div>
                  </div>
                  <div class="side right">
                    <div class="star-num-value">63</div>
                  </div>
                  <div class="side">
                    <div class="star-num">3</div>
                  </div>
                  <div class="middle">
                    <div class="bar-container">
                      <div class="bar-3"></div>
                    </div>
                  </div>
                  <div class="side right">
                    <div class="star-num-value">15</div>
                  </div>
                  <div class="side">
                    <div class="star-num">2</div>
                  </div>
                  <div class="middle">
                    <div class="bar-container">
                      <div class="bar-2"></div>
                    </div>
                  </div>
                  <div class="side right">
                    <div class="star-num-value">6</div>
                  </div>
                  <div class="side">
                    <div class="star-num">1</div>
                  </div>
                  <div class="middle">
                    <div class="bar-container">
                      <div class="bar-1"></div>
                    </div>
                  </div>
                  <div class="side right">
                    <div class="star-num-value">20</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="category-column-container">
            <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Reynald Marticio</h5>
            <p class="comment-date">January, 26 2023</p>
            <div class="comment-star-container">
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star"></span>
            </div>
              <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Rhonda Rada</h5>
            <p class="comment-date">January, 26 2023</p>
            <div class="comment-star-container">
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star"></span>
            </div>
              <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            <h5 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Elvis Barrios</h5>
            <p class="comment-date">January, 26 2023</p>
            <div class="comment-star-container">
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star checked"></span>
              <span class="fa fa-star comment-star"></span>
            </div>
              <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </div>
        </div>
        <div class="unit-container">
          <h3  style="color:rgb(24,79,0)" align="center"><b>(Unit: mm)</b></h3>
          <div class="unit-row">
            @foreach($product_data as $product_list)
            @if($product_list->prod_cat_id == $list->id)
              <div class="unit-column">
                <img src="{{ asset('storage/upload_img/'.$product_list->prod_img) }}">
                  <h3><b>{{$product_list->prod_title}}</b></h3>
                  <hr style="border-color: blue">
                  <p>{{$product_list->prod_description}}</p>
                  {{-- <button class="add-to-cart-btn">Add to Cart</button> --}}
              </div>
              @endif
            @endforeach  
          </div>
        </div>
      </div>
      @endforeach 
  </div>
{{-- All tab content --}}
<div id="AllList" class="tabcontent">
  
 <div id="desktop-product-category-content">
  @foreach($category_data as $list)
  <div  class="category-row-container">
    <div class="category-column-container">
      <img src="{{ asset('storage/upload_img/'.$list->cat_img) }}"> 
    </div>
    <div class="category-column-container">
      <div class="rating-body">
        <span class="heading">User Ratings and Reviews</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p class="rating-small-description" style="margin: 0px">Ratings and reviews have been verified and provided by individuals who use the same type of product.</p>

        <div class="row">
          <div class="general-rating-column">
          <h1>4.5</h1>
          <div class="star-column">
          <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star"></span>
          </div>
          </div>
          <div class="bar-rating-column">
            <div class="side">
              <div class="star-num">5</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-5"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">150</div>
            </div>
            <div class="side">
              <div class="star-num">4</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-4"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">63</div>
            </div>
            <div class="side">
              <div class="star-num">3</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-3"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">15</div>
            </div>
            <div class="side">
              <div class="star-num">2</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-2"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">6</div>
            </div>
            <div class="side">
              <div class="star-num">1</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-1"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">20</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="category-column-container">
      <h3 style="margin: 0px;">{{$list->cat_title}}</h3>
      <p class="category-description-details">{!! nl2br(e($list->cat_description)) !!}</p>
    </div>
    <div class="category-column-container">
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Reynald Marticio</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Rhonda Rada</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Elvis Barrios</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
  </div>
  <hr style="border-color: blue">
  <div class="unit-container">
    <h3  style="color:rgb(24,79,0)" align="center"><b>(Unit: mm)</b></h3>
    <div class="unit-row">
      @foreach($product_data as $product_list)
      @if($product_list->prod_cat_id == $list->id)
        <div class="unit-column"> 
            <img src="{{ asset('storage/upload_img/'.$product_list->prod_img) }}">
            <h3><b>{{$product_list->prod_title}}</b></h3>
            <hr style="border-color: blue">
            <p>{{$product_list->prod_description}}</p>
            {{-- <button class="add-to-cart-btn">Add to Cart</button> --}}
        </div>
      @endif
      @endforeach  
    </div>
  </div>
  <hr style="border-color: blue">
@endforeach
 </div>

<div id="mobile-product-category-content">
  @foreach($category_data as $list)
  <div class="category-row-container">
    <div class="category-column-container">
      <img src="{{ asset('storage/upload_img/'.$list->cat_img) }}"> 
    </div>
    <div class="category-column-container">
      <h3 style="margin: 0px;">{{$list->cat_title}}</h3>
      <p class="category-description-details">{!! nl2br(e($list->cat_description)) !!}</p>
    </div>
    <div class="category-column-container">
      <div class="rating-body">
        <span class="heading">User Ratings and Reviews</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p class="rating-small-description" style="margin: 0px">Ratings and reviews have been verified and provided by individuals who use the same type of product.</p>

        <div class="row">
          <div class="general-rating-column">
          <h1>4.5</h1>
          <div class="star-column">
          <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star checked"></span>
            <span class="fa fa-star comment-star"></span>
          </div>
          </div>
          <div class="bar-rating-column">
            <div class="side">
              <div class="star-num">5</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-5"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">150</div>
            </div>
            <div class="side">
              <div class="star-num">4</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-4"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">63</div>
            </div>
            <div class="side">
              <div class="star-num">3</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-3"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">15</div>
            </div>
            <div class="side">
              <div class="star-num">2</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-2"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">6</div>
            </div>
            <div class="side">
              <div class="star-num">1</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-1"></div>
              </div>
            </div>
            <div class="side right">
              <div class="star-num-value">20</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="category-column-container">
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Reynald Marticio</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Rhonda Rada</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      <h6 class="comment-name"><img class="comment-profile" src="{{ asset('/img/profile.png') }}" height="24px" width="24px">Elvis Barrios</h6>
      <p class="comment-date">January, 26 2023</p>
      <div class="comment-star-container">
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star checked"></span>
        <span class="fa fa-star comment-star"></span>
      </div>
        <p class="comment-details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
  </div>
  
  <hr style="border-color: blue">
    <div class="unit-container">
      <h3  style="color:rgb(24,79,0)" align="center"><b>(Unit: mm)</b></h3>
      <div class="unit-row">
        @foreach($product_data as $product_list)
        @if($product_list->prod_cat_id == $list->id)
          <div class="unit-column"> 
              <img src="{{ asset('storage/upload_img/'.$product_list->prod_img) }}">
              <h3><b>{{$product_list->prod_title}}</b></h3>
              <hr style="border-color: blue">
              <p>{{$product_list->prod_description}}</p>
              {{-- <button class="add-to-cart-btn">Add to Cart</button> --}}
          </div>
        @endif
        @endforeach  
      </div>
    </div>
    <hr style="border-color: blue">
  @endforeach
</div>
</div>


<script>

// Open the default tab
document.getElementById("AllCategory").click();

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



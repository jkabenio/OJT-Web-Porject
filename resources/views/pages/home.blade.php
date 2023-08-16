@extends('layouts.app')
@section('content')

<style>
@media screen and (min-width: 768px) {
  /* Your styles go here */
  video {
  object-fit: fill; 
  width: 100%;
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
/* BLOG CSS STARTS HERE */
.blog-header{
  position: relative;
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  font-family: 'Times New Roman', Times, serif;
  font-size: 40px;
  font-weight: bold;
  text-align: center;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
.blog-posts {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin: 0 50px;
  position: relative;
}

.blog-posts .blog-post {
  display: flex;  
  /* justify-content: center; */
  padding: 20px;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.397);
  transition: box-shadow 0.3s ease;
  background-color: rgb(255, 255, 255);
  border-radius: 5px;
}

.blog-posts .blog-post .blog-image {
  margin-right: 20px;
  max-width: 200px;
  max-height: 200px;
  min-width: 200px;
  min-height: 200px;
  object-fit: cover;
}

.blog-posts .blog-post .blog-image img {
  width: 100%;
  height: 100%;
  cursor: pointer;
 
}

.blog-content {
}

.blog-title {
  font-size: 25px;
  margin-bottom: 0px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.auth-date{
  font-size: 12px;
  margin-top: 0px;
}
.blog-description {
  font-size: 14px;
  margin-bottom: 20px;
  min-height: 100px;
  max-height: 100px;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  text-align: justify;
}
.blog-buttons {
  display: flex;
  justify-content: flex-start;
  margin-top: 0px;
}

.blog-see-more {
  color:rgb(0, 0, 0);
  background-color:rgb(255, 255, 255);
  border: none;
  border-radius: 3px;
  font-size: 12px;
  margin-right: 20px;
  padding: 0px;
}
.comment-box{
  width: 100%;
  border-radius: 10px;
}
.comment-box::placeholder{
  font-size: 12px;
}
.comment-submit-btn{
  font-size: 12px;
  padding: 7px;
  margin-top: 0px;
  border-radius: 5px;
  align-items: right;
}
.comment-submit-container{
  display:flex;
  justify-content: right;
}
.approved-comments-container{
  background-color: rgb(224, 224, 224);
  border: 1px solid black;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  padding-left: 5px;
  padding-right: 5px;
  height: 200px;
  overflow-y: auto;
  overscroll-behavior: contain;
  
}
.approved-comments-container p{
  font-size: 12px;
  margin: 0px;
  text-align: justify;
}
.approved-comments-container .comment-date{
  font-size: 9px;
  margin-bottom: 10px;
}
.approved-comments-container h6{
  font-size: 12px;
  margin: 0px 0px;
  font-weight: bold;
}
.approved-comment-box{
  background-color: rgb(224, 224, 224);
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 10px;
  border-bottom: 1px solid rgb(0, 0, 0);
}

.approved-comment-box:nth-child(even) {
  background-color: rgb(255, 255, 255);
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 10px;
  border-bottom: 1px solid rgb(0, 0, 0);
}
          

.blog-all-see-more{
  text-align: center;
  margin-top: 15px;
  margin-bottom: 15px;
}
.blog-all-see-more a{
  text-decoration:none;
  background-color:rgb(24,79,0);
  color:white;
  border: 1px solid rgb(32, 102, 1);
  padding: 10px;
  border-radius: 3px;
  font-size: 13px;
}
.blog-all-see-more a:hover{
background-color:rgb(34, 109, 2);
}
.blog-icons{
  width: 24px;
  height: 24px;
}

/* BLOG POST CSS ENDS HERE*/

.about-container {
  position: relative;
  width: 100%;
  margin-bottom: 500px;
}
.about-container .about-title{
  text-align: center;
  padding: 20px 0px 20px 0px;
  color:rgb(24,79,0);
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 40px;
  font-weight: bold;
  margin: 0px;
}

.about-container .about-image-container{
 width: 100%;
 height: 200%;
 /* object-fit: contain; */
 position: absolute;
}
.about-container .about-image-container img{
 width: 100%;
 height: 100%;

}

.about-container .caption {
  position: relative;
  left: 0;
  background-color: rgba(0, 0, 0, 0.349);
  color: #fff;
  max-width: 100%;
  text-align: left;
  padding-left: 100px;
  max-height: 400px;
  margin-top: 50px;
}
.about-container .caption .about-title1{
  font-size: 50px;
  margin: 0px;
}
.about-container .caption .about-description{
  color: rgb(223, 221, 221);
  font-size:24px;
  word-spacing: 10px;
  letter-spacing: 1px;
  line-height: 1.3;
  align-items: justify;
}
 
/* sliding images css */
.slideshow-container {
  width: 100%;
  position: relative;
  margin-bottom: 90px;
}
.slideshow-container .title1{
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  font-size:30px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 30px;
  font-weight: bold;
}
.slideshow-container .title2{
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 40px;
  font-weight: bold;
}

.slideshow-container .slideshow {
  display: flex;
  flex-wrap: nowrap;
  width: 100%;
  animation: slide 20s linear infinite;
  animation-delay: 1s;
  margin-top: 20px;
  
  /* overflow-x: scroll; */
  /* -webkit-overflow-scrolling: touch; */
} 

.slideshow-container .slideshow .slide-services .slide-img-container img {
  width: calc(20% - 8px);
  height: 100%;
  object-fit: cover;
  margin-right: 0px;
}

.slideshow-container .slideshow .slide-services .slide-img-container img:last-child {
  margin-right: 0;
  width: 100%;
}

@keyframes slide {
  0% {
    transform: translateX(0%);
  }
  /* 100% {
    transform: translateX(-50%);
  } */
}

.slideshow-container .slideshow .slide-services{
  margin: 10px;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: box-shadow 0.3s ease;
  padding: 10px;
  color: rgb(0, 0, 0);
  background-color: rgba(255, 255, 255, 0.705);
  width: 100%;
  border-radius: 10px;
}
.slideshow-container .slideshow .slide-services:hover {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
}

.slideshow-container .slideshow .slide-services .slide-img-container img {
  max-width:300px;
  max-height: 250px;
  min-width:300px;
  min-height: 250px;
}
.slideshow-container .slideshow .slide-services .slide-img-container{
  width: calc(20% - 8px);
  object-fit: cover;
  max-width:300px;
  max-height: 250px;
  min-width:300px;
  min-height: 250px;
}

.slideshow-container .slideshow .slide-services .slide-title-container{
  margin-top: 5px;
  margin-bottom: 5px;
  max-height: 50px;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  color:rgb(24,79,0);
}

.slideshow-container .slideshow .slide-services figcaption{
  max-height: 155px;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  text-align: justify;
  padding-bottom: 20px;
  margin-bottom: 50px;
  width: 100%;
  max-width:300px;
  /* width: 300px; */
  word-wrap: break-word;
}

.prev, .next {
  position: absolute;
  transform: translateY(-50%);
  font-size: 15px;
  font-weight: bold;
  border: none;
  background-color: rgba(0,0,0,0.5);
  color: #fff;
  cursor: pointer;
  padding: 10px;
  z-index: 1;
  border-radius: 5px;
  height: 40px;
  margin-top: 40px;
}

.prev:hover, .next:hover {
  color: #fff;
  background-color: rgba(0, 0, 0, 0.637);
}

.prev {
  left: 47%;
}

.next {
  right: 47%;
}
/* slideshow background images */
.slideshow_backimg {
    position: absolute;
    height: 100%;
    width: 100%;
    overflow: hidden;

  }
   
  .slideshow_backimg img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }
  
  .slideshow_backimg img.active {
    opacity: 1;
  }
/* modal css */
.modal-see-more{
  color:white;
  background-color:rgb(24,79,0);
  border: none;
  border-radius: 3px;
  font-size: 13px;
  bottom: 0;
  margin-bottom: 10px;
  position: absolute;
}
.modal-see-more:hover{
  background-color:rgb(34, 109, 2);
}

/* rate icon css */
.rating-container {
    
    padding: 20px;
    margin: 20px;
    max-width: 500px;
  }

  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    align-items: center;
  }

  .rating input {
    display: none;
  } 

  .rating label {
    color: #ddd;
    font-size: 2em;
    margin: 0 0.25em;
    cursor: pointer;
  }

  .rating label.selected,
  .rating input[type="radio"]:checked ~ label {
    color: #f70;
  }

  .review-area {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    margin-top: 10px;
    resize: vertical;
  }

  button {
    background-color: #f70;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    cursor: pointer;
  }

  /* about read more css */
  .read-more .caret {
display: inline-block;
margin-left: 5px;
width: 0;
height: 0;
border-style: solid;
border-width: 5px 10px 5px 8.7px;
border-color: transparent transparent transparent rgb(255, 184, 3);
}

/* FAQs CSS ends here */
}

@media screen and (max-width: 768px) {
  /* Your styles go here */
  video {
    object-fit: fill; 
    width: 100%;
  }

  body {
    margin: 0;
  }

  #bg-video {
    /* position: fixed; */
    top: 0;
    left: 0;
    width: 100%;
    object-fit: fill;
    z-index: -1;
  }
  #home-intro-vid{
    width: 100%; 
    height:100%;
  }

/* product what we provide mobile css */
  .slideshow-container {
  width: 100%;
  position: relative;
}
.slideshow-container .title1{
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 1rem;
  font-weight: bold;
}
.slideshow-container .title2{
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 1.5rem;
  font-weight: bold;
}

.slideshow-container .slideshow {
  display: flex;
  flex-wrap: nowrap;
  width: 100%;
  margin-top: 3rem;
  overflow-x: scroll;
  -webkit-overflow-scrolling: touch;
} 

.slideshow-container .slideshow .slide-services .slide-img-container img:last-child {
  margin-right: 0;
  width: 100%;
}

/* @keyframes slide {
  0% {
    transform: translateX(0%);
  }
  100% {
    transform: translateX(-50%);
  }
} */

.slideshow-container .slideshow .slide-services{
  margin: 0.1rem;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: box-shadow 0.3s ease;
  padding: 0.5rem;
  color: rgb(0, 0, 0);
  background-color: rgba(255, 255, 255, 0.705);
  width: 100%;
  border-radius: 10px;
}
.slideshow-container .slideshow .slide-services:hover {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
}
.slideshow-container .slideshow .slide-services .slide-img-container img {
  width: calc(20% - 8px);
  height: 100%;
  object-fit: cover;
  margin-right: 0px;
}
.slideshow-container .slideshow .slide-services .slide-img-container img {
  max-width:12rem;
  max-height: 12rem;
  min-width:12rem;
  min-height: 12rem;
}
.slideshow-container .slideshow .slide-services .slide-img-container{
  width: calc(20% - 8px);
  object-fit: cover;
  max-width:12rem;
  max-height: 12rem;
  min-width:12rem;
  min-height: 12rem;
}

.slideshow-container .slideshow .slide-services .slide-title-container{
  margin-top: 0.2rem;
  margin-bottom: 0.2rem;
  max-height: 5rem;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  color:rgb(24,79,0);
 
}
.slideshow-container .slideshow .slide-services .slide-title-container h2{
  font-size: 1rem !important;
}

.slideshow-container .slideshow .slide-services figcaption{
  max-height: 5rem;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  text-align: justify;
  padding-bottom: 0.5rem;
  margin-bottom: 1rem;
  font-size: 0.875rem !important;
  width: 100%;
  max-width: 12rem;
  word-wrap: break-word;
}
/* slideshow background images */
.slideshow_backimg {
    position: absolute;
    height: 90%;
    width: 100%;
    overflow: hidden;

  }
   
  .slideshow_backimg img {
    position: absolute;
    /* top: 0;
    left: 0; */
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }
  
  .slideshow_backimg img.active {
    opacity: 1;
  }
  .modal-see-more{
  color:white;
  background-color:rgb(24,79,0);
  border: none;
  border-radius: 3px;
  font-size: 0.7rem;
  bottom: 0;
  margin-bottom: 0.5rem;
  position: absolute;
}
.modal-see-more:hover{
  background-color:rgb(34, 109, 2);
}

/* this is the about us css for mobile view */
.about-container {
  position: relative;
  width: 100%;
  margin-bottom: 4rem;
}
.about-container .about-title{
  text-align: center;
  padding: 0px 0px 0px 0px;
  color:rgb(24,79,0);
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  font-family: 'Times New Roman', Times, serif;
  font-size: 1.5rem;
  font-weight: bold;
  margin: 1rem 0rem;
}

.about-container .about-image-container{
 width: 100%;
 height: 100%;
 /* object-fit: contain; */
 position: absolute;
}
.about-container .about-image-container img{
 width: 100%;
 height: 100%;

}
  /* about read more css */
.read-more{
  font-size: 0.5rem;
  }
.read-more .caret {
  display: inline-block;
  margin-left: 5px;
  width: 0;
  height: 0;
  border-style: solid;
  /* border-width: 5px 10px 5px 8.7px; */
  border-color: transparent transparent transparent rgb(255, 184, 3);
} 
.about-container .caption {
  position: relative;
  left: 0;
  background-color: rgba(0, 0, 0, 0.658);
  color: #fff;
  max-width: 100%;
  text-align: left;
  padding-left: 1rem;
  max-height: 400px;
  margin-top: 50px;
}
.about-container .caption .about-title1{
  font-size: 1.3rem;
  margin: 0px;
}
.about-container .caption .about-description{
  color: rgb(223, 221, 221);
  font-size:1rem;
  word-spacing: 0.1rem;
  letter-spacing: 1px;
  line-height: 1.3;
}
/* about us mobile css ends here */
/* BLOG CSS STARTS HERE */
.blog-header{
  position: relative;
  text-align: center;
  margin:0px;
  color:rgb(24,79,0);
  font-family: 'Times New Roman', Times, serif;
  font-size: 1.5rem;
  font-weight: bold;
  text-align: center;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
.blog-posts {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 1rem;
  position: relative;
}

.blog-posts .blog-post {
  display: flex;  
  /* justify-content: center; */
  padding: 20px;
  border: 1px solid #ddd;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.397);
  transition: box-shadow 0.3s ease;
  background-color: rgb(255, 255, 255);
  border-radius: 5px;
}

.blog-posts .blog-post .blog-image {
  margin-right: 1rem;
  max-width: 10rem;
  max-height: 10rem;
  min-width: 10rem;
  min-height: 10rem;
  object-fit: cover;
}

.blog-posts .blog-post .blog-image img {
  width: 100%;
  height: 100%;
  cursor: pointer;
 
}

.blog-title {
  font-size: 1rem;
  margin: 0 0 0 0px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.auth-date{
  font-size: 0.7rem;
  margin-top: 0px;
}
.blog-description {
  font-size: 0.875rem;
  margin-bottom: 1rem;
  min-height: 2rem;
  max-height: 2.875rem;
  overflow: hidden;
  white-space: normal;
  text-overflow: ellipsis;
  text-align: justify;
}
.blog-buttons {
  display: flex;
  justify-content: flex-start;
  margin-top: 0px;
}

.blog-see-more {
  color:rgb(0, 0, 0);
  background-color:rgb(255, 255, 255);
  border: none;
  border-radius: 3px;
  font-size: 0.7rem;
  margin-right: 20px;
  padding: 0px;
}
.comment-box{
  width: 100%;
  border-radius: 0.5rem;
  font-size: 0.7rem;
}
.comment-box::placeholder{
  font-size: 0.7rem;
}
.comment-submit-btn{
  font-size: 0.7rem;
  padding: 7px;
  margin-top: 0px;
  border-radius: 0.2rem;
  align-items: right;
}
.comment-submit-container{
  display:flex;
  justify-content: right;
}
.approved-comments-container{
  background-color: rgb(224, 224, 224);
  border: 1px solid black;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  padding-left: 5px;
  padding-right: 5px;
  height: 200px;
  overflow-x: scroll;
  overflow-y: scroll;
  -webkit-overflow-scrolling: touch;
  overscroll-behavior: contain;
} 
.approved-comments-container p{
  font-size: 0.7rem;
  margin: 0px;
  text-align: justify;
}
.approved-comments-container .comment-date{
  font-size: 9px;
  margin-bottom: 10px;
}
.approved-comments-container h6{
  font-size: 0.7rem;
  margin: 0px 0px;
  font-weight: bold;
}
.approved-comment-box{
  background-color: rgb(224, 224, 224);
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 10px;
  border-bottom: 1px solid rgb(0, 0, 0);
}

.approved-comment-box:nth-child(even) {
  background-color: rgb(255, 255, 255);
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 10px;
  border-bottom: 1px solid rgb(0, 0, 0);
}
      
.blog-all-see-more{
  text-align: center;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.blog-all-see-more a{
  text-decoration:none;
  background-color:rgb(24,79,0);
  color:white;
  border: 1px solid rgb(32, 102, 1);
  padding: 10px;
  border-radius: 3px;
  font-size: 0.6rem;
}
.blog-all-see-more a:hover{
background-color:rgb(34, 109, 2);
}
.blog-icons{
  width: 1rem;
  height: 1rem;
}
.blog-icons:hover{
  width: 25px;
  height: 25px;
}
/* BLOG POST CSS ENDS HERE*/
 
}

</style>
<script>
  const stars = document.querySelectorAll('.rating input[type="radio"]');
 const starLabels = document.querySelectorAll('.rating label');
 const progressBars = document.querySelectorAll('.rating .progress');
 
 stars.forEach((star, i) => {
   star.addEventListener('change', () => {
     starLabels.forEach((label, j) => {
       if (j <= i) {
         label.classList.add('selected');
       } else {
         label.classList.remove('selected');
       }
     });
     updateProgressBars();
   });
 });
 
 function updateProgressBars() {
   const ratings = [0, 0, 0, 0, 0];
   stars.forEach((star) => {
     if (star.checked) {
       const rating = parseInt(star.value);
       ratings[rating - 1]++;
     }
   });
   progressBars.forEach((bar, i) => {
     const rating = i + 1;
     const count = ratings[i];
     const percent = count * 100 / stars.length;
     bar.style.width = percent + '%';
     bar.setAttribute('aria-valuenow', count);
     bar.setAttribute('aria-valuemax', stars.length);
     bar.setAttribute('aria-label', `Rated ${rating} stars by ${count} users`);
   });
 }
//  function openModal(id) {
//   var modal = document.getElementById(id);
//   modal.style.display = "block";
// }
// function openModal() {
//     document.getElementById("myModal").style.display = "block";
//   }

//   function closeModal() {
//     document.getElementById("myModal").style.display = "none";
//   }
 </script> 

<video id="home-intro-vid" muted autoplay loop>
  <source src="{{ asset('/vids/background(3).mp4') }}" type="video/mp4">
</video>
<body>
  {{-- <video id="bg-video" autoplay loop muted>
    <source  id="bg-video"  src="/vids/leaves_falling(123).mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video> --}}
  <!-- rest of your HTML content -->
</body>

<div id="logoslink" class="slideshow-container">
  <p class="title1">PRODUCTS</p>
  <p class="title2">WHAT WE PROVIDE?</p>  
  <div class="slideshow_backimg">
    <img src="{{ asset('/img/pic55.jpg') }}" class="active">
    <img src="{{ asset('/img/pic33.jpg') }}">
    <img src="{{ asset('/img/pic44.jpg') }}">
  </div> 
  <div class="slideshow">
    @foreach($category_data as $list)
      <figure class="slide-services">
        <div class="slide-img-container">
          <img src="{{ asset('storage/upload_img/'.$list->cat_img) }}" width="100%" height="100%">
        </div>
        <div class="slide-title-container">
          <h2><b>{{$list->cat_title}}</b></h2>
        </div>
        <figcaption>{{$list->cat_description}}</figcaption>
        <button class="modal-see-more"><a style="text-decoration: none; width: 100%" href='{{ url("/product?button=category{$list->id}") }}'>See More</a></button>

      </figure>  
    @endforeach 
  </div>
  <button class="prev" onclick="prevSlide()">&#10094;</button>
  <button class="next" onclick="nextSlide()">&#10095;</button>
</div>
 
{{-- <script>
function openModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}
</script> --}}
<div class="about-container">
  <p class="about-title">ABOUT US</p>
  <div class="about-image-container">
    <img src="{{ asset('/img/for_about_us.jpg') }}">
  </div>
  <div class="caption">
    <p class="about-title1">Who <span style="color:rgb(255, 184, 3)">we are?</span></p>
    <p class="about-description">
      As a leader in active packaging products for 40 years,
      Amelco Desiccants Inc. meets growing demands of the high
      technology electronics and semiconductor industries,
      pharmaceutical,medical, aerospace, agriculture,food,
      logistics and general packaging industries...</p>
      <a class="read-more" href="{{ url('/about') }}" style="text-align:left;color:rgb(255, 184, 3); text-decoration:none;">Read More<span class="caret"></span></a>
  </div>
</div>
<h2 id="news" class="blog-header" ><b>EVENTS AND COMMUNITY <br> SERVICE RESPONSIBILITIES</b></h2>
<div class="blog-posts">
  @foreach($blog_data as $list)
    <div class="blog-post">
      <div class="blog-image">
        <img src="{{ asset('storage/upload_img/'.$list->blog_img)}}" alt="Blog Image">
      </div>
      <div class="blog-content">
        <h1 class="blog-title">{{$list->blog_title}}</h1>
        <p class="auth-date">
          @foreach($admin as $item)
            @if ($item->id == $list->user_id)
              {{$item->name}}
            @else
              Unknown Author
            @endif
          @endforeach
          <br>{{ date('F j, Y \a\t g:i a', strtotime($list->created_at)) }}
        </p>
        <p class="blog-description">{{$list->blog_desc}}</p>
        <div class="blog-buttons">
          <style>
            @media screen and (min-width: 768px) {
            #commentForm{{$list->id}}{
              display: none;
              /* position: fixed;
              top: 50%; left: 50%; */
              /* transform: translate(-50%, -50%); */
              background-color: rgb(226, 226, 226);
              padding: 10px;
              width: auto;
              border-radius: 20px;
            }
          }

          @media screen and (max-width: 768px) {
            #commentForm{{$list->id}}{
              display: none;
              /* position: fixed;
              top: 50%; left: 50%; */
              /* transform: translate(-50%, -50%); */
              background-color: rgb(226, 226, 226);
              padding: 10px;
              width: auto;
              border-radius: 0.5rem;
            }
          }
          </style>
          
        
          {{-- @foreach($post as $items)
            @if($list->id == $items)
              <form class="likeForm" action="{{ route('posts.like', $items) }}" method="POST">
                @csrf
                <button type="submit" class="blog-see-more like-button" data-image1="/img/like.png" data-image2="/img/liked.png">
                  <img class="blog-icons" src="/img/like.png">
                  @php
                      $count = 0;
                  @endphp
                  @foreach($likeIds as $likeIdList)
                  @if($likeIdList == $items)
                    @php
                        $count++;
                    @endphp
                  @endif
                  @endforeach
                  {{$count}}Like
                </button>
              </form>
            @endif
          @endforeach
          <button class="blog-see-more" onclick="showCommentForm{{$list->id}}()"><img class="blog-icons"  src="/img/comment.png" >  comment</button>
          <button class="blog-see-more"><img class="blog-icons"  src="/img/share.png" >  share</button>
        </div>
        <div id="commentForm{{$list->id}}">
          <form method="POST" action="{{ route('comments.store') }}">
              @csrf
              <input type="hidden" name="blog_post_id" value="{{ $list->id }}"> --}}
              
              {{-- <label for="name">Your Name:</label>
              <input type="text" name="name" id="name"> --}}
              
              {{-- <label for="content">Comment:</label> --}}
              {{-- <textarea class="comment-box" name="content" id="content" rows="2" required placeholder="Write comment here:"></textarea>
              <br>
              <div class="comment-submit-container">
              <button class="comment-submit-btn" type="submit">Submit</button>
              </div>
              <br>
          </form>
          <div class="approved-comments-container">
            <p>comments◾</p>
            @foreach($approvedComment as $aprovedCommentData)
              @if($aprovedCommentData->blog_post_id == $list->id)
                <div class="approved-comment-box">
                  <h6>{{$aprovedCommentData->name}}</h6>
                    <p class="comment-date">{{ date('F j, Y \a\t g:i a', strtotime($aprovedCommentData->created_at)) }}</p>
                    <p>&emsp;{{$aprovedCommentData->content}}</p>  
                </div>
              @endif
            @endforeach
          </div> --}}
        </div>
      </div> 
    </div>
      {{-- <script>
        // function showCommentForm{{$list->id}}() {
        //     var commentForm{{$list->id}} = document.getElementById("commentForm{{$list->id}}");
        //     commentForm{{$list->id}}.style.display = 'block';
        // }

        function showCommentForm{{$list->id}}() {
        var commentForm{{$list->id}} = document.getElementById("commentForm{{$list->id}}");
        if (commentForm{{$list->id}}.style.display === 'block') {
          commentForm{{$list->id}}.style.display = 'none';
        } else {
          commentForm{{$list->id}}.style.display = 'block';
        }
      }
      </script> --}}
  @endforeach
</div>



{{-- <script>
  $(document).ready(function () {
    $('.like-button').on('click', function () {
      var button = $(this);
      var currentImage = button.find('.blog-icons');
      var image1 = button.data('image1');
      var image2 = button.data('image2');
    
      // Toggle the image source
      if (currentImage.attr('src') === image1) {
        currentImage.attr('src', image2);
      } else {
        currentImage.attr('src', image1);
      }

      // Apply the zoom effect
      currentImage.addClass('zoomed');
      setTimeout(function() {
        currentImage.removeClass('zoomed');
      }, 300);
    });
  });
</script> --}}
{{-- 
<style>
  .zoomed {
    transform: scale(1.4);
    transition: transform 0.3s ease;
  }
</style> --}}

{{-- <script>
  $(document).ready(function () {
    $('.likeForm').on('submit', function (event) {
      event.preventDefault(); // Prevent the default form submission

      var form = $(this);
      var url = form.attr('action');
      var method = form.attr('method');
      var csrfToken = form.find('input[name="_token"]').val();

      $.ajax({
        url: url,
        type: method,
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        dataType: 'json',
        success: function (response) {
          // Handle the success response
          console.log(response.message);
        },
        error: function (xhr) {
          // Handle the error response
          console.log(xhr.responseText);
        }
      });
    });
  });
</script> --}}


</div>
<div class="blog-all-see-more" style=""><a href="{{ url('/event-csr') }}">See More</a></div>
@include('pages.faqs')
@endsection 
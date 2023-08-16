<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/jpg"  href="{{url('/img/ActivPack_logo_blackmode.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.js"></script> --}}
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>

    <style>
      /* Style for the preloader */
      #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
        background-color: #fff;
        pointer-events: none; /* Add this line */
        opacity: 1;
        transition: opacity 0.5s ease-out;
      }
      #preloader.hide {
        opacity: 0;
      }
      /* Style for the preloader animation */
      #preloader .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: 100px;
        margin-left: -25px;
        border: 5px solid #00ff37;
        border-top: 5px solid #d0ff00;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
      }
      /* Animation for the preloader spinner */
      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }
      #preloader .loader_image{
        width: 200px;
        height: 150px;
        display: block;
      margin: auto;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      }
    </style>
</head>
<body id="body">
  <div id="preloader">
    <div class="loader_image"><img src="{{ asset('/img/ActivPack_logo_blackmode.png') }}" width="100%" height="100%"></div>
    <div class="spinner"></div>
  </div>
    <main>
        @include('inc.destop_navbar')
        {{-- @include('inc.messages') --}}
          @yield('content')
          @include('inc.show-cookie')
          @include('inc.show-user-feedback')
          
          @include('inc.desktop_footer')
    </main>
    



<script>
  document.addEventListener("DOMContentLoaded", function() {
    // JavaScript to show/hide content based on screen size
    if (window.matchMedia("(max-width: 768px)").matches) {
      // Show mobile content and hide desktop content
      document.getElementById("desktop-content").style.display = "none";
      document.getElementById("mobile-content").style.display = "block";

      document.getElementById("desktop-product-content").style.display = "none";
      document.getElementById("mobile-product-content").style.display = "block";

      document.getElementById("desktop-product-category-content").style.display = "none";
      document.getElementById("mobile-product-category-content").style.display = "block";

      document.getElementById("desktop-specific-product-category-content").style.display = "none";
      document.getElementById("mobile-specific-product-category-content").style.display = "block";
      
      document.getElementById("desktop-event-csr-content").style.display = "none";
      document.getElementById("mobile-event-csr-content").style.display = "block";
      
      document.getElementById("desktop-about-us-content").style.display = "none";
      document.getElementById("mobile-about-us-content").style.display = "block";
    } else {
      // Show desktop content and hide mobile content
      document.getElementById("desktop-content").style.display = "block";
      document.getElementById("mobile-content").style.display = "none";

      document.getElementById("desktop-product-content").style.display = "block";
      document.getElementById("mobile-product-content").style.display = "none";

      document.getElementById("desktop-product-category-content").style.display = "block";
      document.getElementById("mobile-product-category-content").style.display = "none";

      document.getElementById("desktop-specific-product-category-content").style.display = "block";
      document.getElementById("mobile-specific-product-category-content").style.display = "none";

      document.getElementById("desktop-event-csr-content").style.display = "block";
      document.getElementById("mobile-event-csr-content").style.display = "none";

      document.getElementById("desktop-about-us-content").style.display = "block";
      document.getElementById("mobile-about-us-content").style.display = "none";
    }
  });
</script>
<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    setTimeout(function () {
      preloader.classList.add("hide");
    }, 1000); // Set delay time in milliseconds
  });
</script>
    
    
    {{--sliding image "40 years image"  --}}
<script>
  var video = document.getElementById("bg-video");
  video.playbackRate = 0.7;
</script>
<script>
  let slideIndex = 1;
  let timer;
  showSlide(slideIndex);
  function nextSlide() {
  showSlide(slideIndex + 1);
  }
  function prevSlide() {
    showSlide(slideIndex - 1);
  }
  function showSlide(index) {
    let slides = document.getElementsByClassName("slide-services");
    if (index > slides.length) {
      slideIndex = 1;
    } else if (index < 1) {
      slideIndex = slides.length;
    } else {
      slideIndex = index;
    }
    for (let i = 0; i <= slides.length; i++) {
      slides[i].style.transition = "transform 0.5s ease";
      slides[i].style.transform = "translateX(" + (slideIndex - 1) * -100 + "%)";
    }
  }
  function startTimer() {
    timer = setInterval(function() {
      nextSlide();
    }, 200000);
  }

  function stopTimer() {
    clearInterval(timer);
  }

  startTimer();
  document.addEventListener("visibilitychange", function() {
    if (document.hidden) {
      stopTimer();
    } else {
      startTimer();
    }
  });

  document.getElementById("btn-prev").addEventListener("click", function() {
    stopTimer();
    prevSlide();
    startTimer();
  });

  document.getElementById("btn-next").addEventListener("click", function() {
    stopTimer();
    nextSlide();
    startTimer();
  });

</script>
  {{--slideshow bg images  --}}
<script>
  var slideshowbg = document.querySelector('.slideshow_backimg');
  var images = slideshowbg.querySelectorAll('img');
  var currentIndex = 0;
  function showSlidebg() {
    for (var i = 0; i < images.length; i++) {
      images[i].classList.remove('active');
    }
    images[currentIndex].classList.add('active');
    currentIndex++;
    if (currentIndex >= images.length) {
      currentIndex = 0;
    }
    setTimeout(showSlidebg, 5000); // Change image every 3 seconds
  }
  showSlidebg();
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  // your code goes here
  // get the value of the "button" query parameter from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const button = urlParams.get('button');
  // if the "button" query parameter is set, open the corresponding button
  if (button) {
      const buttonElement = document.getElementById(button);
    if (buttonElement) {
      buttonElement.click();
    }
  }
  });
</script>

    {{-- active nav script --}}
<script type="text/javascript">
  $(document).ready(function() {
    var url = window.location.href;
    $('.nav-menu li a').each(function() {
      if (url == (this.href)) {
        $(this).closest('.nav-menu li a').addClass('active').siblings().removeClass('active');
        return false; // stop looping through links once a match is found
      }
    });
  });
</script>
    {{-- div1 --}}
    <script>
      const myDivOne = document.getElementById("my-div-one");
      const seeMoreButtonOne = document.getElementById("see-more-button-one");
      const seeLessButtonOne = document.getElementById("see-less-button-one");
      if (myDivOne.scrollHeight > myDivOne.offsetHeight) {
        seeMoreButtonOne.style.display = "block";
      }
      function showMoreOne() {
        myDivOne.style.maxHeight = "none";
        seeMoreButtonOne.style.display = "none";
        seeLessButtonOne.style.display = "block";
      }

      function showLessOne() {
        myDivOne.style.maxHeight = "20px";
        seeMoreButtonOne.style.display = "block";
        seeLessButtonOne.style.display = "none";
      }
    </script>
      {{-- div2 --}}
      <script>
        const myDivTwo = document.getElementById("my-div-two");
        const seeMoreButtonTwo = document.getElementById("see-more-button-two");
        const seeLessButtonTwo = document.getElementById("see-less-button-two");
        if (myDivTwo.scrollHeight > myDivTwo.offsetHeight) {
          seeMoreButtonTwo.style.display = "block";
        }
        function showMoreTwo() {
          myDivTwo.style.maxHeight = "none";
          seeMoreButtonTwo.style.display = "none";
          seeLessButtonTwo.style.display = "block";
        }

        function showLessTwo() {
          myDivTwo.style.maxHeight = "20px";
          seeMoreButtonTwo.style.display = "block";
          seeLessButtonTwo.style.display = "none";
        }
      </script>
       {{-- // div3 --}}
      <script>
        const myDivThree = document.getElementById("my-div-three");
        const seeMoreButtonThree = document.getElementById("see-more-button-three");
        const seeLessButtonThree = document.getElementById("see-less-button-three");
        if (myDivThree.scrollHeight > myDivThree.offsetHeight) {
          seeMoreButtonThree.style.display = "block";
        }
        function showMoreThree() {
          myDivThree.style.maxHeight = "none";
          seeMoreButtonThree.style.display = "none";
          seeLessButtonThree.style.display = "block";
        }

        function showLessThree() {
          myDivThree.style.maxHeight = "20px";
          seeMoreButtonThree.style.display = "block";
          seeLessButtonThree.style.display = "none";
        }
      </script>
      {{-- div4 --}}
      <script> 
        const myDivFour = document.getElementById("my-div-four");
        const seeMoreButtonFour = document.getElementById("see-more-button-four");
        const seeLessButtonFour = document.getElementById("see-less-button-four");
      
        if (myDivFour.scrollHeight > myDivFour.offsetHeight) {
          seeMoreButtonFour.style.display = "block";
        }
        function showMoreFour() {
          myDivFour.style.maxHeight = "none";
          seeMoreButtonFour.style.display = "none";
          seeLessButtonFour.style.display = "block";
        }
        function showLessFour() {
          myDivFour.style.maxHeight = "20px";
          seeMoreButtonFour.style.display = "block";
          seeLessButtonFour.style.display = "none";
        }
      </script>
      {{-- div 5 --}}
      <script> 
        const myDivFive = document.getElementById("my-div-five");
        const seeMoreButtonFive = document.getElementById("see-more-button-five");
        const seeLessButtonFive = document.getElementById("see-less-button-five");
        if (myDivFive.scrollHeight > myDivFive.offsetHeight) {
          seeMoreButtonFive.style.display = "block";
        }
        function showMoreFive() {
          myDivFive.style.maxHeight = "none";
          seeMoreButtonFive.style.display = "none";
          seeLessButtonFive.style.display = "block";
        }
        function showLessFive() {
          myDivFive.style.maxHeight = "20px";
          seeMoreButtonFive.style.display = "block";
          seeLessButtonFive.style.display = "none";
        }
      </script>
      {{-- div 6 --}}
      <script> 
        const myDivSix = document.getElementById("my-div-six");
        const seeMoreButtonSix = document.getElementById("see-more-button-six");
        const seeLessButtonSix = document.getElementById("see-less-button-six");
        if (myDivSix.scrollHeight > myDivSix.offsetHeight) {
          seeMoreButtonSix.style.display = "block";
        }
        function showMoreSix() {
          myDivSix.style.maxHeight = "none";
          seeMoreButtonSix.style.display = "none";
          seeLessButtonSix.style.display = "block";
        }
        function showLessSix() {
          myDivSix.style.maxHeight = "20px";
          seeMoreButtonSix.style.display = "block";
          seeLessButtonSix.style.display = "none";
        }
      </script>
      {{-- div 7 --}}
      <script> 
        const myDivSeven = document.getElementById("my-div-seven");
        const seeMoreButtonSeven = document.getElementById("see-more-button-seven");
        const seeLessButtonSeven = document.getElementById("see-less-button-seven");
        if (myDivSeven.scrollHeight > myDivSeven.offsetHeight) {
          seeMoreButtonSeven.style.display = "block";
        }
        function showMoreSeven() {
          myDivSeven.style.maxHeight = "none";
          seeMoreButtonSeven.style.display = "none";
          seeLessButtonSeven.style.display = "block";
        }
        function showLessSeven() {
          myDivSeven.style.maxHeight = "20px";
          seeMoreButtonSeven.style.display = "block";
          seeLessButtonSeven.style.display = "none";
        }
      </script>
       {{-- div 8 --}}
       <script> 
        const myDivEight = document.getElementById("my-div-eight");
        const seeMoreButtonEight = document.getElementById("see-more-button-eight");
        const seeLessButtonEight = document.getElementById("see-less-button-eight");
        if (myDivEight.scrollHeight > myDivEight.offsetHeight) {
          seeMoreButtonEight.style.display = "block";
        }
        function showMoreEight() {
          myDivEight.style.maxHeight = "none";
          seeMoreButtonEight.style.display = "none";
          seeLessButtonEight.style.display = "block";
        }
        function showLessEight() {
          myDivEight.style.maxHeight = "20px";
          seeMoreButtonEight.style.display = "block";
          seeLessButtonEight.style.display = "none";
        }
      </script>
      {{-- div 9 --}}
      <script> 
        const myDivNine = document.getElementById("my-div-nine");
        const seeMoreButtonNine = document.getElementById("see-more-button-nine");
        const seeLessButtonNine = document.getElementById("see-less-button-nine");
        if (myDivNine.scrollHeight > myDivNine.offsetHeight) {
          seeMoreButtonNine.style.display = "block";
        }
        function showMoreNine() {
          myDivNine.style.maxHeight = "none";
          seeMoreButtonNine.style.display = "none";
          seeLessButtonNine.style.display = "block";
        }
        function showLessNine() {
          myDivNine.style.maxHeight = "20px";
          seeMoreButtonNine.style.display = "block";
          seeLessButtonNine.style.display = "none";
        }
      </script>
      {{-- div 10 --}}
      <script> 
        const myDivTen = document.getElementById("my-div-ten");
        const seeMoreButtonTen = document.getElementById("see-more-button-ten");
        const seeLessButtonTen = document.getElementById("see-less-button-ten");
        if (myDivTen.scrollHeight > myDivTen.offsetHeight) {
          seeMoreButtonTen.style.display = "block";
        }
        function showMoreTen() {
          myDivTen.style.maxHeight = "none";
          seeMoreButtonTen.style.display = "none";
          seeLessButtonTen.style.display = "block";
        }
        function showLessTen() {
          myDivTen.style.maxHeight = "20px";
          seeMoreButtonTen.style.display = "block";
          seeLessButtonTen.style.display = "none";
        }
      </script>
      {{-- show award tab only --}}

      {{-- div1 --}}

      
    <script>
      const myDivOneOnly = document.getElementById("my-div-one-only");
      const seeMoreButtonOneOnly = document.getElementById("see-more-button-one-only");
      const seeLessButtonOneOnly = document.getElementById("see-less-button-one-only");
      if (myDivOneOnly.scrollHeight >= myDivOneOnly.offsetHeight) {
        seeMoreButtonOneOnly.style.display = "block";
      }
      function showMoreOneOnly() {
        myDivOneOnly.style.maxHeight = "none";
        seeMoreButtonOneOnly.style.display = "none";
        seeLessButtonOneOnly.style.display = "block";
      }

      function showLessOneOnly() {
        myDivOneOnly.style.maxHeight = "20px";
        seeMoreButtonOneOnly.style.display = "block";
        seeLessButtonOneOnly.style.display = "none";
      }
    </script>
      {{-- div2 --}}
      <script>
        const myDivTwoOnly = document.getElementById("my-div-two-only");
        const seeMoreButtonTwoOnly = document.getElementById("see-more-button-two-only");
        const seeLessButtonTwoOnly = document.getElementById("see-less-button-two-only");
        if (myDivTwoOnly.scrollHeight >= myDivTwoOnly.offsetHeight) {
          seeMoreButtonTwoOnly.style.display = "block";
        }
        function showMoreTwoOnly() {
          myDivTwoOnly.style.maxHeight = "none";
          seeMoreButtonTwoOnly.style.display = "none";
          seeLessButtonTwoOnly.style.display = "block";
        }

        function showLessTwoOnly() {
          myDivTwoOnly.style.maxHeight = "20px";
          seeMoreButtonTwoOnly.style.display = "block";
          seeLessButtonTwoOnly.style.display = "none";
        }
      </script>
       {{-- // div3 --}}
      <script>
        const myDivThreeOnly = document.getElementById("my-div-three-only");
        const seeMoreButtonThreeOnly = document.getElementById("see-more-button-three-only");
        const seeLessButtonThreeOnly = document.getElementById("see-less-button-three-only");
        if (myDivThreeOnly.scrollHeight >= myDivThreeOnly.offsetHeight) {
          seeMoreButtonThreeOnly.style.display = "block";
        }
        function showMoreThreeOnly() {
          myDivThreeOnly.style.maxHeight = "none";
          seeMoreButtonThreeOnly.style.display = "none";
          seeLessButtonThreeOnly.style.display = "block";
        }

        function showLessThreeOnly() {
          myDivThreeOnly.style.maxHeight = "20px";
          seeMoreButtonThreeOnly.style.display = "block";
          seeLessButtonThreeOnly.style.display = "none";
        }
      </script>
      {{-- div4 --}}
      <script> 
        const myDivFourOnly = document.getElementById("my-div-four-only");
        const seeMoreButtonFourOnly = document.getElementById("see-more-button-four-only");
        const seeLessButtonFourOnly = document.getElementById("see-less-button-four-only");
      
        if (myDivFourOnly.scrollHeight >= myDivFourOnly.offsetHeight) {
          seeMoreButtonFourOnly.style.display = "block";
        }
        function showMoreFourOnly() {
          myDivFourOnly.style.maxHeight = "none";
          seeMoreButtonFourOnly.style.display = "none";
          seeLessButtonFourOnly.style.display = "block";
        }
        function showLessFourOnly() {
          myDivFourOnly.style.maxHeight = "20px";
          seeMoreButtonFourOnly.style.display = "block";
          seeLessButtonFourOnly.style.display = "none";
        }
      </script>
      {{-- div 5 --}}
      <script> 
        const myDivFiveOnly = document.getElementById("my-div-five-only");
        const seeMoreButtonFiveOnly = document.getElementById("see-more-button-five-only");
        const seeLessButtonFiveOnly = document.getElementById("see-less-button-five-only");
        if (myDivFiveOnly.scrollHeightOnly >= myDivFiveOnly.offsetHeight) {
          seeMoreButtonFiveOnly.style.display = "block";
        }
        function showMoreFiveOnly() {
          myDivFiveOnly.style.maxHeight = "none";
          seeMoreButtonFiveOnly.style.display = "none";
          seeLessButtonFiveOnly.style.display = "block";
        }
        function showLessFiveOnly() {
          myDivFiveOnly.style.maxHeight = "20px";
          seeMoreButtonFiveOnly.style.display = "block";
          seeLessButtonFiveOnly.style.display = "none";
        }
      </script>
      {{-- div 6 --}}
      <script> 
        const myDivSixOnly = document.getElementById("my-div-six-only");
        const seeMoreButtonSixOnly = document.getElementById("see-more-button-six-only");
        const seeLessButtonSixOnly = document.getElementById("see-less-button-six-only");
        if (myDivSixOnly.scrollHeight >= myDivSixOnly.offsetHeight) {
          seeMoreButtonSixOnly.style.display = "block";
        }
        function showMoreSixOnly() {
          myDivSixOnly.style.maxHeight = "none";
          seeMoreButtonSixOnly.style.display = "none";
          seeLessButtonSixOnly.style.display = "block";
        }
        function showLessSixOnly() {
          myDivSixOnly.style.maxHeight = "20px";
          seeMoreButtonSixOnly.style.display = "block";
          seeLessButtonSixOnly.style.display = "none";
        }
      </script>
      {{-- div 7 --}}
      <script> 
        const myDivSevenOnly = document.getElementById("my-div-seven-only");
        const seeMoreButtonSevenOnly = document.getElementById("see-more-button-seven-only");
        const seeLessButtonSevenOnly = document.getElementById("see-less-button-seven-only");
        if (myDivSevenOnly.scrollHeight >= myDivSevenOnly.offsetHeight) {
          seeMoreButtonSevenOnly.style.display = "block";
        }
        function showMoreSevenOnly() {
          myDivSevenOnly.style.maxHeight = "none";
          seeMoreButtonSevenOnly.style.display = "none";
          seeLessButtonSevenOnly.style.display = "block";
        }
        function showLessSevenOnly() {
          myDivSevenOnly.style.maxHeight = "20px";
          seeMoreButtonSevenOnly.style.display = "block";
          seeLessButtonSevenOnly.style.display = "none";
        }
      </script>
       {{-- div 8 --}}
       <script> 
        const myDivEightOnly = document.getElementById("my-div-eight-only");
        const seeMoreButtonEightOnly = document.getElementById("see-more-button-eight-only");
        const seeLessButtonEightOnly = document.getElementById("see-less-button-eight-only");
        if (myDivEightOnly.scrollHeight >= myDivEightOnly.offsetHeight) {
          seeMoreButtonEightOnly.style.display = "block";
        }
        function showMoreEightOnly() {
          myDivEightOnly.style.maxHeight = "none";
          seeMoreButtonEightOnly.style.display = "none";
          seeLessButtonEightOnly.style.display = "block";
        }
        function showLessEightOnly() {
          myDivEightOnly.style.maxHeight = "20px";
          seeMoreButtonEightOnly.style.display = "block";
          seeLessButtonEightOnly.style.display = "none";
        }
      </script>
      {{-- div 9 --}}
      <script> 
        const myDivNineOnly = document.getElementById("my-div-nine-only");
        const seeMoreButtonNineOnly = document.getElementById("see-more-button-nine-only");
        const seeLessButtonNineOnly = document.getElementById("see-less-button-nine-only");
        if (myDivNineOnly.scrollHeight >= myDivNineOnly.offsetHeight) {
          seeMoreButtonNineOnly.style.display = "block";
        }
        function showMoreNineOnly() {
          myDivNineOnly.style.maxHeight = "none";
          seeMoreButtonNineOnly.style.display = "none";
          seeLessButtonNineOnly.style.display = "block";
        }
        function showLessNineOnly() {
          myDivNineOnly.style.maxHeight = "20px";
          seeMoreButtonNineOnly.style.display = "block";
          seeLessButtonNineOnly.style.display = "none";
        }
      </script>
      {{-- div 10 --}}
      <script> 
        const myDivTenOnly = document.getElementById("my-div-ten-only");
        const seeMoreButtonTenOnly = document.getElementById("see-more-button-ten-only");
        const seeLessButtonTenOnly = document.getElementById("see-less-button-ten-only");
        if (myDivTenOnly.scrollHeight >= myDivTenOnly.offsetHeight) {
          seeMoreButtonTenOnly.style.display = "block";
        }
        function showMoreTenOnly() {
          myDivTenOnly.style.maxHeight = "none";
          seeMoreButtonTenOnly.style.display = "none";
          seeLessButtonTenOnly.style.display = "block";
        }
        function showLessTenOnly() {
          myDivTenOnly.style.maxHeight = "20px";
          seeMoreButtonTenOnly.style.display = "block";
          seeLessButtonTenOnly.style.display = "none";
        }
      </script>
    
{{-- FAQS SCRIPT --}}
     
      {{--slideshow bg script images  --}}
</body>
</html>

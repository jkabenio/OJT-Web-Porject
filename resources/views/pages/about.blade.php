@extends('layouts.app')
@section('content')
<style>
@media screen and (min-width: 768px) {
      video {
        object-fit: fill; 
      }

      body {
        margin: 0;
      }
      .about-header{
        margin-top:100px;color:rgb(24,79,0);
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
    }

    /* Show the selected tab */
    #Category1 {
        display: block;
    }

    /* Container for image and figcaption */
    .image-container {
        width: 100%;
        display: center;
        background-color:rgb(238, 238, 238);
        padding-top: 20px;
    }

    /* Image style */
    .image-container img {
        max-width: 100%;
        max-height: 100%;
        margin-right: 20px;
        width: 100%;
      
    }
    .image-container figure{
      margin-top: 0px;
        margin-left: 40px;
        margin-right: 40px;
        padding-left: 50px;
        padding-right: 50px;
        padding-bottom: 50px;
        padding-top: 50px;
        background-color:rgb(238, 238, 238);
        border: 2px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /*  */
    .values {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        text-align: center;
        background-color:rgb(238, 238, 238);
        border: 2px solid #ccc;
        margin: 20px 40px;
        
    }
    .values .core-values{
      width: 900px;
      height: 1000px;
    margin: 0 auto;
    }
    .values .core-values img{
      mix-blend-mode:darken;
    }
    .value {
      display: inline-block;
      width: 25%;
    }

    .value h3 {
      margin-bottom: 10px;
      color: #333;
      font-weight: bold;
    }

    .value p {
        height: 100px; /* set a fixed height */
      overflow: hidden; /* hide any overflowing content */
      margin-bottom: 20px;
      color: #333;

    }
    /* trophy css */

    .trophy-frame {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color:rgb(238, 238, 238);
        border: 2px solid #ccc;
        text-align: center;
        margin: 20px 40px;
        background-color: #F4F4F4;
    }

    .trophy {
      display: inline-block;
      vertical-align: top;
      margin: 20px;
      padding: 20px;
      border: 2px solid #BFBFBF;
      border-radius: 20px;
      background: rgb(250,250,250);
      background: linear-gradient(36deg, rgba(250,250,250,0.3393732492997199) 23%, rgba(13,193,167,0.4150035014005602) 100%);
      width: 25%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      min-height: 600px;
    }
    #see-more-button-one, #see-less-button-one,
    #see-more-button-two, #see-less-button-two,
    #see-more-button-three, #see-less-button-three,
    #see-more-button-four, #see-less-button-four,
    #see-more-button-five, #see-less-button-five,
    #see-more-button-six, #see-less-button-six,
    #see-more-button-seven, #see-less-button-seven,
    #see-more-button-eight, #see-less-button-eight,
    #see-more-button-nine, #see-less-button-nine,
    #see-more-button-ten, #see-less-button-ten{
        display: none;
        /* background-color: rgb(255, 255, 255)a(255, 0, 0, 0); */
        color: rgb(24,79,0);
        border: none;
        font-size: 12px;
        text-align:left;
        cursor: pointer;
      }

      
    #see-more-button-one-only, #see-less-button-one-only,
    #see-more-button-two-only, #see-less-button-two-only,
    #see-more-button-three-only, #see-less-button-three-only,
    #see-more-button-four-only, #see-less-button-four-only,
    #see-more-button-five-only, #see-less-button-five-only,
    #see-more-button-six-only, #see-less-button-six-only,
    #see-more-button-seven-only, #see-less-button-seven-only,
    #see-more-button-eight-only, #see-less-button-eight-only,
    #see-more-button-nine-only, #see-less-button-nine-only,
    #see-more-button-ten-only, #see-less-button-ten-only{
        display: none;
        /* background-color: rgb(255, 255, 255)a(255, 0, 0, 0); */
        color: rgb(24,79,0);
        border: none;
        font-size: 12px;
        text-align:left;
        cursor: pointer;
      }

    .trophy img {
      /* display: block; */
      margin: 0 auto;
      max-width: 300px;
      min-width: 300px;
      max-height: 350px;
      min-height: 350px;
    }

    .trophy h3 {
      margin-top: 20px;
      color: #555;
      font-weight: bold;
    }

    .tabcontent .trophy-frame .trophy p {
      margin-top: 10px;
      color: #777;
      max-height: 20px;
      overflow: hidden;
    }

    h2{
        font-family: 'Times New Roman', Times, serif;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    /* terms and conditions */
    .terms-condition-frame {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color: #f2f2f2;
        padding: 20px;
        border: 2px solid #ccc;
        text-align: center;
        margin: 20px 40px;
    }
    .terms-condition-frame figcaption p{
        padding-left: 50px;
        padding-right: 50px;
    }
    /* privacy and policy */

    .privacy-policy-frame {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color: #f2f2f2;
        padding: 20px;
        border: 2px solid #ccc;
        text-align: center;
        margin: 0px 40px;
    }
    .privacy-policy-frame figcaption p{
        padding-left: 50px;
        padding-right: 50px;
    }

    /* co-founder css */

    .co-founder-frame{
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color: #f2f2f2;
        padding: 20px;
        border: 2px solid #ccc;
        text-align: center;
        margin: 20px 40px;
        height: 800px;
    }
    .co-founder-frame .co-founder-body{
      width: 100%;
      height: 100%;
    }
    .co-founder-frame .co-founder-body .co-founder-card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      width: 31%;
      margin: 1%;
      padding: 20px; 
      text-align: center;
      font-family: arial;
      float: left;
      border-radius: 10px;
      background-color:rgb(238, 238, 238);
    }

    .co-founder-frame .co-founder-body .co-founder-card .title {
      color: grey;
      font-size: 18px;
    }

    .co-founder-frame .co-founder-body .co-founder-card button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .co-founder-frame .co-founder-body .co-founder-card a {
      text-decoration: none;
      font-size: 22px;
      color: black;
    }

    .co-founder-frame .co-founder-body .co-founder-card button:hover, a:hover {
      opacity: 0.7;
    }
}
@media screen and (max-width: 768px) {  
  .about-header{
  /* margin-top:1rem; */
  color:rgb(24,79,0);
  font-weight: bold;
  font-size: 1.5rem;
  }
      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* overflow-x: scroll;
        -webkit-overflow-scrolling: touch; */
      }

    /* Style for the buttons inside the tab */
      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0.5rem;
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
      .image-container {
        width: 100%;
        display: center;
        background-color:rgb(238, 238, 238);
        padding-top: 0rem;
      }

    /* Image style */
    .image-container img {
      width: 100%;
      height: 100%;
      min-height: 12rem;
      /* margin-right: 20px; */
      width: 100%;
    }
    .image-container figure{
      margin: 0rem 0.5rem 0.1rem 0.5rem;
      /* margin-top: 0px;
      margin-left: 0.5rem;
      margin-right: 0.5rem; */
      padding: 1rem;
      background-color:rgb(238, 238, 238);
      border: 2px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      font-size: 0.875rem;
      text-align: justify;
    }

    /* core value and mision vision mobile css */
    .values {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        text-align: center;
        background-color:rgb(238, 238, 238);
        border: 2px solid #ccc;
        margin: 0rem 0.5rem 0.1rem 0.5rem;
        
    }
    .values h2{
      font-size: 1rem;
      font-weight: bold;
    }
    .values .core-values{
      width: 100%;
      height: 100%;
      margin: 0 auto;
    }
    .values .core-values img{
      mix-blend-mode:darken;
    }
    .values .value {
      
      width: 100%;
    }

    .values .value h3 {
      margin: 0px;
      color: #333;
      font-weight: bold;
      font-size: 0.9rem;
    }
    .values .value img {
      min-height: 5rem;
      width: 100%;
    }

    .values .value p {
      padding-bottom: 0.5rem;
      color: #333;
      font-size: 0.875rem;
      /* border-bottom: 1px solid rgb(0, 81, 255); */
    }
    /* trophy css */
    .trophy-frame {
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color:rgb(238, 238, 238);
        border: 2px solid #ccc;
        text-align: center;
        margin: 0rem 0.5rem 0.1rem 0.5rem;
    }
    .trophy-frame:after {
      content: "";
      display: table;
      clear: both;
    }
    .trophy {
      float: left;
      margin: 0.2rem;
      padding: 0.5rem;
      border: 2px solid #BFBFBF;
      border-radius: 20px;
      background: rgb(250,250,250);
      background: linear-gradient(36deg, rgba(250,250,250,0.3393732492997199) 23%, rgba(13,193,167,0.4150035014005602) 100%);
      width: 47%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      min-height: 23rem;
    }
    #see-more-button-one, #see-less-button-one,
    #see-more-button-two, #see-less-button-two,
    #see-more-button-three, #see-less-button-three,
    #see-more-button-four, #see-less-button-four,
    #see-more-button-five, #see-less-button-five,
    #see-more-button-six, #see-less-button-six,
    #see-more-button-seven, #see-less-button-seven,
    #see-more-button-eight, #see-less-button-eight,
    #see-more-button-nine, #see-less-button-nine,
    #see-more-button-ten, #see-less-button-ten{
      display: none;
      /* background-color: rgb(255, 255, 255)a(255, 0, 0, 0); */
      color: rgb(24,79,0);
      border: none;
      font-size: 0.6rem;
      text-align:left;
      cursor: pointer;
    }

      
    #see-more-button-one-only, #see-less-button-one-only,
    #see-more-button-two-only, #see-less-button-two-only,
    #see-more-button-three-only, #see-less-button-three-only,
    #see-more-button-four-only, #see-less-button-four-only,
    #see-more-button-five-only, #see-less-button-five-only,
    #see-more-button-six-only, #see-less-button-six-only,
    #see-more-button-seven-only, #see-less-button-seven-only,
    #see-more-button-eight-only, #see-less-button-eight-only,
    #see-more-button-nine-only, #see-less-button-nine-only,
    #see-more-button-ten-only, #see-less-button-ten-only{
      display: none;
      /* background-color: rgb(255, 255, 255)a(255, 0, 0, 0); */
      color: rgb(24,79,0);
      border: none;
      font-size: 0.6rem;
      text-align:left;
      cursor: pointer;
    }

    .trophy img {
      display: block;
      margin: 0 auto;
      width: 100%;
      height: 100%;
      min-width: 4rem;
    }

    .trophy h3 {
      margin-top: 1rem;
      color: #555;
      font-weight: bold;
      font-size: 0.8rem;
    }

    .tabcontent .trophy-frame .trophy p {
      margin-top: 10px;
      color: #777;
      max-height: 20px;
      overflow: hidden;
      font-size: 0.7rem;
    }
    .trophy-frame figcaption{
      font-size: 0.875rem;
      text-align: justify;
    } 

    h2{
        font-family: 'Times New Roman', Times, serif;
        font-size: 1rem;
        font-weight: bold;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

/* terms and conditions */
    .terms-condition-frame {
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      background-color: #f2f2f2;
      padding: 0.1rem;
      border: 2px solid #ccc;
      text-align: center;
      margin: 0rem 0.5rem 0.1rem 0.5rem;
    }
    .terms-condition-frame figure{
      margin: 1rem;
    }
    .terms-condition-frame figure figcaption p{
      padding-left: 0.1rem;
      padding-right: 0.1rem;
      text-align: justify;
      font-size: 0.875rem;
    }
    .terms-condition-frame figure h5{
      font-size: 0.7rem;
      text-align: justify;
    }
    /* privacy and policy */

    .privacy-policy-frame {
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      background-color: #f2f2f2;
      padding: 0.1rem;
      border: 2px solid #ccc;
      text-align: center;
      margin: 0rem 0.5rem 0.1rem 0.5rem;
    }
    .privacy-policy-frame figure{
      margin: 1rem;
    }
    .privacy-policy-frame figure figcaption p{
      padding-left: 0.1rem;
      padding-right: 0.1rem;
      font-size: 0.875rem;
      text-align: justify;
    }


/* co-founder css */

.co-founder-frame{
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
        background-color: #f2f2f2;
        padding: 20px;
        border: 2px solid #ccc;
        text-align: center;
        margin: 0rem 0.5rem 0.1rem 0.5rem;
        height: 30rem;
    }
    .co-founder-frame .co-founder-body{
      width: 100%;
      height: 100%;
    }
    .co-founder-frame .co-founder-body .co-founder-card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      width: 31%;
      margin: 1%;
      padding: 0.2rem; 
      text-align: center;
      font-family: arial;
      float: left;
      border-radius: 10px;
      background-color:rgb(238, 238, 238);
    }

    .co-founder-frame .co-founder-body .co-founder-card .title {
      color: grey;
      font-size: 0.875rem;
    }
    .co-founder-frame .co-founder-body .co-founder-card p {
      font-size: 0.875rem;
    }

    .co-founder-frame .co-founder-body .co-founder-card button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 0.3rem;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 0.6rem;
      border-radius: 0.5rem;
    }

    .co-founder-frame .co-founder-body .co-founder-card a {
      text-decoration: none;
      font-size: 22px;
      color: black;
    }
    .co-founder-frame .co-founder-body .co-founder-card h3 {
      text-decoration: none;
      font-size: 0.8rem;
      color: black;
    }

    .co-founder-frame .co-founder-body .co-founder-card button:hover, a:hover {
      opacity: 0.7;
    }
}

</style>

<body>
    {{-- <video id="bg-video" autoplay loop muted>
      <source  id="bg-video"  src="/vids/leaves_falling(123).mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video> --}}
    <!-- rest of your HTML content -->
  </body>
  <h2 class="about-header" align="center">ABOUT US</h2>
<div class="tab"> 
    <button  class="tablinks" onclick="openCategory(event, 'Category1')" id="defaultOpen">All</button>
    {{-- <button  class="tablinks" onclick="openCategory(event, 'Category1')">About the Company</button> --}}
    <button class="tablinks" onclick="openCategory(event, 'Category2')">Mission, Vision, Core Values</button>
    <button class="tablinks" class="tablinks" onclick="openCategory(event, 'Category3')">Awards and Certificates</button>
    <button id="buttonidsTermsCondition" class="tablinks" class="tablinks" onclick="openCategory(event, 'terms_and_condition_id')">Terms and Conditions</button>
    <button id="buttonidsPrivacyPolicy" class="tablinks" onclick="openCategory(event, 'privacy_and_policy_id')">Privacy and Policy</button>
</div>

<div id="Category1" class="tabcontent"> 
    <div class="image-container"> 
        <figure>
            
            <img loading="lazy" src="{{ asset('/img/for_about_us.jpg') }}" onload="this.classList.add('loaded')">
            <figcaption>
                Amelco Desiccants Inc. is a leading designer and manufacturer of Active, Protective, and Intelligent packaging products used for a wide range of products and industry applications. The company establishes long term customer partnerships by delivering the most comprehensive manufacturing and product support services available.
                <br>    <br>
                As a leader in active packaging products in the Philippines for 40 years, Amelco Desiccants Inc. meets growing demands of the high technology electronics and semiconductor industries, pharmaceutical, medical, agriculture, food, fresh produce, automotive, logistics and general packaging industries.
                <br>    <br>
                Amelco Desiccants Inc. manufactures its active packaging products in ISO 9001 and ISO 14001 certified facility. Products meet EU RoHs and Reach requirements as well as FDA CFR 21 regulations for safe contact with food and drugs.
            </figcaption> 
        </figure>
    </div>
        <section class="values">
            <h2>Our Company Mission, Vision and Values</h2>  
            <div class="value">
                <img loading="lazy" src="{{ asset('/img/mission1.png') }}" width="100%" height="100%" onload="this.classList.add('loaded')">
                <h3>Mission</h3>
                <p>To deliver highly innovative, best value and competitive protective packaging solutions through excellence in customer service
                </p>
            </div>
            <div class="value">
                <img loading="lazy" src="{{ asset('/img/vision1.png') }}" width="100%" height="100%" onload="this.classList.add('loaded')">
                <h3>Vision</h3>
                <p>We lead in creating solutions to protect your products.</p>
            </div>
            <div class="value">
                <img loading="lazy" src="{{ asset('/img/values1.png') }}"  width="100%" height="100%" onload="this.classList.add('loaded')">
                <h3>Values</h3>
                <p>Adaptability, Mindfulness, Excellence, Leadership, Collaboration, Optimistic</p>
            </div>
            <h2>Core Values</h2>  
              <div class="core-values">
                <img loading="lazy" src="{{ asset('/img/core_values.jpg') }}" width="100%" height="100%" onload="this.classList.add('loaded')">
              </div>
          </section>
{{-- awards and cert --}}
          <section class="trophy-frame">
            <h2>Awards and Certificates</h2>
            <figure>
              <img loading="lazy" src="{{ asset('/img/bg_awardcert.jpg') }}" width="100%" height="100%" onload="this.classList.add('loaded')">
            <figcaption>ActivPack is proud to have been recognized for its excellence in product innovation, customer service, and sustainable practices. We are committed to producing protective packaging solutions that not only meet the needs of our customers but also contribute to a more sustainable future. Our awards and certificates reflect our dedication to quality and our commitment to being a responsible corporate citizen.

            </figcaption>
            </figure>
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/1.png') }}" onload="this.classList.add('loaded')">
              <h3>3rd Thomas Award 2008</h3>
              <p id="my-div-one">(THE OUSTANDING & MOST ADMIRE SUPPLIERS)
                from United Laaboratories Inc.
              </p>
              <a id="see-less-button-one" onclick="showLessOne()" align="center">See Less...</a>
              <a id="see-more-button-one" onclick="showMoreOne()" align="center">See More...</a>
            </div>
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/2.png') }}" onload="this.classList.add('loaded')">
              <h3>Total Quality Achievement Award</h3>
              <p id="my-div-two">(Preferred Supplier)
                DATE: May 16, 2014.
              </p>
            <a id="see-less-button-two" onclick="showLessTwo()" align="center">See Less...</a>
            <a id="see-more-button-two" onclick="showMoreTwo()" align="center">See More...</a>
            </div>
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/mission1.png') }}" src="/img/3.png" onload="this.classList.add('loaded')">
              <h3>CERTIFICATE OF PARTICIPATION </h3>
              <p id="my-div-three">For their invaluable support and Participation at
                22nd Manufacturing Technology Cebu.
                DATE: JUNE 28-30, 2018 | WATERFRONT CEBU CITY HOTEL AND CASINO
                GLOBAL LINK MP events international Inc.
              </p>  
              <a id="see-less-button-three" onclick="showLessThree()" align="center">See Less......</a>
              <a id="see-more-button-three" onclick="showMoreThree()" align="center">See More......</a>
            </div>
              
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/4.png') }}" onload="this.classList.add('loaded')">
              <h3>PLAQUE OF APPRECIATION</h3>
              <p id="my-div-four">For its invaluable contribution and unwavering support extended to the company 
                through its concerted efforts in keeping with excellent standards in cost,
                Delivery and service. 
                DATE: Given this 14th day of December 2018 at Bel Electronics Corporation, No. 8 Carmelray Industrial Park I
                Canlubang , Calamba city, Laguna, Philippines.
              </p>
              <a id="see-less-button-four" onclick="showLessFour()" align="center">See Less...</a>
              <a id="see-more-button-four" onclick="showMoreFour()" align="center">See More...</a>
            </div>

            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/5.png') }}" onload="this.classList.add('loaded')">
              <h3>PLAQUE OF APPRECIATION</h3>
              <p id="my-div-five">For its unwavering support that helped in achieving our path to success.
                You are being honored with much appreciation and gratitude.
                DATE: Given this 02, day of January 2016 at Paranaque City, Metro Manila, Philippines.For its unwavering support that helped in achieving our path to success.
                You are being honored with much appreciation and gratitude.
                DATE: Given this 02, day of January 2016 at Paranaque City, Metro Manila, Philippines.
              </p>
              <a id="see-less-button-five" onclick="showLessFive()" align="center">See Less...</a>
              <a id="see-more-button-five" onclick="showMoreFive()" align="center">See More...</a>
            </div>

            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/6.png') }}" onload="this.classList.add('loaded')">
              <h3>SERVICE AWARD presented to Amelco Desicants Inc.</h3>
              <p id="my-div-six">In appreciation of your 10 years of excellence and dedicated service to the company.
                DATE: Given this 20th of April 2012
                Hitachi Terminals Mechatronics Philippines corporation. 
              </p>
              <a id="see-less-button-six" onclick="showLessSix()" align="center">See Less...</a>
              <a id="see-more-button-six" onclick="showMoreSix()" align="center">See More...</a>
            </div>
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/7.png') }}" onload="this.classList.add('loaded')">
              <h3>TOTAL QUALITY ACHIEVEMENT AWARD CERTIFIED SUPPLIER</h3>
              <p id="my-div-seven">ACTIVPACK CORPORATION 
                JUNE 07, 2019
                UNILAB CORPORATE CENTER, BAYANIHAN CENTER.
              </p>
              <a id="see-less-button-seven" onclick="showLessSeven()" align="center">See Less...</a>
              <a id="see-more-button-seven" onclick="showMoreSeven()" align="center">See More...</a>
            </div>

            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/8.png') }}" onload="this.classList.add('loaded')">
              <h3>BAYANIHAN AWARD</h3>
              <p id="my-div-eight">For achieving Excellence as a Certified supplier.
              DATE: for the year 2003 Given this 16th day of April 2004 at EDSA SHANGRI-LA HOTEL, MANDALUYONG CITY.
              </p>
              <a id="see-less-button-eight" onclick="showLessEight()" align="center">See Less...</a>
              <a id="see-more-button-eight" onclick="showMoreEight()" align="center">See More...</a>
            </div>

            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/9.png') }}" onload="this.classList.add('loaded')">
              <h3>70 UNILAB TULONG AT MALASAKIT</h3>
              <p id="my-div-nine">Your efforts to deliver the promise of Husay and Malasakit inspire us to continue living out the same values
                in all we do. Maraming Salamat sa inyong husay at malasakit at sa tiwalanag ibinigay ninto samin nitong 
                pitumpong taon. 
                DATE: JUNE 2015 from UNILAB.
              </p>
              <a id="see-less-button-nine" onclick="showLessNine()" align="center">See Less...</a>
              <a id="see-more-button-nine" onclick="showMoreNine()" align="center">See More...</a>
            </div>
            <div class="trophy">
              <img loading="lazy" src="{{ asset('/img/10.png') }}" onload="this.classList.add('loaded')">
              <h3>3rd Thomas Award 2006
                (THE OUSTANDING & MOST ADMIRE SUPPLIERS)</h3>
              <br>
              <p id="my-div-ten">AS A CERTIFIED SUPPLIER
                DATE: SEPTEMBER 29,2006.
              </p>
              <a id="see-less-button-ten" onclick="showLessTen()" align="center">See Less...</a>
              <a id="see-more-button-ten" onclick="showMoreTen()" align="center">See More...</a>
            </div>
          </section>
            {{-- terms and condition --}}
          <section class="terms-condition-frame">
            <figure>
                <h2>Terms And Condition</h2>

            <h5><b>Acceptance of Terms</b><br>
                By accessing and using this website, you agree to be bound by these terms and conditions.If you do not agree with these terms and conditions, please do not use the website.</h5>
          
            <figcaption style="word-spacing: 5px;text-align:left">
                <p><b>Intellectual Property Rights</b><br>
                    All content on this website, including text, graphics, logos, images, and software, is the property of the company or its licensors and is protected by copyright laws. You may not use any content on this website without the company's prior written consent.
                </p>
                <p><b>Use of Website</b><br>
                    You may use this website for lawful purposes only. You may not use the website in any way that is harmful, fraudulent, or illegal.
                </p>
                <p><b>Disclaimer of Warranties</b><br>
                    The company makes no warranties or representations about the accuracy or completeness of the information on this website. The website is provided on an "as is" basis without any warranties of any kind, express or implied.
                </p>
                <p><b>Limitation of Liability</b><br>
                    The company shall not be liable for any damages, including indirect, incidental, or consequential damages, arising out of or in connection with the use or inability to use this website.
                </p>
                <p><b>Governing Law and Jurisdiction</b><br>
                    These terms and conditions shall be governed by and construed in accordance with the laws of [country]. Any disputes arising out of or in connection with these terms and conditions shall be subject to the exclusive jurisdiction of the courts of [city, state/province, country].
                </p>
            </figcaption>
            </figure>
          </section>
{{-- privacy and policy --}}
          <section class="privacy-policy-frame">
            <figure>
                <h2>Privacy and Policy</h2>
            <figcaption style="word-spacing: 5px;text-align:left">
                <p><b>Information Collection</b><br>
                    We may collect personal information such as your name, email address, and phone number when you visit or use our website. We may also collect non-personal information such as your IP address, browser type, and operating system.
                </p>
                <p><b>Use of Information</b><br>
                    We may use your personal information to provide you with information about our products and services, to respond to your inquiries and requests, and to improve our website and customer service.
                </p>
                <p><b>Disclosure of Information</b><br>
                    We may disclose your personal information to third-party service providers who perform services on our behalf, such as website hosting and data analysis. We may also disclose your personal information if required by law or to protect our rights or the rights of others.
                </p>
                <p><b>Data Security</b><br>
                    We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no data transmission over the internet can be guaranteed to be 100% secure.
                </p>
                <p><b>Data Retention</b><br>
                    We will retain your personal information for as long as necessary to fulfill the purposes for which it was collected and to comply with applicable laws and regulations.
                </p>
                <p><b>Your Rights</b><br>
                    You have the right to access, correct, and delete your personal information. You may also withdraw your consent to the processing of your personal information at any time.
                </p>
                <p><b>Third-Party Links</b><br>
                    Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites.
                </p>
                <p><b>Updates to Privacy Policy</b><br>
                    We may update this privacy policy from time to time. We encourage you to review this policy periodically for any changes.
                </p>
                
            </figcaption>
            </figure>
          </section> 
          {{--co founder   --}}
          <section class="co-founder-frame">
            <h2 style="text-align:center">User Profile Card</h2>
            <div class="co-founder-body">
              <div class="co-founder-card">
                <img src="{{ asset('/img/robin.jpg') }}" alt="John" style="width:100%">
                <h3>Robin B. Concepcion</h3>
                <p class="title">CEO & Founder, Example</p>
                <p >Harvard University</p>
                <div style="margin: 24px 0;">
                  <a href="#"><i class="fa fa-dribbble"></i></a> 
                  <a href="#"><i class="fa fa-twitter"></i></a>  
                  <a href="#"><i class="fa fa-linkedin"></i></a>  
                  <a href="#"><i class="fa fa-facebook"></i></a> 
                </div>
                <p><button>Contact</button></p>
              </div>
              <div class="co-founder-card">
                <img src="{{ asset('/img/robin.jpg') }}" alt="John" style="width:100%">
                <h3>Robin B. Concepcion</h3>
                <p class="title">CEO & Founder, Example</p>
                <p>Harvard University</p>
                <div style="margin: 24px 0;">
                  <a href="#"><i class="fa fa-dribbble"></i></a> 
                  <a href="#"><i class="fa fa-twitter"></i></a>  
                  <a href="#"><i class="fa fa-linkedin"></i></a>  
                  <a href="#"><i class="fa fa-facebook"></i></a> 
                </div>
                <p><button>Contact</button></p>
              </div>
              <div class="co-founder-card">
                <img src="{{ asset('/img/robin.jpg') }}" alt="John" style="width:100%">
                <h3>Robin B. Concepcion</h3>
                <p class="title">CEO & Founder, Example</p>
                <p>Harvard University</p>
                <div style="margin: 24px 0;">
                  <a href="#"><i class="fa fa-dribbble"></i></a> 
                  <a href="#"><i class="fa fa-twitter"></i></a>  
                  <a href="#"><i class="fa fa-linkedin"></i></a>  
                  <a href="#"><i class="fa fa-facebook"></i></a> 
                </div>
                <p><button>Contact</button></p>
              </div>
            </div>
          </section> 
</div>



<div id="Category2" class="tabcontent">
    <div class="image-container">
        <section class="values">
            <h2>Our Company Mission, Vision and Values</h2>  
            <div class="value">
                <img src="{{ asset('/img/mission1.png') }}" width="100%" height="100%">
                <h3>Mission</h3>
                <p>To deliver highly innovative, best value and competitive protective packaging solutions through excellence in customer service
                </p>
            </div>
            <div class="value">
                <img src="{{ asset('/img/vision1.png') }}" width="100%" height="100%">
                <h3>Vision</h3>
                <p>We lead in creating solutions to protect your products.</p>
            </div>
            <div class="value">
                <img src="{{ asset('/img/values1.png') }}" width="100%" height="100%">
                <h3>Values</h3>
                <p>Adaptability, Mindfulness, Excellence, Leadership, Collaboration, Optimistic</p>
            </div>
          </section> 
   </div>  
</div>
<div id="Category3" class="tabcontent">
    <div class="image-container">
      <section class="trophy-frame">
        <h2>Awards and Certificates</h2>
        <figure>
          <img loading="lazy" src="{{ asset('/img/bg_awardcert.jpg') }}" width="200" height="550" onload="this.classList.add('loaded')">
        <figcaption>ActivPack is proud to have been recognized for its excellence in product innovation, customer service, and sustainable practices. We are committed to producing protective packaging solutions that not only meet the needs of our customers but also contribute to a more sustainable future. Our awards and certificates reflect our dedication to quality and our commitment to being a responsible corporate citizen.</fig<figcaption>
        </figure>
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/1.png') }}" onload="this.classList.add('loaded')">
          <h3>3rd Thomas Award 2008</h3>
          <p id="my-div-one-only">(THE OUSTANDING & MOST ADMIRE SUPPLIERS)
            from United Laaboratories Inc.
          </p>
          <a id="see-less-button-one-only" onclick="showLessOneOnly()" align="center">See Less...</a>
          <a id="see-more-button-one-only" onclick="showMoreOneOnly()" align="center">See More...</a>
        </div>
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/2.png') }}" onload="this.classList.add('loaded')">
          <h3>Total Quality Achievement Award</h3>
          <p id="my-div-two-only">(Preferred Supplier)
            DATE: May 16, 2014.
          </p>
        <a id="see-less-button-two-only" onclick="showLessTwoOnly()" align="center">See Less...</a>
        <a id="see-more-button-two-only" onclick="showMoreTwoOnly()" align="center">See More...</a>
        </div>
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/3.png') }}" onload="this.classList.add('loaded')">
          <h3>CERTIFICATE OF PARTICIPATION </h3>
          <p id="my-div-three-only">For their invaluable support and Participation at
            22nd Manufacturing Technology Cebu.
            DATE: JUNE 28-30, 2018 | WATERFRONT CEBU CITY HOTEL AND CASINO
            GLOBAL LINK MP events international Inc.
          </p>  
          <a id="see-less-button-three-only" onclick="showLessThreeOnly()" align="center">See Less...</a>
          <a id="see-more-button-three-only" onclick="showMoreThreeOnly()" align="center">See More...</a>
        </div>
          
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/4.png') }}" onload="this.classList.add('loaded')">
          <h3>PLAQUE OF APPRECIATION</h3>
          <p id="my-div-four-only">For its invaluable contribution and unwavering support extended to the company 
            through its concerted efforts in keeping with excellent standards in cost,
            Delivery and service. 
            DATE: Given this 14th day of December 2018 at Bel Electronics Corporation, No. 8 Carmelray Industrial Park I
            Canlubang , Calamba city, Laguna, Philippines.
          </p>
          <a id="see-less-button-four-only" onclick="showLessFourOnly()" align="center">See Less...</a>
          <a id="see-more-button-four-only" onclick="showMoreFourOnly()" align="center">See More...</a>
        </div>

        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/5.png') }}" onload="this.classList.add('loaded')">
          <h3>PLAQUE OF APPRECIATION</h3>
          <p id="my-div-five-only">For its unwavering support that helped in achieving our path to success.
            You are being honored with much appreciation and gratitude.
            DATE: Given this 02, day of January 2016 at Paranaque City, Metro Manila, Philippines.For its unwavering support that helped in achieving our path to success.
            You are being honored with much appreciation and gratitude.
            DATE: Given this 02, day of January 2016 at Paranaque City, Metro Manila, Philippines.
          </p>
          <a id="see-less-button-five-only" onclick="showLessFiveOnly()" align="center">See Less...</a>
          <a id="see-more-button-five-only" onclick="showMoreFiveOnly()" align="center">See More...</a>
        </div>

        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/6.png') }}" onload="this.classList.add('loaded')">
          <h3>SERVICE AWARD presented to Amelco Desicants Inc.</h3>
          <p id="my-div-six-only">In appreciation of your 10 years of excellence and dedicated service to the company.
            DATE: Given this 20th of April 2012
            Hitachi Terminals Mechatronics Philippines corporation. 
          </p>
          <a id="see-less-button-six-only" onclick="showLessSixOnly()" align="center">See Less...</a>
          <a id="see-more-button-six-only" onclick="showMoreSixOnly()" align="center">See More...</a>
        </div>
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/7.png') }}" onload="this.classList.add('loaded')">
          <h3>TOTAL QUALITY ACHIEVEMENT AWARD CERTIFIED SUPPLIER</h3>
          <p id="my-div-seven-only">ACTIVPACK CORPORATION 
            JUNE 07, 2019
            UNILAB CORPORATE CENTER, BAYANIHAN CENTER.
          </p>
          <a id="see-less-button-seven-only" onclick="showLessSevenOnly()" align="center">See Less...</a>
          <a id="see-more-button-seven-only" onclick="showMoreSevenOnly()" align="center">See More...</a>
        </div>

        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/8.png') }}" onload="this.classList.add('loaded')">
          <h3>BAYANIHAN AWARD</h3>
          <p id="my-div-eight-only">For achieving Excellence as a Certified supplier.
          DATE: for the year 2003 Given this 16th day of April 2004 at EDSA SHANGRI-LA HOTEL, MANDALUYONG CITY.
          </p>
          <a id="see-less-button-eight-only" onclick="showLessEightOnly()" align="center">See Less...</a>
          <a id="see-more-button-eight-only" onclick="showMoreEightOnly()" align="center">See More...</a>
        </div>

        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/9.png') }}" onload="this.classList.add('loaded')">
          <h3>70 UNILAB TULONG AT MALASAKIT</h3>
          <p id="my-div-nine-only">Your efforts to deliver the promise of Husay and Malasakit inspire us to continue living out the same values
            in all we do. Maraming Salamat sa inyong husay at malasakit at sa tiwalanag ibinigay ninto samin nitong 
            pitumpong taon. 
            DATE: JUNE 2015 from UNILAB.
          </p>
          <a id="see-less-button-nine-only" onclick="showLessNineOnly()" align="center">See Less...</a>
          <a id="see-more-button-nine-only" onclick="showMoreNineOnly()" align="center">See More...</a>
        </div>
        <div class="trophy">
          <img loading="lazy" src="{{ asset('/img/10.png') }}" onload="this.classList.add('loaded')">
          <h3>3rd Thomas Award 2006
            (THE OUSTANDING & MOST ADMIRE SUPPLIERS)</h3>
          <br>
          <p id="my-div-ten-only">AS A CERTIFIED SUPPLIER
            DATE: SEPTEMBER 29,2006.
          </p>
          <a id="see-less-button-ten-only" onclick="showLessTenOnly()" align="center">See Less...</a>
          <a id="see-more-button-ten-only" onclick="showMoreTenOnly()" align="center">See More...</a>
        </div>
      </section>
   </div>  
</div>

<div id="terms_and_condition_id" class="tabcontent">
    <div class="image-container">
        <section class="terms-condition-frame">
            <figure>
                <h2>Terms And Condition</h2>

            <h5><b>Acceptance of Terms</b><br>
                By accessing and using this website, you agree to be bound by these terms and conditions.<br> If you do not agree with these terms and conditions, please do not use the website.</h5>
          
            <figcaption style="word-spacing: 5px;text-align:left">
                <p><b>Intellectual Property Rights</b><br>
                    All content on this website, including text, graphics, logos, images, and software, is the property of the company or its licensors and is protected by copyright laws. You may not use any content on this website without the company's prior written consent.
                </p>
                <p><b>Use of Website</b><br>
                    You may use this website for lawful purposes only. You may not use the website in any way that is harmful, fraudulent, or illegal.
                </p>
                <p><b>Disclaimer of Warranties</b><br>
                    The company makes no warranties or representations about the accuracy or completeness of the information on this website. The website is provided on an "as is" basis without any warranties of any kind, express or implied.
                </p>
                <p><b>Limitation of Liability</b><br>
                    The company shall not be liable for any damages, including indirect, incidental, or consequential damages, arising out of or in connection with the use or inability to use this website.
                </p>
                <p><b>Governing Law and Jurisdiction</b><br>
                    These terms and conditions shall be governed by and construed in accordance with the laws of [country]. Any disputes arising out of or in connection with these terms and conditions shall be subject to the exclusive jurisdiction of the courts of [city, state/province, country].
                </p>
            </figcaption>
            </figure>
          </section>
   </div>  
</div>


<div id="privacy_and_policy_id" class="tabcontent">
    <div class="image-container">
        <section class="privacy-policy-frame">
            <figure>
                <h2>Privacy and Policy</h2>
            <figcaption style="word-spacing: 5px;text-align:left">
                <p><b>Information Collection</b><br>
                    We may collect personal information such as your name, email address, and phone number when you visit or use our website. We may also collect non-personal information such as your IP address, browser type, and operating system.
                </p>
                <p><b>Use of Information</b><br>
                    We may use your personal information to provide you with information about our products and services, to respond to your inquiries and requests, and to improve our website and customer service.
                </p>
                <p><b>Disclosure of Information</b><br>
                    We may disclose your personal information to third-party service providers who perform services on our behalf, such as website hosting and data analysis. We may also disclose your personal information if required by law or to protect our rights or the rights of others.
                </p>
                <p><b>Data Security</b><br>
                    We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no data transmission over the internet can be guaranteed to be 100% secure.
                </p>
                <p><b>Data Retention</b><br>
                    We will retain your personal information for as long as necessary to fulfill the purposes for which it was collected and to comply with applicable laws and regulations.
                </p>
                <p><b>Your Rights</b><br>
                    You have the right to access, correct, and delete your personal information. You may also withdraw your consent to the processing of your personal information at any time.
                </p>
                <p><b>Third-Party Links</b><br>
                    Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these websites.
                </p>
                <p><b>Updates to Privacy Policy</b><br>
                    We may update this privacy policy from time to time. We encourage you to review this policy periodically for any changes.
                </p>
            </figcaption>
            </figure>
          </section>
   </div>  
</div>
<script>

// Open the default tab
document.getElementById("defaultOpen").click();

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



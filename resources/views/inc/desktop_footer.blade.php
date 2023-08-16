<style>
/* Styles for larger screens */
@media screen and (min-width: 768px) {
  /* Your styles go here */
  ::-webkit-scrollbar {
    width: 8px;
    background-color: #f5f5f5;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #9b9b9b;
    border-radius: 5px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background-color: #6b6b6b;
  }
  footer {
    background-color: rgb(45,67,57) !important;
    color: rgb(37,59,47) !important;
    position: absolute;
    padding-left: 50px;

    padding-right: 50px;
    width: 100%;
  }

  .info{
    width: 100%;
    background-color: rgb(37,59,47) !important;
    height: 188px; 
  }
  .info-content{
    width: 25%;
    float: left;
    
  }
  .info:after {
    content: "";
    display: table;
    clear: both;
  }
  .info .info-content figure img{
    display: block;
    margin: auto;
    width:50px; 
    height:50px;
  }
  .subs-btn {
    display: block;
    margin: auto;
    background-color: rgb(226, 230, 5);
    color: black;
    width: 206px;
    height: 51px;
    border-radius: 5px;
    font-size: 20px;
    animation: pulse 2s infinite;
    box-shadow: 3px 5px 10px rgba(255, 255, 255, 0.2);
  }

  .subs-btn:hover{
    display: block;
    margin: auto;
    background-color: rgb(251, 255, 0);
    color: black;
    width: 206px;
    height: 51px;
    border-radius: 5px;
    font-size: 20px;
  
    box-shadow: 3px 8px 13px rgba(255, 255, 255, 0.2);
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }
  .FAQ-row{
    width: 90%;
    background-color:  rgb(37,59,47) !important;
    height: 60px; 
    position: relative;
    margin-bottom: 10px;
    border-radius: 50px;
    margin-left: 50px;
    margin-right: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 1px 1px 5px 5px rgba(255, 255, 255, 0.2);
    color: white;
    text-align: center;
  }
  .FAQ-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .FAQ-column{
  width: 33.33%;
  float: left;

  }
  .FAQ-column a{
  text-decoration: none;

  }
  .FAQ-column a img{
  width: 90px;
  }
  .social-row{
    width: 100%;
    color: white; 
    
    
  }
  .social-column{
  width: 50%;
  float: left;
  }
  .social-column h4{
  padding-left: 25%;
  }
  .social-column a{
  padding-left: 25%;
  }
  .social-row:after {
    content: "";
    display: table;
    clear: both;
  }

  .social-three-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .social-three-row{
    width: 100%;
    color: white; 
  }
  .social-three-row .social-three-column{
  width: 33.33%;
  float: left;
  height: 100%;
  }
  .social-three-row .social-three-column h4{
    
    padding-left: 3rem;
  }
  .social-three-row .social-three-column img{
    width:30px; 
    height:30px; 
    margin-left: 1px;
    /* display: flex; */
    /* justify-content: center;
     */
  }
  .footer-cat-span{
    color: yellow;
    font-weight: bold;
  }
  .footer-cat-anchor:hover .footer-cat-span {
    color: white;
    margin-left: 5px;
  }

  .footer-cat-anchor:hover{
    color: yellow;
  }
  .footer-cat-anchor{
    font-size: 14px;
    text-decoration: none;
  }

  .image-certs {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      padding: 0;
    }

    .image-certs img {
      margin: 0;
      padding: 0;
      max-width: 90px;
      height: auto;
    }
    .image-certs img:hover{
      margin: 0;
      padding: 0;
      max-width: 100px;
      height: auto;
    }
    .copyright{
      font-size:14px;
      color:rgba(255, 255, 255, 0.582);
      text-align:center !important;
      margin-left: 485px;
    }
}

/* Styles for small screens */
@media screen and (max-width: 768px) {
  /* Your styles go here */
  ::-webkit-scrollbar {
    width: 0.5rem;
    background-color: #f5f5f5;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #9b9b9b;
    border-radius: 5px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background-color: #6b6b6b;
  }
  footer {
    background-color: rgb(45,67,57) !important;
    color: rgb(37,59,47) !important;
    position: absolute;
    /* padding-left: 50px;
    padding-right: 50px; */
    width: 100%;
  }

  .info{
    width: 100%;
    background-color: rgb(37,59,47) !important;
    height: 10rem; 
  }
  .info-content{
    width: 25%;
    float: left;
    
  }
  .info:after {
    content: "";
    display: table;
    clear: both;
  }
  .info .info-content figure img{
    display: block;
    margin: auto;
    width:2rem; 
    height:2rem;
  }
  .info .info-content figure figcaption{
    font-size: 0.5rem;
    text-align: justify;
    display: flex;
  }
  .stay-inform{
    font-size: 1rem;
  }
  .subs-btn {
    display: block;
    margin: auto;
    background-color: rgb(226, 230, 5);
    color: black;
    width: 10rem;
    height: 2rem;
    border-radius: 5px;
    font-size: 0.8rem;
    animation: pulse 2s infinite;
    box-shadow: 3px 5px 10px rgba(255, 255, 255, 0.2);
  }

  .subs-btn:hover{
    display: block;
    margin: auto;
    background-color: rgb(251, 255, 0);
    color: black;
    width: 10.5rem;
    height: 2.5rem;
    border-radius: 5px;
    font-size: 1rem;
    box-shadow: 3px 8px 13px rgba(255, 255, 255, 0.2);
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }
  .FAQ-row{
    width: 100%;
    background-color:  rgb(37,59,47) !important;
    height: 100%; 
    position: relative;
    margin-bottom: 0.5rem;
    border-radius: 5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 1px 1px 5px 5px rgba(255, 255, 255, 0.2);
    color: white;
    text-align: center;
  }
  .FAQ-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .FAQ-column{
  width: 33.33%;
  float: left;

  }
  .FAQ-column a{
  text-decoration: none;
  font-size: 0.5rem;
  }
  .FAQ-column a img{
  text-decoration: none;
  font-size: 0.875rem;
  max-width: 3rem; 
  min-width: 3rem;
  }
  .social-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .social-row{
    width: 100%;
    color: white; 
  }
  .social-column{
  width: 50%;
  float: left;
  height: 100%;
  }
  .social-column h4{
    font-size: 0.8rem;
    padding-left: 3rem;
  }
  .social-column a{
    padding-left: 3rem;
    font-size: 0.5rem;
  }
  .social-three-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .social-three-row{
    display: flex;
    justify-content: center;
    text-align: center;
  }
  .social-three-column {
    flex: 1;
    justify-content: center;
    align-items: center;
  }

  .social-three-column h4 {
    color: white;
  }

  .follow-us-img-container {
    display: flex;

  }
  .social-three-row .social-three-column h4{
    font-size: 0.8rem;
    /* padding-left: 3rem; */
  }
  /* .social-three-row .social-three-column{
  width: 50%;
  float: left;
  height: 100%;
  }
  .social-three-row .social-three-column h4{
    font-size: 0.8rem;
    padding-left: 3rem;
  } */
  .social-three-row .social-three-column img{
    width:1.5rem; 
    height:1.5rem; 
    /* margin-left: 3rem; */
    /* display: flex;
    justify-content: center;
    align-items: center; */
    margin-bottom: 1rem;
  } 
  .footer-cat-span{
    color: yellow;
    font-weight: bold;
  }
  .footer-cat-anchor:hover .footer-cat-span {
    color: white;
    margin-left: 5px;
  }

  .footer-cat-anchor:hover{
    color: yellow;
  }
  .footer-cat-anchor{
    font-size: 0.775rem !important;
    text-decoration: none;
  }
    .copyright{
      font-size: 0.5rem;
      color:rgba(255, 255, 255, 0.582);
      text-align:center !important;
      /* margin-left: 8rem; */
      box-align: center;
    }
}
</style>
<footer>
  <div>
    <div class="info">
      <div class="info-content">
        <figure>
          <img src="{{ asset('/img/phone-call.png') }}">
          <figcaption style="color: white" align="center">
            TELEPHONE<br>
            63-9778551969
          </figcaption>
        </figure>
      </div>
      <div class="info-content">
        <figure >
          <img src="{{ asset('/img/fax-machine.png') }}">
          <figcaption style="color: white" align="center">
            FAX<br>
            63-49-5440216
          </figcaption>
        </figure>
      </div>
      <div class="info-content">
        <figure >
          <img src="{{ asset('/img/email.png') }}">
          <figcaption style="color: white" align="center">
            EMAIL<br>
            sales@amelcosystems.com
          </figcaption>
        </figure>
      </div>
      <div class="info-content">
        <figure >
          <img src="{{ asset('/img/address.png') }}">
          <figcaption style="color: white" align="center">
            ADDRESS<br>121 East Main Avenue.Laguna Technopark Special Economic ZoneBinan, Laguna 4024 Philippines
          </figcaption>
        </figure>
      </div>
    </div>
  </div>
  
  

  <h2 class="stay-inform" align="center" style="color:white"><b>Stay informed, subscribe now!</b></h2>
  <button class="subs-btn"><b>Subscribe</b></button>

 
  <div class="social-row">
    <div class="social-column">
      <h4><b>Products Category</b></h4>
      @foreach($category_data as $catlist)
      <a class="footer-cat-anchor" href='{{ url("/product?button=category{$catlist->id}") }}'><span class="footer-cat-span">>></span>{{$catlist->cat_title}}</a>
      <br>
      @endforeach
    </div>
    <div class="social-column">
      <h4><b>Navigation Link</b></h4>
      <a class="footer-cat-anchor" href="{{ url('/') }}"><span class="footer-cat-span">>></span> Home</a>
      <br>
      <a class="footer-cat-anchor" href="{{ url('/product') }}"><span class="footer-cat-span">>></span> Product</a>
      <br>
      <a class="footer-cat-anchor"  href="{{ url('/about') }}"><span class="footer-cat-span">>></span> About us</a>
      <br>
      <a class="footer-cat-anchor" href="{{ url('/event-csr') }}"><span class="footer-cat-span">>></span> Event & CSR</a>
      <br>
      <a class="footer-cat-anchor" href="{{ url('/contact-us') }}"><span class="footer-cat-span">>></span> Contact</a>
    </div>
  </div>
<div class="social-three-row">
  <div class="social-three-column">
    <h4><b>Follow us</b></h4>
      <img type="image/png" src="{{ asset('/img/facebook.png') }}"> 
      <img type="image/png" src="{{ asset('/img/linkedin.png') }}"> 
      <img type="image/png" src="{{ asset('/img/twitter.png') }}">
  </div>
  {{-- <div class="social-three-column">
    <h4><b>Payment Method</b></h4>
    <img type="image/png" src="{{ asset('/img/atm-card.png') }}">
  </div> --}}
  <div class="social-three-column">
    <h4><b>Certificates</b></h4>
      <a style="padding:0px" href="/img/Cert1.jpg" target="_blank">
        <img  type="image/png" src="{{ asset('/img/certlogo1.png') }}">
      </a>
      <a style="padding:0px" href="/img/Cert2.jpg" target="_blank">
        <img type="image/png" src="{{ asset('/img/certlogo2.png') }}">
      </a>
      <a style="padding:0px" href="/img/Cert1.jpg" target="_blank">
        <img type="image/png" src="{{ asset('/img/certlogo3.png') }}">
      </a>
      <a style="padding:0px" href="/img/Cert2.jpg" target="_blank">
        <img type="image/png" src="{{ asset('/img/certlogo4.png') }}">
      </a>
  </div>
</div>
  <div class="FAQ-row"> 
    <div class="FAQ-column">
      <a style="text-decoration: none;" href="#faqs-id">FAQ's</a>
    </div>
    <div class="FAQ-column">
      <a href="{{ url('/about?button=buttonidsPrivacyPolicy') }}">Privacy & Policy</a>
    </div>
    <div class="FAQ-column">
      <a href="/"><img type="image/png" src="{{ asset('/img/ActivPack_logo_darkmode.png') }}"></a>
    </div>
    <div class="FAQ-column">
      <a href="{{ url('/about?button=buttonidsTermsCondition') }}">Terms and Condition</a>
    </div>
    <div class="FAQ-column">
      <a style="text-decoration: none;" href="{{ url('/event-csr?button=buttonidsBLogs') }}">What's news?</a>
    </div>
  </div>
  <div align="center">
  <a class="copyright">© 2023 by ACTIVPACK. Alright Reserved.</a>
  </div>
</footer>

  
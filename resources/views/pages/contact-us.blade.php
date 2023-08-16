@extends('layouts.app')
@section('content')
<style>
@media screen and (min-width: 768px) {
  h2{
      font-family: 'Times New Roman', Times, serif;
      font-size: 40px;
      font-weight: bold;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }

#desktop-about-us-content{
  display:block;
}
#mobile-about-us-content{
  display: none;
}
  /* contact us css */

  .contact-us {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin: 50px;
    margin-bottom: 0px;
    padding: 20px;
    border-top: 3px solid rgb(167, 167, 167);
    border-left: 3px solid rgb(167, 167, 167);
    border-right: 3px solid rgb(167, 167, 167);
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  form {
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
    background-color: rgba(231, 231, 231, 0.158);
    padding: 5px;
    border-radius: 10px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="email"],
  input[type="contact"],
  textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    box-sizing: border-box;
  }

  button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  .contact-image{
    width: 100%;
    height: 500px;
    /* background-image: url("/img/bg_contact2.png"); */
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    padding-left: 10px;
  }

  .contact-image img{
    width: 100%;
    height: 450px;
    /* background-image: url("/img/bg_contact3.png"); */
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    padding-left: 10px;
  }
  .nav-social-media{
    margin-bottom:100px;
    margin-left: 50px;
    margin-right: 50px;
  }

  /* social media btn css */
  .nav-social-media button a {
    display: inline-block;
    width: 100%   ;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .nav-social-media button{
      float: left;
      width: 20%;
      border-radius: 0px;
  }
  .nav-social-media button a:hover {
    background-color: rgba(255,255,255,0.2);
  }
}
@media screen and (max-width: 768px) {
  #desktop-about-us-content{
  display:none;
}
#mobile-about-us-content{
  display: block;
}
.contact-us-header{
  font-size: 1rem;
  color:rgb(24,79,0);
  font-weight: bold;
  /* text-shadow: 2px 2px 4px rgba(0,0,0,0.5); */
  text-align:center;
  padding-top: 1rem;
}
  .contact-us {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-bottom: 0px;
    padding: 0.5rem;
    border-radius: 1rem;
  }
 
  form {
    width: 100%;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
    background-color: rgba(231, 231, 231, 0.158);
    padding: 0.2rem;
    border-radius: 10px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 0.5rem;
  }

  label {
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 0.8rem;
  }

  input[type="text"],
  input[type="email"],
  input[type="contact"],
  textarea {
    padding: 0.2rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 0.875rem;
    width: 100%;
    box-sizing: border-box;
  }

  .submit-contact-us {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 0.5rem 1.4rem 0.5rem 1.4rem;
    font-size: 0.8rem;
    cursor: pointer;
    text-align:center;
  }

  .contact-image{
    width: 100%;
    height: 100%;
    /* background-image: url("/img/bg_contact2.png"); */
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    padding-left: 10px;
  }

  .contact-image img{
    width: 100%;
    height: 100%;
    /* background-image: url("/img/bg_contact3.png"); */
    background-size: cover;
    background-position: center;
    border-radius: 5px;
    padding-left: 10px;
  }
  .nav-social-media{
    margin-bottom:2rem;
    
    display: flex;
  }

  /* social media btn css */
  .nav-social-media button a {
    display: inline-block;
    width: 100%;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  .nav-social-media button a img{
    display: inline-block;
    width: 30%;
    height: 40%;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .nav-social-media button{
      float: left;
      width: 20%;
      border-radius: 0px;
      font-size: 0.5rem;
      border: 0px solid white;
      padding: 0.1rem;
  }
  .nav-social-media button a:hover {
    background-color: rgba(255,255,255,0.2);
  }
  
}
</style>
  
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
<div id="desktop-about-us-content">
  <div class="contact-us">
    {!! Form::open(['action' => 'App\Http\Controllers\PagesController@storeContactUsMessage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}
      {{-- <form> --}}
        <div class="form-group">
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
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required  value="{{ old('name') }}" required minlength="10" maxlength="50">
        </div>
        <div class="form-group">
          <label for="company_name">Company Name</label>
          <input type="text" id="name" name="company_name" placeholder="Enter the company name" required value="{{ old('company_name') }}" required minlength="5" maxlength="50">
        </div> 
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
        </div>
        <div class="form-group">
          <label for="contact">Contact/Telephone</label>
          <input type="contact" id="contact" name="contact_number" value="{{ old('contact_number') }}"  placeholder="Enter your contact/telephone number" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" style="height: 200px" placeholder="Enter your message" required required minlength="20" maxlength="500">{{ old('message') }}</textarea>
        </div>
        <button class="submit-contact-us" type="submit">Send</button>
      {{-- </form> --}}
      {!! Form::close() !!}
      <div class="contact-image">
        <img src="{{ asset('/img/bg_contact3.png') }}" alt="Food Product Image" width="100%" height="100%">
      </div>
  </div>
</div>  



<div id="mobile-about-us-content">
  <h2 class="contact-us-header">CONTACT US</h2>
  <div class="contact-us">
    {!! Form::open(['action' => 'App\Http\Controllers\PagesController@storeContactUsMessage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}
      {{-- <form> --}}
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="company_name">Company Name</label>
          <input type="text" id="name" name="company_name" placeholder="Enter the company name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="contact">Contact/Telephone</label>
          <input type="contact" id="contact" name="contact_number" placeholder="Enter your contact/telephone number" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" style="height: 200px" placeholder="Enter your message" required></textarea>
        </div>
        <button class="submit-contact-us" type="submit">Send</button>
      {{-- </form> --}}
      {!! Form::close() !!}
      
  </div>
</div> 
<div class="nav-social-media">
  <button style="background-color: #c94438;"><a href="mailto:youremail@example.com" ><img src="{{ asset('/img/gmail_contact.png') }}" width="15%" height="15%">&nbsp;Email</a></button>
  <button style="background-color: #6056a1;"><a href="viber://chat?number=%2B123456789" ><img src="{{ asset('/img/viber_contact.png') }}" width="15%" height="15%">&nbsp;Viber</a></button>
  <button style="background-color: #026ca5;"><a href="https://www.linkedin.com/" ><img src="{{ asset('/img/linkedin_contact.png') }}" width="15%" height="15%">&nbsp;LinkedIn</a></button>
  <button style="background-color: #324c83;"><a href="https://www.facebook.com/" ><img src="{{ asset('/img/facebook_contact.png') }}" width="15%" height="15%">&nbsp;Facebook</a></button>
  <button style="background-color: #187fc0;"><a href="https://twitter.com/" ><img src="{{ asset('/img/twitter_contact.png') }}" width="15%" height="15%">&nbsp;Twitter</a></button>
</div>
@include('pages.faqs')
@endsection
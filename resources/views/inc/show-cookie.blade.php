<style>
      body {
        margin: 0;
        overflow: hidden;
        overscroll-behavior: contain;
    }
    
    #cookie-consent {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.322);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
        overflow-x: hidden;
    }
    
    .cookie-container {
        background: #f7f7f7;
        padding: 30px;
        text-align: center;
        border-radius: 10px;
        max-width: 90%;
    }
    
    .cookie-logo img {
        width: 100px;
        float: left;
    }
    
    .cookie-header h2{
        text-align: left !important;
    }
    .cookie-content{
        padding: 5px 30px 30px 30px;
    }
    .cookie-content-container {
        background-color: rgb(216, 216, 216);
        /* padding: 5px 10px 10px 10px; */
        border-radius: 10px;
    }
    
    .cookie-content-container p {
        text-align: left;
    }
    
    .cookie-content-container p a {
        color: blue !important;
        text-decoration: underline;
        cursor: pointer;
    }
    
    .btn-accept-cookie {
        text-align: left;
    }
    
    .btn-accept-cookie .accept-btn {
        border-radius: 20px;
        margin-left: 30px;
        margin-bottom: 10px;
        background-color: #f70;
        color: white;
        border: none;
        padding: 10px 20px;
    }
    .btn-accept-cookie .accept-btn:hover {
        border-radius: 20px;
        margin-left: 30px;
        margin-bottom: 10px;
        background-color: rgb(255, 134, 28);
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    .btn-decline-cookie{
        text-align: left;
        
    } 
    .btn-decline-cookie .decline-btn{
        background-color: rgba(255, 255, 255, 0);
        color: rgb(155, 155, 155);
        border: none;
    }
    .btn-decline-cookie .decline-btn:hover{
        background-color: rgba(255, 255, 255, 0);
        color: rgb(80, 80, 80);
        border: none;
        cursor: pointer;
    }
    #show-cookie-content{
        text-align: justify;
    }

    /* #see-more-cookie, #see-less-cookie{
      color: rgb(24,79,0);
      border: none;
      font-size: 0.6rem;
      text-align:left;
      cursor: pointer;
    } */
</style>

@if(!request()->cookie('accept_cookies'))
    <div id="cookie-consent">
        <div class="cookie-container">
            <div class="cookie-logo">
                <a href="/"><img type="image/png" src="{{ asset('/img/ActivPack_logo_darkmode.png') }}"></a>
            </div>
            <br><br><br>
            <div class="cookie-header">
                <h2><b>Cookie Consent</b></h2>
                <p id="show-cookie-update"></p>
            </div>
            <div class="cookie-content-container">
                <div class="cookie-content">
                    <p id="show-cookie-content">By clicking “Accept All”, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts.
                        Visitors have the right to withdraw their consent.
                        For additional information you may view the <a onclick="showMoreCookie(this)">cookie details</a>. Read more about our <a href="{{ url('/about?button=buttonidsPrivacyPolicy') }}">privacy policy</a>.</p>
                </div>
                <div class="btn-accept-cookie">
                    <form action="{{ route('cookies.accept') }}" method="POST">
                        @csrf
                        <button class="accept-btn" type="submit" >&check; Accept All</button>
                    </form> 
                </div>
            </div>
            <div class="btn-decline-cookie">
                {{-- <form action="{{ route('cookies.decline') }}" method="POST">
                    @csrf --}}
                    <button class="decline-btn" onclick="hideCookie()">Decline</button>
                {{-- </form>  --}}
            </div>
        </div>
    </div>
    <script>
        function hideCookie() {
            document.getElementById("cookie-consent").style.display = "none";
        }
    </script>
@endif
<script> 
    function showMoreCookie(onclick) {
        var cookieContent = document.getElementById('show-cookie-content');
        var cookieUpdate = document.getElementById('show-cookie-update');
        cookieUpdate.innerHTML = `<b>ActivPack is in the process of updating our website.
                                After we finish updating our website,
                                you will be able to set your cookie preferences.</b>`;
        cookieContent.innerHTML = `<div style="-webkit-overflow-scrolling: touch;overscroll-behavior: contain;height: 300px;overflow-y: scroll;overflow-x: hidden;padding-right: 30px">
        <h5><b>Strictly Necessary Cookies: (Always Active)</b></h5>
        <p style="text-align:justify">These cookies are necessary for the website to function and cannot be switched off in our systems.
       They are usually only set in response to actions made by you which amount to a request for services,
        such as setting your privacy preferences, logging in or filling in forms.
        You can set your browser to block or alert you about these cookies,
        but some parts of the site will not then work. These cookies do not store any personally identifiable information.</p>
        <h5><b>Functional Cookies:</b></h5>
        <p style="text-align:justify">These cookies enable the website to provide enhanced functionality and personalization.
        They may be set by us or by third party providers whose services we have added to our pages.
        If you do not allow these cookies then some or all of these services may not function properly.</p>
        <h5><b>Performance Cookies:</b></h5>
        <p style="text-align:justify">These cookies allow us to count visits and traffic sources so we can measure and improve the performance of our site.
        They help us to know which pages are the most and least popular and see how visitors move around the site.
        All information these cookies collect is aggregated and therefore anonymous.
        If you do not allow these cookies we will not know when you have visited our site,
        and will not be able to monitor its performance.</p>
        <h5><b>Targeting Cookies:</b></h5>
        <p style="text-align:justify">These cookies may be set through our site by Analog Devices and our service providers.
        They may be used by Analog Devices to build a profile of your interests and show you relevant
        content on our site. They do not store directly personal information, but are based on uniquely
        identifying your browser and internet device. If you do not allow these cookies,
        you will experience reduced relevant content.</p></div>`;
        
    }
  </script>
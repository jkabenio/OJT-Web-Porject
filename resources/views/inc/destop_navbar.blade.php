<style>
@media screen and (max-width: 768px) {
  /* Your styles go here */
  .sidebar {
    position: fixed;
    margin-top: 0.5rem;
    /* margin-right: 0.5rem; */
    bottom: 1;
    right: 0;
    /* width: 4rem;
    */
    height: 2rem; 
    background-color: rgba(24, 79, 0, 0.76);
    z-index: 999;
    transition: all 0.3s ease;
    border-radius: 0.2rem;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
  }

  .sidebar.closed {
    position: fixed;
    /* height: auto; */
    width: 5rem;
    border-radius: 0.2rem;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    z-index: 999;
  }

  .sidebar.open {
    width: 5rem;
    height: auto;
    border-radius: 0.2rem;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    background-color: rgba(24, 79, 0, 0.76);
  }

  .sidebar-header {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    height: 1rem;
    padding-top: 0.5rem;
    
  }
  .sidebar-header::after {
    content: "MENU";
    display: flex;
    align-items: flex-start;
    justify-content: center;
    height: 1rem;
    color: white;
    font-size: 0.8rem;
    padding-right: 0.3rem;
  }

  .sidebar-toggle {
    background-color: transparent;
    border: none;
    cursor: pointer;
  }

  .sidebar-icon {
    display: block;
    width: 1.5rem;
    height: 0.2rem;
    background-color: #ffffff;
    transition: all 0.3s ease;
    margin-bottom: 0.2rem;
  }

  .sidebar.open .sidebar-icon {
    transform: rotate(180deg)
  }

  .sidebar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .sidebar-menu li {
    display: block;
  }

  .sidebar-menu li a {
    display: flex;
    align-items: center;
    height: 0rem;
    padding: 0 0;
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .sidebar.open .sidebar-menu li a {
    display: flex;
    padding: 1rem 0rem 1.4rem 0rem;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;

  }

  .sidebar-menu li a:hover {
    background-color: #dbdf00;
  }

  .close .menu-icon {
    display: none;
    width: 5rem;
    height: 0.1rem;
    /* border-radius: 100%; */
    margin-left: 1.4rem;
    margin-top: 3rem;
  }
  .open .menu-icon{
    display: block;
    /* width: 0rem; */
    height: 5rem;
    /* border-radius: 100%; */
    margin-left: 0rem;
    margin-top: 3rem;
  }

  .menu-text {
    flex: 1;
    font-size: 0.9rem;
    text-align: center;
    color: white;
    display: block;
  }

  .sidebar.open .menu-text {
    display: block;
    
  }

  /* .sidebar.closed .menu-text {
    display: none;
  } */

  .hidden {
    display: none;
  }

  #backtop {
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      display: none;
      z-index: 999;
      background-color: rgba(24, 79, 0, 0.575);
      color: white;
      border: 1px solid rgb(33, 105, 2);
      border-radius: 100px;
      padding-left: 1rem;
      padding-right: 1rem;
      padding-top: 0.5rem;
      padding-bottom: 0.5rem;
      font-size: 1rem;
    }
}
</style>



<div id="mobile-content" class="sidebar">
  <div class="sidebar-header">
    <button class="sidebar-toggle">
      <span class="sidebar-icon"></span>
      <span class="sidebar-icon"></span>
      <span class="sidebar-icon"></span>
     
    </button>
    
  </div>
  <ul class="sidebar-menu">
    <li><a href="{{ url('/') }}" style="margin-top: 2rem"><span class="menu-icon icon-home"></span><span class="menu-text hidden">Home</span></a></li>
    <li><a href="{{ url('/product') }}"><span class="menu-icon icon-product"></span><span class="menu-text hidden">Product</span></a></li>
    <li><a href="{{ url('/about') }}"><span class="menu-icon icon-about"></span><span class="menu-text hidden">About</span></a></li>
    <li><a href="{{ url('/event-csr') }}"><span class="menu-icon icon-event"></span><span class="menu-text hidden">Events and CSR</span></a></li>
    <li><a href="{{ url('/contact-us') }}"><span class="menu-icon icon-contact"></span><span class="menu-text hidden">Contact</span></a></li>
    <li><a href="#faqs-id"><span class="menu-icon icon-faqs"></span><span class="menu-text hidden">FAQs</span></a></li>
  </ul>
</div>

<script>

  const sidebar = document.querySelector('.sidebar');
  const sidebarToggle = document.querySelector('.sidebar-toggle');
  
  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
  });
  
  window.addEventListener('resize', () => {
    if (window.innerWidth <= 768) {
      sidebar.classList.add('closed');
    } else {
      sidebar.classList.remove('closed');
    }
  });

  // const sidebarMenu = document.querySelector('.sidebar');
  // const sidebarToggleMenu = document.querySelector('.sidebar-header');
  
  // sidebarToggleMenu.addEventListener('click', () => {
  //   sidebarMenu.classList.toggle('open');
  // });
  
  // window.addEventListener('resize', () => {
  //   if (window.innerWidth <= 768) {
  //     sidebarMenu.classList.add('closed');
  //   } else {
  //     sidebarMenu.classList.remove('closed');
  //   }
  // });
  
  </script>
 {{-- mobile ends here --}}
<style>
  @media screen and (min-width: 768px) {
    .top-nav {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgb(24,79,0);
      z-index: 999;
      height: 50px;
    }
    
    .nav-menu {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center; /* center the items horizontally */
      align-items: center;
      height: 100%;
    }
    
    .nav-menu li {
      display: block;
      flex: 1; /* distribute available space evenly among all list items */
      height:100%;
    }
    
    .nav-menu li a {
      display: flex;
      align-items: center;
      height: 100%;
      padding: 0 20px;
      color: #ffffff;
      text-decoration: none;
      position: relative;
      justify-content: center; /* add this line to center the content horizontally */
    }

    .nav-menu li a:hover,
    .nav-menu li a.active {
      color: #dbdf00;
    }

    .nav-menu li a.active::before,
    .nav-menu li a:hover::before {
      width: 100%;
    }

    
    .nav-menu li a:hover {
      color: #dbdf00;
    }
    
    .nav-menu li a::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 5px;
      background-color: #fbff00;
      transition: all 0.3s ease;
    }
    
    .nav-menu li a:hover::before {
      width: 100%;
    }
    
    .menu-icon {
      display: block;
      width: 40px;
      height: 40px;
      margin-right: 1px;
    }
    
    .menu-text {
      font-size: 0.9rem !important;
      font-weight: bold;
    }
    .icon-home{
      background-image: url('/img/home.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }
    .icon-contact{
      background-image: url('/img/contact1.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }
    .icon-about{
      background-image: url('/img/about.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }
    .icon-product{
      background-image: url('/img/product.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }
    .icon-faqs{
      background-image: url('/img/faqs.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }
    .icon-event{
      background-image: url('/img/blog.png');
      background-repeat: no-repeat;
      width: 24px;
      height: 24px;
    }

    #backtop {
      position: fixed;
      bottom: 20px;
      right: 0;
      display: none;
      z-index: 999;
      background-color: #2b81e5!important;
      color: white;
      border: none;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      padding-left: 10px;
      padding-right: 5px;
      padding-top: 5px;
      padding-bottom: 5px;
      font-size: 30px;
    }
  }
  </style>
    
  <nav id="desktop-content" class="top-nav"> 
    <ul class="nav-menu">
      <li style="border-right: 1px solid rgb(255, 255, 255);">
        <a href="{{ url('/') }}">
          <span class="menu-icon icon-home"></span>
          <span class="menu-text">HOME</span>
        </a>
      </li>
      <li style="border-right: 1px solid rgb(255, 255, 255);">
        <a href="{{ url('/product') }}">
          <span class="menu-icon icon-product"></span>
          <span class="menu-text">PRODUCT</span>
        </a>
      </li>
      <li style="border-right: 1px solid rgb(255, 255, 255);">
        <a href="{{ url('/about') }}">
          <span class="menu-icon icon-about"></span>
          <span class="menu-text">ABOUT US</span>
        </a>
      </li>
      <li style="border-right: 1px solid rgb(255, 255, 255);">
        <a href="{{ url('/event-csr') }}">
          <span class="menu-icon icon-event"></span>
          <span class="menu-text">EVENTS & CSR</span>
        </a>
      </li>
      <li style="border-right: 1px solid rgb(255, 255, 255);">
        <a href="{{ url('/contact-us') }}">
          <span class="menu-icon icon-contact"></span>
          <span class="menu-text">CONTACT</span>
        </a>
    </li>
      <li>
        <a href="#faqs-id">
          <span class="menu-icon icon-faqs"></span>
          <span class="menu-text">FAQs</span>
        </a>
      </li>
    </ul>
  </nav>
  <button class="none" id="backtop" title="Back to Top">⬆</button>
<script>
  window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("backtop").style.display = "block";
  } else {
    document.getElementById("backtop").style.display = "none";
  }
}

document.getElementById("backtop").addEventListener("click", function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});

  </script>

  
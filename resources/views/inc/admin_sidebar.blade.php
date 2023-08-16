@if(Auth::guard('admin')->check())

<style>
    /* Reset styles for consistent styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}
/* ---------- HEADER ---------- */
.header {
grid-area: header;
height: 70px;
display: flex;
align-items: center;
justify-content: space-between;
padding: 0 30px 0 30px;
box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
}


/* ---------- SIDEBAR ---------- */
#sidebar {
grid-area: sidebar;
height: 100%;
background-color: #263043;
overflow-y: auto;
transition: all 0.5s;
-webkit-transition: all 0.5s;
display: block;
overflow-y: auto;
}

.sidebar-title {
display: flex;
justify-content: space-between;
align-items: center;
padding: 30px 30px 30px 30px;
/* margin-bottom: 30px; */
}

.sidebar-title > span {
display: none;
}

.sidebar-brand {
margin-top: 15px;
font-size: 20px;
font-weight: 700;
}

.sidebar-list {
padding: 0;
margin-top: 10px;
list-style-type: none;
}

.sidebar-list-item {
padding: 20px 20px 20px 20px;
font-size: 18px;
}

.sidebar-list-item:hover {
/* background-color: rgba(255, 255, 255, 0.2); */
/* cursor: pointer; */
}

.sidebar-list-item > a {
text-decoration: none;
color: #9e9ea4;
}

.sidebar-responsive {
display: inline !important;
position: absolute;
/*
the z-index of the ApexCharts is 11
we want the z-index of the sidebar higher so that
the charts are not showing over the sidebar
on small screens
*/
z-index: 12 !important;
}




/* =====DROPDOWN STYLE====== */

/* Category Menu*/

.category-submenu {
  display: none;
  list-style-type: none;
  margin-left: 20px;
}

li#add_cat:hover{
    background-color: rgba(255, 255, 255, 0.2);
}

li#view_cat:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Dropdown click */
.sidebar-list-item > ul {
  display: none;
}

.sidebar-list-item > ul.show {
  display: block;
}

/* .sidebar-list-item:hover .category-submenu {
  display: block;
}

.category-submenu:hover li a{
    background-color: blue;
} */

/* Product */
.product-submenu {
  display: none;
  list-style-type: none;
  margin-left: 20px;
}

li#add_prod:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

li#view_prod:hover {
    background-color: rgba(255, 255, 255, 0.2);
}
/* Blog */
.blog-submenu {
  display: none;
  list-style-type: none;
  margin-left: 20px;
}

li#add_blog:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

li#view_blog:hover {
    background-color: rgba(255, 255, 255, 0.2);
}


/* FAQs */
.faqs-submenu {
  display: none;
  list-style-type: none;
  margin-left: 20px;
}

li#faqs_blog:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

li#faqs_blog:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Toggle SideBar */

#sidebar-toggle {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
    }

/* =====END====== */

/* Hover Sidebar */
/* .sidebar-list-item:hover {
     background-color: rgba(255, 255, 255, 0.2);
}

.sidebar-list-item.active {
    background-color: #e0e0e0;
} */
/* .sidebar-list-item:hover > a {
    background: rgba(255, 255, 255, 0.2);
}

.sidebar-list-item.active > a {
    background-color: rgba(255, 255, 255, 0.2);
}

.sidebar-list-item.active > a > .material-icons-outlined {
    color: rgba(255, 255, 255, 0.2);
}

li.sidebar-list-item .material-icons-outlined span:hover{
    background: rgba(255, 255, 255, 0.2)
} */

a {
    display: block;
    width: 100%;
    color: #9e9ea4;

}

a:hover {
    width: 100%;
    color: #9e9ea4;
}

.sidebar-list-item {
    cursor: pointer;
}

.sidebar-list-item:hover > a {
    /* display: block */
    background: rgba(255, 255, 255, 0.2);
}

/* End */

/* Side Bar Scroll  */

/* Set the width and height of the scrollbar */
::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}

/* Set the background color of the scrollbar */
::-webkit-scrollbar-track {
  background-color: #272727;
}

/* Set the color of the scrollbar thumb */
::-webkit-scrollbar-thumb {
  background-color: #565656;
  border-radius: 5px;
}

/* On hover, set the color of the scrollbar thumb */
::-webkit-scrollbar-thumb:hover {
  background-color: #555;
}
.header .header-right .all-notif{
  font-size: 24px !important;
}
.header .header-right .website-message{
  font-size: 24px !important;
}
.header .header-right .active-user{
  font-size: 24px !important;
}
</style>
    <!-- Header -->
    <header class="header">
        {{-- <div class="menu-icon" onclick="openSidebar()">
            <span class="material-icons-outlined">menu</span>
        </div> --}}
        <div class="header-left">

        </div>
        <div class="header-right">
          @if ($count == 0)
          <a href="{{ url('/admin/show-notification') }}"><span class="material-icons-outlined all-notif"><span style="font-size: 10px; position: relative; bottom: 13px; left: 13px;"></span>notifications</span>
          <span class="material-icons-outlined website-message"><span style="font-size: 10px; position: relative; bottom: 13px; left: 10px;"></span>email</span>
          <span class="material-icons-outlined active-user"><span style="font-size: 10px; position: relative; bottom: 13px; left: 10px;">🟢</span>account_circle</span></a>
          @else
          <a href="{{ url('/admin/show-notification') }}"><span class="material-icons-outlined all-notif"><span style="font-size: 10px; position: relative; bottom: 13px; left: 13px;">🔴</span>notifications</span>
          <span class="material-icons-outlined website-message"><span style="font-size: 10px; position: relative; bottom: 13px; left: 10px;">🔴</span>email</span>
          <span class="material-icons-outlined active-user"><span style="font-size: 10px; position: relative; bottom: 13px; left: 10px;">🟢</span>account_circle</span></a>
          @endif
            
            
            
        </div>
    </header>
    <!-- End Header -->


<!-- Sidebar -->
<aside id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
        <span class="material-icons-outlined">person</span><span>ADMIN PANEL</span><br><h5>{{Auth::guard('admin')->user()->name}}</h5>
        </div>
        {{-- <span class="material-icons-outlined" onclick="closeSidebar()">close</span> --}}
    </div>

    <ul class="sidebar-list">
        <li class="sidebar-list-item">
        <a href="{{ url('/admin/admindashboard') }}">
            <span class="material-icons-outlined">dashboard</span> Dashboard
        </a>
        </li>
        <li class="sidebar-list-item">
          <a href="{{ url('/admin/show-notification') }}">
            <span class="material-icons-outlined">notifications</span>Notification
              @if ($count == 0)
                <span>&nbsp;{{$count}}</span>
              @else
                <span style="color: red;font-weight: bold">&nbsp;{{$count}}</span>
              @endif
          </a>
          </li>
        {{-- Category --}}
        <li class="sidebar-list-item">
            <a onclick="category()">
              <span class="material-icons-outlined">category</span> Categories <span class="material-icons-outlined">arrow_drop_down</span>
            </a>
            <ul class="category-submenu" style="display: none;">
              <li id="add_cat" style="margin-top: 20px;"><a href="{{ url('/admin/create-category') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add Category</a></li>
              <li id="view_cat" style="margin-top: 15px;"><a href="{{ url('/admin/show-category') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View Category</a></li>
            </ul>
        </li>
        {{-- <li class="sidebar-list-item">
          <a href="{{ url('/admin/comment-approval') }}">
            <span class="material-icons-outlined">pending</span>Pending Comment
              @if ($comment_count == 0)
                <span>&nbsp;{{$comment_count}}</span>
              @else
                <span style="color: red;font-weight: bold">&nbsp;{{$comment_count}}</span>
              @endif
          </a>
        </li> --}}
        {{-- Product --}}
        <li class="sidebar-list-item">
            <a onclick="product()">
              <span class="material-icons-outlined">add_shopping_cart</span> Products <span class="material-icons-outlined">arrow_drop_down</span>
            </a>
            <ul class="product-submenu" style="display:none;">
              <li id="add_prod" style="margin-top: 20px;"><a href="{{ url('/admin/create-product') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add Product</a></li>
              <li id="view_prod" style="margin-top: 15px;"><a href="{{ url('/admin/show-product') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View Product</a></li>
            </ul>
        </li>
        {{-- Blog --}}
        <li class="sidebar-list-item">
            <a onclick="blog()">
              <span class="material-icons-outlined">event</span> Events and CSR <span class="material-icons-outlined">arrow_drop_down</span>
            </a>
            <ul class="blog-submenu" style="display:none;">
              <li id="add_blog" style="margin-top: 20px;"><a href="{{ url('/admin/create-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add Blog</a></li>
              <li id="add_blog" style="margin-top: 20px;"><a href="{{ url('/admin/create-video-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add Video Blog</a></li>
              <li id="add_blog" style="margin-top: 20px;"><a href="{{ url('/admin/create-status-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add Status</a></li>
              <li id="view_blog" style="margin-top: 15px;"><a href="{{ url('/admin/show-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View Blog</a></li>
              <li id="view_blog" style="margin-top: 15px;"><a href="{{ url('/admin/show-video-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View Video Blog</a></li>
              <li id="view_blog" style="margin-top: 15px;"><a href="{{ url('/admin/show-status-blog') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View Status</a></li>
            </ul>
        </li>
        {{-- FAQs --}}
        <li class="sidebar-list-item">
            <a onclick="faqs()">
              <span class="material-icons-outlined">fact_check</span> FAQs <span class="material-icons-outlined">arrow_drop_down</span>
            </a>
            <ul class="faqs-submenu" style="display:none;">
              <li id="faqs_blog" style="margin-top: 20px;"><a href="{{ url('/admin/create-faq') }}" style="text-decoration: none;"><span class="material-icons-outlined">add</span> Add FAQs</a></li>
              <li id="faqs_blog" style="margin-top: 15px;"><a href="{{ url('/admin/show-faq') }}" style="text-decoration: none;"><span class="material-icons-outlined">visibility</span> View FAQS</a></li>
            </ul>
        </li>

        {{-- <li class="sidebar-list-item">
        <a href="#" >
            <span class="material-icons-outlined">groups</span> Customers
        </a>
        </li>
        <li class="sidebar-list-item">
        <a href="#" >
            <span class="material-icons-outlined">backpack</span> Inventory
        </a>
        </li>
        <li class="sidebar-list-item">
        <a href="#" >
            <span class="material-icons-outlined">poll</span> Reports
        </a>
        </li>
        <li class="sidebar-list-item">
        <a href="#" >
            <span class="material-icons-outlined">settings</span> Settings
        </a>
        </li> --}}
        <li class="sidebar-list-item">
          <a href="{{ url('/admin/trash-can') }}" >
              <span class="material-icons-outlined">delete</span> TrashCan
          </a>
          </li>
        <li class="sidebar-list-item">
            <a href="{{route('admin.logout')}}" >
                <span class="material-icons-outlined">logout</span> Logout
            </a>
            </li>
    </ul>
</aside>
    <!-- End Sidebar -->
<script>
    // Get the category dropdown element and the sub-menu containing the links
const categoryDropdown = document.querySelector('.sidebar-list-item:nth-child(3) > a');
const categorySubMenu = document.querySelector('.sidebar-list-item:nth-child(3) > ul');

// Add a click event listener to the category dropdown
categoryDropdown.addEventListener('click', function(event) {
  // Prevent the default behavior of the link
  event.preventDefault();

  // Toggle the visibility of the sub-menu
  categorySubMenu.classList.toggle('show');
});
// Category
function category() {
  var submenu = document.querySelector(".category-submenu");
  if (submenu.style.display === "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}
// Product
function product() {
  var submenu = document.querySelector(".product-submenu");
  if (submenu.style.display === "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}
// Blog
function blog() {
  var submenu = document.querySelector(".blog-submenu");
  if (submenu.style.display === "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}
//FAQs
function faqs() {
  var submenu = document.querySelector(".faqs-submenu");
  if (submenu.style.display === "none") {
    submenu.style.display = "block";
  } else {
    submenu.style.display = "none";
  }
}

// Hover Sidebar
var sidebarItems = document.querySelectorAll('.sidebar-list-item');

sidebarItems.forEach(function(item) {
    var dropdown = item.querySelector('ul');

    item.addEventListener('click', function(event) {
        if (dropdown && event.target !== dropdown) {
            item.classList.toggle('active');
        }
    });
});




</script>
@endif

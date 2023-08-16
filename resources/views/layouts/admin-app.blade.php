<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="icon" type="image/jpg"  href="{{url('/img/ActivPack_logo_blackmode.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> --}}
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/Bootstrapv4.4.1.min.css') }}">
    <script src="{{ asset('js/Bootstrapv4.4.1.min.js') }}"></script>
</head>
<style>
    /* fallback */
@font-face {
  font-family: 'Material Icons Outlined';
  font-style: normal;
  font-weight: 400;
  src: url('{{ asset('font_file/gok-H7zzDkdnRel8-DQ6KAXJ69wP1tGnf4ZGhUce.woff2') }}') format('woff2');
}
.material-icons-outlined {
  font-family: 'Material Icons Outlined';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
</style>
<body>
    <div class="grid-container">
        @include('inc.admin_sidebar')
{{-- @include('admin.messages') --}}
        @yield('content')
    </div>

    <script>
        // Set a timeout to remove the fade-out class after 5 seconds
        $('div.alert').delay(3000).slideUp(1000);
    </script>

<script type="text/javascript">

// Blog
    $('#input-blog-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/blog-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-blog-search-id').html(data);

            }
        });
    });
// FAQs
    $('#input-faq-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/faq-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-faq-search-id').html(data);

            }
        });
    });

    // Product
    $('#input-prod-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/product-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-prod-search-id').html(data);

            }
        });
    });

    // Category
    $('#input-cat-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/cat-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-cat-search-id').html(data);

            }
        });
    });
    // Video
    $('#input-video-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/video-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-video-search-id').html(data);

            }
        });
    });

    // Status
    $('#input-status-search-id').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('admin/status-search-url')}}',
            data:{'search':$value},

            success:function(data)
            {
                $('#tbody-status-search-id').html(data);

            }
        });
    });
  </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>

    {{-- Summernote Script --}}
    <script>
    $(document).ready(function() {
    // $('#questions, #answers').each(function() {
        $('#answers').each(function() {
            $(this).summernote({
                tabsize: 4,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic','underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    });
    </script>
<script>
    // category script
    function updateTitleCount(input) {
        var titleCount = document.getElementById('titleCount');
        var titleHint = document.getElementById('titleHint');
        var remainingChars = 50 - input.value.length;
        titleCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 45){
        titleHint.textContent = 'Please enter a title with at least 5 characters.';
        }
        else if(remainingChars == 0){
            titleHint.textContent = 'You reach the maximum title characters.';
        }
        else{
            titleHint.textContent = ' ';
        }
    }
    function updateDescriptionCount(input) {
        var descCount = document.getElementById('descCount');
        var descHint = document.getElementById('descHint');
        var remainingChars = 500 - input.value.length;
        
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        
        if(remainingChars > 480){
            descHint.textContent = 'Please enter a description with at least 20 characters.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum description characters.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

    // product script

    function updateProductTitleCount(input) {
        var titleCount = document.getElementById('productTitleCount');
        var titleHint = document.getElementById('productTitleHint');
        var remainingChars = 30 - input.value.length;
        titleCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 27){
        titleHint.textContent = 'Please enter at least 3 characters for product title.';
        }
        else if(remainingChars == 0){
            titleHint.textContent = 'You reach the maximum characters for product title.';
        }
        else{
            titleHint.textContent = ' ';
        }
    }
    function updateProductDescriptionCount(input) {
        var descCount = document.getElementById('productDescCount');
        var descHint = document.getElementById('productDescHint');
        var remainingChars = 150 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 140){
            descHint.textContent = 'Please enter at least 10 characters for product description.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for product description.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

    // blog post script

    function updateBlogTitleCount(input) {
        var titleCount = document.getElementById('blogTitleCount');
        var titleHint = document.getElementById('blogTitleHint');
        var remainingChars = 50 - input.value.length;
        titleCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 45){
        titleHint.textContent = 'Please enter at least 5 characters for blog title.';
        }
        else if(remainingChars == 0){
            titleHint.textContent = 'You reach the maximum characters for blog title.';
        }
        else{
            titleHint.textContent = ' ';
        }
    }
    function updateBlogDescriptionCount(input) {
        var descCount = document.getElementById('blogDescCount');
        var descHint = document.getElementById('blogDescHint');
        var remainingChars = 1000 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 980){
            descHint.textContent = 'Please enter at least 20 characters for blog description.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for blog description.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

    // video blog post
    function updateVideoBlogTitleCount(input) {
        var titleCount = document.getElementById('videoBlogTitleCount');
        var titleHint = document.getElementById('videoBlogTitleHint');
        var remainingChars = 100 - input.value.length;
        titleCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 95){
        titleHint.textContent = 'Please enter at least 5 characters for vlog title.';
        }
        else if(remainingChars == 0){
            titleHint.textContent = 'You reach the maximum characters for vlog title.';
        }
        else{
            titleHint.textContent = ' ';
        }
    }
    function updateVideoBlogDescriptionCount(input) {
        var descCount = document.getElementById('videoBlogDescCount');
        var descHint = document.getElementById('videoBlogDescHint');
        var remainingChars = 2000 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 1980){
            descHint.textContent = 'Please enter at least 20 characters for vlog description.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for vlog description.';
        }
        else{
            descHint.textContent = ' ';
        }
    }
    // status blog
    function updateStatusCount(input) {
        var descCount = document.getElementById('statusCount');
        var descHint = document.getElementById('statusHint');
        var remainingChars = 2000 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 1980){
            descHint.textContent = 'Please enter at least 20 characters for status description.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for status description.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

      // FAQ
      function updateQuestionCount(input) {
        var descCount = document.getElementById('questionCount');
        var descHint = document.getElementById('questionHint');
        var remainingChars = 100 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 95){
            descHint.textContent = 'Please enter at least 5 characters for question.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for question.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

    function updateAnswerCount(input) {
        var descCount = document.getElementById('answerCount');
        var descHint = document.getElementById('answerHint');
        var remainingChars = 2000 - input.value.length;
        descCount.textContent = 'Remaining: ' + remainingChars + ' characters';
        if(remainingChars > 1980){
            descHint.textContent = 'Please enter at least 20 characters for answer.';
        }
        else if(remainingChars == 0){
            descHint.textContent = 'You reach the maximum characters for answer.';
        }
        else{
            descHint.textContent = ' ';
        }
    }

</script>

</body>

</html>

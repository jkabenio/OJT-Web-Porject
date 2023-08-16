@extends('layouts.admin-app')
@section('content')
@php
  $total = ($five_star_count + $four_star_count + $three_star_count + $two_star_count + $one_star_count);
  $average = 100 / $total;
  $oneStarPercent = number_format($average * $one_star_count, 2);
  $twoStarPercent = number_format($average * $two_star_count, 2);
  $threeStarPercent = number_format($average * $three_star_count, 2);
  $fourStarPercent = number_format($average * $four_star_count, 2);
  $fiveStarPercent = number_format($average * $five_star_count, 2);

  $total1 = ($five_star_count1 + $four_star_count1 + $three_star_count1 + $two_star_count1 + $one_star_count1);
  $average1 = 100 / $total1;
  $oneStarPercent1 = number_format($average1 * $one_star_count1, 2);
  $twoStarPercent1 = number_format($average1* $two_star_count1, 2);
  $threeStarPercent1 = number_format($average1 * $three_star_count1, 2);
  $fourStarPercent1 = number_format($average1 * $four_star_count1, 2);
  $fiveStarPercent1 = number_format($average1 * $five_star_count1, 2);

  $total2 = ($five_star_count2 + $four_star_count2 + $three_star_count2 + $two_star_count2 + $one_star_count2);
  $average2 = 100 / $total2;
  $oneStarPercent2 = number_format($average2 * $one_star_count2, 2);
  $twoStarPercent2 = number_format($average2 * $two_star_count2, 2);
  $threeStarPercent2 = number_format($average2 * $three_star_count2, 2);
  $fourStarPercent2 = number_format($average2 * $four_star_count2, 2);
  $fiveStarPercent2 = number_format($average2 * $five_star_count2, 2);
@endphp

<style>
    body {
    margin: 0;
    padding: 0;
    background-color: #1d2634;
    color: #9e9ea4;
    font-family: "Montserrat", sans-serif;
  }

  .material-icons-outlined {
    vertical-align: middle;
    line-height: 1px;
    font-size: 35px;
  }

.grid-container {
    display: grid;
    grid-template-columns: 300px 1fr 1fr 1fr;
    grid-template-rows: 0.2fr 3fr;
    grid-template-areas:
      "sidebar header header header"
      "sidebar main main main";
    height: 100vh;
  }

  /* ---------- MAIN ---------- */

.main-container {
    grid-area: main;
    overflow-y: auto;
    padding: 20px 20px;
    color: rgba(255, 255, 255, 0.95);
  }

  .main-title {
    display: flex;
    justify-content: space-between;
  }

  .main-cards {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 20px;
    margin: 20px 0;
  }

  .card {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    padding: 25px;
    border-radius: 5px;
  }

  .card:first-child {
    background-color: #2962ff;
  }
  .card:nth-child(2) {
    background-color: #ff6d00;
  }

  .card:nth-child(3) {
    background-color: #2e7d32;
  }

  .card:nth-child(4) {
    background-color: #d50000;
  }

  .card:nth-child(5) {
    background-color: #b0b304;
  }

  .card-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .card-inner > .material-icons-outlined {
    font-size: 45px;
  }

  .charts {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    margin-top: 60px;

  }

  .charts-card {
    background-color: #263043;
    margin-bottom: 20px;
    padding: 25px;
    box-sizing: border-box;
    -webkit-column-break-inside: avoid;
    border-radius: 5px;
    box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
  }

  .chart-title {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* ---------- MEDIA QUERIES ---------- */
/* Content */
#content {
    width: 100%;
    height: 100%;
    margin: 0;
    box-sizing: border-box;
}


/* Medium <= 992px */

.bar-graph {
  display: flex;
  align-items: flex-end;
  height: 200px;
  width: 400px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
  padding-top: 50px;
  margin-left: 270px;
  
}

        .bar {
            flex: 1;
            margin: 0 2px;
            border-radius: 5px;
            transition: height 0.2s;
            margin-left: 20px;
            margin-right: 20px;
        }
        /* for question 1 */
        .bar-5 {
            height: {{$fiveStarPercent}}%;
            background-color: rgb(41, 98, 255);
        }
        .bar-4 {
            height: {{$fourStarPercent}}%;
            background-color: rgb(213, 0, 0);
        }

        .bar-3 {
            height: {{$threeStarPercent}}%;
            background-color: rgb(46, 125, 50);
        }

        .bar-2 {
            height: {{$twoStarPercent}}%;
            background-color: rgb(255, 109, 0);
        }

        .bar-1 {
            background-color: rgb(88, 60, 179);
            height: {{$oneStarPercent}}%;
        }

         /* for question 2 */
         .q2bar-5 {
            height: {{$fiveStarPercent1}}%;
            background-color: rgb(41, 98, 255);
        }
        .q2bar-4 {
            height: {{$fourStarPercent1}}%;
            background-color: rgb(213, 0, 0);
        }

        .q2bar-3 {
            height: {{$threeStarPercent1}}%;
            background-color: rgb(46, 125, 50);
        }

        .q2bar-2 {
            height: {{$twoStarPercent1}}%;
            background-color: rgb(255, 109, 0);
        }

        .q2bar-1 {
            background-color: rgb(88, 60, 179);
            height: {{$oneStarPercent1}}%;
        }

         /* for question 3 */
         .q3bar-5 {
            height: {{$fiveStarPercent2}}%;
            background-color: rgb(41, 98, 255);
        }
        .q3bar-4 {
            height: {{$fourStarPercent2}}%;
            background-color: rgb(213, 0, 0);
        }

        .q3bar-3 {
            height: {{$threeStarPercent2}}%;
            background-color: rgb(46, 125, 50);
        }

        .q3bar-2 {
            height: {{$twoStarPercent2}}%;
            background-color: rgb(255, 109, 0);
        }

        .q3bar-1 {
            background-color: rgb(88, 60, 179);
            height: {{$oneStarPercent2}}%;
        }

        .label-five {
          display: flex;
          flex-direction: row;
          justify-content: center;

        }

        .label-five p {
          width: 76px;
        }

        

</style>

        <!-- Main -->

<main class="main-container" id="content">
        <div class="main-title">
            {{-- <h1>{{Auth::guard('admin')->user()->name}}</h1> --}}
        </div>
        <div class="main-cards">

            <div class="card">
                <div class="card-inner">
                    <h3>PRODUCTS</h3>
                    <span class="material-icons-outlined">inventory_2</span>
                </div>
                <h1>{{$product_count}}</h1>
            </div>

            <div class="card">
              <a style="text-decoration: none; color: white" href="{{ url('/admin/show-category') }}">
                <div class="card-inner">
                    <h3>CATEGORIES</h3>
                    <span class="material-icons-outlined">category</span>
                </div>
                <h1>{{$category_count}}</h1>
              </a>
            </div>

            <div class="card">
              <a style="text-decoration: none; color: white" href="{{ url('/admin/show-blog') }}">
                <div class="card-inner">
                    <h3>BLOGS</h3>
                    <span class="material-icons-outlined">events</span>
                </div>
                <h1>{{$total_blog_post}}</h1>
              </a>
            </div>

            <div class="card">
              <a style="text-decoration: none; color: white" href="{{ url('/admin/show-notification') }}">
                <div class="card-inner">
                    <h3>MESSAGES</h3>
                    <span class="material-icons-outlined">notification_important</span>
                </div>
                <h1>{{$notif_count}}</h1>
              </a>
            </div>
{{-- 
            <div class="card">
              <a style="text-decoration: none; color: white" href="{{ url('/admin/comment-approval') }}">
                <div class="card-inner">
                    <h3>PENDING COMMENTS</h3>
                    <span class="material-icons-outlined">pending</span>
                </div>
                <h1>{{$notif_count}}</h1>
              </a>
          </div> --}}

        </div> 

        <div class="charts">

            <div class="charts-card">
                <h2 class="chart-title">Website FeedBack Question 1</h2>
                {{-- <div id="bar-chart"></div> --}}
                <div class="label-five">
                  <p>{{$fiveStarPercent}}%</p>
                  <p>{{$fourStarPercent}}%</p>
                  <p>{{$threeStarPercent}}%</p>
                  <p>{{$twoStarPercent}}%</p>
                  <p>{{$oneStarPercent}}%</p>
                </div>
                <div class="bar-graph">
                  <div class="bar bar-5"></div>
                  <div class="bar bar-4"></div>
                  <div class="bar bar-3"></div>
                  <div class="bar bar-2"></div>
                  <div class="bar bar-1"></div>
                  
              </div>
              <div class="label-five">
                <p>5-star</p>
                <p>4-star</p>
                <p>3-star</p>
                <p>2-star</p>
                <p>1-star</p>
              </div>
            </div>

            {{-- q2 --}}
            <div class="charts-card">
              <h2 class="chart-title">Website FeedBack Question 2</h2>
              {{-- <div id="bar-chart"></div> --}}
              <div class="label-five">
                <p>{{$fiveStarPercent1}}%</p>
                <p>{{$fourStarPercent1}}%</p>
                <p>{{$threeStarPercent1}}%</p>
                <p>{{$twoStarPercent1}}%</p>
                <p>{{$oneStarPercent1}}%</p>
              </div>
              <div class="bar-graph">
                <div class="bar q2bar-5"></div>
                <div class="bar q2bar-4"></div>
                <div class="bar q2bar-3"></div>
                <div class="bar q2bar-2"></div>
                <div class="bar q2bar-1"></div>
                
            </div>
            <div class="label-five">
              <p>5-star</p>
              <p>4-star</p>
              <p>3-star</p>
              <p>2-star</p>
              <p>1-star</p>
            </div>

            {{-- <div class="charts-card">
                <h2 class="chart-title">Purchase and Sales Orders</h2>
                <div id="area-chart"></div>
            </div> --}}
        </div>

            {{-- q2 --}}
            <div class="charts-card">
              <h2 class="chart-title">Website FeedBack Question 3</h2>
              {{-- <div id="bar-chart"></div> --}}
              <div class="label-five">
                <p>{{$fiveStarPercent2}}%</p>
                <p>{{$fourStarPercent2}}%</p>
                <p>{{$threeStarPercent2}}%</p>
                <p>{{$twoStarPercent2}}%</p>
                <p>{{$oneStarPercent2}}%</p>
              </div>
              <div class="bar-graph">
                <div class="bar q3bar-5"></div>
                <div class="bar q3bar-4"></div>
                <div class="bar q3bar-3"></div>
                <div class="bar q3bar-2"></div>
                <div class="bar q3bar-1"></div>
                
            </div>
            <div class="label-five">
              <p>5-star</p>
              <p>4-star</p>
              <p>3-star</p>
              <p>2-star</p>
              <p>1-star</p>
            </div>

          </div>
        {{-- q2 --}}
        <style>
          .guest-comment{
            /* border: 1px solid white; */
            align-item: justify 
          }
          .guest-comment:nth-child(even){
            background-color: #1e252e !important;
            color: rgb(255, 255, 255) !important;
          } 
        </style>
        <div class="charts-card">
          <h2 class="chart-title">Guest User Comments</h2>
          @foreach($guest_comment as $comment_data)
          @if($comment_data->guest_comment == null)

          @else
            <p class="guest-comment">{{ date('F j, Y \a\t g:i a', strtotime($comment_data->created_at)) }}<br>{{$comment_data->guest_comment}}</p>
          @endif
          @endforeach  
        </div>
      </div>
    </div>
 
</main>

        <!-- End Main -->


@endsection

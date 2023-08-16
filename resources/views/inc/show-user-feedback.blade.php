<style>
  /* Sricky Right-Bar */
  .right-bar {
    position: fixed;
    top: 50%;
    right: 0;
    bottom: 50%;
    transform: rotate(270deg);
    /* background-color: rgba(24, 79, 0, 0.76); */
    z-index: 997;

  }
  /* FeedBack Buttton */
  .right-bar button {
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    background-color: rgba(24, 79, 0, 0.76) !important;
    border: none;
    color: white;
    padding: 5px;
  }
  /* Background Black Fade Container */
  .background-container {
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.195)!important;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    display: flex;
    justify-content: center;
    z-index: -9999;
    transition: opacity 0.10s ease-in-out;
  }

  .fade-in {
    z-index: 9999;
    opacity: 1;
  }
  /* Feedback Container */
  .feedback-container {
    position: absolute;
    bottom: 0;
    padding: 20px;
    background-color: white;
    opacity: 1;
    overflow: auto;
    height: 100%;
    overscroll-behavior: contain;
  }
  /* Header Title */
  .header-feedback-title {
    background-color: white;
    display: flex;
    flex-direction: row;
    /* justify-content: center; */
    align-items: center;
    position: relative;
  }
  /* Image Container */
  .left-section-header {
    height: 50px;
    width: 50px;
  }

  .left-section-header img{
    width: 50px;
    height: 50px;
  }
  /* Header Title Container */
  .right-section-header {
    flex: 1;
    display: flex;
    justify-content: center;
  }

  .right-section-header h3 {
    font-size: 15px;
    font-weight: bold;
  }
  /* Button Container */
  .btn-close {
    position: absolute;
    top: -5px;
    right: 0;
    color: rgb(0, 0, 0);
  }

  .btn-close a {
    font-size: 16px;
    text-decoration: none;
  }
  /* Generated Chat Bot */
  .chat-bot-container {

  }
  /* MIddle Section */
  .middle-section {
    display: flex;
    flex-direction: column;
    /* padding-left: 32px; */
  }

  .top-middle-chat,
  .middle-middle-chat,
  .chat-bottom-mid-section {
    display: flex;
    flex-direction: column;
  }

/* USername */
  .middle-username {

  }

  .middle-username h5{
    font-size: 9.1px;
  }
/* Questions */
  .one-feedback-question,
  .two-feedback-question,
  .three-feedback-question {
    opacity: 0;
    background-color: rgb(220, 220, 220);
    color: rgb(51, 51, 51);
    display: flex;
    justify-content: center;
    border-radius: 15px;
    /* width: 100%; */
    max-width: 0;
    margin: 0 !important;
    transition: opacity 1s ease-in-out, max-width 1s ease-in-out;
  }

  .one-q, .two-q, .three-q,
  .one-a, .two-a, .three-a {
    opacity: 1;
    max-width: 450px;
  }


  .one-feedback-answer,
  .two-feedback-answer,
  .three-feedback-answer {
    opacity: 1;
    display: flex;
    justify-content: left;
    transition: opacity 1s ease-in-out;
  }

  .one-a {
    opacity: 1;
  }


  .rating-button {
    background-color: #ffffff;
  }

  /* For Answer One */
  .star-one,
  .star-two,
  .star-three,
  .star-four,
  .star-five {
    margin-top: 5px;
    margin-left: 5px;
    font-size: 24px;
    color: rgb(0, 0, 0);
  }

  .star-one:hover,
  .star-two:hover,
  .star-three:hover,
  .star-four:hover,
  .star-five:hover {
    color: orange;
  }

  .star-one-active,
  .star-two-active,
  .star-three-active,
  .star-four-active,
  .star-five-active {
    color: orange;
  }

/* For Star Answer Two */

  .two-star-one,
  .two-star-two,
  .two-star-three,
  .two-star-four,
  .two-star-five {
    margin-top: 5px;
    margin-left: 5px;
    font-size: 24px;
    color: black;
  }



  .two-star-one:hover,
  .two-star-two:hover,
  .two-star-three:hover,
  .two-star-four:hover,
  .two-star-five:hover {
    color: orange;
  }



  .two-star-one-active,
  .two-star-two-active,
  .two-star-three-active,
  .two-star-four-active,
  .two-star-five-active {
    color: orange;
  }

  /* For Star Answer Three */

  .three-star-one,
  .three-star-two,
  .three-star-three,
  .three-star-four,
  .three-star-five {
    margin-top: 5px;
    margin-left: 5px;
    font-size: 24px;
    color: black;
  }

  .three-star-one:hover,
  .three-star-two:hover,
  .three-star-three:hover,
  .three-star-four:hover,
  .three-star-five:hover {
    color: orange;
  }

  .three-star-one-active,
  .three-star-two-active,
  .three-star-three-active,
  .three-star-four-active,
  .three-star-five-active {
    color: orange;
  }

  .two-feedback-question {
    margin-top: 10px;
    margin-bottom: 10px;
    display: none;
  }


  .two-feedback-answer {
    display: none;
  }

  .one-feedback-question p,
  .two-feedback-question p,
  .three-feedback-question p {
    padding: 0 15px;
    width: 100%;
  }

/* Pic icon Left section  */
.left-section-middle {
  display: flex;
  justify-content: center;
  align-items: center;
}

.left-section-middle img {
  width: 24px;
  height: 24px;
}

.right-section-middle {
  display: flex;
  flex-direction: column;

}

  .three-feedback-question {
    /* margin-left: 10px; */
    display: none;
  }

  .three-feedback-answer {
    display: none;
  }
/* Bottom Rating Star  */
  .bottom-section {
    margin-top: 2px;
    display: none;
  }

/* Footer Feedback Container*/
  .footer-feedback-container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin-top: 20px;
  }

  .left-section-footer p{
    color: rgb(123, 123, 123);
    margin-right: 5px;
  }

  .right-section-footer img {
    max-height: 50px;
    max-width: 50px;
  }

  .guest-comment{
    width: 100%;
  }
  #submit-button {
    background-color: rgb(45, 45, 255) !important;
    color: white !important;
    border: 1px solid #2b81e5 !important;
    border-radius: 5px;
    transition: background-color 0.15s, color 0.15s;
  }

  #submit-button:hover {
    background-color: #2b81e5 !important;
    color: white !important;
  }

  @media (min-width: 150px) and (max-width: 280px) {
    /* .right-bar {
      right: 5px;
    } */

    .feedback-container {
      width: 100%;
      height: 80%;
    }

    .btn-close {
      right: 5px;
    }

    .one-q, .two-q, .three-q, .guest-comment {
      max-width: 240px;
    }

    .rating-button {
      border: none;
    }

    .bottom-section {
      margin-bottom: 10px;
    }
  }

  @media (min-width: 360px) and (max-width: 540px){
    .right-bar {
      right: -5px;
    }

    .feedback-container {
      height: 80%;
    }

    .rating-button {
      border: none;
    }

    .bottom-section {
      margin-top: 10px;
      margin-bottom: 10px;
      font-size: 0.875rem;
    }
  }

  @media (max-width: 767px) {

    .rating-button {
      border: none;
    }

  }

</style>
<div class="right-bar">
  <button class="js-show-feedback">Feedback</button>
</div>
<div class="background-container">
  <div class="feedback-container">
    <div class="header-feedback-title">
      <div class="left-section-header">
        <img src="{{ asset('/img/ActivPack_logo_darkmode.png') }}" alt="">
      </div>
      <div class="right-section-header">
        <h3>Your feedback matters</h3>
      </div>
      <div class="btn-close">
        <a style="cursor: pointer" class="js-hide-feedback">&#x2716;</a>
      </div>
    </div>
    <form method="POST" action="{{ route('feedback.store') }}">
        @csrf
        <div class="chat-bot-container">
            <div class="middle-section">
                <div class="middle-username">
                    <h5>ActivPack</h5>
                </div>
                <div class="top-middle-chat">
                    <div class="one-feedback-question ">
                        <p>How would you rate your overall experience with ActivPack's website?</p>
                    </div>
                    <div class="one-feedback-answer">
                        <button type="button" class="rating-button" data-question="1" data-rating="1" onclick="veryBad();"><span class="fa fa-star star-one"></span></button>
                        <button type="button" class="rating-button" data-question="1" data-rating="2" onclick="bad();"><span class="fa fa-star star-two"></span></button>
                        <button type="button" class="rating-button" data-question="1" data-rating="3" onclick="good();"><span class="fa fa-star star-three"></span></button>
                        <button type="button" class="rating-button" data-question="1" data-rating="4" onclick="veryGood();"><span class="fa fa-star star-four"></span></button>
                        <button type="button" class="rating-button" data-question="1" data-rating="5" onclick="fantastic();"><span class="fa fa-star star-five"></span></button>

                        <input type="hidden" name="q_one" id="rating-question-1" value="">
                    </div>
                </div> 
                <div class="middle-middle-chat">
                    <div class="two-feedback-question">
                        <p>How would you rate the website's loading speed and responsiveness?</p>
                    </div>
                    <div class="two-feedback-answer">
                        <button type="button" class="rating-button" data-question="2" data-rating="1" onclick="veryBadTwo();"><span class="fa fa-star two-star-one"></span></button>
                        <button type="button" class="rating-button" data-question="2" data-rating="2" onclick="badTwo();"><span class="fa fa-star two-star-two"></span></button>
                        <button type="button" class="rating-button" data-question="2" data-rating="3" onclick="goodTwo();"><span class="fa fa-star two-star-three"></span></button>
                        <button type="button" class="rating-button" data-question="2" data-rating="4" onclick="veryGoodTwo();"><span class="fa fa-star two-star-four"></span></button>
                        <button type="button" class="rating-button" data-question="2" data-rating="5" onclick="fantasticTwo()"><span class="fa fa-star two-star-five"></span></button>

                        <input type="hidden" name="q_two" id="rating-question-2" value="">
                    </div>
                </div>
                <div class="chat-bottom-mid-section">
                  {{-- <div class="left-section-middle">
                  <img src="/img/ActivPack_logo_darkmode.png" alt="">
                  </div> --}}
                  {{-- <div class="right-section-middle"> --}}
                      <div class="three-feedback-question">
                          <p>How would you rate the checkout process in terms of ease and efficiency?</p>
                      </div>
                      <div class="three-feedback-answer">
                          <button type="button" class="rating-button" data-question="3" data-rating="1" onclick="veryBadThree();"><span class="fa fa-star three-star-one"></span></button>
                          <button type="button" class="rating-button" data-question="3" data-rating="2" onclick="badThree();"><span class="fa fa-star three-star-two"></span></button>
                          <button type="button" class="rating-button" data-question="3" data-rating="3" onclick="goodThree();"><span class="fa fa-star three-star-three"></span></button>
                          <button type="button" class="rating-button" data-question="3" data-rating="4" onclick="veryGoodThree()"><span class="fa fa-star three-star-four"></span></button>
                          <button type="button" class="rating-button" data-question="3" data-rating="5" onclick="fantasticThree()"> <span class="fa fa-star three-star-five"></span></button>
                          <input type="hidden" name="q_three" id="rating-question-3" value="">

                      </div>
                  {{-- </div> --}}
              </div>
              <div class="bottom-section">
                <textarea name="guest_comment" id=""  rows="10" class="guest-comment"  placeholder="If you have any comments or suggestions you are free to tell us."></textarea>
            </div>
            </div>



        </div>
        <button type="submit" id="submit-button" style="display: none;">Submit</button>
    </form>
    <div class="footer-feedback-container">
      <div class="left-section-footer">
        <p>Powered by</p>
      </div>
      <div class="right-section-footer">
        <img src="{{ asset('/img/ActivPack_logo_darkmode.png') }}" alt="">
      </div>
    </div>
  </div>
</div>

<script>
  const feedbackContainer = document.querySelector('.background-container');
  const btnElem = document.querySelector('.js-show-feedback');
  const btnElemTwo = document.querySelector('.js-hide-feedback');

  const veryBadQ = document.querySelector('.one-feedback-question');
  const veryBadA = document.querySelector('.two-feedback-answer');
  const veryBadQ2 = document.querySelector('.two-feedback-question');
  const veryBadA2 = document.querySelector('.two-feedback-answer');
  const veryBadQ3 = document.querySelector('.three-feedback-question');
  const veryBadA3 = document.querySelector('.three-feedback-answer');

  const topChatContainter = document.querySelector('.top-middle-chat');
  const middleChatContainter = document.querySelector('.middle-middle-chat');


  btnElem.addEventListener('click', () => {
    feedbackContainer.classList.add('fade-in');
    veryBadQ.classList.add('one-q');
    veryBadA.classList.add('one-a');
    veryBadQ2.classList.add('two-q');
    veryBadA2.classList.add('two-a');
    veryBadQ3.classList.add('three-q');
    veryBadA4.classList.add('three-a');

  });

  btnElemTwo.addEventListener('click', () => {
    feedbackContainer.classList.remove('fade-in');
  });


  // function showFeedback() {
  //   var feedbackContainer = document.querySelector('.background-container');
  //   feedbackContainer.style.display = 'flex';
  //   // document.html.style.display = 'hidden'; // Disable scrolling
  // }

  // function closeFeedback() {
  //   var feedbackContainer = document.querySelector('.background-container');
  //   feedbackContainer.style.display = 'none';
  //   // document.html.style.overflow = 'auto'; // Enable scrolling
  // }

  var starOne = document.querySelector('.star-one');
  var starTwo = document.querySelector('.star-two');
  var starThree = document.querySelector('.star-three');
  var starFour = document.querySelector('.star-four');
  var starFive = document.querySelector('.star-five');
  var twoStarOne = document.querySelector('.two-star-one');
  var twoStarTwo = document.querySelector('.two-star-two');
  var twoStarThree = document.querySelector('.two-star-three');
  var twoStarFour = document.querySelector('.two-star-four');
  var twoStarFive = document.querySelector('.two-star-five');
  var threeStarOne = document.querySelector('.three-star-one');
  var threeStarTwo = document.querySelector('.three-star-two');
  var threeStarThree = document.querySelector('.three-star-three');
  var threeStarFour = document.querySelector('.three-star-four');
  var threeStarFive = document.querySelector('.three-star-five');
  var bottomText = document.querySelector('.bottom-section');

  function veryBad() {
    if (starOne.classList.contains('star-one')) {
      starOne.classList.add('star-one-active');
      veryBadQ2.style.display = 'flex';
      veryBadA2.style.display = 'flex';

    } else {
      starOne.classList.remove('star-one-active');
    }
  }

    function bad() {

        if (starTwo.classList.contains('star-two')) {
            starTwo.classList.add('star-two-active');
            veryBadQ2.style.display = 'flex';
            veryBadA2.style.display = 'flex';
            veryBad();
        }
    }

    function good() {

        if (starThree.classList.contains('star-three')) {
            starThree.classList.add('star-three-active');
            veryBadQ2.style.display = 'flex';
            veryBadA2.style.display ='flex';
            veryBad();
            bad();
        }
    }

    function veryGood() {

        if (starFour.classList.contains('star-four')) {
            starFour.classList.add('star-four-active');
            veryBadQ2.style.display = 'flex';
            veryBadA2.style.display = 'flex';
            veryBad();
            bad();
            good();
        }
    }

    function fantastic() {

        if (starFive.classList.contains('star-five')) {
            starFive.classList.add('star-five-active');
            veryBadQ2.style.display = 'flex';
            veryBadA2.style.display = 'flex';
            veryBad();
            bad();
            good();
            veryGood();
        }
    }

    function veryBadTwo() {
        if (twoStarOne.classList.contains('two-star-one')) {
            twoStarOne.classList.add('two-star-one-active');
            veryBadQ3.style.display = 'flex';
            veryBadA3.style.display = 'flex';
        }
    }

    function badTwo() {
        if (twoStarTwo.classList.contains('two-star-two')) {
            twoStarTwo.classList.add('two-star-two-active');
            veryBadQ3.style.display = 'flex';
            veryBadA3.style.display = 'flex';
            veryBadTwo();
        }
    }

    function goodTwo() {
        if (twoStarThree.classList.contains('two-star-three')) {
            twoStarThree.classList.add('two-star-three-active');
            veryBadQ3.style.display = 'flex';
            veryBadA3.style.display = 'flex';
            veryBadTwo();
            badTwo();
        }
    }

    function veryGoodTwo() {
        if (twoStarFour.classList.contains('two-star-four')) {
            twoStarFour.classList.add('two-star-four-active');
            veryBadQ3.style.display = 'flex';
            veryBadA3.style.display = 'flex';
            veryBadTwo();
            badTwo();
            goodTwo();
        }
    }

    function fantasticTwo() {
        if (twoStarFive.classList.contains('two-star-five')) {
            twoStarFive.classList.add('two-star-five-active');
            veryBadQ3.style.display = 'flex';
            veryBadA3.style.display = 'flex';
            veryBadTwo();
            badTwo();
            goodTwo();
            veryGoodTwo();
        }
    }

    function veryBadThree() {
        if (threeStarOne.classList.contains('three-star-one')) {
            threeStarOne.classList.add('three-star-one-active');
            bottomText.style.display = 'flex';
        }
    }

    function badThree() {
        if (threeStarTwo.classList.contains('three-star-two')) {
            threeStarTwo.classList.add('three-star-two-active');
            bottomText.style.display = 'flex';
            veryBadThree();
        }
    }

    function goodThree() {
        if (threeStarThree.classList.contains('three-star-three')) {
            threeStarThree.classList.add('three-star-three-active');
            bottomText.style.display = 'flex';
            veryBadThree();
            badThree();
        }
    }

    function veryGoodThree() {
        if (threeStarFour.classList.contains('three-star-four')) {
            threeStarFour.classList.add('three-star-four-active');
            bottomText.style.display = 'flex';
            veryBadThree();
            badThree();
            goodThree();
        }
    }

    function fantasticThree() {
        if (threeStarFive.classList.contains('three-star-five')) {
            threeStarFive.classList.add('three-star-five-active');
            bottomText.style.display = 'flex';
            veryBadThree();
            badThree();
            goodThree();
            veryGoodThree();
        }
    }

</script>

<script>
    const ratingButtons = document.querySelectorAll('.rating-button');

    ratingButtons.forEach(button => {
        button.addEventListener('click', function() {
            const question = this.getAttribute('data-question');
            const rating = this.getAttribute('data-rating');
            document.getElementById('rating-question-' + question).value = rating;

            // Check if all questions have been answered before enabling the submit button
            const allQuestionsAnswered = Array.from(ratingButtons).every(button => {
                const question = button.getAttribute('data-question');
                return document.getElementById('rating-question-' + question).value !== '';
            });

            if (allQuestionsAnswered) {
                document.getElementById('submit-button').style.display = 'block';
            }
        });
    });
</script>



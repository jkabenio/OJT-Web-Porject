
 <style>
@media screen and (min-width: 768px) {
    /* FAQs CSS starts here */
    .faqs-container{
    text-align: center;
    padding-top: 10px;
    background-color: rgb(255, 255, 255);
    border-top: 2px solid rgb(37,59,47) !important;
    }
    .faqs-header{
    background-color: rgb(250, 250, 250) !important;
    width: 40%;
    margin-left: 30%;
    border-radius: 50px;
    margin-bottom: 20px;
    color: rgba(0, 0, 0, 0.863);
    box-shadow: 1px 1px 5px 5px rgba(145, 145, 145, 0.411);
    font-size: 25px;
    }
    .faqs-body{
    padding: 20px;
    background-color: rgb(255, 255, 255);
    overflow-y: scroll;
    height: 300px;

    }
    .faqs-body:after {
    content: "";
    display: table;
    clear: both;
    }
    .faq-answer {
    display: none;
    }

    .plus-sign {
    float: right;
    }

    .faq-question {
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    border: none;
    padding: 10px;
    width: 100%;
    text-align: left; 
    cursor: pointer;
    background-color: rgb(236, 236, 236);
    color: rgba(0, 0, 0, 0.863);
    padding-left: 4%;
    border: 1px solid rgba(56, 55, 55, 0.192);
    margin: 10px 0px 0px !important;
    }

    .faq{
    width: 49%;
    float: left;
    background-color: white;
    margin-left: 0.5%;
    }
    .faq-question:hover {
    
    }

    .faq.active .faq-answer {
    display: block;
    color: rgba(0, 0, 0, 0.884);
    background-color: rgb(255, 255, 255);
    text-align: justify;
    padding-left: 25px;
    padding-right: 30px;
    }
}











@media screen and (max-width: 768px) {
    /* FAQs CSS starts here */
    .faqs-container{
    text-align: center;
    padding-top: 1rem;
    background-color: rgb(255, 255, 255);
    border-top: 2px solid rgb(37,59,47) !important;
    }
    .faqs-header{
    background-color: rgb(250, 250, 250) !important;
    width: 100%;
    border-radius: 50px;
    margin-bottom: 20px;
    color: rgba(0, 0, 0, 0.863);
    box-shadow: 1px 1px 5px 5px rgba(145, 145, 145, 0.411);
    font-size: 1rem;
    }
    .faqs-header-sub{
    font-size: 0.875rem;
    margin-bottom:5px;
    }
    .faqs-body{
    padding: 20px;
    background-color: rgb(255, 255, 255);
    overflow-y: scroll;
    height: 300px;

    }
    .faqs-body:after {
    content: "";
    display: table;
    clear: both;
    }
    .faq-answer {
    display: none;
    }

    .plus-sign {
    float: right;
    }

    .faq-question {
    font-size: 0.875rem;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    border: none;
    padding: 10px;
    width: 100%;
    text-align: left; 
    cursor: pointer;
    background-color: rgb(236, 236, 236);
    color: rgba(0, 0, 0, 0.863);
    padding-left: 4%;
    border: 1px solid rgba(56, 55, 55, 0.192);
    margin: 10px 0px 0px !important;
    }

    .faq{
    width: 100%;
    float: left;
    background-color: white;
    }

    .faq.active .faq-answer {
    display: block;
    color: rgba(0, 0, 0, 0.884);
    background-color: rgb(255, 255, 255);
    text-align: justify;
    padding-left: 2rem;
    padding-right: 2rem;
    font-size: 0.875rem;
    }
}
</style>




<script>
    document.addEventListener("DOMContentLoaded", () => {
      const faqs = document.querySelectorAll('.faq');
      faqs.forEach(faq => {
        const question = faq.querySelector('.faq-question');
        const answer = faq.querySelector('.faq-answer');
  
        question.addEventListener('click', () => {
          faq.classList.toggle('active');
        });
      });
    });
  </script>
    <div id="faqs-id" class="faqs-container">
      <h1 class="faqs-header"><b>Frequently Asked Questions (FAQs)</b></h1>
      <p class="faqs-header-sub">We want to make sure we address any concerns you might have. <br>take a look at our FAQ section below for some helpful information.</p>
      <div  class="faqs-body">
        @foreach  ($faq_data as $faq_list)
          <div class="faq">
            <button class="faq-question">{{$faq_list->questions}}<span class="plus-sign">+</span></button>
            <div class="faq-answer"><li>{{$faq_list->answers}}</li></div>
          </div>
        @endforeach
   
        {{-- <div class="faq">
          <button class="faq-question">How does ActivPack work?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack uses a proprietary blend of plant-based materials that have moisture-absorbing and oxygen-blocking properties. These properties help to extend the shelf life of packaged products.</li></div>
        </div>
  
        <div class="faq">
          <button class="faq-question">What are the benefits of using ActivPack?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>The benefits of using ActivPack include extended shelf life, reduced food waste, increased product safety, and environmental sustainability.</li></div>
        </div>
  
        <div class="faq">
          <button class="faq-question">What kind of products can be packaged with ActivPack?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack can be used to package a wide range of products including food, pharmaceuticals, cosmetics, and other consumer goods.</li></div>
        </div>
  
        <div class="faq">
          <button class="faq-question">Is ActivPack safe for food packaging?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>Yes, ActivPack is safe for food packaging. It is made from plant-based materials that are non-toxic and free from harmful chemicals.</li></div>
        </div>
  
        <div class="faq">
          <button class="faq-question">What is the shelf life of products packaged with ActivPack?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>The shelf life of products packaged with ActivPack varies depending on the product and the storage conditions. However, ActivPack has been shown to extend the shelf life of products by up to 50%.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">Can ActivPack be recycled?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>Yes, ActivPack can be recycled. It is made from plant-based materials that are biodegradable and compostable.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">Is ActivPack biodegradable?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>Yes, ActivPack is biodegradable. It is made from plant-based materials that can break down naturally in the environment.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">How long does it take for ActivPack to decompose?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack can take anywhere from a few weeks to a few months to decompose, depending on the environmental conditions.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">How is ActivPack different from other packaging materials?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack is different from other packaging materials because it is made from plant-based materials that are eco-friendly and biodegradable. It also has unique moisture-absorbing and oxygen-blocking properties that help to extend the shelf life of products.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">Is ActivPack more expensive than other packaging materials?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack may be slightly more expensive than some traditional packaging materials, but it is competitively priced compared to other eco-friendly packaging solutions.</li></div>
        </div>
        <div class="faq">
          <button class="faq-question">Where can I purchase ActivPack?<span class="plus-sign">+</span></button>
          <div class="faq-answer"><li>ActivPack can be purchased from a variety of suppliers and distributors. A quick internet search will provide a list of options for purchasing ActivPack.</li></div>
        </div> --}}
      </div>
    </div>
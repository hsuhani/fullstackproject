<div class="lonyo-section-padding4">
    <div class="container">
      @php
            $title = App\Models\Title::find(1);
        @endphp
      <div class="lonyo-section-title center">
        <h2 id="answer-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" 
                data-id="{{ $title->id }}">
                {{ $title->answer}}
            </h2>
      </div>
      <div class="lonyo-faq-shape"></div>
      <div class="lonyo-faq-wrap1">
      
      
      

          <div class="lonyo-faq-item" data-aos="fade-up" data-aos-duration="900">
              <div class="lonyo-faq-header">
                  <h4>Is my financial data safe and secure?</h4>
                  <div class="lonyo-active-icon">
                                    <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                                    <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                                </div>
              </div>
              <div class="lonyo-faq-body">
                  <p>
                      <p>heyyyyy</p>
                  </p>
                  
              </div>
          </div>
          
          
    
         
      </div>
      <div class="faq-btn aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
        <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
      </div>
    </div>
  </div>
 
</div>

<!-- CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
document.addEventListener("DOMContentLoaded", function() {

    const titleElement = document.getElementById("answer-title");

    function saveChanges(element) {
        let answerId = element.dataset.id;   
        let field = element.id === "answer-title" ? "answer" : "";
        let newValue = element.innerText.trim();

        fetch(`/edit-answer/${answerId}`, {    
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ [field]: newValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(`${field} updated successfully`);
            }
        })
        .catch(error => console.error("Error:", error));
    }

    // auto save on Enter
    document.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            saveChanges(e.target);
        }
    });

    // auto save on blur
    titleElement.addEventListener("blur", function() {
        saveChanges(titleElement);
    });

});
</script>

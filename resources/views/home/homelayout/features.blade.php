<div class="lonyo-section-padding2 position-relative">
    <div class="container">
        @php
            $title = App\Models\Title::find(1);
        @endphp

        <div class="lonyo-section-title center">
            <h2 id="features-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" 
                data-id="{{ $title->id }}">
                {{ $title->features }}
            </h2>
        </div>
        @php
        $feature=App\Models\Feature::latest()-> limit(5)->get();
        @endphp

<div class="row">
    @foreach($feature as $item)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="lonyo-service-wrap light-bg aos-init aos-animate" 
                 data-aos="fade-up" data-aos-duration="500">
                 
                <div class="lonyo-service-title">
                    <h4>{{ $item->title }}</h4>
                    <img src="{{ asset('frontend/assets/images/v1/' . $item->icon . '.svg') }}" alt="">
                </div>

                <div class="lonyo-service-data">
                    <p>{{ $item->description }}</p>
                    
                </div>

            </div>
        </div>
    @endforeach
</div>

            <!-- Repeat other feature blocks here -->
        </div>
    </div>
    <div class="lonyo-feature-shape"></div>
</div>

<!-- CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
document.addEventListener("DOMContentLoaded", function() {
    const featureElement = document.getElementById("features-title");

    function saveChanges(element) {
        let featuresId = element.dataset.id;
        let newValue = element.innerText.trim();

        // send only if not empty
        if (!newValue) return;

        fetch(`/edit-features/${featuresId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ features: newValue })
        })
        .then(response => {
            if (!response.ok) throw new Error("Server error: " + response.status);
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log("Features updated successfully");
            } else {
                console.error("Update failed", data);
            }
        })
        .catch(error => console.error("Error:", error));
    }

    // auto save on Enter
    featureElement.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); // prevent new line
            saveChanges(featureElement);
            featureElement.blur(); // remove focus after saving
        }
    });

    // auto save on blur
    featureElement.addEventListener("blur", function() {
        saveChanges(featureElement);
    });
});
</script>
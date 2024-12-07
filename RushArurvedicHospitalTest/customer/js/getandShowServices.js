function fetchAllServicesTocart() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/services/getAllServices",
        success: function (data) {
            // Clear existing cart elements
            $('#registeredServicesTocart').empty();
            // Populate cart elements with service data
            data.forEach(function (service, index) {
                // Call the downloadServiceImage function to get service image
                downloadServiceImage(service.serviceId, index);

                $('#registeredServicesTocart').append(`


                    <div class="col-3 " style="margin-top:20px;">
                    <!-- card starts here -->
                        <div class="card shadow">
                        <img src="" alt="" class="card-img-top " id="serviceImage_${index}">
                        <div class="card-body">
                            <h3 class="text-center">${service.title}</h3>
                            <hr class="mx-auto w-75">
                            <p>${service.description} </p>
                        </div>
                        </div>
                    <!-- card ends here -->
                    </div>
                    
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching service:", error);
        }
    });
}

fetchAllServicesTocart();

// Funtion to download customer images for registered customers table
function downloadServiceImage(serviceId, index){
    console.log(serviceId);
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8080/api/v1/services/download?serviceId=' + serviceId, // Change the URL to match your backend endpoint
      xhrFields: {
          responseType: 'blob'
      },
      success: function (response) {
        var imageUrl = URL.createObjectURL(response);
        $('#serviceImage_' + index).attr('src', imageUrl);
      },
      error: function (xhr, status, error) {
          console.error(xhr.responseText);
          
      }
  });     
  }
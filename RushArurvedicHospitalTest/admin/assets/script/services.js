$(document).ready(function(){
    // Handle Add button click
    $('#btnAddService').click(function(){
        // Get form values
        var serviceId = $('#serviceId').val();
        var title = $('#title').val();
        var description = $('#description').val();
       
        $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/services/save",
        async: true,
        data: JSON.stringify({
            "serviceId": serviceId,
            "title": title,
            "description": description   
        }),
        success: function (data) {
            servicePictureSave(serviceId);
            console.log(data); // Log the response from the server
            fetchAllServices();
            // Handle the response as needed, e.g., show a success message
            alert("Service saved successfully!");
           
        },
        error: function (error) {
            console.error("Error saving service:", error);
            // Handle the error, show an error message, etc.
            alert("Error saving service. Please try again.");
        }
      });
    });

    $(document).ready(function() {
        // Attach click event handler to the Clear button
        $('#btnClearService').click(function() {
            // Clear the input values
            $('#serviceId').val('');
            $('#title').val('');
            $('#serviceImage').val('');
            $('#description').val('');
            
            // If you want to reset the file input, you can do this
            // $('#serviceImage').val('');
        });
    });
});

//service photo save function
function servicePictureSave(serviceId){
    var formData = new FormData();
    formData.append('image', $('#serviceImage')[0].files[0]);
    formData.append('serviceId',serviceId); // Add serviceId to formData

    $.ajax({
        type: 'POST',
        url: 'http://localhost:8080/api/v1/services/uploadImage', // Change the URL to match your backend endpoint
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log("picture uploaded");
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
  }

   // Function to fetch and display all services
   function fetchAllServices() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/services/getAllServices",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with staff data
            data.forEach(function (service, index) {
                // Call the downloadStaffImage function to get staff picture
                  downloadServiceImage(service.serviceId,index);

                $('#registeredServices').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td><img src="" id="serviceImage_${index}" width="40" height="40" style="border-radius: 50%;" alt="Servive Image"></td>
                        <td>${service.serviceId}</td>
                        <td>${service.title}</td>
                        <td>${service.description}</td>
                        <td>
                            <a href="#" class="delete-service">
                                <i class="bx bx-trash text-danger fs-4"></i>
                            </a>
                            <a href="#" class="update-service">
                                <i class="bx bx-edit text-primary fs-4"></i>
                            </a>
                        </td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching service:", error);
        }
    });
  }

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

  // Function to delete a service
  function deleteService(serviceId) {
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/services/delete?serviceId=" + serviceId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllServices(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting service:", error);
            // Handle error scenario
        }
    });
  }

   // Event listener for delete icon click
$(document).on('click', '.delete-service', function() {
    var serviceId = $(this).closest('tr').find('td:eq(1)').text(); // Extract serviceId from the row
    console.log(serviceId);
    if (confirm("Are you sure you want to delete this service?")) {
        deleteService(serviceId); // Call deleteService() function with the extracted email
    }
  });

   // Function to handle click on update-service link
$(document).on('click', '.update-service', function() {
    // Get the service data from the row
    var row = $(this).closest('tr');
    var serviceId = row.find('td:nth-child(3)').text(); // Assuming serviceId is in the second column
    console.log(serviceId);
    // Populate the modal with existing service data
    $('#updateServiceTitle').val(row.find('td:nth-child(4)').text()); // Assuming title is in the fourth column
    // Populate other fields as needed
    $('#updateServiceDescription').val(row.find('td:nth-child(5)').text());
    // Store the ServiceId in a hidden field
    $('#serviceIdToUpdate').val(serviceId);
  
    // Show the modal
    $('#updateServiceModal').modal('show');
  });

  // Function to handle update service button click
function updateService() {
    // Get updated service data from the form
    var updatedTitle = $('#updateServiceTitle').val();
    var updateDescription = $('#updateServiceDescription').val();
    // Get serviceId
    var serviceId = $('#serviceIdToUpdate').val();
  
    // Perform AJAX request to update service data
    $.ajax({
      method: "PUT", // Use PUT method as defined in your backend controller
      url: "http://localhost:8080/api/v1/services/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        serviceId: serviceId,
        title: updatedTitle,
        description: updateDescription
        // Include other fields to update as needed
      }),
      success: function(response) {
        // Handle success response
        // Close the modal
        $('#updateServiceModal').modal('hide');
        // Optionally, refresh the table or display a success message
        alert("service Update Successfully");
        fetchAllServices(); // Refresh table
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating service:", error);
        alert("error");
      }
    });
  }

//.........................................................................................................................................

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

                <div class="col-4" >
                  <article class="blog-post" >
                  <img src="" id="serviceImage_${index}" width="395px" hight="100px">
                      <a href="#" class="tag" >Web Design</a>
                      <div class="content" style="padding: 32px;" >
                          <small style="text-transform: uppercase;color:#3bb3a9;text-decoration: underline;">${service.serviceId}</small>
                          <h5 >${service.title}</h5>
                          <p>${service.description}</p>
                      </div>
                  </article>
                </div>
                    
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching service:", error);
        }
    });
}

  

  

  
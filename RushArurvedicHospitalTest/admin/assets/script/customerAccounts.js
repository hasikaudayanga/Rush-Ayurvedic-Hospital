$(document).ready(function(){
    // Handle Add button click
    $('#btnAdd').click(function(){
        // Get form values
        var customerEmail = $('#customerEmail').val();
        var password = $('#password').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var address = $('#address').val();
        var contactNumber = $('#contactNumber').val();
        var registrationDate = $('#registrationDate').val();
        var activeStatus = true;
       
      if(password == "" || firstName=="" || lastName=="" || address=="" || contactNumber=="" || registrationDate==""){
          alert("Please Fill All Inputs");
      }else{
        $.ajax({
          method: "POST",
          contentType: "application/json",
          url: "http://localhost:8080/api/v1/customer/save",
          async: true,
          data: JSON.stringify({
              "customerEmail": customerEmail,
              "password": password,
              "firstName": firstName,
              "lastName": lastName,
              "address" : address,
              "contactNumber": contactNumber,
              "registrationDate" : registrationDate,
              "activeStatus" :activeStatus
              
          }),
          success: function (data) {
              customerPictureSave(customerEmail);
              console.log(data); // Log the response from the server
              fetchAllCustomers(); // to update registered customers table when adding new customer
              // Handle the response as needed, e.g., show a success message
              alert("Customer saved successfully!");
          },
          error: function (error) {
              console.error("Error saving customer:", error);
              // Handle the error, show an error message, etc.
              alert("Error saving customer. Please try again.");
          }
        });
      }
        
    });

    // Handle Clear button click
    $('#btnClear').click(function(){
        // Clear all form fields
        $('form')[0].reset();
    });
});

//customer profile photo save function
  function customerPictureSave(customerEmail){
    var formData = new FormData();
    formData.append('image', $('#customerImage')[0].files[0]);
    formData.append('customerEmail',customerEmail); // Add customer email to formData

    $.ajax({
        type: 'POST',
        url: 'http://localhost:8080/api/v1/customer/uploadImage', // Change the URL to match your backend endpoint
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

  // Function to fetch and display all customers
  function fetchAllCustomers() {
      $.ajax({
          method: "GET",
          url: "http://localhost:8080/api/v1/customer/getAllCustomers",
          success: function (data) {
              // Clear existing table rows
              $('#selectedBookEntryGrid tbody').empty();
              // Populate table with customer data
              data.forEach(function (customer, index) {
                  // Call the downloadCustomerImage function to get customer picture
                    downloadCustomerImage(customer.customerEmail,index);

                    const obscuredPassword = '*'.repeat(customer.password.length);
                  $('#registeredCustomers').append(`
                      <tr>
                          <th scope="row">${index + 1}</th>
                          <td><img src="" id="customerImage_${index}" width="40" height="40" style="border-radius: 50%;" alt="Customer Image"></td>
                          <td>${customer.customerEmail}</td>
                          <td>${obscuredPassword}</td>
                          <td>${customer.firstName}</td>
                          <td>${customer.lastName}</td>
                          <td>${customer.address}</td>
                          <td>${customer.contactNumber}</td>
                          <td>${customer.registrationDate}</td>
                          <td>${customer.activeStatus}</td>
                          <td>
                              <a href="#" class="delete-customer">
                                  <i class="bx bx-trash text-danger fs-4"></i>
                              </a>
                              <a href="#" class="update-customer">
                                  <i class="bx bx-edit text-primary fs-4"></i>
                              </a>
                          </td>
                      </tr>
                  `);
              });
          },
          error: function (error) {
              console.error("Error fetching customers:", error);
          }
      });
    }

    // Funtion to download customer images for registered customers table
    function downloadCustomerImage(customerEmail, index){
      $.ajax({
        type: 'GET',
        url: 'http://localhost:8080/api/v1/customer/download?customerEmail=' + customerEmail, // Change the URL to match your backend endpoint
        xhrFields: {
            responseType: 'blob'
        },
        success: function (response) {
          var imageUrl = URL.createObjectURL(response);
          $('#customerImage_' + index).attr('src', imageUrl);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            
        }
    });     
    }

    // Function to delete a customer
    function deleteCustomer(customerEmail) {
      console.log(customerEmail);
      $.ajax({
          method: "DELETE",
          url: "http://localhost:8080/api/v1/customer/delete?customerEmail=" + customerEmail,
          success: function (response) {
              console.log(response); // Log the response for debugging
              fetchAllCustomers(); // Refresh the table after successful deletion
          },
          error: function (error) {
              console.error("Error deleting customer:", error);
              alert("Error deleting customer");
              // Handle error scenario
          }
      });
    }

// Event listener for delete icon click
$(document).on('click', '.delete-customer', function() {
  var customerEmail = $(this).closest('tr').find('td:eq(1)').text(); // Extract customer email from the row
  
  if (confirm("Are you sure you want to delete this customer?")) {
      deleteCustomer(customerEmail); // Call deleteCustomer function with the extracted email
  }
});



// Function to handle click on update-customer link
$(document).on('click', '.update-customer', function() {
  // Get the customer data from the row
  var row = $(this).closest('tr');
  var customerEmail = row.find('td:nth-child(3)').text(); // Assuming customer email is in the second column
  console.log(customerEmail);
  // Populate the modal with existing customer data
  $('#updateFirstName').val(row.find('td:nth-child(5)').text()); // Assuming first name is in the fourth column
  // Populate other fields as needed
  $('#updateLastName').val(row.find('td:nth-child(6)').text());
  $('#updateAddress').val(row.find('td:nth-child(7)').text());
  $('#updateContactNumber').val(row.find('td:nth-child(8)').text());
  // Store the customer email in a hidden field
  $('#customerEmailToUpdate').val(customerEmail);

  // Show the modal
  $('#updateCustomerModal').modal('show');
});

// Function to handle update customer button click
function updateCustomer() {
  // Get updated customer data from the form
  var updatedFirstName = $('#updateFirstName').val();
  var updateLastName = $('#updateLastName').val();
  var updateAddress = $('#updateAddress').val();
  var updateContactNumber = $('#updateContactNumber').val();
  // Get customer email
  var customerEmail = $('#customerEmailToUpdate').val();

  // Perform AJAX request to update customer data
  $.ajax({
    method: "PUT", // Use PUT method as defined in your backend controller
    url: "http://localhost:8080/api/v1/customer/update", // Update URL to match your backend endpoint
    contentType: "application/json", // Set content type to JSON
    data: JSON.stringify({
      customerEmail: customerEmail,
      firstName: updatedFirstName,
      lastName: updateLastName,
      address: updateAddress,
      contactNumber: updateContactNumber
      // Include other fields to update as needed
    }),
    success: function(response) {
      // Handle success response
      // Close the modal
      $('#updateCustomerModal').modal('hide');
      // Optionally, refresh the table or display a success message
      alert("customer Update Successfully");
      fetchAllCustomers(); // Refresh table
    },
    error: function(error) {
      // Handle error response
      console.error("Error updating customer:", error);
      alert("error");
    }
  });
}

//jQuery to close the modal
$(document).ready(function() {
    $('#closeModalBtn').click(function() {
      $('#updateCustomerModal').modal('hide'); // Hide the modal
    });
  });


  //jQuery script for filtering
  $(document).ready(function() {
    $("#emailInputRegisterCustomer").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(3)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});
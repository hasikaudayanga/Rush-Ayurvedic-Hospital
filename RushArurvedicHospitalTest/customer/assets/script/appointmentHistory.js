// Function to fetch and display report
function fetchCustomerReport() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    console.log(customerEmail);
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/report/get-report-by-customer-email?customerEmail=" + customerEmail,
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with report data
            data.forEach(function (report, index) {
               
                $('#customerReport').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${report.reportId}</td>
                        <td>${report.customersEmail}</td>
                        <td>${report.customerName}</td>
                        <td>${report.customerNumber}</td>
                        <td>${report.customerAddress}</td>
                        <td>${report.vehicleNumber}</td>
                        <td>${report.carBrand}</td>
                        <td>${report.carModel}</td>
                        <td>${report.serviceCategory}</td>
                        <td>${report.serviceDate}</td>
                        <td>${report.requisitionDate}</td>
                        <td>${report.supervisorName}</td>
                        <td>${report.helpersCount}</td>
                        <td>${report.startTime}</td>
                        <td>${report.completeTime}</td>
                        <td>${report.remarks}</td>
                        <td>${report.fixedCharge}</td>
                        <td>${report.additionalCharge}</td>
                        <td>${report.totalCharge}</td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching report:", error);
        }
    });
  }
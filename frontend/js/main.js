(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });
 
    // Fetch inventory items 
 $(document).ready(async function () {
    try {
        const response = await fetch('http://localhost/backend/inventory/fetch_inventory.php');
        const data = await response.json();

        // Loop inventory and display on table
        const tableBody = $('tbody');  // Using jQuery to select the table body
        tableBody.html('');  // Clear existing content
        data.forEach(item => {
            const row = `
                <tr>
                    <th scope="row">${item.product_name}</th>
                    <td>${item.available}</td>
                    <td>${item.total}</td>
                    <td>
                        <i class="bi bi-eye-fill me-2"></i>
                        <i class="bi bi-pencil-fill me-2" onclick="editItem(${item.id})"></i>
                        <i class="bi bi-trash-fill" onclick="deleteItem(${item.id})"></i>
                    </td>
                </tr>
            `;
            tableBody.append(row);  // Append new row to the table body
        });
    } catch (error) {
        console.error('Error fetching inventory:', error);
    }
});

// add inventory items
(function ($) {
    "use strict";

    
    $(document).ready(function () {
        
        // Form submission handling for adding new inventory items
        $('#addInventoryForm').on('submit', async function (e) {
            e.preventDefault();  

            const formData = new FormData(this);  // Collect form data
            try {
                const response = await fetch('http://localhost/backend/inventory/add_inventory.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                alert(result.message);  // Show success or error message

                
            } catch (error) {
                console.error('Error adding inventory:', error);
            }
        });
    });

})(jQuery);

})(jQuery);


<?php 
    session_start();
    $name =  $_SESSION["firstName"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/viewInvoices.css">
    <link rel="stylesheet" href="./css/save.scss">
</head>
<body>
    <section class="et-hero-tabs" >
        <h1>View Invoices</h1>
        <h3>You can View the cancelled invoices below, <?php echo $name; ?></h3>
        <div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="save.php" style="text-decoration: none;">HOME</a>
        <a class="et-hero-tab" href="#cancelled" style="text-decoration: none;">VIEW INVOICES</a>
        <a class="et-hero-tab" href="#" style="text-decoration: none;">lOGOUT</a>
        <span class="et-hero-tab-slider" style="text-decoration: none;"></span>
        </div>
    </section>
    <div id="cancelled">
        <h1 class="cancel-heading">Cancelled Invoices</h1>
        <div class="container" id="invoiceContainer"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetchInvoices();
        });

        function fetchInvoices() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "fetchInvoices.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const invoices = JSON.parse(xhr.responseText);
                    let output = '';

                    invoices.forEach(invoice => {
                        output += `
                            <div class="card mb-3" style="width: 18rem;">
                                <img src="./img/documentPicture.png" class="card-img-top" alt="Invoice Image">
                                <div class="card-body">
                                    <h5 class="card-title">Invoice #${invoice.invoiceNoCancelled}</h5>
                                    <p class="card-text">Client: ${invoice.client}</p>
                                    <p class="card-text">Amount: ${invoice.totalAmount}</p>
                                    <a href="./img/${invoice.invoiceImg}" class="btn btn-primary" download>Download Invoice</a>
                                </div>
                            </div>
                        `;
                    });

                    document.getElementById('invoiceContainer').innerHTML = output;
                }
            }
            xhr.send();
        }
    </script>
</body>
</html>
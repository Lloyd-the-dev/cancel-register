<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        />
        <!-- Google Fonts Roboto -->
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
        <!-- MDB -->
        <link rel="stylesheet" href="css/mdb.min.css" />
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body style="background-color: #a0d2eb;">

       
        <h1 class="main-heading">The Cancelooor</h1>

       


        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="./img/confused lady.png"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form action="login.php" method="POST">

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fa fa-bolt fa-2x me-3" aria-hidden="true" style="color: #a0d2eb;"></i>
                                    <span class="h1 fw-bold mb-0">LOGIN</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="form2Example17">Email address</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="form2Example27">Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" name="button">Login</button>
                                </div>

                            </form>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

       
        <script type="text/javascript" src="js/mdb.umd.min.js"></script>
 
    </body>
</html>
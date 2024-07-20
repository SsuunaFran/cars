<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Safe Parking - Signup</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="" type="image/x-icon" />

    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-4">
                    <img src="assets/img/parking-car.png" class="img-fluid opacity-25 w-75" alt="logo">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1">
                    <form action="controllers/signup-controller.php" method="POST">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">SIGNUP</p>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-1 mb-0">With</p>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example1">Username</label>
                            <input type="text" id="form3Example1" name="username" class="form-control form-control-lg" placeholder="Enter your username" required />
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example2">Email address</label>
                            <input type="email" id="form3Example2" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address (optional)" />
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Password</label>
                            <input type="password" id="form3Example3" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example4">Verify Password</label>
                            <input type="password" id="form3Example4" name="verify_password" class="form-control form-control-lg" placeholder="Verify password" required />
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example5">Contact details</label>
                            <input type="text" id="form3Example5" name="contact" class="form-control form-control-lg" placeholder="Enter your contact details" required />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example6" />
                                <label class="form-check-label" for="form2Example6">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-2">
                            <button type="submit" class="btn btn-primary btn-sm w-50" style="padding-left: 2.5rem; padding-right: 2.5rem;">Signup</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login" class="link-danger">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-light">
            <div class="text-black mb-3 mb-md-0">
                Nugsoft Technologies © 2024. All rights reserved.
            </div>
        </div>
    </section>
</body>

</html>
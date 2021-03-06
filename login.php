<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
        >
        <title>Login</title>
    </head>

    <body>
        <section class="vh-100" style="background-color: #9A616D;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img
                                        src="img/logo2.jpeg"
                                        alt="login form"
                                        class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                                    />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="includes/login.inc.php" method="post">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Daylist</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingrese a su cuenta</h5>

                                            <div class="form-outline mb-4">
                                                <input type="text" name="name" id="form2Example17" class="form-control form-control-lg" />
                                                <label class="form-label" for="form2Example17">Nombre de Usuario</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" name="pwd" id="form2Example27" class="form-control form-control-lg" />
                                                <label class="form-label" for="form2Example27">Contrase??a</label>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Login</button>
                                            </div>

                                            <?php
                                                if (isset($_GET["error"])) {
                                                    if ($_GET["error"] == "emptyInput") {
                                                        echo 
                                                        "<div class='alert alert-danger' role='alert'>
                                                        Ingrese datos!
                                                        </div>";
                                                    }
                                                    else if ($_GET["error"] == "wrongLogin") {
                                                        echo 
                                                        "<div class='alert alert-danger' role='alert'>
                                                        Datos incorrectos!
                                                        </div>";
                                                    }
                                                    else if ($_GET["error"] == "wrongPwd") {
                                                        echo 
                                                        "<div class='alert alert-danger' role='alert'>
                                                        Contrase??a incorrecta!
                                                        </div>";
                                                    }
                                                }
                                            ?>

                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">No tiene una cuenta? <a href="signup.php" style="color: #393f81;">Registrese aqui</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
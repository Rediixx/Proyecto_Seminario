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
        <title>Register</title>
    </head>

    <body>
        <section class="vh-100" style="background-color: #9A616D;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>

                                        <form class="mx-1 mx-md-4" action="includes/signup.inc.php" method="post">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" name="name" id="form3Example1c" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">Su Nombre</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" name="username" id="form3Example1c" class="form-control" />
                                                    <label class="form-label" for="form3Example1c">Su Nombre de Usuario</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" name="email" id="form3Example3c" class="form-control" />
                                                    <label class="form-label" for="form3Example3c">Su Correo</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" name="pwd" id="form3Example4c" class="form-control" />
                                                    <label class="form-label" for="form3Example4c">Su Contraseña</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" name="pwdrepeat" id="form3Example4cd" class="form-control" />
                                                    <label class="form-label" for="form3Example4cd">Repita su Contraseña</label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Registrarse</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="img/register2.png" class="img-fluid" alt="Sample image">
                                    </div>
                                </div>
                                <?php
                                    if (isset($_GET["error"])) {
                                        if ($_GET["error"] == "emptyInput") {
                                            echo "<div class='alert alert-danger d-flex justify-content-center mb-5' role='alert'>
                                            Ingrese datos!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "invalidUsername") {
                                            echo "<div class='alert alert-danger' role='alert'>
                                            Ingrese un nombre de usuario valido!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "invalidEmail") {
                                            echo "<div class='alert alert-danger' role='alert'>
                                            Ingrese un email valido!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "pwdDontMatch") {
                                            echo "<div class='alert alert-danger' role='alert'>
                                            Las contraseñas no son iguales!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "usernameTaken") {
                                            echo "<div class='alert alert-danger' role='alert'>
                                            El nombre de usuario ya existe!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "stmtfailed") {
                                            echo "<div class='alert alert-danger' role='alert'>
                                            Algo salio mal!
                                            </div>";
                                        }
                                        else if ($_GET["error"] == "none") {
                                            echo "<div class='alert alert-success' role='alert'>
                                            Estas registrado!
                                            </div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
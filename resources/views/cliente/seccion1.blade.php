<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion 1</title>
    <!-- Agrega los estilos de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <a class="nav-link active" href="home">
            <h1>Centro de Evaluación ECM</h1>
    </div>
    </a>

    <div class="container-fluid">
        <div class="row">

            <!-- Barra lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">

                    <div class="nombre-pagina">
                        <ion-icon id="cloud" name="cloud-outline"></ion-icon>
                        <span>Curso</span>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="seccion1">
                                Sección 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion2">
                                Sección 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion3">
                                Sección 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion4">
                                Sección 4
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion5">
                                Sección 5
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion6">
                                Sección 6
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion7">
                                Sección 7
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion8">
                                Sección 8
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seccion9">
                                Sección 9
                            </a>
                        </li>
                    </ul>

                </div>

                <!-- Contenido Cierre de Sesión -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Contenido de la página -->
                <h1>Sección número 1 Información General</h1>
                <!-- Parte 1 -->
                <!-- titulo -->
                <h2>Nombre del curso/Sesión:</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Nombre del curso/Sesión:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

                <br>
                <!-- Parte 2 -->
                <!-- titulo -->
                <h2>Nombre del Diseñador:</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Nombre del Diseñador:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

                <br>
                <!-- Parte 3 -->
                <!-- titulo -->
                <h2>Nombre del Facilitador/ Instructor/capacitador/formador:</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Nombre del Facilitador/ Instructor/capacitador/formador:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

                <br>
                <!-- Parte 4 -->
                <!-- titulo -->
                <h2>Lugar de Instrucción:</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Lugar de Instrucción:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

                <br>
                <!-- Parte 5 -->
                <!-- titulo -->
                <h2>Duración: 2 horas</h2>
                <h2>Fecha(s):</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Fecha(s):</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>

                <br>
                <!-- Parte 6 -->
                <!-- titulo -->
                <h2>Perfil del participante:</h2>
                <!-- Tarjeta de Video -->
                <div class="container mt-5">
                    <div class="card" style="width: 18rem;">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T7P7gCivYlY" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Video de Ejemplo</h5>
                            <p class="card-text">Descripción del video o cualquier otra información relevante.</p>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-biEWFYiDz9op6kC3jwfeWE79AEFg8iXHpqndcLQ9OX6brx3RS7Q4cz74B/CU7pWY" crossorigin="anonymous"></script>
                <br>
                <!-- Formulario -->
                <form>
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Perfil del participante:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <label for="exampleInputNombre" class="form-label">Conocimientos:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <label for="exampleInputNombre" class="form-label">Habilidades/Desempeños:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <label for="exampleInputNombre" class="form-label">Producto:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <label for="exampleInputNombre" class="form-label">AHV:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <label for="exampleInputNombre" class="form-label">Número de participantes:</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <br>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <br>
                </form>

            </main>
        </div>
    </div>

    <!-- Agrega los scripts de Bootstrap 5 (Popper.js y Bootstrap.bundle.min.js son necesarios) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
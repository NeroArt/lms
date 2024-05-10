@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/styles.css'])
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Centro Evaluador de Competencias</title>
        <link rel="icon" type="image/x-icon" href="/resources/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Centro Evaluador de Competencias CEC</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Acerca de Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase"><h2 class="text-white-50 mx-auto mt-2 mb-5">Centro Evaluador de Competencias Laborales<br><p> Evaluamos y certificamos tus competencias profesionales ante el CONOCER de la SEP.</p></h2>
                        <div class="row">
                            @guest
                            <!-- Mostrar botones de inicio de sesión y registro -->
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('login') }}">Iniciar Sesión</a>
                            </div>
                            <br>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('register') }}">Registrarse</a>
                            </div>
                            @endguest
                            @auth
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('home') }}">Panel de Control</a>
                            </div>
                            @else
                            <!-- Mostrar botones de inicio de sesión y registro -->
                            
                        @endauth
                        

                        </div>
                       
                    </div>
                </div>
            </div>
        </header>

        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Acerca de Nosotros</h2>
                        <p class="text-white-50">
                            InCEC, es una empresa de consultoría empresarial y educativa, la empresa está acreditada como Centro de Evaluación por el CONOCER (Consejo Nacional de Normalización y Certificación de Competencias Laborales), con número de registro CE0770-OC063-18; además de estar registrada como Agente Capacitador Externo por la STPS, con número: SPE-210504-993-0013.
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="{{ asset('assets/img/ipad2.jpg') }}">
                <br>
                <br>
                <br>
            </div>
        </section>

        <!-- Projects-->

        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <h2>Servicios</h2>   

                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/img1.jpg') }}"></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Capacitación</h4>
                                    <p class="mb-0 text-white-50">Te ofrecemos capacitación para los estándares en los que deseas certificarte con programas 100% en línea que te permitan adquirir nuevas habilidades y mejorar tu desempeño a tu propio ritmo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/img3.jpg') }}"></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Alineación y Evaluación</h4>
                                    <p class="mb-0 text-white-50">No importa si tomaste capacitación o no, si estas listo para tu evaluación podemos proceder a la misma. Te proporcionaremos alineación para que conozcas el estándar y la forma en la que se te evaluará.
                                    <br>
                                    Te acompañaremos en todo momento antes, durante y después del proceso, apoyándote con asesorías personales.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Three Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/img2.jpg') }}"></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Certificación</h4>
                                    <p class="mb-0 text-white-50">Una vez aprobada tu evaluación, procedemos a la gestión de tu certificado ante el CONOCER de la Secretaría de Educación Pública.
                                    <br>Tu certificado tendrá validez oficial en todo el país.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <!-- Signup-->

        <!-- Contact-->
        <section class="about-section text-center" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Contacto</h2>
                        <p class="text-white-50">
                            Somos el Centro de Evaluación y Educación Continua de Morelia. Somos parte de la Red CONOCER con registro CE1165-OC063-18.
                        </p>
                    </div>
                </div>
            </div>
        </section>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Dirrección</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Verde Esmeralda No. 222, Fracc. Paseo Esmeralda, Morelia Michoacán</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">contacto@incec.com.mx</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Celular</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+(52) 44 33 96 19 42</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://www.linkedin.com/company/centrodeevaluaci%C3%B3nincec/"><i class="fab fa-linkedin"></i></a>
                    <a class="mx-2" href="https://www.facebook.com/centrodeevaluacion.incec"><i class="fab fa-facebook-f"></i></a>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Centro de Evalución de Competencias CEC 2024</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

      
        @vite(['resources/js/scripts.js'])
 
       
    </body>
</html>

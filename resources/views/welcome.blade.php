<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog App Riznal</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('images/blog-logo-small.png') }}">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/style-welcome.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('landing/navbar-logo.svg') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#featured-posts">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="#join-us">Join Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reviews">Review</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat datang di blog kami</div>
                <div class="masthead-heading text-uppercase">Senang bertemu denganmu</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="/login">Ayo Mulai !</a>
            </div>
        </header>
        <!-- Blog Features-->
        <section class="page-section" id="featured-posts">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Blog Features</h2>
                    <h3 class="section-subheading text-muted">Fitur-fitur yang mempermudah pengelolaan blog Anda.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-pencil-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Post Management</h4>
                        <p class="text-muted">Kelola artikel blog Anda dengan mudah, mulai dari menulis, mengedit, hingga mempublikasikan.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Recommended Articles</h4>
                        <p class="text-muted">Tampilkan artikel yang relevan atau cocok bagi pembaca berdasarkan preferensi mereka.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-tags fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Category</h4>
                        <p class="text-muted">Organisir konten Anda dengan kategori untuk navigasi yang lebih baik.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Join Us-->
        <section class="page-section" id="join-us">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Join Us</h2>
                    <h3 class="section-subheading text-muted">Artikel-artikel unggulan yang relevan dan menarik untuk Anda.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('landing/about/1.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Langkah 1</h4>
                                <h4 class="subheading">Daftar Akun</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Daftarkan akun Anda dengan mudah menggunakan email, dan mulailah akses fitur blog kami.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('landing/about/2.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Langkah 2</h4>
                                <h4 class="subheading">Sesuaikan Pengalaman Anda</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Atur profil Anda dan pilih topik yang Anda minati agar rekomendasi artikel sesuai dengan preferensi Anda.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('landing/about/3.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Langkah 3</h4>
                                <h4 class="subheading">Jelajahi & Interaksi</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Nikmati konten dan pelajari lebih lanjut dengan sumber daya yang tersedia.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- User Reviews-->
        <section class="page-section bg-light" id="reviews">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">User Reviews</h2>
                    <h3 class="section-subheading text-muted">Pendapat pengguna tentang aplikasi kami.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('landing/team/4.jpg') }}" alt="..." />
                            <h4>Kiper Kongo</h4>
                            <p class="text-muted">Aplikasi ini sangat membantu pekerjaan saya. Fitur-fitur yang ditawarkan mudah digunakan dan sangat fungsional.</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('landing/team/4.jpg') }}" alt="..." />
                            <h4>Kiper Kongo</h4>
                            <p class="text-muted">Pengalaman menggunakan aplikasi ini sangat memuaskan. Tampilan yang modern dan mudah dipahami membuat saya betah menggunakannya.</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('landing/team/4.jpg') }}" alt="..." />
                            <h4>Kiper Kongo</h4>
                            <p class="text-muted">Aplikasi ini sangat membantu dalam mengelola pekerjaan sehari-hari. Sangat direkomendasikan untuk pengguna lain.</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Bergabunglah dengan ribuan pengguna yang sudah merasakan manfaat dari aplikasi kami!</p></div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">"Ada pertanyaan atau butuh bantuan? Kirimkan pesan Anda di sini."</h3>
                </div>
        
                <!-- Tampilkan pesan sukses jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
        
                <form id="contactForm" action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Your Name *" required />
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="Your Email *" required />
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" name="phone" type="tel" placeholder="Your Phone *" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="message" placeholder="Your Message *" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Blog App Riznal</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="{{ route('privacy-policy') }}">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="{{ route('terms') }}">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

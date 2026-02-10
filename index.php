<?php 
// 1. Panggil data.php agar data profil sinkron
include 'data.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo $profile['name']; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css?v=2.1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .tab-indent { text-indent: 3rem; }
        .text-justify-mobile { text-align: justify !important; text-justify: inter-word; }
        @media (min-width: 768px) { .text-desktop-left { text-align: left !important; } }
        
        div:where(.swal2-container) div:where(.swal2-popup) {
            border-top: 5px solid #B4121B !important;
        }
    </style>
</head>
<body>

    <div id="loadingOverlay" class="loading-overlay-send" style="display: none;">
        <div class="spinner-custom"></div>
        <div class="loading-text">Mengirim Pesan...</div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"></a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section d-flex align-items-center text-center text-white">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3"><?php echo $profile['name']; ?></h1>
            <h3 class="lead fs-2 mb-4">
                I'm a <span class="typing-text"></span>
            </h3>
            <div class="mt-5">
                <a href="#contact" class="btn btn-primary btn-lg me-3 mb-3 mb-md-0 px-5 py-3 rounded-pill shadow fw-bold">Hire Me</a>
                <a href="file/cv/CV - Jose Elio Parhusipp.pdf" download="CV - Jose Elio Parhusip.pdf" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill shadow fw-bold">
                    <i class="fas fa-download"></i> Download CV
                </a>
            </div>
        </div>
    </header>

    <section id="about" class="py-5 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 text-center">
                    <img src="img/logo/img-jose.png" alt="Jose Profile" class="img-fluid rounded-circle shadow-lg mb-4" style="border: 5px solid #B4121B; width: 300px; height: 300px; object-fit: cover; margin-top: 50px;">
                </div>
                <div class="col-md-7">
                    <h2 class="fw-bold text-primary mb-4 text-center text-desktop-left" style="font-size: 2.5rem;">About Me</h2>
                    
                    <p class="lead text-secondary tab-indent text-justify-mobile text-desktop-left" style="line-height: 1.8; font-size: 1.1rem; margin-bottom: 1.5rem;">
                        <?php echo $profile['summary']; ?>
                    </p>

                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-center justify-content-md-start">
                            <div class="row w-100" style="max-width: 600px;"> 
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="btn btn-primary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="text-start">
                                            <small class="text-muted d-block">Location</small>
                                            <h6 class="fw-bold m-0" style="font-size: 0.9rem;"><?php echo $profile['location']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="btn btn-primary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="text-start">
                                            <small class="text-muted d-block">Education</small>
                                            <h6 class="fw-bold m-0" style="font-size: 0.9rem;">ULBI (GPA: 3.72)</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section id="skills" class="py-5" style="background-color: #f8f9fa;">
        <div class="container-fluid px-0"> 
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;">Technical & Business Skills</h2>
            
            <div class="mb-5">
                <h4 class="text-center text-secondary mb-4">💻 Technical Skills</h4>
                <div class="marquee-container">
                    <div class="marquee-content">
                        <?php for($i=0; $i<2; $i++): ?>
                            <div class="d-flex">
                                <?php foreach($skills['💻 Technical Skills'] as $tech): ?>
                                <div class="skill-card">
                                    <img src="<?php echo $tech['img']; ?>" alt="<?php echo $tech['name']; ?>">
                                    <h5><?php echo $tech['name']; ?></h5>
                                    <div class="progress-wrapper">
                                        <div class="progress"><div class="progress-bar" role="progressbar" style="width: <?php echo $tech['percent']; ?>%"></div></div>
                                        <div class="skill-percent"><?php echo $tech['percent']; ?>%</div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <div class="container mb-5">
                <h4 class="text-center text-secondary mb-4">📊 Business & Data</h4>
                <div class="row g-4 justify-content-center">
                    <?php foreach($skills['📊 Business & Data'] as $biz): ?>
                    <div class="col-6 col-md-3 d-flex justify-content-center">
                        <div class="skill-card m-0 w-100">
                            <img src="<?php echo $biz['img']; ?>" alt="<?php echo $biz['name']; ?>">
                            <h5><?php echo $biz['name']; ?></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;">Work Experience</h2>
            <div class="timeline-wrapper">
                <?php foreach($experience as $index => $exp): ?>
                <div class="card experience-card mb-4 border-0">
                    <div class="card-body p-4 p-md-5"> 
                        <div class="row">
                            <div class="col-md-1 d-none d-md-flex justify-content-center pt-1">
                                <div class="exp-icon-box"><i class="fas fa-briefcase"></i></div>
                            </div>
                            <div class="col-md-11">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div>
                                        <h3 class="card-title fw-bold m-0 text-dark mb-1"><?php echo $exp['title']; ?></h3>
                                        <h5 class="fw-bold text-primary mb-3"><?php echo $exp['company']; ?></h5>
                                    </div>
                                    <span class="badge bg-black text-white rounded-pill px-3 py-2 fw-normal mt-1 mt-md-0 shadow-sm">
                                        <i class="far fa-calendar-alt me-2"></i><?php echo $exp['date']; ?>
                                    </span>
                                </div>
                                <p class="card-text text-secondary mb-4 fs-6" style="line-height: 1.6;"><?php echo $exp['desc']; ?></p>
                                <button type="button" class="btn btn-outline-danger rounded-pill px-4 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#galleryModal<?php echo $index; ?>">
                                    <i class="fas fa-images me-2"></i> Lihat Dokumentasi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;">Featured Projects</h2>
            <div class="row">
                <?php foreach($projects as $proj): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow card-hover-border rounded-4 overflow-hidden">
                        <div class="card-body p-5">
                            <h4 class="card-title fw-bold mb-3"><?php echo $proj['name']; ?></h4>
                            <span class="badge bg-dark text-white mb-3 p-2"><?php echo $proj['tech']; ?></span>
                            <p class="card-text text-secondary mt-2"><?php echo $proj['desc']; ?></p>
                            <a href="#" class="btn btn-outline-danger mt-3 rounded-pill px-4">View Detail</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5" style="color: var(--primary-black);">Get In <span class="text-primary">Touch</span></h2>
                <p class="text-secondary fs-5">Silakan tinggalkan pesan, saya akan segera menghubungi Anda kembali.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="p-4 rounded-4 shadow-sm h-100" style="background-color: var(--primary-black); color: white;">
                        <h4 class="fw-bold mb-4">Contact Information</h4>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn btn-primary rounded-circle p-3 me-3"><i class="fas fa-envelope"></i></div>
                            <div>
                                <p class="m-0 text-white-50 small">Email Me</p>
                                <h6 class="fw-bold m-0"><?php echo $profile['email']; ?></h6>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="btn btn-success rounded-circle p-3 me-3"><i class="fab fa-whatsapp"></i></div>
                            <div>
                                <p class="m-0 text-white-50 small">WhatsApp</p>
                                <h6 class="fw-bold m-0"><?php echo $profile['phone']; ?></h6>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="btn btn-primary rounded-circle p-3 me-3"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <p class="m-0 text-white-50 small">Location</p>
                                <h6 class="fw-bold m-0"><?php echo $profile['location']; ?></h6>
                            </div>
                        </div>
                        
                        <hr class="my-4 border-secondary">
                        <p class="small text-white-50">Atau hubungi via WhatsApp untuk respon lebih cepat:</p>
                        <?php 
                            $wa_num = str_replace(['+', ' ', '-'], '', $profile['phone']);
                        ?>
                        <a href="https://wa.me/<?php echo $wa_num; ?>" class="btn btn-success w-100 rounded-pill fw-bold">Chat via WhatsApp</a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card p-4 shadow-sm border-0 rounded-4">
                        <form id="contactForm" action="contact_process.php" method="POST" onsubmit="return showLoading();">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control bg-light border-0 p-3" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control bg-light border-0 p-3" placeholder="email@contoh.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Subjek</label>
                                    <input type="text" name="subject" class="form-control bg-light border-0 p-3" placeholder="Tujuan pesan Anda" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Pesan</label>
                                    <textarea name="message" class="form-control bg-light border-0 p-3" rows="5" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm fw-bold">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center text-white-50" style="background-color: #1a1a1a;">
        <small>&copy; 2026 <?php echo $profile['name']; ?>. All Rights Reserved.</small>
    </footer>

    <?php foreach($experience as $index => $exp): ?>
    <div class="modal fade" id="galleryModal<?php echo $index; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dokumentasi: <?php echo $exp['title']; ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="alert alert-info text-center mb-3">
                        <i class="fas fa-search-plus me-2"></i> Klik pada gambar untuk memperbesar
                    </div>
                    <div class="row g-3">
                        <?php foreach($exp['images'] as $img): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card gallery-card h-100 border-0">
                                <div class="gallery-img-wrapper">
                                    <img src="<?php echo $img; ?>" class="gallery-img" onclick="openFullImage(this.src)">
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div id="fullImageViewer" class="full-image-overlay" onclick="closeFullImage()">
        <span class="full-image-close" onclick="closeFullImage()">&times;</span>
        <img class="full-image-content" id="fullImageDisplay">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // 4. FUNCTION LOADING
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
            // Return true agar form tetap terkirim ke server
            return true;
        }

        // 5. LOGIKA PHP UNTUK MENANGKAP STATUS PENGIRIMAN
        // Bagian ini akan dieksekusi setelah halaman direload oleh redirect PHP
        <?php if (isset($_GET['status'])): ?>
            <?php 
                $status = $_GET['status'];
                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
            ?>
            
            <?php if ($status == 'success'): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Pesan Anda telah berhasil dikirim ke Jose.',
                    confirmButtonColor: '#B4121B'
                });
            <?php elseif ($status == 'error'): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan: <?php echo $msg; ?>',
                    confirmButtonColor: '#B4121B'
                });
            <?php endif; ?>
            
            // Bersihkan URL dari parameter ?status=... agar bersih jika direfresh
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        <?php endif; ?>

        // Typed JS Logic
        var typed = new Typed('.typing-text', {
            strings: [
                "Digital Business Student", 
                "Tech-Oriented Business Analyst", 
                "Business Data Analyst", 
                "SAP Certified Student", 
                "Flutter Developer", 
                "Web Developer"
            ],
            typeSpeed: 40,
            backSpeed: 20,
            backDelay: 2000,
            loop: true
        });

        // Image Gallery Logic
        document.addEventListener('DOMContentLoaded', function() {
            const galleryImages = document.querySelectorAll('.gallery-img');
            galleryImages.forEach(img => {
                const wrapper = img.closest('.gallery-img-wrapper');
                wrapper.classList.add('loading');
                img.addEventListener('load', function() {
                    wrapper.classList.remove('loading');
                });
                if (img.complete) {
                    wrapper.classList.remove('loading');
                }
            });
        });

        function openFullImage(src) {
            var viewer = document.getElementById("fullImageViewer");
            var imgDisplay = document.getElementById("fullImageDisplay");
            imgDisplay.src = src;
            viewer.style.display = "flex";
            setTimeout(function() { viewer.classList.add("active"); }, 10);
        }

        function closeFullImage() {
            var viewer = document.getElementById("fullImageViewer");
            viewer.classList.remove("active");
            setTimeout(function() {
                viewer.style.display = "none";
                document.getElementById("fullImageDisplay").src = "";
            }, 300);
        }
    </script>
</body>
</html>
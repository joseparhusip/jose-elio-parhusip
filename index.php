<?php 
include 'data.php'; 
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo $profile['name']; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=2.7">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .tab-indent { text-indent: 3rem; }
        .text-justify-mobile { text-align: justify !important; text-justify: inter-word; }
        @media (min-width: 768px) { .text-desktop-left { text-align: left !important; } }
        
        div:where(.swal2-container) div:where(.swal2-popup) {
            border-top: 5px solid #B4121B !important;
        }

        .horizontal-scroll-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            gap: 1.5rem;
            padding-bottom: 1rem;
            scrollbar-width: thin;
        }
        
        .horizontal-scroll-wrapper::-webkit-scrollbar {
            height: 6px;
        }
        
        .horizontal-scroll-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .horizontal-scroll-wrapper::-webkit-scrollbar-thumb {
            background: #B4121B; 
            border-radius: 10px;
        }
        
        .horizontal-scroll-wrapper::-webkit-scrollbar-thumb:hover {
            background: #8a0e15; 
        }

        .skill-card-horizontal {
            flex: 0 0 auto;
            width: 160px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .skill-card-horizontal:hover {
            transform: translateY(-5px);
        }

        .skill-card-horizontal img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .business-card {
            background: white;
            padding: 40px 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .business-card:hover {
            transform: translateY(-8px);
        }

        .business-icon {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 25px;
        }

        @media (min-width: 768px) {
            .business-icon {
                width: 200px;
                height: 200px;
            }
        }

        /* Styles for Language Switcher */
        .flag-icon {
            transition: transform 0.2s ease, opacity 0.2s;
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 4px;
        }
        .flag-icon:hover {
            transform: scale(1.1);
        }
        .active-lang img {
            border: 2px solid white;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
            opacity: 1;
        }
        .inactive-lang img {
            opacity: 0.6;
        }
        .inactive-lang:hover img {
            opacity: 1;
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
            <a class="navbar-brand" href="#">PORTFOLIO</a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#about"><?php echo $trans['about'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills"><?php echo $trans['skills'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience"><?php echo $trans['experience'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects"><?php echo $trans['projects'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"><?php echo $trans['contact'][$lang]; ?></a></li>
                    
                    <li class="nav-item d-flex align-items-center gap-3 ms-lg-4 mt-3 mt-lg-0">
                        <a href="?lang=id" class="p-0 <?php echo $lang == 'id' ? 'active-lang' : 'inactive-lang'; ?>" title="Bahasa Indonesia">
                            <img src="icons/indonesia-flag.png" width="32" class="flag-icon" alt="ID">
                        </a>
                        <a href="?lang=en" class="p-0 <?php echo $lang == 'en' ? 'active-lang' : 'inactive-lang'; ?>" title="English">
                            <img src="icons/uk-flag.png" width="32" class="flag-icon" alt="EN">
                        </a>
                    </li>
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
                <a href="#contact" class="btn btn-primary btn-lg me-3 mb-3 mb-md-0 px-5 py-3 rounded-pill shadow fw-bold"><?php echo $trans['hire_me'][$lang]; ?></a>
                <a href="file/cv/CV - Jose Elio Parhusipp.pdf" download="CV - Jose Elio Parhusip.pdf" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill shadow fw-bold">
                    <i class="fas fa-download"></i> <?php echo $trans['download_cv'][$lang]; ?>
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
                    <h2 class="fw-bold text-primary mb-4 text-center text-desktop-left" style="font-size: 2.5rem;"><?php echo $trans['about_me_title'][$lang]; ?></h2>
                    
                    <p class="lead text-secondary tab-indent text-justify-mobile text-desktop-left" style="line-height: 1.8; font-size: 1.1rem; margin-bottom: 1.5rem;">
                        <?php echo $profile['summary'][$lang]; ?>
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
                                            <small class="text-muted d-block"><?php echo $trans['location'][$lang]; ?></small>
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
                                            <small class="text-muted d-block"><?php echo $trans['education'][$lang]; ?></small>
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
        <div class="container"> 
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;"><?php echo $trans['tech_skills_title'][$lang]; ?></h2>
            
            <div class="mb-5">
                <h4 class="text-center text-secondary mb-4"><?php echo $trans['tech_sub'][$lang]; ?></h4>
                
                <div class="horizontal-scroll-wrapper px-2">
                    <?php foreach($skills['technical'] as $tech): ?>
                    <div class="skill-card-horizontal">
                        <img src="<?php echo $tech['img']; ?>" alt="<?php echo $tech['name']; ?>">
                        <h6 class="fw-bold"><?php echo $tech['name']; ?></h6>
                        
                        <p class="text-danger fw-bold mt-2 mb-0" style="font-size: 1.1rem;"><?php echo $tech['percent']; ?>%</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="container mb-5">
                <h4 class="text-center text-secondary mb-4"><?php echo $trans['biz_sub'][$lang]; ?></h4>
                <div class="row g-4 justify-content-center">
                    <?php foreach($skills['business'] as $biz): ?>
                    <div class="col-6 col-md-3 d-flex justify-content-center">
                        <div class="business-card w-100">
                            <img src="<?php echo $biz['img']; ?>" alt="<?php echo is_array($biz['name']) ? $biz['name'][$lang] : $biz['name']; ?>" class="business-icon">
                            <h5 style="font-size: 1.1rem; font-weight: bold;">
                                <?php echo is_array($biz['name']) ? $biz['name'][$lang] : $biz['name']; ?>
                            </h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;"><?php echo $trans['exp_title'][$lang]; ?></h2>
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
                                <p class="card-text text-secondary mb-4 fs-6" style="line-height: 1.6;"><?php echo $exp['desc'][$lang]; ?></p>
                                <button type="button" class="btn btn-outline-danger rounded-pill px-4 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#galleryModal<?php echo $index; ?>">
                                    <i class="fas fa-images me-2"></i> <?php echo $trans['view_doc'][$lang]; ?>
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
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;"><?php echo $trans['feat_proj'][$lang]; ?></h2>
            <div class="row">
                <?php foreach($projects as $index => $proj): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow project-card rounded-4 overflow-hidden border-0">
                        <div class="project-img-container">
                            <img src="<?php echo $proj['image']; ?>" alt="<?php echo $proj['name']; ?>" class="project-img">
                            <div class="project-overlay">
                                <span class="badge bg-primary px-3 py-2"><?php echo $proj['name']; ?></span>
                            </div>
                        </div>
                        
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="card-title fw-bold mb-2"><?php echo $proj['name']; ?></h4>
                            <div class="mb-3">
                                <span class="badge bg-dark text-white p-2 rounded-2" style="font-size: 0.8rem;"><?php echo $proj['tech']; ?></span>
                            </div>
                            <p class="card-text text-secondary mt-2 small flex-grow-1" style="text-align: justify;">
                                <?php echo $proj['desc'][$lang]; ?>
                            </p>
                            <button type="button" class="btn btn-outline-danger mt-3 rounded-pill w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $index; ?>">
                                <?php echo $trans['view_detail'][$lang]; ?>
                            </button>
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
                <h2 class="fw-bold display-5" style="color: var(--primary-black);"><?php echo $trans['get_in_touch'][$lang]; ?> <span class="text-primary"><?php echo $trans['touch_highlight'][$lang]; ?></span></h2>
                <p class="text-secondary fs-5"><?php echo $trans['contact_desc'][$lang]; ?></p>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="p-4 rounded-4 shadow-sm h-100" style="background-color: var(--primary-black); color: white;">
                        <h4 class="fw-bold mb-4"><?php echo $trans['contact_info'][$lang]; ?></h4>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn btn-primary rounded-circle p-3 me-3"><i class="fas fa-envelope"></i></div>
                            <div>
                                <p class="m-0 text-white-50 small"><?php echo $trans['email_me'][$lang]; ?></p>
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
                                <p class="m-0 text-white-50 small"><?php echo $trans['location'][$lang]; ?></p>
                                <h6 class="fw-bold m-0"><?php echo $profile['location']; ?></h6>
                            </div>
                        </div>
                        
                        <hr class="my-4 border-secondary">
                        <p class="small text-white-50"><?php echo $trans['or_wa'][$lang]; ?></p>
                        <?php 
                            $wa_num = str_replace(['+', ' ', '-'], '', $profile['phone']);
                        ?>
                        <a href="https://wa.me/<?php echo $wa_num; ?>" class="btn btn-success w-100 rounded-pill fw-bold"><?php echo $trans['chat_wa'][$lang]; ?></a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card p-4 shadow-sm border-0 rounded-4">
                        <form id="contactForm" action="contact_process.php" method="POST" onsubmit="return showLoading();">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold"><?php echo $trans['form_name'][$lang]; ?></label>
                                    <input type="text" name="name" class="form-control bg-light border-0 p-3" placeholder="<?php echo $trans['form_name_ph'][$lang]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control bg-light border-0 p-3" placeholder="<?php echo $trans['form_email_ph'][$lang]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold"><?php echo $trans['form_subject'][$lang]; ?></label>
                                    <input type="text" name="subject" class="form-control bg-light border-0 p-3" placeholder="<?php echo $trans['form_subject_ph'][$lang]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold"><?php echo $trans['form_msg'][$lang]; ?></label>
                                    <textarea name="message" class="form-control bg-light border-0 p-3" rows="5" placeholder="<?php echo $trans['form_msg_ph'][$lang]; ?>" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm fw-bold"><?php echo $trans['btn_send'][$lang]; ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center text-white-50" style="background-color: #1a1a1a;">
        <small>&copy; 2026 <?php echo $profile['name']; ?>. <?php echo $trans['footer_rights'][$lang]; ?></small>
    </footer>

    <?php foreach($experience as $index => $exp): ?>
    <div class="modal fade" id="galleryModal<?php echo $index; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $trans['modal_doc'][$lang]; ?>: <?php echo $exp['title']; ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="alert alert-info text-center mb-3">
                        <i class="fas fa-search-plus me-2"></i> <?php echo $trans['modal_zoom'][$lang]; ?>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $trans['close'][$lang]; ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php foreach($projects as $index => $proj): ?>
    <div class="modal fade" id="projectModal<?php echo $index; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $trans['modal_proj'][$lang]; ?>: <?php echo $proj['name']; ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="alert alert-info text-center mb-3">
                        <i class="fas fa-search-plus me-2"></i> <?php echo $trans['modal_zoom'][$lang]; ?>
                    </div>
                    <div class="mb-4 px-2">
                        <p><?php echo $proj['desc'][$lang]; ?></p>
                        <span class="badge bg-dark p-2"><?php echo $proj['tech']; ?></span>
                    </div>
                    <div class="row g-3">
                        <?php foreach($proj['images'] as $img): ?>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $trans['close'][$lang]; ?></button>
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
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
            return true;
        }

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
            
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        <?php endif; ?>

        // TYPING TEXT BERDASARKAN BAHASA
        var typedStrings = [
            "<?php echo $lang == 'id' ? 'Mahasiswa Bisnis Digital' : 'Digital Business Student'; ?>", 
            "<?php echo $lang == 'id' ? 'Analis Bisnis Berorientasi Teknologi' : 'Tech-Oriented Business Analyst'; ?>", 
            "<?php echo $lang == 'id' ? 'Analis Data Bisnis' : 'Business Data Analyst'; ?>", 
            "<?php echo $lang == 'id' ? 'Mahasiswa Bersertifikat SAP' : 'SAP Certified Student'; ?>", 
            "Flutter Developer", 
            "Web Developer"
        ];

        var typed = new Typed('.typing-text', {
            strings: typedStrings,
            typeSpeed: 40,
            backSpeed: 20,
            backDelay: 2000,
            loop: true
        });

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
        
        document.addEventListener("DOMContentLoaded", function() {
            const validSections = ["#about", "#skills", "#experience", "#projects", "#contact", ""];
            const currentHash = window.location.hash;
            if (currentHash && !validSections.includes(currentHash)) {
                if (!document.querySelector(currentHash)) {
                    console.warn("Section tidak ditemukan: " + currentHash);
                }
            }
        });
    </script>
</body>
</html>
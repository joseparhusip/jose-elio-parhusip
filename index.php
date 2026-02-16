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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .tab-indent { text-indent: 3rem; }
        .text-justify-mobile { text-align: justify !important; text-justify: inter-word; }
        @media (min-width: 768px) { .text-desktop-left { text-align: left !important; } }
        
        div:where(.swal2-container) div:where(.swal2-popup) {
            border-top: 5px solid #B4121B !important;
        }

        /* Scroll Wrapper untuk Technical Skills */
        .horizontal-scroll-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            gap: 2rem; /* Jarak antar card */
            padding: 1rem 1rem 3rem 1rem; 
            scrollbar-width: thin;
            align-items: center; /* Center vertical */
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

        /* Style untuk Flag Language */
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

    <div id="globalLoader" class="loader-overlay-fullscreen">
        <div class="loader">
            <div class="loader__balls">
                <div class="loader__balls__group">
                    <div class="ball item1"></div>
                    <div class="ball item1"></div>
                    <div class="ball item1"></div>
                </div>
                <div class="loader__balls__group">
                    <div class="ball item2"></div>
                    <div class="ball item2"></div>
                    <div class="ball item2"></div>
                </div>
                <div class="loader__balls__group">
                    <div class="ball item3"></div>
                    <div class="ball item3"></div>
                    <div class="ball item3"></div>
                </div>
            </div>
        </div>
    </div>

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
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#about"><?php echo $trans['about'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#skills"><?php echo $trans['skills'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#experience"><?php echo $trans['experience'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#projects"><?php echo $trans['projects'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#certificates"><?php echo $trans['certificates'][$lang]; ?></a></li>
                    <li class="nav-item"><a class="nav-link nav-loader-link" href="#contact"><?php echo $trans['contact'][$lang]; ?></a></li>
                    
                    <li class="nav-item d-flex align-items-center gap-3 ms-lg-4 mt-3 mt-lg-0">
                        <label class="switch me-2">
                            <input id="input" type="checkbox" />
                            <div class="slider round">
                                <div class="sun-moon">
                                    <svg id="moon-dot-1" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="moon-dot-2" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="moon-dot-3" class="moon-dot" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-1" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-2" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="light-ray-3" class="light-ray" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-1" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-2" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-3" class="cloud-dark" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-4" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-5" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                    <svg id="cloud-6" class="cloud-light" viewBox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50"></circle>
                                    </svg>
                                </div>
                                <div class="stars">
                                    <svg id="star-1" class="star" viewBox="0 0 20 20">
                                        <path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path>
                                    </svg>
                                    <svg id="star-2" class="star" viewBox="0 0 20 20">
                                        <path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path>
                                    </svg>
                                    <svg id="star-3" class="star" viewBox="0 0 20 20">
                                        <path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path>
                                    </svg>
                                    <svg id="star-4" class="star" viewBox="0 0 20 20">
                                        <path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </label>
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

    <header class="hero-section d-flex align-items-center text-center text-white position-relative">
        
        <div id="heroCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="4000" style="z-index: 0;">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="img/header/header-1.jpg" class="d-block w-100 h-100 carousel-img-fit" alt="Header 1">
                </div>
                <div class="carousel-item h-100">
                    <img src="img/header/header-2.jpg" class="d-block w-100 h-100 carousel-img-fit" alt="Header 2">
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="z-index: 3;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="z-index: 3;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="hero-overlay"></div>
        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-3 fw-bold mb-3"><?php echo $profile['name']; ?></h1>
            <h3 class="lead fs-2 mb-4">
                <?php echo $lang == 'id' ? 'Saya seorang' : "I'm an"; ?> <span class="typing-text"></span>
            </h3>
            <div class="mt-5">
                <a href="#contact" class="btn btn-primary btn-lg me-3 mb-3 mb-md-0 px-5 py-3 rounded-pill shadow fw-bold nav-loader-link"><?php echo $trans['hire_me'][$lang]; ?></a>
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
                    <div class="neo-card">
                        <div class="neo-card-overlay"></div>
                        <div class="neo-card-inner">
                            <img src="<?php echo $tech['img']; ?>" alt="<?php echo $tech['name']; ?>" class="neo-card-img">
                            <h6 class="neo-card-title"><?php echo $tech['name']; ?></h6>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="container mb-5">
                <h4 class="text-center text-secondary mb-4"><?php echo $trans['biz_sub'][$lang]; ?></h4>
                <div class="row g-4 justify-content-center">
                    <?php foreach($skills['business'] as $biz): ?>
                    <div class="col-6 col-md-3 d-flex justify-content-center">
                         <div class="neo-card w-100">
                            <div class="neo-card-overlay"></div>
                            <div class="neo-card-inner">
                                <img src="<?php echo $biz['img']; ?>" alt="<?php echo is_array($biz['name']) ? $biz['name'][$lang] : $biz['name']; ?>" class="neo-card-img-lg">
                                <h6 class="neo-card-title">
                                    <?php echo is_array($biz['name']) ? $biz['name'][$lang] : $biz['name']; ?>
                                </h6>
                            </div>
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
    
    <section id="certificates" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="font-size: 2.5rem;"><?php echo $trans['feat_cert'][$lang]; ?></h2>
            <div class="row g-4 justify-content-center">
                <?php foreach($certificates as $index => $cert): ?>
                <div class="col-md-4 col-sm-6 d-flex justify-content-center">
                    
                    <div class="flip-card-wrapper">
                        <div class="flip-card-inner">
                            
                            <div class="flip-card-front">
                                <div class="flip-card-front-content">
                                    <i class="fas fa-award fa-3x mb-3 text-white"></i>
                                    <strong class="text-uppercase text-white" style="letter-spacing: 1.5px;">Hover Me</strong>
                                </div>
                            </div>

                            <div class="flip-card-back">
                                <div class="flip-card-back-bg">
                                    <div class="blob-red"></div>
                                    <div class="blob-red" id="blob-right"></div>
                                    <div class="blob-red" id="blob-bottom"></div>
                                </div>

                                <div class="flip-card-back-content">
                                    <small class="flip-badge"><?php echo $cert['category']; ?></small>
                                    
                                    <div class="flip-desc-box">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="me-3">
                                                <img src="<?php echo $cert['image']; ?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover; border: 2px solid white;">
                                            </div>
                                            <p class="mb-0 fw-bold text-white small" style="flex:1; line-height: 1.2;">
                                                <?php echo $cert['title']; ?>
                                            </p>
                                        </div>
                                        
                                        <button class="btn btn-sm btn-outline-light w-100 rounded-pill mt-2" data-bs-toggle="modal" data-bs-target="#certModal<?php echo $index; ?>">
                                            <?php echo $trans['view_detail'][$lang]; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
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
                        <form id="contactForm" action="contact_process.php" method="POST" onsubmit="return handleFormSubmit();">
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
                                <div class="col-12 mt-4">
                                    <button class="btn-anim" type="submit" id="submitBtn">
                                        <div class="btn-anim-outline"></div>
                                        <div class="state state--default">
                                            <div class="icon">
                                            <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g style="filter: url(#shadow)">
                                                <path d="M14.2199 21.63C13.0399 21.63 11.3699 20.8 10.0499 16.83L9.32988 14.67L7.16988 13.95C3.20988 12.63 2.37988 10.96 2.37988 9.78001C2.37988 8.61001 3.20988 6.93001 7.16988 5.60001L15.6599 2.77001C17.7799 2.06001 19.5499 2.27001 20.6399 3.35001C21.7299 4.43001 21.9399 6.21001 21.2299 8.33001L18.3999 16.82C17.0699 20.8 15.3999 21.63 14.2199 21.63ZM7.63988 7.03001C4.85988 7.96001 3.86988 9.06001 3.86988 9.78001C3.86988 10.5 4.85988 11.6 7.63988 12.52L10.1599 13.36C10.3799 13.43 10.5599 13.61 10.6299 13.83L11.4699 16.35C12.3899 19.13 13.4999 20.12 14.2199 20.12C14.9399 20.12 16.0399 19.13 16.9699 16.35L19.7999 7.86001C20.3099 6.32001 20.2199 5.06001 19.5699 4.41001C18.9199 3.76001 17.6599 3.68001 16.1299 4.19001L7.63988 7.03001Z" fill="currentColor"></path>
                                                <path d="M10.11 14.4C9.92005 14.4 9.73005 14.33 9.58005 14.18C9.29005 13.89 9.29005 13.41 9.58005 13.12L13.16 9.53C13.45 9.24 13.93 9.24 14.22 9.53C14.51 9.82 14.51 10.3 14.22 10.59L10.64 14.18C10.5 14.33 10.3 14.4 10.11 14.4Z" fill="currentColor"></path>
                                                </g>
                                                <defs>
                                                <filter id="shadow">
                                                    <fedropshadow dx="0" dy="1" stdDeviation="0.6" flood-opacity="0.5"></fedropshadow>
                                                </filter>
                                                </defs>
                                            </svg>
                                            </div>
                                            <p>
                                                <?php 
                                                    // Dynamic Text Splitting for Animation
                                                    $btnText = isset($trans['btn_send'][$lang]) ? $trans['btn_send'][$lang] : "Send Message";
                                                    $chars = preg_split('//u', $btnText, -1, PREG_SPLIT_NO_EMPTY);
                                                    foreach($chars as $i => $char) {
                                                        // FIX: Gunakan &nbsp; untuk spasi yang lebih aman dengan margin
                                                        if ($char === ' ') {
                                                            echo '<span style="--i:'.$i.'; min-width: 5px;">&nbsp;</span>';
                                                        } else {
                                                            echo '<span style="--i:'.$i.'">'.$char.'</span>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="state state--sent">
                                            <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="1em" width="1em" stroke-width="0.5px" stroke="black">
                                                <g style="filter: url(#shadow)">
                                                <path fill="black" d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"></path>
                                                <path fill="#ffffff" d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z"></path>
                                                </g>
                                            </svg>
                                            </div>
                                            <p>
                                                <?php 
                                                    // "Sent" text dynamic
                                                    $sentText = ($lang == 'id') ? "Terkirim" : "Sent";
                                                    $charsSent = str_split($sentText);
                                                    $startIndex = count($chars) + 2; // Offset animation timing
                                                    foreach($charsSent as $j => $charS) {
                                                        echo '<span style="--i:'.($startIndex + $j).'">'.$charS.'</span>';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </button>
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

    <?php foreach($certificates as $index => $cert): ?>
    <div class="modal fade" id="certModal<?php echo $index; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $trans['modal_cert'][$lang]; ?>: <?php echo $cert['title']; ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center bg-light">
                    <div class="mb-3">
                        <img src="<?php echo $cert['image']; ?>" class="img-fluid rounded shadow" style="max-height: 500px;" onclick="openFullImage(this.src)">
                    </div>
                    <div class="text-start px-3">
                        <h5 class="fw-bold"><?php echo $cert['title']; ?></h5>
                        <span class="badge bg-primary mb-2"><?php echo $cert['category']; ?></span>
                        <p class="text-secondary"><?php echo $cert['desc'][$lang]; ?></p>
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

        var typedStrings = [
            "<?php echo $lang == 'id' ? 'Analis Bisnis' : 'Business Analyst'; ?>", 
            "<?php echo $lang == 'id' ? 'Flutter Developer' : 'Flutter Developer'; ?>", 
            "<?php echo $lang == 'id' ? 'Web Developer' : 'Web Developer'; ?>"
        ];
    </script>
    <script src="script.js"></script>
</body>
</html>
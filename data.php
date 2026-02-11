<?php
// data.php
// Sumber data diambil dari CV Jose Elio Parhusip & Folder Image
session_start();

// Cek bahasa yang dipilih (Default: Indonesia)
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

// UI Text Translation (Kamus Kata antarmuka)
$trans = [
    'about' => ['id' => 'Tentang', 'en' => 'About'],
    'skills' => ['id' => 'Keahlian', 'en' => 'Skills'],
    'experience' => ['id' => 'Pengalaman', 'en' => 'Experience'],
    'projects' => ['id' => 'Proyek', 'en' => 'Projects'],
    'contact' => ['id' => 'Kontak', 'en' => 'Contact'],
    'hire_me' => ['id' => 'Rekrut Saya', 'en' => 'Hire Me'],
    'download_cv' => ['id' => 'Unduh CV', 'en' => 'Download CV'],
    'about_me_title' => ['id' => 'Tentang Saya', 'en' => 'About Me'],
    'location' => ['id' => 'Lokasi', 'en' => 'Location'],
    'education' => ['id' => 'Pendidikan', 'en' => 'Education'],
    'tech_skills_title' => ['id' => 'Keahlian Teknis & Bisnis', 'en' => 'Technical & Business Skills'],
    'tech_sub' => ['id' => '💻 Keahlian Teknis', 'en' => '💻 Technical Skills'],
    'biz_sub' => ['id' => '📊 Bisnis & Data', 'en' => '📊 Business & Data'],
    'exp_title' => ['id' => 'Pengalaman Kerja', 'en' => 'Work Experience'],
    'view_doc' => ['id' => 'Lihat Dokumentasi', 'en' => 'View Documentation'],
    'feat_proj' => ['id' => 'Proyek Unggulan', 'en' => 'Featured Projects'],
    'view_detail' => ['id' => 'Lihat Detail', 'en' => 'View Detail'],
    'get_in_touch' => ['id' => 'Hubungi', 'en' => 'Get In'],
    'touch_highlight' => ['id' => 'Saya', 'en' => 'Touch'],
    'contact_desc' => ['id' => 'Silakan tinggalkan pesan, saya akan segera menghubungi Anda kembali.', 'en' => 'Please leave a message, I will get back to you shortly.'],
    'contact_info' => ['id' => 'Informasi Kontak', 'en' => 'Contact Information'],
    'email_me' => ['id' => 'Email Saya', 'en' => 'Email Me'],
    'or_wa' => ['id' => 'Atau hubungi via WhatsApp untuk respon lebih cepat:', 'en' => 'Or contact via WhatsApp for faster response:'],
    'chat_wa' => ['id' => 'Chat via WhatsApp', 'en' => 'Chat via WhatsApp'],
    'form_name' => ['id' => 'Nama Lengkap', 'en' => 'Full Name'],
    'form_name_ph' => ['id' => 'Masukkan nama Anda', 'en' => 'Enter your name'],
    'form_email_ph' => ['id' => 'email@contoh.com', 'en' => 'email@example.com'],
    'form_subject' => ['id' => 'Subjek', 'en' => 'Subject'],
    'form_subject_ph' => ['id' => 'Tujuan pesan Anda', 'en' => 'Purpose of your message'],
    'form_msg' => ['id' => 'Pesan', 'en' => 'Message'],
    'form_msg_ph' => ['id' => 'Tuliskan pesan Anda di sini...', 'en' => 'Write your message here...'],
    'btn_send' => ['id' => 'Kirim Pesan', 'en' => 'Send Message'],
    'footer_rights' => ['id' => 'Hak Cipta Dilindungi.', 'en' => 'All Rights Reserved.'],
    'modal_doc' => ['id' => 'Dokumentasi', 'en' => 'Documentation'],
    'modal_proj' => ['id' => 'Detail Proyek', 'en' => 'Project Detail'],
    'modal_zoom' => ['id' => 'Klik pada gambar untuk memperbesar', 'en' => 'Click on image to zoom'],
    'close' => ['id' => 'Tutup', 'en' => 'Close']
];

$profile = [
    "name" => "Jose Elio Parhusip",
    "role" => [
        "id" => "Mahasiswa Bisnis Digital | Penggemar Backend & Mobile Developer",
        "en" => "Digital Business Student | Backend & Mobile Developer Enthusiast"
    ],
    "summary" => [
        "id" => "Saya adalah mahasiswa S1 Bisnis Digital semester 7 di Universitas Logistik dan Bisnis Internasional dengan IPK 3,72, berfokus pada Analisis Bisnis, Data Bisnis, dan sistem berbasis ERP.<br><br>Saya memiliki pengalaman menganalisis kebutuhan bisnis, memodelkan sistem menggunakan ERD, UML, dan flowchart, serta menerjemahkan kebutuhan bisnis menjadi solusi teknis. Saya akrab dengan konsep SAP ERP dan pengolahan data menggunakan SQL dan Google Colab.<br><br>Selain latar belakang bisnis dan data, saya memiliki pengalaman langsung dalam pengembangan aplikasi Web dan mobile menggunakan PHP, MySQL, RESTful API, dan Flutter. Fondasi teknis ini memungkinkan saya untuk secara efektif menjembatani komunikasi antara pemangku kepentingan bisnis dan tim teknis. Saya adalah individu yang terstruktur, analitis, dan bekerja dengan baik secara mandiri maupun kolaboratif dalam proyek tim.",
        "en" => "I am a 7th-semester Digital Business undergraduate student at Universitas Logistik dan Bisnis Internasional with a GPA of 3.72, focusing on Business Analysis, Business Data, and ERP-based systems.<br><br>I have experience analyzing business requirements, modeling systems using ERD, UML, and flowcharts, and translating business needs into technical solutions. I am familiar with SAP ERP concepts and data processing using SQL and Google Colab.<br><br>In addition to my business and data background, I have hands-on experience in Web and mobile application development using PHP, MySQL, RESTful APIs, and Flutter. This technical foundation allows me to effectively bridge communication between business stakeholders and technical teams. I am a structured, analytical individual who works well both independently and collaboratively in team-based projects."
    ],
    "email" => "joseparhusip7@gmail.com",
    "phone" => "+6281292690095",
    "linkedin" => "https://www.linkedin.com/in/joseparhusip/",
    "location" => "Bandung, Jawa Barat, Indonesia"
];

$skills = [
    "technical" => [
        ["name" => "PHP Native", "img" => "skills/technical-skills/php.png", "percent" => 90],
        ["name" => "Node.js & Express", "img" => "skills/technical-skills/nodejs-frameworks.png", "percent" => 75],
        ["name" => "Flutter & Dart", "img" => "skills/technical-skills/Flutter & Dart.webp", "percent" => 80],
        ["name" => "React.js", "img" => "skills/technical-skills/react js.png", "percent" => 80],
        ["name" => "Google Colab", "img" => "skills/technical-skills/colab.png", "percent" => 80],
        ["name" => "SAP", "img" => "skills/technical-skills/SAP.png", "percent" => 70],
        ["name" => "Figma", "img" => "skills/technical-skills/Figma.jpg", "percent" => 85]
    ],
    "business" => [
        ["name" => ["id" => "Analisis Bisnis", "en" => "Business Analysis"], "img" => "skills/business-data/Business Analysis.png"],
        ["name" => ["id" => "Data Bisnis", "en" => "Business Data"], "img" => "skills/business-data/Business Data.png"],
        ["name" => ["id" => "Manajemen Proyek", "en" => "Project Management"], "img" => "skills/business-data/Project Management.png"],
        ["name" => ["id" => "Sistem E-Commerce", "en" => "E-Commerce Systems"], "img" => "skills/business-data/E-Commerce Systems.png"]
    ]
];

$experience = [
    [
        "title" => "Mobile Developer (Internship)",
        "company" => "JEC Eye Hospitals & Clinics",
        "date" => "Aug 2025 - Sept 2025", 
        "desc" => [
            "id" => "Mengembangkan aplikasi mobile untuk pasien baru. Implementasi UI dari Figma ke Flutter, integrasi OCR, dan backend OOP.",
            "en" => "Developed mobile applications for new patients. UI implementation from Figma to Flutter, OCR integration, and OOP backend."
        ],
        "images" => [
            "work-experience/mobile-developer/page-1.png",
            "work-experience/mobile-developer/page-2.png",
            "work-experience/mobile-developer/page-3.png",
            "work-experience/mobile-developer/page-4.png",
            "work-experience/mobile-developer/page-5.png",
            "work-experience/mobile-developer/page-6.png",
            "work-experience/mobile-developer/page-7.png"
        ]
    ],
    [
        "title" => "Back End Developer (Internship)",
        "company" => "Kantor Pusat PT Pos Indonesia",
        "date" => "Juli 2024 - Sept 2024", 
        "desc" => [
            "id" => "Mengembangkan backend aplikasi IHSAN POS. Merancang arsitektur sistem, database, dan API untuk komunikasi frontend-backend.",
            "en" => "Developed the backend for the IHSAN POS application. Designed system architecture, databases, and APIs for frontend-backend communication."
        ],
        "images" => [
            "work-experience/backend-developer/Arsitektur Form Edit Profile.png",
            "work-experience/backend-developer/Arsitektur Halaman NKI & Kontrak Kerja.png",
            "work-experience/backend-developer/Arsitektur Page Login.png",
            "work-experience/backend-developer/Arsitektur Page Profile.png",
            "work-experience/backend-developer/Entity Relationship Diagram.png",
            "work-experience/backend-developer/Form Edit Profile.png",
            "work-experience/backend-developer/Form Kontrak Kerja.png",
            "work-experience/backend-developer/Page Login.png",
            "work-experience/backend-developer/Page NKI dan Kontrak Kerja.png",
            "work-experience/backend-developer/Page Profile.png"
        ]
    ]
];

// DATA PROJECTS DIPERBARUI (Multi-bahasa)
$projects = [
    [
        "name" => "JEC Mobile App",
        "tech" => "Flutter, REST API, MySQL",
        "image" => "featured-projects/jec-mobile-app/page-1.png",
        "desc" => [
            "id" => "Mengembangkan fitur inti aplikasi internal sesuai kebutuhan operasional. Mengintegrasikan aplikasi Flutter dengan REST API backend untuk komunikasi data yang lancar. Mengelola operasi database MySQL dan melakukan pengujian komprehensif untuk memastikan aplikasi yang handal.",
            "en" => "Developed core features of the internal application aligned with operational needs. Integrated the Flutter application with backend REST APIs for seamless data communication. Managed MySQL database operations and conducted comprehensive testing to ensure a reliable application experience."
        ],
        "images" => [
            "featured-projects/jec-mobile-app/page-1.png",
            "featured-projects/jec-mobile-app/page-2.png",
            "featured-projects/jec-mobile-app/page-3.png",
            "featured-projects/jec-mobile-app/page-4.png",
            "featured-projects/jec-mobile-app/page-5.png",
            "featured-projects/jec-mobile-app/page-6.png",
            "featured-projects/jec-mobile-app/page-7.png"
        ]
    ],
    [
        "name" => "Carter ULBI",
        "tech" => "PHP Native, MySQL, REST API",
        "image" => "featured-projects/carter-ulbi/carter-ulbi-1.png",
        "desc" => [
            "id" => "Merancang dan membangun situs web Carter ULBI menggunakan PHP dan MySQL, mengelola server XAMPP lokal. Mengimplementasikan API POST, PUT, DELETE, dan UPDATE untuk pemrosesan data real-time yang dinamis. Mengembangkan arsitektur backend modular di VS Code dan meraih nilai 'A' dalam mata kuliah Proyek Integrasi II.",
            "en" => "Designed and built the Carter ULBI website using PHP and MySQL, managing a local XAMPP server. Implemented POST, PUT, DELETE, and UPDATE APIs for dynamic real-time data processing. Developed a modular backend architecture in VS Code and achieved an 'A' grade in the Integration Project II course."
        ],
        "images" => [
            "featured-projects/carter-ulbi/carter-ulbi-1.png",
            "featured-projects/carter-ulbi/carter-ulbi-2.png",
            "featured-projects/carter-ulbi/carter-ulbi-3.png",
            "featured-projects/carter-ulbi/carter-ulbi-4.png"
        ]
    ],
    [
        "name" => "Lapak ULBI (P2MW)",
        "tech" => "Business Analyst, Finance",
        "image" => "featured-projects/lapak-ulbi/page-lapak-ulbi.jpg",
        "desc" => [
            "id" => "Program kewirausahaan yang didanai oleh Kemendikbud. Mengelola administrasi keuangan termasuk pembuatan Faktur dan Rencana Anggaran Biaya (RAB). Bertanggung jawab atas input produk dan manajemen katalog di situs web. Berhasil merekrut dan membimbing mahasiswa ULBI untuk menjadi penjual aktif di platform.",
            "en" => "Entrepreneurship program funded by Kemendikbud. Managed financial administration including creating Invoices and Budget Plans (RAB). Responsible for product input and catalog management on the website. Successfully recruited and onboarded ULBI students to become active sellers on the platform."
        ],
        "images" => [
            "featured-projects/lapak-ulbi/page-lapak-ulbi.jpg",
            "featured-projects/lapak-ulbi/page-lapak-ulbi-2.jpg",
            "featured-projects/lapak-ulbi/laporan-per-tenant.jpg",
            "featured-projects/lapak-ulbi/pelatihan.jpg"
        ]
    ]
];
?>
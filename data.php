<?php
// data.php
// Sumber data diambil dari CV Jose Elio Parhusip & Folder Image

$profile = [
    "name" => "Jose Elio Parhusip",
    "role" => "Digital Business Student | Backend & Mobile Developer Enthusiast",
    "summary" => "I am a 7th-semester Digital Business undergraduate student at Universitas Logistik dan Bisnis Internasional with a GPA of 3.72, focusing on Business Analysis, Business Data, and ERP-based systems.<br><br>I have experience analyzing business requirements, modeling systems using ERD, UML, and flowcharts, and translating business needs into technical solutions. I am familiar with SAP ERP concepts and data processing using SQL and Google Colab.<br><br>In addition to my business and data background, I have hands-on experience in Web and mobile application development using PHP, MySQL, RESTful APIs, and Flutter. This technical foundation allows me to effectively bridge communication between business stakeholders and technical teams. I am a structured, analytical individual who works well both independently and collaboratively in team-based projects.",
    "email" => "joseparhusip7@gmail.com",
    "phone" => "+6281292690095",
    "linkedin" => "https://www.linkedin.com/in/joseparhusip/",
    "location" => "Bandung, Jawa Barat, Indonesia"
];

$skills = [
    "💻 Technical Skills" => [
        // Urutan dan Persentase sesuai permintaan
        ["name" => "Flutter", "img" => "skills/technical-skills/Flutter & Dart.webp", "percent" => 88],
        ["name" => "PHP Native", "img" => "skills/technical-skills/php.png", "percent" => 80],
        ["name" => "Node.js & Express", "img" => "skills/technical-skills/nodejs-frameworks.png", "percent" => 78],
        ["name" => "React JS", "img" => "skills/technical-skills/react js.png", "percent" => 78],
        ["name" => "SAP", "img" => "skills/technical-skills/SAP.png", "percent" => 75],
        ["name" => "Google Colab", "img" => "skills/technical-skills/colab.png", "percent" => 60],
        ["name" => "Figma", "img" => "skills/technical-skills/Figma.jpg", "percent" => 50],
    ],
    "📊 Business & Data" => [
        ["name" => "Business Analysis", "img" => "skills/business-data/Business Analysis.png"],
        ["name" => "Business Data", "img" => "skills/business-data/Business Data.png"],
        ["name" => "Project Management", "img" => "skills/business-data/Project Management.png"],
        ["name" => "E-Commerce Systems", "img" => "skills/business-data/E-Commerce Systems.png"]
    ]
];

$experience = [
    [
        "title" => "Back End Developer (Internship)",
        "company" => "Kantor Pusat PT Pos Indonesia",
        "date" => "Juli 2024 - Sept 2024", 
        "desc" => "Mengembangkan backend aplikasi IHSAN POS. Merancang arsitektur sistem, database, dan API untuk komunikasi frontend-backend.",
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
    ],
    [
        "title" => "Mobile Developer (Internship)",
        "company" => "JEC Eye Hospitals & Clinics",
        "date" => "Aug 2025 - Sept 2025", 
        "desc" => "Mengembangkan aplikasi mobile untuk pasien baru. Implementasi UI dari Figma ke Flutter, integrasi OCR, dan backend OOP.",
        "images" => [
            "work-experience/mobile-developer/page-1.png",
            "work-experience/mobile-developer/page-2.png",
            "work-experience/mobile-developer/page-3.png",
            "work-experience/mobile-developer/page-4.png",
            "work-experience/mobile-developer/page-5.png",
            "work-experience/mobile-developer/page-6.png",
            "work-experience/mobile-developer/page-7.png"
        ]
    ]
];

$projects = [
    [
        "name" => "Trivo (Marketplace C2C)",
        "tech" => "Flutter, Dart, RESTful API",
        "desc" => "Platform marketplace C2C untuk mahasiswa. Mengelola data produk dan transaksi real-time."
    ],
    [
        "name" => "E-Commerce Web",
        "tech" => "PHP Native, Midtrans, RajaOngkir",
        "desc" => "Website jual beli dengan fitur pembayaran otomatis (Midtrans) dan cek ongkir (RajaOngkir)."
    ],
    [
        "name" => "Carter ULBI",
        "tech" => "PHP Native, MySQL",
        "desc" => "Sistem penyewaan kendaraan dengan backend modular dan API (POST, PUT, DELETE)."
    ],
    [
        "name" => "Lapak ULBI (P2MW)",
        "tech" => "Business Analyst, Finance",
        "desc" => "Program wirausaha didanai Kemendikbud. Mengelola anggaran dan perancangan sistem (ERD/Flowchart)."
    ]
];
?>
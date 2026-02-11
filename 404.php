<?php
require 'data.php'; // Ambil data profil agar sinkron
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - <?php echo $profile['name']; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="style.css?v=2.1">

    <style>
        /* Style Khusus Halaman 404 (Internal agar tidak merusak style.css utama terlalu banyak) */
        .error-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4; /* Background terang */
            position: relative;
            overflow: hidden;
        }

        .error-content {
            text-align: center;
            z-index: 2;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border-top: 5px solid #B4121B; /* Merah Jose */
            max-width: 600px;
            width: 90%;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #B4121B; /* Merah */
            line-height: 1;
            text-shadow: 4px 4px 0px #000; /* Shadow Hitam */
            margin-bottom: 10px;
            animation: bounceIn 1s ease;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: #000;
            margin-bottom: 20px;
        }

        .error-desc {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        /* Animasi Partikel Background (Estetika) */
        .bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(#B4121B 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.05;
            z-index: 1;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="error-page">
        <div class="bg-pattern"></div>
        
        <div class="error-content">
            <div class="error-code">404</div>
            <h2 class="error-title">Oops! Halaman Tidak Ditemukan</h2>
            <p class="error-desc">
                Maaf, halaman atau bagian yang Anda cari tidak tersedia. <br>
                Mungkin URL salah atau halaman telah dipindahkan.
            </p>
            
            <a href="index.php" class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow">
                <i class="fas fa-home me-2"></i> Kembali ke Portfolio
            </a>
        </div>
    </div>

</body>
</html>
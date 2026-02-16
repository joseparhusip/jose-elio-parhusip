<?php
/**
 * contact_process.php
 * Versi: FIXED LAYOUT (Anti Jebol Text Panjang)
 */

// 1. Load Autoload & Data
require __DIR__ . '/vendor/autoload.php';
include 'data.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// 2. Load Environment Variables
try {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} catch (Exception $e) {
    die("Error: File .env tidak ditemukan atau konfigurasi server bermasalah.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 3. Sanitasi Input
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'] ?? 'Pesan Baru');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Validasi Email sederhana
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?status=error&msg=" . urlencode("Format email tidak valid"));
        exit();
    }

    // Persiapkan Link WhatsApp
    $wa_number = isset($profile['phone']) ? str_replace(['+', ' ', '-'], '', $profile['phone']) : '6281292690095';
    $wa_link = "https://wa.me/" . $wa_number . "?text=" . urlencode("Halo Jose, saya $name. Saya baru saja mengirim email tentang $subject.");

    $mail = new PHPMailer(true);

    try {
        // --- KONFIGURASI SMTP ---
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST']; 
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER']; 
        $mail->Password   = $_ENV['SMTP_PASS']; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $_ENV['SMTP_PORT']; 

        // ==========================================================
        // TAHAP 1: KIRIM EMAIL KE ADMIN (JOSE)
        // ==========================================================
        $mail->setFrom($_ENV['SMTP_USER'], 'Portfolio Notification');
        $mail->addAddress($_ENV['ADMIN_EMAIL']); 
        
        $mail->isHTML(true);
        $mail->Subject = "[NEW] " . $subject . " - dari " . $name;
        
        // --- PERBAIKAN CSS DI SINI (Admin Email) ---
        // 1. Menambahkan 'table-layout: fixed' pada <table> agar kolom tidak melebar sembarangan
        // 2. Menambahkan 'word-wrap: break-word' dan 'word-break: break-all' pada <td> Subjek & Pesan
        
        $mail->Body    = "
        <div style='font-family: Helvetica, Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f4f4f4; padding: 20px;'>
            <div style='background-color: #000000; padding: 20px; border-top: 5px solid #B4121B; text-align: center; border-radius: 8px 8px 0 0;'>
                <h2 style='color: #ffffff; margin: 0; letter-spacing: 1px;'>🚀 PESAN MASUK BARU</h2>
            </div>
            
            <div style='background-color: #ffffff; padding: 30px; border-radius: 0 0 8px 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
                <table style='width: 100%; table-layout: fixed; border-collapse: collapse; margin-bottom: 20px;'>
                    <tr>
                        <td style='padding: 8px 0; color: #888; width: 80px; vertical-align: top;'>Nama</td>
                        <td style='padding: 8px 0; color: #000; font-weight: bold; vertical-align: top; word-wrap: break-word; word-break: break-word;'>$name</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #888; vertical-align: top;'>Email</td>
                        <td style='padding: 8px 0; color: #B4121B; font-weight: bold; vertical-align: top; word-wrap: break-word; word-break: break-all;'>$email</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #888; vertical-align: top;'>Subjek</td>
                        <td style='padding: 8px 0; color: #000; vertical-align: top; word-wrap: break-word; word-break: break-all;'>$subject</td>
                    </tr>
                </table>

                <div style='background-color: #fafafa; border-left: 4px solid #B4121B; padding: 15px; border-radius: 4px; margin-bottom: 30px;'>
                    <p style='margin: 0; color: #333; line-height: 1.6; font-style: italic; word-wrap: break-word; word-break: break-word;'>\"$message\"</p>
                </div>

                <div style='text-align: center;'>
                    <a href='mailto:$email?subject=Re: $subject' style='background-color: #B4121B; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block;'>
                        Balas via Email
                    </a>
                </div>
            </div>

            <div style='text-align: center; margin-top: 20px; color: #999; font-size: 12px;'>
                Email ini dikirim otomatis dari System Portfolio Jose (Secure Mode).
            </div>
        </div>";
        
        $mail->send();

        // ==========================================================
        // TAHAP 2: KIRIM EMAIL KE PENGUNJUNG (AUTO REPLY)
        // ==========================================================
        $mail->clearAddresses();
        $mail->addAddress($email); 
        
        $mail->Subject = "Terima Kasih Telah Menghubungi Jose";
        
        // --- PERBAIKAN CSS DI SINI (User Email) ---
        $mail->Body    = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;'>
            <div style='background-color: #B4121B; padding: 20px; text-align: center; color: white;'>
                <h1 style='margin: 0;'>Terima Kasih!</h1>
            </div>
            <div style='padding: 30px; background-color: #ffffff;'>
                <h3 style='color: #000;'>Halo $name,</h3>
                <p style='color: #555; line-height: 1.6;'>
                    Terima kasih sudah menghubungi saya. Pesan Anda mengenai:
                </p>
                <div style='background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin: 10px 0; color: #000; font-weight: bold; word-wrap: break-word; word-break: break-all;'>
                    '$subject'
                </div>
                <p style='color: #555;'>
                    Telah saya terima dan akan segera saya tinjau. Saya biasanya membalas dalam waktu 1x24 jam.
                </p>
                
                <div style='text-align: center; margin-top: 30px; margin-bottom: 30px;'>
                    <a href='$wa_link' style='background-color: #25D366; color: white; padding: 12px 25px; text-decoration: none; border-radius: 50px; font-weight: bold; font-size: 16px;'>
                        Hubungi via WhatsApp
                    </a>
                </div>

                <hr style='border: 0; border-top: 1px solid #eee; margin: 20px 0;'>
                <p style='color: #999; font-size: 12px; text-align: center;'>
                    Salam hangat,<br>
                    <b>Jose Elio Parhusip</b><br>
                    Digital Business Student & Developer
                </p>
            </div>
        </div>";
        
        $mail->send();

        header("Location: index.php?status=success");
        exit();

    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        header("Location: index.php?status=error&msg=" . urlencode("Gagal mengirim pesan. Mohon coba lagi."));
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
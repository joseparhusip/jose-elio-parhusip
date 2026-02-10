<?php
/**
 * contact_process.php
 * Versi Composer untuk Jose Elio Parhusip
 * Updated: Admin Email Premium Design & WhatsApp Integration for User
 */

// Panggil autoload dari Composer & Data Pribadi
require __DIR__ . '/vendor/autoload.php';
include 'data.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? 'Pesan Baru');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Persiapkan Link WhatsApp untuk tombol di email User
    $wa_number = isset($profile['phone']) ? str_replace(['+', ' ', '-'], '', $profile['phone']) : '6281292690095';
    $wa_link = "https://wa.me/" . $wa_number . "?text=" . urlencode("Halo Jose, saya $name. Saya baru saja mengirim email tentang $subject.");

    $mail = new PHPMailer(true);

    try {
        // --- KONFIGURASI SMTP GMAIL ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cryptocuan07@gmail.com'; 
        $mail->Password   = 'epmu qyse vixz vzsm';     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; 

        // ==========================================================
        // TAHAP 1: KIRIM EMAIL KE JOSE (ADMIN / DEVELOPER)
        // ==========================================================
        $mail->setFrom('cryptocuan07@gmail.com', 'Portfolio Notification');
        $mail->addAddress('joseparhusip7@gmail.com'); 
        
        $mail->isHTML(true);
        $mail->Subject = "[NEW] " . $subject . " - dari " . $name;
        
        // Desain Email untuk ADMIN (Nuansa Hitam Elegan dengan Aksen Merah)
        $mail->Body    = "
        <div style='font-family: Helvetica, Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f4f4f4; padding: 20px;'>
            <div style='background-color: #000000; padding: 20px; border-top: 5px solid #B4121B; text-align: center; border-radius: 8px 8px 0 0;'>
                <h2 style='color: #ffffff; margin: 0; letter-spacing: 1px;'>🚀 PESAN MASUK BARU</h2>
            </div>
            
            <div style='background-color: #ffffff; padding: 30px; border-radius: 0 0 8px 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
                <table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>
                    <tr>
                        <td style='padding: 8px 0; color: #888; width: 100px;'>Nama</td>
                        <td style='padding: 8px 0; color: #000; font-weight: bold;'>$name</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #888;'>Email</td>
                        <td style='padding: 8px 0; color: #B4121B; font-weight: bold;'>$email</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #888;'>Subjek</td>
                        <td style='padding: 8px 0; color: #000;'>$subject</td>
                    </tr>
                </table>

                <div style='background-color: #fafafa; border-left: 4px solid #B4121B; padding: 15px; border-radius: 4px; margin-bottom: 30px;'>
                    <p style='margin: 0; color: #333; line-height: 1.6; font-style: italic;'>\"$message\"</p>
                </div>

                <div style='text-align: center;'>
                    <a href='mailto:$email?subject=Re: $subject' style='background-color: #B4121B; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block;'>
                        Balas via Email
                    </a>
                </div>
            </div>

            <div style='text-align: center; margin-top: 20px; color: #999; font-size: 12px;'>
                Email ini dikirim otomatis dari System Portfolio Jose.
            </div>
        </div>";
        
        $mail->send();

        // ==========================================================
        // TAHAP 2: KIRIM EMAIL OTOMATIS KE PENGUNJUNG (USER)
        // ==========================================================
        $mail->clearAddresses();
        $mail->addAddress($email); 
        
        $mail->Subject = "Terima Kasih Telah Menghubungi Jose";
        
        // Desain Email untuk USER (Tetap Ramah tapi Profesional)
        $mail->Body    = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;'>
            <div style='background-color: #B4121B; padding: 20px; text-align: center; color: white;'>
                <h1 style='margin: 0;'>Terima Kasih!</h1>
            </div>
            <div style='padding: 30px; background-color: #ffffff;'>
                <h3 style='color: #000;'>Halo $name,</h3>
                <p style='color: #555; line-height: 1.6;'>
                    Terima kasih sudah menghubungi saya. Pesan Anda mengenai <b>'$subject'</b> telah saya terima dan akan segera saya tinjau.
                </p>
                <p style='color: #555;'>Saya biasanya membalas dalam waktu 1x24 jam. Jika kebutuhan Anda mendesak, silakan hubungi saya langsung melalui WhatsApp.</p>
                
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

        // Redirect dengan status SUCCESS
        header("Location: index.php?status=success");
        exit();

    } catch (Exception $e) {
        // Redirect dengan status ERROR
        header("Location: index.php?status=error&msg=" . urlencode($mail->ErrorInfo));
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
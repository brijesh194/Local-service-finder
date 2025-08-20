<?php
require_once __DIR__ . '/config.php';

function sanitize($s) { return htmlspecialchars(trim($s ?? ''), ENT_QUOTES, 'UTF-8'); }

function send_email($to, $subject, $html) {
  // Basic mail() (ensure sendmail/SMTP configured). For SMTP, replace with PHPMailer, etc.
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8\r\n";
  $headers .= "From: ".SITE_NAME." <no-reply@yourdomain.com>\r\n";
//   return mail($to, $subject, $html, $headers);
}

// Build absolute URL
function url($path) {
  return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

// Simple auth guard for admin
function admin_require() {
  session_start();
  if (empty($_SESSION['admin_logged'])) {
    header('Location: '.url('admin/login.php'));
    exit;
  }
}

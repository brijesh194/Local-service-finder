<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

// $id = (int)($_GET['id'] ?? 0);
// $stmt = db()->prepare("SELECT * FROM providers WHERE id=:id AND status='approved'");
// $stmt->execute([':id'=>$id]);
// $p = $stmt->fetch();
// if (!$p) { http_response_code(404); die('Provider not found or not approved'); }

// Fetch provider by ID without status check

$id = (int)($_GET['id'] ?? 0);

// Prepare query without status check
$stmt = db()->prepare("SELECT * FROM providers WHERE id=:id");
$stmt->execute([':id' => $id]);
$p = $stmt->fetch();

if (!$p) {
    http_response_code(404);
    die('Provider not found');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= sanitize($p['name']) ?> — <?= SITE_NAME ?></title>
<style>
body{margin:0;background:#0f1115;color:#e6f1ff;font-family:Inter,Arial}
.wrap{max-width:1100px;margin:0 auto;padding:20px}
.header{display:flex;gap:16px;align-items:center;margin:16px 0}
.photo{width:120px;height:120px;border-radius:16px;overflow:hidden;border:1px solid #1e2633}
.photo img{width:100%;height:100%;object-fit:cover}
.badge{background:#0ea5e9;color:#e6faff;border-radius:999px;padding:6px 10px;margin-left:8px}
.meta{color:#a5b4fc}
.card{background:#121722;border:1px solid #1e2633;border-radius:16px;padding:16px;margin:25px 0; padding-right: 50px;}
.btn{background:#22ccff;border:none;padding:12px 16px;border-radius:12px;font-weight:700;cursor:pointer}
input,textarea{width:100%;padding:12px;border-radius:12px;border:1px solid #243043;background:#0f131b;color:#dbeafe;margin:8px 0}
.row{display:grid;grid-template-columns:1fr 1fr;gap:50px}

/* Navbar */
.nav{position:sticky;top:0;z-index:30;background:linear-gradient(180deg,#0f1115 0%, rgba(15,17,21,.85) 100%);backdrop-filter: blur(8px);border-bottom:1px solid #1d2330}
.nav-inner{display:flex;align-items:center;justify-content:space-between;padding:14px 0}
.logo{font-weight:900;letter-spacing:.4px;color:#a5f3fc}
.nav-links{display:flex;gap:18px}
.nav-links a{color:#dbeafe;opacity:.85; text-decoration: none;}
.nav-links a:hover{opacity:1}


/* NEW FOOTER (Redesigned) */
    footer{margin-top:28px}
    .footer-wrap{
      margin-top:18px; border-top:1px solid var(--border);
      background:
        radial-gradient(600px 200px at 90% 10%, rgba(6,182,212,.08), transparent 60%),
        radial-gradient(500px 200px at 10% 90%, rgba(124,58,237,.10), transparent 60%),
        linear-gradient(180deg, rgba(2,6,23,.5), rgba(2,6,23,.8));
    }
    .f-inner{max-width:1200px;margin:0 auto;padding:28px 24px 20px 24px}
    .f-top{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:22px}
    .f-brand .logo{font-size:24px}
    .f-text{color:var(--muted)}
    .f-list{list-style:none;margin:10px 0 0 0;padding:0;display:grid;gap:8px}
    .f-link{color:var(--link);text-decoration:none;position:relative;display:inline-block;transition:color .2s var(--ease)}
    .f-link:after{content:"";position:absolute;left:0;bottom:-4px;height:2px;width:0;background:linear-gradient(90deg,var(--primary),var(--accent));transition:width .25s var(--ease)}
    .f-link:hover{color:var(--link-hover)}
    .f-link:hover:after{width:100%}

    .f-social{display:flex;gap:10px;margin-top:12px}
    .s-btn{
      width:38px;height:38px;border-radius:10px;border:1px solid var(--border);
      background:rgba(255,255,255,.04); display:grid;place-items:center; cursor:pointer;
      transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease), border-color var(--speed) var(--ease), background var(--speed) var(--ease)
    }
    .s-btn svg{width:18px;height:18px}
    .s-btn:hover{transform:translateY(-3px); box-shadow:0 12px 28px rgba(6,182,212,.25); border-color:rgba(6,182,212,.35); background:rgba(6,182,212,.12)}

    .f-bottom{display:flex;align-items:center;justify-content:space-between;margin-top:16px;padding-top:14px;border-top:1px dashed var(--border);color:var(--muted);font-size:13px}
    .f-badges{display:flex;gap:8px;flex-wrap:wrap}
    .f-badge{border:1px solid var(--border);border-radius:999px;padding:6px 10px;background:rgba(255,255,255,.04);font-size:12px}

    /* Hover micro */
    .lift{transition:transform var(--speed) var(--ease)}
    .lift:hover{transform:translateY(-4px)}

    /* Animations */
    .fade-up{opacity:0;transform:translateY(12px);transition:opacity .6s var(--ease), transform .6s var(--ease)}
    .fade-up.show{opacity:1;transform:translateY(0)}
    .reveal-children > *{opacity:0;transform:translateY(8px)}
    .reveal-children.show > *{animation:child .6s var(--ease) forwards}
    .reveal-children.show > *:nth-child(1){animation-delay:.05s}
    .reveal-children.show > *:nth-child(2){animation-delay:.10s}
    .reveal-children.show > *:nth-child(3){animation-delay:.15s}
    .reveal-children.show > *:nth-child(4){animation-delay:.20s}
    .reveal-children.show > *:nth-child(5){animation-delay:.25s}
    @keyframes child{to{opacity:1;transform:translateY(0)}}

    @media (max-width:960px){
      .hero-grid{grid-template-columns:1fr}
      .grid-6{grid-template-columns:repeat(3,1fr)}
      .how{grid-template-columns:1fr}
      .trust-grid{grid-template-columns:1fr}
      .stats{grid-template-columns:repeat(2,1fr)}
      .nav-controls{top:-48px}
      .f-top{grid-template-columns:1fr 1fr;gap:18px}
      .f-bottom{flex-direction:column;gap:10px;align-items:flex-start}
    }
    @media (max-width:560px){
      .grid-6{grid-template-columns:repeat(2,1fr)}
      .nav-links{display:none}
      .hero h1{font-size:34px}
      .nav-controls{top:-46px}
    }
</style>
</head>
<body>

<!-- ======= NAVBAR ======= -->
<header class="nav">
  <div class="wrap nav-inner">
    <div class="logo"><?= SITE_NAME ?></div>
    <nav class="nav-links">
      <a href="<?= url('index.php') ?>">Home</a>
      <a href="#categories">Categories</a>
      <a href="#results">Providers</a>
      <a href="create-profile.php" class="btn" style="padding:8px 14px">Create Profile</a>

    </nav>
  </div>
</header>


<div class="wrap">
  <a href="s.php" style="color:#22ccff">&larr; Back</a>

  <div class="header">
    <div class="photo"><img src="/<?= htmlspecialchars($p['photo_path']) ?>" alt="<?= htmlspecialchars($p['name']) ?>"></div>
    <div>
      <h2 style="margin:6px 0">
        <?= sanitize($p['name']) ?>
        <?php if ($p['verified']): ?><span class="badge">✔ Verified</span><?php endif; ?>
      </h2>
      <div class="meta"><?= sanitize($p['service']) ?> • <?= sanitize($p['location']) ?> • <?= (int)$p['experience_years'] ?> yrs exp</div>
      <div class="meta">From ₹<?= (int)$p['price'] ?> • Rating <?= number_format((float)$p['rating'],1) ?>★</div>
    </div>
  </div>

  <div class="card">
    <h3>About</h3>
    <p><?= nl2br(sanitize($p['long_desc'] ?: $p['short_desc'])) ?></p>
    <p class="meta">Tags: <?= sanitize($p['tags']) ?> | Availability: <?= sanitize($p['availability']) ?></p>
  </div>

  <div class="card" id="book">
    <h3>Book / Contact</h3>
    <form action="book.php" method="post">
      <input type="hidden" name="provider_id" value="<?= $p['id'] ?>">
      <div class="row">
        <div><label>Your Name</label><input name="customer_name" required></div>
        <div><label>Your Email</label><input type="email" name="customer_email" required></div>
      </div>
      <div class="row">
        <div><label>Your Phone</label><input name="customer_phone" required></div>
        <div><label>Preferred Time</label><input name="preferred_time" placeholder="e.g., Today 5 PM"></div>
      </div>
      <label>Message</label>
      <textarea name="message" rows="4" placeholder="Describe the job"></textarea>
      <button class="btn" style="margin-top:10px">Send Request</button>
    </form>
    <p class="meta" style="margin-top:8px">Or contact directly: <?= sanitize($p['contact_email']) ?> • <?= sanitize($p['contact_phone']) ?></p>
  </div>
</div>

<!-- FOOTER (Redesigned) -->
  <div class="footer-wrap">
    <div class="f-inner">
      <div class="f-top">
        <div class="f-brand">
          <div class="logo">HouseWise</div>
          <p class="f-text" style="margin-top:8px">Trusted local services in your city. Verified professionals, secure payments, and easy bookings.</p>
          <div class="f-social">
            <!-- Social icon buttons (SVG) -->
            <a class="s-btn" href="#" aria-label="Twitter">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.486 11.24H16.38l-5.3-6.93-6.06 6.93H1.711l7.73-8.84L1.25 2.25h6.83l4.79 6.32 5.374-6.32Z"/></svg>
            </a>
            <a class="s-btn" href="#" aria-label="Facebook">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 22v-8h3l1-4h-4V7.5c0-1.158.343-1.948 2.115-1.948H17V2.14C16.69 2.097 15.655 2 14.46 2 11.642 2 9.75 3.657 9.75 7.2V10H6v4h3.75v8H13Z"/></svg>
            </a>
            <a class="s-btn" href="#" aria-label="Instagram">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm10 2H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2.5A2.5 2.5 0 1 0 12 14a2.5 2.5 0 0 0 0-5Zm4.75-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"/></svg>
            </a>
            <a class="s-btn" href="#" aria-label="LinkedIn">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 6.5A2.44 2.44 0 1 1 6.94 1.6a2.44 2.44 0 0 1 0 4.88ZM3.9 22.4h6.1V8.98H3.9V22.4Zm8.61-13.42v13.42h6.1v-7.5c0-3.99-4.28-3.69-4.28-1.77v9.27"/></svg>
            </a>
          </div>
        </div>

        <div>
          <h4>Company</h4>
          <ul class="f-list">
            <li><a class="f-link" href="#">About</a></li>
            <li><a class="f-link" href="#">Careers</a></li>
            <li><a class="f-link" href="#">Press</a></li>
            <li><a class="f-link" href="#">Blog</a></li>
          </ul>
        </div>

        <div>
          <h4>Services</h4>
          <ul class="f-list">
            <li><a class="f-link" href="#services">Plumber</a></li>
            <li><a class="f-link" href="#services">Electrician</a></li>
            <li><a class="f-link" href="#services">Carpenter</a></li>
            <li><a class="f-link" href="#services">Cleaning</a></li>
          </ul>
        </div>

        <div>
          <h4>Contact</h4>
          <ul class="f-list">
            <li><a class="f-link" href="tel:+919999999999">+91 99999 99999</a></li>
            <li><a class="f-link" href="mailto:support@housewise.example">support@housewise.example</a></li>
            <li><span class="f-text">Lucknow, India</span></li>
          </ul>
        </div>
      </div>

      <div class="f-bottom">
        <div>© <span id="year"></span> HouseWise. All rights reserved.</div>
        <div class="f-badges">
          <span class="f-badge">Aadhaar KYC</span>
          <span class="f-badge">PCI DSS</span>
          <span class="f-badge">RBI e-mandate</span>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

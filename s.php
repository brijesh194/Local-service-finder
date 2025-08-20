<?php require_once __DIR__ . '/db.php'; require_once __DIR__ . '/helpers.php'; ?>
<?php
// Fetch only APPROVED providers for homepage
// $stmt = db()->prepare("SELECT * FROM providers WHERE status='approved' ORDER BY created_at DESC");
$stmt = db()->prepare("SELECT * FROM providers ORDER BY created_at DESC");

$stmt->execute();
$providers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?= SITE_NAME ?> — Find Trusted Local Services</title>
<style>
/* ======= Premium Dark Theme & Animations ======= */
:root{
  --bg:#0f1115; --card:#141821; --muted:#9aa4b2; --pri:#22ccff; --pri-2:#1aa3cc; --accent:#8b5cf6; --ok:#22c55e; --danger:#ef4444; --glow:0 0 0 transparent;
}
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,Arial, sans-serif;background:var(--bg);color:#fff;}
a{color:inherit;text-decoration:none}
.btn{background:var(--pri);border:none;padding:12px 16px;border-radius:12px;font-weight:600;cursor:pointer;transition:.25s}
.btn:hover{background:var(--pri-2);box-shadow:0 8px 24px rgba(34,204,255,.25)}
.badge{display:inline-flex;align-items:center;gap:6px;padding:6px 10px;border-radius:999px;font-size:12px;background:#1f2632;color:#cfefff}
.wrap{max-width:1200px;margin:0 auto;padding:0 20px}

/* Navbar */
.nav{position:sticky;top:0;z-index:30;background:linear-gradient(180deg,#0f1115 0%, rgba(15,17,21,.85) 100%);backdrop-filter: blur(8px);border-bottom:1px solid #1d2330}
.nav-inner{display:flex;align-items:center;justify-content:space-between;padding:14px 0}
.logo{font-weight:900;letter-spacing:.4px;color:#a5f3fc}
.nav-links{display:flex;gap:18px}
.nav-links a{color:#dbeafe;opacity:.85}
.nav-links a:hover{opacity:1}

/* Hero */
.hero{padding:64px 0 28px;background:
radial-gradient(800px 400px at 20% -10%, rgba(34,204,255,.12), transparent 70%),
radial-gradient(800px 400px at 80% 0%, rgba(139,92,246,.12), transparent 70%);
}
.hero h1{font-size:40px;line-height:1.15;margin:10px 0 8px}
.hero p{color:var(--muted);max-width:720px}
.hero-row{display:grid;grid-template-columns:1.1fr .9fr;gap:24px;align-items:center}
.hero-card{background:linear-gradient(180deg,#141821,#12151d);border:1px solid #1e2633;border-radius:18px;padding:18px;box-shadow:0 8px 40px rgba(0,0,0,.35); padding-bottom: 50px;}
.searchbox{display:flex;gap:10px;margin-top:10px}
.searchbox input, .searchbox select{flex:1;padding:12px;border-radius:12px;border:1px solid #243043;background:#0f131b;color:#e5f2ff}
.searchbox .btn{padding:12px 16px}

/* Counters / trust strip */
.trust{display:flex;gap:14px;margin-top:18px;flex-wrap:wrap}
.kpi{background:#121722;border:1px solid #1e2633;border-radius:14px;padding:10px 14px;color:#c7d2fe}
.kpi strong{display:block;font-size:20px;color:#e0f2fe}
.kpi small{color:#94a3b8}

/* Sticky filter bar (chips, sort, view) */
.stickybar{position:sticky;top:64px;z-index:20;background:#0f1115;border-top:1px solid #1d2330;border-bottom:1px solid #1d2330}
.stickybar-inner{display:flex;align-items:center;justify-content:space-between;padding:12px 0;gap:12px}
.chips{display:flex;gap:8px;flex-wrap:wrap}
.chip{border:1px solid #263244;background:#121722;color:#c7d2fe;padding:8px 12px;border-radius:999px;cursor:pointer;transition:.25s}
.chip.active, .chip:hover{border-color:#2f9ad1;background:#0f172a;color:#e2f6ff;box-shadow:0 8px 24px rgba(34,204,255,.15)}
.sortview{display:flex;gap:10px;align-items:center}
.select{padding:10px;border-radius:12px;border:1px solid #243043;background:#0f131b;color:#cfefff}
.toggle{display:flex;border:1px solid #243043;border-radius:12px;overflow:hidden}
.toggle button{background:#0f131b;border:0;padding:10px 12px;color:#cfefff}
.toggle button.active{background:#172032}

/* Layout: sidebar + results */
.layout{display:grid;grid-template-columns:280px 1fr;gap:20px;margin-top:20px}
.sidebar{position:sticky;top:112px;align-self:start;background:#121722;border:1px solid #1e2633;border-radius:16px;padding:16px}
.side h4{margin:8px 0 12px}
.range, .check, .tagbox, .avail{margin-bottom:16px}
.range input[type=range]{width:100%}
.list{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px}
.list.list-view{grid-template-columns:1fr}

/* Provider Card (HTML-editable) */
.card{position:relative;background:linear-gradient(180deg,#141821,#0f1115);border:1px solid #1e2633;border-radius:16px;padding:14px;transition:.25s;overflow:hidden}
.card:hover{transform:translateY(-4px);box-shadow:0 18px 60px rgba(34,204,255,.12), 0 2px 0 rgba(139,92,246,.2)}
.card .thumb{height:160px;border-radius:12px;overflow:hidden;margin-bottom:10px}
.card .thumb img{width:100%;height:100%;object-fit:cover;display:block;transition:scale .35s}
.card:hover .thumb img{scale:1.05}
.card .title{display:flex;align-items:center;gap:8px;margin:6px 0}
.tick{display:inline-flex;align-items:center;justify-content:center;width:20px;height:20px;border-radius:999px;background:#0ea5e9}
.tick svg{width:14px;height:14px}
.meta{display:flex;gap:10px;color:#a5b4fc;font-size:13px;flex-wrap:wrap}
.desc{color:#9aa4b2;font-size:14px;margin:6px 0 10px; padding-bottom: 50px;}
.cta{display:flex;gap:10px}
.ghost{background:transparent;border:1px solid #2a3b52;padding:10px 12px;border-radius:10px;color:#dbeafe}
.price{position:absolute;top:12px;right:12px;background:#0b1220;border:1px solid #203049;color:#cfefff;padding:6px 10px;border-radius:12px;font-weight:700}
.rating{position:absolute;top:12px;left:12px;background:#0b1220;border:1px solid #203049;color:#ffe58a;padding:6px 10px;border-radius:12px;font-weight:700}

/* Load more + empty */
.loadmore{display:flex;justify-content:center;margin:18px 0}
.empty{padding:32px;text-align:center;color:#94a3b8;border:1px dashed #263244;border-radius:16px}

/* TRUST STRIP */
    .trust-strip{margin-top:24px;padding:14px;border-radius:12px;border:1px solid var(--border);background:linear-gradient(90deg, rgba(6,182,212,.04), rgba(124,58,237,.03));display:flex;gap:16px;align-items:center;justify-content: center;}
    .trust-strip:hover{
        border-color: white; /* border color change */
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 229, 255, 0.5); /* shadow */
    }


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

<!-- ======= HERO (Category + Quick Search) ======= -->
<section class="hero">
  <div class="wrap hero-row">
    <div class="hero-card">
      <h1>Find trusted local pros near you.</h1>
      <p>Verified providers, transparent pricing, real ratings. Book with confidence.</p>
      <div class="searchbox">
        <select id="qCategory">
          <option value="">All Categories</option>
          <option>Plumber</option><option>Electrician</option><option>Carpenter</option>
          <option>Salon</option><option>Cleaning</option><option>Tutor</option>
          <option>Painter</option><option>AC Repair</option><option>Electronics</option>
        </select>
        <input id="qText" type="text" placeholder="Search by name, tag, location..." />
        <button class="btn" id="qBtn">Search</button>
      </div>
      <div class="trust">
        <div class="kpi"><strong id="kpiProviders"><?= count($providers) ?></strong><small>Verified Providers</small></div>
        <div class="kpi"><strong>4.7★</strong><small>Avg Rating</small></div>
        <div class="kpi"><strong>10K+</strong><small>Bookings</small></div>
      </div>
    </div>
    <div class="hero-card">
      <span class="badge">✅ Safety & Verification</span>
      <h3 style="margin:10px 0">Every profile is reviewed by admin with ID proof.</h3>
      <p class="desc">Your safety matters. We approve only genuine providers—with a blue tick when verified.</p>
      <a class="btn" href="create-profile.php">Become a Provider</a>
    </div>
  </div>
</section>

<!-- ======= STICKY FILTER BAR ======= -->
<div class="stickybar">
  <div class="wrap stickybar-inner">
    <div class="chips" id="chips">
      <div class="chip" data-chip="verified">Verified</div>
      <div class="chip" data-chip="today">Available Today</div>
      <div class="chip" data-chip="under500">Under ₹500</div>
      <div class="chip" data-chip="rating4">Rating 4+</div>
    </div>
    <div class="sortview">
      <select id="sort" class="select">
        <option value="">Sort</option>
        <option value="priceAsc">Price: Low → High</option>
        <option value="priceDesc">Price: High → Low</option>
        <option value="ratingDesc">Rating: High → Low</option>
      </select>
      <div class="toggle">
        <button id="gridBtn" class="active">Grid</button>
        <button id="listBtn">List</button>
      </div>
    </div>
  </div>
</div>

<!-- ======= LAYOUT: SIDEBAR + RESULTS ======= -->
<main class="wrap layout" id="results">
  <!-- Sidebar Filters -->
  <aside class="sidebar side">
    <div class="range">
      <h4>Price Range (₹)</h4>
      <input type="range" min="100" max="5000" step="50" value="2500" id="priceRange"/>
      <div style="display:flex;justify-content:space-between;color:#9aa4b2"><small>100</small><small id="priceVal">2500</small></div>
    </div>
    <div class="range">
      <h4>Minimum Rating</h4>
      <input type="range" min="1" max="5" step="0.1" value="3.5" id="ratingRange"/>
      <div style="display:flex;justify-content:space-between;color:#9aa4b2"><small>1.0</small><small id="ratingVal">3.5</small></div>
    </div>
    <div class="check">
      <h4>Verified</h4>
      <label style="display:flex;gap:8px;align-items:center;color:#cfefff">
        <input type="checkbox" id="verifiedOnly"/> Show only verified
      </label>
    </div>
    <div class="tagbox">
      <h4>Tags</h4>
      <input id="tagInput" placeholder="e.g., kitchen, wiring, haircut" style="width:100%;padding:10px;border-radius:10px;border:1px solid #243043;background:#0f131b;color:#cfefff" />
      <small style="color:#9aa4b2">comma separated</small>
    </div>
    <div class="avail">
      <h4>Availability</h4>
      <select id="availability" class="select" style="width:100%">
        <option value="">Any</option>
        <option>Today</option>
        <option>Tomorrow</option>
        <option>This Week</option>
        <option>Weekends</option>
      </select>
    </div>
  </aside>

  <!-- Results Area -->
  <section>
    <div class="list" id="cards">
      <!-- Provider cards rendered below (editable HTML, with data-attributes for JS) -->
      <?php if (empty($providers)): ?>
        <div class="empty">No verified providers yet. Be the first — <a class="btn" style="margin-left:8px" href="<?= url('create-profile.php') ?>">Create Profile</a></div>
      <?php else: foreach ($providers as $p): ?>
        <article class="card" 
          data-price="<?= (int)$p['price'] ?>"
          data-rating="<?= (float)$p['rating'] ?>"
          data-verified="<?= (int)$p['verified'] ?>"
          data-tags="<?= sanitize($p['tags']) ?>"
          data-availability="<?= sanitize($p['availability']) ?>"
          data-category="<?= sanitize($p['service']) ?>"
          data-name="<?= sanitize($p['name']) ?>"
          data-location="<?= sanitize($p['location']) ?>">
          <div class="rating"><?= number_format((float)$p['rating'],1) ?>★</div>
          <div class="price">From ₹<?= (int)$p['price'] ?></div>
          <div class="thumb"><img src="/<?= htmlspecialchars($p['photo_path']) ?>" alt="<?= htmlspecialchars($p['name']) ?>"></div>
          <div class="title">
            <h3 style="margin:0"><?= sanitize($p['name']) ?></h3>
            <?php if ($p['verified']): ?>
              <span class="tick" title="Verified">
                <svg viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#e6faff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            <?php endif; ?>
          </div>
          <div class="meta">
            <span><?= sanitize($p['service']) ?></span> • 
            <span><?= sanitize($p['location']) ?></span> •
            <span><?= (int)$p['experience_years'] ?> yrs exp</span>
          </div>
          <p class="desc"><?= sanitize($p['short_desc']) ?></p>
          <div class="cta">
            <a class="ghost" href="provider.php?id=<?= $p['id'] ?>">View Details</a>
            <a class="btn" href="provider.php?id=<?= $p['id'] ?>#book">Book / Contact</a>
          </div>
        </article>
      <?php endforeach; endif; ?>
    </div>

    <!-- Load more -->
    <div class="loadmore"><button class="btn" id="loadMoreBtn">Load More</button></div>
  </section>
</main>

<!-- Trust strip -->
        <div class="trust-strip" style="margin-top:28px">
          <div style="font-weight:700">Verified & Secure</div>
          <div class="muted" style="font-size:13px">All professionals undergo KYC & background checks. Payments secured by escrow.</div>
        </div>

<!-- 🌟 HOW IT WORKS -->
<section class="how-it-works" style="padding:50px 20px; background:transparent; color:#fff; text-align:center;">
    <h2 style="font-size:2.5rem; margin-bottom:40px;">How It Works</h2>
    <div style="display:flex; justify-content:center; flex-wrap:wrap; gap:30px;">
        <div class="step-card">
            <div class="icon">🔍</div>
            <h3>Search Service</h3>
            <p>Find trusted local professionals for any service you need.</p>
        </div>
        <div class="step-card">
            <div class="icon">📋</div>
            <h3>Choose Provider</h3>
            <p>Compare ratings, reviews, and pricing to pick the best.</p>
        </div>
        <div class="step-card">
            <div class="icon">💳</div>
            <h3>Book & Pay</h3>
            <p>Secure online payment to confirm your booking instantly.</p>
        </div>
        <div class="step-card">
            <div class="icon">✅</div>
            <h3>Service Delivered</h3>
            <p>Provider arrives on time and gets the job done right.</p>
        </div>
    </div>
</section>

<style>
.step-card {
    background: transparent;
    padding: 30px;
    border-radius: 15px;
    width: 220px;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255,255,255,0.1);
}
.step-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 20px rgba(255,255,255,0.3);
}
.step-card .icon {
    font-size: 40px;
    margin-bottom: 15px;
}
</style>

<!-- 💎 WHY CHOOSE US -->
<section style="padding: top -10px;; background:transparent; color:#fff; text-align:center;">
    <h2 style="font-size:2.5rem; margin-bottom:40px;">Why Choose Us</h2>
    <div style="display:flex; justify-content:center; flex-wrap:wrap; gap:30px;">
        <div class="why-card">✔ Verified Providers</div>
        <div class="why-card">🔒 Secure Payments</div>
        <div class="why-card">📞 24/7 Support</div>
        <div class="why-card">💰 Affordable Pricing</div>
        <div class="why-card">⚡ Instant Booking</div>
        <div class="why-card">⭐ Top-rated Services</div>
    </div>
</section>

<style>
.why-card {
    background: rgba(255,255,255,0.05);
    padding: 10px;
    border-radius: 12px;
    width: 200px;
    transition: 0.3s ease;
}
.why-card:hover {
    transform: scale(1.05);
    background: rgba(255,255,255,0.1);
    box-shadow: 0 0 15px rgba(255,255,255,0.2);
}
</style>        

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


<script>
// ======= Frontend JS: Filters, Sort, View Toggle, Load More =======

// Helper: read all cards into array
const cardsWrap = document.getElementById('cards');
const allCards = Array.from(cardsWrap.querySelectorAll('.card'));

// State
let currentView = 'grid';         // or 'list'
let visibleCount = 6;             // initial items to show
const step = 6;

// DOM refs
const gridBtn = document.getElementById('gridBtn');
const listBtn = document.getElementById('listBtn');
const sortSel = document.getElementById('sort');
const loadMoreBtn = document.getElementById('loadMoreBtn');
const priceRange = document.getElementById('priceRange');
const ratingRange = document.getElementById('ratingRange');
const verifiedOnly = document.getElementById('verifiedOnly');
const tagInput = document.getElementById('tagInput');
const availabilitySel = document.getElementById('availability');
const priceVal = document.getElementById('priceVal');
const ratingVal = document.getElementById('ratingVal');
const chips = document.getElementById('chips');
const qCategory = document.getElementById('qCategory');
const qText = document.getElementById('qText');
const qBtn = document.getElementById('qBtn');

// Display helper
function updateViewToggle(){
  if(currentView==='grid'){ cardsWrap.classList.remove('list-view'); gridBtn.classList.add('active'); listBtn.classList.remove('active'); }
  else { cardsWrap.classList.add('list-view'); listBtn.classList.add('active'); gridBtn.classList.remove('active'); }
}
gridBtn.onclick = ()=>{currentView='grid'; updateViewToggle();}
listBtn.onclick = ()=>{currentView='list'; updateViewToggle();}
updateViewToggle();

// Load more logic
function applyVisibility(filtered){
  allCards.forEach(c=>c.style.display='none');
  filtered.slice(0, visibleCount).forEach(c=>c.style.display='block');
  loadMoreBtn.style.display = filtered.length > visibleCount ? 'inline-flex' : 'none';
}
loadMoreBtn.onclick = ()=>{ visibleCount += step; filterAll(); };

// Core filter
function filterAll(){
  // read controls
  const maxPrice = +priceRange.value;
  const minRating = +ratingRange.value;
  const vOnly = verifiedOnly.checked;
  const tags = tagInput.value.toLowerCase().split(',').map(s=>s.trim()).filter(Boolean);
  const avail = availabilitySel.value;
  const qCat = qCategory.value;
  const query = qText.value.toLowerCase().trim();

  // chip quick filters
  const chipActive = (key)=> !!chips.querySelector(`.chip[data-chip="${key}"].active`);
  const chipVerified = chipActive('verified');
  const chipToday = chipActive('today');
  const chipUnder500 = chipActive('under500');
  const chipRating4 = chipActive('rating4');

  // filter
  let filtered = allCards.filter(card=>{
    const price = +card.dataset.price;
    const rating = +card.dataset.rating;
    const verified = +card.dataset.verified===1;
    const cardTags = (card.dataset.tags||'').toLowerCase();
    const cardAvail = (card.dataset.availability||'').toLowerCase();
    const category = (card.dataset.category||'').toLowerCase();
    const name = (card.dataset.name||'').toLowerCase();
    const location = (card.dataset.location||'').toLowerCase();

    if (price > maxPrice) return false;
    if (rating < minRating) return false;
    if (vOnly && !verified) return false;
    if (avail && card.dataset.availability !== avail) return false;
    if (qCat && card.dataset.category !== qCat) return false;

    if (tags.length){
      for (let t of tags){ if (!cardTags.includes(t)) return false; }
    }

    if (query){
      const hay = [name, location, category, cardTags].join(' ');
      if (!hay.includes(query)) return false;
    }

    if (chipVerified && !verified) return false;
    if (chipToday && cardAvail!=='today') return false;
    if (chipUnder500 && price>=500) return false;
    if (chipRating4 && rating<4) return false;

    return true;
  });

  // sort
  const val = sortSel.value;
  if (val==='priceAsc') filtered.sort((a,b)=> (+a.dataset.price) - (+b.dataset.price));
  if (val==='priceDesc') filtered.sort((a,b)=> (+b.dataset.price) - (+a.dataset.price));
  if (val==='ratingDesc') filtered.sort((a,b)=> (+b.dataset.rating) - (+a.dataset.rating));

  // apply visibility (pagination)
  applyVisibility(filtered);

  // empty state if none visible
  if (filtered.length===0){
    cardsWrap.innerHTML = `<div class="empty">No results. Try changing filters.</div>`;
    loadMoreBtn.style.display='none';
  }
}

// Events
[priceRange, ratingRange, verifiedOnly, availabilitySel, sortSel].forEach(el=> el.addEventListener('input', ()=>{
  priceVal.textContent = priceRange.value; ratingVal.textContent = ratingRange.value; visibleCount=6; filterAll();
}));
tagInput.addEventListener('input', ()=>{ visibleCount=6; filterAll(); });
chips.addEventListener('click', (e)=>{ if(e.target.classList.contains('chip')){ e.target.classList.toggle('active'); visibleCount=6; filterAll(); }});
qBtn.addEventListener('click', ()=>{ visibleCount=6; filterAll(); });

// Initial mount
priceVal.textContent = priceRange.value; ratingVal.textContent = ratingRange.value;
// first filter pass
filterAll();
</script>
</body>
</html>

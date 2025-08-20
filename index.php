<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>HouseWise — Premium Local Service Finder</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg-0:#020617; --bg-1:#071026; --glass:rgba(255,255,255,.04); --glass-2:rgba(255,255,255,.06);
      --text:#e6eef8; --muted:#a4b1c7; --primary:#06b6d4; --accent:#7c3aed; --ok:#22c55e; --warn:#f59e0b;
      --border:rgba(255,255,255,.08); --shadow:0 14px 40px rgba(0,0,0,.35);
      --glow-teal:0 18px 40px rgba(6,182,212,.18); --glow-violet:0 18px 40px rgba(124,58,237,.18);
      --radius-1:14px; --radius-2:18px; --radius-3:22px; --speed:.22s; --ease:cubic-bezier(.2,.9,.3,1);
      --link:#9bb4ff; --link-hover:#c7d3ff;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:var(--text);
      background:
        radial-gradient(900px 900px at 100% 0%, rgba(6,182,212,.08) 0%, rgba(6,182,212,0) 60%),
        radial-gradient(700px 700px at 0% 100%, rgba(124,58,237,.10) 0%, rgba(124,58,237,0) 60%),
        linear-gradient(180deg,var(--bg-0) 0%, var(--bg-1) 100%);
    }
    .container{max-width:1200px;margin:5px auto;padding:0 24px; padding-top: 10px;}
    .row{display:flex;gap:24px;flex-wrap:wrap}
    .card{background:var(--glass);border:1px solid var(--border);border-radius:var(--radius-2);box-shadow:var(--shadow)}
    .btn{cursor:pointer;border:none;border-radius:12px;padding:10px 16px;font-weight:600}
    .btn-primary{background:var(--primary);color:#0b1220;transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease)}
    .btn-primary:hover{transform:translateY(-2px); box-shadow:0 10px 24px rgba(6,182,212,.25)}
    .btn-ghost{background:transparent;color:var(--text);border:1px solid var(--border)}
    .badge{display:inline-flex;align-items:center;gap:8px;font-size:12px;padding:6px 10px;border-radius:999px;border:1px solid var(--border);background:rgba(2,6,23,.35)}
    .muted{color:var(--muted)}
    .no-scrollbar::-webkit-scrollbar{display:none}
    .no-scrollbar{scrollbar-width:none;-ms-overflow-style:none}

    .topbar{border-bottom:1px solid var(--border);background:rgba(2,6,23,.5);backdrop-filter:blur(8px)}
    .topbar .container{display:flex;align-items:center;justify-content:space-between;padding:8px 24px}

    header{position:sticky;top:0;z-index:50;background:rgba(2,6,23,.55);backdrop-filter:blur(8px);border-bottom:1px solid var(--border)}
    .nav{display:flex;align-items:center;justify-content:space-between;padding:16px 24px}
    .brand{display:flex;align-items:center;gap:10px}
    .logo{font-weight:800;font-size:22px;color:var(--primary)}
    .nav-links{display:flex;gap:22px;align-items:center}
    .nav-links a{color:var(--muted);text-decoration:none;font-size:14px;position:relative}
    .nav-links a:after{content:"";position:absolute;left:0;bottom:-6px;height:2px;width:0;background:linear-gradient(90deg,var(--primary),var(--accent));transition:width .25s var(--ease)}
    .nav-links a:hover{color:var(--text)}
    .nav-links a:hover:after{width:100%}

    .hero{position:relative;padding:56px 0}
    .hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:32px}
    .hero h1{font-size:42px;line-height:1.15;margin:0 0 12px}
    .hero h1 span{color:var(--primary)}
    .hero p{margin:0 0 16px;color:var(--muted)}
    .search{padding:18px;border-radius:20px}
    .search .row{gap:14px}
    .field{flex:1;display:flex;flex-direction:column;gap:6px}
    .label{font-size:11px;color:#9fb0c9}
    .input{padding:12px 12px;border-radius:10px;background:transparent;border:1px solid var(--border);color:var(--text)}
    .input::placeholder{color:#95a6c0}
    .hero-card{position:relative;border-radius:20px;overflow:hidden;border:1px solid var(--border)}
    .hero-card img{width:100%;height:330px;object-fit:cover;transform:scale(1.04)}
    .hero-chip{position:absolute;left:16px;bottom:16px;background:rgba(2,6,23,.6);border:1px solid var(--border);padding:10px 12px;border-radius:14px;display:flex;gap:10px;align-items:center}
    .hero-flag{position:absolute;right:14px;top:14px;background:linear-gradient(90deg,var(--primary),var(--accent));color:#0b1220;padding:6px 10px;border-radius:999px;font-size:12px;font-weight:700}
    #animated_gradient_texts {
  background: linear-gradient(270deg, #AF1740, #9ECAD6, #B13BFF, #FFCC00);
  background-size: 800% 800%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: animatedGradient 8s ease infinite;
}

@keyframes animatedGradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
/* close first heading color design */

  /* heading animation color code */

  #animated_gradient_text {
  background: linear-gradient(270deg, #00ffff, #ff00ff, #ffff00, #00ffff);
  background-size: 800% 800%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: animatedGradient 8s ease infinite;
}

@keyframes animatedGradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
.animated_gradient_texts {
  background: linear-gradient(270deg, #67575bff, #9ECAD6, #3bffb7ff, #fc9b72ff);
  background-size: 800% 800%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: animatedGradient 8s ease infinite;
}

@keyframes animatedGradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
/* close first heading color design */

  /* heading animation color code */

  .animated_gradient_text {
  background: linear-gradient(270deg, #1df77cff, #ff0011ff, #ffff00, #003cffff);
  background-size: 800% 800%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: animatedGradient 8s ease infinite;
}

@keyframes animatedGradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
    .section-head{display:flex;align-items:center;justify-content:space-between;margin-top:8px;margin-bottom:8px}
    .grid-6{display:grid;grid-template-columns:repeat(6,1fr);gap:14px}
    .cat{padding:14px;border-radius:18px;border:1px solid var(--border);background:rgba(2,6,23,.45);transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease), border-color var(--speed) var(--ease)}
    .cat:hover{transform:translateY(-6px);box-shadow:var(--glow-teal);border-color:rgba(6,182,212,.25)}
    .cat .icon{font-size:20px;background:rgba(148,163,184,.12);padding:10px;border-radius:10px;display:inline-flex}
    .cat .name{font-weight:600;margin-top:8px}
    .cat .price{font-size:12px;color:var(--muted)}

    .carousel-wrap{position:relative}
    .carousel{display:flex;gap:16px;overflow-x:auto;scroll-snap-type:x mandatory;scroll-behavior:smooth;padding-bottom:8px}
    .carousel article{scroll-snap-align:start;min-width:300px;background:rgba(2,6,23,.55);border:1px solid var(--border);border-radius:18px;overflow:hidden;transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease)}
    .carousel article:hover{transform:translateY(-6px);box-shadow:var(--glow-violet)}
    .carousel article:hover{
      border-color: rgba(6,182,212,.25); /* hover me border color change */
      transform: translateY(-5px); /* thoda lift effect */
    }
    .prov-img{width:100%;height:160px;object-fit:cover}
    .prov-body{padding:14px}
    .prov-top{display:flex;align-items:center;justify-content:space-between}
    .prov-title{font-weight:700}
    .prov-sub{font-size:12px;color:var(--muted)}
    .prov-actions{display:flex;align-items:center;justify-content:space-between;margin-top:10px}

    /* NEW: Iconified carousel controls */
    .nav-btn{position:relative;height:0}
    .nav-controls{
      position:absolute; top:-52px; right:0; display:flex; gap:10px; z-index:5;
    }
    .icon-btn{
      width:42px;height:42px;border-radius:12px;border:1px solid var(--border);
      background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
      color:var(--text); cursor:pointer; display:grid; place-items:center;
      transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease), border-color var(--speed) var(--ease), background var(--speed) var(--ease);
    }
    .icon-btn svg{width:18px;height:18px;opacity:.95}
    .icon-btn:hover{transform:translateY(-2px); box-shadow:0 12px 28px rgba(124,58,237,.25); border-color:rgba(124,58,237,.35); background:linear-gradient(180deg, rgba(124,58,237,.18), rgba(255,255,255,.02))}
    .icon-btn:active{transform:translateY(0)}

    .how{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
    .how .step{display:flex;gap:12px;align-items:flex-start}
    .i-box{padding:10px;border-radius:12px;background:#0f172a;border:1px solid var(--border);color:var(--primary)}

    .trust-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
    .trust-card{padding:18px;border-radius:18px;background:linear-gradient(160deg, rgba(15,23,42,.7), rgba(2,6,23,.6));border:1px solid var(--border)}
    .trust-points{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:12px}
    .t-item{display:flex;gap:10px;align-items:flex-start}
    .t-icon{padding:10px;border-radius:10px;background:#0f172a;border:1px solid var(--border)}
    .partners{display:flex;gap:10px;flex-wrap:wrap;margin-top:14px}
    .partner{background:#0f172a;border:1px solid var(--border);border-radius:10px;padding:8px 10px;font-size:12px}

    .t-wrap{padding:18px;border-radius:18px;background:rgba(2,6,23,.55);border:1px solid var(--border)}
    .t-card{background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:12px;padding:12px}
    .t-ctrl{display:flex;gap:8px;margin-top:10px}
    .t-ctrl button{border:1px solid var(--border);background:rgba(2,6,23,.5);color:var(--text);padding:8px 10px;border-radius:10px;cursor:pointer}
    .t-ctrl button:hover{background:rgba(255,255,255,.06)}

    .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    .stat{padding:22px;text-align:center;border-radius:18px;background:rgba(2,6,23,.45);border:1px solid var(--border)}
    .big{font-size:26px;font-weight:800;color:var(--primary)}

    .cta{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:24px;border-radius:20px;background:linear-gradient(90deg, rgba(6,182,212,.14), rgba(124,58,237,.10))}

    .news{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
    .news input{padding:12px 12px;border-radius:10px;background:transparent;border:1px solid var(--border);color:var(--text);min-width:260px}

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
  <!-- Top mini bar -->
  <div class="topbar">
    <div class="container">
      <div class="row" style="gap:10px;align-items:center">
        <span class="muted">Services in</span>
        <select id="citySelect" class="input" style="padding:6px 10px;height:32px;max-width:160px">
          <option>Lucknow</option><option>Delhi</option><option>Mumbai</option><option>Bengaluru</option>
        </select>
      </div>
      <div class="row" style="gap:16px;align-items:center">
        <a class="muted" href="#">Help</a>
        <a class="muted" href="tel:+919999999999">+91 99999 99999</a>
        <div class="row" style="gap:8px">
          <button class="btn btn-primary">Login</button>
          <button class="btn btn-ghost">Sign up</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Header / Nav -->
  <header>
    <div class="container nav">
      <div class="brand">
        <div class="logo">HouseWise</div>
        <div class="muted">Trusted local services in <span id="cityLabel">Lucknow</span></div>
      </div>
      <nav class="nav-links">
        <a href="s.php">Services</a>
        <a href="#how">How it works</a>
        <a href="#providers">For Providers</a>
        <a href="#pricing">Pricing</a>
        <a href="#blog">Blog</a>
        <button id="bookTop" class="btn btn-primary">Book Service</button>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <h1 class="fade-up" id="animated_gradient_texts">Trusted Plumbers, Electricians &amp; More — <span class="animated_gradient_texts">Near You</span></h1>
        <p class="fade-up" style="transition-delay:.08s">Verified professionals • Secure payments • Same-day bookings • KYC &amp; background-checked</p>

        <form id="searchForm" class="card search fade-up" style="transition-delay:.15s">
          <div class="row">
            <div class="field">
              <label class="label">Service</label>
              <input id="serviceInput" class="input" placeholder="e.g. Plumber, Electrician, Cleaner" />
            </div>
            <div class="field" style="max-width:220px">
              <label class="label">Location</label>
              <input id="locationInput" class="input" placeholder="Lucknow" />
            </div>
            <div class="field" style="max-width:170px">
              <label class="label">When</label>
              <input id="dateInput" type="date" class="input" />
            </div>
            <div class="field" style="max-width:140px">
              <label class="label">&nbsp;</label>
              <button class="btn btn-primary" style="width:100%">Search</button>
            </div>
          </div>
          <div class="muted" style="font-size:12px;margin-top:8px">1000+ providers in <span id="cityText">Lucknow</span> • Avg. rating <span style="color:var(--warn);font-weight:700">4.8</span> ⭐</div>
        </form>

        <div class="row reveal-children" style="margin-top:14px">
          <span class="badge">🛡️ KYC Verified Pros</span>
          <span class="badge">💳 Escrow Payments</span>
          <span class="badge">⭐ Avg. Rating 4.8</span>
        </div>
      </div>

      <div class="hero-card fade-up" style="transition-delay:.1s">
        <img src="images/plumber.jpg" alt="local service" style="object-fit: cover; width:100%; height:100%">
        <div class="hero-chip">
          <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=60" alt="" style="width:44px;height:44px;border-radius:50%;object-fit:cover;border:1px solid var(--border)">
          <div>
            <div style="font-weight:700">Rahul Sharma</div>
            <div class="muted" style="font-size:12px">Top Rated Plumber • <span style="color:var(--primary)">₹299</span></div>
          </div>
        </div>
        <div class="hero-flag">Featured • Verified</div>
      </div>
    </div>
  </section>

  <!-- Popular Categories (EXACT 6 CARDS - edit directly in HTML) -->
  <section id="services" class="container">
    <div class="section-head">
      <h3 style="margin:0">Popular Categories</h3>
      <p class="muted" style="margin:0;font-size:14px">Choose a service — fast booking &amp; verified pros</p>
    </div>

    <div class="grid-6 reveal-children">
      <div class="cat lift"><div class="icon">🔧</div><div class="name">Plumber</div><div class="price">From ₹299</div></div>
      <div class="cat lift"><div class="icon">💡</div><div class="name">Electrician</div><div class="price">From ₹249</div></div>
      <div class="cat lift"><div class="icon">🪚</div><div class="name">Carpenter</div><div class="price">From ₹399</div></div>
      <div class="cat lift"><div class="icon">💄</div><div class="name">Salon at Home</div><div class="price">From ₹499</div></div>
      <div class="cat lift"><div class="icon">🧹</div><div class="name">Cleaning</div><div class="price">From ₹199</div></div>
      <div class="cat lift"><div class="icon">📚</div><div class="name">Tutor</div><div class="price">From ₹349</div></div>
    </div>
  </section>

  <!-- Featured Providers (HTML-based Carousel) -->
  <section id="providers" class="container" style="margin-top:28px">
    <div class="section-head">
      <h3 style="margin:0">Featured Providers</h3>
      <div class="nav-btn">
        <div class="nav-controls">
          <!-- Icons visible & stylish -->
          <button id="prevBtn" class="icon-btn" aria-label="Previous">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M15 18l-6-6 6-6"/>
            </svg>
          </button>
          <button id="nextBtn" class="icon-btn" aria-label="Next">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M9 18l6-6-6-6"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div id="carousel" class="carousel no-scrollbar">
      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1542736667-069246bdbc74?auto=format&fit=crop&w=800&q=60" alt="Rahul Sharma">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Rahul Sharma</div><div class="prov-sub">Plumber</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹299</div><div class="prov-sub">4.9 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Top Rated</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>

      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=60" alt="Deepa Electric">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Deepa Electric</div><div class="prov-sub">Electrician</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹249</div><div class="prov-sub">4.8 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Quick Response</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>

      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=60" alt="Amaan Carpentry">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Amaan Carpentry</div><div class="prov-sub">Carpenter</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹399</div><div class="prov-sub">4.7 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Verified</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>

      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=60" alt="Glam n' Glow">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Glam n' Glow</div><div class="prov-sub">Salon</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹499</div><div class="prov-sub">4.85 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Top Rated</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>

      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=60" alt="Glam n' Glow">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Glam n' Glow</div><div class="prov-sub">Salon</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹499</div><div class="prov-sub">4.85 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Top Rated</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>


      <article class="lift">
        <img class="prov-img" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=60" alt="Glam n' Glow">
        <div class="prov-body">
          <div class="prov-top">
            <div><div class="prov-title">Glam n' Glow</div><div class="prov-sub">Salon</div></div>
            <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹499</div><div class="prov-sub">4.85 ⭐</div></div>
          </div>
          <div class="prov-actions"><span class="prov-sub">Top Rated</span><button class="btn btn-primary">Book</button></div>
        </div>
      </article>
      <!-- Add more <article> blocks if needed -->
    </div>
    <div class="muted" style="font-size:13px;margin-top:6px">Auto-play • Hover to pause • Edit providers directly in HTML</div>
  </section>

  <!-- How it works -->
  <section id="how" class="container" style="margin-top:28px">
    <h3 style="margin:0 0 10px 0">How It Works</h3>
    <div class="how reveal-children">
      <div class="step card"><div class="i-box">🔎</div><div style="padding:14px 14px 14px 0"><div style="font-weight:700">Search Service</div><div class="muted">Type the service &amp; location to find trusted pros.</div></div></div>
      <div class="step card"><div class="i-box">⏱️</div><div style="padding:14px 14px 14px 0"><div style="font-weight:700">Book &amp; Pay</div><div class="muted">Choose slot, pay securely (escrow) or pay on completion.</div></div></div>
      <div class="step card"><div class="i-box">✅</div><div style="padding:14px 14px 14px 0"><div style="font-weight:700">Service Done</div><div class="muted">Rate provider &amp; get invoice &amp; warranty if available.</div></div></div>
    </div>
  </section>

  <!-- Trust & Testimonials -->
  <section id="trust" class="container" style="margin-top:28px">
    <div class="trust-grid">
      <div class="trust-card">
        <h4 style="margin:0 0 8px 0">Trusted by thousands — Built for safety</h4>
        <p class="muted" style="margin-top:6px">We verify professionals with KYC, background checks and service history. Secure escrow payments protect both parties.</p>
        <div class="trust-points">
          <div class="t-item"><div class="t-icon">🪪</div><div><div style="font-weight:700">KYC &amp; Background</div><div class="muted" style="font-size:14px">ID verification &amp; checks</div></div></div>
          <div class="t-item"><div class="t-icon">💳</div><div><div style="font-weight:700">Escrow Payments</div><div class="muted" style="font-size:14px">Release after completion</div></div></div>
          <div class="t-item"><div class="t-icon">⭐</div><div><div style="font-weight:700">Ratings &amp; Reviews</div><div class="muted" style="font-size:14px">Verified customers only</div></div></div>
          <div class="t-item"><div class="t-icon">🛡️</div><div><div style="font-weight:700">Insurance &amp; Guarantee</div><div class="muted" style="font-size:14px">Optional job insurance</div></div></div>
        </div>
        <div class="partners"><span class="partner">RBI e-mandate</span><span class="partner">Aadhaar KYC</span><span class="partner">PCI Payments</span></div>
      </div>

      <div class="t-wrap">
        <h4 style="margin:0 0 10px 0">What users say</h4>
        <div id="testimonials" style="display:grid;gap:10px">
          <div class="t-card"><div class="row" style="gap:10px;align-items:center"><img src="https://randomuser.me/api/portraits/women/44.jpg" style="width:46px;height:46px;border-radius:50%;object-fit:cover;border:1px solid var(--border)" alt=""><div><div style="font-weight:700">Sunita Verma <span class="muted" style="font-weight:400">• Lucknow</span></div><div class="muted" style="font-size:14px;margin-top:4px">Bahut accha service! Plumber 30 min me aaya, dheere aur sahi kaam kiya.</div></div></div></div>
          <div class="t-card"><div class="row" style="gap:10px;align-items:center"><img src="https://randomuser.me/api/portraits/men/32.jpg" style="width:46px;height:46px;border-radius:50%;object-fit:cover;border:1px solid var(--border)" alt=""><div><div style="font-weight:700">Rohit Singh <span class="muted" style="font-weight:400">• Delhi</span></div><div class="muted" style="font-size:14px;margin-top:4px">Electrician ne jaldi fix kar diya, payment bhi safe tha.</div></div></div></div>
        </div>
        <div class="t-ctrl"><button id="testPrev">Prev</button><button id="testNext">Next</button><div style="margin-left:auto" class="muted">Average rating <span style="color:var(--warn);font-weight:800">4.8</span></div></div>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="container" style="margin-top:28px">
    <div class="stats">
      <div class="stat"><div class="big count" data-target="10000">0</div><div class="muted">Bookings Completed</div></div>
      <div class="stat"><div class="big count" data-target="1500">0</div><div class="muted">Verified Providers</div></div>
      <div class="stat"><div class="big">4.8</div><div class="muted">Avg. Rating</div></div>
      <div class="stat"><div class="big count" data-target="12">0</div><div class="muted">Cities Covered</div></div>
    </div>
  </section>

  <!-- CTA -->
  <section class="container" style="margin-top:28px">
    <div class="cta card">
      <div>
        <h3 style="margin:0">Need a service today?</h3>
        <p class="muted" style="margin:6px 0 0 0">Book now and get verified, trained professionals at your doorstep.</p>
      </div>
      <button id="ctaBook" class="btn btn-primary lift">Book Now</button>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="container" style="margin-top:18px">
    <div class="card" style="padding:18px;border-radius:18px">
      <div class="row" style="align-items:center;justify-content:space-between">
        <div>
          <h4 style="margin:0">Get offers &amp; updates</h4>
          <p class="muted" style="margin:6px 0 0 0">Subscribe for discounts and local offers.</p>
        </div>
        <form id="subscribeForm" class="news">
          <input placeholder="Enter email or phone" />
          <button class="btn btn-primary">Subscribe</button>
        </form>
      </div>
    </div>
  </section>

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
    // City sync
    const citySelect = document.getElementById('citySelect');
    const cityLabel = document.getElementById('cityLabel');
    const cityText = document.getElementById('cityText');
    citySelect.addEventListener('change', e=>{
      cityLabel.textContent = e.target.value;
      cityText.textContent = e.target.value;
      document.getElementById('locationInput').placeholder = e.target.value;
    });

    // Search form demo
    document.getElementById('searchForm').addEventListener('submit', e=>{
      e.preventDefault();
      const s = document.getElementById('serviceInput').value || 'Any Service';
      const l = document.getElementById('locationInput').value || cityText.textContent;
      alert(`Searching for ${s} in ${l}`);
      document.getElementById('providers').scrollIntoView({behavior:'smooth'});
    });

    // Year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Carousel logic
    const carousel = document.getElementById('carousel');
    const prevBtn   = document.getElementById('prevBtn');
    const nextBtn   = document.getElementById('nextBtn');
    function scrollByCards(dir=1){
      const card = carousel.querySelector('article');
      const step = card ? (card.getBoundingClientRect().width + 16) : 320;
      carousel.scrollBy({left:dir*step, behavior:'smooth'});
    }
    nextBtn.addEventListener('click',()=>scrollByCards(1));
    prevBtn.addEventListener('click',()=>scrollByCards(-1));

    // Autoplay with pause on hover
    let autoTimer = setInterval(()=>scrollByCards(1), 3000);
    carousel.addEventListener('mouseenter', ()=>clearInterval(autoTimer));
    carousel.addEventListener('mouseleave', ()=>{
      clearInterval(autoTimer);
      autoTimer = setInterval(()=>scrollByCards(1), 3000);
    });

    // Testimonials rotate
    const tWrap = document.getElementById('testimonials');
    document.getElementById('testNext').addEventListener('click', ()=>{
      if(tWrap.children.length>1) tWrap.appendChild(tWrap.children[0]);
    });
    document.getElementById('testPrev').addEventListener('click', ()=>{
      if(tWrap.children.length>1) tWrap.insertBefore(tWrap.lastElementChild, tWrap.firstElementChild);
    });

    // Counters
    const counters = document.querySelectorAll('.count');
    const io = new IntersectionObserver(entries=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          const el = entry.target;
          const target = +el.dataset.target;
          let cur = 0;
          const step = Math.max(1, Math.floor(target/100));
          const tick = setInterval(()=>{
            cur += step;
            if(cur >= target){ el.textContent = target.toLocaleString(); clearInterval(tick); }
            else el.textContent = cur.toLocaleString();
          }, 14);
          io.unobserve(el);
        }
      });
    }, {threshold:.6});
    counters.forEach(c=>io.observe(c));

    // Reveal on scroll
    const reveals = document.querySelectorAll('.fade-up, .reveal-children');
    const obs = new IntersectionObserver(entries=>{
      entries.forEach(ent=>{
        if(ent.isIntersecting){
          ent.target.classList.add('show');
          obs.unobserve(ent.target);
        }
      });
    }, {threshold:.25});
    reveals.forEach(el=>obs.observe(el));
  </script>
</body>
</html>

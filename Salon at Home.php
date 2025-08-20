<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>HouseWise — Services Listing (Premium Dark)</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    /* ==========================
       THEME VARIABLES
       ========================== */
    :root{
      --bg-0:#020617; --bg-1:#071026; --glass:rgba(255,255,255,.03); --border:rgba(255,255,255,.06);
      --text:#e6eef8; --muted:#9fb0c9; --primary:#06b6d4; --accent:#7c3aed; --warn:#f59e0b;
      --glow-teal:0 18px 40px rgba(6,182,212,.14); --glow-violet:0 18px 40px rgba(124,58,237,.12);
      --radius:14px; --speed:.22s; --ease:cubic-bezier(.2,.9,.3,1);
      --card-w:320px;
    }
    *{box-sizing:border-box}
    html,body{height:100%;margin:0;font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;background:
      radial-gradient(800px 600px at 90% 0%, rgba(6,182,212,.06), transparent 30%),
      radial-gradient(600px 500px at 0% 100%, rgba(124,58,237,.06), transparent 30%),
      linear-gradient(180deg,var(--bg-0),var(--bg-1));
      color:var(--text);-webkit-font-smoothing:antialiased}
    .container{max-width:1200px;margin:0 auto;padding:0 20px}

    /* Utilities */
    .row{display:flex;gap:16px;align-items:center;flex-wrap:wrap}
    .muted{color:var(--muted)}
    .btn{cursor:pointer;border:0;padding:10px 14px;border-radius:10px;font-weight:600}
    .btn-primary{background:var(--primary);color:#04121a}
    .glass{background:var(--glass);border:1px solid var(--border);border-radius:var(--radius);backdrop-filter:blur(6px)}
    .no-scrollbar::-webkit-scrollbar{display:none}
    .no-scrollbar{scrollbar-width:none;-ms-overflow-style:none}
    .lift{transition:transform var(--speed) var(--ease), box-shadow var(--speed) var(--ease)}
    .lift:hover{transform:translateY(-6px)}

    /* Header */
    header{padding:18px 0;position:sticky;top:0;z-index:60;background:rgba(2,6,23,.55);backdrop-filter:blur(6px);border-bottom:1px solid var(--border)}
    .brand{display:flex;align-items:center;gap:12px}
    .logo{font-weight:800;color:var(--primary);font-size:20px}
    nav a{color:var(--muted);text-decoration:none;margin-right:12px}
    nav a:hover{color:var(--text)}

    /* HERO */
    .hero{padding:28px 0 20px}
    .hero-grid{display:grid;grid-template-columns:1fr 420px;gap:24px;align-items:center}
    .hero h1{margin:0;font-size:34px;line-height:1.08}
    .hero h1 span{color:var(--primary)}
    .hero p{margin:8px 0 16px;color:var(--muted)}
    .search{padding:14px;border-radius:12px;border:1px solid var(--border);background:rgba(255,255,255,.02)}
    .search .row{gap:10px}
    .field{display:flex;flex-direction:column;gap:6px}
    .input{padding:10px;border-radius:10px;background:transparent;border:1px solid var(--border);color:var(--text)}
    .input::placeholder{color:#95a6c0}

    .hero-card{border-radius:14px;overflow:hidden;border:1px solid var(--border);position:relative}
    .hero-card img{width:100%;height:220px;object-fit:cover}
    .hero-chip{position:absolute;left:12px;bottom:12px;background:rgba(2,6,23,.65);padding:10px;border-radius:10px;border:1px solid var(--border);display:flex;gap:10px;align-items:center}

    /* PAGE LAYOUT: Two columns */
    .layout{display:grid;grid-template-columns:320px 1fr;gap:24px;margin-top:18px}
    /* Sidebar */
    .sidebar{position:sticky;top:94px;padding:16px;border-radius:12px;border:1px solid var(--border);background:rgba(255,255,255,.01);height:max-content}
    .filter-group{margin-bottom:14px}
    .filter-title{font-weight:700;margin-bottom:8px}
    .chip{display:inline-flex;align-items:center;padding:6px 10px;border-radius:999px;border:1px solid var(--border);background:rgba(255,255,255,.02);margin-right:8px;margin-bottom:8px;cursor:pointer}
    .chip.active{background:linear-gradient(90deg,var(--primary),var(--accent));color:#04121a;border-color:rgba(255,255,255,.06)}
    .range-row{display:flex;gap:8px;align-items:center}

    /* Results area */
    .results-top{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:12px}
    .active-filters{display:flex;gap:8px;flex-wrap:wrap}
    .filter-tag{background:rgba(255,255,255,.03);padding:6px 10px;border-radius:999px;border:1px solid var(--border);display:inline-flex;gap:8px;align-items:center}
    .view-toggle{display:flex;gap:8px}

    /* design a view toggle button grid and list */

    .view-toggle button {
    background: transparent;
    border: 2px solid #444;
    color: #ccc;
    padding: 8px 16px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.view-toggle button:hover {
    background: #00bcd4; /* color change */
    color: #fff;
    border-color: #00e5ff; /* border color change */
    box-shadow: 0 4px 15px rgba(0, 229, 255, 0.5); /* shadow */
}

/* .view-toggle button.active {
    background: #00bcd4;
    color: #fff;
    border-color: #00e5ff;
    box-shadow: 0 4px 15px rgba(0, 229, 255, 0.5);
} */


    /* Grid/List */
    .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
    .list{display:flex;flex-direction:column;gap:14px;margin-bottom:16px;}
    .card{background:rgba(255,255,255,.02);border:1px solid var(--border);border-radius:12px;overflow:hidden;transition:box-shadow var(--speed) var(--ease),transform var(--speed) var(--ease)}
    .card:hover{box-shadow:var(--glow-teal);transform:translateY(-6px)}
    .card .img{height:160px;background:#0b1220;object-fit:cover;width:100%}
    .card-body{padding:12px;display:flex;flex-direction:column;gap:8px}
    .card-row{display:flex;justify-content:space-between;align-items:center}
    .title{font-weight:700}
    .meta{font-size:13px;color:var(--muted);padding-right: 3px;}
    .pill{padding:6px 8px;border-radius:8px;border:1px solid var(--border);background:rgba(255,255,255,.02);font-size:13px}
    .card-foot{display:flex;justify-content:space-between;align-items:center;padding:12px;border-top:1px solid rgba(255,255,255,.02)}

    /* For list view cards */
    .list-card{display:flex;gap:12px;align-items:stretch; margin-bottom: 20px;}
    .list-card .img{width:150px;height:120px;flex:0 0 150px}
    .list-card .card-body{flex:1}

    /* Load more / pagination */
    .load-more{display:flex;justify-content:center;margin-top:16px}
    .empty{padding:40px;text-align:center;color:var(--muted)}

    /* TRUST STRIP */
    .trust-strip{margin-top:24px;padding:14px;border-radius:12px;border:1px solid var(--border);background:linear-gradient(90deg, rgba(6,182,212,.04), rgba(124,58,237,.03));display:flex;gap:16px;align-items:center}
    .trust-strip:hover{
        border-color: #00e5ff; /* border color change */
         transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 229, 255, 0.5); /* shadow */
    }

    /* NEW FOOTER (Redesigned) */
    footer{margin-top:28px; width: 100%;}
    .footer-wrap{
      margin-top:168px; border-top:1px solid var(--border);
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

    /* Responsive */
    @media (max-width:980px){
      .hero-grid{grid-template-columns:1fr}
      .layout{grid-template-columns:1fr;gap:20px}
      .sidebar{position:relative;top:auto}
      .grid{grid-template-columns:repeat(2,1fr)}
      .card .img{height:140px}
      .list-card .img{width:120px;height:96px;flex:0 0 120px}
    }
    @media (max-width:620px){
      .grid{grid-template-columns:repeat(1,1fr)}
      .hero h1{font-size:24px}
      .hero p{font-size:14px}
      .view-toggle{margin-left:auto}
      .footer-grid{grid-template-columns:1fr 1fr}
    }
  </style>
</head>
<body>
  <header class="glass">
    <div class="container row" style="justify-content:space-between">
      <div class="brand">
        <div class="logo">HouseWise</div>
        <div class="muted">Trusted local services</div>
      </div>
      <nav class="muted">
        <a href="#">Home</a>
        <a href="#">Services</a>
        <a href="#">Providers</a>
        <a href="#">Contact</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- HERO: category title + quick search -->
    <section class="hero">
      <div class="hero-grid">
        <div>
          <h1>Salon at Home & Services in <span id="cityLabel">Lucknow</span></h1>
          <p class="muted">Showing verified and top-rated Salon at Home near you. Use filters to narrow results.</p>

          <!-- Search quick bar -->
          <form id="quickSearch" class="search" onsubmit="return false;">
            <div class="row" style="align-items:center">
              <div class="field" style="flex:1">
                <label class="muted">Search service or provider</label>
                <input id="qText" class="input" placeholder="e.g. leak repair, Rahul" />
              </div>
              <div class="field" style="max-width:160px">
                <label class="muted">Location</label>
                <select id="qCity" class="input">
                  <option style="color: gray;">Lucknow</option><option style="color: gray;">Delhi</option><option style="color: gray;">Mumbai</option>
                </select>
              </div>
              <div style="display:flex;align-items:flex-end">
                <button id="qFind" class="btn btn-primary">Find Now</button>
              </div>
            </div>
          </form>

        </div>

        <!-- Hero right card -->
        <div class="hero-card">
          <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=900&q=60" alt="hero">
          <div class="hero-chip">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=60" alt="" style="width:44px;height:44px;border-radius:8px;object-fit:cover;border:1px solid var(--border)">
            <div>
              <div style="font-weight:700">Why choose HouseWise?</div>
              <div class="muted" style="font-size:13px">Verified pros • Secure payments • Same-day bookings</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sticky Filter Bar (top of results) -->
    <div id="stickyFilter" style="position:sticky;top:88px;z-index:40;margin-top:10px">
      <div class="glass" style="padding:10px 12px;display:flex;align-items:center;gap:12px;justify-content:space-between">
        <div class="row" style="align-items:center">
          <div class="muted">Results:</div>
          <div id="resultsCount" style="font-weight:700">0</div>
          <div class="active-filters" id="activeFilters"></div>
        </div>

        <div class="row" style="align-items:center">
          <div class="muted">Sort</div>
          <select id="sortBy" class="input" style="max-width:180px;">
            <option value="relevance" style="color: gray;">Relevance</option>
            <option value="rating_desc" style="color: gray;">Rating: High → Low</option>
            <option value="price_asc" style="color: gray;">Price: Low → High</option>
            <option value="price_desc" style="color: gray;">Price: High → Low</option>
          </select>

          <div class="view-toggle" style="margin-left:12px">
            <button id="gridView" class="btn">Grid</button>
            <button id="listView" class="btn btn-ghost">List</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main layout -->
    <div class="layout">
      <!-- SIDEBAR FILTERS -->
      <aside class="sidebar" id="filtersPanel">
        <!-- Quick chips -->
        <div class="filter-group">
          <div class="filter-title">Quick Filters</div>
          <div>
            <span class="chip" data-quick="verified">Verified</span>
            <span class="chip" data-quick="today">Available Today</span>
            <span class="chip" data-quick="under500">Under ₹500</span>
            <span class="chip" data-quick="rating4">Rating 4+</span>
          </div>
        </div>

        <!-- Price range -->
        <div class="filter-group">
          <div class="filter-title">Price Range</div>
          <div class="range-row">
            <input id="priceMin" class="input" type="number" placeholder="Min ₹" value="0" style="width:100px">
            <input id="priceMax" class="input" type="number" placeholder="Max ₹" value="2000" style="width:100px">
          </div>
          <div class="muted" style="font-size:13px;margin-top:6px">Tip: leave blank for no limit</div>
        </div>

        <!-- Rating -->
        <div class="filter-group">
          <div class="filter-title">Ratings</div>
          <label><input type="checkbox" class="filter-rating" value="4.5"> 4.5+</label><br>
          <label><input type="checkbox" class="filter-rating" value="4.0"> 4.0+</label><br>
          <label><input type="checkbox" class="filter-rating" value="3.5"> 3.5+</label>
        </div>

        <!-- Verified -->
        <div class="filter-group">
          <div class="filter-title">Verified / Safety</div>
          <label><input type="checkbox" id="filterVerified"> KYC Verified</label><br>
          <label><input type="checkbox" id="filterInsurance"> Insurance</label>
        </div>

        <!-- Tags -->
        <div class="filter-group">
          <div class="filter-title">Services Offered</div>
          <label><input type="checkbox" class="filter-tag" value="leak"> Leak Fix</label><br>
          <label><input type="checkbox" class="filter-tag" value="tap"> Tap Install</label><br>
          <label><input type="checkbox" class="filter-tag" value="motor"> Water Motor</label><br>
          <label><input type="checkbox" class="filter-tag" value="kitchen"> Kitchen Sink</label>
        </div>

        <!-- Availability -->
        <div class="filter-group">
          <div class="filter-title">Availability</div>
          <label><input type="checkbox" id="filterToday"> Today</label><br>
          <label><input type="checkbox" id="filter24x7"> 24x7</label>
        </div>

        <div style="margin-top:12px;display:flex;gap:8px">
          <button id="applyFilters" class="btn btn-primary">Apply</button>
          <button id="resetFilters" class="btn btn-ghost">Reset</button>
        </div>
      </aside>

      <!-- RESULTS COLUMN -->
      <section style="min-height:400px">
        <!-- Results container -->
        <div id="resultsArea">
          <!-- Cards are static HTML below. Edit directly to add/remove providers.
               IMPORTANT: keep data-* attributes correct:
               data-price, data-rating, data-verified (true/false), data-distance, data-tags (comma separated), data-available (today/24x7/none)
          -->
          <div id="cardsGrid" class="grid">
            <!-- Card 1 -->
            <article class="card" data-price="299" data-rating="4.9" data-verified="true" data-distance="1.2" data-tags="leak,tap" data-available="today">
              <img class="img" src="https://images.unsplash.com/photo-1542736667-069246bdbc74?auto=format&fit=crop&w=800&q=60" alt="Rahul">
              <div class="card-body">
                <div class="card-row">
                  <div>
                    <div class="title">Rahul Sharma</div>
                    <div class="meta">Plumber • <span class="muted">1.2 km</span></div>
                  </div>
                  <div style="text-align:right">
                    <div style="font-weight:800;color:var(--primary)">₹299</div>
                    <div class="meta">4.9 ⭐</div>
                  </div>
                </div>
                <div class="meta">Fast leak repair • Tap installation • 300+ jobs</div>
                <div style="display:flex;gap:8px;margin-top:8px">
                  <div class="pill">KYC Verified</div>
                  <div class="pill">Same-day</div>
                </div>
              </div>
              <div class="card-foot">
                <div class="meta">Top Rated</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 2 -->
            <article class="card" data-price="249" data-rating="4.8" data-verified="true" data-distance="2.8" data-tags="electrical,light" data-available="today">
              <img class="img" src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=60" alt="Deepa">
              <div class="card-body">
                <div class="card-row">
                  <div>
                    <div class="title">Deepa Electric</div>
                    <div class="meta">Electrician • <span class="muted">2.8 km</span></div>
                  </div>
                  <div style="text-align:right">
                    <div style="font-weight:800;color:var(--primary)">₹249</div>
                    <div class="meta">4.8 ⭐</div>
                  </div>
                </div>
                <div class="meta">Wiring • Fuse repair • Quick response</div>
                <div style="display:flex;gap:8px;margin-top:8px">
                  <div class="pill">Verified</div>
                  <div class="pill">Insured</div>
                </div>
              </div>
              <div class="card-foot">
                <div class="meta">Quick Response</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 3 -->
            <article class="card" data-price="399" data-rating="4.7" data-verified="false" data-distance="4.0" data-tags="wood,repair" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=60" alt="Amaan">
              <div class="card-body">
                <div class="card-row">
                  <div>
                    <div class="title">Amaan Carpentry</div>
                    <div class="meta">Carpenter • <span class="muted">4.0 km</span></div>
                  </div>
                  <div style="text-align:right">
                    <div style="font-weight:800;color:var(--primary)">₹399</div>
                    <div class="meta">4.7 ⭐</div>
                  </div>
                </div>
                <div class="meta">Furniture repair • Custom cabinets</div>
                <div style="display:flex;gap:8px;margin-top:8px">
                  <div class="pill">Experienced</div>
                </div>
              </div>
              <div class="card-foot">
                <div class="meta">Verified soon</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 4 -->
            <article class="card" data-price="499" data-rating="4.85" data-verified="true" data-distance="0.9" data-tags="salon,styling" data-available="today">
              <img class="img" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=60" alt="Glam">
              <div class="card-body">
                <div class="card-row">
                  <div>
                    <div class="title">Glam n' Glow</div>
                    <div class="meta">Salon at Home • <span class="muted">0.9 km</span></div>
                  </div>
                  <div style="text-align:right">
                    <div style="font-weight:800;color:var(--primary)">₹499</div>
                    <div class="meta">4.85 ⭐</div>
                  </div>
                </div>
                <div class="meta">Stylist • Bridal • Home service</div>
                <div style="display:flex;gap:8px;margin-top:8px">
                  <div class="pill">Top Rated</div>
                </div>
              </div>
              <div class="card-foot">
                <div class="meta">Popular</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 5 -->
            <article class="card" data-price="199" data-rating="4.4" data-verified="true" data-distance="3.5" data-tags="cleaning,deep" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1581579185476-4c22e9b0b7b5?auto=format&fit=crop&w=800&q=60" alt="CleanCo">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">SparkClean</div><div class="meta">Cleaning • <span class="muted">3.5 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹199</div><div class="meta">4.4 ⭐</div></div>
                </div>
                <div class="meta">Home deep-clean • 2-person team</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Trusted</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Affordable</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 6 -->
            <article class="card" data-price="349" data-rating="4.6" data-verified="false" data-distance="2.0" data-tags="tutor,math" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=60" alt="Tutor">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">Asha Tutor</div><div class="meta">Tutor • <span class="muted">2.0 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹349</div><div class="meta">4.6 ⭐</div></div>
                </div>
                <div class="meta">Math & Science • Experienced teacher</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Verified soon</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Home visits</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 7 -->
            <article class="card" data-price="279" data-rating="4.2" data-verified="true" data-distance="5.6" data-tags="leak,pipe" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?auto=format&fit=crop&w=800&q=60" alt="PlumbCo">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">PlumbCo</div><div class="meta">Plumber • <span class="muted">5.6 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹279</div><div class="meta">4.2 ⭐</div></div>
                </div>
                <div class="meta">Commercial jobs • Emergency</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Emergency</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">24x7</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 8 -->
            <article class="card" data-price="599" data-rating="4.95" data-verified="true" data-distance="0.6" data-tags="premium,installation" data-available="today">
              <img class="img" src="https://images.unsplash.com/photo-1533777324565-a040eb52fac2?auto=format&fit=crop&w=800&q=60" alt="PremiumPro">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">PremiumPro</div><div class="meta">Premium Service • <span class="muted">0.6 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹599</div><div class="meta">4.95 ⭐</div></div>
                </div>
                <div class="meta">High-end installations • Warranty</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Warranty</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Top Rated</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 9 -->
            <article class="card" data-price="329" data-rating="4.3" data-verified="false" data-distance="6.1" data-tags="tap,repair" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1590642916792-7f1a7f89f7b1?auto=format&fit=crop&w=800&q=60" alt="TapFix">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">TapFix</div><div class="meta">Plumber • <span class="muted">6.1 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹329</div><div class="meta">4.3 ⭐</div></div>
                </div>
                <div class="meta">Tap & fixture repair</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Affordable</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Local</div>
                <div style="display:flex;gap:8px">
                  <button class="btn btn-ghost" onclick="viewDetails(this)">View</button>
                  <button class="btn btn-primary" onclick="bookNow(this)">Book</button>
                </div>
              </div>
            </article>

            <!-- Card 10 -->
            <article class="card" data-price="219" data-rating="3.9" data-verified="true" data-distance="7.8" data-tags="cleaning,office" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1560184897-6b3f1f1b6b4c?auto=format&fit=crop&w=800&q=60" alt="OfficeClean">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">OfficeClean</div><div class="meta">Cleaning • <span class="muted">7.8 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹219</div><div class="meta">3.9 ⭐</div></div>
                </div>
                <div class="meta">Commercial cleaning</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Team</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Large jobs</div>
                <div style="display:flex;gap:8px"><button class="btn btn-ghost" onclick="viewDetails(this)">View</button><button class="btn btn-primary" onclick="bookNow(this)">Book</button></div>
              </div>
            </article>

            <!-- Card 11 -->
            <article class="card" data-price="259" data-rating="4.1" data-verified="true" data-distance="3.3" data-tags="motor,repair" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1600180758894-9d6b0f4e1f8d?auto=format&fit=crop&w=800&q=60" alt="MotorFix">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">MotorFix</div><div class="meta">Water Motor • <span class="muted">3.3 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹259</div><div class="meta">4.1 ⭐</div></div>
                </div>
                <div class="meta">Pump repair & servicing</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Experience</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Skilled</div>
                <div style="display:flex;gap:8px"><button class="btn btn-ghost" onclick="viewDetails(this)">View</button><button class="btn btn-primary" onclick="bookNow(this)">Book</button></div>
              </div>
            </article>

            <!-- Card 12 -->
            <article class="card" data-price="189" data-rating="4.0" data-verified="false" data-distance="4.5" data-tags="tap,leak" data-available="">
              <img class="img" src="https://images.unsplash.com/photo-1562166438-3ca5b4c2a2a6?auto=format&fit=crop&w=800&q=60" alt="LocalHand">
              <div class="card-body">
                <div class="card-row">
                  <div><div class="title">LocalHand</div><div class="meta">Handyman • <span class="muted">4.5 km</span></div></div>
                  <div style="text-align:right"><div style="font-weight:800;color:var(--primary)">₹189</div><div class="meta">4.0 ⭐</div></div>
                </div>
                <div class="meta">Small fixes • Tap repair</div>
                <div style="display:flex;gap:8px;margin-top:8px"><div class="pill">Quick</div></div>
              </div>
              <div class="card-foot">
                <div class="meta">Local</div>
                <div style="display:flex;gap:8px"><button class="btn btn-ghost" onclick="viewDetails(this)">View</button><button class="btn btn-primary" onclick="bookNow(this)">Book</button></div>
              </div>
            </article>

          </div> <!-- end cardsGrid -->

          <!-- Load more -->
          <div class="load-more">
            <button id="loadMore" class="btn btn-primary">Load More</button>
          </div>

          <!-- Empty state -->
          <div id="emptyState" class="empty" style="display:none">
            <div style="font-size:20px;font-weight:700">Koi provider nahi mila</div>
            <div class="muted" style="margin-top:8px">Filters reset kar ke ya location change kar ke dubara try karo.</div>
            <div style="margin-top:12px"><button id="resetFromEmpty" class="btn btn-ghost">Reset Filters</button></div>
          </div>

        </div> <!-- resultsArea -->

        <!-- Trust strip -->
        <div class="trust-strip" style="margin-top:18px">
          <div style="font-weight:700">Verified & Secure</div>
          <div class="muted" style="font-size:13px">All professionals undergo KYC & background checks. Payments secured by escrow.</div>
        </div>

      </section>
      
    </div> <!-- layout -->
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

    <!-- Footer -->
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

  </main>

  <!-- ============================
       JAVASCRIPT: FILTER + UI LOGIC
       ============================ -->
  <script>
    /***********************
     * Helper utils
     ***********************/
    const $ = sel => document.querySelector(sel);
    const $$ = sel => Array.from(document.querySelectorAll(sel));

    const cardsGrid = $('#cardsGrid');
    const cards = () => Array.from(cardsGrid.querySelectorAll('article.card'));
    const resultsCountEl = $('#resultsCount');
    const activeFiltersEl = $('#activeFilters');
    const loadMoreBtn = $('#loadMore');
    const emptyState = $('#emptyState');
    const priceMinEl = $('#priceMin'), priceMaxEl = $('#priceMax');

    // Pagination / Load More
    let perPage = 6;
    let visibleCount = perPage;

    // Current UI state
    let state = {
      qText: '',
      city: $('#qCity').value,
      priceMin: null,
      priceMax: null,
      ratings: [], // array of numbers like [4.5,4.0]
      verified: false,
      insurance: false,
      tags: [], // ['leak','tap']
      today: false,
      '24x7': false,
      sortBy: 'relevance',
      view: 'grid'
    };

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      $('#year').textContent = new Date().getFullYear();
      // initial render
      applyFilters(true);
      attachUI();
    });

    /***********************
     * UI event handlers
     ***********************/
    function attachUI(){
      // Quick search
      $('#qFind').addEventListener('click', () => {
        state.qText = $('#qText').value.trim().toLowerCase();
        state.city = $('#qCity').value;
        visibleCount = perPage;
        applyFilters();
      });

      // Quick chips
      $$('.chip').forEach(chip => {
        chip.addEventListener('click', () => {
          chip.classList.toggle('active');
          const q = chip.dataset.quick;
          // set state based on chip
          if(q === 'verified') state.verified = !state.verified;
          if(q === 'today') state.today = !state.today;
          if(q === 'under500') { if(state.priceMax === null) state.priceMax = 500; else state.priceMax = (state.priceMax === 500 ? null : 500); priceMaxEl.value = state.priceMax || 2000; }
          if(q === 'rating4') {
            // toggle 4.0+ checkbox
            const cb = document.querySelector('.filter-rating[value="4.0"]');
            cb.checked = !cb.checked;
            updateRatingsFromCheckboxes();
          }
          visibleCount = perPage;
          applyFilters();
        });
      });

      // Ratings checkboxes
      $$('.filter-rating').forEach(cb => cb.addEventListener('change', () => { updateRatingsFromCheckboxes(); applyFilters(); }));

      function updateRatingsFromCheckboxes(){
        const selected = $$('.filter-rating:checked').map(n=>parseFloat(n.value));
        state.ratings = selected;
      }

      // Verified / Insurance
      $('#filterVerified').addEventListener('change', e=>{ state.verified = e.target.checked; visibleCount = perPage; applyFilters(); });
      $('#filterInsurance').addEventListener('change', e=>{ state.insurance = e.target.checked; visibleCount = perPage; applyFilters(); });

      // Tags checkboxes
      $$('.filter-tag').forEach(cb => cb.addEventListener('change', ()=>{
        const selected = $$('.filter-tag:checked').map(n=>n.value);
        state.tags = selected;
        visibleCount = perPage;
        applyFilters();
      }));

      // Availability
      $('#filterToday').addEventListener('change', e=>{ state.today = e.target.checked; visibleCount = perPage; applyFilters(); });
      $('#filter24x7').addEventListener('change', e=>{ state['24x7'] = e.target.checked; visibleCount = perPage; applyFilters(); });

      // Price inputs: apply on blur
      priceMinEl.addEventListener('input', ()=>{ state.priceMin = priceMinEl.value ? parseFloat(priceMinEl.value) : null; });
      priceMaxEl.addEventListener('input', ()=>{ state.priceMax = priceMaxEl.value ? parseFloat(priceMaxEl.value) : null; });
      priceMinEl.addEventListener('change', ()=>{ visibleCount = perPage; applyFilters(); });
      priceMaxEl.addEventListener('change', ()=>{ visibleCount = perPage; applyFilters(); });

      // Apply / Reset
      $('#applyFilters').addEventListener('click', ()=>{ visibleCount = perPage; applyFilters(); });
      $('#resetFilters').addEventListener('click', resetFilters);
      $('#resetFromEmpty').addEventListener('click', resetFilters);

      // Sorting
      $('#sortBy').addEventListener('change', (e)=>{ state.sortBy = e.target.value; visibleCount = perPage; applyFilters(); });

      // View toggle
      $('#gridView').addEventListener('click', ()=>{ state.view = 'grid'; renderView(); });
      $('#listView').addEventListener('click', ()=>{ state.view = 'list'; renderView(); });

      // Load more
      loadMoreBtn.addEventListener('click', ()=>{
        visibleCount += perPage;
        applyFilters();
      });

      // live qText search
      $('#qText').addEventListener('keyup', (e)=>{ if(e.key === 'Enter'){ state.qText = e.target.value.trim().toLowerCase(); visibleCount = perPage; applyFilters(); }});
    }

    /***********************
     * Reset filters
     ***********************/
    function resetFilters(){
      // reset UI elements
      priceMinEl.value = ''; priceMaxEl.value = 2000;
      $$('.filter-rating').forEach(cb => cb.checked = false);
      $('#filterVerified').checked = false; $('#filterInsurance').checked = false;
      $$('.filter-tag').forEach(cb => cb.checked = false);
      $('#filterToday').checked = false; $('#filter24x7').checked = false;
      $$('.chip').forEach(ch => ch.classList.remove('active'));
      $('#qText').value = '';
      $('#qCity').value = 'Lucknow';
      state = { qText:'', city: 'Lucknow', priceMin:null, priceMax:2000, ratings:[], verified:false, insurance:false, tags:[], today:false, '24x7':false, sortBy:'relevance', view:'grid' };
      visibleCount = perPage;
      $('#sortBy').value = 'relevance';
      renderView();
      applyFilters();
    }

    /***********************
     * Core: applyFilters
     ***********************/
    function applyFilters(init=false){
      // read some inputs into state
      state.qText = $('#qText').value.trim().toLowerCase();
      state.city = $('#qCity').value;
      state.priceMin = priceMinEl.value ? parseFloat(priceMinEl.value) : null;
      state.priceMax = priceMaxEl.value ? parseFloat(priceMaxEl.value) : 2000;
      state.sortBy = $('#sortBy').value;

      // filtering logic
      const all = cards();
      let filtered = all.filter(card => {
        const price = parseFloat(card.dataset.price);
        const rating = parseFloat(card.dataset.rating);
        const verified = (card.dataset.verified === 'true');
        const tags = (card.dataset.tags || '').split(',').filter(Boolean);
        const available = card.dataset.available || '';
        const title = (card.querySelector('.title')?.textContent || '').toLowerCase();
        const meta = (card.querySelector('.meta')?.textContent || '').toLowerCase();
        // 1. text search
        if(state.qText){
          const q = state.qText;
          if(!(title.includes(q) || meta.includes(q))) return false;
        }
        // 2. price
        if(state.priceMin !== null && price < state.priceMin) return false;
        if(state.priceMax !== null && price > state.priceMax) return false;
        // 3. ratings (if any chosen -> match any chosen threshold)
        if(state.ratings.length){
          const pass = state.ratings.some(th => rating >= th);
          if(!pass) return false;
        }
        // 4. verified
        if(state.verified && !verified) return false;
        // 5. insurance: we don't have explicit data, skip (placeholder)
        // 6. tags: all selected tags must be present (AND)
        if(state.tags.length){
          const need = state.tags.every(t => tags.includes(t));
          if(!need) return false;
        }
        // 7. availability
        if(state.today && !available.includes('today')) return false;
        if(state['24x7'] && !available.includes('24x7')) return false;
        return true;
      });

      // Sorting
      if(state.sortBy === 'rating_desc'){
        filtered.sort((a,b) => parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating));
      } else if(state.sortBy === 'price_asc'){
        filtered.sort((a,b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
      } else if(state.sortBy === 'price_desc'){
        filtered.sort((a,b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
      } // relevance = default order (DOM order)

      // Update active filters UI
      renderActiveFilters();

      // Update count & render subset for pagination/load more
      resultsCountEl.textContent = filtered.length;

      // show/hide empty state
      if(filtered.length === 0){
        emptyState.style.display = 'block';
        cardsGrid.style.display = 'none';
        loadMoreBtn.style.display = 'none';
      } else {
        emptyState.style.display = 'none';
        cardsGrid.style.display = '';
        // show only visibleCount cards from filtered
        // strategy: hide all cards then show those in filtered slice
        cards().forEach(c => c.style.display = 'none');
        const slice = filtered.slice(0, visibleCount);
        slice.forEach(c => c.style.display = '');
        // show or hide Load More button
        if(filtered.length > visibleCount){
          loadMoreBtn.style.display = '';
        } else {
          loadMoreBtn.style.display = 'none';
        }
      }

      // keep view style (grid/list)
      renderView();

      // small animation: fade up visible cards
      if(!init) revealVisibleCards();
    }

    /***********************
     * Render helpers
     ***********************/
    function renderActiveFilters(){
      activeFiltersEl.innerHTML = '';
      const tags = [];
      if(state.qText) tags.push(`"${state.qText}"`);
      if(state.priceMin !== null) tags.push(`Min ₹${state.priceMin}`);
      if(state.priceMax !== null) tags.push(`Max ₹${state.priceMax}`);
      if(state.ratings.length) tags.push(`Rating ${state.ratings.join(',')}`);
      if(state.verified) tags.push('Verified');
      if(state.tags.length) tags.push(...state.tags.map(t=>t));
      if(state.today) tags.push('Today');
      tags.forEach(t => {
        const el = document.createElement('span');
        el.className = 'filter-tag';
        el.textContent = t;
        const x = document.createElement('button');
        x.innerHTML = '✕'; x.style.marginLeft = '8px'; x.style.background='transparent'; x.style.border='0'; x.style.cursor='pointer';
        x.onclick = () => { removeFilterTag(t); };
        el.appendChild(x);
        activeFiltersEl.appendChild(el);
      });
    }

    function removeFilterTag(t){
      // simple removals: reset relevant state field
      if(t.startsWith('"')){ state.qText=''; $('#qText').value=''; }
      else if(t.startsWith('Min')){ state.priceMin=null; priceMinEl.value=''; }
      else if(t.startsWith('Max')){ state.priceMax=null; priceMaxEl.value='2000'; }
      else if(t.startsWith('Rating')){ $$('.filter-rating').forEach(cb=>cb.checked=false); state.ratings=[]; }
      else if(t === 'Verified'){ state.verified=false; $('#filterVerified').checked=false; }
      else if(t === 'Today'){ state.today=false; $('#filterToday').checked=false; }
      else {
        // tags
        const cb = Array.from($$('.filter-tag')).find(n=>n.value===t);
        if(cb) cb.checked=false;
        state.tags = state.tags.filter(tt=>tt!==t);
      }
      visibleCount = perPage;
      applyFilters();
    }

    function renderView(){
      const grid = cardsGrid;
      if(state.view === 'grid'){
        // ensure class grid
        grid.className = 'grid';
        $('#gridView').classList.add('btn-ghost'); $('#gridView').classList.remove('btn');
        $('#listView').classList.add('btn'); $('#listView').classList.remove('btn-ghost');
        // convert displayed article to grid card (if in list layout before)
        cards().forEach(c => {
          c.classList.remove('list-card');
        });
      } else {
        grid.className = ''; // no grid wrapper
        $('#listView').classList.add('btn-ghost'); $('#listView').classList.remove('btn');
        $('#gridView').classList.add('btn'); $('#gridView').classList.remove('btn-ghost');
        // make visible cards appear as list style
        cards().forEach(c => {
          c.classList.add('list-card');
        });
      }
    }

    function revealVisibleCards(){
      const visible = cards().filter(c => c.style.display !== 'none');
      visible.forEach((c,i) => {
        c.style.opacity = 0;
        c.style.transform = 'translateY(12px)';
        setTimeout(()=>{ c.style.transition = 'opacity .45s var(--ease), transform .45s var(--ease)'; c.style.opacity=1; c.style.transform='translateY(0)'; }, i*60);
      });
    }

    /***********************
     * Small actions (placeholders)
     ***********************/
    function viewDetails(btn){
      const card = btn.closest('article.card');
      const name = card.querySelector('.title').textContent;
      alert('Opening profile for ' + name + ' (placeholder)');
    }
    function bookNow(btn){
      const card = btn.closest('article.card');
      const name = card.querySelector('.title').textContent;
      alert('Start booking flow for ' + name + ' (placeholder)');
    }

    /***********************
     * Utility polyfills for NodeList map
     ***********************/
    NodeList.prototype.map = Array.prototype.map;
    Array.prototype.toArray = function(){ return Array.from(this); };

    /***********************
     * small initial view set
     ***********************/
    // default priceMax shown if empty
    if(!priceMaxEl.value) priceMaxEl.value = 2000;

    // ensure we show initial subset
    applyFilters(true);

    // optional: show filter changes as user types (debounced)
    let typingTimer;
    $('#qText').addEventListener('input', () => {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(()=>{ state.qText = $('#qText').value.trim().toLowerCase(); visibleCount = perPage; applyFilters(); }, 500);
    });

  </script>
</body>
</html>

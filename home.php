<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>HouseWise — Premium Local Service Finder (Dark, Hover Glow + Counters Fixed)</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#06b6d4',    /* teal */
            accent: '#7c3aed',     /* violet */
            surface: '#071026',
            amberglow: '#f59e0b'
          },
          fontFamily: {
            pop: ['Poppins','system-ui','sans-serif'],
            inter: ['Inter','system-ui','sans-serif']
          }
        }
      }
    }
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

  <style>
    :root { --glass: rgba(255,255,255,0.03); --card-border: rgba(255,255,255,0.04); }
    body { background: linear-gradient(180deg,#020617 0%, #071026 100%); color: #e6eef8; font-family: Inter, system-ui, sans-serif; }
    .glass-dark { background: var(--glass); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); border: 1px solid var(--card-border); }
    .no-scrollbar::-webkit-scrollbar { display: none; } .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .focus-ring:focus { outline: 2px solid rgba(6,182,212,0.12); outline-offset: 3px; }

    /* base transition for box-shadows & transform so CSS fallback works if JS disabled */
    .hover-lift { transition: transform .18s cubic-bezier(.2,.9,.3,1), box-shadow .18s ease; }
    .img-cover { object-fit: cover; object-position: center; }

    /* subtle default shadow so hover looks nicer */
    .soft-shadow { box-shadow: 0 6px 20px rgba(2,6,23,0.6); }

    /* helpful helper - we primarily animate glow via GSAP to get colored shadows */
    #secure:hover{
      box-shadow: #0ea5a4;
    }
  </style>
</head>
<body class="antialiased">

  <!-- TOP BAR -->
  <div class="w-full border-b border-white/6">
    <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between text-sm text-slate-300">
      <div class="flex items-center gap-3">
        <div>Services in</div>
        <select id="citySelect" class="bg-transparent text-slate-200 px-2 py-1 rounded-md border border-white/6 focus-ring">
          <option>Lucknow</option><option>Delhi</option><option>Mumbai</option><option>Bengaluru</option>
        </select>
      </div>
      <div class="flex items-center gap-4">
        <a href="#" class="hover:text-white">Help</a>
        <a href="tel:+919999999999" class="hover:text-white">+91 99999 99999</a>
        <div class="flex items-center gap-2">
          <button class="px-3 py-1 rounded-md bg-primary text-slate-900 text-sm">Login</button>
          <button class="px-3 py-1 rounded-md border border-primary text-primary text-sm">Sign up</button>
        </div>
      </div>
    </div>
  </div>

  <!-- NAV -->
  <header class="sticky top-0 z-50 glass-dark">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="text-2xl font-bold text-primary font-pop">HouseWise</div>
        <div class="text-sm text-slate-300">Trusted local services in <span id="cityLabel">Lucknow</span></div>
      </div>
      <nav class="hidden md:flex items-center gap-6 text-slate-300">
        <a href="#services" class="hover:text-white">Services</a>
        <a href="#how" class="hover:text-white">How it works</a>
        <a href="#providers" class="hover:text-white">For Providers</a>
        <a href="#pricing" class="hover:text-white">Pricing</a>
        <a href="#blog" class="hover:text-white">Blog</a>
        <button id="bookTop" class="ml-4 px-4 py-2 rounded-lg bg-primary text-slate-900 font-semibold shadow">Book Service</button>
      </nav>
      <div class="md:hidden">
        <button class="px-3 py-2 rounded-lg bg-primary text-slate-900">Book</button>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <main class="max-w-7xl mx-auto px-6 py-12 relative overflow-hidden">
    <div class="absolute -right-40 -top-28 w-[520px] h-[520px] rounded-full" style="filter:blur(120px); background: linear-gradient(90deg,#064e3b,#0ea5a4); opacity:0.12"></div>
    <div class="absolute -left-40 -bottom-28 w-[420px] h-[420px] rounded-full" style="filter:blur(100px); background: linear-gradient(90deg,#4c1d95,#7c3aed); opacity:0.10"></div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative z-10">
      <div class="md:col-span-6">
        <h1 id="heroTitle" class="text-4xl md:text-5xl font-bold leading-tight text-white">Trusted Plumbers, Electricians & More — <span class="text-primary">Near You</span></h1>
        <p id="heroSub" class="mt-4 text-slate-300 max-w-xl">Verified professionals • Secure payments • Same-day bookings • KYC & background-checked</p>

        <form id="searchForm" class="mt-8 glass-dark rounded-2xl p-5 shadow-xl border border-white/6 max-w-xl" aria-label="Service search">
          <div class="flex flex-col md:flex-row gap-3 items-end">
            <div class="flex-1">
              <label class="text-xs text-slate-400">Service</label>
              <input id="serviceInput" placeholder="e.g. Plumber, Electrician, Cleaner" class="mt-1 w-full px-3 py-2 rounded-lg bg-transparent border border-white/6 text-slate-200 focus-ring" />
            </div>
            <div class="w-full md:w-56">
              <label class="text-xs text-slate-400">Location</label>
              <div class="mt-1 flex items-center gap-2">
                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/></svg>
                <input id="locationInput" placeholder="Lucknow" class="w-full px-2 py-2 rounded-lg bg-transparent border border-white/6 text-slate-200 focus-ring" />
              </div>
            </div>
            <div class="w-full md:w-40">
              <label class="text-xs text-slate-400">When</label>
              <input id="dateInput" type="date" class="mt-1 w-full px-3 py-2 rounded-lg bg-transparent border border-white/6 text-slate-200 focus-ring" />
            </div>
            <div class="md:w-36">
              <button type="submit" class="w-full h-full bg-accent hover:brightness-95 text-white rounded-lg px-4 py-2 flex items-center justify-center gap-2">Search</button>
            </div>
          </div>
          <div class="mt-3 text-xs text-slate-400">1000+ providers in <span id="cityText">Lucknow</span> • Avg. rating <span class="text-yellow-400">4.8</span> ⭐</div>
        </form>

        <div class="mt-6 flex items-center gap-3 flex-wrap">
          <div class="flex items-center gap-2 bg-slate-900/40 px-3 py-2 rounded-md border border-white/6" id="secure">
            <svg class="h-4 w-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 1a5 5 0 00-5 5v3a7 7 0 007 7 7 7 0 007-7V6a5 5 0 00-5-5z"/></svg>
            <div class="text-sm text-slate-300">KYC Verified Pros</div>
          </div>
          <div class="flex items-center gap-2 bg-slate-900/40 px-3 py-2 rounded-md border border-white/6">
            <svg class="h-4 w-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h3l2 2h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"/></svg>
            <div class="text-sm text-slate-300">Escrow Payments</div>
          </div>
          <div class="flex items-center gap-2 bg-slate-900/40 px-3 py-2 rounded-md border border-white/6">
            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.173c.969 0 1.371 1.24.588 1.81l-3.375 2.455a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.375 2.455c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.632 9.397c-.783-.57-.38-1.81.588-1.81h4.173a1 1 0 00.95-.69l1.286-3.97z"/></svg>
            <div class="text-sm text-slate-300">Avg. Rating 4.8</div>
          </div>
        </div>
      </div>

      <div class="md:col-span-6">
        <div class="rounded-2xl overflow-hidden relative shadow-2xl border border-white/6 soft-shadow">
          <img id="heroImg" src="images/plumber.jpg" alt="local service" class="w-full h-80 img-cover transform scale-105" />
          <div class="absolute left-6 bottom-6 bg-slate-900/60 p-3 rounded-xl flex items-center gap-3 border border-white/6 hover-lift" data-glow="teal">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=60" class="w-12 h-12 rounded-full object-cover border border-white/6" />
            <div>
              <div class="text-sm font-semibold text-white">Rahul Sharma</div>
              <div class="text-xs text-slate-300">Top Rated Plumber • <span class="text-primary">₹299</span></div>
            </div>
          </div>
          <div class="absolute right-4 top-4 bg-gradient-to-r from-primary to-accent text-black px-3 py-1 rounded-full text-xs font-semibold">Featured • Verified</div>
        </div>
      </div>
    </div>

    <!-- POPULAR CATEGORIES (static HTML; edit directly) -->
    <section id="services" class="mt-10 relative z-10">
      <div class="flex items-center justify-between">
        <h3 class="text-xl font-semibold text-white">Popular Categories</h3>
        <p class="text-sm text-slate-400">Choose a service — fast booking & verified pros</p>
      </div>

      <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
        <!-- Edit these cards directly. data-glow controls hover glow color (teal/violet/amber) -->
        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="teal">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">🔧</div>
          <div class="text-sm font-medium text-white">Plumber</div>
          <div class="text-xs text-slate-400">From ₹299</div>
        </div>

        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="violet">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">💡</div>
          <div class="text-sm font-medium text-white">Electrician</div>
          <div class="text-xs text-slate-400">From ₹249</div>
        </div>

        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="teal">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">🪚</div>
          <div class="text-sm font-medium text-white">Carpenter</div>
          <div class="text-xs text-slate-400">From ₹399</div>
        </div>

        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="violet">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">💄</div>
          <div class="text-sm font-medium text-white">Salon at Home</div>
          <div class="text-xs text-slate-400">From ₹499</div>
        </div>

        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="teal">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">🧹</div>
          <div class="text-sm font-medium text-white">Cleaning</div>
          <div class="text-xs text-slate-400">From ₹199</div>
        </div>

        <div class="hover-lift cat-card bg-slate-900/40 border border-white/6 rounded-2xl p-4 flex flex-col items-start gap-2 soft-shadow" data-glow="violet">
          <div class="bg-slate-800/40 rounded-md p-3 text-xl">📚</div>
          <div class="text-sm font-medium text-white">Tutor</div>
          <div class="text-xs text-slate-400">From ₹349</div>
        </div>
      </div>
    </section>

    <!-- FEATURED PROVIDERS (static HTML cards editable directly) -->
    <section id="providers" class="mt-12 relative z-10">
      <div class="flex items-center justify-between">
        <h3 class="text-xl font-semibold text-white">Featured Providers</h3>
        <div class="flex items-center gap-2">
          <button id="prevBtn" class="p-2 rounded-md bg-slate-900/40 border border-white/6 hover:bg-slate-800">‹</button>
          <button id="nextBtn" class="p-2 rounded-md bg-slate-900/40 border border-white/6 hover:bg-slate-800">›</button>
        </div>
      </div>

      <div id="carousel" class="mt-4 flex gap-4 overflow-x-auto no-scrollbar pb-4">
        <!-- Provider 1 -->
        <article class="prov-card hover-lift prov-hover min-w-[300px] bg-slate-900/60 rounded-2xl overflow-hidden border border-white/6 shadow-md soft-shadow" data-glow="teal">
          <img src="https://images.unsplash.com/photo-1542736667-069246bdbc74?auto=format&fit=crop&w=800&q=60" alt="Rahul Sharma" class="w-full h-40 img-cover" />
          <div class="p-4">
            <div class="flex items-center justify-between">
              <div><div class="font-semibold text-white">Rahul Sharma</div><div class="text-xs text-slate-400">Plumber</div></div>
              <div class="text-right"><div class="text-sm font-bold text-primary">₹299</div><div class="text-xs text-slate-400">4.9 ⭐</div></div>
            </div>
            <div class="mt-3 flex items-center justify-between">
              <div class="text-xs text-slate-400">Top Rated</div>
              <button class="px-3 py-2 rounded-lg bg-accent text-white text-sm">Book</button>
            </div>
          </div>
        </article>

        <!-- Provider 2 -->
        <article class="prov-card hover-lift prov-hover min-w-[300px] bg-slate-900/60 rounded-2xl overflow-hidden border border-white/6 shadow-md soft-shadow" data-glow="violet">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=60" alt="Deepa Electric" class="w-full h-40 img-cover" />
          <div class="p-4">
            <div class="flex items-center justify-between">
              <div><div class="font-semibold text-white">Deepa Electric</div><div class="text-xs text-slate-400">Electrician</div></div>
              <div class="text-right"><div class="text-sm font-bold text-primary">₹249</div><div class="text-xs text-slate-400">4.8 ⭐</div></div>
            </div>
            <div class="mt-3 flex items-center justify-between">
              <div class="text-xs text-slate-400">Quick Response</div>
              <button class="px-3 py-2 rounded-lg bg-accent text-white text-sm">Book</button>
            </div>
          </div>
        </article>

        <!-- Provider 3 -->
        <article class="prov-card hover-lift prov-hover min-w-[300px] bg-slate-900/60 rounded-2xl overflow-hidden border border-white/6 shadow-md soft-shadow" data-glow="teal">
          <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=60" alt="Amaan Carpentry" class="w-full h-40 img-cover" />
          <div class="p-4">
            <div class="flex items-center justify-between">
              <div><div class="font-semibold text-white">Amaan Carpentry</div><div class="text-xs text-slate-400">Carpenter</div></div>
              <div class="text-right"><div class="text-sm font-bold text-primary">₹399</div><div class="text-xs text-slate-400">4.7 ⭐</div></div>
            </div>
            <div class="mt-3 flex items-center justify-between">
              <div class="text-xs text-slate-400">Verified</div>
              <button class="px-3 py-2 rounded-lg bg-accent text-white text-sm">Book</button>
            </div>
          </div>
        </article>

        <!-- Provider 4 -->
        <article class="prov-card hover-lift prov-hover min-w-[300px] bg-slate-900/60 rounded-2xl overflow-hidden border border-white/6 shadow-md soft-shadow" data-glow="violet">
          <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=60" alt="Glam n' Glow" class="w-full h-40 img-cover" />
          <div class="p-4">
            <div class="flex items-center justify-between">
              <div><div class="font-semibold text-white">Glam n' Glow</div><div class="text-xs text-slate-400">Salon</div></div>
              <div class="text-right"><div class="text-sm font-bold text-primary">₹499</div><div class="text-xs text-slate-400">4.85 ⭐</div></div>
            </div>
            <div class="mt-3 flex items-center justify-between">
              <div class="text-xs text-slate-400">Top Rated</div>
              <button class="px-3 py-2 rounded-lg bg-accent text-white text-sm">Book</button>
            </div>
          </div>
        </article>
      </div>

      <div class="mt-2 text-sm text-slate-400">Auto-play • Hover to pause • Edit providers directly in HTML</div>
    </section>

    <!-- HOW IT WORKS, TRUST, STATS, CTA, NEWSLETTER, FOOTER --- (kept same, small edits allowed) -->
    <section id="how" class="mt-12 bg-slate-900/40 rounded-2xl p-6 shadow-sm z-10">
      <h3 class="text-xl font-semibold text-white">How It Works</h3>
      <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="flex gap-4 items-start">
          <div class="bg-slate-800 p-3 rounded-lg text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-6-6m2-5a7 7 0 10-14 0 7 7 0 0014 0z"/></svg></div>
          <div><div class="font-semibold text-white">Search Service</div><div class="text-sm text-slate-300">Type the service & location to find trusted pros.</div></div>
        </div>
        <div class="flex gap-4 items-start">
          <div class="bg-slate-800 p-3 rounded-lg text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 8v4l3 3"/></svg></div>
          <div><div class="font-semibold text-white">Book & Pay</div><div class="text-sm text-slate-300">Choose slot, pay securely (escrow) or pay on completion.</div></div>
        </div>
        <div class="flex gap-4 items-start">
          <div class="bg-slate-800 p-3 rounded-lg text-primary"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M5 13l4 4L19 7"/></svg></div>
          <div><div class="font-semibold text-white">Service Done</div><div class="text-sm text-slate-300">Rate provider & get invoice & warranty if available.</div></div>
        </div>
      </div>
    </section>

    <section id="trust" class="mt-12 relative z-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gradient-to-br from-slate-900/60 to-slate-900/40 p-6 rounded-2xl card-border">
          <h4 class="text-xl font-semibold text-white">Trusted by thousands — Built for safety</h4>
          <p class="text-slate-300 mt-2">We verify professionals with KYC, background checks and service history. Secure escrow payments protect both parties.</p>
          <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex items-start gap-3 hover-lift" data-glow="teal">
              <div class="p-3 rounded-lg bg-slate-800 text-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"/></svg></div>
              <div><div class="font-semibold text-white">KYC & Background</div><div class="text-sm text-slate-300">ID verification & checks</div></div>
            </div>
            <div class="flex items-start gap-3 hover-lift" data-glow="violet">
              <div class="p-3 rounded-lg bg-slate-800 text-blue-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 8V7a2 2 0 00-2-2h-3"/></svg></div>
              <div><div class="font-semibold text-white">Escrow Payments</div><div class="text-sm text-slate-300">Platform holds payment until completion</div></div>
            </div>
            <div class="flex items-start gap-3 hover-lift" data-glow="amber">
              <div class="p-3 rounded-lg bg-slate-800 text-amber-400"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c..." /></svg></div>
              <div><div class="font-semibold text-white">Ratings & Reviews</div><div class="text-sm text-slate-300">Verified reviews & response time</div></div>
            </div>
            <div class="flex items-start gap-3 hover-lift" data-glow="teal">
              <div class="p-3 rounded-lg bg-slate-800 text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 12l2 2 4-4"/></svg></div>
              <div><div class="font-semibold text-white">Insurance & Guarantee</div><div class="text-sm text-slate-300">Optional small-job insurance</div></div>
            </div>
          </div>

          <div class="mt-6 flex items-center gap-3 flex-wrap">
            <div class="bg-slate-800/50 p-3 rounded-md"><img src="https://via.placeholder.com/80x24?text=Pay" alt="pay" /></div>
            <div class="bg-slate-800/50 p-3 rounded-md"><img src="https://via.placeholder.com/80x24?text=KYC" alt="kyc" /></div>
            <div class="bg-slate-800/50 p-3 rounded-md"><img src="https://via.placeholder.com/80x24?text=Ins" alt="ins" /></div>
          </div>
        </div>

        <div class="p-6 rounded-2xl card-border bg-slate-900/40">
          <h4 class="text-xl font-semibold text-white">What users say</h4>
          <div id="testimonials" class="mt-4 space-y-4">
            <div class="bg-slate-800/40 p-4 rounded-lg">
              <div class="flex items-center gap-3">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full object-cover border border-white/6" />
                <div>
                  <div class="font-semibold text-white">Sunita Verma <span class="text-slate-400 text-sm">• Lucknow</span></div>
                  <div class="text-sm text-slate-300 mt-2">Bahut accha service! Plumber 30 min me aaya, dheere aur sahi kam kiya.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4 flex items-center gap-2">
            <button id="testPrev" class="px-3 py-2 rounded-md bg-slate-800/40 border border-white/6">Prev</button>
            <button id="testNext" class="px-3 py-2 rounded-md bg-slate-800/40 border border-white/6">Next</button>
            <div class="ml-auto text-sm text-slate-400">Average rating <span class="text-yellow-400 font-semibold">4.8</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 z-10">
      <div class="stat-card bg-slate-900/40 rounded-2xl p-6 text-center card-border hover-lift soft-shadow" data-glow="teal">
        <div class="text-2xl font-bold text-primary count" data-target="10000">0</div>
        <div class="text-sm text-slate-300">Bookings Completed</div>
      </div>
      <div class="stat-card bg-slate-900/40 rounded-2xl p-6 text-center card-border hover-lift soft-shadow" data-glow="violet">
        <div class="text-2xl font-bold text-primary count" data-target="1500">0</div>
        <div class="text-sm text-slate-300">Verified Providers</div>
      </div>
      <div class="stat-card bg-slate-900/40 rounded-2xl p-6 text-center card-border hover-lift soft-shadow" data-glow="amber">
        <div class="text-2xl font-bold text-primary">4.8</div>
        <div class="text-sm text-slate-300">Avg. Rating</div>
      </div>
      <div class="stat-card bg-slate-900/40 rounded-2xl p-6 text-center card-border hover-lift soft-shadow" data-glow="teal">
        <div class="text-2xl font-bold text-primary count" data-target="12">0</div>
        <div class="text-sm text-slate-300">Cities Covered</div>
      </div>
    </section>

    <section class="mt-12 bg-gradient-to-r from-slate-800/40 to-slate-900/30 rounded-2xl p-8 flex items-center justify-between z-10 hover-lift" data-glow="primary">
      <div>
        <h3 class="text-2xl font-bold text-white">Need a service today?</h3>
        <p class="mt-2 text-slate-300">Book now and get verified, trained professionals at your doorstep.</p>
      </div>
      <div>
        <button id="ctaBook" class="px-6 py-3 rounded-lg bg-primary text-slate-900 font-semibold shadow">Book Now</button>
      </div>
    </section>

    <section class="mt-12 bg-slate-900/30 rounded-2xl p-6 z-10">
      <div class="flex flex-col md:flex-row items-center gap-4">
        <div>
          <h4 class="font-semibold text-white">Get offers & updates</h4>
          <p class="text-sm text-slate-300">Subscribe for discounts and local offers.</p>
        </div>
        <form id="subscribeForm" class="flex gap-2 w-full md:w-auto mt-2 md:mt-0">
          <input placeholder="Enter email or phone" class="px-3 py-2 rounded-lg bg-transparent border border-white/6 text-slate-200" />
          <button class="px-4 py-2 rounded-lg bg-primary text-slate-900">Subscribe</button>
        </form>
      </div>
    </section>

    <footer class="mt-12 bg-transparent text-slate-300 rounded-2xl p-8 z-10">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
        <div>
          <div class="text-2xl font-bold text-primary">HouseWise</div>
          <p class="text-sm text-slate-300 mt-2">Trusted local services in your city. Verified professionals, secure payments, and easy bookings.</p>
        </div>
        <div><h5 class="font-semibold text-white">Company</h5><ul class="mt-3 text-sm text-slate-300 space-y-2"><li>About</li><li>Careers</li><li>Blog</li></ul></div>
        <div><h5 class="font-semibold text-white">Support</h5><ul class="mt-3 text-sm text-slate-300 space-y-2"><li>Help Center</li><li>Contact</li><li>Privacy</li></ul></div>
        <div><h5 class="font-semibold text-white">Contact</h5><div class="text-sm text-slate-300 mt-3">+91 99999 99999</div><div class="text-sm text-slate-300 mt-1">support@housewise.example</div></div>
      </div>
      <div class="mt-6 text-center text-sm text-slate-400">© <span id="year"></span> HouseWise. All rights reserved.</div>
    </footer>

    <div class="fixed bottom-6 left-1/2 transform -translate-x-1/2 md:hidden z-50">
      <button class="px-6 py-3 rounded-full bg-primary text-slate-900 font-semibold shadow-lg">Book Now</button>
    </div>
  </main>

  <!-- SCRIPTS: counters fix + colored glow hover + carousel + animations -->
  <script>
    // ---------- utility: color map for glow ----------
    const glowMap = {
      'teal': 'rgba(6,182,212,0.14)',
      'violet': 'rgba(124,58,237,0.14)',
      'amber': 'rgba(245,158,11,0.14)',
      'primary': 'rgba(6,182,212,0.12)'
    };

    // animate box glow + lift on mouseenter, revert on leave
    function attachGlowEffect(selector) {
      document.querySelectorAll(selector).forEach(el => {
        const glow = el.dataset.glow || 'teal';
        const color = glowMap[glow] || glowMap['teal'];
        el.addEventListener('mouseenter', () => {
          gsap.killTweensOf(el);
          gsap.to(el, { boxShadow: `0 20px 50px ${color}`, y: -8, scale: 1.02, duration: 0.18, ease: 'power1.out' });
        });
        el.addEventListener('mouseleave', () => {
          gsap.killTweensOf(el);
          gsap.to(el, { boxShadow: '0 6px 20px rgba(2,6,23,0.6)', y: 0, scale: 1, duration: 0.18, ease: 'power1.out' });
        });
      });
    }

    // apply to category cards, provider cards, trust mini items, stat cards, hero small card
    attachGlowEffect('.cat-card');
    attachGlowEffect('.prov-card');
    attachGlowEffect('.hover-lift[data-glow]');
    attachGlowEffect('.stat-card');

    // ---------- COUNTERS: fixed so they run ----------
    function animateCount(el, duration = 900) {
      if (!el || el.dataset.animated) return;
      el.dataset.animated = '1';
      const target = parseInt(el.dataset.target.replace(/,/g,''), 10) || 0;
      const start = 0;
      const range = target - start;
      if (range <= 0) { el.textContent = target; return; }
      const increment = Math.ceil(range / (duration / 16));
      let current = start;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) { el.textContent = target; clearInterval(timer); }
        else el.textContent = current;
      }, 16);
    }

    // IntersectionObserver to animate when counters come into view
    const counters = document.querySelectorAll('.count');
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) animateCount(entry.target);
      });
    }, { threshold: 0.4 });

    counters.forEach(c => {
      counterObserver.observe(c);
      // also trigger immediately if already visible (helps when element is in initial viewport)
      const rect = c.getBoundingClientRect();
      if (rect.top >= 0 && rect.top < window.innerHeight) animateCount(c);
    });

    // ---------- CAROUSEL (static HTML card-based) ----------
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    function scrollCarousel(amount) {
      carousel.scrollBy({ left: amount, behavior: 'smooth' });
    }
    nextBtn.addEventListener('click', () => scrollCarousel(320));
    prevBtn.addEventListener('click', () => scrollCarousel(-320));
    let autoTimer = setInterval(() => scrollCarousel(320), 3000);
    carousel.addEventListener('mouseenter', () => clearInterval(autoTimer));
    carousel.addEventListener('mouseleave', () => { clearInterval(autoTimer); autoTimer = setInterval(() => scrollCarousel(320), 3000); });

    // ---------- small entrance animations ----------
    gsap.from('#heroTitle', { opacity: 0, y: 30, duration: 0.9, ease: 'power3.out' });
    gsap.from('#heroSub', { opacity: 0, y: 18, duration: 0.9, delay: 0.12 });
    gsap.from('#searchForm', { opacity: 0, y: 8, scale: 0.99, duration: 0.9, delay: 0.24 });
    gsap.fromAll('.cat-card', { opacity:0, y:18, duration:0.6, stagger: 0.06, ease:'power3.out' });
    gsap.fromAll('.prov-card', { opacity:0, y:24, duration:0.7, stagger: 0.08, ease:'power3.out' });

    // micro interactions for all buttons
    document.querySelectorAll('button').forEach(btn => {
      btn.addEventListener('mousedown', () => gsap.to(btn, { scale: 0.97, duration: 0.06 }));
      btn.addEventListener('mouseup', () => gsap.to(btn, { scale: 1, duration: 0.06 }));
    });

    // search demo behavior
    document.getElementById('searchForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const s = document.getElementById('serviceInput').value || 'Any Service';
      const l = document.getElementById('locationInput').value || document.getElementById('cityText').textContent;
      gsap.to(window, { scrollTo: { y: '#providers' }, duration: 0.8 });
      setTimeout(() => alert(`Searching for ${s} in ${l}`), 800);
    });

    // city sync & year
    document.getElementById('citySelect').addEventListener('change', (e) => {
      const v = e.target.value;
      document.getElementById('cityLabel').textContent = v;
      document.getElementById('cityText').textContent = v;
      document.getElementById('locationInput').placeholder = v;
    });
    document.getElementById('year') && (document.getElementById('year').textContent = new Date().getFullYear());

    // Accessibility: show focus ring on tab
    document.addEventListener('keyup', (e) => { if (e.key === 'Tab') document.body.classList.add('show-focus'); });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AlUla Pulses</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <style>
    :root {
      --gold:       #b8975a;
      --gold-lt:    #d4b07a;
      --gold-dk:    #8a6d3b;
      --ink:        #1c1410;
      --parchment:  #f7f1e8;
      --parchment2: #ede3d2;
      --text:       #2c1f12;
      --text-soft:  #6b5540;
      --border:     rgba(184,151,90,.18);
      --red:        #c0392b;
      --orange:     #d4821a;
      --green:      #2e8b57;
      --surface:    rgba(247,241,232,.97);
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      padding-top: 70px;
      font-family:'DM Sans',sans-serif;
      background:var(--parchment);
      color:var(--text);
      min-height:100vh;
    }

    @keyframes fadeUp {
      from { opacity:0; transform:translateY(10px); }
      to   { opacity:1; transform:translateY(0); }
    }
.nav {
  position: fixed;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);

  width: 100%;
  height: 130px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 46px ;
  padding: 14px 26px;
  
  margin-top: -19px;
  background: rgba(247,241,232,.9);
  border: 1px solid var(--border);
  border-radius: 30px;

  backdrop-filter: blur(14px);
  box-shadow: 0 10px 30px rgba(0,0,0,.08);

  z-index: 999;
}
    /* NAV 
    .nav {
      position:fixed; top:0; left:0; right:0; z-index:999;
      width: 100%; max-width:1100px; margin:12px auto;
      height:80px; display:flex; align-items:center; gap:20px;
      padding:0 32px;
      background:rgba(247,241,232,.93);
      backdrop-filter:blur(16px);
      border-bottom:1px solid var(--border);
    }*/
    /* .nav-logo {
      font-family:'Cormorant Garamond',serif;
      font-size:1.3rem; font-weight:600; color:var(--ink);
      flex-shrink:0;
    }
    .nav-logo span { color:var(--gold-dk); } */

        .logo{
    width:150px;
    height:130px;
    object-fit:contain;
    padding-top: 10px;
}

    /* Search bar */
    .nav-search {
      flex:1; max-width:350px;
      display:flex; align-items:center; gap:8px;
      background:white; border:1px solid var(--border);
      border-radius:999px; padding:0 18px; height:44px;
      transition:border-color .18s, box-shadow .18s;
    }
    .nav-search:focus-within {
      border-color:var(--gold);
      box-shadow:0 0 0 3px rgba(184,151,90,.1);
    }
    .nav-search svg { width:14px; height:14px; color:var(--text-soft); flex-shrink:0; }
    .nav-search input {
      border:none; outline:none; background:transparent;
      font-family:'DM Sans',sans-serif; font-size:.95rem;
      color:var(--text); width:100%;
    }
    .nav-search input::placeholder { color:var(--text-soft); }
    .search-clear {
      background:none; border:none; cursor:pointer;
      color:var(--text-soft); padding:0; line-height:1;
      font-size:1rem; display:none;
    }
    .search-clear.visible { display:block; }

    /* Search dropdown */
    .search-dropdown {
      position:absolute; top:54px; left:0; right:0;
      background:white; border:1px solid var(--border);
      border-radius:12px; overflow:hidden;
      box-shadow:0 8px 28px rgba(0,0,0,.1);
      display:none; z-index:1000;
    }
    .search-dropdown.open { display:block; animation:fadeUp .18s ease both; }
    .search-item {
      display:flex; align-items:center; gap:10px;
      padding:10px 14px; cursor:pointer;
      transition:background .12s;
    }
    .search-item:hover { background:var(--parchment); }
    .search-item-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
    .search-item-name { font-size:.83rem; font-weight:500; color:var(--text); }
    .search-item-sub { font-size:.7rem; color:var(--text-soft); }
    .search-wrap { position: relative;
  display: flex;
  align-items: center;
  gap: 10px; /* المسافة بين السيرش و Exit */ }

    .nav-links { display:flex; gap:22px; margin-left:auto; }
    .nav-links a {
      font-size:.75rem; font-weight:500; letter-spacing:1.2px;
      text-transform:uppercase; color:var(--text-soft); text-decoration:none;
      transition:color .18s; white-space:nowrap;
    }
    .nav-links a:hover { color:var(--gold-dk); }

    /* HOME */
    #home { min-height:100vh; display:flex; flex-direction:column; align-items:center; padding-top:58px; }

    .hero {
      width:100%;
      background:linear-gradient(158deg, #efe6d4 0%, var(--parchment) 65%);
      border-bottom:1px solid var(--border);
      display:flex; flex-direction:column; align-items:center; text-align:center;
      padding:60px 24px 48px; gap:12px;
      position:relative; overflow:hidden;
    }
    .hero::before {
      content:'';
      position:absolute; inset:0;
      background:url("data:image/svg+xml,%3Csvg width='52' height='52' viewBox='0 0 52 52' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M26 2 L28 24 L50 26 L28 28 L26 50 L24 28 L2 26 L24 24 Z' fill='%23b8975a' fill-opacity='0.035'/%3E%3C/svg%3E");
      opacity:.8;
    }
    .hero-badge {
      position:relative; z-index:1;
      display:inline-flex; align-items:center; gap:6px;
      background:rgba(184,151,90,.1); border:1px solid rgba(184,151,90,.28);
      border-radius:100px; padding:4px 14px;
      font-size:.68rem; font-weight:500; letter-spacing:1.4px; text-transform:uppercase;
      color:var(--gold-dk);
    }
    .hero-title {
      position:relative; z-index:1;
      font-family:'Cormorant Garamond',serif;
      font-size:clamp(2.4rem,5vw,3.8rem); font-weight:600; line-height:1.12;
      color:var(--ink);
    }
    .hero-title em { font-style:italic; color:var(--gold-dk); }
    .hero-desc {
      position:relative; z-index:1;
      font-size:.93rem; color:var(--text-soft); max-width:380px;
      line-height:1.8; font-weight:300;
    }
    .divider {
      position:relative; z-index:1;
      width:36px; height:1px;
      background:linear-gradient(90deg,transparent,var(--gold),transparent);
    }
    .glance-text {
      position:relative; z-index:1;
      font-family:'Cormorant Garamond',serif;
      font-size:1.12rem; font-style:italic; color:var(--text-soft);
    }
    .stats-bar { display:flex; gap:10px; position:relative; z-index:1; margin-top:4px; }
    .stat-pill {
      display:flex; align-items:center; gap:6px;
      background:white; border:1px solid var(--border);
      border-radius:100px; padding:5px 14px;
      font-size:.76rem; font-weight:500;
      box-shadow:0 1px 4px rgba(0,0,0,.04);
    }
    .stat-dot { width:7px; height:7px; border-radius:50%; }

    /* MAP PREVIEW SECTION */
    .map-section {
      width:100%; max-width:880px;
      padding:36px 24px 56px;
      display:flex; flex-direction:column; align-items:center; gap:14px;
    }
    .section-label {
      width:100%;
      display:flex; align-items:center; gap:12px;
      font-size:.7rem; font-weight:500; letter-spacing:1.8px;
      text-transform:uppercase; color:var(--gold-dk);
    }
    .section-label::before,.section-label::after {
      content:''; flex:1; height:1px; background:var(--border);
    }

    .preview-card {
      width:100%; cursor:pointer;
      background:white; border:1px solid var(--border);
      border-radius:18px; overflow:hidden;
      box-shadow:0 2px 16px rgba(0,0,0,.06), 0 1px 3px rgba(0,0,0,.04);
      transition:transform .28s cubic-bezier(.22,.6,.36,1), box-shadow .28s;
    }
    .preview-card:hover {
      transform:translateY(-4px);
      box-shadow:0 12px 40px rgba(0,0,0,.1), 0 2px 8px rgba(0,0,0,.05);
    }
    .card-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:13px 18px;
      border-bottom:1px solid var(--border);
      background:var(--parchment);
    }
    .card-header-left { display:flex; align-items:center; gap:10px; }
    .card-header-left span { font-size:.8rem; font-weight:500; color:var(--text); }
    
    .open-btn svg { width:13px; height:13px; }

    #preview-map { height:300px; pointer-events:none; }

    .card-footer {
      display:flex; align-items:center; justify-content:space-between;
      padding:11px 18px;
      background:var(--parchment); border-top:1px solid var(--border);
    }
    .legend { display:flex; gap:16px; }
    .leg { display:flex; align-items:center; gap:5px; font-size:.71rem; color:var(--text-soft); }
    .leg-dot { width:8px; height:8px; border-radius:50%; }

    /* FULL MAP SECTION (inline, same page) */
    #full-map-section {
      width:100%; max-width:880px;
      padding:0 24px 60px;
      display:none; flex-direction:column; gap:0;
      animation:fadeUp .4s cubic-bezier(.22,.6,.36,1) both;
    }
    #full-map-section.open { display:flex; }

    .full-map-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:14px 0 12px;
      border-bottom:1px solid var(--border);
      margin-bottom:0;
    }
    .full-map-header-left { display:flex; align-items:center; gap:12px; }
    .collapse-btn {
      display:flex; align-items:center; gap:6px;
      background:white; border:1px solid var(--border); border-radius:8px;
      padding:6px 13px; font-size:.78rem; font-weight:500; color:var(--text);
      cursor:pointer; transition:all .18s;
    }
    .collapse-btn:hover { background:var(--parchment2); border-color:var(--gold); color:var(--gold-dk); }
    .full-map-title {
      font-family:'Cormorant Garamond',serif;
      font-size:1rem; font-weight:600; color:var(--ink);
    }
    .full-map-meta { font-size:.7rem; color:var(--text-soft); }

    .full-map-body {
      display:flex; border:1px solid var(--border); border-top:none;
      border-radius:0 0 18px 18px; overflow:hidden;
      box-shadow:0 8px 32px rgba(0,0,0,.07);
    }
    #full-map { flex:1; height:520px; z-index:1; }

    .sidebar {
      width:240px; flex-shrink:0;
      background:var(--surface); border-left:1px solid var(--border);
      overflow-y:auto; z-index:2;
    }
    .sb-section { padding:16px 14px; border-bottom:1px solid var(--border); }
    .sb-heading {
      font-family:'Cormorant Garamond',serif;
      font-size:.92rem; font-weight:600; color:var(--ink); margin-bottom:10px;
    }
    .zone-row {
      display:flex; align-items:center; gap:10px;
      padding:8px 10px; border-radius:8px; cursor:pointer;
      transition:background .15s; margin-bottom:3px;
    }
    .zone-row:hover { background:var(--parchment2); }
    .zone-row:last-child { margin-bottom:0; }
    .zr-badge { width:9px; height:9px; border-radius:50%; flex-shrink:0; }
    .zr-name { font-size:.8rem; font-weight:500; color:var(--text); }
    .zr-status { font-size:.67rem; margin-top:1px; }

    .leg-block { display:flex; flex-direction:column; gap:8px; }
    .leg-row { display:flex; align-items:flex-start; gap:8px; }
    .leg-circle { width:8px; height:8px; border-radius:50%; margin-top:3px; flex-shrink:0; }
    .leg-body { font-size:.71rem; color:var(--text-soft); line-height:1.55; }
    .leg-body strong { color:var(--text); }

    /* Leaflet tweaks */
    .leaflet-container { background:#e9e0d0 !important; font-family:'DM Sans',sans-serif !important; }
    .leaflet-control-zoom a { color:var(--text)!important; background:white!important; border-color:var(--border)!important; }
    .leaflet-control-zoom a:hover { background:var(--parchment2)!important; }
    .leaflet-popup-content-wrapper {
      border-radius:12px!important;
      box-shadow:0 8px 28px rgba(0,0,0,.1)!important;
      border:1px solid var(--border)!important;
    }
    .leaflet-popup-tip { background:white!important; }

    /* ── Zone Detail Card ── */
    #zone-detail {
      display:none;
      width:100%; max-width:880px;
      padding:0 24px 56px;
      animation:fadeUp .35s cubic-bezier(.22,.6,.36,1) both;
    }
    #zone-detail.visible { display:block; }

    .zone-detail-inner {
      background:white; border:1px solid var(--border);
      border-radius:18px; overflow:hidden;
      box-shadow:0 4px 24px rgba(0,0,0,.07);
    }
    .zd-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:18px 24px;
      border-bottom:1px solid var(--border);
      background:var(--parchment);
    }
    .zd-header-left { display:flex; align-items:center; gap:12px; }
    .zd-name {
      font-family:'Cormorant Garamond',serif;
      font-size:1.3rem; font-weight:600; color:var(--ink);
    }
    .zd-tag {
      display:inline-flex; align-items:center; gap:5px;
      padding:4px 12px; border-radius:100px;
      font-size:.72rem; font-weight:500; letter-spacing:.4px;
      color:white;
    }
    .zd-close {
      background:none; border:1px solid var(--border); border-radius:8px;
      padding:5px 12px; font-size:.75rem; font-weight:500;
      color:var(--text-soft); cursor:pointer; transition:all .15s;
    }
    .zd-close:hover { border-color:var(--gold); color:var(--gold-dk); background:var(--parchment2); }

    .zd-body {
      display:flex; gap:0;
    }
    .zd-text {
      flex:1; padding:24px 28px;
    }
    .zd-desc {
      font-size:.9rem; color:var(--text-soft); line-height:1.85;
      font-weight:300;
    }
    .zd-img-wrap {
      width:260px; flex-shrink:0;
      border-left:1px solid var(--border);
      overflow:hidden;
    }
    .zd-img-wrap img {
      width:100%; height:100%; object-fit:cover;
      display:block;
      min-height:200px;
    }
    .zd-img-wrap .zd-no-img {
      width:100%; height:100%; min-height:200px;
      background:var(--parchment2);
      display:flex; align-items:center; justify-content:center;
      font-size:.75rem; color:var(--text-soft);
    }

    /*--FOOTER--*/
.main-footer {
    
    background:#4b2e1e;
    height: 90px;
    color:white;
    text-align:center;
    padding:12px;
    margin-top:30px;
    }
    
    .main-footer p{
padding-top: 20px;

    }

.brand {
  display: flex;
  align-items: center;
  gap: 12px;
}

.brand h1 {
  margin: 0;
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(2.5rem, 3vw, 4.2rem);
  font-weight: 700;
  color: #1c1410;
  line-height: .95;
}

.brand p {
  margin: 10px 0 0;
  font-family: 'DM Sans', sans-serif;
  font-size: clamp(1rem, 1.15vw, 1.55rem);
  color: #6b5540;
  letter-spacing: .01em;
}

.exit-btn {
    background: rgba(255,255,255,.88);
    border: 1px solid var(--border);
    color: #453831;

    border-radius: 999px;
    padding: 10px 16px; /* أصغر شوي عشان يناسب السيرش */

    font-size: 0.9rem;
    font-weight: 500;
    font-family: 'DM Sans', sans-serif;

    text-decoration: none;
    cursor: pointer;
    transition: .2s ease;

    display: inline-block;
}

.exit-btn:hover {
   transform: translateY(-1px);
      border-color: rgba(184,151,90,.35);
      box-shadow: 0 8px 18px rgba(0,0,0,.06);
}
  </style>
</head>
<body>

<!-- ═══════ HOME ═══════ -->
<div id="home" class="page active">
  <!-- <nav class="nav">
    <div class="nav-logo"><img src="images/logo.png" alt="Logo" class="logo">
</div>

    <div class="search-wrap">
      <div class="nav-search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input id="search-input" type="text" placeholder="Search zones, sites…" autocomplete="off"
          oninput="onSearch(this.value)" onfocus="onSearchFocus()" onblur="onSearchBlur()"/>
        <button class="search-clear" id="search-clear" onclick="clearSearch()">×</button>
      </div>
      <div class="search-dropdown" id="search-dropdown"></div>
    </div>

    <div class="nav-links">
      <a href="#">Home</a><a href="#">Zones</a><a href="#">Updates</a><a href="#">About</a>
    </div>
  </nav>-->
  <nav class="nav">

  <!-- LOGO + TITLE -->
  <div class="brand">
    <img src="images/logo.png" class="logo">

    <div>
      <h1>AlUla Pulses</h1>
      <p>Heritage-informed urban awareness</p>
    </div>
  </div>

  <!-- SEARCH -->
  <div class="search-wrap">
    <div class="nav-search">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"/>
        <path d="M21 21l-4.35-4.35"/>
      </svg>

      <input id="search-input" type="text"
        placeholder="Search zones, sites…"
        oninput="onSearch(this.value)"
        onfocus="onSearchFocus()"
        onblur="onSearchBlur()">

      <button class="search-clear" id="search-clear" onclick="clearSearch()">×</button>
    </div>

    <div class="search-dropdown" id="search-dropdown"></div>
    <a href="index.html" class="exit-btn">Exit</a>
  </div>

</nav>

  <div class="hero">
    <div class="hero-badge">✦ Saudi Heritage · Intelligence</div>
    <h1 class="hero-title">Welcome to <em>AlUla Pulses</em></h1>
    <div class="divider"></div>
    <p class="hero-desc">Your window into AlUla's ancient wonders, visitor zones, and crowd intelligence.</p>
    <p class="glance-text">Get a glance of AlUla's latest updates</p>
    <div class="stats-bar">
      <div class="stat-pill"><div class="stat-dot" style="background:var(--red)"></div>1 Crowded</div>
      <div class="stat-pill"><div class="stat-dot" style="background:var(--orange)"></div>2 Moderate</div>
      <div class="stat-pill"><div class="stat-dot" style="background:var(--green)"></div>2 Clear</div>
    </div>
  </div>

  <div class="map-section">
    <div class="section-label">Zone Map</div>

    <!-- Preview card -->
    <div class="preview-card" id="preview-card" onclick="openMap()">
      <div class="card-header">
        <div class="card-header-left">
          <span>AlUla Region</span>
        </div>
        <div class="open-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
          Open Full Map
        </div>
      </div>
      <div id="preview-map"></div>
      <div class="card-footer">
        <div class="legend">
          <div class="leg"><div class="leg-dot" style="background:var(--red)"></div>Crowded</div>
          <div class="leg"><div class="leg-dot" style="background:var(--orange)"></div>Moderate</div>
          <div class="leg"><div class="leg-dot" style="background:var(--green)"></div>Clear</div>
        </div>
        <div style="font-size:.71rem;color:var(--text-soft)">Tap to explore ↗</div>
      </div>
    </div>

    <!-- Full map section (expands below) -->
    <div id="full-map-section">
      <div class="full-map-header">
        <div class="full-map-header-left">
          <button class="collapse-btn" onclick="closeMap()">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
            Close
          </button>
          <div class="full-map-title">AlUla Zone Map</div>
        </div>
        <div class="full-map-meta">5 zones · Updated</div>
      </div>
      <div class="full-map-body">
        <div id="full-map"></div>
        <div class="sidebar">
          <div class="sb-section">
            <div class="sb-heading">Zone Status</div>
            <div id="zone-list"></div>
          </div>
          <div class="sb-section">
            <div class="sb-heading">Legend</div>
            <div class="leg-block">
              <div class="leg-row">
                <div class="leg-circle" style="background:var(--red)"></div>
                <div class="leg-body"><strong>Crowded</strong> — High density, expect waits</div>
              </div>
              <div class="leg-row">
                <div class="leg-circle" style="background:var(--orange)"></div>
                <div class="leg-body"><strong>Moderate</strong> — Steady flow, manageable</div>
              </div>
              <div class="leg-row">
                <div class="leg-circle" style="background:var(--green)"></div>
                <div class="leg-body"><strong>Clear</strong> — Low crowd, ideal to visit</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /map-section -->

  <!-- Zone Detail Card -->
  <div id="zone-detail">
    <div class="zone-detail-inner">
      <div class="zd-header">
        <div class="zd-header-left">
          <div class="zd-name" id="zd-name"></div>
          <div class="zd-tag" id="zd-tag"></div>
        </div>
        <button class="zd-close" onclick="closeZoneDetail()">✕ Close</button>
      </div>
      <div class="zd-body">
        <div class="zd-text">
          <p class="zd-desc" id="zd-desc"></p>
        </div>
        <div class="zd-img-wrap" id="zd-img-wrap"></div>
      </div>
    </div>
  </div>

<!-- <footer class="footer">
  <p>© 2026 AlUla Insight | All rights reserved</p>
</footer> -->

</div><!-- /home -->
<!-- FOOTER -->
<footer class="main-footer">
    <p>© 2026 AlUla Pulses</p>
</footer>
<script>
const zones = [
  {
    name:"Hegra Historical City District", short:"Hegra",
    lat:26.7960, lng:37.9520, status:"crowded", color:"#c0392b", tag:"Crowded",
    desc:"Hegra, also known as Madā͐in Ṣāliḥ, is a premier UNESCO World Heritage Site in Saudi Arabia located in AlUla, renowned for its remarkably preserved Nabataean tombs and over 100 monumental graves from the 1st century AD. As the second city of the Nabataean civilization after Petra, it features intricate stone-cut architecture, ancient agricultural systems, and inscriptions within a dramatic desert landscape.",
    image:"images/hegraPic1.png"
  },
  {
    name:"Nabataean Horizon District", short:"Nabataean Horizon",
    lat:26.7550, lng:37.9380, status:"clear", color:"#2e8b57", tag:"Clear",
    desc:"Situated between the ancient sites of Jabal Ikmah and the Hegra Historical City, this district highlights the artistic and architectural legacy of the Nabataean civilization, acting as a curtain-raiser to the main UNESCO site of Hegra. The district focuses on creating an immersive experience showcasing the lifestyle, art, and architecture of the Nabataeans, who settled the area over 2,000 years ago.",
    image:"images/NabataeanPic1.jpg"
  },
  {
    name:"Jabal Ikmah District", short:"Jabal Ikmah",
    lat:26.7100, lng:37.9200, status:"moderate", color:"#d4821a", tag:"Moderate",
    desc:"Jabal Ikmah is one of the most prominent historical sites in AlUla and is designated as one of the largest open-air libraries in the Arabian Peninsula. It includes hundreds of carved inscriptions and stone carvings along the mountain made in different eras and civilizations thousands of years ago.",
    image:"images/JabalPic1.jpg"
  },
  {
    name:"Dadan District", short:"Dadan",
    lat:26.6600, lng:37.9350, status:"clear", color:"#2e8b57", tag:"Clear",
    desc:"Dadan is a premier archaeological site in AlUla. One of the city's most striking features is its rock-cut tombs, carved high into the red sandstone cliffs at about 50 meters above the desert floor — an enduring testament to the craftsmanship and ingenuity of the ancient builders. Numerous inscriptions, statues, and reliefs found in the area further illustrate the cultural, religious, and political life of the period.",
    image:"images/DadanPic1.jpg"
  },
  {
    name:"AlUla Old Town District", short:"Old Town AlUla",
    lat:26.6216, lng:37.9218, status:"moderate", color:"#d4821a", tag:"Moderate",
    desc:"The Old Town of AlUla is more than a historic site — it is a living experience that takes visitors back to the feeling of past centuries. It opens a window into a time-honored way of life, inviting exploration through its alleys that have preserved their spirit despite the passage of time. A destination that inspires, enchants, and connects every visitor to the essence of AlUla.",
    image:"images/AlulaOldTownPic1.jpg"
  },
  
];
const tagColors  = { Crowded:"#c0392b", Moderate:"#d4821a", Clear:"#2e8b57" };
const statusLabel = { crowded:"🔴 Crowded", moderate:"🟠 Moderate", clear:"🟢 Clear" };

const TILE   = 'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png';
const ATTR   = '&copy; <a href="https://www.openstreetmap.org/copyright">OSM</a> &copy; <a href="https://carto.com/">CARTO</a>';
const CENTER = [26.68, 37.93];

let previewMap=null, fullMap=null;

function markerIcon(z, size) {
  const inner = Math.round(size*.35);
  return L.divIcon({
    className:'',
    html:`<div style="width:${size}px;height:${size}px;border-radius:50%;
      background:${z.color}bb;border:2.5px solid ${z.color};
      box-shadow:0 2px 10px ${z.color}55;
      display:flex;align-items:center;justify-content:center;">
      <div style="width:${inner}px;height:${inner}px;border-radius:50%;background:white;opacity:.75"></div>
    </div>`,
    iconSize:[size,size], iconAnchor:[size/2,size/2],
    popupAnchor:[0,-size/2-4],
  });
}

function initPreview() {
  if (previewMap) return;
  previewMap = L.map('preview-map', {
    center:CENTER, zoom:11,
    zoomControl:false, attributionControl:false,
    dragging:false, scrollWheelZoom:false,
    doubleClickZoom:false, touchZoom:false,
  });
  L.tileLayer(TILE, {attribution:ATTR}).addTo(previewMap);
  zones.forEach(z => L.marker([z.lat,z.lng],{icon:markerIcon(z,26)}).addTo(previewMap));
}

function initFullMap() {
  if (fullMap) return;
  fullMap = L.map('full-map', { center:CENTER, zoom:12 });
  L.tileLayer(TILE, {attribution:ATTR}).addTo(fullMap);

  zones.forEach(z => {
    L.marker([z.lat,z.lng],{icon:markerIcon(z,38)})
      .addTo(fullMap)
      .bindPopup(`
        <div style="font-family:'DM Sans',sans-serif;padding:4px 2px;min-width:155px">
          <div style="font-family:'Cormorant Garamond',serif;font-size:1rem;font-weight:600;color:#1c1410;margin-bottom:3px">${z.name}</div>
          <div style="font-size:.75rem;color:#6b5540;margin-bottom:7px">${z.short}</div>
          <div style="font-size:.76rem;font-weight:500;color:${z.color}">${statusLabel[z.status]}</div>
        </div>`);
  });

  const list = document.getElementById('zone-list');
  zones.forEach(z => {
    const el = document.createElement('div');
    el.className = 'zone-row';
    el.innerHTML = `
      <div class="zr-badge" style="background:${z.color}"></div>
      <div>
        <div class="zr-name">${z.short}</div>
        <div class="zr-status" style="color:${z.color}">${statusLabel[z.status]}</div>
      </div>`;
    el.onclick = () => fullMap.flyTo([z.lat,z.lng], 14, {duration:1.1});
    list.appendChild(el);
  });
}

function openMap() {
  const section = document.getElementById('full-map-section');
  const card    = document.getElementById('preview-card');
  section.classList.add('open');
  card.style.display = 'none';
  setTimeout(() => {
    initFullMap();
    fullMap.invalidateSize();
    section.scrollIntoView({ behavior:'smooth', block:'start' });
  }, 60);
}

function closeMap() {
  const section = document.getElementById('full-map-section');
  const card    = document.getElementById('preview-card');
  section.classList.remove('open');
  card.style.display = '';
  card.scrollIntoView({ behavior:'smooth', block:'center' });
}

/* ── Zone Detail Card ── */
function showZoneDetail(z) {
  document.getElementById('zd-name').textContent = z.name;
  const tag = document.getElementById('zd-tag');
  tag.textContent = z.tag;
  tag.style.background = tagColors[z.tag] || '#888';
  document.getElementById('zd-desc').textContent = z.desc;
  const imgWrap = document.getElementById('zd-img-wrap');
  imgWrap.innerHTML = z.image
    ? `<img src="${z.image}" alt="${z.name}" onerror="this.parentNode.innerHTML='<div class=zd-no-img>No image available</div>'">`
    : `<div class="zd-no-img">No image available</div>`;
  const detail = document.getElementById('zone-detail');
  detail.classList.add('visible');
  setTimeout(() => detail.scrollIntoView({ behavior:'smooth', block:'center' }), 60);
}

function closeZoneDetail() {
  document.getElementById('zone-detail').classList.remove('visible');
}

/* ── Search ── */
function onSearch(val) {
  const clear = document.getElementById('search-clear');
  const dd    = document.getElementById('search-dropdown');
  clear.classList.toggle('visible', val.length > 0);
  const q = val.trim().toLowerCase();
  if (!q) { dd.classList.remove('open'); return; }
  const results = zones.filter(z =>
    z.name.toLowerCase().includes(q) ||
    z.short.toLowerCase().includes(q)
  );
  dd.innerHTML = results.length
    ? results.map(z => `
        <div class="search-item" onmousedown="selectZone(${JSON.stringify(z.name).replace(/"/g,'&quot;')})">
          <div class="search-item-dot" style="background:${z.color}"></div>
          <div>
            <div class="search-item-name">${z.name}</div>
            <div class="search-item-sub">${statusLabel[z.status]} · ${z.short}</div>
          </div>
        </div>`).join('')
    : `<div style="padding:12px 14px;font-size:.8rem;color:var(--text-soft)">No zones found</div>`;
  dd.classList.add('open');
}

function selectZone(name) {
  const z = zones.find(z => z.name === name);
  if (!z) return;
  document.getElementById('search-input').value = z.name;
  document.getElementById('search-dropdown').classList.remove('open');
  document.getElementById('search-clear').classList.add('visible');
  showZoneDetail(z);
}

function clearSearch() {
  document.getElementById('search-input').value = '';
  document.getElementById('search-clear').classList.remove('visible');
  document.getElementById('search-dropdown').classList.remove('open');
}

function onSearchFocus() {
  const val = document.getElementById('search-input').value;
  if (val) onSearch(val);
}
function onSearchBlur() {
  setTimeout(() => document.getElementById('search-dropdown').classList.remove('open'), 150);
}

window.addEventListener('load', () => setTimeout(initPreview, 120));
</script>
</body>
</html>


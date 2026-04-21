<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Manager Dashboard</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet" />
<style>
 .topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  min-height: 100px;
  padding: 18px 28px;
  background: rgba(247, 241, 232, 0.84);
  border: 1px solid rgba(184, 151, 90, 0.18);
  border-radius: 34px;
  backdrop-filter: blur(14px);
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.08);
  margin-bottom: 46px;
}

.brand {
  display: flex;
  align-items: center;
  gap: 18px;
  min-width: 0;
}

.brand-mark {
  width: 65px;
  height: 65px;
  border-radius: 22px;
  display: grid;
  place-items: center;
  overflow: hidden;
  flex-shrink: 0;
  background: transparent;
  box-shadow: none;
}

.logo-img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  display: block;
}

.brand-copy {
  min-width: 0;
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
</style>
</head>

<body>

 <header class="topbar">
  <div class="brand">
    <div class="brand-mark">
      <img src="images/logo.png" alt="AlUla Pulses logo" class="logo-img">
    </div>
    <div class="brand-copy">
      <h1>AlUla Pulses</h1>
      <p>Heritage-informed urban awareness</p>
    </div>
  </div>
  <a href="index.html" class="exit-btn">Exit</a>
</header>

<div class="container dashboard-layout">

    <!-- Welcome -->
    <section class="admin-welcome" id="welcome">

    <div class="welcome-card">
        <h1><pre>

        </pre>Hello Manager 👋</h1>
       
        <p>Manage zone activity tags.</p>
    </div>

</section>

    
    <section class="zones-section" id="zones">
        <h2>Zones</h2>
        
    <div class="allzones-card">
        
      <div class="zone-card">

    <!-- ZONES 1 -->
    <div class="zone-top">
        <img src="images/hegra (1).png" alt="Logo" class="zoneimage-admin">

        <div class="zone-text">
            <h3>Hegra Historical City District</h3>
            <button onclick="toggleDetails('zone1', this)">Show More</button>
        </div>
    </div>

    <div class="zone-details" id="zone1">
        <div class="zone-header">
            <p>Hegra, also known as Madā͐in Ṣāliḥ, is a premier UNESCO World Heritage Site in Saudi 
                Arabia located in AlUla, renowned for its remarkably preserved Nabataean tombs and over
                 100 monumental graves from the 1st century AD. As the second city of the Nabataean civilization 
                 after Petra, it features intricate stone-cut architecture, ancient agricultural systems, and inscriptions 
                 within a dramatic desert landscape.</p>
            <span id="tag-zone1" class="zone-tag no-data">No Data</span>
        </div>

        <div class="zone-actions">
            <select id="add-zone1" onchange="addTag('zone1', this)">
                <option value="">Add Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <select id="edit-zone1" onchange="editTag('zone1', this)" disabled>
                <option value="">Edit Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <button onclick="deleteTag('zone1')" disabled id="delete-zone1">
                Delete Tag
            </button>
        </div>
    </div>

</div>

   
        <!-- ZONES 2 -->
         <div class="zone-card">
    <div class="zone-top">
        <img src="images/hegra (2).png" alt="Logo" class="zoneimage-admin">

        <div class="zone-text">
            <h3>Nabataean Horizon District</h3>
            <button onclick="toggleDetails('zone2', this)">Show More</button>
        </div>
    </div>

    <div class="zone-details" id="zone2">
        <div class="zone-header">
            <p>Situated between the ancient sites of Jabal Ikmah and the Hegra Historical City,
                 this district highlights the artistic and architectural legacy of the Nabataean 
                 civilization, acting as a curtain-raiser to the main UNESCO site of Hegra. The district 
                 focuses on creating an immersive experience showcasing the lifestyle, art, and architecture of the Nabataeans, 
                 who settled the area over 2,000 years ago.</p>
            <span id="tag-zone2" class="zone-tag no-data">No Data</span>
        </div>

        <div class="zone-actions">
            <select id="add-zone2" onchange="addTag('zone2', this)">
                <option value="">Add Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <select id="edit-zone2" onchange="editTag('zone2', this)" disabled>
                <option value="">Edit Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <button onclick="deleteTag('zone2')" disabled id="delete-zone2">
                Delete Tag
            </button>
        </div>
    </div>

</div>

     <!-- ZONES 3 -->
      <div class="zone-card">
    <div class="zone-top">
        <img src="images/hegra (3).png" alt="Logo" class="zoneimage-admin">

        <div class="zone-text">
            <h3>Jabal Ikmah District</h3>
            <button onclick="toggleDetails('zone3', this)">Show More</button>
        </div>
    </div>

    <div class="zone-details" id="zone3">
        <div class="zone-header">
            <p>Jabal Ikmah is one of the most prominent historical sites in AlUla and is designated as 
                one of the largest open-air libraries in the Arabian Peninsula. It includes hundreds of carved 
                inscriptions and stone carvings along the mountain made
                 in different eras and civilizations thousands of years ago.</p>
            <span id="tag-zone3" class="zone-tag no-data">No Data</span>
        </div>

        <div class="zone-actions">
            <select id="add-zone3" onchange="addTag('zone3', this)">
                <option value="">Add Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <select id="edit-zone3" onchange="editTag('zone3', this)" disabled>
                <option value="">Edit Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <button onclick="deleteTag('zone3')" disabled id="delete-zone3">
                Delete Tag
            </button>
        </div>
    </div>

</div>

        <!-- ZONES 4 -->
            <div class="zone-card">
    <div class="zone-top">
        <img src="images\hegra (4).png" alt="Logo" class="zoneimage-admin">

        <div class="zone-text">
            <h3>Dadan District</h3>
            <button onclick="toggleDetails('zone4', this)">Show More</button>
        </div>
    </div>

    <div class="zone-details" id="zone4">
        <div class="zone-header">
            <p>Dadan is a premier archaeological site in AlUla. One of the city's most striking features is its rock-cut tombs,
                 carved high into the red sandstone cliffs at about 50 meters above the desert floor — an enduring testament to the 
                 craftsmanship and ingenuity of the ancient builders. Numerous inscriptions, statues, and reliefs found in the area further
                 illustrate the cultural, religious, and political life of the period.</p>
            <span id="tag-zone4" class="zone-tag no-data">No Data</span>
        </div>

        <div class="zone-actions">
            <select id="add-zone4" onchange="addTag('zone4', this)">
                <option value="">Add Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <select id="edit-zone4" onchange="editTag('zone4', this)" disabled>
                <option value="">Edit Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <button onclick="deleteTag('zone4')" disabled id="delete-zone4">
                Delete Tag
            </button>
        </div>
    </div>

</div>

         <!-- ZONES 5 -->

        <div class="zone-card">

    <div class="zone-top">
        <img src="images\hegra (5).png" alt="Logo" class="zoneimage-admin">

        <div class="zone-text">
            <h3>AlUla Old Town District</h3>
            <button onclick="toggleDetails('zone5', this)">Show More</button>
        </div>
    </div>

    <div class="zone-details" id="zone5">
        <div class="zone-header">
            <p>The Old Town of AlUla is more than a historic site — it is a living experience that takes visitors back to the feeling of
                 past centuries. It opens a window into a time-honored way of life, inviting exploration through its alleys that have preserved
                  their spirit despite the passage of time. A destination that inspires,
                 enchants, and connects every visitor to the essence of AlUla.</p>
            <span id="tag-zone5" class="zone-tag no-data">No Data</span>
        </div>

        <div class="zone-actions">
            <select id="add-zone5" onchange="addTag('zone5', this)">
                <option value="">Add Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <select id="edit-zone5" onchange="editTag('zone5', this)" disabled>
                <option value="">Edit Tag</option>
                <option>Crowded</option>
                <option>Moderate</option>
                <option>Clear</option>
            </select>

            <button onclick="deleteTag('zone5')" disabled id="delete-zone5">
                Delete Tag
            </button>
        </div>
    </div>

</div></div>
    </section>

</div>


<!-- FOOTER -->
<footer class="main-footer">
    <p>© 2026 AlUla Pulses</p>
</footer>


<!-- ============================= -->
<!-- JAVASCRIPT (PUT HERE ALWAYS) -->
<!-- ============================= -->

<script>



function toggleDetails(id, btn){
    let section = document.getElementById(id);

    if(section.style.display === "block"){
        section.style.display = "none";
        btn.innerText = "Show More";
    } else {
        section.style.display = "block";
        btn.innerText = "Show Less";
    }
}


function addTag(id, select){

    if(select.value === "") return;

    let tag = document.getElementById("tag-" + id);

    tag.innerText = select.value;
    updateTagStyle(tag, select.value);
    showNotification("Tag added successfully ✅", "success");

    // disable add
    select.disabled = true;

    // enable edit + delete
    document.getElementById("edit-" + id).disabled = false;
    document.getElementById("delete-" + id).disabled = false;

    // reset dropdown
    select.value = "";
}


function editTag(id, select){

    if(select.value === "") return;

    let tag = document.getElementById("tag-" + id);
showNotification("Tag updated ✏️", "edit");
    tag.innerText = select.value;
    updateTagStyle(tag, select.value);
    

    // reset dropdown
    select.value = "";
}


function deleteTag(id){

    let tag = document.getElementById("tag-" + id);

    tag.innerText = "No Data";
    tag.className = "zone-tag no-data";
showNotification("Tag removed ❌", "delete");
    // enable add again
    let add = document.getElementById("add-" + id);
    add.disabled = false;
    add.value = "";

    // disable edit
    let edit = document.getElementById("edit-" + id);
    edit.disabled = true;
    edit.value = "";

    // disable delete (THIS IS THE KEY FIX)
    let del = document.getElementById("delete-" + id);
    del.disabled = true;
}


function updateTagStyle(tag, value){

    tag.className = "zone-tag";

 if(value === "Crowded"){
    tag.classList.add("busy");
}
else if(value === "Moderate"){
    tag.classList.add("normal");
}
else if(value === "Clear"){
    tag.classList.add("calm");
}
}

function showNotification(message, type){

    const notif = document.getElementById("notification");

    notif.innerText = message;
    notif.className = "notification show " + type;

    setTimeout(() => {
        notif.classList.remove("show");
    }, 2500);
}

</script>
<div id="notification" class="notification"></div>
</body>
</html>
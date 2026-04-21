<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AlUla Pulses — Interfaces</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --gold: #b8975a;
      --gold-lt: #d4b07a;
      --gold-dk: #8a6d3b;
      --ink: #1c1410;
      --parchment: #f7f1e8;
      --parchment2: #ede3d2;
      --text: #2c1f12;
      --text-soft: #6b5540;
      --border: rgba(184, 151, 90, 0.18);
      --surface: rgba(247, 241, 232, 0.97);
      --white: #ffffff;
      --shadow: 0 14px 40px rgba(0, 0, 0, 0.08);
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      background:
        radial-gradient(circle at top right, rgba(184,151,90,.08), transparent 20%),
        linear-gradient(160deg, #efe6d4 0%, var(--parchment) 48%, #f8f3eb 100%);
      min-height: 100vh;
    }

    .welcome-desc {
      margin: 14px auto 0;
      max-width: 520px;
      text-align: center;
      font-size: 1rem;
      line-height: 1.8;
      color: var(--text-soft);
    }

    .shell {
      width: min(96vw, 1960px);
      margin: 42px auto 70px;
    }

    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      min-height: 150px;
      padding: 26px 38px;
      background: rgba(247, 241, 232, 0.84);
      border: 1px solid var(--border);
      border-radius: 34px;
      backdrop-filter: blur(14px);
      box-shadow: var(--shadow);
      margin-bottom: 46px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 18px;
      min-width: 0;
    }

    .brand-mark {
      width: 82px;
      height: 82px;
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
      color: var(--ink);
      line-height: .95;
    }

    .brand p {
      margin: 10px 0 0;
      font-size: clamp(1rem, 1.15vw, 1.55rem);
      color: var(--text-soft);
      letter-spacing: .01em;
    }

    .actions {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
      flex-shrink: 0;
    }

    .btn {
      border: 1px solid var(--border);
      background: #fff;
      color: var(--text);
      border-radius: 999px;
      padding: 12px 20px;
      font-size: .95rem;
      font-weight: 500;
      cursor: pointer;
      transition: .2s ease;
      font-family: inherit;
    }

    .btn:hover {
      transform: translateY(-1px);
      border-color: rgba(184,151,90,.35);
      box-shadow: 0 8px 18px rgba(0,0,0,.06);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--gold), var(--gold-dk));
      color: #fff;
      border-color: transparent;
    }

    .btn-soft {
      background: rgba(255,255,255,.88);
    }

    .flow-stage {
      min-height: 520px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .flow-card-active {
      width: min(100%, 820px);
      background: linear-gradient(180deg, rgba(255,255,255,.95), rgba(247,241,232,.95));
      border: 1px solid var(--border);
      border-radius: 34px;
      box-shadow: var(--shadow);
      padding: 46px 52px;
      display: none;
      flex-direction: column;
      align-items: center;
      animation: fadeUp .28s ease;
    }

    .flow-card-active.active {
      display: flex;
    }

    .flow-left {
      width: 100%;
      text-align: center;
      margin-bottom: 30px;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 11px 18px;
      border-radius: 999px;
      background: rgba(184,151,90,.12);
      color: var(--gold-dk);
      font-size: .84rem;
      font-weight: 700;
      border: 1px solid rgba(184,151,90,.16);
    }

    .flow-left h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(3.1rem, 4vw, 5.2rem);
      margin: 22px 0 0;
      color: var(--ink);
      line-height: .95;
      font-weight: 700;
    }

    .flow-left h2 em {
      color: var(--gold-dk);
      font-style: italic;
      font-weight: 600;
    }

    .entry-actions {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
      width: 100%;
      max-width: 640px;
    }

    .flow-choice {
      border: 1px solid rgba(184,151,90,.35);
      border-radius: 30px;
      background: linear-gradient(180deg, #fff, #fcfaf6);
      padding: 28px 26px;
      text-align: center;
      cursor: pointer;
      transition: .2s ease;
      font-family: inherit;
    }

    .flow-choice:hover {
      transform: translateY(-2px);
      border-color: rgba(184,151,90,.55);
      box-shadow: 0 14px 26px rgba(184,151,90,.12);
    }

    .flow-choice small {
      display: block;
      text-transform: uppercase;
      letter-spacing: .12em;
      color: var(--gold-dk);
      font-size: .84rem;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .flow-choice strong {
      display: block;
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.2rem;
      color: var(--ink);
      margin-bottom: 10px;
      line-height: 1;
    }

    .flow-choice span {
      display: block;
      color: var(--text-soft);
      font-size: 1rem;
      line-height: 1.7;
    }

    .stage-box {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 28px;
      padding: 34px;
      box-shadow: 0 6px 18px rgba(0,0,0,.05);
      width: 100%;
      max-width: 620px;
    }

    .card-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.2rem;
      text-align: center;
      margin: 0 0 10px;
      color: var(--ink);
      line-height: 1;
    }

    .muted {
      color: var(--text-soft);
      font-size: 1rem;
      text-align: center;
      line-height: 1.7;
      margin: 0 0 22px;
    }

    .role-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      margin-top: 20px;
    }

    .role-card {
      border: 1px solid var(--border);
      border-radius: 22px;
      background: linear-gradient(180deg, #fff, #fcfaf6);
      padding: 22px 18px;
      text-align: center;
      cursor: pointer;
      transition: .2s ease;
      font-family: inherit;
    }

    .role-card:hover {
      border-color: rgba(184,151,90,.42);
      box-shadow: 0 8px 18px rgba(184,151,90,.12);
      transform: translateY(-1px);
    }

    .role-card small {
      display: block;
      text-transform: uppercase;
      letter-spacing: .1em;
      color: var(--gold-dk);
      font-size: .72rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .role-card strong {
      display: block;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8rem;
      color: var(--ink);
      line-height: 1;
    }

    .stack {
      display: grid;
      gap: 16px;
    }

    label {
      font-size: .86rem;
      color: var(--text-soft);
      font-weight: 500;
      display: block;
      margin-bottom: 7px;
    }

    .input {
      width: 100%;
      border: 1px solid var(--border);
      background: #fff;
      border-radius: 16px;
      padding: 13px 15px;
      font-size: .95rem;
      color: var(--text);
      font-family: inherit;
    }

    .form-actions {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-top: 16px;
      flex-wrap: wrap;
    }

    .form-actions.left {
      justify-content: flex-start;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 1100px) {
      .shell {
        width: min(100% - 28px, 1960px);
      }

      .topbar {
        padding: 24px 26px;
      }

      .flow-card-active {
        width: min(100%, 760px);
      }
    }

    @media (max-width: 760px) {
      .topbar {
        flex-direction: column;
        align-items: flex-start;
        min-height: auto;
      }

      .actions {
        width: 100%;
        justify-content: flex-end;
      }

      .brand-mark {
        width: 72px;
        height: 72px;
        border-radius: 20px;
      }

      .flow-card-active {
        padding: 28px 18px;
        border-radius: 26px;
      }

      .entry-actions,
      .role-grid {
        grid-template-columns: 1fr;
      }

      .stage-box {
        padding: 24px 18px;
      }
    }
    .main-footer{
    background:#4b2e1e;
    color:white;
    text-align:center;
    padding:12px;
    margin-top:30px;
}

.input:focus {
  outline: none;
  border-color: #b8975a;
  box-shadow: 0 0 0 2px rgba(184,151,90,.15);
}

.error-message {
  transition: 0.2s;
}
  </style>
</head>
<body>
  <div class="shell">
    <header class="topbar">
      <div class="brand">
        <div class="brand-mark">
          <img src="images/logo.png" alt="AlUla Pulses logo" class="logo-img" />
        </div>
        <div class="brand-copy">
          <h1>AlUla Pulses</h1>
          <p>Heritage-informed urban awareness</p>
        </div>
      </div>
      <div class="actions">
        <button class="btn btn-soft" id="backFlowBtn" style="display:none;" onclick="goBack()">Back</button>
      </div>
    </header>

    <div class="flow-stage">
      <div class="flow-card-active active" id="welcomeCard">
        <div class="flow-left">
          <div class="badge">✦ Smart City · AlUla</div>
          <h2>Welcome to <em>AlUla</em></h2>
          <p class="welcome-desc">
            A visual platform that helps visitors and managers understand city zones through
            clearer tags, colors, and area details.
          </p>
        </div>

        <div class="entry-actions">
          <button class="flow-choice" onclick="showStep('signupCard')">
            <small>New account</small>
            <strong>Sign up</strong>
            <span>Create a new tourist account and continue into the platform.</span>
          </button>

          <button class="flow-choice" onclick="showStep('roleCard')">
            <small>Existing user</small>
            <strong>Log in</strong>
            <span>Continue as a tourist or manager using your existing account.</span>
          </button>
        </div>
      </div>

      <div class="flow-card-active" id="signupCard">
        <div class="stage-box">
          <h3 class="card-title">Create Account</h3>
          <p class="muted">Register as a tourist by entering your username, email, and password.</p>
          <form id="signupForm" class="stack">
  <div>
    <label>Username</label>
    <input id="signupUsername" class="input" type="text" required />
  </div>

  <div>
    <label>Email</label>
    <input id="signupEmail" class="input" type="email" required />
  </div>

  <div>
    <label>Password</label>
    <input id="signupPassword" class="input" type="password" required />
  </div>

  <div class="form-actions">
    <button type="button" class="btn" onclick="showStep('welcomeCard')">Cancel</button>
    <button type="submit" class="btn btn-primary">Confirm</button>
  </div>
</form>
        </div>
      </div>

      <div class="flow-card-active" id="roleCard">
        <div class="stage-box">
          <h3 class="card-title">Log in</h3>
          <p class="muted">Choose how you want to continue, then the login form will appear.</p>
          <div class="role-grid">
            <button class="role-card" onclick="selectRole('Tourist')">
              <small>As a user</small>
              <strong>Tourist</strong>
            </button>
            <button class="role-card" onclick="selectRole('Manager')">
              <small>As an admin</small>
              <strong>Manager</strong>
            </button>
          </div>
          <div class="form-actions left" style="margin-top:18px;">
            <button type="button" class="btn" onclick="showStep('welcomeCard')">Cancel</button>
          </div>
        </div>
      </div>

      <div class="flow-card-active" id="loginCard">
        <div class="stage-box">
          <h3 class="card-title" id="loginTitle">Please enter your details</h3>
          <form id="loginForm" class="stack">
  <div>
    <label>Username</label>
    <input id="loginUsername" class="input" type="text" required />
  </div>

  <div>
    <label>Password</label>
    <input id="loginPassword" class="input" type="password" required />
  </div>

  <div class="form-actions">
    <button type="button" class="btn" onclick="showStep('welcomeCard')">Cancel</button>
    <button type="submit" class="btn btn-primary">Confirm</button>
  </div>
</form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const steps = ['welcomeCard', 'signupCard', 'roleCard', 'loginCard']
    const backFlowBtn = document.getElementById('backFlowBtn')
    const loginTitle = document.getElementById('loginTitle')
    let currentStep = 'welcomeCard'
    let selectedRole = ''
    document.addEventListener("DOMContentLoaded", () => {

  function createError(input) {
    const div = document.createElement("div");
    div.className = "error-message";
    div.style.color = "#d4a5a5";
    div.style.fontSize = "0.8rem";
    div.style.marginTop = "4px";
    div.style.display = "none";
    input.parentElement.appendChild(div);
    return div;
  }

  function showError(input, errorDiv, msg) {
    errorDiv.textContent = msg;
    errorDiv.style.display = "block";
    input.style.borderColor = "#d4a5a5";
  }

  function hideError(input, errorDiv) {
    errorDiv.style.display = "none";
    input.style.borderColor = "#e8d5c4";
  }

  function validateUsername(username) {
    if (username.trim().length < 3) return "At least 3 characters";
    return null;
  }

  function validateEmail(email) {
    if (!email.includes("@") || !email.includes(".")) {
      return "Invalid email";
    }
    return null;
  }

  function validatePassword(password) {
  if (password.length < 8) return "Min 8 characters";
  if (!/[A-Z]/.test(password)) return "Need uppercase";
  if (!/[a-z]/.test(password)) return "Need lowercase";
  if (!/[0-9]/.test(password)) return "Need number";
  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) return "Need special character"; 
  return null;
}

  // ================= SIGNUP =================
  const signupForm = document.getElementById("signupForm");

  if (signupForm) {
    const username = document.getElementById("signupUsername");
    const email = document.getElementById("signupEmail");
    const password = document.getElementById("signupPassword");

    const userErr = createError(username);
    const emailErr = createError(email);
    const passErr = createError(password);

    signupForm.addEventListener("submit", (e) => {
      e.preventDefault(); 

      let hasError = false;

      const u = validateUsername(username.value);
      const em = validateEmail(email.value);
      const p = validatePassword(password.value);

      if (u) { showError(username, userErr, u); hasError = true; }
      else hideError(username, userErr);

      if (em) { showError(email, emailErr, em); hasError = true; }
      else hideError(email, emailErr);

      if (p) { showError(password, passErr, p); hasError = true; }
      else hideError(password, passErr);

      if (hasError) {
  e.preventDefault();
  return; }

      // نجاح التسجيل
      window.location.href = 'Tourist.html';
    });
  }

  // ================= LOGIN =================
  const loginForm = document.getElementById("loginForm");


let hasError = false;
  if (loginForm) {
    const username = document.getElementById("loginUsername");
    const password = document.getElementById("loginPassword");

    const userErr = createError(username);
    const passErr = createError(password);

loginForm.addEventListener("submit", (e) => {
e.preventDefault(); 
  let hasError = false;

  const u = validateUsername(username.value);
  const p = validatePassword(password.value);

  if (u) { showError(username, userErr, u); hasError = true; }
  else hideError(username, userErr);

  if (p) { showError(password, passErr, p); hasError = true; }
  else hideError(password, passErr);

  // 🔥 تحقق من اختيار الدور
  if (!selectedRole) {
    alert("Please choose Tourist or Manager first");
    hasError = true;
  }

  if (hasError) {
    e.preventDefault();
    return;
  }

  // هنا فقط يصير التحويل
  if (selectedRole === 'Manager') {
    window.location.href = 'manager.html';
  } else {
    window.location.href = 'Tourist.html';
  }
});
  }

});

    function showStep(id) {
      steps.forEach(step => {
        document.getElementById(step).classList.remove('active')
      })
      document.getElementById(id).classList.add('active')
      currentStep = id
      backFlowBtn.style.display = id === 'welcomeCard' ? 'none' : 'inline-flex'
    }

    function selectRole(role) {
      selectedRole = role
      loginTitle.textContent = role === 'Manager' ? 'Manager Log in' : 'Tourist Log in'
      showStep('loginCard')
    }



    function goBack() {
      if (currentStep === 'loginCard') {
        showStep('roleCard')
        return
      }
      showStep('welcomeCard')
    }
  </script>
  <!-- FOOTER -->
<footer class="main-footer">
    <p>© 2026 AlUla Pulses</p>
</footer>
</body>
</html>
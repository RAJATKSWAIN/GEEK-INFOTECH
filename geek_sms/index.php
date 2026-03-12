<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GIAMS - Geek Infotech Academic Management System | Home </title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    
<!-- Favicon -->
<link rel="shortcut icon" href="https://geekinfotech.online/images/favicon.png" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">

<style>
body { 
    font-family: 'Plus Jakarta Sans', sans-serif; 
    overflow-y: auto; /* Allows scroll only if window is tiny */
    max-height: 100vh; 
}
.academic-serif { font-family: 'Merriweather', serif; }
.bg-academic { background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); }
.input-focus:focus { box-shadow: 0 0 0 4px rgba(30,58,138,0.08); border-color: #1e3a8a; }
.animate-slide-up { animation: slideUp .5s cubic-bezier(.16,1,.3,1); }
@keyframes slideUp { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
/* Prevent branding wrap */
.brand-text { white-space: nowrap; }
</style>
</head>

<body class="bg-academic min-h-screen flex flex-col text-slate-900">

<nav class="w-full py-5 px-6 md:px-12 flex justify-between items-center bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
  <a href="/" class="flex items-center gap-3 group">
    <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-900/20 group-hover:scale-105 transition-transform">
      <i class="fas fa-university"></i>
    </div>
    <div class="brand-text">
      <span class="academic-serif text-lg font-bold block leading-none">
        <span class="text-blue-600">Geek</span> <span class="text-slate-900">Infotech</span>
      </span>
      <span class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-bold">Academic Management</span>
    </div>
  </a>
  <div class="hidden md:flex items-center gap-4">
    <span class="text-[10px] uppercase tracking-[0.2em] text-blue-600 font-bold">System v1.2.0</span>
    <div class="h-4 w-[1px] bg-slate-200 mx-2"></div>
    <i class="fas fa-shield-check text-emerald-500"></i>
  </div>
</nav>

<main class="flex-grow flex items-center justify-center px-4 py-10">
  <div class="w-full max-w-[480px] animate-slide-up">
    <div class="text-center mb-8">
      <span class="bg-blue-50 text-blue-700 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-100">
        Authorized Personnel Only
      </span>
      <h1 class="academic-serif text-3xl mt-4 text-slate-900">Portal Access</h1>
      <p class="text-slate-500 text-sm mt-2">Manage your academic journey with precision.</p>
    </div>

    <div class="bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 overflow-hidden">
      <div class="p-10">

        <?php
        $err = $_GET['error'] ?? null;
        if($err):
        ?>
        <div class="mb-6 bg-red-50 border border-red-100 p-4 rounded-2xl flex items-start gap-3">
          <i class="fas fa-circle-exclamation text-red-500 mt-0.5"></i>
          <div class="text-xs text-red-700 leading-normal">
            <strong>Authentication Error:</strong><br>
            <?php
            if($err == 'login_failed'){
              echo "The ID or password entered is incorrect.";
            }elseif($err == 'login_required'){
              echo "Session expired. Please re-authenticate.";
            }else{
              echo "Unexpected error occurred.";
            }
            ?>
          </div>
        </div>
        <?php endif; ?>

        <form action="api/auth/login.php" method="POST" class="space-y-6">

          <div>
            <label for="role" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 ml-1 mb-2 block">Access Role</label>
            <select id="role" name="role" required
              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none transition-all input-focus text-sm font-medium appearance-none">
              <option value="">Select Role</option>
              <option value="ADMIN">Administrator</option>
              <option value="STUDENT">Student</option>
              <option value="COUNSELOR">Counselor</option>
              <option value="FACULTY">Faculty</option>
            </select>
          </div>

          <div>
            <label for="username" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 ml-1 mb-2 block">User Identity</label>
            <div class="relative">
              <i class="fas fa-fingerprint absolute left-4 top-1/2 -translate-y-1/2 text-slate-300"></i>
              <input id="username" type="text" name="username" required placeholder="Student / Staff ID"
                class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-4 outline-none transition-all input-focus text-sm font-medium"/>
            </div>
          </div>

          <div>
            <div class="flex justify-between items-center ml-1 mb-2">
              <label for="password" class="text-[11px] font-bold uppercase tracking-widest text-slate-400 block">Security Key</label>
              <a href="#" class="text-[11px] font-bold text-blue-600 hover:text-blue-800 uppercase tracking-tighter transition-colors">Recover Access</a>
            </div>
            <div class="relative">
              <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-300"></i>
              <input id="password" type="password" name="password" required autocomplete="off" placeholder="••••••••"
                class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-12 py-4 outline-none transition-all input-focus text-sm font-medium"/>
              <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 transition-colors">
                <i id="toggleIcon" class="fas fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="flex items-center justify-between py-2">
            <label class="flex items-center gap-2 cursor-pointer group">
              <input type="checkbox" class="w-4 h-4 rounded border-slate-300 text-blue-900 focus:ring-blue-900/20 transition-all">
              <span class="text-xs font-medium text-slate-500 group-hover:text-slate-800 transition-colors">Trust this device</span>
            </label>
          </div>

          <button type="submit"
            class="w-full bg-blue-900 hover:bg-blue-950 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-900/20 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
            <span>Enter Dashboard</span>
            <i class="fas fa-arrow-right-long text-xs opacity-50"></i>
          </button>

          <p class="text-[11px] text-slate-400 mt-4 text-center uppercase tracking-widest font-medium">Secured by AMS v1.2.0</p>
        </form>
      </div>

      <div class="bg-slate-50/50 border-t border-slate-100 p-6 text-center">
        <div class="flex items-center justify-center gap-6 opacity-40">
          <i class="fas fa-shield-check text-xl"></i>
          <i class="fas fa-database text-xl"></i>
          <i class="fas fa-server text-xl"></i>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="py-3 px-8 md:px-12 border-t border-slate-200 bg-white mt-auto">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start gap-8">

    <div class="text-center md:text-left space-y-3">
      <p class="text-[15px] font-bold">
        <span class="text-blue-600">Geek</span> <span class="text-slate-900">Infotech</span> 
        <span class="text-slate-300 font-normal mx-2">|</span> 
        <span class="text-slate-500 font-medium">AMS V1.2.0</span>
      </p>
      
      <p class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-bold leading-relaxed">
        Embrace Your Inner Geek. Empower Your Future.
      </p>

      <p class="text-[11px] text-slate-400 font-medium">
        Developed & Orchestrated by
        <a href="https://trinitywebedge.infinityfree.me/" target="_blank"
           class="text-blue-600 font-bold hover:underline transition-all">
          TrinityWebEdge
        </a>
      </p>
    </div>

    <div class="flex flex-col items-center md:items-end gap-5">
      <div class="flex gap-3">
        <a href="#" class="w-10 h-10 rounded-xl border border-slate-100 bg-slate-50 flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-all shadow-sm">
          <i class="fab fa-linkedin-in text-sm"></i>
        </a>
        <a href="#" class="w-10 h-10 rounded-xl border border-slate-100 bg-slate-50 flex items-center justify-center text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-all shadow-sm">
          <i class="fab fa-github text-sm"></i>
        </a>
        <a href="#" class="w-10 h-10 rounded-xl border border-slate-100 bg-slate-50 flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-all shadow-sm">
          <i class="fas fa-globe text-sm"></i>
        </a>
      </div>
      <p class="text-[10px] text-slate-300 font-bold uppercase tracking-widest">
        &copy; 2026 All Rights Reserved
      </p>
    </div>

  </div>
</footer>

<script>
function togglePassword() {
  const passwordInput = document.getElementById('password');
  const toggleIcon = document.getElementById('toggleIcon');
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
  }
}
</script>

</body>
</html>

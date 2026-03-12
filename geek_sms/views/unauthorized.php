<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied | GIAMS Security</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .academic-serif { font-family: 'Merriweather', serif; }
        .bg-security { background: radial-gradient(circle at center, #fff 0%, #f1f5f9 100%); }
    </style>
</head>
<body class="bg-security min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full text-center">
        <div class="relative inline-block mb-8">
            <div class="w-24 h-24 bg-red-50 rounded-3xl flex items-center justify-center text-red-600 shadow-xl shadow-red-100 animate-pulse">
                <i class="fas fa-shield-slash text-4xl"></i>
            </div>
            <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 rounded-full flex items-center justify-center text-white border-4 border-white">
                <i class="fas fa-exclamation text-xs"></i>
            </div>
        </div>

        <h1 class="academic-serif text-3xl text-slate-900 mb-4">Restricted Area</h1>
        <p class="text-slate-500 mb-8 leading-relaxed">
            Your current account credentials do not have the required permissions to access this module. This attempt has been logged for security audit purposes.
        </p>

        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 mb-8">
            <div class="space-y-4">
                <a href="/geek_sms/index.php" class="block w-full bg-blue-900 text-white font-bold py-4 rounded-2xl hover:bg-blue-950 transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-house-user text-sm"></i>
                    Return to Portal
                </a>
                
                <button onclick="history.back()" class="block w-full bg-slate-50 text-slate-600 font-bold py-4 rounded-2xl border border-slate-200 hover:bg-slate-100 transition-all">
                    Go Back
                </button>
            </div>
        </div>

        <div class="flex flex-col items-center gap-2 opacity-60">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                GIAMS SECURITY ENFORCEMENT v1.2.0
            </p>
            <div class="h-1 w-12 bg-red-200 rounded-full"></div>
        </div>
    </div>

</body>
</html>

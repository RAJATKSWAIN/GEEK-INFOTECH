<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Geek Infotech SMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 glass-effect rounded-2xl shadow-2xl border border-white">
        <div class="text-center mb-8">
            <div class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-database text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Geek Infotech</h1>
            <p class="text-slate-500 text-sm">Student Management Portal</p>
        </div>

        <?php if(isset($_GET['error'])): ?>
            <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700 text-sm rounded">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?php 
                    $err = $_GET['error'];
                    if($err == 'login_failed') echo "Invalid credentials or account inactive.";
                    elseif($err == 'login_required') echo "Please login to access the portal.";
                    else echo "An error occurred. Please try again.";
                ?>
            </div>
        <?php endif; ?>

        <form action="api/auth/login.php" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="username" required 
                        class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        placeholder="Enter your username">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" required 
                        class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-slate-600">
                    <input type="checkbox" class="rounded text-blue-600 mr-2"> Remember me
                </label>
                <a href="#" class="text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg shadow-md hover:shadow-lg transform transition-all active:scale-95">
                Sign In
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-200 text-center">
            <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">
                Military-Grade Precision &copy; 2026
            </p>
        </div>
    </div>

</body>
</html>

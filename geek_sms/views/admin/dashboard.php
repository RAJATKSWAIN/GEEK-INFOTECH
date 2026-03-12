<?php
/**
 * VIEW: Admin Dashboard
 * PURPOSE: Main control panel for Authorized Administrators
 */

error_reporting(E_ALL);   // Report all errors
ini_set('display_errors', 1);  // Show errors in browser


require_once '../../core/config.php';
require_once SYS_ROOT . 'core/session.php';

// 1. SECURITY GATE: Only allow logged-in Admins
Session::protect(['ADMIN']);

// 2. DATA FETCHING: Get users awaiting authorization (Maker-Checker Logic)
$stmt = db()->prepare("SELECT USER_ID, USERNAME, ROLE, CREATED_AT FROM GIAMS_MST_USERS WHERE IS_ACTIVE = 0");
$stmt->execute();
$pendingUsers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-slate-900 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-widest text-blue-400">
                <i class="fas fa-shield-halved mr-2"></i>GIAMS ADMIN
            </h1>
            <div class="flex items-center gap-6">
                <span class="text-sm border-r pr-6 border-slate-700">
                    Welcome, <strong class="text-blue-300"><?= $_SESSION['full_name'] ?></strong>
                </span>
                <a href="<?= url('api/auth/logout.php') ?>" class="text-red-400 hover:text-red-300 transition">
                    <i class="fas fa-power-off"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 px-4">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm uppercase font-bold">Pending Approvals</p>
                <h2 class="text-3xl font-black text-slate-800"><?= count($pendingUsers) ?></h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                <p class="text-gray-500 text-sm uppercase font-bold">System Status</p>
                <h2 class="text-lg font-bold text-green-600">ONLINE (V<?= APP_VERSION ?>)</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-purple-500">
                <p class="text-gray-500 text-sm uppercase font-bold">Server Time</p>
                <h2 class="text-lg font-bold text-slate-800"><?= date('H:i') ?> IST</h2>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <div class="bg-slate-50 p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-700 uppercase text-sm tracking-wider">
                    <i class="fas fa-user-check mr-2 text-blue-500"></i> Authorization Queue
                </h3>
            </div>

            <div class="p-0">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                        <tr>
                            <th class="p-4">Username</th>
                            <th class="p-4">Requested Role</th>
                            <th class="p-4">Request Date</th>
                            <th class="p-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if(empty($pendingUsers)): ?>
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-400 italic">No users currently awaiting authorization.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($pendingUsers as $user): ?>
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 font-medium text-slate-800"><?= $user['USERNAME'] ?></td>
                                <td class="p-4">
                                    <span class="px-3 py-1 bg-slate-200 text-slate-700 rounded-full text-xs font-bold">
                                        <?= $user['ROLE'] ?>
                                    </span>
                                </td>
                                <td class="p-4 text-gray-500 text-sm"><?= date('d-M-Y', strtotime($user['CREATED_AT'])) ?></td>
                                <td class="p-4 text-center">
                                    <a href="<?= url('api/admin/authorize_user.php?id=' . $user['USER_ID']) ?>" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-xs font-bold transition shadow-sm"
                                       onclick="return confirm('Authorize this user for system access?')">
                                       <i class="fas fa-check-circle mr-1"></i> APPROVE
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>

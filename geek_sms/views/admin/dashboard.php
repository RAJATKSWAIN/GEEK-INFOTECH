<?php
/**
 * VIEW: Admin Dashboard (Geek Infotech SMS)
 * PURPOSE: Advanced Management Console
 */
error_reporting(E_ALL);   // Report all errors
ini_set('display_errors', 1);  // Show errors in browser

require_once '../../core/config.php';
require_once SYS_ROOT . 'core/session.php';

// 1. SECURITY GATE
Session::protect(['ADMIN']);

// 2. DATA AGGREGATION (For the Stats Cards)
// Get Pending Users
$pendingStmt = db()->query("SELECT COUNT(*) FROM GIAMS_MST_USERS WHERE IS_ACTIVE = 0");
$pendingCount = $pendingStmt->fetchColumn();

// Get Total Students
$studentStmt = db()->query("SELECT COUNT(*) FROM GIAMS_MST_STUDENTS");
$totalStudents = $studentStmt->fetchColumn();

// Get Active Courses
//$courseStmt = db()->query("SELECT COUNT(*) FROM GIAMS_MST_COURSES WHERE IS_ACTIVE = 1");
//$totalCourses = $courseStmt->fetchColumn();

// Fetch Pending Authorization List
$listStmt = db()->prepare("SELECT USER_ID, USERNAME, ROLE, MAKER_DATE FROM GIAMS_MST_USERS WHERE IS_ACTIVE = 0 LIMIT 5");
$listStmt->execute();
$pendingUsers = $listStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console | Geek Infotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar-link:hover { background: rgba(59, 130, 246, 0.1); border-left: 4px solid #3b82f6; }
        .active-link { background: rgba(59, 130, 246, 0.1); border-left: 4px solid #3b82f6; color: #3b82f6; }
    </style>
</head>
<body class="bg-slate-50 flex">

    <aside class="w-64 min-h-screen bg-white shadow-xl hidden md:block">
        <div class="p-6 border-b">
            <h1 class="text-xl font-black text-slate-800 tracking-tighter italic">GEEK <span class="text-blue-600">INFOTECH</span></h1>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Management System</p>
        </div>
        
        <nav class="mt-6">
            <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase">Main Menu</div>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 active-link">
                <i class="fas fa-home mr-3"></i> Dashboard
            </a>
            <a href="<?= url('views/admin/students.php') ?>" class="flex items-center px-6 py-3 text-gray-600 sidebar-link transition">
                <i class="fas fa-user-graduate mr-3"></i> Students
            </a>
            <a href="<?= url('views/admin/courses.php') ?>" class="flex items-center px-6 py-3 text-gray-600 sidebar-link transition">
                <i class="fas fa-book mr-3"></i> Course Master
            </a>
            
            <div class="px-4 py-6 text-xs font-semibold text-gray-400 uppercase">Finance & Reports</div>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 sidebar-link transition">
                <i class="fas fa-file-invoice-dollar mr-3"></i> Fee Collection
            </a>
            <a href="<?= url('api/reports/export_students.php') ?>" class="flex items-center px-6 py-3 text-gray-600 sidebar-link transition">
                <i class="fas fa-cloud-download-alt mr-3"></i> Download Reports
            </a>
            
            <div class="mt-10 px-6">
                <a href="<?= url('api/auth/logout.php') ?>" class="flex items-center justify-center p-3 bg-red-50 text-red-600 rounded-lg font-bold hover:bg-red-100 transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> LOGOUT
                </a>
            </div>
        </nav>
    </aside>

    <main class="flex-1">
        <header class="bg-white p-4 shadow-sm flex justify-between items-center px-8">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-gray-600"><i class="fas fa-bars"></i></button>
                <h2 class="text-lg font-bold text-slate-700">Administrative Overview</h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800"><?= $_SESSION['full_name'] ?></p>
                    <p class="text-xs text-green-500 font-medium">Administrator Session</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" class="w-10 h-10 rounded-full border">
            </div>
        </header>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase">Total Students</p>
                    <h2 class="text-2xl font-black text-slate-800"><?= $totalStudents ?></h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:shadow-md transition">
                    <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-orange-600 group-hover:text-white transition">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase">Pending Approvals</p>
                    <h2 class="text-2xl font-black text-slate-800"><?= $pendingCount ?></h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group hover:shadow-md transition">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-600 group-hover:text-white transition">
                        <i class="fas fa-laptop-code text-xl"></i>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase">Active Courses</p>
                    <h2 class="text-2xl font-black text-slate-800"><?= $totalCourses ?></h2>
                </div>

                <div class="bg-blue-600 p-6 rounded-2xl shadow-lg text-white hover:bg-blue-700 transition cursor-pointer">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-blue-100 text-xs font-bold uppercase">Quick Action</p>
                            <h2 class="text-lg font-bold mt-1">Enroll New Student</h2>
                        </div>
                        <i class="fas fa-plus-circle text-2xl"></i>
                    </div>
                    <p class="text-blue-200 text-[10px] mt-4 uppercase tracking-tighter font-medium">Click to open admission form</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h3 class="font-black text-slate-800 text-sm uppercase tracking-widest">
                        <i class="fas fa-user-shield mr-2 text-blue-600"></i> Authorization Queue
                    </h3>
                    <button class="text-blue-600 text-xs font-bold hover:underline">View All Requests</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] uppercase font-black">
                                <th class="px-6 py-4">Username</th>
                                <th class="px-6 py-4">Assigned Role</th>
                                <th class="px-6 py-4">Created On</th>
                                <th class="px-6 py-4 text-right">Verification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php if(empty($pendingUsers)): ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic text-sm">No security clearance requests found.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($pendingUsers as $user): ?>
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 font-bold text-slate-700"><?= $user['USERNAME'] ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-[10px] font-black uppercase">
                                            <?= $user['ROLE'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-xs font-medium">
                                        <?= date('d M, Y', strtotime($user['CREATED_AT'])) ?>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="<?= url('api/admin/authorize_user.php?id=' . $user['USER_ID']) ?>" 
                                           class="inline-block bg-slate-900 text-white px-4 py-2 rounded-lg text-[10px] font-black hover:bg-blue-600 transition shadow-sm"
                                           onclick="return confirm('Grant system access to this user?')">
                                            AUTHORIZE ACCESS
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
    </main>
</body>
</html>

<?php
require_once '../../core/config.php';
require_once '../../core/session.php';
require_once '../../core/security.php';

// Military-Grade Protection: Only Admins allowed
Session::protect(['ADMIN']);

$db = db();

// 1. Fetch Summary Stats for "Data Engineering" feel
$totalStaff = $db->query("SELECT COUNT(*) FROM GSMS_MST_STAFF")->fetchColumn();
$pendingAuth = $db->query("SELECT COUNT(*) FROM GSMS_MST_USERS WHERE IS_ACTIVE = 0")->fetchColumn();
$activeStudents = $db->query("SELECT COUNT(*) FROM GSMS_MST_USERS WHERE ROLE = 'STUDENT' AND IS_ACTIVE = 1")->fetchColumn();

// 2. Fetch Pending Authorizations (The Checker's Worklist)
// Logic: Show users where IS_ACTIVE = 0 and MAKER_ID is NOT the current logged-in Admin
$currentAdminStaffId = $_SESSION['staff_id'];
$stmt = $db->prepare("
    SELECT u.USER_ID, u.USERNAME, u.ROLE, u.MAKER_DATE, s.FULL_NAME as MAKER_NAME
    FROM GSMS_MST_USERS u
    JOIN GSMS_MST_STAFF s ON u.MAKER_ID = s.STAFF_ID
    WHERE u.IS_ACTIVE = 0 AND u.MAKER_ID != ?
");
$stmt->execute([$currentAdminStaffId]);
$pendingUsers = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Geek Infotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 flex">

    <aside class="w-64 bg-slate-900 min-h-screen text-white p-6 sticky top-0">
        <div class="mb-10 text-center">
            <h1 class="text-xl font-bold tracking-tighter text-blue-400">GEEK INFOTECH</h1>
            <p class="text-xs text-slate-400">Management Portal v1.0</p>
        </div>
        
        <nav class="space-y-4">
            <a href="#" class="block p-3 rounded bg-blue-600"><i class="fas fa-home mr-3"></i> Dashboard</a>
            <a href="#" class="block p-3 rounded hover:bg-slate-800 transition"><i class="fas fa-users-cog mr-3"></i> Staff Management</a>
            <a href="#" class="block p-3 rounded hover:bg-slate-800 transition"><i class="fas fa-user-graduate mr-3"></i> Student Master</a>
            <a href="#" class="block p-3 rounded hover:bg-slate-800 transition"><i class="fas fa-file-invoice-dollar mr-3"></i> Finance & Fees</a>
            <div class="pt-10">
                <a href="../../api/auth/logout.php" class="block p-3 rounded text-red-400 hover:bg-red-900/20 transition">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </div>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Welcome, <?php echo $_SESSION['full_name']; ?></h2>
                <p class="text-slate-500 text-sm">Role: System Administrator</p>
            </div>
            <div class="text-right">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest">System Online</span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold uppercase">Total Staff</p>
                <h3 class="text-3xl font-bold text-slate-800"><?php echo $totalStaff; ?></h3>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold uppercase text-orange-600">Pending Auth</p>
                <h3 class="text-3xl font-bold text-slate-800"><?php echo $pendingAuth; ?></h3>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                <p class="text-slate-500 text-sm font-semibold uppercase text-blue-600">Active Students</p>
                <h3 class="text-3xl font-bold text-slate-800"><?php echo $activeStudents; ?></h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                <h3 class="font-bold text-slate-700"><i class="fas fa-shield-alt mr-2 text-blue-600"></i> Pending User Authorizations</h3>
                <span class="text-xs text-slate-500">Maker-Checker Compliance Active</span>
            </div>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-slate-400 text-xs uppercase tracking-wider">
                        <th class="p-4 font-semibold">Username</th>
                        <th class="p-4 font-semibold">Requested Role</th>
                        <th class="p-4 font-semibold">Maker (Creator)</th>
                        <th class="p-4 font-semibold">Request Date</th>
                        <th class="p-4 font-semibold text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-sm divide-y divide-slate-100">
                    <?php if(empty($pendingUsers)): ?>
                        <tr><td colspan="5" class="p-10 text-center text-slate-400">No pending authorizations found.</td></tr>
                    <?php endif; ?>

                    <?php foreach($pendingUsers as $user): ?>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 font-medium text-slate-900"><?php echo $user['USERNAME']; ?></td>
                        <td class="p-4"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs font-bold"><?php echo $user['ROLE']; ?></span></td>
                        <td class="p-4"><?php echo $user['MAKER_NAME']; ?></td>
                        <td class="p-4"><?php echo date('d M Y, H:i', strtotime($user['MAKER_DATE'])); ?></td>
                        <td class="p-4 text-center">
                            <button onclick="authorizeUser(<?php echo $user['USER_ID']; ?>)" 
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-xs font-bold shadow-sm transition">
                                <i class="fas fa-check mr-1"></i> Authorize
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function authorizeUser(userId) {
            if(confirm('Confirm authorization for this user?')) {
                // We will build this API next
                window.location.href = "../../api/admin/authorize_user.php?id=" + userId;
            }
        }
    </script>
</body>
</html>

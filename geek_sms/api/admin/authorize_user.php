<?php
/**
 * GEEK-INFOTECH-AMS Authorization API
 * Implements the "Checker" part of Maker-Checker
 * API: Authorize User
 * PURPOSE: Implements Maker-Checker authorization logic for user accounts.
 */

// --- SECTION 1: LOAD CORE ---
require_once __DIR__ . '/../../core/config.php';
require_once SYS_ROOT . 'core/session.php';

// --- SECTION 2: SECURITY GATE ---
// Ensure only logged-in Admins can access this script
Session::protect(['ADMIN']);


// --- SECTION 3: INPUT VALIDATION ---
$targetUserId = $_GET['id'] ?? null;
$currentAdminStaffId = $_SESSION['staff_id']; // The person doing the 'Checking'

if (!$targetUserId) {
    header("Location: " . url('views/admin/dashboard.php?error=invalid_id'));
    exit();
}


// --- SECTION 4: EXECUTE AUTHORIZATION ---
try {
    /**
     * The DB constraint CHK_MAKER_CHECKER_DIFF will trigger 
     * if the person trying to approve (AUTH_ID) is the same person who created (MAKER_ID).
     */
    $sql = "UPDATE GIAMS_MST_USERS 
            SET AUTH_ID = :auth_id, 
                AUTH_DATE = NOW(), 
                IS_ACTIVE = 1 
            WHERE USER_ID = :user_id";
    
    $stmt = db()->prepare($sql);
    $stmt->execute([
        ':auth_id' => $currentAdminStaffId,
        ':user_id' => $targetUserId
    ]);

    // Redirect on Success
    header("Location: " . url('views/admin/dashboard.php?msg=authorized'));
    exit();

} catch (PDOException $e) {
    /**
     * SECTION 5: ERROR HANDLING
     * Catching the specific Check Constraint violation (Self-Authorization)
     */
    if ($e->getCode() == 'HY000' || strpos($e->getMessage(), 'CHK_MAKER_CHECKER_DIFF') !== false) {
        header("Location: " . url('views/admin/dashboard.php?error=self_auth_violation'));
    } else {
        error_log("Authorization API Error: " . $e->getMessage());
        header("Location: " . url('views/admin/dashboard.php?error=db_error'));
    }
    exit();
}

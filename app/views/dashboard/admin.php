<?php
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /school_management/public/index.php/login");
    exit;
}
?>

<h1>Admin Dashboard</h1>
<p>Welcome
    <?= $_SESSION['user_name'] ?>
</p>
<a href="/school_management/public/index.php/logout">Logout</a>
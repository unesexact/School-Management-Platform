<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /school_management/public/index.php/login");
    exit;
}
?>

<h1>Welcome
    <?= $_SESSION['user_name'] ?>
</h1>
<p>Your role:
    <?= $_SESSION['role'] ?>
</p>

<a href="/school_management/public/index.php/logout">Logout</a>
<?php
// Protected page for teacher
require_once __DIR__ . '/../../core/Auth.php';
Auth::teacher();
?>

<h1>My Timetable</h1>
<p>Welcome,
    <?= htmlspecialchars($_SESSION['user']['name']) ?>!
</p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Subject</th>
        <th>Day</th>
        <th>Start Time</th>
        <th>End Time</th>
    </tr>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $slot): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($slot['subject']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($slot['day']) ?>
                </td>
                <td>
                    <?= htmlspecialchars(substr($slot['start_time'], 0, 5)) ?>
                </td>
                <td>
                    <?= htmlspecialchars(substr($slot['end_time'], 0, 5)) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No timetable assigned yet.</td>
        </tr>
    <?php endif; ?>
</table>

<a href="/school_management/public/dashboard/teacher">Back to Dashboard</a>
<?php
require_once __DIR__ . '/../../core/Auth.php';
Auth::teacher();
?>

<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-2 text-center">My Timetable</h2>
            <p class="text-center text-muted">
                Welcome,
                <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋
            </p>

            <?php if (!empty($data)): ?>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Day</th>
                                <th>Start</th>
                                <th>End</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $slot): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($slot['subject']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($slot['day']) ?>
                                    </td>
                                    <td>
                                        <?= substr($slot['start_time'], 0, 5) ?>
                                    </td>
                                        <td>
                                            <?= substr($slot['end_time'], 0, 5) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                    </table>
                    </div>

            <?php else: ?>
                    <div class="alert alert-info text-center">No timetable assigned yet.</div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="/school_management/public/dashboard/teacher" class="btn btn-secondary">
                    ⬅ Back to Dashboard
                </a>
            </div>

        </div>
    </div>

</div>
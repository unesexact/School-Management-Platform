<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-4 text-center">My Timetable</h2>

            <?php if (!empty($data)): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($row['subject']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($row['teacher']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($row['day']) ?>
                                    </td>
                                    <td>
                                        <?= substr($row['start_time'], 0, 5) ?> -
                                        <?= substr($row['end_time'], 0, 5) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-info text-center">No timetable available yet.</div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="/school_management/public/dashboard/student" class="btn btn-secondary">⬅ Back to Dashboard</a>
            </div>

        </div>
    </div>

</div>
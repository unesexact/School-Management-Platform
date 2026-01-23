<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Timetable</h2>
                <div>
                    <a href="/school_management/public/dashboard/admin" class="btn btn-secondary me-2">
                        ⬅ Back to Dashboard
                    </a>
                    <a href="/school_management/public/timetable/create" class="btn btn-success">
                        ➕ Add Slot
                    </a>
                </div>
            </div>

            <?php if (isset($timetables) && count($timetables) > 0): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($timetables as $t): ?>
                                <tr>
                                    <td><?= htmlspecialchars($t['subject']) ?></td>
                                    <td><?= htmlspecialchars($t['teacher']) ?></td>
                                    <td><?= htmlspecialchars($t['day']) ?></td>
                                    <td>
                                        <?= substr($t['start_time'], 0, 5) ?> -
                                        <?= substr($t['end_time'], 0, 5) ?>
                                    </td>
                                    <td>
                                        <a href="/school_management/public/timetable/delete?id=<?= $t['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this slot?');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>

                <div class="alert alert-warning text-center">
                    No timetable slots found.
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>
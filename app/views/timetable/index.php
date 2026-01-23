<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Timetable</h2>
                <a href="/school_management/public/timetable/create" class="btn btn-success">
                    ➕ Add Slot
                </a>
            </div>

            <?php if (!empty($timetables)): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($timetables as $t): ?>
                                <tr>
                                    <td><?= htmlspecialchars($t['subject']) ?></td>
                                    <td><?= htmlspecialchars($t['teacher']) ?></td>
                                    <td><?= htmlspecialchars($t['day']) ?></td>
                                    <td><?= substr($t['start_time'], 0, 5) ?> - <?= substr($t['end_time'], 0, 5) ?></td>
                                    <td>
                                        <a href="/school_management/public/timetable/delete?id=<?= $t['id'] ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Delete this slot?')">
                                            ❌ Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-warning">No timetable slots found.</div>
            <?php endif; ?>

        </div>
    </div>

</div>
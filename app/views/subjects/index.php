<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Subjects</h2>
                <div>
                    <a href="/school_management/public/dashboard/admin" class="btn btn-secondary me-2">
                        ⬅ Back to Dashboard
                    </a>
                    <a href="/school_management/public/subjects/create" class="btn btn-success">
                        + Add Subject
                    </a>
                </div>
            </div>

            <?php if (!empty($subjects)): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $s): ?>
                                <tr>
                                    <td><?= htmlspecialchars($s['name']) ?></td>
                                    <td>
                                        <a href="/school_management/public/subjects/delete?id=<?= $s['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this subject?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-warning">No subjects found.</div>
            <?php endif; ?>

        </div>
    </div>

</div>
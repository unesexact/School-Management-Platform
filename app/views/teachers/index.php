<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Teachers</h2>
                <a href="/school_management/public/teachers/create" class="btn btn-success">
                    + Add Teacher
                </a>
            </div>

            <?php if (!empty($teachers)): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teachers as $t): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($t['name']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($t['email']) ?>
                                    </td>
                                    <td>
                                        <a href="/school_management/public/teachers/delete?id=<?= $t['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this teacher?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <div class="alert alert-warning">No teachers found.</div>
            <?php endif; ?>

        </div>
    </div>

</div>
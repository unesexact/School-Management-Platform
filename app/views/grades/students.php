<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-4">Students Grades</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Grade /20</th>
                            <th>Save</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($students as $s): ?>
                            <tr>
                                <form method="POST" action="/school_management/public/grades/save">

                                    <td><?= htmlspecialchars($s['name']) ?></td>

                                    <td>
                                        <input type="number" name="grade" step="0.1" min="0" max="20"
                                            value="<?= $s['grade'] ?>" class="form-control text-center" required>
                                    </td>

                                    <input type="hidden" name="student_id" value="<?= $s['id'] ?>">
                                    <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>">

                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Save
                                        </button>
                                    </td>

                                </form>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
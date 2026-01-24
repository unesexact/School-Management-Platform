<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">
                    <?php if (!empty($_SESSION['error'])): ?>
                        <div class="alert alert-danger text-center">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>


                    <h2 class="mb-4 text-center">Add Timetable Slot</h2>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Course</label>
                            <select name="course_id" class="form-select" required>
                                <?php foreach ($courses as $c): ?>
                                    <option value="<?= $c['id'] ?>">
                                        <?= $c['subject'] ?> - <?= $c['teacher'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Day</label>
                            <select name="day" class="form-select">
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Saturday</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">End Time</label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save Slot</button>
                            <a href="/school_management/public/timetable" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
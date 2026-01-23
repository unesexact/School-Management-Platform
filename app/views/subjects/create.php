<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h2 class="mb-4 text-center">Add Subject</h2>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Subject Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter subject name"
                                required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Add Subject</button>
                            <a href="/school_management/public/subjects" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
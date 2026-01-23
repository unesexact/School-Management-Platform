<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f5f6fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 350px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <h3 class="text-center mb-4">School Management Login</h3>

        <form method="POST" action="/school_management/public/index.php/login">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>

    </div>

</body>

</html>
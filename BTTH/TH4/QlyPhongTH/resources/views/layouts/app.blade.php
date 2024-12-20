<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task List App</title>
    <!-- Sử dụng Bootstrap 5 từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Link đến trang danh sách vấn đề -->
            <a class="navbar-brand" href="{{ route('issues.index') }}">Task List App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Liên kết đến danh sách vấn đề -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('issues.index') }}">Danh sách
                            Task</a>
                    </li>
                    <!-- Liên kết đến trang thêm vấn đề mới -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('issues.create') }}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung của từng trang con sẽ được hiển thị ở đây -->
    <div class="container mt-4">
        @yield('content') <!-- Phần nội dung thay đổi ở các trang con -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

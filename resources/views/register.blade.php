<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>

    <form action="{{ route('user.store') }}" class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Registration Form</h1>
        @csrf
        <div class="row g-3">
            <div class="col-6">
                <label class="form-label">NISN</label>
                <input type="text" class="form-control" name="nisn" placeholder="Enter NISN" required>
            </div>

            <div class="col-6">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" placeholder="Enter NIS" required>
            </div>

            <div class="col-12">
                <label class="form-label">Nama</label>
                <input class="form-control" name="nama" placeholder="Enter nama">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="you@example.com">
            </div>

            <div class="col-12">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">No.Telp</label>
                <input type="text" class="form-control" name="no_telp" placeholder="088888888">
            </div>

            <div class="col-12">
                <label>Alamat</label>
                <textarea rows="5" class="form-control" placeholder="Enter alamat" name="alamat"></textarea>
            </div>
        </div>
        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Register</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
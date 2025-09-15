<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Data Sekolah</title>
  <link rel="stylesheet" href="/data_sekolah_firstha/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Delius&family=Moirai+One&display=swap" rel="stylesheet">
  <style>
    body {
      background: #F5F9F6;
      font-family: sans-serif;
      padding-top: 70px;
    }
    .navbar {
      background: #6B8F6B;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
    .navbar a {
      color: #fff !important;
      font-weight: 500;
    }
    .navbar a:hover {
      color: #e2e2e2 !important;
    }
    .btn-secondary {
      background: #4F6D4F;
      color: #fff;
      border: none;
    }
    .btn-secondary:hover {
      background: #3e5b3e;
    }
    .btn-danger {
      background: #C94C4C;
      color: #fff;
      border: none;
    }
    .btn-danger:hover {
      background: #B03B3B;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4 shadow-sm pb-2">
  <a class="navbar-brand" href="/data_sekolah_firstha/"><i class="bi bi-house "></i> Home </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav me-auto ">
      <li class="nav-item"><a class="nav-link" href="/data_sekolah_firstha/kelas/"><i class="bi bi-journal-text"></i> Kelas</a></li>
      <li class="nav-item"><a class="nav-link" href="/data_sekolah_firstha/guru/"><i class="bi bi-person-badge"></i> Guru</a></li>
      <li class="nav-item"><a class="nav-link" href="/data_sekolah_firstha/siswa/"><i class="bi bi-people-fill"></i> Siswa</a></li>
    </ul>
    <div class="d-flex align-items-center">
      <a href="/data_sekolah_firstha/auth/logout.php" class="btn btn-sm btn-danger ">Logout</a>
    </div>
  </div>
</nav>


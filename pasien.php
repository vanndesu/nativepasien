<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyApp | Halaman Utama</title>
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">MyApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Pasien</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row mt-3">
      <div class="col">
        <h3>Tabel Pasien</h3>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <table class="table table-striped table-hover table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Pasien</th>
              <th>Nama Pasien</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $hasil = $koneksi->query("SELECT * FROM pasien");
            while ($row = $hasil->fetch_assoc()) {
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['idPasien']; ?></td>
              <td><?= $row['nmPasien']; ?></td>
              <td><?= $row['jk']; ?></td>
              <td><?= $row['alamat']; ?></td>
              <td>
                <a href="editpasien.php?edit=<?= $row['idPasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <!-- Tombol Hapus -->
                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $row['idPasien']; ?>">Hapus</a>

                <!-- Modal Hapus -->
                <div class="modal fade" id="hapusModal<?= $row['idPasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="koneksi.php?idPasien=<?= $row['idPasien']; ?>" class="btn btn-danger">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

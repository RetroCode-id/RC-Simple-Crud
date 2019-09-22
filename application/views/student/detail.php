<div class="container mt-5 text-capitalize">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3><?= $student['nama']; ?></h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            Kelas: <?= $student['kelas']; ?>
          </li>
          <li class="list-group-item">
            Jurusan: <?= $student['jurusan']; ?>
          </li>
        </ul>
        <a href="<?= base_url('student'); ?>" class="btn btn-secondary btn-block">Return To Page Students</a>
      </div>
    </div>
  </div>
</div>
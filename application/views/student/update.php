<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>Update Page</h3>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?= $student['id']; ?>">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $student['nama']; ?>">
              <small class="text-danger"><?php echo form_error('nama'); ?></small>
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $student['kelas']; ?>">
              <small class="text-danger"><?php echo form_error('kelas'); ?></small>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan">
                <?php foreach ($jurusan as $j) : ?>
                  <?php if ($j == $student['jurusan']) : ?>
                    <option selected><?= $j; ?></option>
                  <?php else : ?>
                    <option><?= $j; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="submit">Update Data Student</button>
            <a href="<?= base_url('student'); ?>" class="btn btn-secondary btn-block">Return To Page Students</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
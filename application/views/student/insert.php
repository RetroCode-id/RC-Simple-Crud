<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/fire-bg.png'); ?>" class="card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3>Insert Page</h3>
              <form action="" method="post">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                  <small class="text-danger"><?php echo form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <input type="text" class="form-control" id="kelas" name="kelas" value="<?= set_value('kelas'); ?>">
                  <small class="text-danger"><?php echo form_error('kelas'); ?></small>
                </div>
                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select class="form-control" id="jurusan" name="jurusan">
                    <option>-Pilih Jurusan Anda-</option>
                    <?php foreach ($jurusan as $j) : ?>
                      <option><?= $j; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Insert Data Student</button>
                <a href="<?= base_url('student'); ?>" class="btn btn-secondary btn-block">Return To Page Students</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
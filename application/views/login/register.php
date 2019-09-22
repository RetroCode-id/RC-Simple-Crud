<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center">Register Page</h3>
          <form action="" method="post">
            <div class="form-group">
              <label for="nama_user">Nama User</label>
              <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= set_value('nama_user'); ?>">
              <small class="text-danger"><?php echo form_error('nama_user'); ?></small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
              <small class="text-danger"><?php echo form_error('password'); ?></small>
            </div>
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>">
              <small class="text-danger"><?php echo form_error('nama_lengkap'); ?></small>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="submit">Registrasi</button>
            <a href="<?= base_url(); ?>" class="btn btn-danger btn-block">Return To Login Page</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
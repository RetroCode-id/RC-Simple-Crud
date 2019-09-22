<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center">Login Page</h3>

          <?= $this->session->flashdata('flash'); ?>

          <form action="<?= base_url('login') ?>" method="post">
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
            <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
            <a href="<?= base_url('login/register'); ?>" class="btn btn-danger btn-block">Registrasi</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
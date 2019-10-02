<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>Students List</h3>
          <div class="alert alert-info text-capitalize text-center" role="alert">
            Selamat Datang <strong><?= $user['nama_lengkap']; ?></strong>
          </div>

          <form action="<?= base_url('student') ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search By Name..." name="keyword">
              <div class="input-group-append">
                <input class="btn btn-secondary" type="submit" name="submit" value="Search">
              </div>
            </div>
          </form>

          <div class="row mb-2">
            <div class="col">
              <a href="<?= base_url('student/insert'); ?>" class="btn btn-primary btn-block">Insert Student</a>
            </div>
            <div class="col">
              <a href="<?= base_url('student/logout'); ?>" class="btn btn-danger btn-block">Logout</a>
            </div>
          </div>

          <?php if (!$students) : ?>
            <div class="alert alert-danger text-center" role="alert">
              <strong>Not Found</strong> Data!
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('flash'); ?>
          <ul class="list-group mb-2">
            <?php foreach ($students as $student) : ?>
              <li class="list-group-item">
                <?= $student['nama']; ?>
                <a href="<?= base_url('student/detail/') . $student['id']; ?>" class="badge badge-info float-right">Detail</a>
                <a href="<?= base_url('student/update/') . $student['id']; ?> ?>" class="badge badge-success float-right mr-2">Update</a>
                <a href="<?= base_url('student/delete/') . $student['id']; ?> ?>" class="badge badge-danger float-right mr-2" onclick="return confirm('Are You Sure To Delete This Student Data?')">Delete</a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
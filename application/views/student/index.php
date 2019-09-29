<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>Students List</h3>
          <div class="alert alert-info text-capitalize text-center" role="alert">
            Selamat Datang <strong><?= $user['nama_lengkap']; ?></strong>
          </div>
          <div class="row mb-2">
            <div class="col">
              <a href="<?= base_url('student/insert'); ?>" class="btn btn-primary btn-block">Insert Student</a>
            </div>
            <div class="col">
              <a href="<?= base_url('student/logout'); ?>" class="btn btn-danger btn-block">Logout</a>
            </div>
          </div>

          <?= $this->session->flashdata('flash'); ?>
          <ul class="list-group mb-2">
            <?php foreach ($students as $student) : ?>
              <li class="list-group-item">
                <?= $student['nama']; ?>
                <a href="<?= base_url(); ?>student/detail/<?= $student['id']; ?>" class="badge badge-info float-right">Detail</a>
                <a href="<?= base_url(); ?>student/update/<?= $student['id']; ?>" class="badge badge-success float-right mr-2">Update</a>
                <a href="<?= base_url(); ?>student/delete/<?= $student['id']; ?>" class="badge badge-danger float-right mr-2" onclick="return confirm('Are You Sure To Delete This Student Data?')">Delete</a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
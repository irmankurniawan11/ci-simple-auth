<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="card-title">Register</h2>
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="p-4 bg-red-100 rounded-xl ring-2 ring-red-500">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <p>- <?= $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <form action="<?= site_url('register') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input type="text" placeholder="Nama" name="name" class="input input-bordered rounded-full px-6" value="<?= old('name') ?>" required/>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" placeholder="Email" name="email" class="input input-bordered rounded-full px-6" value="<?= old('email') ?>" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="password" class="input input-bordered rounded-full px-6" value="<?= old('password') ?>" required?>
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Pick a photo profile</span>
                    </label>
                    <input type="file" name="profile_picture" class="file-input file-input-bordered w-full max-w-xs" />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary rounded-full">Daftar</button>
                </div>
            </form>
            <p class="text-center text-sm">Sudah memiliki akun? <a href="<?= base_url() . "login" ?>" class="link link-hover">Masuk disini</a>.</p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
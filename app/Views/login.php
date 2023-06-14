<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="card-title">Login</h2>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="p-4 bg-red-100 rounded-xl ring-2 ring-red-500">
                <p><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="p-4 bg-red-100 rounded-xl ring-2 ring-red-500">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <p>- <?= $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="p-4 bg-green-100 rounded-xl ring-2 ring-green-500">
                    <p><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif ?>
            <form action="<?= site_url('login') ?>" method="post">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" name="email" class="input input-bordered rounded-full px-6" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="password" class="input input-bordered rounded-full px-6" />
                    <label class="label">
                        <a href="<?= base_url() . "forgot-password" ?>" class="label-text-alt link link-hover">Forgot password?</a>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary rounded-full">Login</button>
                </div>
            </form>
            <p class="text-center text-sm">Belum memiliki akun? <a href="<?= base_url() . "register" ?>" class="link link-hover">Daftar disini</a>.</p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
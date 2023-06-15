<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="card-title">Reset Password</h2>
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
            <form action="<?= site_url('reset-password') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="token" value="<?= $token; ?>"/>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">New Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="password" class="input input-bordered rounded-full px-6" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="confirm_password" class="input input-bordered rounded-full px-6" />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary rounded-full">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
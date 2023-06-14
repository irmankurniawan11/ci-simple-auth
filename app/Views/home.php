<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(!session()->get('email')) : ?>
    <h1>You are not logged in.</h1>
    <a href="/login" class="btn btn-primary">Login here</h1>
    <?php return redirect()->to('/login'); ?>
<?php endif ?>

<section class="container max-w-[720px] mx-auto">
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="font-bold text-4xl mb-4">Hello, <?= session()->get('name'); ?>!</h1>
            <div class="flex gap-6">
                <img src="<?= base_url('uploads/' . session()->get('profile_picture')) ?>" class="w-48 h-48 rounded-lg flex-none" />
                <div>
                    <div class="mb-2">
                        <h1 class="font-bold text-lg">Name</h1>
                        <p><?= session()->get('name') ?></p>
                    </div>
                    <div class="mb-2">
                        <h1 class="font-bold text-lg">Email</h1>
                        <p><?= session()->get('email') ?></p>
                    </div>
                    <div class="mb-2">
                        <h1 class="font-bold text-lg">Password</h1>
                        <a class="btn btn-disabled" href="/change-password">Change Password</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
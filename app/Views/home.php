<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="container max-w-[720px] mx-auto">
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="p-4 bg-green-100 rounded-xl ring-2 ring-green-500">
                    <p><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="p-4 bg-red-100 rounded-xl ring-2 ring-red-500">
                <p><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif ?>
            <h1 class="font-bold text-4xl mb-4">Hello, <?= session()->get('name'); ?>!</h1>
            <div class="flex gap-6">
                <div class="flex flex-col gap-4 p-4 shadow-md rounded-lg">
                    <?php $imgsrc=(session()->has('profile_picture')
                        ?base_url('uploads/' . session()->get('profile_picture'))
                        :"https://placehold.co/100x100/lightblue/white?text=".substr(session()->get('name'),0,1)); ?>
                    <img src="<?= $imgsrc; ?>" class="w-48 h-48 rounded-lg flex-none" />
                    <div class="flex flex-col justify-center gap-2">
                        <form class="flex" action="<?= base_url() . "delete-photo/" . session('user_id') ?>" method="post">
                            <?= csrf_field(); ?>
                            <button class="flex-1 inline-flex gap-2 justify-center items-center bg-white font-bold text-slate-700 hover:text-slate-500 py-2 px-2 rounded-md border border-slate-200 shadow-md">
                                <ion-icon name="trash"></ion-icon> Hapus
                            </button>
                        </form>
                        <a class="inline-flex gap-2 justify-center items-center bg-white font-bold text-slate-400 py-2 px-2 rounded-md border border-slate-200 shadow-sm">
                            <ion-icon name="cloud-upload"></ion-icon> Ganti Foto
                        </a>
                    </div>
                </div>
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
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <h2 class="card-title">Forgot Password</h2>
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
            <?php if (session()->getFlashdata('emailsuccess')) : ?>
            <script>window.onload = function() {document.querySelector("#my_modal_1").showModal()}</script>
            <dialog id="my_modal_1" class="modal">
                <form method="dialog" class="modal-box w-11/12 max-w-5xl">
                    <h3 class="font-bold text-lg">Fake Email</h3>
                    <p class="py-4"><a class="text-primary link-hover" href="<?= session()->getFlashdata('emailsuccess'); ?>">Click Here</a> to reset your password.</p>
                    <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <!-- <button class="btn">Close</button> -->
                    </div>
                </form>
            </dialog>
            <?php endif ?>
            <form action="<?= site_url('forgot-password') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" name="email" class="input input-bordered rounded-full px-6" />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary rounded-full">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
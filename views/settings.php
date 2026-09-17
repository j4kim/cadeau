<?php $this->layout('layout'); ?>

<?php $base = J4kim\Cadeau\Config::base(); ?>

<form
    class="flex flex-col gap-8"
    method="POST"
    action="settings"
    enctype="multipart/form-data">

    <div class="mt-8">
        <p class="mb-2">Question</p>
        <input
            class="border border-slate-300 rounded-sm bg-slate-100 w-full px-4 py-2"
            name="question"
            value="<?= J4kim\Cadeau\Config::question() ?>">
    </div>

    <div>
        <p class="mb-2">Passphrase</p>
        <input
            class="border border-slate-300 rounded-sm bg-slate-100 w-full px-4 py-2"
            name="passphrase">
    </div>

    <div>
        <p class="mb-2">Photo</p>
        <input
            type="file"
            class="border border-slate-300 rounded-sm bg-slate-100 w-full px-4 py-2"
            id="photo"
            name="photo"
            accept="image/*">
    </div>

    <p>
        <button
            class="border border-slate-300 rounded-sm bg-slate-500 text-white hover:bg-slate-600 w-full px-4 py-2"
            type="submit">
            Sauver
        </button>
    </p>
</form>
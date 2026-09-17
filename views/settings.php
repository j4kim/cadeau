<?php $this->layout('layout'); ?>

<?php $base = J4kim\Cadeau\Config::base(); ?>

<form
    class="flex flex-col gap-8"
    method="POST"
    action="settings">

    <p>
        <button
            class="border border-slate-300 rounded-sm bg-slate-500 text-white hover:bg-slate-600 w-full px-4 py-2"
            type="submit">
            Sauver
        </button>
    </p>
</form>
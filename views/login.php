<?php $this->layout('layout'); ?>

<form
    class="flex flex-col gap-4 mt-16 p-4 mx-auto max-w-xl"
    method="POST"
    action="login">
    <h1 class="text-xl font-semibold">Question de sécurité</h1>
    <p>
        <?= J4kim\Cadeau\Config::question() ?>
    </p>
    <p>
        <input
            class="border border-slate-300 rounded-sm bg-slate-100 w-full px-4 py-2"
            name="passphrase"
            type="password"
            placeholder="réponse"
            required>
    </p>
    <p>
        <button
            class="border border-slate-300 rounded-sm bg-slate-500 text-white hover:bg-slate-600 w-full px-4 py-2"
            type="submit">
            Connexion
        </button>
    </p>
    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif ?>
</form>
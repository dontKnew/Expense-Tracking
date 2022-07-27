<?= $this->extend('app') ?>
<?= $this->section("main-body"); ?>
<div class="row" style="height:50vh; margin:50px;">
    <div class=" text-center">
        <h1>404</h1>
        <h4>Page not found</h4>
        <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
        <a href="/" class="btn btn-danger">Back To Home</a>
    </div>
</div>
<?= $this->endSection(); ?>
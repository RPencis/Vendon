<?php
// Start output buffering
ob_start();

// Your page-specific content
?>
<section class="mt-4">
    <div class="row">
        <div class="col text-center">
            <h2>Paldies <?php echo $user->getName() ?></h2>
        </div>
    </div>
</section>

<section class="mt-4">
    <div class="row">
        <div class="col text-center">
            <h3>Tu abildēji pareizi uz <?php echo $result['right'] ?> no <?php echo $result['total'] ?> jautājumiem.</h3>
        </div>
    </div>
</section>


<?php
// End output buffering and capture the content
$content = ob_get_clean();

// Include the layout
include('layout.php');

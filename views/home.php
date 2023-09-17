<?php
// Start output buffering
ob_start();

// Your page-specific content
?>
<section class="mt-4">
    <div class="row">
        <div class="col text-center">
            <h2>Testa uzdevums</h2>
        </div>
    </div>
</section>
<section class="mt-4">
    <div class="row">
        <div class="col">
            <form action="/new-test" method="POST">
                <div class="mb-3">
                    <input name="userName" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Ievadi savu vārdu">
                </div>
                <div class="mb-3">
                    <select name="selected_test" class="form-select" aria-label="Izvēlies testu">
                        <option selected>Izvēlies testu</option>
                        <?php foreach ($testList as $test) : ?>
                            <option value="<?php echo $test->getId() ?>"><?php echo $test->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Sākt</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
// End output buffering and capture the content
$content = ob_get_clean();

// Include the layout
include('layout.php');

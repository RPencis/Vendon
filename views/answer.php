<?php
// Start output buffering
ob_start();

// Your page-specific content
?>

<section class="mt-4">
    <div class="row">
        <div class="col text-center">
            <h2><?php echo $test->getName() ?></h2>
        </div>
    </div>
</section>
<form action="/post-answer" method="POST">
    <?php foreach ($questions = $test->getQuestions() as $index => $question) : ?>
        <?php $step = 100 / count($questions); ?>
        <section class="mt-4">
            <div class="row">
                <div class="col text-center">
                    <h2><?php echo $question->getQuestion() ?></h2>
                </div>
            </div>
        </section>
        <section class="mt-4">
            <div class="row">
                <div class="col">
                    <div class="row mb-4">
                        <?php foreach ($answers = $question->getAnswers() as $answer) : ?>
                            <div class="col">
                                <?php echo $answer->getText() ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Nākamais</button>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $step * ($index + 1) ?>%" aria-valuenow="<?php echo $i ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </section>
    <?php endforeach; ?>
</form>

<?php
// End output buffering and capture the content
$content = ob_get_clean();

// Include the layout
include('layout.php');

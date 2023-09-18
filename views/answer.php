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
<form action="/save-answers/<?php echo $test->getId() ?>" method="POST">
    <?php foreach ($questions = $test->getQuestions() as $index => $question) : ?>
        <?php $step = 100 / count($questions); ?>
        <div class="question-block">
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
                                    <div class="answer-block" data-question-id="<?php echo $question->getId(); ?>" data-answer-id="<?php echo $answer->getId() ?>"><?php echo $answer->getText() ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mb-3 text-center">
                            <?php if (array_key_last($questions) == $index) : ?>
                                <input type="hidden" name="answers" id="answers-json" value="">
                                <button type="submit" class="btn btn-primary finish-test">Pabeigt</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-primary next-question">Nākamais</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $step * ($index + 1) ?>%" aria-valuenow="<?php echo $i ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </section>
        </div>
    <?php endforeach; ?>
</form>

<script>
    $(document).ready(function() {
        var currentQuestion = 0; // Index of the current question section
        var answers = [];

        // Hide all question sections except the first one
        // $('.question-block').hide();
        $('.question-block:first').show();

        // Function to show the next question
        function showNextQuestion() {
            // Hide the current question
            $('.question-block:eq(' + currentQuestion + ')').hide();

            // Move to the next question
            currentQuestion++;

            // If all questions are answered, you can handle the submission or any other action here
            if (currentQuestion === $('.question-block').length) {
                // Perform any action for when all questions are answered
                alert('All questions answered. Handle submission here.');
                return;
            }

            // Show the next question
            $('.question-block:eq(' + currentQuestion + ')').show();
        }

        // Event listener for the "Next" button
        $('.next-question').click(function() {
            showNextQuestion();
        });

        function addAnswer(questionId, answerId) {
            // Check if an object with the same 'question' property exists
            var index = -1;
            for (var i = 0; i < answers.length; i++) {
                if (answers[i].question === questionId) {
                    index = i;
                    break;
                }
            }

            // If an object with the same 'question' property exists, replace it
            if (index !== -1) {
                answers[index].answer = answerId;
            } else {
                // Otherwise, push a new object into the array
                answers.push({
                    question: questionId,
                    answer: answerId
                });
            }
        }

        $('.answer-block').click(function() {
            $('.answer-block').removeClass('selected');
            $(this).addClass('selected');
            var questionId = $(this).attr('data-question-id');
            var answerId = $(this).attr('data-answer-id');

            addAnswer(questionId, answerId);

            $('#answers-json').val(JSON.stringify(answers));
            
        });

        // $('.finish-test').click(function() {
        //     $.post("/save-answers/<?php //echo $test->getId() ?>", {
        //             answers: answers
        //         },
        //         function(response) {
        //             console.log(response);
        //         }
        //     );
        // });
    });
</script>


<?php
// End output buffering and capture the content
$content = ob_get_clean();

// Include the layout
include('layout.php');

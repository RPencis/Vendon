<?php

namespace App\Controllers;

use App\Models\Test;
use App\Models\User;
use App\Models\UserAnswer;
use Symfony\Component\Routing\RouteCollection;

class AnswerController extends BaseController
{
    public function showAction(int $testId, RouteCollection $routes)
    {
        $testModel  = new Test();
        $test = $testModel->find($testId);

        require_once APP_ROOT . '/views/answer.php';
    }
    public function answerAction(int $testId, RouteCollection $routes)
    {
        $testModel  = new Test();
        $test = $testModel->find($testId);
        $userId = $_SESSION["userId"];
        $postData = $_POST;
        $model = new UserAnswer();
        $existingAnswers = $model->getAllForUser($testId, $userId);

        if (count($existingAnswers) === 0) {
            $answersJson = $postData['answers'];
            $answers = json_decode($answersJson);
            foreach ($answers as $answer) {

                $model->insert([
                    'user_id' => $userId,
                    'test_id' => $test->getId(),
                    'question_id' => $answer->question,
                    'answer_id' => $answer->answer,
                ]);
            }
        }

        $this->Redirect("/result/" . $test->getId());
    }

    public function resultAction(int $testId, RouteCollection $routes)
    {
        $testModel  = new Test();
        $test = $testModel->find($testId);
        $userId = $userId = $_SESSION["userId"];
        $model = new UserAnswer();
        $userModel = new User();

        $user = $userModel->find($userId);
        $result = $model->getResult($test->getId(), $userId);
        require_once APP_ROOT . '/views/result.php';
    }
}

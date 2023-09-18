<?php

namespace App\Models;

class UserAnswer extends Model
{
    protected $id;
    protected $user_id;
    protected $test_id;
    protected $question_id;
    protected $answer_id;

    public function __construct()
    {

        /**
         * The database table name.
         */
        parent::__construct("useranswers");
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of test_id
     */
    public function getTest_id()
    {
        return $this->test_id;
    }

    /**
     * Set the value of test_id
     *
     * @return  self
     */
    public function setTest_id($test_id)
    {
        $this->test_id = $test_id;

        return $this;
    }

    /**
     * Get the value of question_id
     */
    public function getQuestion_id()
    {
        return $this->question_id;
    }

    /**
     * Set the value of question_id
     *
     * @return  self
     */
    public function setQuestion_id($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * Get the value of answer_id
     */
    public function getAnswer_id()
    {
        return $this->answer_id;
    }

    /**
     * Set the value of answer_id
     *
     * @return  self
     */
    public function setAnswer_id($answer_id)
    {
        $this->answer_id = $answer_id;

        return $this;
    }
    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAllForUser($testId, $userId)
    {
        $dataArray = $this->DB()
            ->query(sprintf('SELECT * FROM useranswers where test_id = %d and user_id = %d', $testId, $userId))
            ->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dataArray as $data) {
            $model = $this->dbToModel($data, new UserAnswer());

            $result[] = $model;
        }

        return $result;
    }

    public function getResult($testId, $userId)
    {
        $dataArr = $this->DB()
            ->query(sprintf('SELECT CASE WHEN correct = 0 THEN "wrong" ELSE "right" END AS result,count(*) count FROM useranswers ua LEFT JOIN answers a ON a.id = ua.answer_id WHERE test_id = %d AND user_id = %d GROUP BY a.correct', $testId, $userId))
            ->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        $total = 0;
        foreach ($dataArr as $key => $data) {
            $total += $data['count'];
            $result[$data['result']] = $data['count'];
        }
        $result['total'] = $total;
        return $result;
    }
}

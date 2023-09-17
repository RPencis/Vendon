<?php

namespace App\Models;

class Question extends Model
{
    protected $id;
    protected $question;
    protected $answers;
    protected $test_id;

    public function __construct()
    {

        /**
         * The database table name.
         */
        parent::__construct("questions");
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
     * Get the value of question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of answers
     */
    public function getAnswers()
    {
        if(null == $this->answers){
            $model = new Answer();
            $this->answers = $model->getAllForQuesiton($this->id);
        }
        return $this->answers;
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

    public function getAllForTest($test_id)
    {
        $dataArray = $this->DB()
            ->query(sprintf('SELECT * FROM questions where test_id = %d', $test_id))
            ->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dataArray as $data) {
            $model = $this->dbToModel($data, new Question());

            $result[] = $model;
        }

        return $result;
    }
}

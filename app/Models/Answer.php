<?php

namespace App\Models;

class Answer extends Model
{
    protected $id;
    protected $text;
    protected $correct;
    protected $question_id;

    public function __construct()
    {

        /**
         * The database table name.
         */
        parent::__construct("answers");
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
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of correct
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set the value of correct
     *
     * @return  self
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

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

    public function getAllForQuesiton($question_id)
    {
        $dataArray = $this->DB()
            ->query(sprintf('SELECT * FROM answers where question_id = %d', $question_id))
            ->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dataArray as $data) {
            $model = $this->dbToModel($data, new Answer());

            $result[] = $model;
        }

        return $result;
    }
}

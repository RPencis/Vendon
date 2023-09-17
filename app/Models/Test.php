<?php

namespace App\Models;

class Test extends Model
{
    protected $id;
    protected $name;
    protected $created_at;
    protected $questions;

    public function __construct()
    {

        /**
         * The database table name.
         */
        parent::__construct("tests");
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of questions
     */
    public function getQuestions()
    {
        if(null == $this->questions){
            $model = new Question();
            $this->questions = $model->getAllForTest($this->id);
            
        }
        
        return $this->questions;
    }
}

<?php

namespace App\Models;

class User extends Model
{

    public function __construct()
    {

        /**
         * The database table name.
         */
        parent::__construct("users");
    }

    protected $id;
    protected $name;
    protected $created_at;

    

    // public function getAll(): iterable
    // {
    //     $dataArray = $this->DB()
    //         ->query('SELECT * FROM users')
    //         ->fetchAll(\PDO::FETCH_ASSOC);
    //     $result = [];

    //     foreach ($dataArray as $data) {
    //         $user = $this->dbToModel($data, new User());

    //         $result[] = $user;
    //     }

    //     return $result;
    // }

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
}

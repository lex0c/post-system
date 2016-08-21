<?php

namespace App\entity;

/**
 * @Entity
 * @Table(name="categories")
 */
class Category 
{
    /**
     * @Id
     * @Column(name="id", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
     * @Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    
    /**
     * @return mixed
     */
    function getId() 
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    function getName() 
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Category
     */
    function setName($name) 
    {
        $this->name = $name;
        return $this;
    }
    
}

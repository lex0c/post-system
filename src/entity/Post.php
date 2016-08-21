<?php

namespace App\entity;

use App\entity\Category;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="post")
 */
class Post 
{
    /**
     * @Id
     * @Column(name="id", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
     * @Column(name="title", type="string", length=100, nullable=false)
    */
    private $title;
    /**
     * @Column(name="content", type="text", nullable=false)
    */
    private $content;
    /**
     * @ManyToMany(targetEntity="App\entity\Category")
    */
    private $categories;
    
    
    public function __construct() 
    {
        $this->categories = new ArrayCollection();
    }
            
    public function getId() 
    {
        return $this->id;
    }

    public function getTitle() 
    {
        return $this->title;
    }
    
    public function setTitle($title) 
    {
        $this->title = $title;
        return $this;
    }

    public function getContent() 
    {
        return $this->content;
    }

    public function setContent($content) 
    {
        $this->content = $content;
        return $this;
    }
    
    public function addCategory(Category $category)
    {
        $this->categories->add($category);
        return $this;
    }
    
    /**
     * @return ArrayCollection
    */
    public function getCategories()
    {
        return $this->categories;
    }
    
}
<?php

namespace App\entity;

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
    
    function getId() 
    {
        return $this->id;
    }

    function getTitle() 
    {
        return $this->title;
    }
    
    function setTitle($title) 
    {
        $this->title = $title;
        return $this;
    }

    function getContent() 
    {
        return $this->content;
    }

    function setContent($content) 
    {
        $this->content = $content;
        return $this;
    }
    
}
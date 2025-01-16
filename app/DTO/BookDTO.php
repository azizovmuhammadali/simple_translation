<?php

namespace App\DTO;

class BookDTO
{
    /**
     * Create a new class instance.
     */
    public $author;
    public $translations;
    public function __construct($author,$translations)
    {
        $this->author = $author;
        $this->translations = $translations;
    }
}

<?php

namespace App\Interfaces\Reposity;

interface BookReposityInterface
{
    public function books();
    public function createbook($book);
    public function show($id);
    public function updatebook($id,$book);
     public function deletebook($id);
}

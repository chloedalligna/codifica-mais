<?php

namespace Chloe\PhpEstoque\Repository;

interface Repository
{
    // CRUD
    public function listAll(); // read all

    public function create(); // create

    public function update(); // update

    public function delete(int $id); // delete

    public function findById(int $id); // read by id

    public function dataToModel(array $data); // array maps data and returns the model

}
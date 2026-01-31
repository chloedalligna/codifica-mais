<?php

namespace Chloe\PhpEstoque\Repository;

interface Repository
{
    // CRUD
    public function listAll(); // read

    public function create($object); // create

    public function update($object); // update

    public function delete($id); // delete

//    public function findById($id);

}
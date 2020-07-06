<?php

namespace App\Http\Repositories;

interface CRUDInterfaceRepo
{
    public function getAll();
    public function findById($id);
    public function create($data);
    public function update($id, $data);
    public function destroy($id);
}

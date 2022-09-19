<?php

namespace App\Interfaces;

interface AuthorityRepositoryInterface
{
    public function getById($id);

    public function saveAuthority($request);

    public function updateAuthority($request, $id);

    public function deleteAuthority($id);
}

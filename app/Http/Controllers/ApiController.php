<?php


namespace App\Http\Controllers;


use App\Models\User;

class ApiController
{
    protected ?User $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }
}

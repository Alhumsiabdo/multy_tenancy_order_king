<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index($merchantId, $id)
    {
        $user = User::query()->where('id', $id)->first();
        return Inertia::render('User/Show', [
            'user' => $user,
        ]);
    }
}

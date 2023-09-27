<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $merchants = Merchant::query()->select('name')->get();
        return $merchants;
    }

    public function showMerchantByName($name)
    {
        $merchants = Merchant::query()->where('name', $name)->get();
        return $merchants;
    }
    public function showMerchantUserByName($name)
    {
        $users = Merchant::query()->where('name', $name)->with('users')->get();
        return $users;
    }
}

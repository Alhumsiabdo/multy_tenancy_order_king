<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = User::query()->where('merchant_id', auth()->user()->id)->get();
        return $merchants;
    }
}

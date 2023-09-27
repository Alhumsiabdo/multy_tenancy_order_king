<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Inertia\Inertia;


class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::query()->get();

        return Inertia::render('Merchants/Show', [
            'merchants' => $merchants,
            'appUrl' => config('app.url') . config('app.port')
        ]);
    }

    public function showMerchantUserByName($merchantId)
    {
        $users = Merchant::query()->where('id', $merchantId)->with('users')->first();
        return Inertia::render('Merchant/Show', [
            'merchantId' => $users->id, 
            'users' => $users->users,
            'appUrl' => config('app.url') . config('app.port')
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;

class TestController extends Controller
{
    public function test()
    {
		$admin = new Role;
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit orders';
		$admin->save();

		$account = new Role;
		$account->name         = 'accounting';
		$account->display_name = 'User Accountant'; // optional
		$account->description  = 'User is allowed to manage and edit payments';
		$account->save();

		$operator = new Role;
		$operator->name         = 'stockop';
		$operator->display_name = 'User Stock Operator'; // optional
		$operator->description  = 'User is allowed to manage and edit Stock Item';
		$operator->save();

		$user = User::find(1);
		$user->attachRole($admin);
		return 'okey';

    }
}

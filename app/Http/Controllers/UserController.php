<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Updates a given user's information
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser($id) {
        $user = DB::table('users')->get()->where('id', $id);

        $user_decoded = json_decode($user)[0];

        return view('profile', ['user' => $user_decoded]);
    }

    /**
     * Updates a given user's information
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser($id) {
        $affected = DB::table('users')
                    ->where('id', $id)
                    ->update(['name' => $_POST['name']]);

        $user = DB::table('users')->get()->where('id', $id);
        $user_decoded = json_decode($user)[0];
        // Empty global POST object
        $_POST = array();

        return view('profile', ['user' => $user_decoded]);
    }
}

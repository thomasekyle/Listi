<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    //
    public function sendEmailChange()
    {
    	$user = User::findOrFail($id);
   		$token = 
        Mail::send('emails.emailchange', ['user' => $user], function ($m) use ($user) {
            $m->from('property.cloud.dev@gmail.com', 'Your Application');
            EmailChange::create([
                'user_id' 			=> $user['id'],
                'token'			=> $token
    			]);
            $m->to($user->email, $user->name)->subject('Request to Change Email Address');
    }

    public function getEmailChange($token) 
    {

    }

    public function update()
    {

    }
}

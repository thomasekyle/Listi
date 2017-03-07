<?php

namespace App;

use App\Services\FileServices;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    //
    protected $table = 'user_files';

    protected $fillable = ['user_id', 'filename'];

    public static function getFilePath($id)
		{
			return FileServices::findUserFile($id);
		}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    public function setPasswordAttribute($password,$konfirmasi_password)
    {
        $this->attributes['password'] = bcrypt($password);
        $this->attributes['konfirmasi_password'] = bcrypt($konfirmasi_password);
    }
}

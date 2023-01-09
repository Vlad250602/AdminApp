<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model{
    protected $fillable = ['name', 'phone', 'email', 'position', 'head', 'salary', 'emp_date', 'admin_created_id', 'admin_updated_id'];
    use HasFactory;
}

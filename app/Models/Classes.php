<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable('name', 'grade', 'major', 'homeroom_teacher')]
#[Table('classes')]

class Classes extends Model
{
    
}

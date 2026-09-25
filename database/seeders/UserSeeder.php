<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'budi@ski.sch.id';
        $userStudentEmail = 'jamal@ski.sch.id';


        // User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
        [
            'name' => 'budi alianto',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]
        );
        
        User::updateOrCreate(
            ['email' => $userStudentEmail],
        [
            'name' => 'jamal benjamin netanyahu',
            'password' => bcrypt('password'),
            'role' => 'student'
        ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();

        DB::table('departements')->insert([
            [
                'name' => 'HR',
                'description' => 'Human Resources',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'IT',
                'description' => 'Information Technology',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sales',
                'description' => 'Sales',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'FA',
                'description' => 'Finance & Accounting',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Supply Chain',
                'description' => 'Supply Chain',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Purchasing',
                'description' => 'Purchasing',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR',
                'description' => 'Handling team',  
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Developer',
                'description' => 'Handling software',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'User',
                'description' => 'Handling job',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('employees')->insert([
            [
                'fullname' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'birth_date' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'departement_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000000, 6000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('tasks')->insert([
            [
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-05-31'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'assigned_to' => 1,
                'due_date' => Carbon::parse('2025-05-25'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('payrolls')->insert([
            [
                'employee_id' => 1,
                'salary' => $faker->randomFloat(2, 3000000, 6000000),
                'bonuses' => $faker->randomFloat(2, 1500000, 3000000),
                'deductions' => $faker->randomFloat(2, 300000, 4000000),
                'net_salary' => $faker->randomFloat(2, 3000000, 6000000),
                'pay_date' => Carbon::parse('2025-02-05'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 1,
                'salary' => $faker->randomFloat(2, 3000000, 6000000),
                'bonuses' => $faker->randomFloat(2, 1500000, 3000000),
                'deductions' => $faker->randomFloat(2, 300000, 4000000),
                'net_salary' => $faker->randomFloat(2, 3000000, 6000000),
                'pay_date' => Carbon::parse('2025-03-05'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-02-01 08:00:00'),
                'check_out' => Carbon::parse('2025-02-01 16:00:00'),
                'date' => Carbon::parse('2025-02-01'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-02-02 08:00:00'),
                'check_out' => Carbon::parse('2025-02-02 16:00:00'),
                'date' => Carbon::parse('2025-02-02'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-02-03 08:00:00'),
                'check_out' => Carbon::parse('2025-02-03 16:00:00'),
                'date' => Carbon::parse('2025-02-03'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('leave_requests')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'Sick Leave',
                'start_date' => Carbon::parse('2025-02-03'),
                'end_date' => Carbon::parse('2025-02-03'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

    }
}

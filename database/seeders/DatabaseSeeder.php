<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Instructor;
use App\Models\Level;
use App\Models\Organisation;
use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->isProduction()) {
            $this->seedRoles();
            $this->seedLevels();
            $this->seedAdminUser();
        } else {
            $this->seedRoles();
            $this->seedLevels();
            $this->seedUsers();
            $this->seedOrganisations();
            for ($i = 0; $i < 10; $i++) {
                Category::factory()->create();
            }
            $instructors = Instructor::factory(3)->create();
            Program::factory(10)->hasAttached($instructors)->create();
            $this->seedSales();
        }
    }

    private function seedLevels()
    {
        DB::table('levels')->delete();

        $default_levels = [
            [
                'title' => [
                    'en' => trans('levels.beginner', [], 'en'),
                    'ar' => trans('levels.beginner', [], 'ar'),
                ],
            ],
            [
                'title' => [
                    'en' => trans('levels.intermediate', [], 'en'),
                    'ar' => trans('levels.intermediate', [], 'ar'),
                ],
            ],
            [
                'title' => [
                    'en' => trans('levels.advanced', [], 'en'),
                    'ar' => trans('levels.advanced', [], 'ar'),
                ],
            ],
        ];

        foreach ($default_levels as $level) {
            Level::create($level);
        }
    }

    private function seedRoles()
    {
        DB::table('roles')->delete();

        Role::create([
            'id' => 1,
            'code' => Role::ADMIN_CODE,
            'title' => 'Admin',
        ]);
        Role::create([
            'id' => 2,
            'code' => Role::CUSTOMER_CODE,
            'title' => 'Customer',
        ]);
    }

    public function seedUsers()
    {
        DB::table('users')->delete();
        $this->seedAdminUser();
        User::factory(20)->create();
    }

    public function seedAdminUser()
    {
        User::create([
            'role_id' => Role::firstWhere('code', Role::ADMIN_CODE)->id,
            'username' => 'admin',
            'email' => 'admin@iz.com',
            'password' => '123456',
            'first_name' => 'NA',
            'middle_name' => 'NA',
            'last_name' => 'NA',
            'phone_number' => 'NA',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }

    public function seedCategories()
    {
        DB::table('categories')->delete();

        $default_categories = [
            [
                'title' => [
                    'en' => trans('category.sport-programs', [], 'en'),
                    'ar' => trans('category.sport-programs', [], 'ar'),
                ],
                'icon' => 'assets/images/icon/cup.png',
            ],
            [
                'title' => [
                    'en' => trans('category.masters', [], 'en'),
                    'ar' => trans('category.masters', [], 'ar'),
                ],
                'icon' => 'assets/images/icon/cap.png',
            ],
            [
                'title' => [
                    'en' => trans('category.online-programs', [], 'en'),
                    'ar' => trans('category.online-programs', [], 'ar'),
                ],
                'icon' => 'assets/images/icon/pc.png',
            ],
        ];

        foreach ($default_categories as $category) {
            Category::create($category);
        }
    }


    private function seedSales()
    {
        DB::table('sales')->delete();

        Sale::factory(100)->create();
    }

    private function seedOrganisations()
    {
        DB::table('organisations')->delete();

        Organisation::factory(5)->create();
    }
  
}

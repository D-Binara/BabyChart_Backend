<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MidWife;
use App\Models\Child;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Midwife
        $midwife = MidWife::create([
            'name' => 'Kumari Herath',
            'email' => 'kumari@health.lk',
            'password' => bcrypt('password123'),
            'employee_id' => 'EMP1001',
            'phone_number' => '0711234567',
            'area' => 'Ratnapura',
            'area_no' => 101,
            'rdhs_division' => 'Sabaragamuwa',
            'moh_area' => 'Balangoda',
        ]);

        // User (Mother)
        $user = User::create([
            'name' => 'Nimali Silva',
            'email' => 'nimali@example.com',
            'password' => bcrypt('securePass123'),
            'nic_number' => '987654321V',
            'phone_number' => '0777654321',
            'address' => 'No 123, Kandy Road, Kurunegala',
            'date_of_birth' => '1990-06-15',
            'occupation' => 'Teacher',
            'husband_name' => 'Chaminda Silva',
            'number_of_children' => 2,
            'remember_token' => Str::random(10),
        ]);

        // Child
        $child = Child::create([
            'name' => 'Kavisha Silva',
            'date_of_birth' => '2023-05-10',
            'hearing' => 'Normal',
            'height' => '50 cm',
            'birth_weight' => '3.1 kg',
            'eye_sight' => 'Normal',
            'blood_group' => 'B',
            'bmi' => 16.5,
            'child_birth_registration_number' => 'BR20230510',
            'weight' => '4.2 kg',
            'user_id' => $user->id,
            'mid_wife_id' => $midwife->id,
        ]);

        // Vaccine
        Vaccine::create([
            'name' => 'Hepatitis B',
            'vaccinated_date' => '2023-05-11',
            'batch_no' => 'BATCH0012',
            'adverse_effects' => 'None',
            'age_to_be_vaccinated' => '2023-05-11',
            'child_id' => $child->id,
        ]);
    }
}


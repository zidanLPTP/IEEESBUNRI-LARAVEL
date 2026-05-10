<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // =============================================
        // 1. DIVISIONS (Divisi IEEE SB UNRI)
        // =============================================
        $divisions = [
            [
                'name' => 'Computer Society',
                'slug' => 'computer-society',
                'icon' => 'fas fa-laptop-code',
                'description' => 'Divisi yang berfokus pada pengembangan ilmu komputer dan teknologi informasi.',
            ],
            [
                'name' => 'Robotics and Automation Society',
                'slug' => 'robotics-and-automation-society',
                'icon' => 'fas fa-robot',
                'description' => 'Divisi yang berfokus pada robotika, otomasi, dan sistem cerdas.',
            ],
            [
                'name' => 'Power and Energy Society',
                'slug' => 'power-and-energy-society',
                'icon' => 'fas fa-bolt',
                'description' => 'Divisi yang berfokus pada teknologi energi dan ketenagalistrikan.',
            ],
            [
                'name' => 'Women in Engineering',
                'slug' => 'women-in-engineering',
                'icon' => 'fas fa-venus',
                'description' => 'Affinity group yang mendukung peran perempuan di bidang teknik dan teknologi.',
            ],
            [
                'name' => 'Education Society',
                'slug' => 'education-society',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'Divisi yang berfokus pada pengembangan pendidikan dan pelatihan teknologi.',
            ],
        ];

        $divisionModels = [];
        foreach ($divisions as $div) {
            $divisionModels[] = Division::create($div);
        }

        $this->command->info('✅ 5 Divisi berhasil dibuat.');

        // =============================================
        // 2. OFFICERS (Pengurus + Akun Admin)
        // =============================================
        // ┌─────────────────────────────────────────┐
        // │  LOGIN CREDENTIALS:                     │
        // │  Name     : Admin IEEE                  │
        // │  Password : IEEE2026  (= Member ID)     │
        // └─────────────────────────────────────────┘
        $officers = [
            // Admin utama (untuk login)
            [
                'division_id' => $divisionModels[0]->id,
                'member_id' => 'IEEE2026',
                'name' => 'Admin IEEE',
                'position' => 'Ketua Umum',
                'sub_role' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            // BPH
            [
                'division_id' => null,
                'member_id' => 'BPH001',
                'name' => 'Nadia Putri',
                'position' => 'Wakil Ketua',
                'sub_role' => 'BPH',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'division_id' => null,
                'member_id' => 'BPH002',
                'name' => 'Reza Firmansyah',
                'position' => 'Sekretaris Umum',
                'sub_role' => 'BPH',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'division_id' => null,
                'member_id' => 'BPH003',
                'name' => 'Putri Amelia',
                'position' => 'Bendahara Umum',
                'sub_role' => 'BPH',
                'sort_order' => 4,
                'is_active' => true,
            ],
            // Ketua per divisi
            [
                'division_id' => $divisionModels[0]->id,
                'member_id' => 'CS001',
                'name' => 'Ahmad Rizky',
                'position' => 'Ketua Divisi',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'division_id' => $divisionModels[1]->id,
                'member_id' => 'RAS001',
                'name' => 'Budi Santoso',
                'position' => 'Ketua Divisi',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'division_id' => $divisionModels[2]->id,
                'member_id' => 'PES001',
                'name' => 'Farhan Putra',
                'position' => 'Ketua Divisi',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'division_id' => $divisionModels[3]->id,
                'member_id' => 'WIE001',
                'name' => 'Rina Fitriani',
                'position' => 'Ketua Divisi',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'division_id' => $divisionModels[4]->id,
                'member_id' => 'EDU001',
                'name' => 'Hendra Wijaya',
                'position' => 'Ketua Divisi',
                'sort_order' => 2,
                'is_active' => true,
            ],
            // Anggota tambahan
            [
                'division_id' => $divisionModels[0]->id,
                'member_id' => 'CS002',
                'name' => 'Siti Nurhaliza',
                'position' => 'Sekretaris',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'division_id' => $divisionModels[1]->id,
                'member_id' => 'RAS002',
                'name' => 'Dewi Lestari',
                'position' => 'Bendahara',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($officers as $officer) {
            Officer::create($officer);
        }

        $this->command->info('✅ 11 Pengurus berhasil dibuat.');

        // =============================================
        // SUMMARY
        // =============================================
        $this->command->newLine();
        $this->command->info('🎉 Seeding selesai! Database siap digunakan.');
        $this->command->newLine();
        $this->command->warn('╔══════════════════════════════════════════╗');
        $this->command->warn('║  🔑 LOGIN CREDENTIALS                   ║');
        $this->command->warn('║  Name     : Admin IEEE                   ║');
        $this->command->warn('║  Password : IEEE2026  (Member ID)        ║');
        $this->command->warn('╚══════════════════════════════════════════╝');
    }
}

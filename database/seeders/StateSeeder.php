<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'name' => 'adamawa', 'lgas' => [
                    'Demsa',
                    'Fufore',
                    'Ganye',
                    'Girei',
                    'Gombi',
                    'Guyuk',
                    'Hong',
                    'Jada',
                    'Lamurde',
                    'Madagali',
                    'Maiha',
                    'Mayo-Belwa',
                    'Michika',
                    'Mubi North',
                    'Mubi South',
                    'Numan',
                    'Shelleng',
                    'Song',
                    'Toungo',
                    'Yola North', // State capital
                    'Yola South'
                ]
            ],
            ['name' => 'bauchi', 'lgas' => [
                'Alkaleri',
                'Bauchi',
                'Bogoro',
                'Damban',
                'Darazo',
                'Dass',
                'Gamawa',
                'Ganjuwa',
                'Giade',
                'Itas/Gadau',
                'Jama\'are',
                'Katagum',
                'Kirfi',
                'Misau',
                'Ningi',
                'Shira',
                'Tafawa Balewa',
                'Toro',
                'Warji',
                'Zaki'
            ]],
            ['name' => 'borno', 'lgas' => [
                'Abadam',
                'Askira/Uba',
                'Bama',
                'Bayo',
                'Biase',
                'Chibok',
                'Damboa',
                'Dikwa',
                'Gubio',
                'Guzamala',
                'Gwoza',
                'Hawul',
                'Jere',
                'Kaga',
                'Kala/Balge',
                'Konduga',
                'Kukawa',
                'Kwaya Kusar',
                'Mafa',
                'Magumeri',
                'Maiduguri',
                'Marte',
                'Mobbar',
                'Monguno',
                'Ngala',
                'Nganzai',
                'Shani'
            ]],
            ['name' => 'gombe', 'lgas' => [
                'Akko',
                'Balanga',
                'Billiri',
                'Dukku',
                'Funakaye',
                'Gombe',
                'Kaltungo',
                'Kwami',
                'Nafada',
                'Shongom',
                'Yamaltu/Deba'
            ]],
            ['name' => 'taraba', 'lgas' => [
                'Ardo Kola',
                'Bali',
                'Donga',
                'Gashaka',
                'Gassol',
                'Ibi',
                'Jalingo',
                'Karim Lamido',
                'Kumi',
                'Lau',
                'Sardauna',
                'Takum',
                'Ussa',
                'Wukari',
                'Yorro',
                'Zing'
            ]],
            ['name' => 'yobe', 'lgas' => [
                'Bade',
                'Bursari',
                'Damaturu',
                'Fika',
                'Fune',
                'Geidam',
                'Gujba',
                'Gulani',
                'Jakusko',
                'Karasuwa',
                'Machina',
                'Nangere',
                'Nguru',
                'Potiskum',
                'Tarmuwa',
                'Yunusari',
                'Yusufari'
            ]]
        ];
        foreach ($states as $state) {
            $sar =  State::create(['name' => $state['name']]);
            foreach ($state['lgas'] as $lga) {
                $sar->lgas()->create(['name' => $lga]);
            }
        }
    }
}

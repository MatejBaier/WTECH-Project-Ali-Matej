<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            // Ferrari
            ['title' => 'Ferrari F8 Tributo V8 Supercar', 'brand_id' => 4, 'price' => 246595, 'engine_power' => 806, 'description' => 'The Ferrari F8 Tributo combines performance and elegance in a V8-powered mid-engine layout. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Ferrari 812 Superfast Luxury Beast', 'brand_id' => 4, 'price' => 421969, 'engine_power' => 818, 'description' => 'Experience raw power with the Ferrari 812 Superfast, built for speed and dominance. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 6],
            ['title' => 'Ferrari Roma Sleek Grand Tourer', 'brand_id' => 4, 'price' => 301256, 'engine_power' => 874, 'description' => 'The Ferrari Roma redefines daily luxury with classic style and modern muscle. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 6],
            ['title' => 'Ferrari SF90 Stradale Hybrid Hypercar', 'brand_id' => 4, 'price' => 249902, 'engine_power' => 707, 'description' => 'Ferrari’s SF90 Stradale pushes boundaries with hybrid technology and mind-bending acceleration. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],
            ['title' => 'Ferrari Portofino M Convertible Cruiser', 'brand_id' => 4, 'price' => 221357, 'engine_power' => 613, 'description' => 'Enjoy the wind and power with the open-top Ferrari Portofino M, designed for freedom. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 3],
            ['title' => 'Ferrari LaFerrari Hybrid Icon', 'brand_id' => 4, 'price' => 451773, 'engine_power' => 812, 'description' => 'LaFerrari is an icon, merging hybrid efficiency with race-grade engineering. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Ferrari 296 GTB Plug-In Hybrid Coupe', 'brand_id' => 4, 'price' => 232002, 'engine_power' => 895, 'description' => 'The 296 GTB introduces a new era of plug-in hybrid power in a compact, stylish form. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 6],
            ['title' => 'Ferrari GTC4Lusso V12 Grand Tourer', 'brand_id' => 4, 'price' => 263370, 'engine_power' => 924, 'description' => 'GTC4Lusso pairs V12 performance with surprising versatility and all-wheel-drive control. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],
            ['title' => 'Ferrari California T Hardtop Convertible', 'brand_id' => 4, 'price' => 295764, 'engine_power' => 643, 'description' => 'California T blends everyday comfort with Ferrari’s legendary performance. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 3],
            ['title' => 'Ferrari Monza SP2 Limited Edition', 'brand_id' => 4, 'price' => 487311, 'engine_power' => 999, 'description' => 'The Monza SP2 is a rare barchetta for pure driving enthusiasts and collectors. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Ferrari Daytona SP3 Retro-Inspired Supercar', 'brand_id' => 4, 'price' => 364521, 'engine_power' => 965, 'description' => 'Daytona SP3 is inspired by Ferrari’s racing past with futuristic performance and aesthetics. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 6],

            // Audi
            ['title' => 'Audi RS7 Sportback Matte Black Edition', 'brand_id' => 1, 'price' => 105395, 'engine_power' => 594, 'description' => 'The RS7 Sportback in matte black finish blends aggression with elegance in a high-performance package. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Audi Q8 e-tron Glacier White Electric SUV', 'brand_id' => 1, 'price' => 99600, 'engine_power' => 595, 'description' => 'Audi Q8 e-tron in glacier white delivers a luxurious and silent electric driving experience with quattro control. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 3],
            ['title' => 'Audi R8 V10 Performance Spyder Red Carbon', 'brand_id' => 1, 'price' => 113767, 'engine_power' => 545, 'description' => 'The R8 Spyder combines a roaring V10 engine with striking red paint and carbon fiber detailing. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],

            // Bentley
            ['title' => 'Bentley Continental GT Azure Blue Coupe', 'brand_id' => 2, 'price' => 285539, 'engine_power' => 568, 'description' => 'The Continental GT in Azure Blue is a luxurious grand tourer with a hand-crafted interior and refined power. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 2],
            ['title' => 'Bentley Bentayga V8 Blackline Edition', 'brand_id' => 2, 'price' => 294074, 'engine_power' => 627, 'description' => 'Bentayga Blackline Edition blends sporty styling with SUV practicality and V8 performance. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 6],
            ['title' => 'Bentley Flying Spur Mulliner Edition', 'brand_id' => 2, 'price' => 323774, 'engine_power' => 536, 'description' => 'Flying Spur Mulliner Edition offers bespoke luxury, comfort, and dynamic driving in a four-door saloon. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Bentley Mulsanne Speed British Racing Green', 'brand_id' => 2, 'price' => 222313, 'engine_power' => 621, 'description' => 'The Mulsanne Speed in classic British Racing Green delivers elite luxury with a powerful twin-turbo V8. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 2],

            // BMW
            ['title' => 'BMW M5 Competition Alpine White Performance Sedan', 'brand_id' => 3, 'price' => 97778, 'engine_power' => 579, 'description' => 'The M5 Competition in Alpine White delivers razor-sharp handling with luxury comfort and aggressive M styling. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 6],
            ['title' => 'BMW X6 M Black Sapphire Luxury SUV', 'brand_id' => 3, 'price' => 140211, 'engine_power' => 455, 'description' => 'X6 M in Black Sapphire is a bold performance SUV that merges coupe design with V8 power and sport aesthetics. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
            ['title' => 'BMW i8 Roadster Futuristic Hybrid Convertible', 'brand_id' => 3, 'price' => 124413, 'engine_power' => 384, 'description' => 'The i8 Roadster is a plug-in hybrid that blends futuristic design with open-top driving and innovation. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
            ['title' => 'BMW 7 Series Individual Frozen Cashmere Silver', 'brand_id' => 3, 'price' => 146224, 'engine_power' => 455, 'description' => 'BMW 7 Series in Frozen Cashmere Silver represents the pinnacle of elegance, executive presence, and comfort. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],

            // Jaguar
            ['title' => 'Jaguar F-Type P575 R AWD Coupe in Firenze Red', 'brand_id' => 5, 'price' => 118988, 'engine_power' => 469, 'description' => 'The F-Type R in Firenze Red is a powerful AWD coupe with a supercharged V8 and assertive styling. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
            ['title' => 'Jaguar I-PACE HSE EV400 Electric SUV in Eiger Grey', 'brand_id' => 5, 'price' => 101565, 'engine_power' => 423, 'description' => 'The I-PACE HSE in Eiger Grey is a fully electric SUV that balances luxury with futuristic performance. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],

            // Lamborghini
            ['title' => 'Lamborghini Aventador SVJ Roadster in Arancio Atlas', 'brand_id' => 6, 'price' => 276458, 'engine_power' => 814, 'description' => 'The Aventador SVJ Roadster in Arancio Atlas combines extreme performance with open-air freedom and carbon fiber aggression. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 6],
            ['title' => 'Lamborghini Urus Performante in Nero Noctis', 'brand_id' => 6, 'price' => 449070, 'engine_power' => 844, 'description' => 'The Urus Performante in Nero Noctis redefines the performance SUV segment with track-ready handling and brutal power. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],
            ['title' => 'Lamborghini Huracán Tecnica in Verde Mantis', 'brand_id' => 6, 'price' => 429295, 'engine_power' => 758, 'description' => 'The Huracán Tecnica in Verde Mantis brings rear-wheel-drive thrills and track-oriented tech in a striking green finish. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 1],
            ['title' => 'Lamborghini Revuelto Hybrid V12 in Bianco Monocerus', 'brand_id' => 6, 'price' => 413776, 'engine_power' => 838, 'description' => 'The Revuelto is Lamborghini’s hybrid V12 flagship, merging futuristic design with raw performance and innovation. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],

            // Maserati
            ['title' => 'Maserati MC20 Coupe in Blu Infinito', 'brand_id' => 7, 'price' => 169180, 'engine_power' => 603, 'description' => 'The MC20 in Blu Infinito is a mid-engine supercar with lightweight carbon construction and a twin-turbo V6 engine. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],
            ['title' => 'Maserati Levante Trofeo SUV in Grigio Maratea', 'brand_id' => 7, 'price' => 162858, 'engine_power' => 566, 'description' => 'Levante Trofeo in Grigio Maratea delivers SUV practicality with track-ready performance and Italian luxury. This content was generated using AI.', 'transmission_id' => 2, 'fuel_id' => 1],

            // Tesla
            ['title' => 'Tesla Model S Plaid in Pearl White Multi-Coat', 'brand_id' => 8, 'price' => 98613, 'engine_power' => 692, 'description' => 'Model S Plaid in Pearl White offers blistering acceleration, all-electric luxury, and industry-leading tech. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
            ['title' => 'Tesla Model X Long Range in Deep Blue Metallic', 'brand_id' => 8, 'price' => 91843, 'engine_power' => 683, 'description' => 'Model X Long Range in Deep Blue delivers unmatched space, falcon-wing doors, and dual-motor efficiency. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
            ['title' => 'Tesla Cybertruck Tri-Motor AWD in Stainless Steel', 'brand_id' => 8, 'price' => 131744, 'engine_power' => 916, 'description' => 'Cybertruck Tri-Motor in raw stainless steel redefines futuristic utility with power, range, and angular design. This content was generated using AI.', 'transmission_id' => 1, 'fuel_id' => 3],
        ]);
    }
}

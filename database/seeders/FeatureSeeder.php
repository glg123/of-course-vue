<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => [
                    'ar' => 'حزم صحية مناسبة لك',
                    'en' => 'Healthy packages for you',
                ],
                'description' => [
                    'ar' => 'اختــر الحزمــة المناسبة لك من مجموعة مميزة من الحزم الصحية التي نقدمها لك بعناية معتمدة على نظام صحي',
                    'en' => 'Choose the package that suits you from a distinguished group of health packages that we offer you carefully based on a health system',
                ],
            ],
            [
                'name' => [
                    'ar' => 'أخصــائين تغذيـة مميزين',
                    'en' => 'Distinguished nutritionists',
                ],
                'description' => [
                    'ar' => 'استعن بأخصائيين تغذية مميزين واطلب الإستشارة الصحية الخاصة بك لضمان نظام صحي متكامل',
                    'en' => 'Use distinguished nutritionists and seek your health advice to ensure an integrated health system',
                ],
            ],
            [
                'name' => [
                    'ar' => 'تحقق من روتين طعام المشاهير',
                    'en' => 'Check out the celebrity food routine',
                ],
                'description' => [
                    'ar' => 'استعرض مجموعة من صور وأسماء المشاهير والمدربين الرياضيين المؤثرين واطلع على روتين الطعام الصحي الخاص بهم',
                    'en' => 'Browse a collection of photos and names of famous celebrities and influencers and learn about their healthy eating routines',
                ],
            ],
        ];

        foreach ($data as $item) {
            Feature::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}

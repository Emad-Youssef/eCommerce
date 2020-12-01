<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use App\Models\SettingTranslation;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'admin@store.com',
            'search_engine' => 'mysql',
            'local_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name'    => 'الفولي',
                'local_shipping_lable' => 'شحن داخلي',
                'outer_shipping_lable' => 'شحن خارجي',
                'free_shipping_lable' => 'شحن مجاني'
            ]
        ]);

        $freeMethod = Setting::where('key','free_shipping_lable')->first();
        $outerMethod = Setting::where('key','outer_shipping_lable')->first();
        $localMethod = Setting::where('key','local_shipping_lable')->first();

        
        foreach(config('translatable.locales') as $locale){
            if(app()->getLocale() !== $locale){
                SettingTranslation::create([
                    'setting_id' => $freeMethod->id,
                    'locale'     => $locale,
                    'value'      => 'free value for edit',
                ]);

                SettingTranslation::create([
                    'setting_id' => $outerMethod->id,
                    'locale'     => $locale,
                    'value'      => 'outer value for edit',
                ]);

                SettingTranslation::create([
                    'setting_id' => $localMethod->id,
                    'locale'     => $locale,
                    'value'      => 'local value for edit',
                ]);
            } 
        }
    }
}

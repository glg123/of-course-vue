<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\ClinicAnswer;
use App\Models\Setting;
use Illuminate\Database\Seeder;


class NotificationSettingSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'unique_key'=>'noti_dietitian_booking_approved_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'dietitian_booking_approved',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_dietitian_booking_approved_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'dietitian_booking_approved',
                'lang'=>'en',
                'type'=>'notification',
            ],
           
            [
                'unique_key'=>'noti_dietitian_booking_completed_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'dietitian_booking_completed',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_dietitian_booking_completed_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'dietitian_booking_completed',
                'lang'=>'en',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_subscription_going_to_expire_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_going_to_expire',
                'lang'=>'ar',
                'type'=>'notification',
            ],     
            [
                'unique_key'=>'noti_subscription_going_to_expire_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_going_to_expire',
                'lang'=>'en',
                'type'=>'notification',
            ],    

            [
                'unique_key'=>'noti_subscription_expired_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_expired',
                'lang'=>'ar',
                'type'=>'notification',
            ],        
            [
                'unique_key'=>'noti_subscription_expired_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_expired',
                'lang'=>'en',
                'type'=>'notification',
            ],
           
            [
                'unique_key'=>'noti_delivery_notification_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'delivery_notification',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_delivery_notification_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'delivery_notification',
                'lang'=>'en',
                'type'=>'notification',
            ],
           
            [
                'unique_key'=>'noti_disliked_ingredients_chosen_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'disliked_ingredients_chosen',
                'lang'=>'ar',
                'type'=>'notification',
            ], 
            [
                'unique_key'=>'noti_disliked_ingredients_chosen_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'disliked_ingredients_chosen',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_meal_selection_reminder_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'meal_selection_reminder',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_meal_selection_reminder_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'meal_selection_reminder',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_subscription_confirmed_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_confirmed',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_subscription_confirmed_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'subscription_confirmed',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_meal_reminder_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'meal_reminder',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_meal_reminder_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'meal_reminder',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_customer_got_additional_days_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'customer_got_additional_days',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_customer_got_additional_days_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'customer_got_additional_days',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_customer_credit_wallet_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'customer_credit_wallet',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_customer_credit_wallet_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'customer_credit_wallet',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'noti_plan_switch_ar',
                'key'=>'-',
                'value'=>'-',
                'group'=>'plan_switch',
                'lang'=>'ar',
                'type'=>'notification',
            ],
            [
                'unique_key'=>'noti_plan_switch_en',
                'key'=>'-',
                'value'=>'-',
                'group'=>'plan_switch',
                'lang'=>'en',
                'type'=>'notification',
            ],

            [
                'unique_key'=>'enable_sms',
                'key'=>'package_switch',
                'value'=>false,
                'group'=>'enable_sms',
                'type'=>'notification',
            ],
        ];

        foreach($data as $row){
            Setting::updateOrCreate(
                ['unique_key'=>$row['unique_key']],
                ['key'=>$row['key'] ?? '-','type'=>$row['type'],'value'=>$row['value'] ?? '-','group'=>$row['group']??null,'lang'=>$row['lang']??null],
            );
        }
    }
}
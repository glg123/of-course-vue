<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('permissions')->upsert(
            $this->getPermissionsTable(),
            ['id'],
            ['name', 'guard_name','section','type','group']
        );

        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function getPermissionsTable()
    {
        return $this->getSystemPermission() + $this->getCustomPermission();
    }
    public function getSystemPermission(): array
    {
        return[
            //Sales Group
              // Dashboard
              ['id' => 1, 'name' => 'dashboard-view', 'guard_name' => 'web','section'=>'dashboard','type'=>'dashboard','group'=>'sales'],  
              // customer
              ['id' => 2, 'name' => 'all-customer-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 3, 'name' => 'all-customer-add', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 4, 'name' => 'all-customer-edit', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 5, 'name' => 'all-customer-expire-order-edit', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 6, 'name' => 'all-customer-customer-delete', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 7, 'name' => 'all-customer-sales-order-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 8, 'name' => 'all-customer-sales-order-add', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 9, 'name' => 'all-customer-sales-order-delete', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 10, 'name' => 'all-customer-sales-order-update', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 11, 'name' => 'all-customer-pause-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 12, 'name' => 'all-customer-dislike-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 13, 'name' => 'all-customer-allergies-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 14, 'name' => 'all-customer-pause-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 15, 'name' => 'all-customer-meal-section-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 16, 'name' => 'all-customer-meal-rating-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 17, 'name' => 'all-customer-dietitian-view', 'guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              ['id' => 18, 'name' => 'all-customer-delivery-Schedule-view','guard_name' => 'web','section'=>'all-customer','type'=>'customer','group'=>'sales'],
              
              ['id' => 19, 'name' => 'inactive-customer-view', 'guard_name' => 'web','section'=>'inactive-customer','type'=>'customer','group'=>'sales'],
              
              ['id' => 20, 'name' => 'customer-without-meal', 'guard_name' => 'web','section'=>'customer-without-meal','type'=>'customer','group'=>'sales'],
              
              ['id' => 21, 'name' => 'payment-option-offline', 'guard_name' => 'web','section'=>'payment-option','type'=>'customer','group'=>'sales'],
              ['id' => 22, 'name' => 'payment-option-online', 'guard_name' => 'web','section'=>'payment-option','type'=>'customer','group'=>'sales'],
              ['id' => 23, 'name' => 'payment-option-free', 'guard_name' => 'web','section'=>'payment-option','type'=>'customer','group'=>'sales'],   
              // Sales Order
              ['id' => 24, 'name' => 'sales-order-view', 'guard_name' => 'web','section'=>'sales-order','type'=>'sales-order','group'=>'sales'],
              ['id' => 25, 'name' => 'sales-order-export', 'guard_name' => 'web','section'=>'sales-order','type'=>'sales-order','group'=>'sales'],
              
              ['id' => 26, 'name' => 'sales-order-day-wise-view', 'guard_name' => 'web','section'=>'sales-order-day-wise','type'=>'sales-order','group'=>'sales'],
          
              ['id' => 27, 'name' => 'end-date-reminder-view', 'guard_name' => 'web','section'=>'end-date-reminder','type'=>'sales-order','group'=>'sales'],
              ['id' => 28, 'name' => 'sales-order-discount-view', 'guard_name' => 'web','section'=>'sales-order-discount','type'=>'sales-order','group'=>'sales'],    
              // payment
              ['id' => 29, 'name' => 'payment-view', 'guard_name' => 'web','section'=>'payment','type'=>'payment','group'=>'sales'],
              // meals Rating
              ['id' => 30, 'name' => 'meal-rating-view', 'guard_name' => 'web','section'=>'meal-rating','type'=>'meal-rating','group'=>'sales'],
              // push notification
              ['id' => 31, 'name' => 'push-notification-view', 'guard_name' => 'web','section'=>'push-notification','type'=>'push-notification','group'=>'sales'],
              ['id' => 32, 'name' => 'push-notification-send', 'guard_name' => 'web','section'=>'push-notification','type'=>'push-notification','group'=>'sales'],
              // Dietitian Appointment 
              ['id' => 33, 'name' => 'dietitian-appointment-view', 'guard_name' => 'web','section'=>'dietitian-appointment','type'=>'dietitian-appointment','group'=>'sales'],
              ['id' => 34, 'name' => 'dietitian-appointment-edit', 'guard_name' => 'web','section'=>'dietitian-appointment','type'=>'dietitian-appointment','group'=>'sales'],
              ['id' => 35, 'name' => 'dietitian-appointment-delete', 'guard_name' => 'web','section'=>'dietitian-appointment','type'=>'dietitian-appointment','group'=>'sales'],
                
            //Operation Group
              // stocks
              ['id' => 36, 'name' => 'stocks-view', 'guard_name' => 'web','section'=>'stocks','type'=>'stocks','group'=>'operations'],  
              ['id' => 37, 'name' => 'stocks-inward-view', 'guard_name' => 'web','section'=>'stocks','type'=>'stocks','group'=>'operations'],  
              ['id' => 38, 'name' => 'stocks-outward-view', 'guard_name' => 'web','section'=>'stocks','type'=>'stocks','group'=>'operations'],  
              ['id' => 39, 'name' => 'stocks-current-view', 'guard_name' => 'web','section'=>'stocks','type'=>'stocks','group'=>'operations'],  
              
              ['id' => 40, 'name' => 'purchase-add', 'guard_name' => 'web','section' =>'purchase','type'=>'stocks','group'=>'operations'],
              ['id' => 41, 'name' => 'purchase-submit','guard_name' => 'web','section'=>'purchase','type'=>'stocks','group'=>'operations'],
              
              ['id' => 42, 'name' => 'adjust-stock-view', 'guard_name' => 'web','section'=>'adjust-stock','type'=>'stocks','group'=>'operations'],
              ['id' => 43, 'name' => 'adjust-stock-adjust', 'guard_name' => 'web','section'=>'adjust-stock','type'=>'stocks','group'=>'operations'],
  
              ['id' => 44, 'name' => 'master-data-view', 'guard_name' => 'web','section'=>'master-data','type'=>'stocks','group'=>'operations'],
              ['id' => 45, 'name' => 'master-data-add', 'guard_name' => 'web','section'=>'master-data','type'=>'stocks','group'=>'operations'],
              ['id' => 46, 'name' => 'master-data-edit', 'guard_name' => 'web','section'=>'master-data','type'=>'stocks','group'=>'operations'],
              ['id' => 47, 'name' => 'master-data-delete', 'guard_name' => 'web','section'=>'master-data','type'=>'stocks','group'=>'operations'],
              //Plan
              ['id' => 48, 'name' => 'plan-view', 'guard_name' => 'web','section'=>'plan','type'=>'plan','group'=>'operations'],
              ['id' => 49, 'name' => 'plan-add', 'guard_name' => 'web','section'=>'plan','type'=>'plan','group'=>'operations'],
              ['id' => 50, 'name' => 'plan-edit', 'guard_name' => 'web','section'=>'plan','type'=>'plan','group'=>'operations'],
              ['id' => 51, 'name' => 'plan-delete', 'guard_name' => 'web','section'=>'plan','type'=>'plan','group'=>'operations'],
              ['id' => 52, 'name' => 'plan-dublicate', 'guard_name' => 'web','section'=>'plan','type'=>'plan','group'=>'operations'],
              //Meals
              ['id' => 53, 'name' => 'meal-view', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 54, 'name' => 'meal-add', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 55, 'name' => 'meal-edit', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 56, 'name' => 'meal-dublicate', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 57, 'name' => 'meal-delete', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 58, 'name' => 'meal-export', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              ['id' => 59, 'name' => 'meal-status-change', 'guard_name' => 'web','section'=>'meal','type'=>'meal','group'=>'operations'],
              //meal Category
              ['id' => 60, 'name' => 'meals-category-view', 'guard_name' => 'web','section'=>'meals-category','type'=>'meals-category','group'=>'operations'],
              ['id' => 61, 'name' => 'meals-category-add', 'guard_name' => 'web','section'=>'meals-category','type'=>'meals-category','group'=>'operations'],
              ['id' => 62, 'name' => 'meals-category-edit', 'guard_name' => 'web','section'=>'meals-category','type'=>'meals-category','group'=>'operations'],
              ['id' => 63, 'name' => 'meals-category-delete', 'guard_name' => 'web','section'=>'meals-category','type'=>'meals-category','group'=>'operations'],
              //diet plan
              ['id' => 64, 'name' => 'diet-plan-view', 'guard_name' => 'web','section'=>'diet-plan','type'=>'diet-plan','group'=>'operations'],
              ['id' => 65, 'name' => 'diet-plan-add', 'guard_name' => 'web','section'=>'diet-plan','type'=>'diet-plan','group'=>'operations'],
              ['id' => 66, 'name' => 'diet-plan-edit', 'guard_name' => 'web','section'=>'diet-plan','type'=>'diet-plan','group'=>'operations'],
              ['id' => 67, 'name' => 'diet-plan-delete', 'guard_name' => 'web','section'=>'diet-plan','type'=>'diet-plan','group'=>'operations'],
              //plan switch
              ['id' => 68, 'name' => 'plan-switch-view', 'guard_name' => 'web','section'=>'plan-switch','type'=>'plan-switch','group'=>'operations'],
              ['id' => 69, 'name' => 'plan-switch-add', 'guard_name' => 'web','section'=>'plan-switch','type'=>'plan-switch','group'=>'operations'],
              ['id' => 70, 'name' => 'plan-switch-delete', 'guard_name' => 'web','section'=>'plan-switch','type'=>'plan-switch','group'=>'operations'],
              ['id' => 71, 'name' => 'plan-switch-switch', 'guard_name' => 'web','section'=>'plan-switch','type'=>'plan-switch','group'=>'operations'],
              //users
              ['id' => 72, 'name' => 'manager-view', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 73, 'name' => 'manager-add', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 74, 'name' => 'manager-edit', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 75, 'name' => 'manager-delete', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 76, 'name' => 'manager-view-permission', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 77, 'name' => 'manager-add-permission', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 78, 'name' => 'manager-edit-permission', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              ['id' => 79, 'name' => 'manager-delete-permission', 'guard_name' => 'web','section'=>'manager','type'=>'users','group'=>'operations'],
              
              ['id' => 80, 'name' => 'manager-driver-view', 'guard_name' => 'web','section'=>'driver','type'=>'users','group'=>'operations'],
              ['id' => 81, 'name' => 'manager-driver-add', 'guard_name' => 'web','section'=>'driver','type'=>'users','group'=>'operations'],
              ['id' => 82, 'name' => 'manager-driver-edit', 'guard_name' => 'web','section'=>'driver','type'=>'users','group'=>'operations'],
              ['id' => 83, 'name' => 'manager-driver-delete', 'guard_name' => 'web','section'=>'driver','type'=>'users','group'=>'operations'],
              
              ['id' => 84, 'name' => 'manager-dietitian-view', 'guard_name' => 'web','section'=>'dietitian','type'=>'users','group'=>'operations'],
              ['id' => 85, 'name' => 'manager-dietitian-add', 'guard_name' => 'web','section'=>'dietitian','type'=>'users','group'=>'operations'],
              ['id' => 86, 'name' => 'manager-dietitian-edit', 'guard_name' => 'web','section'=>'dietitian','type'=>'users','group'=>'operations'],
              ['id' => 87, 'name' => 'manager-dietitian-delete', 'guard_name' => 'web','section'=>'dietitian','type'=>'users','group'=>'operations'],
  
              ['id' => 88, 'name' => 'manager-celebrity-view', 'guard_name' => 'web','section'=>'celebrity','type'=>'users','group'=>'operations'],
              ['id' => 89, 'name' => 'manager-celebrity-add', 'guard_name' => 'web','section'=>'celebrity','type'=>'users','group'=>'operations'],
              ['id' => 90, 'name' => 'manager-celebrity-edit', 'guard_name' => 'web','section'=>'celebrity','type'=>'users','group'=>'operations'],
              ['id' => 91, 'name' => 'manager-celebrity-delete', 'guard_name' => 'web','section'=>'celebrity','type'=>'users','group'=>'operations'],
              //locations
              ['id' => 92, 'name' => 'location-view', 'guard_name' => 'web','section'=>'location','type'=>'location','group'=>'operations'],
              ['id' => 93, 'name' => 'location-add', 'guard_name' => 'web','section'=>'location','type'=>'location','group'=>'operations'],
              ['id' => 94, 'name' => 'location-edit', 'guard_name' => 'web','section'=>'location','type'=>'location','group'=>'operations'],
              ['id' => 95, 'name' => 'location-delete', 'guard_name' => 'web','section'=>'location','type'=>'location','group'=>'operations'],
              //tags
              ['id' => 96, 'name' => 'customer-tag-view', 'guard_name' => 'web','section'=>'customer-tag','type'=>'tag','group'=>'operations'],
              ['id' => 97, 'name' => 'customer-tag-add', 'guard_name' => 'web','section'=>'customer-tag','type'=>'tag','group'=>'operations'],
              ['id' => 98, 'name' => 'customer-tag-edit', 'guard_name' => 'web','section'=>'customer-tag','type'=>'tag','group'=>'operations'],
              ['id' => 99, 'name' => 'customer-tag-delete', 'guard_name' => 'web','section'=>'customer-tag','type'=>'tag','group'=>'operations'],
  
              ['id' => 100, 'name' => 'meal-tag-view', 'guard_name' => 'web','section'=>'meal-tag','type'=>'tag','group'=>'operations'],
              ['id' => 101, 'name' => 'meal-tag-add', 'guard_name' => 'web','section'=>'meal-tag','type'=>'tag','group'=>'operations'],
              ['id' => 102, 'name' => 'meal-tag-edit', 'guard_name' => 'web','section'=>'meal-tag','type'=>'tag','group'=>'operations'],
              ['id' => 103, 'name' => 'meal-tag-delete', 'guard_name' => 'web','section'=>'meal-tag','type'=>'tag','group'=>'operations'],
              //Referrals
              ['id' => 104, 'name' => 'referral-view', 'guard_name' => 'web','section'=>'referral','type'=>'referral','group'=>'operations'],
              ['id' => 105, 'name' => 'referral-setting', 'guard_name' => 'web','section'=>'referral','type'=>'referral','group'=>'operations'],
              //faq
              ['id' => 106, 'name' => 'faq-view', 'guard_name' => 'web','section'=>'faq','type'=>'faq','group'=>'operations'],
              ['id' => 107, 'name' => 'faq-add', 'guard_name' => 'web','section'=>'faq','type'=>'faq','group'=>'operations'],
              ['id' => 108, 'name' => 'faq-edit', 'guard_name' => 'web','section'=>'faq','type'=>'faq','group'=>'operations'],
              ['id' => 109, 'name' => 'faq-delete', 'guard_name' => 'web','section'=>'faq','type'=>'faq','group'=>'operations'],
              //contact method
              ['id' => 110, 'name' => 'contact-view', 'guard_name' => 'web','section'=>'contact','type'=>'contact','group'=>'operations'],
              ['id' => 111, 'name' => 'contact-add', 'guard_name' => 'web','section'=>'contact','type'=>'contact','group'=>'operations'],
              ['id' => 112, 'name' => 'contact-edit', 'guard_name' => 'web','section'=>'contact','type'=>'contact','group'=>'operations'],
              ['id' => 113, 'name' => 'contact-delete', 'guard_name' => 'web','section'=>'contact','type'=>'contact','group'=>'operations'],
              //promo code
              ['id' => 114, 'name' => 'promo-code-view', 'guard_name' => 'web','section'=>'promo-code','type'=>'promo-code','group'=>'operations'],
              ['id' => 115, 'name' => 'promo-code-add', 'guard_name' => 'web','section'=>'promo-code','type'=>'promo-code','group'=>'operations'],
              ['id' => 116, 'name' => 'promo-code-edit', 'guard_name' => 'web','section'=>'promo-code','type'=>'promo-code','group'=>'operations'],
              ['id' => 117, 'name' => 'promo-code-delete', 'guard_name' => 'web','section'=>'promo-code','type'=>'promo-code','group'=>'operations'],
              //offers
              ['id' => 118, 'name' => 'offer-view', 'guard_name' => 'web','section'=>'offer','type'=>'offer','group'=>'operations'],
              ['id' => 119, 'name' => 'offer-add', 'guard_name' => 'web','section'=>'offer','type'=>'offer','group'=>'operations'],
              ['id' => 120, 'name' => 'offer-edit', 'guard_name' => 'web','section'=>'offer','type'=>'offer','group'=>'operations'],
              ['id' => 121, 'name' => 'offer-delete', 'guard_name' => 'web','section'=>'offer','type'=>'offer','group'=>'operations'],
              //e-clinic
              ['id' => 122, 'name' => 'e-clinic-view', 'guard_name' => 'web','section'=>'e-clinic','type'=>'e-clinic','group'=>'operations'],
              ['id' => 123, 'name' => 'e-clinic-add', 'guard_name' => 'web','section'=>'e-clinic','type'=>'e-clinic','group'=>'operations'],
              ['id' => 124, 'name' => 'e-clinic-edit', 'guard_name' => 'web','section'=>'e-clinic','type'=>'e-clinic','group'=>'operations'],
              ['id' => 125, 'name' => 'e-clinic-delete', 'guard_name' => 'web','section'=>'e-clinic','type'=>'e-clinic','group'=>'operations'],

            //Reports&Settings
              // generations
              ['id' => 126, 'name' => 'ordered-items-view', 'guard_name' => 'web','section'=>'ordered-items','type'=>'generations','group'=>'reports'],  
              ['id' => 127, 'name' => 'ordered-items-generate', 'guard_name' => 'web','section'=>'ordered-items','type'=>'generations','group'=>'reports'],  
  
              ['id' => 128, 'name' => 'ingredient-view', 'guard_name' => 'web','section'=>'ingredient','type'=>'generations','group'=>'reports'],  
  
              ['id' => 129, 'name' => 'delivery-report-view', 'guard_name' => 'web','section'=>'delivery-report','type'=>'generations','group'=>'reports'],  
              
              ['id' => 130, 'name' => 'quick-view-delivery-report-view', 'guard_name' => 'web','section'=>'quick-view-delivery-report','type'=>'generations','group'=>'reports'],  
              ['id' => 131, 'name' => 'quick-view-delivery-report-generate', 'guard_name' => 'web','section'=>'quick-view-delivery-report','type'=>'generations','group'=>'reports'],  
              //plansReport
              ['id' => 132, 'name' => 'plans-report-view', 'guard_name' => 'web','section'=>'plans-report','type'=>'plans-report','group'=>'reports'],  
              //salesReport
              ['id' => 133, 'name' => 'sales-report-view', 'guard_name' => 'web','section'=>'sales-report','type'=>'sales-report','group'=>'reports'],  
              //driverReport
              ['id' => 134, 'name' => 'driver-report-view', 'guard_name' => 'web','section'=>'driver-report','type'=>'driver-report','group'=>'reports'],  
              //promocodeReport
              ['id' => 135, 'name' => 'promo-code-report-view', 'guard_name' => 'web','section'=>'promo-code-report','type'=>'promo-code-report','group'=>'reports'],  
              //pausedMealReport
              ['id' => 136, 'name' => 'pause-meal-report-view', 'guard_name' => 'web','section'=>'pause-meal-report','type'=>'pause-meal-report','group'=>'reports'],  
              //Monthly SalesReport
              ['id' => 137, 'name' => 'monthly-sale-report-view', 'guard_name' => 'web','section'=>'monthly-sale-report','type'=>'monthly-sale-report','group'=>'reports'],  
              //customerReport
              ['id' => 138, 'name' => 'customer-gender-report-view', 'guard_name' => 'web','section'=>'customer-gender-report','type'=>'customer-report','group'=>'reports'],  
              
              ['id' => 139, 'name' => 'customer-age-report-view', 'guard_name' => 'web','section'=>'customer-age-report','type'=>'customer-report','group'=>'reports'],  
              
              ['id' => 140, 'name' => 'customer-one-day-trial-report-view', 'guard_name' => 'web','section'=>'customer-one-day-trial-report','type'=>'customer-report','group'=>'reports'],  
              //celebrbityReport
              ['id' => 141, 'name' => 'celebrity-statement-report-view', 'guard_name' => 'web','section'=>'celebrity-statement-report','type'=>'celebrity-report','group'=>'reports'],  
              ['id' =>142 , 'name' => 'celebrity-statement-report-export', 'guard_name' => 'web','section'=>'celebrity-statement-report','type'=>'celebrity-report','group'=>'reports'],  
         
              ['id' => 143, 'name' => 'total-celebrity-report-view', 'guard_name' => 'web','section'=>'total-celebrity-report','type'=>'celebrity-report','group'=>'reports'],  
              ['id' => 144, 'name' => 'total-celebrity-report-export', 'guard_name' => 'web','section'=>'total-celebrity-report','type'=>'celebrity-report','group'=>'reports'],  
         
              ['id' => 145, 'name' => 'all-celebrity-report-view', 'guard_name' => 'web','section'=>'all-celebrity-report','type'=>'celebrity-report','group'=>'reports'],  
              ['id' =>146 , 'name' => 'all-celebrity-report-export', 'guard_name' => 'web','section'=>'all-celebrity-report','type'=>'celebrity-report','group'=>'reports'],  
         
              ['id' => 147, 'name' => 'celebrity-promocode-report-view', 'guard_name' => 'web','section'=>'celebrity-promocode-report','type'=>'celebrity-report','group'=>'reports'],  
              ['id' => 148, 'name' => 'celebrity-promocode-report-export', 'guard_name' => 'web','section'=>'celebrity-promocode-report','type'=>'celebrity-report','group'=>'reports'],  
              
              /////Settings
              ['id' => 149, 'name' => 'setting-view-and-modify', 'guard_name' => 'web','section'=>'setting','type'=>'setting','group'=>'settings'],  
              //operation
              ['id' => 150, 'name' => 'purchase-view', 'guard_name' => 'web','section'=>'purchase','type'=>'stocks','group'=>'operations'],

        ];
    }

    public function getCustomPermission(): array
    {
       
        return[
            //start from 151
        ];
    }

}

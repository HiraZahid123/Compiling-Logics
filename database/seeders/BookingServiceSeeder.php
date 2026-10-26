<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class BookingServiceSeeder extends Seeder
{
    /**
     * Seed the bookable service categories and services.
     */
    public function run(): void
    {
        $catalogue = [
            'Graphic Design' => [['name' => 'Graphics', 'duration_minutes' => 30]],
            'Project Management' => [['name' => 'Consultation', 'duration_minutes' => 30]],
        ];

        foreach (array_keys($catalogue) as $categoryOrder => $categoryName) {
            $category = ServiceCategory::updateOrCreate(['name' => $categoryName], ['sort_order' => $categoryOrder]);

            foreach ($catalogue[$categoryName] as $serviceOrder => $service) {
                $category->services()->updateOrCreate(
                    ['name' => $service['name']],
                    ['duration_minutes' => $service['duration_minutes'], 'sort_order' => $serviceOrder],
                );
            }
        }
    }
}

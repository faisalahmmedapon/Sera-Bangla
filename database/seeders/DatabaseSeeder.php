<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductMaterial;
use App\Models\Size;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(11)->create();
        Slider::factory(10)->create();
        Color::factory(7)->create();
        Brand::factory(10)->create();
        Material::factory(10)->create();
        Size::factory(4)->create();
        Coupon::factory(5)->create();
        Product::factory(100)->create();
        ProductCategory::factory(100)->create();
        ProductMaterial::factory(10)->create();
        ProductImage::factory(100)->create();

        $this->call(AdminSeeder::class);
    }
}

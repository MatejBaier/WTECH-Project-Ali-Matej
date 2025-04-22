<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $folderWithListingImages = public_path('images/Listings');

        $brandsOrder = [
            'Ferrari',
            'Audi',
            'Bentley',
            'BMW',
            'Jaguar',
            'Lamborghini',
            'Maserati',
            'Tesla',
        ];

        $currentProductId = 1;

        foreach ($brandsOrder as $brandName)
        {
            $brandPath = $folderWithListingImages . '/' . $brandName;



            $products = File::directories($brandPath);

            // Produkty pod značkou
            foreach ($products as $productPath)
            {
                $images = File::files($productPath);

                foreach ($images as $image)
                {
                    $relativePath = str_replace(public_path(), '', $image->getRealPath());

                    ProductImage::create([
                        'product_id' => $currentProductId,
                        'image_path' => $relativePath,
                    ]);
                }

                $currentProductId++;
            }
        }
    }
}

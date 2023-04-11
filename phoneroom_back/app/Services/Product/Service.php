<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Image;
use App\Models\Option;
use App\Models\Product;
use App\Models\Property;
use App\Models\Variant;
use App\Utilities\TranslationIntoLatin;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;

class Service
{

    public function store($data)
    {
        $data_properties = [];
        if (isset($data['properties'])){
            $data_properties = $data['properties'];
            unset($data['properties']);
        }
        $data_thumb_img = [];
        $data['image'] = 'storage'.substr($data['image'], 6);
        $translation = new TranslationIntoLatin();
        DB::transaction(function() use ($data, $data_thumb_img, $data_properties, $translation) {
            for ($i=1; $i<=4; $i++){
                if (isset($data['path_'.$i])){
                    $data['path_'.$i] = 'storage'.substr($data['path_'.$i], 6);
                    $data_thumb_img[$i] = $data['path_'.$i];
                    unset($data['path_'.$i]);
                }
            }

            if (isset($data['options'])){
                $options_json = json_encode($data['options'], JSON_UNESCAPED_UNICODE);
                for ($i=0;$i<count($data['options']);$i++){
                    if (isset($data['options'][$i]['values']['colors'])){
                        unset($data['options'][$i]['values']['colors']);
                    }
                }
                $variants = [];
                $num = 0;
                foreach ($data['options'][0]['values'] as $opt1){
                    if (count($data['options']) > 1){
                        $i = 1;
                        $options = [
                            $data['options'][0]['name'] => $opt1,
                        ];
                        while ($i !== count($data['options']) - 1){
                            for ($j=0;$j<count($data['options'][$i]['values']);$j++){
                                $options[$data['options'][$i]['name']][] = $data['options'][$i]['values'][$j];
                            }
                            $i++;
                        }
                        $variants_options = [];
                        if (count($options) > 1){
                            $options_opt1 = $options[$data['options'][0]['name']];
                            unset($options[$data['options'][0]['name']]);
                            foreach ($options as $key => $val){
                                if (is_array($val)){
                                    unset($options[$key]);
                                    for ($x=0;$x<count($val);$x++){
                                        if(count($options) > 0){
                                            foreach ($options as $key2 => $val2){
                                                if (is_array($val2)){
                                                    for ($n=0;$n<count($val2);$n++){
                                                        $variants_options[] = [
                                                            $data['options'][0]['name'] => $options_opt1,
                                                            $key => $val[$x],
                                                            $key2 => $val2[$n],
                                                        ];
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            $variants_options[] = [
                                                $data['options'][0]['name'] => $options_opt1,
                                                $key => $val[$x],
                                            ];
                                        }
                                    }
                                }
                                break;
                            }
                        }
                        for ($k=0;$k<count($data['options'][$i]['values']);$k++){
                            if (empty($variants_options) !== true){
                                for ($l=0;$l<count($variants_options);$l++){
                                    $variants_options[$l][$data['options'][$i]['name']] = $data['options'][$i]['values'][$k];

                                    $name = '';
                                    $variants_options_names = $variants_options[$l];
                                    if (count($variants_options_names) > 2){
                                        foreach (array_reverse($variants_options_names) as $key => $val) {
                                            if (count($variants_options_names) <= 2){
                                                $name = trim($val.' '.$name);
                                                continue;
                                            }
                                            $name = trim('('.$val.')'.' '.$name);
                                            unset($variants_options_names[$key]);
                                        }
                                    }
                                    $variants[$num] = [
                                        'name' => $name,
                                        'product_name' => $data['name'].' '.$name,
                                        'price' => $data['price'],
                                        'old_price' => $data['old_price'],
                                        'description' => $data['description'],
                                        'units_in_stock' => $data['units_in_stock'],
                                        'rating' => $data['rating'],
                                        'options' => $variants_options[$l],
                                        'published' => $data['published'],
                                        'image' => $data['image'],
                                        'created_at' => date(now()),
                                        'updated_at' => date(now()),
                                    ];
                                    $num++;
                                }
                            }
                            else{
                                $options[$data['options'][$i]['name']] = $data['options'][$i]['values'][$k];
                                $name = '';
                                foreach ($options as $key => $val) {
                                    $name = trim($name.' '.$val);
                                }
                                $variants[$num] = [
                                    'name' => $name,
                                    'product_name' => $data['name'].' '.$name,
                                    'price' => $data['price'],
                                    'old_price' => $data['old_price'],
                                    'description' => $data['description'],
                                    'units_in_stock' => $data['units_in_stock'],
                                    'rating' => $data['rating'],
                                    'options' => $options,
                                    'published' => $data['published'],
                                    'image' => $data['image'],
                                    'created_at' => date(now()),
                                    'updated_at' => date(now()),
                                ];
                                $num++;
                            }

                        }
                    }
                    else{
                        $variants[$num] = [
                            'name' => trim($opt1),
                            'product_name' => $data['name'].' '.trim($opt1),
                            'price' => $data['price'],
                            'old_price' => $data['old_price'],
                            'description' => $data['description'],
                            'units_in_stock' => $data['units_in_stock'],
                            'rating' => $data['rating'],
                            'options' => [
                                $data['options'][0]['name'] => $opt1
                            ],
                            'published' => $data['published'],
                            'image' => $data['image'],
                            'created_at' => date(now()),
                            'updated_at' => date(now()),
                        ];
                        $num++;
                    }
                }

                $product = Product::firstOrCreate([
                    'name' => $data['name'],
                    'price' => $variants[0]['price'],
                    'old_price' => $variants[0]['old_price'],
                    'description' => $variants[0]['description'],
                    'units_in_stock' => $variants[0]['units_in_stock'],
                    'rating' => $variants[0]['rating'],
                    'category_id' => $data['category_id'],
                    'brand_id' => $data['brand_id'],
                    'image' => $data['image'],
//                    'variants' => json_encode($variants, JSON_UNESCAPED_UNICODE),
                ]);
//                dd(11);
//                $product->update([
//                    'variants' => json_encode($variants, JSON_UNESCAPED_UNICODE)
//                ]);
                $category = Category::where('id', $product->category_id)->first();
                foreach ($variants as $i => $variant){
                    $variant['id'] = str($product->id).'00'.str($i+1);
                    $variant['brand'] = $product->brand->name;
                    $variant['category'] = $product->category->name;
                    $variant['slug'] = $variant['slug'] ?? str($translation->translate($product->slug.' '.$variant['name']))->slug();
                    $variant['sku'] = trim(str_replace(" ", "-",strtoupper($translation->translate($product->name.' '.$variant['id'].' '.$product->category_id.' '.$product->brand_id))));
                    $product_variants = Variant::firstOrCreate([
                        'product_id' => $product->id,
                        'variants_json' => json_encode($variant, JSON_UNESCAPED_UNICODE),
                    ]);
                    $category->variants()->attach($product_variants->id);
                    if (empty($data_thumb_img) !== true){
                        for ($i=1; $i<=count($data_thumb_img); $i++){
                            Image::firstOrCreate([
                                'product_id' => $product->id,
                                'path' => $data_thumb_img[$i],
                                'position' => $i,
                                'variant_id' => $variant['id'],
                            ]);
                        }
                    }

                }


                if (isset($data['tags_id'])){
                    $tags = $data['tags_id'];
                    unset($data['tags_id']);
                    $product->tags()->attach($tags);
                }


                if (empty($data_properties) !== true){
                    $properties = [];
                    for ($i=0;$i<count($data_properties)-1;$i++){
                        if (!is_array($data_properties[$i])){
                            $properties[$data_properties[$i]] = [];
                            for ($j=$i+1;$j<=count($data_properties)-2;$j+=2){
                                if (!is_array($data_properties[$j])){
                                    break;
                                }
                                $properties[$data_properties[$i]] += [$data_properties[$j][0] => $data_properties[$j+1][0]];
                            }
                        }
                    }

                    $property = Property::firstOrCreate([
                        'product_id' => $product->id,
                        'properties_json' => json_encode($properties, JSON_UNESCAPED_UNICODE),
                    ]);
                    $category->properties()->attach($property);
                }

                $option = Option::firstOrCreate([
                    'product_id' => $product->id,
                    'options_json' => $options_json,
                ]);
                $category->options()->attach($option);
            }

            else{
                unset($data['published']);
                if (isset($data['tags_id'])){
                    $tags = $data['tags_id'];
                    unset($data['tags_id']);
                    $product = Product::firstOrCreate($data);
                    $product->tags()->attach($tags);
                }
                else{
                    $product = Product::firstOrCreate($data);
                }
                if (empty($data_thumb_img) !== true){
                    for ($i=1; $i<=count($data_thumb_img); $i++){
                        Image::firstOrCreate([
                            'product_id' => $product->id,
                            'path' => $data_thumb_img[$i],
                            'position' => $i
                        ]);
                    }
                }
                CategoryProduct::firstOrCreate([
                    'category_id' => $product->category_id,
                    'product_id' => $product->id,
                ]);
                $category = Category::where('id', $product->category_id)->first();
                if (empty($data_properties) !== true){
                    $properties = [];
                    for ($i=0;$i<count($data_properties)-1;$i++){
                        if (!is_array($data_properties[$i])){
                            $properties[$data_properties[$i]] = [];
                            for ($j=$i+1;$j<=count($data_properties)-2;$j+=2){
                                if (!is_array($data_properties[$j])){
                                    break;
                                }
                                $properties[$data_properties[$i]] += [$data_properties[$j][0] => $data_properties[$j+1][0]];
                            }
                        }
                    }
                    $property = Property::firstOrCreate([
                        'product_id' => $product->id,
                        'properties_json' => json_encode($properties, JSON_UNESCAPED_UNICODE),
                    ]);
                    $category->properties()->attach($property);
                }
            }
        });
    }


    public function update($data, $product)
    {
        $data_thumb_img = [];
        $translation = new TranslationIntoLatin();

        $data_properties = [];
        if (isset($data['properties'])){
            $data_properties = $data['properties'];
        }
        DB::transaction(function() use ($data, $data_thumb_img, $product, $data_properties, $translation) {

            for ($i=1; $i<=4; $i++){
                if (isset($data['path_'.$i])){
                    $data['path_'.$i] = 'storage'.substr($data['path_'.$i], 6);
                    $data_thumb_img[$i] = $data['path_'.$i];
                    unset($data['path_'.$i]);
                }
            }
            if (isset($data['image'])){
                $data['image'] = 'storage'.substr($data['image'], 6);
            }

            if (isset($data['options'])){

                $options_json = json_encode($data['options'], JSON_UNESCAPED_UNICODE);
                for ($i=0;$i<count($data['options']);$i++){
                    if (isset($data['options'][$i]['values']['colors'])){
                        unset($data['options'][$i]['values']['colors']);
                    }
                }
                $variants = [];
                $num = 0;
                foreach ($data['options'][0]['values'] as $opt1){
                    if (count($data['options']) > 1){
                        $i = 1;
                        $options = [
                            $data['options'][0]['name'] => $opt1,
                        ];
                        while ($i !== count($data['options']) - 1){
                            for ($j=0;$j<count($data['options'][$i]['values']);$j++){
                                $options[$data['options'][$i]['name']][] = $data['options'][$i]['values'][$j];
                            }
                            $i++;
                        }
                        $variants_options = [];
                        if (count($options) > 1){
                            $options_opt1 = $options[$data['options'][0]['name']];
                            unset($options[$data['options'][0]['name']]);
                            foreach ($options as $key => $val){
                                if (is_array($val)){
                                    unset($options[$key]);
                                    for ($x=0;$x<count($val);$x++){
                                        if(count($options) > 0){
                                            foreach ($options as $key2 => $val2){
                                                if (is_array($val2)){
                                                    for ($n=0;$n<count($val2);$n++){
                                                        $variants_options[] = [
                                                            $data['options'][0]['name'] => $options_opt1,
                                                            $key => $val[$x],
                                                            $key2 => $val2[$n],
                                                        ];
                                                    }
                                                }
                                            }
                                        }
                                        else{
                                            $variants_options[] = [
                                                $data['options'][0]['name'] => $options_opt1,
                                                $key => $val[$x],
                                            ];
                                        }
                                    }
                                }
                                break;
                            }
                        }
                        for ($k=0;$k<count($data['options'][$i]['values']);$k++){
                            if (empty($variants_options) !== true){
                                for ($l=0;$l<count($variants_options);$l++){
                                    $variants_options[$l][$data['options'][$i]['name']] = $data['options'][$i]['values'][$k];

                                    $name = '';
                                    $variants_options_names = $variants_options[$l];
                                    if (count($variants_options_names) > 2){
                                        foreach (array_reverse($variants_options_names) as $key => $val) {
                                            if (count($variants_options_names) <= 2){
                                                $name = trim($val.' '.$name);
                                                continue;
                                            }
                                            $name = trim('('.$val.')'.' '.$name);
                                            unset($variants_options_names[$key]);
                                        }
                                    }
                                    $variants[$num] = [
                                        'name' => $name,
                                        'product_name' => $data['name'].' '.$name,
                                        'price' => (int)$data['price'] ?? $product->price,
                                        'old_price' => $data['old_price'] ?? $product->old_price,
                                        'description' => $data['description'] ?? $product->description,
                                        'units_in_stock' => $data['units_in_stock'] ?? $product->units_in_stock,
                                        'rating' => $data['rating'] ?? $product->rating,
                                        'options' => $variants_options[$l],
                                        'published' => $data['published'],
                                        'image' => $data['image'] ?? $product->image,
                                        'created_at' => date(now()),
                                        'updated_at' => date(now()),
                                    ];
                                    $num++;
                                }
                            }
                            else{
                                $options[$data['options'][$i]['name']] = $data['options'][$i]['values'][$k];
                                $name = '';
                                foreach ($options as $key => $val) {
                                    $name = trim($name.' '.$val);
                                }
                                $variants[$num] = [
                                    'name' => $name,
                                    'product_name' => $data['name'].' '.$name,
                                    'price' => (int)$data['price'] ?? $product->price,
                                    'old_price' => $data['old_price'] ?? $product->old_price,
                                    'description' => $data['description'] ?? $product->description,
                                    'units_in_stock' => $data['units_in_stock'] ?? $product->units_in_stock,
                                    'rating' => $data['rating'] ?? $product->rating,
                                    'options' => $options,
                                    'published' => $data['published'],
                                    'image' => $data['image'] ?? $product->image,
                                    'created_at' => date(now()),
                                    'updated_at' => date(now()),
                                ];
                                $num++;
                            }

                        }
                    }
                    else{
                        $variants[$num] = [
                            'name' => trim($opt1),
                            'product_name' => $data['name'].' '.trim($opt1),
                            'price' => (int)$data['price'] ?? $product->price,
                            'old_price' => $data['old_price'] ?? $product->old_price,
                            'description' => $data['description'] ?? $product->description,
                            'units_in_stock' => $data['units_in_stock'] ?? $product->units_in_stock,
                            'rating' => $data['rating'] ?? $product->rating,
                            'options' => [
                                $data['options'][0]['name'] => $opt1
                            ],
                            'published' => $data['published'],
                            'image' => $data['image'] ?? $product->image,
                            'created_at' => date(now()),
                            'updated_at' => date(now()),
                        ];
                        $num++;
                    }
                }

                $product->update([
                    'name' => $data['name'] ?? $product->name,
                    'image' => $data['image'] ?? $product->image,
                    'price' => (int)$data['price'] ?? $product->price,
                    'units_in_stock' => $data['units_in_stock'] ?? $product->units_in_stock,
                    'description' => $data['description'] ?? $product->description,
                    'rating' => $data['rating'] ?? $product->rating,
                    'category_id' => $data['category_id'] ?? $product->category_id,
                    'brand_id' => $data['brand_id'] ?? $product->brand_id,
//                    'variants' => json_encode($variants, JSON_UNESCAPED_UNICODE),
                ]);


                $category = Category::where('id', $product->category_id)->first();
                if (isset($product->option)){
                    Option::where('product_id', $product->id)->first()->update([
                        'options_json' => $options_json,
                    ]);
                    $option = Option::where('product_id', $product->id)->first();
//                    $product->option()->update([
//                        'options_json' => $options_json,
//                    ]);
                    $category->options()->sync($product->option->id);
                }
                else {
                    $option = Option::firstOrCreate([
                        'product_id' => $product->id,
                        'options_json' => $options_json,
                    ]);
                    $category->options()->sync($option->id);
                }

                if (isset($product->variants)){
                    $variants_edit = Variant::where('product_id', $product->id)->get();
                    for ($l=0;$l<count($variants_edit);$l++){
                        $variants[$l]['id'] = str($product->id).'00'.str($l+1);
                        $variants[$l]['brand'] = $product->brand->name;
                        $variants[$l]['category'] = $product->category->name;
                        $variants[$l]['slug'] = $variants[$l]['slug'] ?? str($translation->translate($product->slug.' '.$variants[$l]['name']))->slug();
                        $variants[$l]['sku'] = trim(str_replace(" ", "-",strtoupper($translation->translate($product->name.' '.$variants[$l]['id'].' '.$product->category_id.' '.$product->brand_id))));
                        $variants_edit[$l]->update([
                            'variants_json' => json_encode($variants[$l], JSON_UNESCAPED_UNICODE),
                        ]);

                        if (empty($data_thumb_img) !== true){
                            if (count($product->images) !== 0){
                                foreach ($data_thumb_img as $key => $val) {
                                    Image::where('product_id', $product->id)
                                        ->where('position', $key)
                                        ->where('variant_id', $variants[$l]['id'])
                                        ->first()
                                        ->update([
                                            'product_id' => $product->id,
                                            'path' => $val,
                                            'position' => $key,
                                            'variant_id' => $variants[$l]['id'],
                                        ]);
                                }
                            }
                            else{
                                foreach ($data_thumb_img as $key => $val) {
                                    Image::firstOrCreate([
                                        'product_id' => $product->id,
                                        'path' => $val,
                                        'position' => $key,
                                        'variant_id' => $variants[$l]['id'],
                                    ]);
                                }
                            }
                        }
                    }
                }
                else{
                    foreach ($variants as $i => $variant){
                        $variant['id'] = str($product->id).'00'.str($i+1);
                        $variant['brand'] = $product->brand->name;
                        $variant['category'] = $product->category->name;

                        $variant['slug'] = $variant['slug'] ?? str($translation->translate($product->slug.' '.$variant['name']))->slug();
                        $variant['sku'] = trim(str_replace(" ", "-",strtoupper($translation->translate($product->name.' '.$variant['id'].' '.$product->category_id.' '.$product->brand_id))));
                        $product_variants = Variant::firstOrCreate([
                            'product_id' => $product->id,
                            'variants_json' => json_encode($variant, JSON_UNESCAPED_UNICODE),
                        ]);
                        if (empty($data_thumb_img) !== true){
                            for ($i=1; $i<=count($data_thumb_img); $i++){
                                Image::firstOrCreate([
                                    'product_id' => $product->id,
                                    'path' => $data_thumb_img[$i],
                                    'position' => $i,
                                    'variant_id' => $variant['id'],
                                ]);
                            }
                        }
                        $category->variants()->sync($product_variants->id);
                    }
                }
            }
            else{
                $product->update([
                    'name' => $data['name'] ?? $product->name,
                    'image' => $data['image'] ?? $product->image,
                    'price' => (int)$data['price'] ?? $product->price,
                    'old_price' => $data['old_price'] ?? $product->old_price,
                    'units_in_stock' => $data['units_in_stock'] ?? $product->units_in_stock,
                    'description' => $data['description'] ?? $product->description,
                    'rating' => $data['rating'] ?? $product->rating,
                    'category_id' => $data['category_id'] ?? $product->category_id,
                    'brand_id' => $data['brand_id'] ?? $product->brand_id,
//                    'variants' => null,
                ]);


                if (isset($product->option)){
                    Option::where('id', $product->option->id)->delete();
                    if (count($product->images) !== 0){
                        Image::where('product_id', $product->id)->delete();
                        if (empty($data_thumb_img) !== true){
                            foreach ($data_thumb_img as $key => $val) {
                                Image::firstOrCreate([
                                    'product_id' => $product->id,
                                    'path' => $val,
                                    'position' => $key
                                ]);
                            }
                        }
                    }
                    else{
                        if (empty($data_thumb_img) !== true){
                            foreach ($data_thumb_img as $key => $val) {
                                Image::firstOrCreate([
                                    'product_id' => $product->id,
                                    'path' => $val,
                                    'position' => $key
                                ]);
                            }
                        }
                    }
                }
                else{
                    if (count($product->images) !== 0){
                        if (empty($data_thumb_img) !== true){
                            foreach ($data_thumb_img as $key => $val) {
                                Image::where('product_id', $product->id)
                                    ->where('position', $key)
                                    ->update([
                                        'product_id' => $product->id,
                                        'path' => $val,
                                        'position' => $key,
                                    ]);
                            }
                        }
                    }
                    else{
                        if (empty($data_thumb_img) !== true){
                            foreach ($data_thumb_img as $key => $val) {
                                Image::firstOrCreate([
                                    'product_id' => $product->id,
                                    'path' => $val,
                                    'position' => $key
                                ]);
                            }
                        }
                    }
                }
            }

            $category = Category::where('id', $product->category_id)->first();

            if (isset($data['tags_id'])){
                $tags = $data['tags_id'];
                $product->tags()->sync($tags);
            }
            if (empty($data_properties) !== true){
                $data_properties = $data['properties'];
                $properties = [];
                for ($i=0;$i<count($data_properties)-1;$i++){
                    if (!is_array($data_properties[$i])){
                        $properties[$data_properties[$i]] = [];
                        for ($j=$i+1;$j<=count($data_properties)-2;$j+=2){
                            if (!is_array($data_properties[$j])){
                                break;
                            }
                            $properties[$data_properties[$i]] += [$data_properties[$j][0] => $data_properties[$j+1][0]];
                        }
                    }
                }
//                for ($i=0;$i<=count($data_properties)-2;$i+=2){
//                    $properties[$data_properties[$i]] = $data_properties[$i+1];
//                }
                $properties_json = json_encode($properties, JSON_UNESCAPED_UNICODE);
                if ($product->property !== null){
                    $property = $product->property;
                    $property->update([
                        'properties_json' => $properties_json,
                    ]);
                    $category->properties()->sync($property->id);
                }
                else{
                    $property = Property::firstOrCreate([
                        'product_id' => $product->id,
                        'properties_json' => $properties_json,
                    ]);
                    $category->properties()->sync($property->id);
                }
            }
        });
    }

    public function variant_update($data, $product, $variant_slug)
    {
        $translation = new TranslationIntoLatin();

        $data_thumb_img = [];
        $data_properties = [];
        if (isset($data['properties'])){
            $data_properties = $data['properties'];
        }
        DB::transaction(function() use ($data, $data_thumb_img, $variant_slug, $product, $data_properties, $translation) {
            for ($i=1; $i<=4; $i++){
                if (isset($data['path_'.$i])){
                    $data['path_'.$i] = 'storage'.substr($data['path_'.$i], 6);
                    $data_thumb_img[$i] = $data['path_'.$i];
                    unset($data['path_'.$i]);
                }
                else{
                    $data_thumb_img[$i] = '';
                }
            }

            if (isset($data['image'])){
                $data['image'] = 'storage'.substr($data['image'], 6);
            }
            $variants = [];

            if (isset($product->variants)){
                foreach ($product->variants as $i => $product_variant){
                    if (json_decode($product_variant->variants_json, true)['slug'] === $variant_slug){
//                        $variant = $product_variant;
                        $variant = [
                            'name' => json_decode($product_variant->variants_json, true)['name'],
                            'product_name' => $data['name'] ?? json_decode($product_variant->variants_json, true)['product_name'],
                            'price' => $data['price'] ?? json_decode($product_variant->variants_json, true)['price'],
                            'old_price' => $data['old_price'] ?? json_decode($product_variant->variants_json, true)['old_price'],
                            'description' => $data['description'] ?? json_decode($product_variant->variants_json, true)['description'],
                            'units_in_stock' => $data['units_in_stock'] ?? json_decode($product_variant->variants_json, true)['units_in_stock'],
                            'rating' => $data['rating'] ?? json_decode($product_variant->variants_json, true)['rating'],
                            'options' => json_decode($product_variant->variants_json, true)['options'],
                            'published' => $data['published'],
                            'image' => $data['image'] ?? json_decode($product_variant->variants_json, true)['image'],
                            'id' => json_decode($product_variant->variants_json, true)['id'],
                            'created_at' => json_decode($product_variant->variants_json, true)['created_at'] ?? date(now()),
                            'updated_at' => date(now()),
                        ];
//                        dump($product_variant->variants_json);
//                        $variant['id'] = json_decode($product_variant->variants_json, true)['id'];
                        $variant['brand'] = json_decode($product_variant->variants_json, true)['brand'];
                        $variant['category'] = json_decode($product_variant->variants_json, true)['category'];
                        $variant['slug'] = $variant['slug'] ?? str($translation->translate($product->slug.' '.$variant['name']))->slug();
                        $variant['sku'] = trim(str_replace(" ", "-",strtoupper($translation->translate($product->name.' '.$variant['id'].' '.$product->category_id.' '.$product->brand_id))));
//                        dd($variant);
                        Variant::find($product_variant->id)->update([
                            'variants_json' => json_encode($variant, JSON_UNESCAPED_UNICODE),
                        ]);

                        if (empty($data_thumb_img) !== true){
                            if (count($product->images) !== 0){
                                foreach ($data_thumb_img as $key => $val) {
                                        $img = Image::where('product_id', $product->id)
                                            ->where('position', $key)
                                            ->where('variant_id', $variant['id'])
                                            ->first();
                                        if ($img !== null){
                                            $img->update([
                                                    'product_id' => $product->id,
                                                    'path' => $val,
                                                    'position' => $key,
                                                    'variant_id' => $variant['id'],
                                                ]);
                                        }
                                        else{
                                            Image::firstOrCreate([
                                                'product_id' => $product->id,
                                                'path' => $val,
                                                'position' => $key,
                                                'variant_id' => $variant['id'],
                                            ]);
                                        }

                                }
                            }
                            else{
                                foreach ($data_thumb_img as $key => $val) {
                                    Image::firstOrCreate([
                                        'product_id' => $product->id,
                                        'path' => $val,
                                        'position' => $key,
                                        'variant_id' => $variant['id'],
                                    ]);

                                }
                            }
                        }
                    }
                }

            }

        });
    }
}
<?php

namespace App\Services\Brand;


use App\Models\Brand;


class Service
{
    public function store($data)
    {
        $data['image'] = 'storage'.substr($data['image'], 6);
        if(isset($data['categories_id'])){
            $categories = $data['categories_id'];
            unset($data['categories_id']);
            $brand = Brand::firstOrCreate($data);
            $brand->categories()->attach($categories);
        }
        else{
            Brand::firstOrCreate($data);
        }
    }

    public function update($data, $brand)
    {
        if (isset($data['image'])){
            $data['image'] = 'storage'.substr($data['image'], 6);
        }
        $brand->update([
            'name' => $data['name'] ?? $brand->name,
            'image' => $data['image'] ?? $brand->image,
        ]);

        if (isset($data['categories_id'])){
            $categories = $data['categories_id'];
            unset($data['categories_id']);
            $brand->categories()->sync($categories);
        }
//        if (isset($data['first_name'])){
//            DB::table('users')
//                ->where('users.profile_id', $profile->id)
//                ->update($data['first_name']);
//        }
//
//        if (isset($data['email'])){
//            DB::table('users')
//                ->where('users.profile_id', $profile->id)
//                ->update($data['email']);
//        }
//        unset($data['first_name']);
//        unset($data['email']);
//
//
//        DB::table('profiles')
//            ->where('profiles.id', $profile->id)
//            ->update([
//                'middle_name' => $data['middle_name'] ?? $profile->middle_name,
//                'last_name' => $data['last_name'] ?? $profile->last_name,
//                'phone' => $data['phone'] ?? $profile->phone,
//                'address' => $data['address'] ?? $profile->address,
//            ]);

//        if (isset($data['discount'])){
//            $product->update([
//                'discount' => true,
//            ]);
//            unset($data['discount']);
//        }
//        else{
//            $product->update([
//                'discount' => false,
//            ]);
//        }
//
//        if (isset($data['tags_id'])){
//            $tags = $data['tags_id'];
//            unset($data['tags_id']);
//            $product->tags()->sync($tags);
//        }
//
//        $product->update($data);
//

    }

}
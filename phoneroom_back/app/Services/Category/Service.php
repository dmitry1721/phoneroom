<?php

namespace App\Services\Category;


use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function store($data)
    {
        if (isset($data['image'])){
            $data['image'] = 'storage'.substr($data['image'], 6);
        }
        if (isset($data['brands_id'])){
            $brands = $data['brands_id'];
            unset($data['brands_id']);
            $categoty = Category::firstOrCreate($data);
            $categoty->brands()->attach($brands);
        }
        else{
            Category::firstOrCreate($data);
        }

    }

    public function update($data, $category)
    {
        if (isset($data['image'])){
            $data['image'] = 'storage'.substr($data['image'], 6);
        }
        $category->update([
            'name' => $data['name'] ?? $category->name,
            'image' => $data['image'] ?? $category->image,
            'parent_id' => $data['parent_id'] ?? $category->parent_id
        ]);

        if (isset($data['brands_id'])){
            $brands = $data['brands_id'];
            unset($data['brands_id']);
            $category->brands()->sync($brands);
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
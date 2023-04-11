<?php

namespace App\Services\Tag;


use App\Models\Brand;
use App\Models\Tag;


class Service
{
    public function store($data)
    {
        $data['image'] = 'storage'.substr($data['image'], 6);
        if(isset($data['products_id'])){
            $products = $data['products_id'];
            unset($data['products_id']);
            $tag = Tag::firstOrCreate($data);
            $tag->products()->attach($products);
        }
        else{
            Tag::firstOrCreate($data);
        }
    }

    public function update($data, $tag)
    {
        if (isset($data['image'])){
            $data['image'] = 'storage'.substr($data['image'], 6);
        }
        $tag->update([
            'name' => $data['name'] ?? $tag->name,
            'image' => $data['image'] ?? $tag->image,
        ]);

        if (isset($data['products_id'])){
            $products = $data['products_id'];
            unset($data['products_id']);
            $tag->products()->sync($products);
        }

    }

}
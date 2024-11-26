<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService extends BaseService
{
    public function create(array $data)
    {
        $product = new Product();
        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->price = (int) $data["price"];
        $product->stock = (int) $data["stock"];
        $product->tags = $data["tags"] ?? [];
        $product->status = (int) $data["status"] ?? Product::STATUS_DEFAULT;
        $product->images = $this->handleImages($data["images"]);
        $product->save();

        if (!$product) {
            return false;
        }

        return true;
    }

    public function update(array $data, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return false;
        }

        $product->name = $data["name"] ?? $product->name;
        $product->description = $data["description"] ?? $product->description;
        $product->price = (int) $data["price"] ?? $product->price;
        $product->stock = (int) $data["stock"] ?? $product->stock;
        $product->tags = $data["tags"] ?? $product->tags;
        $product->status = (int) $data["status"] ?? $product->status;

        $product->save();

        return true;
    }

    public function handleImages(array $images)
    {
        $timestamp = time();

        $urls = array_map(function ($image) use ($timestamp) {
            $uniqueName = $timestamp . '_' . Str::random(8) . '_' . $image->getClientOriginalName();
            $image->move(public_path("uploads"), $uniqueName);
            return asset('uploads/' . $uniqueName);
        }, $images);

        return $urls;
    }
}
<?php

namespace App\Repositories;

use App\Models\Product;

class CartRepository
{
    public function add(Product $product): int
    {
        \Cart::session(auth()->user()->id)
            ->add([
                'id' => uniqid(),
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [],
                'associatedModel' => $product
            ]);

        return $this->count();
    }

    public function count(): int
    {
        return \Cart::session(auth()->user()->id)
            ->getContent()
            ->count();
    }
}
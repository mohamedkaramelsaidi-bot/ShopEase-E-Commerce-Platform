<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_created_viewed_updated_and_deleted(): void
    {
        Storage::fake('public');
        $category = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic products',
        ]);
        $image = UploadedFile::fake()->createWithContent(
            'product.gif',
            base64_decode('R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=')
        );

        $this->post(route('products.store'), [
            'categrory_id' => $category->id,
            'name' => 'Headphones',
            'description' => 'Wireless headphones',
            'price' => 49.99,
            'stock' => 5,
            'image' => $image,
        ])->assertRedirect(route('products.index'));

        $product = product::firstOrFail();
        $imagePath = $product->image;
        Storage::disk('public')->assertExists($imagePath);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'categrory_id' => $category->id,
            'name' => 'Headphones',
        ]);

        $this->get(route('products.index'))->assertOk()->assertSee('Headphones');
        $this->get(route('products.show', $product))->assertOk()->assertSee('Headphones');
        $this->get(route('products.edit', $product))->assertOk()->assertSee('Electronics');

        $this->put(route('products.update', $product), [
            'categrory_id' => $category->id,
            'name' => 'Updated headphones',
            'description' => 'Updated description',
            'price' => 59.99,
            'stock' => 3,
        ])->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated headphones',
            'image' => $imagePath,
        ]);
        Storage::disk('public')->assertExists($imagePath);

        $replacementImage = UploadedFile::fake()->createWithContent(
            'replacement.gif',
            base64_decode('R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=')
        );
        $this->put(route('products.update', $product), [
            'categrory_id' => $category->id,
            'name' => 'Updated headphones',
            'description' => 'Updated description',
            'price' => 59.99,
            'stock' => 3,
            'image' => $replacementImage,
        ])->assertRedirect(route('products.index'));

        $replacementPath = $product->fresh()->image;
        $this->assertNotSame($imagePath, $replacementPath);
        Storage::disk('public')->assertMissing($imagePath);
        Storage::disk('public')->assertExists($replacementPath);

        $this->delete(route('products.destroy', $product))->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing($replacementPath);
    }
}

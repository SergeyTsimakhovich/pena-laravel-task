<?php

namespace App\Repositories\Product;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductRepository
 * @package App\Contracts\Repositories\Product
 */
class ProductRepository implements ProductRepositoryContract
{

    /**
     * @return Builder
     */
    private function getBuilder(): Builder
    {
        return Product::query();
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return $this->getBuilder()->get();
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getById(int $id): Model|Collection|Builder|array|null
    {
        return $this->getBuilder()->find($id);
    }

    /**
     * @param array $data
     * @return Builder|Model|Product
     */
    public function create(array $data)
    {
        return $this->getBuilder()->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return void
     */
    public function updateById(int $id, array $data): void
    {
        $this->getBuilder()
            ->where('id', $id)
            ->update($data);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->getBuilder()
            ->where('id', $id)
            ->delete();
    }
}

<?php

namespace App\Services\Product;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Contracts\Services\ProductServiceContract;
use App\Jobs\SendEmailProductCreatedNotification;
use App\Notifications\ProductCreateNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ProductService
 * @package App\Services\Product
 */
class ProductService implements ProductServiceContract
{

    protected ProductRepositoryContract $productRepository;

    public function __construct(ProductRepositoryContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll(): Collection|array
    {
        return $this->productRepository->getAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        return $this->productRepository->getById($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $product = $this->productRepository->create($data);

        dispatch(new SendEmailProductCreatedNotification($product));

        return $product;
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data): void
    {
        $this->productRepository->updateById($id, $data);
    }

    /**
     * @param int $id
     */
    public function deleteById(int $id): void
    {
        $this->productRepository->deleteById($id);
    }
}

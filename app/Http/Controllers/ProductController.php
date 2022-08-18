<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ProductServiceContract;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductServiceContract $productService;

    public function __construct(ProductServiceContract $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pages.product.index', [
            'products' => (new ProductCollection($this->productService->getAll()))
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * @param ProductCreateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $this->productService->create($request->all());

        return redirect()->route('products.list');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        return view('pages.product.show', [
            'product' => (new ProductResource($this->productService->getById($id)))
        ]);
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('pages.product.edit', [
            'product' => (new ProductResource($this->productService->getById($id)))
        ]);
    }

    /**
     * @param ProductUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, int $id)
    {
        $this->productService->updateById($id, $request->except('_method', '_token'));

        return redirect()->route('products.list');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->productService->deleteById($request->get('id'));

        return redirect()->route('products.list');
    }
}

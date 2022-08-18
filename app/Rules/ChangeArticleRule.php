<?php

namespace App\Rules;

use App\Models\Product;
use App\Models\Role;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ChangeArticleRule implements Rule
{
    protected Product $product;

    protected Role $userRole;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->userRole = Auth::user()->role;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->product->article === $value || $this->userRole->id == config('products.role')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $role = $this->userRole->name;

        return "Для роли {$role} редактирование Артикула недоступно";
    }
}

<?php

declare(strict_types=1);

namespace Shopper\Api\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use Shopper\Api\Concerns\NormalizesCartInput;

final class CreateCartRequest extends FormRequest
{
    use NormalizesCartInput;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'currency_code' => ['nullable', 'string', $this->currencyExistsRule()],
            'email' => ['nullable', 'email', 'max:255'],
            'metadata' => ['nullable', ...$this->metadataRules()],
        ];
    }
}

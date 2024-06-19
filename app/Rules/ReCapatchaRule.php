<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCapatchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post(config('services.google_recaptcha.url'), [
            'secret' => config('services.google_recaptcha.secret_key'),
            'response' => $value,
        ])->json();

        if ($response['success'] === true && $response['score'] > 0.5) {
            return;
        }

        $fail('Algo salió mal con el reCaptcha');
    }
}

# Laravel License Guard Package

## Installation

1. Place this package inside your Laravel project:

```
your-laravel-project/
└── packages/
    └── ekram/
        └── license-guard/
```

2. Add to your root `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "./packages/ekram/license-guard"
    }
]
```

3. Run:

```bash
composer require ekram/license-guard
```

4. Add `.env` keys:

```
LICENSE_KEY=YOUR_LICENSE_KEY
LICENSE_API_URL=https://your-license-api.com/api/verify
```

5. Use middleware in your routes:

```php
Route::middleware(['license.guard'])->group(function () {
    // Your protected routes
});
```

6. Use blade directive in views:

```blade
@canUse
    <!-- Protected content -->
@endcanUse
```

7. Run license check command:

```bash
php artisan license:check
```

---

## License Verification API

Your API should accept POST request with:

- license_key
- domain
- ip

and respond with:

```json
{
    "status": "valid" // or "invalid"
}
```

---

## License

MIT

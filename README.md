# Perfecta Regen — E-Commerce

Premium single-product Laravel storefront for Perfecta Regen Collagen Peptides.

## Requirements

- PHP 8.2+
- Composer
- MySQL
- Node.js 18+ (for building assets locally)

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install && npm run build
php artisan serve
```

**Admin login:** `/admin/login`  
Default admin (after seed): `admin@perfectaregen.com` / `Perfecta@2026`

## Production deployment

1. Clone the repository on your server
2. Copy environment file and set your domain:

```bash
cp .env.example .env
# Edit .env — set APP_URL, DB_* credentials, APP_KEY (or run php artisan key:generate)
```

3. Install and deploy:

```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

4. Point your web server document root to the `public/` folder.

5. Ensure `storage/` and `bootstrap/cache/` are writable.

Built frontend assets are included in `public/build/`. Re-run `npm run build` after CSS/JS changes.

## Database

- Database name: `perfectadb`
- Tables: products, orders, order_items, customers, users

Developed by **olexto Digital Solutions**

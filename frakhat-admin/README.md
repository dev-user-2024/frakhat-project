For run locally please flow these three steps

Step 1:
```
git clone https://github.com/dev-user-2024/frakhat-project.git
```
Step 2:
```
cd frakhat-admin

composer update
```

Step 3:
```
php artisan migrate --path=/modules/Language/Database/Migrations &&
php artisan migrate --path=/modules/Category/Database/Migrations && php artisan migrate --seed &&
php artisan migrate --path=/modules/Tag/Database/Migrations &&
php artisan migrate --path=/modules/Post/Database/Migrations  &&
php artisan migrate --path=/modules/Image/Database/Migrations &&
php artisan migrate --path=/modules/Video/Database/Migrations  &&
php artisan migrate --path=/modules/Comment/Database/Migrations  &&
php artisan migrate --path=/modules/CategoryUser/Database/Migrations  &&
php artisan migrate --path=/modules/UserDetail/Database/Migrations  &&
php artisan migrate --path=/modules/Like/Database/Migrations  &&
php artisan migrate --path=/modules/View/Database/Migrations  &&
php artisan migrate --path=/modules/TeachingRequest/Database/Migrations &&
php artisan migrate --path=/modules/Discount/Database/Migrations &&
php artisan migrate --path=/modules/Banner/Database/Migrations  &&
php artisan migrate --path=/modules/CartItem/Database/Migrations &&
php artisan migrate --path=/modules/Menu/Database/Migrations &&
php artisan migrate --path=/modules/Contact/Database/Migrations &&
php artisan migrate --path=/modules/AdBanner/Database/Migrations &&
php artisan migrate --path=/modules/Job/Database/Migrations



```

Step 4:
```
php artisan serve
```


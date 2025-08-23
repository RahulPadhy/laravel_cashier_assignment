
# Laravel Cashier Assignment

This is a sample Laravel project using **Laravel Cashier (Stripe)** to display products, process payments, and manage orders.

---

## Features

- List products in a grid view
- Product detail page with Stripe credit card form
- Pay via Stripe (test mode)
- View orders and payment receipts
- Fully responsive design (mobile, tablet, desktop)

---

## Setup Instructions

### 1. Clone the Repository
- git clone https://github.com/RahulPadhy/laravel_cashier_assignment.git
- cd laravel_cashier_assignment

### 2. Install Dependencies
- composer install

### 3. Environment Setup
1. Copy .env.example to .env:
    - cp .env.example .env

2. Update .env with your database and Stripe credentials:
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=your_db_name
    - DB_USERNAME=your_db_user
    - DB_PASSWORD=your_db_password

    - STRIPE_KEY=pk_test_XXXX
    - STRIPE_SECRET=sk_test_XXXX

### 4. Generate App Key
php artisan key:generate

### 5. Run Migrations & Seed Products
php artisan migrate, 
php artisan db:seed
> This will create the products table and insert 20 sample products.

### 6. Run the Project
php artisan serve
> The app will run at http://127.0.0.1:8000

### 7. Test Stripe Payments
- Click Buy Now on any product.
- Use Stripe test cards:
  - Successful payment: 4242 4242 4242 4242
  - Expiry: Any future date
  - CVC: Any 3 digits
  - ZIP: Any 5 digits

### 8. View Orders
- Orders page: /orders
- Click View to see payment receipt

### 9. Optional
- Customize products via the products table
- Replace Stripe keys with your own for live/test payments

---

## Notes

- Laravel 5.7+ compatible
- Uses Laravel Cashier (Stripe)
- Responsive layout for mobile, tablet, and desktop

---


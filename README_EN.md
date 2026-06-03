# 🔮 Chuoi Ngoc Website – Feng Shui Jewelry E-commerce

<div align="center">

**E-commerce website specializing in feng shui gemstone bracelets, necklaces, and jewelry.**
Modern design · Professional management · Smooth experience

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB_10.4-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</div>

---

## 📋 Table of Contents

- [Introduction](#-introduction)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Architecture](#-project-architecture)
- [Directory Structure](#-directory-structure)
- [Installation & Setup](#-installation--setup)
- [Environment Configuration](#-environment-configuration)
- [Development Progress](#-development-progress)
- [Demo Accounts](#-demo-accounts)
- [Contributing](#-contributing)

---

## 🌟 Introduction

**Chuoi Ngoc** is a full-stack e-commerce project built with **Vanilla PHP** using a **Custom MVC pattern** (without any frameworks). The project aims to provide a professional online shopping experience for feng shui jewelry products such as gemstone bracelets, necklaces, and rings, featuring consulting functionality based on the **five elements of destiny (Wu Xing)**.

The project consists of **2 main modules**:

| Module | Description |
| ------------------------------ | -------------------------------------------------------------------------------------------------------------------------- |
| 🛍️ **User Interface (Frontend)** | Home, product catalog, product details, shopping cart, checkout, promotions, blog, contact, user account |
| ⚙️ **Admin Panel (Backend)**  | Dashboard, product management, orders, customers, personnel, inventory, promotions, vouchers, blog, notifications, reports... |

---

## ✨ Features

### 🛍️ User Interface (Frontend)

- **Modern Homepage** with banner slider, best-selling products, featured categories, and five elements filter.
- **Product Catalog** with multi-criteria filtering (category, gemstone type, destiny element, price range), flexible sorting, and pagination.
- **Detailed Product Page**: Image gallery, variants (size/color), reviews, applicable vouchers, related products, and recently viewed products.
- **Promotions Page**: Countdown flash sales, voucher list based on membership tiers, discounted products, gift combos, freeship offers, and exclusive privileges for 4 membership tiers (Bronze → Silver → Gold → Diamond).
- **Save Vouchers** directly to account via AJAX from any page.
- **Smooth Cart & Checkout** process.
- **Order Tracking** and personal account management.
- **Blog** featuring feng shui knowledge.
- **Consulting Tool** to suggest jewelry based on the user's destiny element.
- **Register / Login** for customer accounts.
- **Responsive Design** – fully compatible with all devices.

### ⚙️ Admin Panel (Backend)

- **Dashboard** showing general statistics: revenue, orders, new customers, and charts.
- **Product Management** – full CRUD, variants, multiple images, feng shui elements, soft delete.
- **Category Management** – product classification.
- **Gemstone & Destiny Element Management** – system master data.
- **Order Management** – track statuses, view details, create new orders.
- **Customer Management** – information, membership tiers, purchase history.
- **Personnel Management** – manage staff accounts and roles.
- **Inventory Management** including:
  - Goods Receipt / Issue / Transfer
  - Inventory checking
  - Warehouse & location configuration
  - Real-time stock tracking
- **Supplier Management**.
- **Promotions & Vouchers Management** – promotional campaigns, discount codes, application scope by product/category/customer tier.
- **Blog Management** – CMS for feng shui articles.
- **Banner Management** – homepage image slider.
- **Policy Management** – returns, warranties, shipping policies...
- **Payment & Shipping Management** – payment methods, shipping options, freeship rules.
- **Notification System** – send notifications to customers.
- **Activity Log** – track admin behaviors.
- **Reports** – revenue over time, best-selling products, Chart.js visualizations.

---

## 🛠️ Tech Stack

| Component | Technology |
| -------------------- | ------------------------------------------------------------------------------------------------------ |
| **Backend**          | Vanilla PHP 8.0+ (No frameworks) |
| **Database**         | MySQL / MariaDB 10.4+ (PDO, Prepared Statements) |
| **Frontend (User)**  | HTML5, TailwindCSS v4 (built via CLI), Vanilla JavaScript |
| **Frontend (Admin)** | HTML5, TailwindCSS v4 (CDN), Vanilla JavaScript |
| **CSS Build Tool**   | `@tailwindcss/cli` v4.3 |
| **JS Libraries**      | Swiper.js (sliders), Chart.js (charts), AOS (animations), SweetAlert2 (toasts), Iconify (icons) |
| **Email**            | Raw SMTP Socket (custom MailHelper, without PHPMailer) |
| **Web Server**       | Apache (XAMPP) with `mod_rewrite` |

---

## 🏗️ Project Architecture

The project follows a **Custom MVC** architecture:

```
Request → .htaccess → public/index.php → Router → Controller → Service → Model → Database
                                                       ↓
                                                      View (Layout + Page + Components)
```

| Layer | Directory | Role |
| -------------- | ------------------ | ---------------------------------------------------------------- |
| **Router**     | `routes/`          | Defines routes using regex, mapping URL → Controller@action |
| **Controller** | `app/Controllers/` | Receives requests, validates inputs, calls Services, returns View/JSON |
| **Service**    | `app/Services/`    | Handles business logic |
| **Model**      | `app/Models/`      | Interacts with the Database via a PDO Singleton |
| **View**       | `views/`           | UI: layouts, pages, components, emails |
| **Core**       | `app/Core/`        | Base Router & Controller, Database singleton, Helpers, MailHelper |
| **Constants**  | `app/Constants/`   | Constants: order statuses, membership tiers, product constants... |

### Important Conventions:

- All **Primary Keys** use **UUID** (`varchar(36)`), generated via PHP.
- The `nguoi_dung` table is shared for Admin/Staff and Customers (distinguished by `id_vai_tro`).
- **Prepared Statements** are used for 100% of SQL queries to prevent SQL Injection.
- Namespaces follow the **PSR-4** standard with an automatic autoloader.

---

## 📂 Directory Structure

```
shopbanhangchuoingoc/
├── app/
│   ├── Constants/          # System constants (statuses, roles...)
│   ├── Controllers/
│   │   ├── Admin/          # 29 admin controllers
│   │   └── User/           # 11 user controllers
│   ├── Core/
│   │   ├── Controller.php  # Base controller
│   │   ├── Database.php    # PDO Singleton
│   │   ├── Helpers.php     # Utility functions (loadEnv, component...)
│   │   ├── MailHelper.php  # Send email via raw SMTP
│   │   └── Router.php      # Routing engine
│   ├── Models/
│   │   └── Admin/          # 37 models (shared for Admin & User)
│   └── Services/
│       ├── Admin/          # 16 admin business services
│       ├── User/           # 3 user business services
│       ├── MailService.php
│       └── NotificationService.php
├── config/
│   └── constants.php       # APP_NAME, APP_URL, timezone, privileges
├── databases/
│   ├── shop_chuoi_ngoc-export.sql  # ⭐ Full SQL file (schema + data)
│   ├── shop_chuoi_ngoc.sql         # Original schema (structure only)
│   ├── data/                       # Seed data
│   └── migrations/                 # Migration files
├── public/                 # Document root (entry point)
│   ├── index.php           # ⭐ Main entry point
│   ├── .htaccess           # Rewrite rules
│   ├── css/                # Tailwind output (style.css)
│   ├── js/                 # JavaScript files
│   ├── images/             # Static images
│   └── uploads/            # Files uploaded from admin
├── routes/
│   ├── web.php             # User routes
│   └── admin.php           # Admin routes
├── views/
│   ├── layouts/            # 3 layouts: main, admin, auth
│   ├── pages/              # 76 pages (admin + user)
│   ├── components/
│   │   ├── Admin/          # 29 admin component directories
│   │   ├── User/           # 14 user component directories
│   │   └── common/         # Shared components
│   └── emails/             # Email templates
├── .env                    # Environment variables (not committed)
├── .env.example            # Sample environment variables
├── package.json            # TailwindCSS CLI config
└── README_EN.md            # This file
```

---

## 🚀 Installation & Setup

### System Requirements

| Software | Minimum Version |
| --------------------------------------- | ------------------------------------------- |
| [XAMPP](https://www.apachefriends.org/) | 8.0+ (includes Apache + MySQL/MariaDB + PHP) |
| [Node.js](https://nodejs.org/)          | 18+ (to build TailwindCSS)                  |
| [Git](https://git-scm.com/)             | Any                                      |

### Installation Steps

#### 1️⃣ Clone the project

```bash
cd C:\xampp\htdocs
git clone https://github.com/ThanhHai15112004/Website_chuoi_ngoc.git shopbanhangchuoingoc
cd shopbanhangchuoingoc
```

#### 2️⃣ Create Database and Import Data

1. Open **XAMPP Control Panel** → Start **Apache** and **MySQL**.
2. Go to **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Create a new database:
   - Click **"New"** on the left sidebar.
   - Set database name: `shop_chuoi_ngoc`
   - Select **Collation**: `utf8mb4_unicode_ci`
   - Click **"Create"**.
4. Import data:
   - Select the `shop_chuoi_ngoc` database you just created.
   - Click the **"Import"** tab.
   - Click **"Choose File"** → Select file: `databases/shop_chuoi_ngoc-export.sql`.
   - Ensure the **Character set** is `utf-8`.
   - Click **"Go"** to import.

> ⚠️ **Note:** The `shop_chuoi_ngoc-export.sql` file (~1MB) contains **the complete table structure and sample data** (products, categories, articles, vouchers, customers...). You only need to import this file.

> ⚠️ **If your MySQL runs on a different port than 3306** (e.g., `3307`), please remember it for the next step.

#### 3️⃣ Configure Environment Variables

Create the `.env` file from the example:

```bash
copy .env.example .env
```

Open the `.env` file and fill in your connection details:

```env
# Database
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=shop_chuoi_ngoc
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4

# Email (optional – used for notifications)
EMAIL_HOST=smtp.gmail.com
EMAIL_PORT=587
EMAIL_USER=your_email@gmail.com
EMAIL_PASS=your_app_password
EMAIL_FROM=your_email@gmail.com
```

> 💡 **`DB_PORT`**: The default MySQL port in XAMPP is `3306`. If you changed it (e.g., `3307`), update it accordingly.

> 💡 **Email**: If using Gmail, you need to enable [App Passwords](https://support.google.com/accounts/answer/185833) and use it instead of your normal Gmail password.

#### 4️⃣ Install TailwindCSS (for User Interface)

```bash
npm install
```

Build CSS (first time run):

```bash
npm run build
```

Or run in **watch** mode (auto-rebuild on file changes):

```bash
npm run dev
```

#### 5️⃣ Access the Website

| Page                 | URL                                                                                        |
| --------------------- | ------------------------------------------------------------------------------------------ |
| 🏠 **Homepage**      | [http://localhost/shopbanhangchuoingoc](http://localhost/shopbanhangchuoingoc)             |
| ⚙️ **Admin Panel** | [http://localhost/shopbanhangchuoingoc/admin](http://localhost/shopbanhangchuoingoc/admin) |

> 🎉 **Done!** If you see the homepage displaying normally, everything has been installed successfully.

---

## ⚙️ Environment Configuration

### Environment Variables (`.env`)

| Variable      | Description                    | Default Value      |
| ------------- | ------------------------ | ------------------ |
| `DB_HOST`     | MySQL server address     | `127.0.0.1`        |
| `DB_PORT`     | MySQL port               | `3306` or `3307` |
| `DB_DATABASE` | Database name             | `shop_chuoi_ngoc`  |
| `DB_USERNAME` | MySQL username           | `root`             |
| `DB_PASSWORD` | MySQL password           | _(empty)_          |
| `DB_CHARSET`  | Character set            | `utf8mb4`          |
| `EMAIL_HOST`  | SMTP host                | `smtp.gmail.com`   |
| `EMAIL_PORT`  | SMTP port                | `587`              |
| `EMAIL_USER`  | Sending email             | –                  |
| `EMAIL_PASS`  | App password             | –                  |
| `EMAIL_FROM`  | Display sender name | –                  |

### Apache Configuration

The project uses `.htaccess` to rewrite URLs. Ensure `mod_rewrite` is enabled in your Apache `httpd.conf`:

```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

And `AllowOverride` is set to `All` for the htdocs directory.

---

## 📊 Development Progress

### User Interface (Frontend)

| Module              | Status    | Notes                                                        |
| ------------------- | ------------- | -------------------------------------------------------------- |
| Homepage           | ✅ Completed | Banner, best-sellers, categories, five elements, blog, reviews |
| Product Catalog  | ✅ Completed | Filters, sorting, pagination, grid/list view                   |
| Product Details   | ✅ Completed | Gallery, variants, reviews, vouchers, related items, recently viewed |
| Promotions Page    | ✅ Completed | Flash sale, tier-based vouchers, discounts, membership privileges |
| Shopping Cart      | ✅ Completed | Cart CRUD, quantity updates                               |
| Checkout          | ✅ Completed | Order form, select payment/shipping methods                 |
| Blog / Articles   | ✅ Completed | Article list, details                                   |
| Login / Register | ✅ Completed | Authentication, session handling                               |
| User Account   | ✅ Completed | Information updates, change password                            |
| Order Tracking    | ✅ Completed | View details, status updates                                  |
| Contact             | ✅ Completed | Contact form                                                |
| Feng Shui Bracelets| ✅ Completed | Consult products based on the five elements                    |

### Admin Panel (Backend)

| Module                  | Status    | Notes                                           |
| ----------------------- | ------------- | ------------------------------------------------- |
| Dashboard               | ✅ Completed | Statistics, Chart.js charts                        |
| Product Management      | ✅ Completed | CRUD, variants, multiple images                         |
| Category Management     | ✅ Completed | CRUD                                              |
| Gemstone Management     | ✅ Completed | CRUD                                              |
| Destiny Element Management | ✅ Completed | CRUD                                              |
| Order Management        | ✅ Completed | List, details, create order, update status |
| Customer Management     | ✅ Completed | CRUD, details, membership tiers                   |
| Personnel Management    | ✅ Completed | CRUD staff, assign roles                      |
| Inventory Management    | ✅ Completed | Receipt/issue/transfer/check, config     |
| Supplier Management     | ✅ Completed | CRUD                                              |
| Promotions Management   | ✅ Completed | Campaigns, Flash Sale                       |
| Voucher Management      | ✅ Completed | CRUD, allocate by customer tier                        |
| Blog Management         | ✅ Completed | CMS for articles                                          |
| Banner Management       | ✅ Completed | Image slider                                        |
| Policy Management       | ✅ Completed | Returns, warranties                                 |
| Payment & Shipping      | ✅ Completed | Payment methods, shipping options, freeship rules |
| Notification System     | ✅ Completed | Send notifications to customers                   |
| Activity Log            | ✅ Completed | Log admin actions                                 |
| Revenue Reports         | ✅ Completed | Time-based charts                            |
| Product Reports         | ✅ Completed | Best-sellers, inventory reports                   |
| Account Management      | ✅ Completed | Admin accounts, roles                           |
| Membership Tiers        | ✅ Completed | 4 tiers: Bronze, Silver, Gold, Diamond            |
| Reviews & Comments      | ✅ Completed | Moderate, reply                                   |

---

## 🔑 Demo Accounts

\*\*\*Admin account:
Email: admin@chuoingocshop.com
Password: admin1234

> ⚠️ Default accounts are available in the sample data. Please check the `nguoi_dung` table in the database after importing.

| Role        | Notes                               |
| -------------- | ------------------------------------- |
| **Admin**      | Account where `id_vai_tro IS NOT NULL` |
| **Customer**   | Account where `id_vai_tro IS NULL`     |

---

## 🤝 Contributing

1. Fork the project
2. Create a new branch (`git checkout -b feature/new-feature`)
3. Commit changes (`git commit -m 'Add new feature XYZ'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Open a Pull Request

---

## 📝 Technical Notes

- **Entry Point**: All requests go through `public/index.php` using `.htaccess`.
- **Autoloading**: Utilizes `spl_autoload_register()` following PSR-4 standards.
- **Session**: Login sessions are managed via PHP Session.
- **TailwindCSS v4**:
  - User Pages: Built via CLI (`npm run dev/build`) → output at `public/css/style.css`.
  - Admin Pages: Loaded directly via CDN (`cdn.tailwindcss.com`).
- **Database**: Uses a PDO Singleton (`App\Core\Database::getInstance()`) with Prepared Statements for every query.
- **UUID**: All primary keys use UUID `varchar(36)`, automatically generated by PHP.

---

<div align="center">

**Developed with ❤️ by [ThanhHai15112004](https://github.com/ThanhHai15112004)**

</div>

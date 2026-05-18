---
description: Quy tắc phát triển dự án E-commerce Trang sức phong thủy bằng PHP MVC (Thuần/Không Framework). Yêu cầu tuân thủ nghiêm ngặt cấu trúc thư mục, routing tập trung và tuyệt đối không hardcode.
---

# Role & Context

You are an expert PHP Backend Developer. You are assisting in building an E-commerce website for Feng Shui jewelry.
The project uses a custom, from-scratch **PHP MVC Architecture (No Frameworks like Laravel or Symfony)**.

# Core Development Rules

## 1. Directory Structure Compliance

You MUST respect and place files strictly into the following structure:

- `config/`: Configuration files and constants.
- `routes/`: Routing definitions (`web.php` for users, `admin.php` for backend).
- `app/Core/`: Base classes (Router, Controller, Database connection).
- `app/Models/`: Database interaction logic.
- `app/Controllers/`: Request handling and business logic (divided into `User/` and `Admin/`).
- `public/`: The only accessible document root (`index.php`, CSS, JS, Images).
- `views/`: UI files, strictly separated into `layouts/`, `components/`, and `pages/`.

## 2. No Hardcoding (Strict Rule)

- **Database & Secrets:** NEVER hardcode database credentials, API keys, or environment-specific variables. Always assume these are loaded from a `.env` file and accessed via a configuration wrapper or `$_ENV`.
- **Magic Numbers/Strings:** NEVER hardcode status codes (e.g., order status 0, 1, 2) or roles. Always use constants defined in `config/constants.php` (e.g., `Order::STATUS_PENDING`).

## 3. Request Lifecycle & Routing

When asked to create a new feature, you must follow this workflow:

1.  **Route:** Define the endpoint in `routes/web.php` or `routes/admin.php`.
2.  **Controller:** Create/Update the Controller in `app/Controllers/` to handle the request.
3.  **Model:** Create/Update the Model in `app/Models/` to fetch or persist data.
4.  **View:** Render the output using the established view system.

## 4. View & UI Handling

- Use the Layout pattern. Do not write full `<html><head>...` tags in every file.
- Pages (`views/pages/`) must only contain the core content of that specific route.
- Reusable UI parts (Product cards, alerts, navbars) must be placed in `views/components/` and included.

## 5. Security & Best Practices

- **SQL Injection:** ALWAYS use Prepared Statements (PDO or MySQLi) for database queries. NEVER concatenate user input directly into SQL strings.
- **XSS:** Always sanitize/escape output when rendering user-generated content in the views (e.g., using `htmlspecialchars()`).
- **Separation of Concerns:** Controllers should not contain complex SQL queries (keep them in Models). Views should not contain complex business logic (keep it in Controllers).

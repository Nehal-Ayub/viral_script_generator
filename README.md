# Viral Script Generator (PHP + MySQL)

A modern, clean, conversion-focused landing website for the **Viral Script Generator** AI tool.

## Stack

- PHP 8+
- MySQL 8+
- Vanilla JavaScript
- CSS (responsive, gradient premium UI)

## Features

- Hero section with topic input and script generation
- How it works, features, examples, testimonials, CTA, and footer
- Script generation via PHP API
- Copy-to-clipboard buttons for generated scripts
- Premium waitlist email signup stored in MySQL
- Smooth reveal animations and modern UI

## Setup

1. Create database and tables:

   ```sql
   SOURCE sql/schema.sql;
   ```

2. Configure environment variables (recommended):

   - `DB_HOST`
   - `DB_PORT`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`

   Or edit defaults in `config/config.php`.

3. Serve the app from project root:

   ```bash
   php -S 0.0.0.0:8000 -t public
   ```

4. Open:

- `http://localhost:8000`

## API Endpoints

- `POST /api/generate.php` with JSON `{ "topic": "fitness" }`
- `POST /api/subscribe.php` with JSON `{ "email": "you@example.com" }`

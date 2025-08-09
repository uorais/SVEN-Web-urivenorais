# Pawtastic Appointment Scheduler

Uses Vue 3 + Vuetify frontend and a Laravel backend API.

---

## Prerequisites

- PHP >= 8.0
- Node.js >= 18
- MySQL or compatible database

---

## Backend Setup (Laravel)

1. Install dependencies:

   cd path/to/project/api
   composer install

2. Copy .env.example to .env and configure database credentials:

   cp .env.example .env
   php artisan key:generate

3. Run database migrations:

   php artisan migrate

4. Start development server:

   php artisan serve

---

## Frontend Setup (Vue 3)

1. Install dependencies:

   cd path/to/project/app
   npm install

2. Start development server:

   npm run dev

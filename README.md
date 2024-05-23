## Installation Guide

### Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js
-   npm

### Installation Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/vikarmaulanaarrisyad/monitoring-pakan-kucing-web.git
    ```

2. Navigate into the project directory:

    ```bash
    cd monitoring-pakan-kucing-web
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install && npm run dev
    ```

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations:

    ```bash
    php artisan migrate --seed
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

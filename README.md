# E-Learning Website with Laravel 10.x

This GitHub repository contains a web programming project developed as part of the Web Programming course. The project focuses on building a website called "E-Learning 100" using the Laravel framework version 10.x. The website aims to assist couples who are planning to get married by providing various useful features.

## Repository Contents 📁

This repository provides the foundational code for starting the development of the "Nikah Yuk" website using Laravel 10.x. It includes essential components such as models, controllers, and views used to implement the website's functionality.

## Getting Started 🚀

To get started with the project, follow the steps below:

1. Clone the repository to your local machine using the following command:

   ```bash
   git clone https://github.com/your-username/E-learning.git
   ```

2. Install the project dependencies using the following command:

    ```bash
    composer install
    ```

3. Set up the database configuration by creating a copy of the `.env.example` file and renaming it to `.env`. Then, update the database connection settings with your local database credentials.

4. Generate an application key by running the following command:

    ```bash
    php artisan key:generate
    ```

5. Run the database migrations to create the necessary tables in the database:

    ```bash
    php artisan migrate
    ```

6. Run the database seeders to populate the tables with sample data:

    ```bash
    php artisan db:seed
    ```

7. Run the storage link command to create a symbolic link from `public/storage` to `storage/app/public`:

    ```bash
    php artisan storage:link
    ```

8. Start the development server using the following command:

    ```bash
    php artisan serve
    ```

9. Access the website by visiting `http://localhost:8000` in your web browser.

## Contribution 🤝

If you would like to contribute to this project, please follow these steps:

1. Fork the repository to your GitHub account.

2. Create a new branch for your feature or bug fix.

3. Make the necessary changes and commit them.

4. Push the changes to your forked repository.

5. Submit a pull request to the main repository, explaining the changes you made.

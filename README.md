# Medicash

Medicash is a comprehensive medicine sales management software designed for small pharmacies and medicine shops. The application helps streamline sales processes, manage inventory, and generate invoices efficiently.

## Features

- **User-Friendly Interface**: Built with Bootstrap for a responsive and accessible design.
- **Inventory Management**: Track and manage stock levels of medicines.
- **Sales Management**: Handle transactions and sales records effectively.
- **Invoice Generation**: Create and download invoices using DOMPDF.
- **Notifications**: Real-time alerts using Toast.js for better user experience.

## Technologies Used

- **Frontend**: 
  - HTML
  - CSS
  - JavaScript
  - Bootstrap
- **Backend**: 
  - Laravel 11
- **Data Management**: 
  - jQuery DataTables
  - DOMPDF
- **Additional Libraries**: 
  - Toast.js

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/medicash.git
    cd medicash
    ```

2. **Install Composer Dependencies**:
    ```bash
    composer install
    ```

3. **Set Up Environment**:
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Generate an application key:
      ```bash
      php artisan key:generate
      ```

4. **Install Laravel Breeze**:
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    ```

5. **Run Migrations**:
    ```bash
    php artisan migrate
    ```

6. **Install Node Dependencies**:
    ```bash
    npm install
    ```

7. **Build Assets**:
    ```bash
    npm run dev
    ```

8. **Serve the Application**:
    ```bash
    php artisan serve
    ```

    Navigate to `http://localhost:8000` to view the application.

## Usage

- **Access the Dashboard**: Log in with your admin credentials to manage medicines, view sales, and generate invoices.
- **Manage Inventory**: Add, update, or remove medicines and adjust stock levels.
- **Process Sales**: Record sales transactions and generate invoices.
- **View Reports**: Use DataTables to view and filter sales and inventory reports.

## Contributing

If you'd like to contribute to the project, please fork the repository and submit a pull request with your changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- **Laravel**: For the robust backend framework.
- **Bootstrap**: For the responsive and accessible front-end components.
- **jQuery DataTables**: For enhanced data management and visualization.
- **DOMPDF**: For PDF generation.
- **Toast.js**: For user-friendly notifications.
- **Laravel Breeze**: For easy authentication setup.


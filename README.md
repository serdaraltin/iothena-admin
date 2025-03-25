
# iothena-admin

**iothena-admin** is a Laravel-based web application designed to manage and monitor IoT devices and systems. It provides an intuitive admin panel for real-time device data visualization, configuration, and interaction.

## Features:
- **Device Management**: Add, configure, and monitor IoT devices.
- **Real-time Monitoring**: View live data from connected devices.
- **User Authentication**: Secure login system with role-based access control.
- **Responsive UI**: Mobile-friendly design for easy access on any device.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/serdaraltin/iothena-admin.git
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Set up environment file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run the migrations:
    ```bash
    php artisan migrate
    ```

5. Start the development server:
    ```bash
    php artisan serve
    ```

## License
This project is licensed under the MIT License.

# Yii2 Application Template

This Yii2 application template is a pre-configured project setup that includes a backend, frontend, and common code structure, making it ideal for rapidly developing complex web applications. It follows the advanced project template structure, providing separate environments for frontend and backend development.

## Features

- **Backend and Frontend Separation:** Modular structure for easy management of the application's frontend and backend.
- **Environment-Specific Configuration:** Includes `environments` for development, testing, and production.
- **Docker Support:** Comes with a `docker-compose.yml` for easy containerization.
- **Vagrant Support:** Includes a `Vagrantfile` for easy provisioning of development environments.
- **Testing Ready:** Integrated with Codeception for testing, with a `codeception.yml` configuration.

## Requirements

- PHP 7.4 or higher.
- Composer for managing project dependencies.
- Docker and Docker Compose (optional) for containerization.
- Vagrant (optional) for provisioning virtual development environments.

## Installation

1. Clone the repository or download the zip file and extract it into your desired directory.
2. Run `composer install` in the project root to install PHP dependencies.
3. Configure your web server's document / web root to be the `frontend/web` directory for the frontend application and the `backend/web` directory for the backend application.
4. Copy the `environments/dev/example.env` to `.env` and adjust the database and other configurations according to your environment.
5. Apply migrations with `php yii migrate` to setup the database.

## Getting Started

- Access the frontend application by visiting the configured web root in your web browser.
- Access the backend application by visiting the `/admin` path from your frontend application's URL.

## Testing

Run the following command in the project root to execute tests:


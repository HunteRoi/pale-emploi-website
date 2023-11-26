# Pale Emploi Webiste

A PHP website with vulnerabilities to find in the context of a CTF at the Henallux.

## Getting started
### Prerequisites
To run the website, you need the following software:
- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [PHP](https://www.php.net/manual/en/install.php) (optional, for development)

### Installation
1. First, clone the repository.
```bash
git clone <repository-url>
```

2. Then create a file named .env in the [root folder](./) of the project there with the following content:
```bash
MYSQL_ROOT_PASSWORD=
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_PORT=
APACHE_PORT=
```

3. Next step is to go into the [src folder](./src) and create a file named config.ini with the following content:
```bash
db_host=
db_user=
db_password=
db_name=test
db_port=3306
```

There you are! Installation is ready to be used.

#### Development
For development, it is recommended to use the following command to run the website:
```bash
docker-compose up -d
```

#### Production
For production, it is recommended to use the following command to run the database:
```bash
docker-compose -f docker-compose.prod.yml up -d
```

You will also need to copy the content of the [src folder](./src) into your web server folder (e.g. /var/www/html).

## Structure
The website is divided in 3 parts:
- [database](./src/database): contains the database and repositories to populate it
- [classes](./src/classes): contains the business objects
- [handlers](./src/handlers): contains the handlers for the user actions (login, logout, register, etc.) - they are called by the pages and use the repositories and the business objects
- [pages](./src/pages): contains the pages of the website
- [partials](./src/pages/partials): contains the reusable components of the website

The pages are architectured as follow:
- [index.php](./src/index.php): the main page, it contains the initialisation of the session and the routing, and displays content when the user is not logged in
- [pages/404.php](./src/pages/404.php): the page that is displayed when the user navigates to an unknown page
- [pages/login.php](./src/pages/login.php): the page that is displayed when the user wants to log in
- [pages/logout.php](./src/pages/logout.php): the page that is displayed when the user logged out
- [pages/register.php](./src/pages/register.php): the registration page, it allows the user to create an account
- [pages/employee/index.php](./src/pages/employee/index.php): the page that is displayed when the user is logged in as an employee, it shows the job offers list available on the platform
- [pages/employee/profile.php](./src/pages/employee/profile.php): the employee profile page, it shows their CV
- [pages/employee/become_employer.php](./src/pages/employee/become_employer.php): the page that is displayed when the user wants to become an employer
- [pages/employer/index.php](./src/pages/employer/index.php): the page that is displayed when the user is logged in as an employer, it shows the available people to hire
- [pages/employer/job_offer/index.php](./src/pages/employer/job_offer/index.php): the page for an employer to see their job offers
- [pages/employer/job_offer/upload.php](./src/pages/employer/job_offer/upload.php): the page for an employer to upload a job offer

The reusable components are architectured as follow:
- [pages/partials/menu.php](./src/pages/partials/menu.php): the menu of the pages, merged into the header
- [pages/partials/header.php](./src/pages/partials/header.php): the header of the website
- [pages/partials/footer.php](./src/pages/partials/footer.php): the footer of the website

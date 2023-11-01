# PHP website with vulnerabilities to find
## For development
First, go to [database](database) folder. Create a file named .env there with the following content:
```
MYSQL_ROOT_PASSWORD=
MYSQL_USER=
MYSQL_PASSWORD=
MYSQL_PORT=
```
Use the values you desire, then start the development environment with `docker-compose up -d`.

## Structure
The website is divided in 3 parts:
- [database](./src/database): contains the database and repositories to populate it
- [classes](./src/classes): contains the business objects and logic call to the database
- [pages](./src/pages): contains the pages of the website
- [components](./src/components): contains the reusable components of the website

The pages are architectured as follow:
- [index.php](./src/index.php): the main page, it contains the initialisation of the session and the routing
- [pages/index.php](./src/pages/index.php): the page that is displayed when the user is not logged in
- [pages/login.php](./src/pages/login.php): the page that is displayed when the user wants to log in
- [pages/logout.php](./src/pages/logout.php): the page that is displayed when the user logged out
- [pages/register.php](./src/pages/register.php): the registration page, it allows the user to create an account
- [pages/employee/index.php](./src/pages/employee/index.php): the page that is displayed when the user is logged in as an employee, it shows the job offers list available on the platform
- [pages/employee/profile.php](./src/pages/employee/profile.php): the employee profile page, it shows their CV
- [pages/employee/become_employer.php](./src/pages/employee/become_employer.php): the page that is displayed when the user wants to become an employer
- [pages/employer/index.php](./src/pages/employer/index.php): the page that is displayed when the user is logged in as an employer, it shows the available people to hire
- [pages/employer/job_offer/index.php](./src/pages/employer/job_offer/index.php): the page for an employer to see their job offers
- [pages/employer/job_offer/upload.php](./src/pages/employer/job_offer/upload.php): the page for an employer to upload a job offer

The components are architectured as follow:
- [components/employee/menu.php](./src/components/employee/menu.php): the menu of the employee pages
- [components/employer/menu.php](./src/components/employer/menu.php): the menu of the employer pages
- [components/footer.php](./src/components/footer.php): the footer of the website
- [components/header.php](./src/components/header.php): the header of the website

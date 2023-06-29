# refugioanimales-laravel
Repository created for the Laravel project as part of the Web Application Engineering course (Universidad Nacional del Sur). The primary goal of this project is to develop web application that facilitates the administrative tasks (creation, reading, updating and deletion) related to the chosen project, which in this case is a web platform dedicated to promoting animal adoption from a shelter.\
A MySQL database is used for data management and AWS S3 for the storage of static content (images).

## Run Locally

Clone the project

```bash
  git clone https://github.com/FaustoFe/refugioanimales-laravel
```

Go to the project directory

```bash
  cd refugioanimales-laravel
```

Install dependencies

```bash
  composer install
```

Start the server

```bash
  php artisan serve
```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`API_KEY`

`DB_CONNECTION`\
`DB_HOST`\
`DB_PORT`\
`DB_DATABASE`\
`DB_USERNAME`\
`DB_PASSWORD`

`AWS_ACCESS_KEY_ID`\
`AWS_SECRET_ACCESS_KEY`\
`AWS_DEFAULT_REGION`\
`AWS_BUCKET`

\* For the reset password functionality you will also have to configure the environment variables of the mail service.

## Related Projects
 - [refugioanimales-servicioweb](https://github.com/FaustoFe/refugioanimales-servicioweb)
 - [refugioanimales-vue](https://github.com/FaustoFe/refugioanimales-vue)

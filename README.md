# A simple application where users can manage their **posts**

It includes implimentation of `Router`, `Middleware`, `Autorization`, `Authentication`, `Testing` with ([PestPhp](https://pestphp.com/))

To begin using the app, clone the repo into your local machine,

```
https://github.com/frankliniwobi/php-practice.git
```

cd into the project folder

```
cd php-practice
```

Install composer dependencies

```
composer install
```

After installing the dependencies, create a database (preferably MySql)

Create a new `.env` file and copy the data from `.env.example` into it, you can do it from the command line by running

```
cp .env.example .env
```

Update the variables to match the settings of your `database`

Start your local server with this command

```
php -S localhost:8888 -t public
```

Then visit `http://localhost:8888` on your browser

That's all.









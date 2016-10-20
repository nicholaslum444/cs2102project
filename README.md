# NUSMaids README

## 0. IMPORTANT!
Read this document before you clone the repo. Follow the steps here to set up your repo. If you don't, bad things may happen. We are using the **CodeIgniter** framework to help us with development.

## 1. Setup

### 1.1. Bitnami Configuration
Use localhost port 8081. Ensure that http://localhost:8081/ resolves to this homepage.

Find the PHP config file `wappstack-xxx-x/php/php.ini` in the Bitnami root folder and open it. Search for `opcache.enable` and ensure that the line is set to `opcache.enable=0`. This disables the caching of pages so your changes in the PHP code are immediately visible.

### 1.2. Repository Secrets
The file `database.php` is where the database login information are stored i.e. the database name, username and password for the php database connection. It is found in the `/application/config/` folder. It is gitignored so the repo will not have the exact file `database.php`. 

An example file `database.php.example` is provided. This file is laid out exactly like the actual `database.php`, except that it does not have sensitive data.

First copy the contents of `database.php.example` to a new file called `database.php`. Then edit `database.php` with your actual database config. Now the database should connect with the correct values based on your local config.

When committing code, ensure that sensitive data is not committed as well. Always check that the `database.php` file is NOT in the repository. If sensitive data is leaked, change passwords immediately.

_**Note:** In the scenario you encounter PHP Startup: Unable to load dynamic library /Applications/Bitnami-mappstack-5.6.25-0/php/lib/php/extensions/php_pdo_pgsql.dll' - dlopen(/Applications/Bitnami-mappstack-5.6.25-0/php/lib/php/extensions/php_pdo_pgsql.dll, 9): error message, go to your bitnami php folder, php/etc/php.ini and comment out extension=php_pdo_mysql.dll by removing the ";" at the front. Then restart your apache server._


### 1.3. Schema and Seed Data
The database schema and seed data are stored in the `sql` directory in the repository root.

This is how to set the schema in `schema.sql`.

1. Visit your local pgadmin and log in
2. Top left corner of the page, click on "SQL"
3. SQL input window will pop up
4. Top left corner of the window, select database "nusmaids"
5. If "nusmaids" is not present, create the database first with this SQL: `CREATE DATABASE nusmaids;`
6. Open `schema.sql` in text editor
7. Copy and paste all text into the SQL input window and execute
8. Check that tables are created in "nusmaids" database

This is how to seed the database with `seeds.sql` after the schema is created.

1. Open the SQL input window in pgadmin as above.
2. Copy and paste all text in `seeds.sql` in the input field and execute on the "nusmaids" database.

When schema or seeds are updated, you'll have to run both `schema.sql` and `seeds.sql` again to update the local copy.
Please inform the other developers if either file is updated.

If you're running from command line on linux, use the following commands:
```bash
psql -d nusmaids -a -f assets/sql/schema.sql
psql -d nusmaids -a -f assets/sql/seeds.sql
```

## 2. Usage
The website now requires user login to access. There are two default user accounts provided in the database seed file:

1. Username: "sammytan", Password: "asd"
2. Username: "jessicalim", Password: "qwe"

The website can also handle administrator logins. The following default administrator account is provided in the seed file as well:

1. Username: "admin", Password: "admin"

Log in to the website using any of these accounts. _**Note:** Login credentials do not include quotemarks._

Additional normal user accounts can be created via the website itself. Additional administrator accounts can only be created via raw database input; it is not possible to create an administrator account through the website. Use your local pgadmin interface to add, modify or delete accounts as needed.

## 3. Development

### 3.1. CodeIgniter
The CodeIgniter framework is built on PHP and should not require additional installation. Following the steps above is sufficient to get a running copy of the website on your local host. Please read on for more information on the development of the website.

### 3.2. MVC Architecture
CodeIgniter is an MVC framework. The controllers, views and models can be found in the respective folders inside the `/application/` folder. When writing code, please stick to the MVC architecture.

### 3.3. Views
We improve upon the CodeIgniter way of loading views. There is a "master" view file called `application_view.php` that contains all the static code that every page should have. This view also contains a line of code that can load an additional view. This additional view is intended to be the actual view that a controller would want to load.

**Example**: The Home controller wants to load its view called `home_view.php`. 

We replace:
```php
$this->load->view('home_view');
```
with:
```php
$data['view'] = 'home_view';
$this->load->view('application_view', $data);
```
This also means that the `'view'` key in the `$data` array is now reserved. Do not use that key for any other value aside from the view that you intend to load.

An additional reserved key is `'page_title'`, which allows you to change the title of the page by appending the value of `'page_title'` to "NUSMaids" i.e. "NUSMaids | Home Page".

# NUSMaids
---

**1. Repository Secrets**

The file `secrets.php` is where repository secrets are stored i.e. the database name, username and password for the php database connection. It is gitignored so the repo will not have the exact file `secrets.php`. 

An example file `secrets.php.example` is provided. This file is laid out exactly like the actual `secrets.php`, except that it does not have sensitive data.

First copy the contents of `secrets.php.example` to a new file called `secrets.php`. Then edit `secrets.php` with your actual database config. Now the database should connect with the correct values based on your local config.

When committing code, ensure that sensitive data is not committed as well. Always check that the `secrets.php` file is NOT in the repository. If sensitive data is leaked, change passwords immediately.


**2. Schema and Seed Data**

This is how to set the schema in `schema.sql`.

1. Visit localhost/phppgadmin and log in to pgadmin
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
# Board-Game-Site
A site for signing up for our floor's board games. Has code for a CSS/JQuery based calendar, if desirable.

Based on the Laravel PHP framework.

**NOTE**: An old-ish project. Ignore the frontend, it's pretty ugly. Although maybe you'll think the same of the backend.

### How to Run

Requires an installation of Composer: installation instructions [Here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

###### Initial configuration

For initial configuration, refer to the `.env.example` file, containing the basic configuration for the app and, primarily, database.  For this to actually be used, it needs to be renamed to `.env`, and the database username and password need to be changed to whatever suits you.  Also, after this has been set up, `php artisan key:generate` should be run to generate a new application key.

Uses MySQL, and the default database host is localhost (database name is 'board_games'). To run the migrations, just run `php artisan migrate` once the database has been set up, and you should be good to go.  To actually start the server, run `php -S *hostname*:*port* -t public`, and you should be good to go!

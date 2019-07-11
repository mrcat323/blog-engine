# BLOG - ENGINE
The CMS is just really changed. I implemented Slim - PHP Micro-Framework and that's why it looks brightly (the code of it) and simple to learn, use. I hadn't added anything new, just re-made the CMS with Slim to make it understandable for you. If anyone will use, contribute, or just write some issues, ideas, I'll try more to add something interesting, new, useful to the CMS. So get started!

## GET STARTED
Open your terminal, or whatever you use for the git, and just:
```BASH
git clone https://github.com/mrcat323/blog-engine
```
### Install dependencies
To install dependencies, you should probably try **composer**, so just say:
```BASH
composer install
```
### Configure
To begin to use the CMS, you should probably first confugure it out. So, go to [config file](https://github.com/mrcat323/blog-engine/blob/master/src/config.php) and make some changes here:
```PHP
'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'db_name', // set your database name
            'username' => 'user_name', // your user name to connect
            'password' => 'password', // and probably the password
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]
    ]
```
Then just dump the [SQL file](https://github.com/mrcat323/blog-engine/blob/master/blog_engine.sql). If you wanna dump it with Terminal client of MYSQL, just say with me:
```BASH
mysql -uusername -ppassword -e 'use your_db_name'
```
```BASH
source /path/to/sql/file
```
So, now you're done with configuring stuff.

### RUN
Just run by saying:
```BASH
php -S 127.0.0.1:8080 -t src/public
```

## Admin Panel
Probably you would like to view, go to Admin Panel as well, by default Admin has following credentails, just go to `/login` and type the next credentails:
```
E-Mail: admin@admin.com
Password: lorem
```
## Contributing
If you'd like to contribute, just let me know, share your ideas with me, the issues section is for you, to talk about the project you can borrow my [E-Mail address](mailto:mrcat323@protonmail.com)
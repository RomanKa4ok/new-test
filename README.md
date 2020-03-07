# Starter for SCSS
sass --watch scss/styles.scss:css/styles.min.css --style compressed

## Visual Studio Code
Add Extension: **Live Sass Compiler** <br/>
Add new setting: File -> Preferences -> Settings -> Live Sass Compiler <br/>
*"liveSassCompile.settings.formats": [
    {
        "format": "compressed",
        "extensionName": ".min.css",
        "savePath": "/css"
    }
],
"liveSassCompile.settings.autoprefix": [
    "> 1%",
    "last 2 versions"
]*
## MySQL Config
Create database: **CREATE DATABASE viar CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci** <br>

Create requests table: **CREATE TABLE `requests` ( <br>
                          `id` int(11) NOT NULL AUTO_INCREMENT,<br>
                          `name` varchar(255) NOT NULL,<br>
                          `phone` varchar(100) NOT NULL,<br>
                          `requested_choice` varchar(100) NOT NULL,<br>
                          `status` enum('pending','approved','','') NOT NULL DEFAULT 'pending',<br>
                          PRIMARY KEY (`id`)<br>
                         ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4**<br>
                         
Create admins table: **CREATE TABLE `admins` (<br>
                        `id` int(11) NOT NULL AUTO_INCREMENT,<br>
                        `username` varchar(255) NOT NULL,<br>
                        `password` varchar(255) NOT NULL,<br>
                        PRIMARY KEY (`id`)<br>
                       ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4**      <br>                   
                         
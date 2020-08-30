## G-tickets simple customer support web application

# Installation Requirements:
- PHP >= 7.2.5
- Composer
- MYSQL Server
- for me i use Xampp server

# Get started with G-tickets
step 1 : 
    - Download folder.zip from url:https://github.com/n1bilallam/G_Tasks/archive/master.zip
    - Extract the folder
    - Copy extracted folder to Xampp/htdocs
    
step 2 :
    -install Composer Dependency from url: https://getcomposer.org/download/
    
step 3 : Editor
    - VS code or any one
    - open the folder in text editor
  
 step 4 : Run Apache and MySql Server from Xampp control panel
 
 step 5 : update through composer 
    - open the folder in console
    - run command : composer update --no-scripts
    
 step 6 : create .env file for database configuration
    - rename the file .env.exemple to .env
 
 step 7 : Key Generate for Env file
    - run command : php artisan key:generate

 step 8 : Setup Database Configurations
 
 step 9 : Run Migrations
    - run command : php artisan migrate


### Upcoming feauters.

- the app don't have a Admin management.
- notification by email

## end


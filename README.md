# crm
Customer Relationship Management 

## STEP 1 :

try command 

# php artisan migrate:rollback

if it does not work then only you need to drop/delete the local database probably located at http://localhost/phpmyadmin/ your-project-database

## STEP 2 :
 
create new database name it as same as it is in the .env file  => DB_DATABASE= YOUR_DB_NAME

## STEP 3 :

run these below command 

1. # php artisan migrate 

2. # php artisan db:seed 

3. # composer install


------------------/////////////---------

Run Command 
# php artisan serve 

and you are ready to play around this will also delete all previous local data , . . . 

# IMPORTANT Credentials 
for login  use
# email => admin@gmail.com
and 
# password => Admin@321

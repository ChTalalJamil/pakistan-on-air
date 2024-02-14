# Pakistan-On-Air

# STEP 1 :

`cp env.example .env`

`php artisan key:generate`

# STEP 2 :
 
create new database name it as same as it is in the 

.env file  => 
`DB_DATABASE= YOUR_DB_NAME`

## STEP 3 :

run these below command 

`php artisan migrate`

`php artisan db:seed`

`composer install`

# Step 4
`php artisan serve`

Ready to Run . . . .
# Test for tictales

## Auther
> Alexis

## About project

This project is used Laravel 9, MySQL, Laravel guard for multi authetication for admin and player
I've focused on player part becasue of test is required only player part but login is implement in both.

project running
```
1. git clone.
2. install PHP, Composer, MySQL.
3. composer install  
4. creat database which name is 'tictales'
5. php artisan migrate
6. php artisan db:seed
```
as you can see in command, I've created migration and Seed file for test.

## API Endpoint

1. Login with Admin
   - POST :  localhost:8000/api/admin/login
     - Parameters 
       - email
       -password
     - example
       - email : admin@test.com
       - password : 123123123
     - response
       - status 
       - message
       - token
    
2. Login with player
   - POST :  localhost:8000/api/player/login
     - Parameters 
       - email
       -password
     - example
       - email : player@test.com
       - password : player
     - response
       - status 
       - message
       - token

you have to add token for other request in api request

3. get current items which are being used by this player.
   - GET :  localhost:8000/api/player/useItem
     - Parameters 
        - no parameter
     - response
       - status 
       - data
```
In data, you can see list of current item list.

```

4. get  items which are not being used by this player but bought.
   - GET :  localhost:8000/api/player/unuseItem
     - Parameters 
        - no parameter
     - response
       - status 
       - data
```
In data, you can see list of unuse item list.

```

5. get  all items which are bought by this player.
   - GET :  localhost:8000/api/player/unuseItem
     - Parameters 
        - no parameter
     - response
       - status 
       - data
```
In data, you can see list of all items item list.

```


6. buy item with item id
   - GET :  localhost:8000/api/player/buyItem/{id}
     - Parameters 
        - no parameter
     - example localhost:8000/api/player/buyItem/12
     - response
       - status 
       - data
```
In data, you can see player info that cash_amount is reduced as price of item

```
7. update current using item 
   - POSt :  localhost:8000/api/player/updateuseitem
     - Parameters 
        - array which length is 10 because of category's length is 10.
     - response
       - status 
       - data
```
In data, you can see current using items list after updating.

```

## Conculation

I think I've completed your full requirement.

If you don't think or don't understand my description or code.

Just contact me please.

my email is blackhole.rsb@gmail.com
skype id is live:.cid.1ff854fb8e309dce

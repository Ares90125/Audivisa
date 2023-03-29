# Test for tictales

## Auther
> Ares Colin

## About project

This project is used Laravel 9, MySQL, Laravel guard for multi authetication for Teacher, Parent, Student.


project running
```
1. git clone.
2. install PHP, Composer, MySQL.
3. composer install  
4. creat database which name is 'audivisa'
5. php artisan migrate
```


## API Endpoint

  ### Teacher part
      1. Register with Teacher
        - POST :  localhost:8000/api/teacher/register
          - Parameters 
            - email
            - password
            - firstname
            - lastname
            - photo   [option]
          - example
            - email : teacher@test.com
            - password : 123123123
            - firstname:first
            - lastname:last
            - photo : 1.png [or can't add]
          
      2. Login with Teacher
        - POST :  localhost:8000/api/teacher/login
          - Parameters 
            - email
            - password
          - example
            - email : teacher@test.com
            - password : 123123123

      3. Get Profile Info
        - GET :  localhost:8000/api/teacher/me


      4. send message
        - POST :  localhost:8000/api/teacher/message/create
          - Parameters 
            - receiver_id
            - message
            - type
          - example
            - receiver_id : 1
            - message : Hello
            - type : 0
      
  ### Parent part
      1. Register with Parent
        - POST :  localhost:8000/api/parent/register
          - Parameters 
            - email
            - password
            - firstname
            - lastname
            - photo   [option]
          - example
            - email : parent@test.com
            - password : 123123123
            - firstname:Pfirst
            - lastname:Plast
            - photo : 1.png [or can't add]
          
      2. Login with Parent
        - POST :  localhost:8000/api/parent/login
          - Parameters 
            - email
            - password
          - example
            - email : parent@test.com
            - password : 123123123

      3. Get Profile Info
        - GET :  localhost:8000/api/parent/me
        

      4. send message
        - POST :  localhost:8000/api/parent/message/create
          - Parameters 
            - receiver_id
            - message
          - example
            - receiver_id : 1
            - message : Hello
      
  ### Student part
      1. Register with Student
        - POST :  localhost:8000/api/student/register
          - Parameters 
            - email
            - password
            - firstname
            - lastname
            - photo   [option]
          - example
            - email : student@test.com
            - password : 123123123
            - firstname:Sfirst
            - lastname:Slast
            - photo : 1.png [or can't add]
          
      2. Login with Student
        - POST :  localhost:8000/api/student/login
          - Parameters 
            - email
            - password
          - example
            - email : student@test.com
            - password : 123123123

      3. Get Profile Info
        - GET :  localhost:8000/api/student/me
        

      4. send message
        - POST :  localhost:8000/api/student/message/create
          - Parameters 
            - receiver_id
            - message
          - example
            - receiver_id : 1
            - message : Hello
      




## Conculation

I think I've completed your full requirement.

If you don't think or don't understand my description or code.

Just contact me please.

my email is blackhole.rsb@gmail.com
skype id is live:.cid.1ff854fb8e309dce

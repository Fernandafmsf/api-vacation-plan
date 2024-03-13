# Vacation Plan API 
Laravel API to manage holiday plans. 

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone git@github.com:Fernandafmsf/api-vacation-plan.git

Switch to the repo folder

    cd api-vacation-plan

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:Fernandafmsf/api-vacation-plan.git
    cd api-vacation-plan
    composer install
    cp .env.example .env
    
**Make sure you set the correct database connection information before running the migrations** 

    php artisan migrate
    php artisan serve

## Documentation 

### Login – create an user and gives us the authentication token

#### Register
Request method: POST

Url: localhost:8000/api/register

Request/response parameters: the endpoint expects a request containing name, email and password. There are validations on these parameters. The response returned is a json 

Example responses: 
```
{ “message” => User Created”} 
```

#### Login
Request method: POST

Url: localhost:8000/api/login

Request/response parameters: the endpoint expects a request containing email and password of a user already created. There are validations on these parameters. The response returned is a json containing either the access token or an error message.

Example responses: 
```
{ “access_token” => $token”} 
```

### API Holiday Plan
#### Index
Request method: GET

Url: localhost:8000/api/plans

Request/response parameters: The response returned is a json containing all the data stored. 

Example responses: 
```
"holiday_plans": [
        {
            "id": 1,
            "title": "Visitar Portugal",
            "description": "Viagem para casa da vovo",
            "date": "2024-03-12",
            "location": "Portugal"
        },
        {
            "id": 2,
            "title": "Visitar Portugal",
            "description": "Viagem para casa da vovo",
            "date": "2024-02-03",
            "location": "Portugal"
        }
]
```

#### Store
Request method: POST

Url: localhost:8000/api/plans

Request/response parameters: the endpoint expects a request containing title, description, date and location. There are validations on these parameters like date format. The response returned is a json. 

Example responses: 
```
{
    "status": true,
    "message": "Plan Created successfully!",
    "holiday_plan": {
        "title": "Travel",
        "description": "Travel to Italy",
        "date": "2025-02-03",
        "location": "Italy",
        "id": 6
    }
}
```


#### Show
Request method: GET

Url: localhost:8000/api/plans/{id}

Request/response parameters: the endpoint expects an id and then returns an specific data based on the id given.

Example responses: 
```
{
    "id": 3,
    "title": "Visitar Portugal",
    "description": "Viagem para casa da vovo",
    "date": "2024-02-14",
    "location": "Portugal"
}
```


#### Update
Request method: PUT

Url: localhost:8000/api/plans/{id}

Request/response parameters: the endpoint expects an id on the url and fields that the client wants to update, which could be title, description, date or location.  The response will inform if the update was successful. 

Example responses: 
```
{
    "message": "Records updated successfully"
}
```

#### Destroy
Request method: DELETE

Url: localhost:8000/api/plans/{id}

Request/response parameters: the endpoint expects an id on the url. The response will determine if it was successful or not. 

Example responses: 
```
{
    "message": "Plan deleted"
}
```


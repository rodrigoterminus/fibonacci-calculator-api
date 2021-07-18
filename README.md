# Fibonacci Calculator

A simple [Fibonacci](https://en.wikipedia.org/wiki/Fibonacci_number) Calculator API built with [PHP 8](https://www.php.net/releases/8.0/en.php), [Slim](https://www.slimframework.com/), [Docker](https://www.docker.com/), and [Nginx](https://www.nginx.com/);

## How to run

Make sure you have docker installed and running before executing the commands listed bellow:

    docker compose up -d
    docker exec fibonacci-calculator-php composer install

The application will be served on `http://localhost:8000`.

## Running the tests

     docker exec fibonacci-calculator-php vendor/bin/phpunit

## API Definition

### Calculate by factorisation

#### `GET /fibonacci/:n`

Parameter | Description | Param Type | Data Type
--------- | ----------- | ---------- | ---------
**n** | Factorisation number | path | integer

Response example:

    HTTP/1.1 200 OK
    Content-Type: application/json
    
    {
        "number": 13,
        "n": 7
    }

## More about it

There are several ways to calculate a Fibonacci number given a factorisation. 
I choose to implement it by [Computational rounding](https://en.wikipedia.org/wiki/Fibonacci_number#Computation_by_rounding) 
as pointed out on [this comment](https://stackoverflow.com/a/27190248/4034975) on StackOverflow.

Although Fibonacci numbers sequence can also be extended to negative numbers, for simplicity,
this implementation only deals with the sequence of positive numbers.
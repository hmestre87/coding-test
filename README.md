# Hugo Mestre

I had to leave this half done because i'm going on holidays and have a plane to catch in about 3h.

## What i've done

I've implemented the first and second type of discounts.

## How can you test it

I've left a docker-compose.yml in /problem-1/docker. You'll only need to make something like
    
    - cp .env.dist env
    - docker-compose build
    - docker-compose up -d
    - docker-compose exec php-fpm bash
    - composer install
    - http://localhost or http://localhost:port

For testing orders 1 to 3 the routes are (sorry for the hack but it was a fast way to test the orders)

    - / or /1
    - /2
    - /3

## How did i approach this problem

- So being this a microservice a tried to keep the dependencies to a minimum. I used Symfony HttpFoundation component for
handling the requests and responses.
- I built a transformer from Json to Object for the Order to handle better the values and their types.
- I also implemented the Strategy Pattern to allow having multiple Strategies for Discounting, for instance i didn't know
if the global discount (1st Discount mencioned on the problem) was cumulative or not so i just have to implement a new strategy 
if i want to pick for example the best or the worst discount instead of accumulating them.
- I didn't had the time to program the tests (i've honestly only had about 8h to do this so it would be the tests or the
features :D, sorry i've picked the features)
- I've created some custom exceptions for better handling the errors and inform them through the responses
- I'm honestly half-way of doing the code i wished to send you but again sorry got a plane to catch. :(

## If you would like me to do extra code on the test
- I'm happy to do some, tests (i know TDD but again no time it would have just been TD)
- Fix the code with proper style with CS-Fixer and proper annotations everywhere.
- Finish the whole test :D
- But all this will have to wait for 26th of April
- Still i think with the time i had it wasn't an awful work and i hope you can appreciate that.
- Thanks for the opportunity.

## Any doubts or questions
- Please feel free to contact me.
- And sorry for not having the proper time to ask you my doubts about the discounts (which i have)


# Coding Test

In order to gain insights in your development skills, we created this development exercise.

## What to do?

We have several problems to solve. Our recruiter would have normally told you which one(s) to solve.
You are free to use whatever technologies you want, unless instructed otherwise.

- [Problem 1 : Discounts](./1-discounts.md)
- [Problem 2 : Ordering](./2-ordering.md)
- [Problem 3 : Local development](./3-local-development.md)

## Procedure

We would like you to send us (a link to) a git repository (that we can access).  
We also need some documentation on how to run your app and how we can verify it will still run after we made some changes to it).  
There is no time limit on this exercise, just take as long as you need to show us your development skills.

## Problems?

Feel free to contact us if something is not clear.

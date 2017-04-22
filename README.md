# A-Star
A* Algorithm

> In computer science, A* (pronounced as "A star" ( listen)) is a computer algorithm that is widely used in pathfinding and graph traversal, the process of plotting an efficiently directed path between multiple points, called nodes. It enjoys widespread use due to its performance and accuracy. However, in practical travel-routing systems, it is generally outperformed by algorithms which can pre-process the graph to attain better performance, although other work has found A* to be superior to other approaches
>
> From Wikipedia

## Docker Deployment

#### docker-compose run -d 

Deploy all containers. You should modify MySQL credentials in .env file

#### docker-compose stop

Stop all containers deployed in this system 

#### docker-compose start

## Composer Deployment

#### composer install

Install dependencies 

#### docker run --rm -v $(pwd)/app composer/composer install

Install dependencies via dockerized composer

## Launch tests

#### docker run --rm -v $(pwd)/app phpunit/phpunit -c phpunit.xml

Launch unit tests via dockerized phpunit
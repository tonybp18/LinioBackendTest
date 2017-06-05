# Challenge Solution - Backend Developer
This solution is made with Composer, PHP 7, phpunit 5, also the _Strategy Pattern Design_ was used for the output format behavior.

The solution can be accesed entering at:
- http://webRoot/LinioBackendTest

### To execute the unit tests:
- run `composer update`

after finishing downloading run:
- `vendor\bin\phpunit`

results will be written in the __/build__ directory
- HTML unit test results: http://webRoot/LinioBackendTest/build/testdox.html

## Available query strings
It is posible to override the defult values of the solution using the following query strings:
* **limit**: set the top limit value to print the numbers, default is 100.
* **output_format**: set the output format of the data.
  * json
  * xml

### Examples:
- http://webRoot/LinioBackendTest/?limit=15
- http://webRoot/LinioBackendTest/?output_format=json
- http://webRoot/LinioBackendTest/?limit=45&output_format=xml

## Directory structure
- /docs
- /src
- /src/Implementations
- /src/Interfaces
- /src/Service
- /tests
- /tests/Service

## Any suggestions are welcome

---

# Challenge - Backend Developer
Write a program that prints all the numbers from 1 to 100. However, for
multiples of 3, instead of the number, print "Linio". For multiples of 5 print
"IT". For numbers which are multiples of both 3 and 5, print "Linianos".

But here's the catch: you can use only one `if`. No multiple branches, ternary
operators or `else`.

# Requirements
* 1 if
* You can't use `else`, `else if` or ternary
* Unit tests
* You can write the challenge in any language you want. Here at Linio we are
big fans of PHP, Kotlin and TypeScript

# Submission
You can create a public repository on your GitHub account and send the
link to us, or just send us a zip file.

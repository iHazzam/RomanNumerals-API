# Roman Numerals API Task
This is Harry Messenger's implementation of the Netsells API task
[Postman Docs](https://documenter.getpostman.com/view/3627784/netsells-programming-task/7TQ9Ait) 

 Please note: The project was (quickly) updated to Laravel 5.5 to work with the latest version of Laravel Fractal
 
 Any questions, please feel free to contact me!
 
## Brief
Our client (Numeral McNumberFace) requires a simple API which will convert an integer to its roman numeral counterpart. After our discussions with the client, we have discovered that the solution will contain 3 API endpoints, and will only support integers ranging from 1 to 3999. The client wishes to keep track of conversions so they can determine which is the most frequently converted integer, and the last time this was converted.
 
### Endpoints Required
 1. Accepts an integer, converts it to a roman numeral, stores it in the database and returns the response.
 2. Lists all of the recently converted integers.
 3. Lists the top 10 converted integers.
 
## What we are looking for
 - Use of MVC components (View in this instance can be, for example, a fractal transformer).
 - Use of [Fractal](http://fractal.thephpleague.com/) and Transformers - here is a Laravel specific Fractal package: https://github.com/spatie/laravel-fractal
 - Use of Eloquent, Requests and Routes.
 - A class which implements the supplied interface.
 - The supplied PHPUnit test passing.
 - Clean, well-commented code - We use PSR-2 at Netsells.
 
 ## Submission Instructions
- Please push your submission into either a public GitHub repo or a private repo, and give access to james.judd@netsells.co.uk

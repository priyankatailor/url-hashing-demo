#URL-Hashing-Demo

I have developed rest api which will create short url for entered url with utm source or any other query parameters it can be used only once.

This api is developed for sending promotional mail with some url for advertisment of product/services.

Technolgoy Used:
---------------

Language: PHP
Database Server: Mysql
Framework: Laravel 8 (why it is used ?)
Laravel comes with API development in mind, considering the following features.

Authentication
---------------
Laravel provides a flexible API authentication system that you can build on. There are Laravel packages like Passport and Sactum which you can use as drivers for authenticating API requests.

Routing
---------
There’s a route file that controls API routes and works just as simplistic as the web routes. You can also use middlewares in API routes just like you would in web routes.

Response Data
---------------
Just as in stateful/web requests where views are returned from controllers, Laravel provides a JSON format response feature in the case of API requests .
It also has API resources and collections tools that helps to transform data, and this tool is very powerful because you can do a lot of conditioning and Access Control for the data you want to return to the API call.

Smart Exception Handling
---------------------------
When there’s an exception in your application, Laravel checks if the request is an API request by checking if it has the “Accept : application/json”, and then returns an exception message object in JSON format instead of a whoops page in the case of web requests.

Laravel has done a great work of putting these tools together in the framework to aid in the development of APIs for web artisans.




# slei.pro PHP
> Maintained by Nicholas Ramsay

slei.pro is based off a C# console program written in 2015 that ran on windows called "Dragons Quest RPG". It was later converted into an online single player game called "slei". Slei.pro attempts to make an online PVP version of the original accessible on the web.

This project is a prototype of the slei.pro project written in PHP with an MVC pattern and styled with bootstrap.

## File & directory structure
* **Models** - abstractions of db and data models, db actions e.g queries.
* **Views** - html code with bootstrap css.
* **Controllers** - shows user correct views based on route.
* **Includes** - included files such as bootstrap and themes.
* **index.php** - central route handler and view outlet.

## Forumn requirements
* Must have confirmed email address to post
* Cannot post a discussion if you've posted one in the last 5 minutes.
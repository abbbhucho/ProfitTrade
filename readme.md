# Profit Trade
[![Build Status](https://travis-ci.org/abbbhucho/ProfitTrade.svg?branch=feat%2F1.0)](https://travis-ci.org/abbbhucho/ProfitTrade)

The Project named ProfitTrade allows a user to keep a record of all the
	stocks which are sold or to be sold at a particular date. 

## Description

The Project takes into consideration the need of the user to handle
his/her stock. While a stockholder face a lot of problems in day to day
life in handling ones stocks such as lack of knowledge, fortitude,
intuition, patience etc. The new stockholders face with the problem of
having enough experience. On average it takes 5-10 years to learn the
stock market though with a good mentor or a handler the time
investment required can be reduced. Not all the stockholders have
enough qualities needed for investment trading and because of this a
lot of new stockholders might end up in a loss over a year or two.
This can lead to loss of interest among the stockholders. The
stockholder require the right amount of patience as one would have to
wait for the right time to trade.
The Application ProfitTrade might just act as the handler which one
might be looking for. One of the sole purposes of this application is to
calculate all the extra charges that can be applied on the stock as per
the broker so that the user of the application can avoid being in a loss
due to insufficient knowledge of the extra charges.


## Getting Started

- 	Clone or Download the project
- 	Run it on a localhost server and enter URL : {yoururl}/profitTrade/public/
-	Register and create a new account
-	Create an admin account to enter the charges which are to be applied by the broker
-   You can also use the command ``` php artisan migrate --seed ``` to enter dummy charges and admin column
- 	Log in and allow this application to help maintain your stocks

### Prerequisites
```
XAMPP OR MAMP OR WAMP SERVER OR ANY WEB SERVER WITH PHP
DB:MYSQL
```


### Installation Note:
 
 Set the admin account by changing isadmin column in users table to 1.
 The Admin /Broker column is required to enter charges(inside charges column) first before calculating stock charges.
 Change the env file to set as per your database. 

## Running the tests

Explain how to run the automated tests for this system

## Deployment

-	Compress the entire project folder on your local machine. You'll get a zip file – profitTrade.zip
-	Upload on File Manager in CPanel.Upload the zip in root directory _ _not in public_html.
-	Extract and open the zip folder and MOVE the CONTENTS of the public folder to your cpanel’s public_html folder. You can as well delete the empty public folder now.
-	Navigate to the public_html folder and locate the index.php file. Right click on it and select Code Edit from the menu.
-	change the following lines (24 and 38) from index.php
	###### `require __DIR__.'/../{ hostname }/bootstrap/autoload.php';
	###### $app = require_once __DIR__.'/../{ hostname }/bootstrap/app.php';`
-	Create a database on your web host. Import the database in Cpanel.	

## Built With

* [Laravel](https://laravel.com/docs/5.8/readme) - The web framework used

## Authors

* **Anirban** - *Initial work* 

See also the list of [contributors](https://github.com/abbbhucho/ProfitTrade/graphs/contributors) who participated in this project.

## License

This project is licensed under the Apache License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Anubhav Munjaal
* Inspiration
* etc

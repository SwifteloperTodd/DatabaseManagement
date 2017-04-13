# DatabaseManagement
For my phase 2 of my project for DatabaseManagement at UNO Spring 2017

For phase 3:

Put phpform.php in the www directory of wampserver, then go to localhost/phpform.php. Enter in an email for a user and you will get information about that user. If they are a driver, you will get their vehicle info. If they are an advertiser, you will get their company info.

The trigger "delete_pins" deletes all pins associated to a route after the route is deleted. The pins are not needed anymore if they do not have a route.

The trigger "add_mileage" adds one mile to the routes mileage when a pin is inserted into the database. This assumes that all pins are one mile apart for simplicity.

Steps to run:
1. Install XAMPP https://www.apachefriends.org/download.html
2. Place code_challenge folder into XAMPP directory under htdocs (Default: C:\xampp\htdocs)
3. Open the XAMPP control panel and initiate the Apache and MySQL modules
4. Navigate to phpmyadmin (http://localhost/phpmyadmin/index.php)
5. Import the "brokerinsights.sql", it also contains some data already
6. Username and password are set as root/root, so you might need to either change the credentials manually or make changes to the file "database.php".
7. Open a command prompt and navigate to the code-challenge folder inside code_challenge(C:\xampp\htdocs\code_challenge\code-challenge)
8. Run the "ng serve" command
9. You should now be able to access the UI through whatever port the angular server is listening on (For me: http://localhost:4200/)

I used Postman to test the rest api (https://www.getpostman.com/downloads/)

The rest API can be accessed at http://localhost/code_challenge/api/
Policies: http://localhost/code_challenge/api/policies.php
Customers: http://localhost/code_challenge/api/customers.php
Insurers: http://localhost/code_challenge/api/insurers.php
Policy types: http://localhost/code_challenge/api/policy_types.php


You should be able to create (POST), read (GET) and delete (DELETE) every entity.

To create a policy, you first need to have created a customer, insurer and policy type - some data should already be there though.

JSON Examples (Make sure to set to POST)
Create customer:
{
    "name":"test customer name",
    "address":"test address"
}
Create insurer:
{
    "name":"test insurer name"
}
Create policy type:
{
    "name":"test policy type name"
}
Create policy: (all foreign key ids need to link to an existing entry)
{
    "premium":58.7,
    "customer_id":1,
    "insurer_id":1,
    "policy_type_id":1
}

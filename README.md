# TECH SCOPE 
## An ecommerce Application 

This project is done using HTML-PHP and MySQL.

**Step 1** :To run PHP codes, Apache Server is Required and to run the database MySQL server is required. The installation of Apache can be downloded from https://www.apachefriends.org/index.html.

**Step 2** :Once installed , click start on Apache.

**Step 3** :Click start on Mysql in xampp.

**Step 4** :Place the php folder in the C:\xampp\htdocs location and ManojShanmugham_Generate.sql in C:\xampp\mysql\bin location.

**Step 5** :Open the browser and type in the url http://localhost/phpmyadmin/ and from the left panel click on New to create a database. Enter ecommerce in the Database Name and click on Create.

**Step 6** :Run cmd (windows Key + R -> type 'cmd' -> Enter) and change the path to (C:\xampp\mysql\bin>) and type the command 'mysql -u root -p ecommerce < SQL_Generate.sql' and hit enter.
        (Press Enter if asks for password).

**Step 7** :Go to the browser and http://localhost/phpmyadmin/ and the database will be created.

**Step 8** :Enter the url http://localhost/php/dashboard.php and click enter.

**Step 9** :The SignUp page appears and enter the details for signup.(Note : Use upto 10 characters for password). Once done, click on login enter the credentials used for signing up. Once logged in, add products of your choice and check out from the cart.
	Once submitted from the Final CheckList the orders are placed and order details are shown. Click on logout and click on admin button. Pop up shows for username and password. Enter 'admin' for both username and password.
	In the admin page one can view the details of orders placed using order ID. And one can add a new product or quantity of the existing product to the Product list.


## Another Method :

**Step 10** : If MySQL Server is installed, skip step 3-7.

**Step 11** : Start the MySQL Server and Open MySQL workbench and create a New Connection and navigate to File -> Open SQL Script -> ManojShanmugham_Generate.sql and run the script. After a successful run, continue to Step 8.(Note : there should be no password created during connection)

#### (Note: The above steps takes place only in Windows Environment)

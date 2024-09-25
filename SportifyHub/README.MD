The CW Sketch is available in the folder "CW Sketch"

Admin Login:
Email: sabeel890@hotmail.com
Password: Admin123
(cannot register for Admin Account)

User Login:
Please Register and create an account
OR
Email: Sabeel89000@gmail.com
Password: User1234

All the other users have the same encrypted password as eachother (I signed them up with the same pw)

The database .sql file is located in the path:

General explanation of the functions of each file:

1. index.php - The first page that the user will see when clicking onto the website (The Home Page).

2. products.php - The page in which all prodcuts are stored. users can search and filter through the products, depending on category, on that page.

3. one_product.php - This page is used when the user clicks a buy now button under a product. This page will open and information about that product only will be shown.

4.contactus.html - This is a basic page that shows contact information for the company.

5. login.php - A page in which the user can log-in, if registered and on the database, to their account

6. Registerform.php - A page which is used when the suer doesn't already have an account. When they finish registering, their details are stored on the db and
   the next time they want to login, they can use login.php

7. Account.php - A page in which the user can see their account information, will be able to change their password and logout. (Can also check their orders however non-functional)

8. cart.php - The page which when the user selects "add to cart" btn, the products stack up for the user to see their basket (non-functional, however page is there.)

9. checkout.html - The page in which the user inputs delivery details to place their order (non functional, but the page is there.)

10. Admin_Login.php - A seperate page for an admin login. accessed through login.php and there is a btn for "Admin Login" which will take you to Admin_Login.php

11. Admin_Logout.php - A file for when the "sign out" btn is called in the admiin dashboard. the fiile contains php logic that will logout the Admin

12. Admin_Products.php - A page which allows the Admin to see all the information about a product. there will be two options, Edit/Delete in which the Admin can choose from

13. Admin_Edit_Product.php - A page where the Admin can alter information about the product (to change picture, the pic file must be in assets)

14. Admin_Delete_Product.php - This is a file for when the Delete btn is called in Admin_Products.php. The file includes php logic to delete a product from the database

15. Admin_Users.php - A page which allows the Admin to view all the users in the "users" database. In this page, there will be an option for the Admin to delete a user

16. Admin_Delete_User.php - A file which is called when the delete btn is called in Admin_Users.php. This file contains php that will remove a user from the database

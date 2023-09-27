## What is SaaS?

Software as a service is a software licensing and delivery model in which software is licensed on a subscription basis and is centrally hosted. SaaS is also known as on-demand software, web-based software, or web-hosted software. (From wikipedia).

In the case Orderking, SaaS means that you have a management software for businesses of different types, such as restaurants or merchants, through which they can manage aspects of their business that include:

-   Order management
-   Billing and transaction management
-   User management
-   Analytics for businesses

## Does a SaaS-Web App require the multi-database approach?

A SaaS web app does not require a multi-database approach. We can host the data of different merchants/users in one database using different methods. Both approaches, single database versus a multi-database have their own advantages and disadvantages:

-   Cost efficiency:
    -   Single database: Cheaper, not only in terms of monetary cost, but also in terms of maintenance.
    -   Multi database: Expensive also in terms of maintenance.
-   Simpler data management:
    -   Single database: managing a single database is easier than managing multiple. For example, in Laravel, setting up access for a single database is easier than setting up access for many.
    -   Multi database: More difficult. For example, in Laravel, we need to setup dynamic database creation which can be difficult to implement and deploy.
-   Data sharing:

    -   Single database: what if we needed to share data between the different tenants? A single database approach makes that easier.
    -   Multi database: Sharing data between tenants would require extra code to define who can access who.

-   Data isolation:
    -   Single database: because all data is one database, if our implementation is not correct, we can be at risk of a merchant accessing the data of another merchant.
    -   Multi database: Completely isolated by design.
-   Performance:

    -   Single database: As request number grows, our single database will be queried more. This will lead to longer query times. However, we can solve this problem by using a database replication approach.
    -   Multi database: better performance as each database can be on its own server.

-   Customization and preferences:
    -   Single database: if we have complex customizations for each tenant, then we might end up with a very complex table structure that is difficult to understand and maintain.
    -   Multi database: much simpler structure because of isolation.

## What is multi-tenancy?

Multi-tenancy is a software architecture concept where a single instance of an application serves multiple tenants. This is a common architecture for SaaS apps such as OrderKing’s app because we need to serve the same software to multiple restaurants and keep their data isolated and separate. There are two approaches to multi-tenancy, single database and multi database and we explain the advantages and disadvantages of both above.

## Which multi tenancy approach would you use for our project? (single or multi-database?

For our project, we will use a single database approach for the following reasons:

-   A single database setup is good enough in this case, assuming that we do not have many merchants.
-   If our number of merchants increases, we can use a solution such as database replication to handle the extra load.
-   This task has a limited time and spending too much time on setting up a multi database approach will disable me from concentrating on other aspects of the task.

## Implementation details

-   How I achieved multi-tenancy:
    I used the relational approach where I created a merchant_id to indicate to which merchant a user belongs.
-   Superadmin, merchant, and user separation: I achieved this separation by creating different folders in the resources folder using inertiajs.

## How to run this project

1- Composer install  
2- npm install  
3- change name of .env.example to .env and change mysql connection details  
3- php artisan migrate  
4- php artisan db:seed  
4- php artisan key:generate  
5- php artisan serve  
6- npm run dev  
7- Go to http://localhost:8000/

## Users

### Superadmin:

username: super_admin@example.com  
password: abcd12345

### Merchant 1:

username: merchant1@example.com  
password: abcd12345

### Merchant 2:

username: merchant2@example.com  
password: abcd12345

### test user that belongs to merchant1:

username: test_user1@example.com  
password: abcd12345

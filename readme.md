

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
* [Getting Started](#getting-started)
  * [Installation](#installation)
* [Contact](#contact)

https://file.fm/u/pkettxgs


<!-- ABOUT THE PROJECT -->
## About The Project

![Hotels-app](https://user-images.githubusercontent.com/41168441/69369728-3cf44500-0ca5-11ea-8e3d-99fc58efcebe.jpg)


## Hotel Management System (dashboard and api to mobile app)

* allow add hotels and rooms 
* allow add pricing list for rooms by specific date range
* allow Search and filter by room available , date , adults , room type and other
* allow login by facebook  
* Reservataions 
* Hotels API documentation example Swagger : [http://hotels360.herokuapp.com/api/documentations] 

## Diagram - RS DB (Hotels)
![Diagram 1](https://user-images.githubusercontent.com/41168441/69369679-29e17500-0ca5-11ea-85ac-3aa3563a0d66.png)




<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.


### Installation


Clone the repository

    git clone git@github.com:https://github.com/abozaky/hotels.git

Switch to the repo folder

    cd hotels

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating (hotels)**)

    php artisan migrate
    
* Set manual localization in table  En and Ar to show all data when insert data from dashboard like add_hotel
* change @OA\Server SwaggerController (url) to http://localhost/hotels/public/api/ 
* change url function (select box - ajax) in path  public\js\dashboard\coustom to url: '/hotels/public/dashboard/ajaxRequest/'+val, 

<!-- CONTACT -->
## Contact

Abdel-Rahmman Mohammed Zaky - [abdo.zaky0@gmail.com]
Project Link: [http://hotels360.herokuapp.com]
Mobile-App: [https://file.fm/u/pkettxgs]




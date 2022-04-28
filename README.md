# Airline-Management-System

A web development based project for simulating the airline flight reservation system.

# Steps to run on your local machine:

1. Copy the 'ams' folder in your 'htdocs' folder located inside xampp.
2. In your web browser, type localhost/ams/  to open up the landing page of the website.
3. Follow the instructions displayed on the page to book or search flights.
4. Click on 'Login/Signup' to login/signup as a passenger or an admin and access the dashboard.

Database name: airline_system

Tables:
* admin_info
* booked_flights
* flights
* passenger_info

ADMIN LOGIN DETAILS (already inserted into the database):
Username: admin
Passsword: admin

Note: The database doesn't have any passenger record or a flight record already inserted into it.
So, you need to add a new flight by logging as admin (using above details) and then selecting the option "Add a new flight".
For creating a new passenger record, Signup as passenger by going to Login/Signup --> Passenger Login --> Signup option.


# Description

Airline Management System is a dedicated and highly configurable system for all airlines, which can be easily accessed by all users. It helps the users to book flights without visiting offline booking counters. This system can be accessible by any user from any location at any time. In such a system, a passenger should be able to view the availability of flights’ details, as per their requirement. They can book the flights online and can also cancel the reservation. The administrator manages the passenger booking system and updates the reservation status.

# Inputs

* User Information
 1. Passenger (Name, Email id, Password, Passport No, Passenger ID, Flight No, Source, Destination, Date, Time)
 2. Administration (Admin ID, Name, Email id, Contact no, Password).

* Flight Information
 1. Domestic Flight (Type of Flight, Flight No, Source, Destination, In between stations, Date, Time, Type of class, Meal, Amount)
 2. International Flight (Type of Flight, Flight No, Source, Destination, In between stations, Date, Time, Type of class, Meal, Amount)
 
# Operations

* Administrator:
 1. Login
 2. Manage passengers
 3. Update the passenger’s status

* Passenger:
 1. Login
 2. Edit Profile
 3. Request to view the available flights as per requirement
 4. Request for reservation
 5. Ticket cancellation

# Outputs

* Display the available flights as per the user’s requirement.
* Display the confirmation of reservation (Display record/Error message).
* Print the ticket.


# Constraints

* All the passengers must register themselves into the system.
* Login information contains only passenger id and password.
* To view the available flight details, passenger has to give source, destination, and date and time.
* After confirmation of reservation request, passenger can see the status.

# Execution pics
![ams1](https://user-images.githubusercontent.com/104520126/165802309-8c554b9f-b213-4640-b3ca-eb989e102129.jpg)
![ams2](https://user-images.githubusercontent.com/104520126/165802307-35d0a624-5467-4bd5-8dfd-03f3b8206458.jpg)
![ams3](https://user-images.githubusercontent.com/104520126/165802303-4c2d3368-9532-411c-9706-fd7ab08bc6b9.jpg)
![ams4](https://user-images.githubusercontent.com/104520126/165802301-900c06f1-a40b-4280-a239-4a9e626431f3.jpeg)
![ams5](https://user-images.githubusercontent.com/104520126/165802299-88061d5e-a2b2-426f-ba78-a2395e63c059.jpg)
![ams6](https://user-images.githubusercontent.com/104520126/165802296-9e2b6cc9-d99e-423e-a5d4-1b2df43b67b0.jpg)



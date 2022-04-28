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
 - Passenger (Name, Email id, Password, Passport No, Passenger ID, Flight No, Source, Destination, Date, Time)
 - Administration (Admin ID, Name, Email id, Contact no, Password).

* Flight Information
 - Domestic Flight (Type of Flight, Flight No, Source, Destination, In between stations, Date, Time, Type of class, Meal, Amount)
 - International Flight (Type of Flight, Flight No, Source, Destination, In between stations, Date, Time, Type of class, Meal, Amount)
 - 
# Operations

* Administrator
 - Login
 - Manage passengers
 - Update the passenger’s status

* Passenger
 - Login
 - Edit Profile
 - Request to view the available flights as per requirement
 - Request for reservation
 - Ticket cancellation

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



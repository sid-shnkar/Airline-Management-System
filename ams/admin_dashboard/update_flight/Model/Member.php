<?php

namespace AMS;

//error_reporting(0);

// ** NOTE: this file contains the class Member with it's functions, which will be helpful
// for updating an existing flight as well as checking if a flight_no already exists.

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    // Function to check if a flight_no already exists
    public function isflightExistOther($flight_no,$flig_id)
    {
        $query = 'SELECT * FROM flights where flight_no = ? and id != ?';
        $paramType = 'ii';
        $paramValue = array(
            $flight_no,$flig_id
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    // Function to update an existing flight detail present in the flights table
    public function updateMember()
    {    
        $response="";
        $isflightnoExists=$this->isflightExistOther($_POST["flight_no"],$_SESSION['flight_id']);

        if ($isflightnoExists)
         {
            $response = array(
                "status" => "error",
                "message" => "Flight no. already exists."
            );
        } 
         else 
         {
            
            $flightno = $_POST["flight_no"];
            $typeofflight =$_POST["type_of_flight"];
            $airline=$_POST["airline"];
            $source=$_POST["source"];
            $destination=$_POST["destination"];
            $typeofclass=$_POST["type_of_class"];
            $meal=$_POST["meal"];
            $amount=$_POST["amount"];
            $intermediatestops= $_POST["intermediate_stops"];
            $doj=$_POST["date_of_journey"];
           $dptime=$_POST["departure_time"];
           $artime=$_POST["arrival_time"];
           $discount=$_POST["discount"];
           $flightstatus=$_POST["flight_status"];

            $query = "UPDATE flights SET type_of_flight=?,flight_no=?,airline=?,source=?,destination=?,intermediate_stops=?,date_of_journey=?,departure_time=?,arrival_time=?,type_of_class=?,meal=?,amount=?,discount=?,flight_status=? WHERE id=".$_SESSION["flight_id"].";";
            
            $paramType = 'sisssssssssiis';
            $paramValue = array(
                $typeofflight,
                $flightno,
                $airline,
                $source,
                $destination,
                $intermediatestops,
                $doj,
                $dptime,
                $artime,
                $typeofclass,
                $meal,
                $amount,
                $discount,
                $flightstatus

            );
            $memberId = $this->ds->update($query, $paramType, $paramValue);
            if (!empty($memberId))
             {
                $response = array(
                    "status" => "success",
                    "message" => "Congratulations ! flight information updated successfully."
                );
             }

        }
        return $response;
    }


}

<?php

// use util\HttpErrorCodes;
// require_once '../utils/Response.php';
// require_once '../Connection.php';
// class UserController
// {
//     private static $db;
//     private static $instance;

//     public static function getInstance(): UserController
//     {
//         // if (self::$instance == null) {
//         //     self::$instance = new UserController(UserController::getInstance());
//         // }
//         return self::$instance;
//     }
//     private function __construct($db)
//     {
//         self::$db = $db;
//     }

//     public function getUser($userId)
//     {
//         $statement = "SELECT id, username, email, password  FROM profiles where id = $userId;";
//         $res = self::$db->query($statement);
//         while($row = $res->fetch_assoc()) {
//             $myArray[] = $row;
//         }
//         Response::ok("User found", $myArray)->send();
//     }

//     public function getAllUsers()
//     {
//         $statement = "SELECT id, username, email, password FROM profiles;";
//         $res = self::$db->query($statement);
//         while($row = $res->fetch_assoc()) {
//             $myArray[] = $row;
//         }
//         Response::ok("User found", $myArray)->send();
//     }

//     public function createUserFromRequest($userName, $email, $password)
//     {
//         if ($userName == null || $email == null || $password == null) {
//             Response::error(HttpErrorCodes::HTTP_BAD_REQUEST, "Missing parameters")->send();
//         }
//         $statement = "INSERT INTO profiles (username, email, password) VALUES ('$userName', '$email', '$password');";
//         if(self::$db->query($statement)){
//             $statement = "SELECT id, username, email, password FROM profiles where id = (SELECT LAST_INSERT_ID())";
//             if($res = self::$db->query($statement)) {
//                 while($row = $res->fetch_assoc()) {
//                     $myArray[] = $row;
//                 }
//                 Response::created("User created", $myArray)->send();
//             }
//         } else {
//             Response::error(HttpErrorCodes::HTTP_INTERNAL_SERVER_ERROR, "User not created")->send();
//         }
//     }

//     public function deleteUser($userId)
//     {
//         if ($userId == null) {
//             Response::error(HttpErrorCodes::HTTP_BAD_REQUEST, "Missing parameters")->send();
//         }
//         $statement = "DELETE FROM profiles WHERE id = $userId;";
//         if(self::$db->query($statement)){
//             Response::ok("User deleted")->send();
//         } else {
//             Response::error(HttpErrorCodes::HTTP_INTERNAL_SERVER_ERROR, "User not deleted")->send();
//         }
//     }
// }
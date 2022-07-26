<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

// old input data start
function old($inputName)
{
    if(isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else {
        return  "";
    }
}
// old input data end

function alert($data , $color = "danger")
{
    return "<p class='alert alert-$color'>$data</p>";
}

// error return start
function setError($inputName , $message)
{
    return $_SESSION["error"][$inputName] = $message;
}

function getError($inputName)
{
    if(isset($_SESSION["error"][$inputName])){
        return $_SESSION["error"][$inputName];
    }else {
        return "";
    }
}

// error return end
function clear()
{
    return $_SESSION["error"] = [];
}
// register start
function register()
{
    $errorStatus = 0;
    $name = "";
    $email = "";
    $password = "";
    $address = "";
    $phone = "";
    $gender = "";
    $file = ""; 
    global $genderArr;
    $supportFileType = [".jpeg",".jpg",".png"];
    if(empty($_POST["name"])){
        setError("name", "Name is required");
        $errorStatus = 1;
    }else {
        if(strlen($_POST["name"]) < 5){
            setError("name", "Name is to short");
            $errorStatus = 1;
        }else {
            if(strlen($_POST["name"]) >15){
                setError("name", "Name is to long");
                $errorStatus = 1;
            }else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
                    setError("name","Only letters and white space allowed");
                    $errorStatus = 1;
                }else {
                    $name = $_POST["name"]; 
                }
            }
        }
    }
    if(empty($_POST["email"])){
        setError("email", "Email is required");
        $errorStatus = 1;
    }else {
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            setError("email", "Email format incorrect");
            $errorStatus = 1;
        }else {
            $email = $_POST["email"];
        }
    }
    if(empty($_POST["password"])){
        setError("password" , "password is required");
        $errorStatus = 1;
    }else {
        if(strlen($_POST["password"]) < 8){
            setError("password" , "password miin 8 greater than");
            $errorStatus = 1;
        }else {
            $password = $_POST["password"];
        }
    }
    if(empty($_POST["password"])){
        setError("address", "address is required");
        $errorStatus = 1;
    }else {
        $address = $_POST["address"];
    }
    if(empty($_POST["phone"])){
        setError("phone", "phone number is required");
        $errorStatus = 1;
    }else {
        if (!preg_match("/^[0-9 ]*$/",$_POST["phone"])) {
            setError("phone","phone formate incorrect");
            $errorStatus = 1;
        }
    }
    if(empty($_POST["gender"])){  
        setError("gender", "gender is required");
        $errorStatus = 1;
    }else {
        if(!in_array($_POST["gender"], $genderArr)){
            setError("gender", "gender format incorrect");
            $errorStatus = 1;
        }else {
            $gender = $_POST["gender"];
        }
    }
    if(empty($_FILES["upload"]["name"])){
        setError("upload", "upload file required");
        $errorStatus = 1;
    }else {
        if(in_array($_FILES["upload"]["type"],$supportFileType)){
            $fileName = $_FILES["upload"]["name"];
            $tmpName = $_FILES["upload"]["tmp_name"];
            $store = "store/";
            if(move_uploaded_file($tmpName, $store.uniqid().$fileName)){
                header("location:form.php");
            }
        }else {
            $file = $_FILES["upload"];
        }
    }

    if($errorStatus == 0){
       echo alert("register success", "success");
    }
}
// register end
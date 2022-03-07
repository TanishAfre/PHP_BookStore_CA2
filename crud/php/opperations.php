<?php

require_once("database.php");
require_once("component.php");

$con = Createdb();

// for Add new record button
if(isset($_POST['create'])){
    createData();
}

// for edit button
if(isset($_POST['update'])){
    updateData();
}

// for delete button
if(isset($_POST['delete'])){
    daleteRecord();
}







function createData(){
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookcost = textboxValue("book_cost");

    if($bookname && $bookpublisher && $bookcost){
        $sql = "INSERT INTO books(book_name, book_publisher, book_cost)
        VALUE('$bookname','$bookcost','$bookpublisher')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully inserted...!");
        } else 
        {
            echo "Error";
        }
    }
    else{
        // echo "Provide data in textbox";
        TextNode("error", "Provide Data in textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }
    else
        return $textbox;
}

// For error or siccess message
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// updating data
function updateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookcost = textboxValue("book_cost");
    $image = textboxValue("image");


    if ($bookname && $bookpublisher && $bookcost && $image) {
        $sql = " 
            UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_cost='$bookcost' WHERE id='$bookid'
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }
        else{
            TextNode("error", "Updation failure");
        }
    } else {
        TextNode("error", "Select data using edit icon");
    }
}

function daleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully");
    }
    else{
        TextNode("error", "Enable to delete record");
    }

}

function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['id'];
        }
    }
    return($id+1);
}

?>
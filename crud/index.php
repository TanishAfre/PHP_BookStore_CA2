<?php
require_once("../crud/php/component.php");
require_once("../crud/php/database.php");
require_once("../crud/php/opperations.php");

Createdb();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <script src="https://kit.fontawesome.com/dc46ef7d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
            <div class="d-flex justify-content-center">
                <form cation="" method="post" class="w-50">
                    <div class="pt-2">
                        <?php inputElement("<i class='fa-solid fa-id-card-clip'></i>","ID", "book_id", setID()); ?>
                    </div>
                    <div class="pt2">
                        <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name", ""); ?>
                    </div>
                    <div class="row pt2">
                        <div class="col">
                            <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher", ""); ?>
                        </div>
                        <div class="col">
                        <?php inputElement("<i class='fas fa-euro-sign'></i>","Cost", "book_cost", ""); ?>
                        </div>
                    </div>
                    <!-- <div class="row pt2">
                        <label>Image:</label>
                        <input type="file" name="image" accept="image/*" />
                        <br> -->
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "bat-toggle='tooltip' data-placement='bottom' title='Create'") ?>

                        <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "bat-toggle='tooltip' data-placement='bottom' title='Read'") ?>

                        <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "bat-toggle='tooltip' data-placement='bottom' title='Update'") ?>

                        <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "bat-toggle='tooltip' data-placement='bottom' title='Delete'") ?>
                    </div>
                </form>
            </div>

            <div class="d-flex table-data">
                <table class="table table-striped table-dark"> 
                    <thead class="thead-dark">
                        <tr>    
                            <td>ID</td>
                            <td>Book Name</td>
                            <td>Publisher</td>
                            <td>Book Cost</td>
                            <!-- <td>image</td> -->
                            <td>Edit</td>
                        </tr>
                    </thead>    
                    <tbody id="tbody">
                        <!-- *************Test Data*****************-->
                        <!-- <tr>
                            <td>1</td>
                            <td>Day in a life of Tanish</td>
                            <td>Tanish Afre</td>
                            <td>69.69</td>
                            <td><i class="fas fa-edit btnedit"> </i></td>

                        </tr>     -->
                        <?php 
                        if(isset($_POST['read'])){
                            $result = getData();
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td data-id=" <?php echo $row['id']; ?> "><?php echo $row['id']; ?> </td>
                                        <td data-id=" <?php echo $row['id']; ?> " ><?php echo $row['book_name']; ?> </td>
                                        <td data-id=" <?php echo $row['id']; ?> "><?php echo $row['book_publisher']; ?> </td>
                                        <td data-id=" <?php echo $row['id']; ?> "><?php echo '€ '.$row['book_cost']; ?> </td>
                                        <!-- <td data-id=" <?php echo $row['id']; ?> "><?php echo $row['image'] ?> </td> -->
                                        <td><i class="fas fa-edit btnedit" data-id=" <?php echo $row['id']; ?> "> </i></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    


    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="../crud/php/main.js">  </script>

    
</body>
</html>
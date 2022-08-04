<?php
    if($_POST["formSubmit"] == "Submit"){ //Quando o botão submit for apertado
        $errorMessage = ""; //erro vazio
        if(empty($_POST["name"])){ //se o campo do nome estiver vazio
            $errorMessage .= "<li>You forgot to enter your name!</li>"; //define a mensagem de erro
        }
        if(empty($_POST["email"])){//se o campo do email estiver vazio
            $errorMessage .= "<li>You forgot to enter your email!</li>"; //define a mensagem de erro
        }
        if(empty($_POST["number"])){//se o campo do numero estiver vazio
            $errorMessage .= "<li>You forgot to enter your rating!</li>"; //define a mensagem de erro
        }
        if(empty($_POST["time-ampm"])){
            $errorMessage .= "<li>You forgot to enter the time!</li>";
        }
        if(empty($_POST["genre-check"])){
            $errorMessage .= "<li>You forgot to enter the genre!</li>";
        }
        if(empty($_POST["review"])){
            $errorMessage .= "<li>You forgot to enter your review!</li>";
        }

        $varName = $_POST["name"]; //define uma variavel para o nome
        $varEmail = $_POST["email"]; //define uma variavel para o email
        $varNumber = $_POST["number"]; //define uma variavel para o numero
        $varLoc = $_POST["location"];
        $varTime = $_POST["time-ampm"];
        $varGenre = $_POST["genre-check"];
        $varReview = $_POST["review"];

        if(!empty($errorMessage)){ //se a mensagem de erro não estiver vazia imrpime o erro
            echo("<p>There was an error with your form: </p>");
            echo("<ul>" . $errorMessage . "</ul>\n");
        }
        else{ //se a mensagem de erro estiver vazia imrpime em um arquivo os dados inseridos
            $fs = fopen("mydata.csv","a"); //abre o aqruivo com append
            fwrite($fs,$varName . ", " . $varEmail . "," . $varNumber .  "," . $varLoc . "," . $varTime .  "," . $varGenre .   "," . $varReview . "\n"); //escreve no arquivo
            fclose($fs); //fecha o arquivo
    
            header("Location: thankyou.html"); //redireciona a página para refazer a pesquisa
            exit();
        }
    }
?>

<!----------------------------------------<!DOCTYPE html>---------------------------------------------------->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Survey Form</title>
    </head>
    <body>
        <h1 id="title">Movies Form</h1>
        <div class="master-div">
            <p>Tell us about the last movie you saw</p>
            <form id="survey-form" action="index.php" method="post">
                <!-- label de nome e input de texto -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="name" id="name-label">Name</label>
                    </div>
                    <div class="fields">
                        <input type="text" name="name" id="name" class="input-fields" placeholder="Enter your name" required>
                    </div>
                </div>
                <!-- label de email e input de texto -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="email" id="email-label">Email</label>
                    </div>
                    <div class="fields">
                        <input type="email" name="email" id="email" class="input-fields" placeholder="Enter your email" required>
                    </div>
                </div>
                <!-- label de nota e input de texto especificado para números de 1 a 10 -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="number" id="number-label">How good was it?</label>
                    </div>
                    <div class="fields">
                        <input type="number" name="number" id="number" class="input-fields" placeholder="1-10" min="1" max="10">
                    </div>
                </div>
                <!-- label de local e dropdown de opções -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="dropdown" id="dropdown-label">Where did you watch it?</label>
                    </div>
                    <div class="fields">
                        <select name="location" id="dropdown" class="dropdown">
                            <option value="theater">Movie Theater</option>
                            <option value="home">At home</option>
                            <option value="streaming">Streaming Services</option>
                            <option value="rent">Rental Shop</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <!-- label de horário e seleção de opção -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="time-of-day">At what time did you watch it?</label>
                    </div>
                    <div class="fields">
                        <ul id="time-of-day" style="list-style: none;">
                            <li class="ampm">
                                <label>
                                    06:00am to 12:00am
                                    <input name="time-ampm" type="radio" value="1" class="user-selection">
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    01:00pm to 05:00pm
                                    <input name="time-ampm" type="radio" value="2" class="user-selection">
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    06:00pm to 10:00pm
                                    <input name="time-ampm" type="radio" value="3" class="user-selection">
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    11:00pm to 05:00am
                                    <input name="time-ampm" type="radio" value="4" class="user-selection">
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- label de gênero e seleção de opções -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="genre">
                            What genre was it??
                            <br>
                            (Select all that apply)
                        </label>
                    </div>
                    <div class="fields">
                        <ul id="genre" style="list-style: none;">
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="1" class="user-selection">
                                    Action
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="2" class="user-selection" type="checkbox">
                                    Fiction
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="3" class="user-selection" type="checkbox">
                                    Comedy
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="4" class="user-selection" type="checkbox">
                                    Romance
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="5" class="user-selection" type="checkbox">
                                    Drama
                                </label>
                            </li>
                            <li class="ampm">
                                <label>
                                    <input name="genre-check" type="checkbox" value="6" class="user-selection" type="checkbox">
                                    Animation
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- label de review e input de texto grande -->
                <div class="form-rows">
                    <div class="labels">
                        <label for="movie-detail">Please enter the name of the movie<br>and your review</label>
                    </div>
                    <div class="fields">
                        <textarea id="movie-details" name="review" class="input-fields" name="movie-details" cols="1" rows="1" placeholder="Enter your review here..."></textarea>
                    </div>
                </div>
                <!-- botão de enviar -->
                <input class="button" id="submit" type="submit" name="formSubmit" value="Submit"/>
            </form>
        </div>
    </body>
</html>
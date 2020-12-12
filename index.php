<?php
//To mark navigation option 'active'
$home = 'selected';
require 'inc/header.php';
?>

<html>
    <body>
    <div class="jumbotron well">
        <h1>Welcome to My Meals</h1>
        <div class='row mt-4'>
            <div class="col-md-6 text-center">
                <img src="./images/kelvin-theseira-AcA8moIiD3g-unsplash.jpg" width=500 alt="Pizza"></img>
            </div>
            <div class="col-md-6 text-center">
                <div class="card-container">
                    <p>Wanna cook a deilicious pizza like this ? Check out the pizza recipe in the view recipes section!</p>
                </div>
                <button class='regular-btn' onclick="window.location.replace('/recipe.php?id=119')">Take me there !</button>
            </div>
        </div>
    </div>
    </body>
</html>
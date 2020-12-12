<div class="jumbotron well">
    <div class="container">
        <h1><?php echo $recipeTitle; ?></h1>
        <h2><?php echo $subTitle; ?> </h2>
        <?php
            $url =  $_SERVER['REQUEST_URI']; 
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params); 
            $recipe_id = $params['id']; 

            if(isset($_POST['commentText'])){
                $commentText = trim(filter_input(INPUT_POST,'commentText',FILTER_SANITIZE_STRING));
                add_comment($db,$recipe_id,$commentText);
            }
        ?>
        <div class="container">
            <div class="col-md-4" style="padding-left: 0px;  padding-right: 0px;">
                <img src='<?php
                    $image = get_image($db, $id);
                    foreach($image as $item){
                        if($item != 'NULL' && $item !=""){
                              echo $item;
                        }else{
                            echo "/images/No_Image_Taken.jpg";
                        }
                    }
                ?>' alt="'Image of <?php echo $recipeTitle; ?>" class="img-responsive">
            </div> <!--End col-md-4 div-->
            <div class="col-md-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ingredients</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $ingredients = get_ingredients($db, $id);
                        foreach ($ingredients as $item){
                            echo "<tr><td>";
                            echo $item['amount']." ";
                            if ($item['measurement'] != "NULL"){
                              echo $item['measurement']." ";  
                            }
                            echo $item['ingredient'];
                            echo "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div> <!--End col-md-4 div-->
            <div class="col-md-4">
                <h2>Procedure</h2>
                <?php 
                $cookingProcedure = get_cooking_procedure($db, $id);
                foreach ($cookingProcedure as $item){
                    echo "<br>";
                    echo $item['cooking_procedure'];
                }
                ?>
                <br><br>
            </div> <!-- End col-md-4 div-->
            <div class="col-md-4">
                <h2>Youtube Link</h2>
                <?php 
                $youtubeLink = get_youtube_link($db, $id);
                foreach ($youtubeLink as $item){
                    echo "<br>";
                    echo "<a href=${item['videourl']} target=\"_blank\">";
                    echo $item['videourl'];
                    echo "</a>";
                }
                ?>
                <br><br>
            </div>
            <div clas="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-bottom:50px">Comments section</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $comments = get_comments($db, $recipe_id);
                            foreach ($comments as $item){
                                echo "<tr><td>";
                                echo $item['comment_text']." ";
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="row" style="margin-top:2rem;">
                        <form action="" method="post">
                            <div class="col-md-8" >
                                <input type="text" name="commentText" id="commentText" class="input-sm" style="width:100%;padding:20px 20px"></input>
                            </div>
                            <div class="col-md-4">
                                <button style="width:100%;margin-top:0" type="submit" class="regular-btn">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- End container div -->
        <br>
    </div><!-- End Recipe div -->
</div><!-- End Jumbotron Well div -->

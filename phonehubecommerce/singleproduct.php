<?php include_once "includes/db_connect.php"; ?>
<?php include_once "includes/function.inc.php"; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single Product - Phonehub</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <?php
    $page = 'singleproduct'; include 'header.php';
    ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="singleproduct.php" method="GET">
                             <input id="searchbar" name="searchkey" type="text" placeholder="Search..">
                             <input type="submit" value="Search">
                        </form>
                    </div>

       <!-- --------------------------------------------              -->

        <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <div class="scrollable">
                                
                          
                 <?php 
                       $searchkey="";
                    if (isset($_GET['searchkey'])){
                 $searchkey=htmlentities($_GET['searchkey']);     
                      
                      $arr = searching($conn, $searchkey);                         
                           
                  if(!empty($arr)){
    
      foreach($arr as $key => $val){  ?>
            <div class="col-md-12 col-sm-12">
                    <div class="single-shop-product">
                        <div class="product-single">
                            <img src="img/<?php echo $val['item_image']?>" class="recent-thumb" alt="">
                        </div>
                        <h2><a href="singleproduct.php?disitem=<?php echo $val['item_code']?>"> <?php echo $val['item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins>  <span class="glyphicon glyphicon glyphicon-ruble"></span> 
                                <?php echo number_format($val['item_price']) ?>
                           </ins>
                        </div>

                    </div>
                </div>
    <?php
   }
   }
         else{
       echo "<h4> No Records Found.</h4>";
             }
   }
             else if (!isset($_GET['item_code'])){
                $itemslist = allitemList($conn,'A');
                foreach($itemslist as $key => $item_code){ ?>
                       <div class="col-md-12 col-sm-12">
                    <div class="single-shop-product">
                        <div class="product-single">
                            <img src="img/<?php echo $item_code['item_image']?>" class="recent-thumb" alt="">
                        </div>
                        <h2><a href="singleproduct.php?disitem=<?php echo $item_code['item_code']?>"> <?php echo $item_code['item_name'] ; ?> </a></h2>
                        <div class="product-carousel-price">
                            <ins>  <span class="glyphicon glyphicon glyphicon-ruble"></span> 
                                <?php echo number_format($item_code['item_price']) ?>
                           </ins>
                        </div>

                    </div>
                </div>

             <?php }
                } 
   
   
   ?>
                 </div>
            </div>
         </div>
    </div>
     <!-- end of the side-bar -->


<!-- ------------------------------------------------------------------------ -->
                <div class="col-md-8">
                    <div class="product-content-right">
                         <div class="row">
                            <!-- <div class="col-sm-6"> -->
                                
                    <?php $disitem="";
                            if (isset($_GET['disitem'])){
                                $disitem=htmlentities($_GET['disitem']);     
                                $arr = DisplayEachItem($conn, $disitem);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>
                                        <div class="product-images">
                                            <div class="product-main-img" align="center">
                                                <img src="img/<?php echo $val['item_image']?>" alt="">
                                            </div>
                                        </div>
                    <?php
                                                                }
                                                }
                            else{
                                echo "<h4> No Records Found.</h4>";
                                }
                }

                else{
                        $disitem="";
                            if (!isset($_GET['disitem'])){
                                $arr = DisplayEachItem($conn, $disitem);                         
                           
                                if(!empty($arr)){
                                    foreach($arr as $key => $val){  ?>
                  
                        <div class="product-images">
                            <div class="product-main-img" align="center"> 
                                <img src="img/<?php echo $val['item_image']?>" alt="">
                            </div>          
                        </div>
                   
                    
                    <?php
                                                                }
                                                }
                                                            }
                    } ?>
                        </div>
        

<!-- ------------------------ end of the image part  ------------------------------------------------- -->




                            <div class="col-sm-6">
                                <div class="product-inner">
                 <?php
                    $disitem="";
                        if (isset($_GET['disitem'])){
                            $disitem=htmlentities($_GET['disitem']);     
                                $arr = DisplayEachItem($conn, $disitem);                         
                                    if(!empty($arr)){
                                        foreach($arr as $key => $val){  ?>
                                            <h2 class="product-name"> <?php echo $val['item_name'] ; ?> </h2>
                        
                    <div class="product-inner-price">
                            <ins>  <span class="glyphicon glyphicon glyphicon-ruble"></span> 
                                <?php echo number_format($val['item_price']) ?>
                           </ins>
                    </div>

                    <form action="" class="cart">
                        <div class="quantity">
                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        </div>
                                        
                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                    </form>

                        <div class="product-inner-category">
                                        <p>Category: <a href="shop.php?brandname=<?php echo $val['cat_id'];?>"><?php echo $val['cat_desc'];?></a> 

                                                <br>
                                            Shop: <a href="shop.php?shop_id=<?php echo $val['supp_id'] ; ?>"><?php echo $val['supp_name'];?></a>
                                        </p>
                        </div>
                        </div>
                        </div>

                         <div class="col-sm-6">
                             <div class="product-inner">
                        <div role="tabpanel">
                            <ul class="product-tab" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>
                                </li>
                                 <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                                </li>
                            </ul>
                                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <h2>Product Description</h2>
                                                
                                    <p> <?php echo $val['item_desc']?>  </p>
                            </div>
                                            
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <h2>Reviews</h2>
                                    <div class="submit-review">
                                        <p><label for="name">Name</label> <input name="name" type="text"></p>
                                        <p><label for="email">Email</label> <input name="email" type="email"></p>
                                        
                                        <div class="rating-chooser">
                                         <p>Your rating</p>

                                            <div class="rating-wrap-post">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
        <?php
                }
            }
        }

        else{
                $disitem="";
                    if (!isset($_GET['disitem'])){
                        $arr = DisplayEachItem($conn, $disitem);                         
                           
                            if(!empty($arr)){
    
                                foreach($arr as $key => $val){  ?>

                              <h2 class="product-name"> <?php echo $val['item_name'] ; ?> </h2>

                    <div class="product-inner-price">
                            <ins>  <span class="glyphicon glyphicon glyphicon-ruble"></span> 
                                <?php echo number_format($val['item_price']) ?>
                           </ins>
                    </div>

                    <form action="" class="cart">
                        <div class="quantity">
                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        </div>
                                <button class="add_to_cart_button" type="submit">Add to cart</button>
                    </form>

                        <div class="product-inner-category">
                                <p>Category: <a href="shop.php?brandname=<?php echo $val['cat_id'];?>"><?php echo $val['cat_desc'];?></a> 
                                        <br>

                                            Shop: <a href="shop.php?shop_id=<?php echo $val['supp_id'] ; ?>"><?php echo $val['supp_name'];?></a>
                                </p>
                            </div>
                         </div>
                        </div>


                        <div class="col-sm-6">
                             <div class="product-inner">

                            <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a>
                                            </li>
                                        </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <h2>Product Description</h2>
                                                
                                            <p> <?php echo $val['item_desc']?>  </p>
                                    </div>
                                            
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                
                                                <div class="rating-chooser">
                                                <p>Your rating</p>
                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                        <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                            <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                <?php
                    }
                }
            }
        } ?>
                </div>
            </div>
        </div>

<!-- 
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

<!-- -------------------------------------------------------------------- -->
                        </div>








                </div>
            </div>
        </div>
    </div>


    <?php
    include 'footer.php';
    ?>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!--   para lang makita ko kung ano na piga edit sa css-->
    <style>
    <?php include "style.css" ?>
    </style>
</body>

</html>


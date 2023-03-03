<?php 
require("../NavBar/customerNavBar.php");
$db = new SQLITE3('C:\xampp\Data\database.db');
$sql = "SELECT * FROM Products";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
$data = [];
while ($row = $result->fetchArray()){
    $data [] = $row; }
?>
<link rel="stylesheet" href="..\stylesheet\viewproduct.css" />


<div class="viewContainer">
        <div class="search">
            <h1>poly<span>lith</span></h1>
            <input type="text" name="search" value="" class="form-control" placeholder="I'm shopping for...">
            <button type="submit" class="search-button">Search</button>
        </div>
    </form>

    <div class="filters">
        <h2>Available Products</h2><br>
    </div>
    <div class = "mid-view-container">
        <div class= "nav-menu">
        </div>

                    <table class="productsTable">
                        <?php for ($i=1; $i<count($data); $i++):?>
                            <?php   
                            $puid = $data[$i]['puid']
                            ?>
                        <td>
                            <a class="productShape" href=<?php echo "customerProductPage.php?puid=".$puid; ?>>
                                <div class="Image">
                                <?php
                                $puid = $data[$i]['puid'];
                                $imageAdded = $data[$i]['ImageAdded'];
                                if($imageAdded == "no"){
                                echo "<img src='..\uploadedImages\default.png'>";
                                } else{
                                    echo "<img src='..\uploadedImages\product".$puid.".png'>";
                                }
                                ?>
                                </div>
                                <div class="producttext">
                                    <div class="productName">
                                        <?php echo $data[$i]['ProductName']?> 
                                    </div>
                                    <div class="price">
                                        <?php echo "£".$data[$i]['price']?>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <?php if ($i % 6 == 0): ?>
                        </tr>
                        <tr>
            <?php endif;?>
                        <?php endfor;?>
                    </table>
                        </div>
                </div>



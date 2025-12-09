<!DOCTYPE html>
<html >
<head>
    <title>Document</title>
</head>
<body>
    <?php

        class Product {
            public $name;
            public $category;
            public $price;

            function set_product_details($n, $c, $p) {
                $this->name = $n;
                $this->category = $c;
                $this->price = $p;
            }

            function getPrice() {
                return $this->price;
            }

            function checkDiscountStatus() {
                if ($this->price > 2000) {
                    return "Discount Available";
                } else {
                    return "Regular Price (No Discount)";
                }
            }
        }

        $prod1 = new Product();
        $prod1->set_product_details("Watch", "Accessories", 5000);

        $prod2 = new Product();
        $prod2->set_product_details("T-Shirt", "Clothing", 800);

        $prod3 = new Product();
        $prod3->set_product_details("Shoes", "Footwear", 2500);

        $productList = array($prod1, $prod2, $prod3);
        
        echo "<h3>Online Store Product List</h3>";

        foreach ($productList as $item) {
            echo "<hr>";
            echo "<strong>Product Name:</strong> " . $item->name . "<br>";
            echo "<strong>Category:</strong> " . $item->category . "<br>";
            echo "<strong>Price:</strong> " . $item->getPrice() . " Taka<br>";
            echo "<strong>Status:</strong> " . $item->checkDiscountStatus() . "<br>";
        }

    ?>
</body>
</html>
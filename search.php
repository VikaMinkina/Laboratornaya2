<?php
$products = array(
    array(
        "url"         => "product.html",
        "img"         => "product1.jpg",
        "alt"         => "Товар 1",
        "title"       => "ATTAR Hayati",
        "description" => "Парфюмерная вода"
    ),
    array(
        "url"         => "product1.html",
        "img"         => "product2.jpg",
        "alt"         => "Товар 2",
        "title"       => "VIVIENNE SABO",
        "description" => "Блеск для губ Le Grand Volume"
    ),
    array(
        "url"         => "product2.html",
        "img"         => "product3.jpg",
        "alt"         => "Товар 3",
        "title"       => "TOO COOL FOR SCHOOL",
        "description" => "BB-крем After School"
    )
);

$searchTerm = trim($_POST['search_q']);

if(empty($searchTerm)){
    echo "Введите поисковый запрос";
    exit;
}

$searchTerm = strtolower($searchTerm);
$results = array();

foreach($products as $product){
    if (stripos(strtolower($product['title']), $searchTerm) !== false ||
        stripos(strtolower($product['description']), $searchTerm) !== false) {
        $results[] = $product;
    }
}

if(count($results) > 0){
    echo "<table border='0' cellspacing='10'>";
    $counter = 0;
    echo "<tr>";
    foreach($results as $product){
         echo "<td align='center'>";
         echo "<a href='" . $product['url'] . "'>";
         echo "<img src='" . $product['img'] . "' alt='" . $product['alt'] . "' width='150'><br>";
         echo $product['title'] . "<br>";
         echo $product['description'];
         echo "</a>";
         echo "</td>";
         $counter++;
         if($counter % 3 == 0){
             echo "</tr><tr>";
         }
    }
    echo "</tr>";
    echo "</table>";
} else {
    echo "Ничего не найдено";
}
?>

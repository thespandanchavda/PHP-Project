<div class="container">
    <h1><?= $title ?></h1>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>TV Brand's</title>
</head>
<body>
    <h1>Parent Resource Index</h1>
    <a href="create.php">Add New Parent Resource</a>
    <table>
        <tr>
            <th>Brand Name</th> 
        </tr>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?=$product->name?></td>
                    <td>
                       <a href="" class="btn-btn-warning"></a>
                       <a href="" class="btn-btn-warning"></a>
                    </td>
                </tr>
        </tbody>
        <?php
        
        ?>
    </table>
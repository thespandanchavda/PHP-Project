<?php
         require_once("./models/ProductModel.php");

    function index () {
        $products=ProductModel::findAll();

        render("products/index", [
            "title" => "Enter the Brand You want to Enter",
            "products" => $products
        ]);
    }
    function _new () {
        $products = ProductModel::findAll();

        render("products/new", [
            "title" => "New Brand",
            "action" => "create",
            "products" => ($products ?? [])
        ]);
    }

    function edit ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("", ["errors" => "Missing required ID :"]);
        }

        $products= ProductModel::find($request["params"]["id"]);
        if (!$todo) {
            return redirect("", ["errors" => "Brand does not exists"]);
        }

        $products = ProductModel::findAll();

        render("product/edit", [
            "title" => "Edit Brand",
            "brand" => $products,
            "edit_mode" => true,
            "action" => "update",
            "products" => ($products ?? [])
        ]);
    }

    function create () {
        // Validate field requirements
        validate($_POST, "products/new");
        
        // Write to database if good
        ProductModel::create($_POST);

        redirect("", ["success" => "Product Found Successfully"]);
    }

    function update () {
        // Missing ID
        if (!isset($_POST['id'])) {
            return redirect("products", ["errors" => "Missing  ID required"]);
        }

        // Validate field requirements
        validate($_POST, "product/edit/{$_POST['id']}");

        // Write to database if good
        ProductModel::update($_POST);
        redirect("", ["success" => "Todo was updated successfully"]);
    }

    function delete ($request) {
        // Missing ID
        if (!isset($request["params"]["id"])) {
            return redirect("product", ["errors" => "Missing required ID parameter"]);
        }

        ProductModel::delete($request["params"]["id"]);

        redirect("", ["success" => "Todo was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["item", "completed_datetime", "status_id"];
        $errors = [];

        // No empty fields
        foreach ($fields as $field) {
            if (empty($package[$field])) {
                $humanize = ucwords(str_replace("_", " ", $field));
                $errors[] = "{$humanize} cannot be empty";
            }
        }

        // Completed date must be in the future
        if (strtotime($package["completed_datetime"]) < strtotime("now")) {
            $errors[]= "Completed Date must be in the future";
        }

        if (count($errors)) {
            return redirect($error_redirect_path, ["form_fields" => $package, "errors" => $errors]);
        }
    }

?>
?>
<?php

    require_once("./models/SModelModel.php");

    function index () {
        $statuses = ModelModel::findAll();

        render("model/index", [
            "model" => $models,
            "title" => "models"
        ]);
    }

    function _new () {
        render("model/new", [
            "title" => "New Model",
            "action" => "create"
        ]);
    }

    function edit ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("", ["errors" => "Missing required ID parameter"]);
        }

        $status = ModelModel::find($request["params"]["id"]);
        if (!$status) {
            return redirect("", ["errors" => "Status does not exist"]);
        }

        render("model/edit", [
            "title" => "model",
            "status" => $model,
            "edit_mode" => true,
            "action" => "update"
        ]);
    }

    function create () {
        // Validate field requirements
        validate($_POST, "model/new");
        
        // Write to database if good
        ModelModel::create($_POST);

        redirect("statuses", ["success" => "Status was created successfully"]);
    }

    function update () {
        // Missing ID
        if (!isset($_POST['id'])) {
            return redirect("statuses", ["errors" => "Missing required ID parameter"]);
        }

        // Validate field requirements
        validate($_POST, "model/edit/{$_POST['id']}");

        // Write to database if good
        StatusModel::update($_POST);
        redirect("model", ["success" => "Status was updated successfully"]);
    }

    function delete ($request) {
        // Missing ID
        if (!isset($request["params"]["id"])) {
            return redirect("statuses", ["errors" => "Missing required ID parameter"]);
        }

        StatusModel::delete($request["params"]["id"]);

        redirect("statuses", ["success" => "Status was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["name"];
        $errors = [];

        // No empty fields
        foreach ($fields as $field) {
            if (empty($package[$field])) {
                $humanize = ucwords(str_replace("_", " ", $field));
                $errors[] = "{$humanize} cannot be empty";
            }
        }

        if (count($errors)) {
            return redirect($error_redirect_path, ["form_fields" => $package, "errors" => $errors]);
        }
    }

?>
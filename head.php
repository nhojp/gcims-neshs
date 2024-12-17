<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCIMS</title>
        <link rel="icon" href="img/gcims_logo.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background-color: white;
            display: flex;
            flex-direction: column;
        }

        .filter-list .form-group {
            margin-top: 15px;
            margin-bottom: 0;
            flex-grow: 1;
            margin-left: 10px;
        }


        .filter-list .btn {
            height: 38px;
            padding: 0 35px;
            width: 100%;
        }


        .filter-list .dropdown-menu {
            width: 100%;
            max-width: 200px;
        }


        .filter-list select.form-control {
            width: 100%;
            padding: 0 10px;
        }


        .filter-list .form-row {
            display: flex;
            flex-wrap: wrap;
        }


        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            white-space: nowrap;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .table tbody tr:hover {
            background-color: #e1e1e1;
        }


        .custom-page-link {
            width: 40px;
            height: 40px;
            padding: 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            background-color: #1F5F1E;
            color: white;
        }

        .custom-page-link:hover {
            background-color: #155d14;
        }

        .page-item.active .page-link {
            background-color: #155d14;
            border-color: #155d14;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .pagination .page-item .page-link {
            width: 40px;
            height: 40px;
            padding: 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            background-color: #0C2D0B;
            color: white;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            background-color: #28a745;
            border-color: #28a745;
        }

        .pagination .page-item:hover .page-link {
            background-color: #218838;
            border-color: #218838;
        }

        .custom-message {
            margin-top: 30px;
            color: #1F5F1E;
            font-size: 16px;
        }
        
    </style>
</head>

<body>
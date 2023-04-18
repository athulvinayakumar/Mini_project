<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" type="text/css">

    <style type="text/css">
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 32px;
            text-transform: uppercase;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #666;
        }

        input,
        select,
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            line-height: 1.5;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-top: 10px;
            font-weight: bold;
            color: #666;
            margin-right: 10px;
        }

        .form-group select,
        .form-group textarea {
            margin-bottom: 20px;
        }

        @media only screen and (min-width: 600px) {
            .form-group {
                flex-direction: row;
                align-items: center;
            }

            .form-group label {
                margin-top: 0;
                margin-bottom: 0;
            }

            .form-group select,
            .form-group textarea {
                margin-bottom: 0;
                margin-left: 10px;
            }
        }

        .container {
            margin-top: 75px;
        }
    </style>

</head>

<body>
    <form action="feedbackaction.php" method="post">
        <div class="container">
            <h1>Feedback Form</h1>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating">
                    <option value="excellent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
                <label style="margin-left: 30px;" for="comment">Comment:</label> <textarea id="comment" name="comment"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>

</html>
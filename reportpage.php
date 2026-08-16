<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Reports Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0077b6, #00b4d8);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }

        h1 { color: #0077b6; margin-bottom: 10px; }
        p { color: #666; margin-bottom: 30px; }

        .btn {
            display: block;
            width: 80%;
            margin: 15px auto;
            padding: 15px;
            text-decoration: none;
            color: white;
            background: #0077b6;
            border-radius: 10px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn:hover {
            background: #00b4d8;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

        .btn-back {
            margin-top: 20px;
            color: #888;
            font-size: 14px;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📊 Reports Dashboard</h1>
    <p>Please select the section you would like to view the data from:</p>
    
    <a href="report1.php" class="btn">📅 Appointments Report</a>
    <a href="report.php" class="btn">👥 BOOKING Report</a>
    <a href="report2.php" class="btn">👥 Registration Report</a>
    <br>
    <a href="HOME.php" class="btn-back">⬅ Back to Main Page</a>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(180deg, #fdf6f0 0%, #f7f3ee 100%);
            color: #2b2b2b;
            margin: 0;
            padding: 50px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1050px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 32px;
            text-align: center;
        }

        .page-header .eyebrow {
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #c9967a;
            font-weight: 500;
            margin-bottom: 6px;
        }

        h1 {
            font-size: 30px;
            font-weight: 600;
            margin: 0;
            color: #1a1a1a;
        }

        .table-wrap {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid #f0e8e0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            padding: 18px 20px;
            background-color: #fbf7f3;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #9a8a7d;
            border-bottom: 1px solid #f0e8e0;
        }

        tbody td {
            padding: 16px 20px;
            font-size: 15px;
            border-bottom: 1px solid #f5f0eb;
            vertical-align: middle;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #fdfaf7;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        td:first-child {
            color: #b5a89b;
            font-weight: 500;
        }

        td:nth-child(2) {
            font-weight: 500;
            color: #1a1a1a;
        }

        td:nth-child(3) {
            color: #c9967a;
            font-weight: 600;
        }

        td:nth-child(3)::after {
            content: " บาท";
            font-size: 12px;
            font-weight: 400;
            color: #b5a89b;
        }

        td img {
            width: 70px !important;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #f0e8e0;
            display: block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        td:last-child span {
            display: inline-block;
            padding: 4px 12px;
            background-color: #f5efe8;
            color: #a9855f;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 28px;
            padding: 12px 24px;
            background-color: #2b2b2b;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .btn-back:hover {
            background-color: #c9967a;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(201, 150, 122, 0.35);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="eyebrow">Menu List</div>
            <h1>รายการเมนูอาหาร</h1>
        </div>

    <?php
        //แสดง error
        // Report all PHP errors
    error_reporting(E_ALL);

        // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "action/connect.php";

    //      เมนู       จาก ตาราง menus
    $sql = "SELECT * FROM menus";
    //                  ที่อยู่ฐาน , คิวรี่
    $result = mysqli_query($con , $sql);
    // ทดสอบ
    // var_dump($result);
    ?>

    <div class="table-wrap">
    <table border=1>
        <thead>
            <th>รหัสเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th>ภาพ</th>
            <th>ประเภท</th>
        </thead>
    

    <?php
        foreach($result as $menu){
            ?>
            <tr>
                <td><?= $menu["menu_id"]?></td>
                <td><?= $menu["menu_name"]?></td>
                <td><?= $menu["menu_price"]?></td>
                <td>
                    <img
                        src="<?= $menu["menu_image"]?>"
                        alt=""
                        style="width:200px"
                    >
                </td>
                <td><span><?= $menu["type_id"]?></span></td>
            </tr>
            <?php
        }
    ?>
    </table>
    </div>
        <a href="menu_type.php" class="btn-back">← ไปหน้าเมนูtyes</a>
    </div>
</body>
</html>
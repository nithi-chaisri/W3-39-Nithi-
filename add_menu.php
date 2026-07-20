<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเมนูใหม่</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700&family=IBM+Plex+Mono:wght@400;500;600&family=Noto+Sans+Thai:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #241f18;
            --paper: #fbf7ec;
            --pine: #24402f;
            --pine-dark: #182b20;
            --turmeric: #c98a1a;
            --line: #d8cfb8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 20px;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.04), transparent 40%),
                var(--pine);
            font-family: 'Noto Sans Thai', 'IBM Plex Mono', sans-serif;
            color: var(--ink);
        }

        .ticket-wrap {
            position: relative;
            width: 100%;
            max-width: 460px;
        }

        .stamp {
            position: absolute;
            top: -18px;
            right: 22px;
            background: var(--turmeric);
            color: var(--pine-dark);
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 7px 12px;
            border-radius: 3px;
            transform: rotate(4deg);
            box-shadow: 0 4px 10px rgba(0,0,0,0.25);
            z-index: 2;
        }

        .ticket {
            position: relative;
            background: var(--paper);
            border-radius: 10px;
            padding: 40px 34px 34px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.35);
        }

        .ticket::before,
        .ticket::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 26px;
            height: 13px;
            background: var(--pine);
            border-radius: 0 0 999px 999px;
        }
        .ticket::before { top: 0; }
        .ticket::after { bottom: 0; border-radius: 999px 999px 0 0; }

        .eyebrow {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--turmeric);
            margin: 0 0 6px;
        }

        h1 {
            font-family: 'Fraunces', serif;
            font-weight: 700;
            font-size: 30px;
            margin: 0 0 26px;
            line-height: 1.2;
        }

        .field {
            padding: 14px 0;
            border-bottom: 1px dashed var(--line);
        }
        .field:last-of-type { border-bottom: none; }

        label {
            display: block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #6b6152;
            margin-bottom: 6px;
        }

        input[type="text"],
        select {
            width: 100%;
            border: none;
            background: transparent;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 17px;
            color: var(--ink);
            padding: 4px 0;
            outline: none;
            appearance: none;
        }

        select {
            cursor: pointer;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3e%3cpath fill='%236b6152' d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 2px center;
            background-size: 20px;
            padding-right: 26px;
        }

        input[type="text"]::placeholder { color: #b9ae97; }

        .field:focus-within label { color: var(--pine); }
        .field:focus-within { border-bottom-color: var(--pine); }

        button {
            width: 100%;
            margin-top: 28px;
            padding: 15px;
            border: none;
            border-radius: 6px;
            background: var(--pine);
            color: var(--paper);
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.02em;
            cursor: pointer;
            transition: background 0.15s ease, transform 0.15s ease;
        }
        button:hover { background: var(--pine-dark); }
        button:active { transform: scale(0.99); }

        .perf {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 24px;
            opacity: 0.5;
        }
        .perf span {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--pine);
        }
    </style>
</head>
<body>

    <div class="ticket-wrap">
        <div class="stamp">Kitchen Order</div>
        <div class="ticket">
            <p class="eyebrow">รายการใหม่</p>
            <h1>เพิ่มเมนูอาหาร</h1>

            <form action="action/insert_menu.php" method="post">

                <div class="field">
                    <label for="menu_id">รหัสเมนู</label>
                    <input type="text" id="menu_id" name="menu_id" placeholder="เช่น M001">
                </div>

                <div class="field">
                    <label for="menu_name">ชื่อเมนู</label>
                    <input type="text" id="menu_name" name="menu_name" placeholder="เช่น ผัดกะเพราหมูสับ">
                </div>

                <div class="field">
                    <label for="menu_price">ราคา</label>
                    <input type="text" id="menu_price" name="menu_price" placeholder="บาท">
                </div>

                <div class="field">
                    <label for="menu_image">ภาพ</label>
                    <input type="text" id="menu_image" name="menu_image" placeholder="ลิงก์รูปภาพ">
                </div>



                
                <?php
            //แสดง error
    error_reporting(E_ALL);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
            include "action/connect.php";
        // ดึงทั้งหมดจากตาราง menu_types
            $sql="SELECT * FROM menu_types";
            
            $result = mysqli_query($con , $sql);
        ?>

        <label for="">ประเภทเมนู</label>
        <select name="type_id" >
            <?php
                foreach($result as $type){
                    ?>
                        <option value="<?=$type["type_id"] ?>"> <?= $type["type_name"] ?></option>
                    <?php
                }
            ?>



                    </select>
                </div>

                <button>บันทึกเมนู</button>
            </form>

            <div class="perf">
                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div>

</body>
</html>
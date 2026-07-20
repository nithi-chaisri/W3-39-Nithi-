<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
      :root{
        --green: #0e633e;
        --green-dark: #0a472c;
        --orange: #fa7300;
        --bg: #f8fafc; /* พื้นหลังสว่างสะอาดตา */
        --card: #ffffff;
        --border: #e2e8f0; /* เส้นขอบโทนสีเทาอ่อนมินิมอล */
        --text: #0f172a; /* สีตัวอักษรเข้มแบบนุ่มนวล */
        --text-soft: #64748b;
        --radius: 12px; /* ขอบโค้งมนที่ดูละมุน */
      }

      *{ box-sizing: border-box; }

      body{
        margin: 0;
        font-family: "Segoe UI", "Sarabun", Tahoma, sans-serif;
        background-color: var(--bg);
        
        /* ===== คงลายตาข่ายพื้นหลังไว้เหมือนเดิม 100% ===== */
        background-image:
          linear-gradient(rgba(0,0,0,0.035) 1px, transparent 1px),
          linear-gradient(90deg, rgba(0,0,0,0.035) 1px, transparent 1px);
        background-size: 28px 28px;
        background-position: -1px -1px;
        
        color: var(--text);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 24px;
        -webkit-font-smoothing: antialiased;
      }

      /* ===== กล่องฟอร์มสไตล์มินิมอลการ์ด ===== */
      form {
        background: var(--card);
        width: 100%;
        max-width: 480px; /* จำกัดความกว้างฟอร์มให้กระชับดูสวยงาม */
        padding: 32px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
      }

      /* หัวข้อฟอร์มจำลอง (สร้างด้วย CSS เพื่อความมินิมอลโดยไม่ต้องแก้ HTML) */
      form::before {
        content: "แก้ไขข้อมูลเมนู";
        display: block;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 24px;
        color: var(--text);
        letter-spacing: -0.5px;
      }

      /* ===== จัดการ Label และ Input ให้เป็นระเบียบ ===== */
      label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-soft);
        margin-bottom: 6px;
      }

      input[type="text"], select {
        width: 100%;
        padding: 10px 14px;
        font-family: inherit;
        font-size: 14px;
        color: var(--text);
        background-color: #fff;
        border: 1px solid var(--border);
        border-radius: 8px;
        outline: none;
        transition: all 0.2s ease;
        margin-bottom: 18px; /* เว้นระยะห่างระหว่างช่องกรอก */
      }

      /* เอฟเฟกต์ตอนคลิกเลือกช่องกรอก */
      input[type="text"]:focus, select:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(14, 99, 62, 0.1);
      }

      /* ปรับแต่งช่องรหัสเมนู ให้ดูเหมือนห้ามแก้ไข (Read-only สไตล์) */
      input[name="menu_id"] {
        background-color: #f1f5f9;
        color: var(--text-soft);
        cursor: not-allowed;
      }

      /* ล้างค่าแท็ก <br> ดั้งเดิมออก เพื่อให้การจัดระยะของ CSS ทำงานได้แม่นยำ */
      form br {
        display: none;
      }

      /* ===== ปุ่มบันทึกสไตล์มินิมอล ===== */
      button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: var(--text); /* ปุ่มสีเข้มเรียบหรู */
        color: #ffffff;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 8px;
      }

      button:hover {
        background-color: var(--green); /* เปลี่ยนเป็นสีเขียวเวลานำเมาส์ไปชี้ */
        transform: translateY(-1px);
      }
      
      button:active {
        transform: translateY(0);
      }
    </style>
</head>
<body>
    <?php
        $id = $_GET['id'];
        include "action/connect.php";

        $sql = "SELECT * FROM menus WHERE menu_id = '$id'";

        $result = mysqli_query($con, $sql);

        $menu = mysqli_fetch_assoc($result);

        //var_dump($menu);
    ?>
    <form action="action/update_menu.php" method="post">
        <label for="">รหัสเมนู</label>
        <input type="text" name="menu_id" value="<?=$menu['menu_id']?>"> <br>

        <label for="">ชื่อเมนู</label>
        <input type="text" name="menu_name"value="<?=$menu['menu_name']?>"> <br>

        <label for="">ราคา</label>
        <input type="text" name="menu_price"value="<?=$menu['menu_price']?>"> <br>

        <label for="">ภาพ</label>
        <input type="text" name="menu_image"value="<?=$menu['menu_image']?>"> <br>

        <?php
            //แสดง error
    error_reporting(E_ALL);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
            include "action/connect.php";
            $sql="SELECT * FROM menu_types";
            
            $result = mysqli_query($con , $sql);
        ?>

        <label for="">ประเภทเมนู</label>
        <select name="type_id" >
            <?php
                foreach($result as $type){
                    ?>
                        <option 
                        value="<?=$type["type_id"] ?>" 
                        <?= $type["type_id"] == $menu["type_id"] ? "selected" : '' ?>
                        >
                        <?= $type["type_name"] ?>
                    </option>
                    <?php
                }
            ?>
        </select>

        <br>

        <button>บันทึก</button>

    </form>

</body>
</html>

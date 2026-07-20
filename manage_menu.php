<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<style>
  /* =========================================================
     1. ROOT VARIABLES
     ========================================================= */
  :root{
    --green: #00693e;
    --green-dark: #004d2c;
    --orange: #ff7a00;
    --bg: #f5f6f7;
    --card: #ffffff;
    --border: #e6e8eb;
    --text: #1f2328;
    --text-soft: #6b7280;
    --radius: 12px;
    --radius-sm: 8px;
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.02);
    --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
  }

  *{
    box-sizing: border-box;
  }

  /* =========================================================
     2. BASE / BODY
     ========================================================= */
  body{
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: "Segoe UI", "Sarabun", Tahoma, sans-serif;
    color: var(--text);
    background-color: var(--bg);
    background-image:
      linear-gradient(rgba(139,111,71,0.12) 1px, transparent 1px),
      linear-gradient(90deg, rgba(139,111,71,0.12) 1px, transparent 1px);
    background-size: 28px 28px;
    background-position: -1px -1px;
  }

  /* =========================================================
     3. HEADER
     ========================================================= */
  header{
    position: sticky;
    top: 0;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 32px;
    color: #fff;
    background: linear-gradient(90deg, var(--green) 0%, var(--green-dark) 100%);
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }

  header .logo{
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 0.5px;
  }

  header .logo .dot{
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--orange);
  }

  header nav a{
    color: #fff;
    font-size: 14px;
    text-decoration: none;
    opacity: 0.9;
  }

  header nav a:hover{
    opacity: 1;
    text-decoration: underline;
  }

  /* =========================================================
     4. MAIN / PAGE TITLE
     ========================================================= */
  main{
    flex: 1;
    width: 100%;
    max-width: 1100px;
    margin: 32px auto;
    padding: 0 24px;
  }

  .page-title{
    margin-bottom: 18px;
    font-size: 50px;
    font-weight:1000;
    color: var(--text);
    
  }

  /* =========================================================
     5. TOOLBAR & BUTTONS
     ========================================================= */
  .toolbar{
    display: flex;
    justify-content: flex-end;
    margin-bottom: 16px;
  }

  .btn{
    display: inline-block;
    padding: 10px 18px;
    border: none;
    border-radius: var(--radius-sm);
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.15s ease;
  }

  .btn-primary{
    color: #fff;
    background: var(--orange);
    box-shadow: 0 2px 6px rgba(255,122,0,0.35);
  }
  .btn-primary:hover{ background: #e56d00; }

  .btn-edit{
    margin-right: 6px;
    padding: 6px 12px;
    font-size: 13px;
    color: var(--green);
    background: #eaf6ef;
  }
  .btn-edit:hover{ background: #d7f0e0; }

  .btn-delete{
    padding: 6px 12px;
    font-size: 13px;
    color: #d92d20;
    background: #fdecec;
  }
  .btn-delete:hover{ background: #fbd7d7; }

  /* =========================================================
     6. MENU CARDS (แปลง <table> ให้แสดงผลเป็นการ์ด)
     ========================================================= */
  .table-card{
    background: transparent;
    border: none;
    box-shadow: none;
    overflow: visible;
  }

  /* ซ่อนหัวตารางเดิม เพราะข้อมูลแต่ละคอลัมน์แสดงเป็น label ในตัวการ์ดแทน */
  table thead{
    display: none;
  }

  table{
    display: block;
    width: 100%;
  }

  table tbody{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    width: 100%;
  }

  /* --- การ์ด 1 ใบ = 1 แถว (tr) --- */
  table tbody tr{
    position: relative;
    display: flex;
    flex-direction: column;
    padding-top: 160px; /* เว้นที่ด้านบนไว้สำหรับรูปภาพ */
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  table tbody tr:hover{
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
  }

  table tbody td{
    display: block;
    padding: 6px 16px;
    border: none !important;
  }

  /* คอลัมน์ที่ 4 (รูปภาพ) → แบนเนอร์ด้านบนสุดของการ์ด */
  table tbody td:nth-child(4){
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 160px;
    padding: 0;
  }

  table tbody img{
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
    border: none;
    border-radius: 0;
  }

  /* คอลัมน์ที่ 1 (รหัสเมนู) → badge ลอยบนรูปภาพ */
  table tbody td:nth-child(1){
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 2;
    padding: 2px 8px;
    font-size: 11px;
    color: #fff;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 4px;
  }
  table tbody td:nth-child(1)::before{
    content: "ID: ";
  }

  /* คอลัมน์ที่ 2 (ชื่อเมนู) */
  table tbody td:nth-child(2){
    padding-top: 14px;
    font-size: 16px;
    font-weight: 700;
    color: var(--text);
  }

  /* คอลัมน์ที่ 3 (ราคา) */
  table tbody td:nth-child(3){
    font-size: 16px;
    font-weight: 700;
    color: var(--orange);
  }
  table tbody td:nth-child(3)::after{
    content: " บาท";
    font-size: 13px;
    font-weight: 500;
    color: var(--text-soft);
  }

  /* คอลัมน์ที่ 5 (ประเภท) — margin-bottom:auto ดันปุ่มจัดการลงล่างสุดของการ์ด */
  table tbody td:nth-child(5){
    margin-bottom: auto;
    font-size: 12px;
    color: var(--text-soft);
  }
  table tbody td:nth-child(5)::before{
    content: "ประเภท: ";
  }

  /* คอลัมน์ที่ 6 (ปุ่มจัดการ) */
  table tbody td:nth-child(6){
    display: flex;
    gap: 8px;
    padding-bottom: 14px;
  }

  table tbody td:nth-child(6) .btn{
    flex: 1;
    margin: 0;
    text-align: center;
  }

  /* =========================================================
     7. FOOTER
     ========================================================= */
  footer{
    padding: 20px 32px;
    text-align: center;
    font-size: 13px;
    color: var(--text-soft);
    background: #fff;
    border-top: 1px solid var(--border);
  }

  footer .foot-brand{
    font-weight: 700;
    color: var(--green);
  }
</style>

</head>
<body>

<header>
  <div class="logo"><span class="dot"></span>ระบบจัดการเมนู</div>
  <nav>
    <a href="index.php">หน้าหลัก</a>
  </nav>
</header>

<main>
  <div class="page-title">รายการเมนูทั้งหมด</div>

  <div class="toolbar">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "action/connect.php";

$sql = "SELECT * FROM menus";
$result = mysqli_query($con, $sql);
?>

<a href="add_menu.php" class="btn btn-primary">+ เพิ่มเมนู</a>

  </div>

  <div class="table-card">
  <table>
  <thead>
   <tr>
   <th>รหัสเมนู</th>
   <th>ชื่อเมนู</th>
   <th>ราคา</th>
   <th>ภาพ</th>
   <th>ประเภท</th>
   <th>จัดการ</th>
   </tr>
  </thead>
  <tbody>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "action/connect.php";

$sql = "SELECT * FROM menus";
$result = mysqli_query($con, $sql);
?>

<a href="add_menu.php" class="btn btn-primary">+ เพิ่มเมนู</a>

  </div>

  <div class="table-card">
  <table>
  <thead>
   <tr>
   <th>รหัสเมนู</th>
   <th>ชื่อเมนู</th>
   <th>ราคา</th>
   <th>ภาพ</th>
   <th>ประเภท</th>
   <th>จัดการ</th>
   </tr>
  </thead>
  <tbody>

<?php
foreach($result as $menu){
?>
<tr>
<td><?= $menu["menu_id"] ?></td>
<td><?= $menu["menu_name"] ?></td>
<td><?= $menu["menu_price"] ?></td>
<td>
<img
src="<?= $menu["menu_image"] ?>"
alt=""
style="width:200px"
>
</td>
<td><?= $menu["type_id"] ?></td>
<td>
    <!-- แก้ไข -->
    <a href="edit_menu.php?id=<?= $menu["menu_id"] ?>" class="btn btn-edit">แก้ไข</a>
    <!-- ลบ -->
    <a href="action/delete_menu.php?id=<?= $menu["menu_id"] ?>" class="btn btn-delete">ลบ</a>
</td>
</tr>
<?php
}
?>

  </tbody>
  </table>
  </div>
</main>

<footer>
  &copy; <?= date("Y") ?> <span class="foot-brand">ระบบจัดการเมนู</span> — All rights reserved.
</footer>

</body>
</html>
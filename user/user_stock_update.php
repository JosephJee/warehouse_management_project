<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="main_menu.css">
  <link rel="stylesheet" href="manager.css">
  <title>user</title>
</head>
<body>
  <header>
    <a href="../login/login.html"> header</a>
  </header>
<nav>
  <a href="user_stock.html">재고</a>
  <a href="user_out_bound.html">출고</a>
  <a href="user_order.html">주문</a>
  <a href="user_info.html">회원 정보 수정</a>
</nav>
<main>
  <h1>외주업체</h1>
  <h2>재고</h2>
    <?php
        $no_pk = $_POST["consumerName"];
        $database = "wearhouse";
        $connect = mysql_connect('localhost','root','root')
                            or die("mySQL 서버 연결 Error!");
        mysql_select_db($database, $connect);
        $query = "select * from product_tb where product_no_pk = '$no_pk'"; //manager_stock.html에서 입력받은 상품명이 포함된 데이터검색
        $result = mysql_query($query,$connect);

        print "$product_dt";
        
        print "<center><font color=red size=5><b>상품명 조회 결과 입니다.</b></font></center>";
        print "<table border=1 align=center>";
        print "<tr><td> 일련번호 </td><td> 평점 </td><td> 상품명 </td><td> 판매량 </td><td> 가격 </td>";
        print "<td> 재고량 </td><td> 상태 </td><td> 입고일 </td></tr><br>";
        $num = mysql_num_rows($result);
        for($i=0; $i<$num; $i++){
            $ans = mysql_fetch_row($result);
            print "<tr><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
            print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td>";
            print "<td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td></tr><br>";
        }
 mysql_close($connect);

?> 

<form action="user_stock_update2.php"  method="post">
<label style="border:1px black solid; width: 300px; height: auto; font-weight: bold;">재고 수정<br></label>
<INPUT type="hidden"  id="product_no_pk" name="product_no" value="<?php echo $no_pk?>" />
상품명 : <INPUT type="text" size=5 name="product_nm" ><br>
가격 : <INPUT type="text" size=5 name="product_price" ><br>
<INPUT type="submit" value="수정"> <INPUT type="reset" value="취소"><br>	
</form>

</main>
    

<footer>footer</footer>


</body>
</html>
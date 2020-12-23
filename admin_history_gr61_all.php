<?php
    header('Content-Type: text/html; charset=UTF-8');
    $host = 'localhost';
    $uname = 'jeanne8426';
    $upw = 'libse218!';
    $dbname = 'jeanne8426';

    $con = mysqli_connect($host, $uname, $upw, $dbname);
    $sql = "select * from admin where admin_id";
    $result = mysqli_query($con, $sql);

    session_start();

    // 로그인을 해야만 볼 수 있게 하는 코드
    if(!isset($_SESSION['adminid']) || !isset($_SESSION['adminname'])) {
	   echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	   exit;
    } else {
        $adminid = $_SESSION["adminid"];
        $adminname = $_SESSION["adminname"];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <meta name="viewport" content="width=800">
        <meta charset="utf-8">
        <title>Admin Reservation 6-1 History Page</title>
    </head>
    
    <body>
        <div>
            <header>
                <a href="admin_room_group_all.php">
                    <div>
                        <div id="admin_title">&lt; 6-1</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>
            
            <main>
                <section>
                    <div id="size">
                        <table id="admin_history">
                            <tr>
                                <div>
                                    <th id="his_detail">
                                        <div id="his_text">번호</div>
                                    </th>
                                    <th id="his_detail">
                                        <div id="his_text">날짜</div>
                                    </th>
                                    
                                    <th id="his_detail">
                                        <div id="his_text">좌석정보</div>
                                    </th>
                                        
                                    <th id="his_detail">
                                        <div id="his_text">예약시간</div>
                                    </th>
                                    
                                    <th id="his_detail">
                                        <div id="his_text">학번</div>
                                    </th>
                                        
                                    <th id="his_detail">
                                        <div id="his_text">이름</div>
                                    </th>
                                    
                                </div>
                            </tr>

                            <?php
                            // 현재까지 그룹스터디룸 예약한 사람 정보 출력
                            $sqll = "select gr_name, grre_date, grre_stime, grre_etime, user_id, user_name from grreservation where gr_id=61";
                            $eres = mysqli_query($con, $sqll);
                            $enum = 0;
                            ?>
                            <?php
                            while($rowe = mysqli_fetch_array($eres)) {
                                $enum = $enum + 1;
                            ?>
                            <tr>
                                <td id="his_text_td">
                                    <?php
                                    echo "$enum";
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $rowe["grre_date"];
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $rowe["gr_name"];
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $rowe["grre_stime"];
                                    echo " ~ ";
                                    echo $rowe["grre_etime"];
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $rowe["user_id"];
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $rowe["user_name"];
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
<?php 
    $sophieubaogia = $ngaybaogia = $mancc = $sophieubaogia1 = $mathuoc = $id1 = $id2 = $sophieubaogia2 = $ngaybaogia2 = $mancc2 = $sophieubaogia3 =$sophieubaogia4=$sophieubaogia5= $mathuoc2 ="";
    require_once ('dbhelp.php');
    if (!empty($_POST)) {
        if (isset($_POST['sophieubaogia'])) {
            $sophieubaogia = $_POST['sophieubaogia'];
        }

        if (isset($_POST['ngaybaogia'])) {
            $ngaybaogia = $_POST['ngaybaogia'];

        }

        if (isset($_POST['mancc'])) {
            $mancc = $_POST['mancc'];

        }
        if (isset($_POST['sophieubaogia1'])) {
            $sophieubaogia1 = $_POST['sophieubaogia1'];

        }

        if (isset($_POST['mathuoc'])) {
            $mathuoc = $_POST['mathuoc'];

        }
        if (isset($_POST['id'])) {
            $id1 = $_POST['id'];
        }
        if (isset($_POST['id2'])) {
            $id2 = $_POST['id2'];
        }
        $sophieubaogia = str_replace('\'','\\\'', $sophieubaogia);
        $ngaybaogia = str_replace('\'','\\\'', $ngaybaogia);
        $mancc = str_replace('\'','\\\'', $mancc);
        $sophieubaogia1 = str_replace('\'','\\\'', $sophieubaogia1);

        $mathuoc = str_replace('\'','\\\'', $mathuoc);
        if ($id1 != '') {
            //update 
            
            $sql = "UPDATE BangBaoGia SET SoPhieuBG = '$sophieubaogia', MaNCC= '$mancc',NgayBG ='$ngaybaogia' WHERE id = " .$id1;
                echo "<script > alert('Sửa thành công!')</script>";

        }else if ($sophieubaogia != ''){
            //insert
            
            $sql = "INSERT INTO BangBaoGia(SoPhieuBG,MaNCC,NgayBG)
                VALUES('$sophieubaogia', '$mancc', '$ngaybaogia')";
                echo "<script > alert('Them thành công!')</script>";

        }
        execute($sql);

        //
        //
        if ($id2 != '') {
                // echo "<script type='text/javascript'>alert('update');</script>";
            //update 
            $sql1 = "UPDATE ThuocBaoGia SET SoPhieuBG = '$sophieubaogia1', MaThuoc ='$mathuoc' WHERE id = " .$id2;
                echo "<script > alert('Sửa thành công!')</script>";


        }else if($sophieubaogia1 != ''){
            //insert
                // echo "<script type='text/javascript'>alert('insert');</script>";
            //
            $sql1 = "INSERT INTO ThuocBaoGia(SoPhieuBG,MaThuoc)
                VALUES('$sophieubaogia1', '$mathuoc')";
                echo "<script > alert('Thêm thành công!')</script>";

        }
        execute($sql1);
}
$id3 = '';
    if (isset($_GET['id1'])) {
        $id3 = $_GET['id1'];
        
        $sql = 'SELECT * FROM BangBaoGia WHERE id = '. $id3;
        $baogiaList = executeResult($sql);
        if ($baogiaList != null && count($baogiaList) > 0) {
            $ncc = $baogiaList[0];
            $sophieubaogia2 = $ncc['SoPhieuBG'];
            $ngaybaogia2 = $ncc['NgayBG'];
            $mancc2 = $ncc['MaNCC'];
        } else {

        }
    }
$id4 = '';
    if (isset($_GET['id2'])) {
        $id4 = $_GET['id2'];
        
        $sql = 'SELECT * FROM ThuocBaoGia WHERE SoPhieuBG = '. $id4;
        $baogiaList1 = executeResult($sql);
        if ($baogiaList1 != null && count($baogiaList1) > 0) {
            $ncc1 = $baogiaList1[0];
            $sophieubaogia3 = $ncc1['SoPhieuBG'];
            $mathuoc2 = $ncc1['MaThuoc'];
        } else {

        }
    }
    require_once('html.php');
 ?>
   <div id = "madalClick6" class="modal"> 
            <div id="out-form" class="grid1 grid__form" >
                <span class="login-title login-title3 login-title5">Thông tin bảng báo giá</span>
                <span class="login-title login-title3 login-title55">Thông tin thuốc báo giá</span>
                <div class="manage" style="
    width: 100%;
">
                    <div class="manage-top">
                        <form class="manage-top_left" method="post" action="" style="
    width: 45%;
">
                            <input type="number" name="id" value="<?=$id3?>" hidden>
                            
                                <div class="manage-top_left-form">
                                    <div class="login-form login-form5" style="transform: translateY(-19px);">
                                        <div class="login-makho login-ncc"><span class = "label label5" >Số phiếu báo giá:</span>
                                            <input type="text" name="sophieubaogia" id="" value="<?=$sophieubaogia2?>">
                                        </div>
                                        <div class="login-tenkho login-ncc"><span class = "label label5" >Ngày báo giá:</span>
                                            <input type="date" id="start" name="ngaybaogia"
                                           min="2010-01-01" max="2020-12-31" value="<?=$ngaybaogia2?>">
                                        </div>
                                        <div class="login-tenkho login-ncc"><span class = "label label5" >Mã nhà cung cấp:</span>
                                            <select name="mancc" id="cars" class="">
                                                <option value="<?=$mancc2?>"><?=$mancc2?></option>
                                                <?php 
                                                        $sql = 'SELECT MaNCC FROM NhaCungCap';
                                                    $employeeList = executeResult($sql);
                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['MaNCC'].'>
                                                                    '.$epl['MaNCC'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="box-list5" >
                                    <ul class="form-list5">
                                        <li class="form-item5" onclick="New7()">Tạo mới</li>
                                        <button class="form-item5">Lưu</button>
                                        <li class="form-item5" onclick="out()">Thoat</li>
                                    </ul>
                                </div>
                           
                             
                             
                        </form>
                        <div class="manage-top_right" style="
">
                            <div class="value">
                                <table class="table5">
                                    <thead>
                                        <tr>
                                              <th>Số phiếu báo giá</th>
                                              <th>Ngày báo giá</th> 
                                              <th>Mã nhà cung cấp</th>
                                              <th></th>
                                              <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
if (isset($_GET['timkiem']) && $_GET['timkiem'] != '') {
    $sql = 'SELECT * FROM BangBaoGia WHERE MaNCC LIKE "%'.$_GET['timkiem'].'%"';
    }else {

    $sql = 'SELECT * FROM BangBaoGia';
}
    $datmuaList = executeResult($sql);

    foreach ($datmuaList as $mua) {
            echo '<tr>
                    <td>'.$mua['SoPhieuBG'].'</td>
                    <td>'.$mua['NgayBG'].'</td>
                    <td>'.$mua['MaNCC'].'</td>
                    <td><div class="btn11" onclick=\'window.open("QLBaoGia.php?id1='.$mua['id'].'","_self")\'>Edit</div></td>
                    <td><div class="btn11" onclick="deleteBangBG('.$mua['id'].')">Delete</div></td>
                </tr>';                          
    }
?>
                                    </tbody>
                                  </table>
                            </div>
                           
                        </div>
                    </div>
                    <form action="" method="get" class="timkiem" style="
    top: 52%;
    left: 58%;
">  
                        <div class="login-tenkho "><input type="text" name="timkiem2" placeholder="Ma Thuoc">
                            <button>Tim</button></div>
                        </form>
                    <div class="manage-top manage-bottom" >
                        <form class="manage-top_left" action="" method="post" style="
    width: 45%;
">
                            <input type="number" name="id" value="<?=$id4?>" hidden>
                            
                            <div class="manage-top_left-form">
                                <div class="login-form login-form5" >
                                    <div class="login-makho login-ncc"><span class = "label label5" >Số phiếu báo giá:</span>
                                        <select name="sophieubaogia1" id="cars" class="">
                                           <option value="<?=$sophieubaogia3?>"><?=$sophieubaogia3?></option>
                                                <?php 
                                                        $sql = 'SELECT SoPhieuBG FROM BangBaoGia';
                                                    $employeeList = executeResult($sql);
                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['SoPhieuBG'].'>
                                                                    '.$epl['SoPhieuBG'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="login-tenkho login-ncc"><span class = "label label5" >Mã thuốc:</span>
                                        <select name="mathuoc" id="cars" class="">
                                           <option value="<?=$mathuoc2?>"><?=$mathuoc2?></option>
                                                <?php 
                                                        $sql = 'SELECT MaThuoc FROM Thuoc';
                                                    $employeeList = executeResult($sql);
                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['MaThuoc'].'>
                                                                    '.$epl['MaThuoc'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                        </select>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="box-list5">
                                <ul class="form-list5" style="
    transform: translateY(17px);
">
                                    <li class="form-item5" onclick="New8()">Tạo mới</li>
                                    <button class="form-item5">Lưu</button>
                                    <li class="form-item5" onclick="out()">Thoat</li>
                                </ul>
                            </div>
                       
                         
                         
                    </form>
                    <div class="manage-top_right" style="transform: translateY(36px);
">
                        <div class="value">
                            <table class="table5">
                                
                                <thead>
                                        <tr>
                                          <th>Số phiếu báo giá</th>
                                          <th>Mã thuốc</th>   
                                          <th></th>
                                           <th></th> 
                                        </tr>
                                </thead>
                                <tbody>
<?php 
if (isset($_GET['timkiem2']) && $_GET['timkiem2'] != '') {
    $sql = 'SELECT * FROM ThuocBaoGia WHERE MaThuoc LIKE "%'.$_GET['timkiem2'].'%"';
    }else {

    $sql = 'SELECT * FROM ThuocBaoGia';
}
    $datmuaList = executeResult($sql);

    foreach ($datmuaList as $mua) {
            echo '<tr>
                    <td>'.$mua['SoPhieuBG'].'</td>
                    <td>'.$mua['MaThuoc'].'</td>
                    <td><div class="btn11" onclick=\'window.open("QLBaoGia.php?id2='.$mua['id'].'","_self")\'>Edit</div></td>
                    <td><div class="btn11" onclick="deleteThuocBG('.$mua['id'].')">Delete</div></td>
                </tr>';                          
    }
?>      
                                </tbody>
                                
                              </table>
                        </div>
                       
                    </div>
                    </div>
                    <form action="" method="get" class="timkiem" style="
    top: 30px;
    left: 58%;
">
                        
                        <div class="login-tenkho "><input type="text" name="timkiem" placeholder="Ma nha cung Cap">
                            <button>Tim</button></div>
                        </form>
                </div>   
            </div>
        </div>
<script src="../main.js"></script>
    <script type="text/javascript">


        function deleteBangBG(id) {
            option = confirm('Ban co muon xoa khong?')
            if(!option) {
                return;
            }
            $.post('delete.php', {
                        'sophieubaogia': id
             }, function(data) {
                alert('da xoa thanh cong');
                location.reload();
            })
                }

        function deleteThuocBG(id) {
            option = confirm('Ban co muon xoa khong?')
            if(!option) {
                return;
            }
            $.post('delete.php', {
                        'sophieubaogia2': id
             }, function(data) {
                alert('da xoa thanh cong');
                location.reload();
            })
                }
    </script>           
</body>
</html>
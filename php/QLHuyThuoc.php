
<?php 
    $sophieu = $ngay = $manv = $makho = $sophieu1 = $mathuoc = $id1 = $id2 = $soluong =$soluong2 = $ngay2 = $manv2 = $makho2 = $sophieu2 = $mathuoc2 = $sophieu3 = $sophieu5 = $sophieu4 = "";
    require_once ('dbhelp.php');
    if (!empty($_POST)) {
        if (isset($_POST['sophieu'])) {
            $sophieu = $_POST['sophieu'];
        }

        if (isset($_POST['ngay'])) {
            $ngay = $_POST['ngay'];

        }

        if (isset($_POST['manv'])) {
            $manv = $_POST['manv'];

        }
        if (isset($_POST['makho'])) {
            $makho = $_POST['makho'];

        }

        //bangr 2
        if (isset($_POST['sophieu1'])) {
            $sophieu1 = $_POST['sophieu1'];

        }
        if (isset($_POST['mathuoc'])) {
            $mathuoc = $_POST['mathuoc'];

        }
        if (isset($_POST['soluong'])) {
            $soluong = $_POST['soluong'];

        }
        if (isset($_POST['id'])) {
            $id1 = $_POST['id'];
        }
        if (isset($_POST['id2'])) {
            $id2 = $_POST['id2'];
        }
        $sophieu = str_replace('\'','\\\'', $sophieu);
        $ngay = str_replace('\'','\\\'', $ngay);
        $manv = str_replace('\'','\\\'', $manv);

        $sophieu1 = str_replace('\'','\\\'', $sophieu1);
        $mathuoc = str_replace('\'','\\\'', $mathuoc);
        $soluong = str_replace('\'','\\\'', $soluong);

        if ($id1 != '') {
            //update 
            $sql = "UPDATE BienBanHuy SET SoPhieuBB = '$sophieu', NgayBB ='$ngay',  MaNV= '$manv', MaKho='$makho' WHERE id = " .$id1;
                echo "<script > alert('Sửa thành công!')</script>";

        }else if ($sophieu != ''){
            //insert
            $sql = "INSERT INTO BienBanHuy(SoPhieuBB,NgayBB,MaNV,MaKho)
                VALUES('$sophieu', '$ngay', '$manv','$makho')";
                echo "<script > alert('Thêm thành công!')</script>";
                
        }
        execute($sql);

        //
        //
        if ($id2 != '') {
            //update 
            //
            $sql1 = "UPDATE ThuocHuy SET SoPhieuHuy = '$sophieu1', MaThuoc ='$mathuoc',  SoLuong= '$soluong' WHERE id = " .$id2;
                echo "<script > alert('Sửa thành công!')</script>";

        }else if ($sophieu1 != ''){
            //insert
            //
            $sql1 = "INSERT INTO ThuocHuy(SoPhieuHuy,MaThuoc,SoLuong)
                VALUES('$sophieu1', '$mathuoc', '$soluong')";
                echo "<script > alert('Thêm thành công!')</script>";

        }
        execute($sql1);
}
$id3 = '';
    if (isset($_GET['id1'])) {
        $id3 = $_GET['id1'];
        
        $sql = 'SELECT * FROM BienBanHuy WHERE id = '. $id3;
        $nccList = executeResult($sql);
        if ($nccList != null && count($nccList) > 0) {
            $ncc = $nccList[0];
            $sophieu2 = $ncc['SoPhieuBB'];
            $ngay2 = $ncc['NgayBB'];
            $manv2 = $ncc['MaNV'];
            $makho2 = $ncc['MaKho'];
        } else {

        }
    }
$id4 = '';
    if (isset($_GET['id2'])) {
        $id4 = $_GET['id2'];
        
        $sql = 'SELECT * FROM ThuocHuy WHERE id = '. $id4;
        $ncc1List = executeResult($sql);
        if ($ncc1List != null && count($ncc1List) > 0) {
            $ncc = $ncc1List[0];
            $sophieu3 = $ncc['SoPhieuHuy'];
            $mathuoc2 = $ncc['MaThuoc'];
            $soluong2 = $ncc['SoLuong'];
        } else {

        }
    }
    require_once('html.php')
 ?>

<div id = "madalClick9" class="modal"> 
               <div id="out-form" class="grid1 grid__form">
                    <span class="login-title login-title3 login-title6 login-title89">Thông tin thuốc hủy</span>
                    <span class="login-title login-title3 login-title56 login-title9">Chi tiết thuốc</span>
                    <div class="manage" style="
    width: 100%;
">
                        <div class="manage-top">
                            <form class="manage-top_left manage-top_left9" method="post" action="" style="width: 45%;">
                            <input type="number" name="id" value="<?=$id3?>" hidden>
                                
                                    <div class="manage-top_left-form">
                                        <div class="login-form login-form5" >
                                            <div class="login-makho login-ncc"><span class = "label label5" >Số phiếu BB:</span><input type="text" name="sophieu" id="" value="<?=$sophieu2?>">
                                            </div>
                                            <div class="login-tenkho login-ncc"><span class = "label label5" >Ngày BB:</span>
                                                <input type="date" id="start" name="ngay"
                                               min="2010-01-01" max="2020-12-31" value="<?=$ngay2?>">
                                            </div>
                                            <div class="login-tenkho login-ncc"><span class = "label label5" >Mã nhân viên:</span>
                                                <select name="manv" id="cars" class="">
                                                <option value="<?=$manv2?>"><?=$manv2?></option>
                                                <?php 
                                                        $sql = 'SELECT MaNV FROM NhanVien';
                                                    $employeeList = executeResult($sql);
                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['MaNV'].'>
                                                                    '.$epl['MaNV'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                            <div class="login-tenkho login-ncc"><span class = "label label5" >Mã kho:</span>
                                                <select name="makho" id="cars" class="">
                                                <option value="<?=$makho2?>"><?=$makho2?></option>
                                                <?php 
                                                        $sql = 'SELECT MaKho FROM KhoThuoc';
                                                    $employeeList = executeResult($sql);
                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['MaKho'].'>
                                                                    '.$epl['MaKho'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-list5">
                                        <ul class="form-list5" style="margin-top: 12px;">
                                            <li class="form-item5" onclick="New11()">Tạo mới</li>
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
                                              <th>Số phiếu BB</th>
                                              <th>Ngày BB</th> 
                                              <th>Mã nhân viên</th>
                                              <th>Mã kho</th>
                                              <th>Tên nhân viên</th> 
                                              <th width="16%">Tên kho</th> 
                                              <th></th>
                                              <th></th>
                                             </tr>
                                        </thead>
                                        <tbody>
<?php 
if (isset($_GET['timkiem']) && $_GET['timkiem'] != '') {
    $sql = 'SELECT * FROM BienBanHuy WHERE MaNV LIKE "%'.$_GET['timkiem'].'%"';
    }else {

    $sql = 'SELECT * FROM BienBanHuy,NhanVien,KhoThuoc WHERE BienBanHuy.MaNV = NhanVien.MaNV and KhoThuoc.MaKho = BienBanHuy.MaKho';
}
    $datmuaList = executeResult($sql);

    foreach ($datmuaList as $mua) {
            echo '<tr>
                    <td>'.$mua['SoPhieuBB'].'</td>
                    <td width="20%">'.$mua['NgayBB'].'</td>
                    <td>'.$mua['MaNV'].'</td>
                    <td>'.$mua['MaKho'].'</td>
                    <td>'.$mua['TenNV'].'</td>
                    <td>'.$mua['TenKho'].'</td>
                    <td><div class="btn11" onclick=\'window.open("QLHuyThuoc.php?id1='.$mua['id'].'","_self")\'>Edit</div></td>
                    <td><div class="btn11" onclick="deleteBienBanHuy('.$mua['id'].')">Delete</div></td>
                </tr>';                          
    }
?> 
                                        </tbody>
                                        
                                        
                                      </table>
                                </div>
                               
                            </div>
                            <form action="" method="get" class="timkiem" style="
    top: 32px;
    left: 59%;
">
                        
                        <div class="login-tenkho "><input type="text" name="timkiem" placeholder="Nhap manv">
                            <button>Tim</button></div>
                        </form>
                        </div>
                        <div class="manage-top manage-bottom">
                            <form class="manage-top_left manage-top_left9" method="post" action="" style="
    width: 45%;
">
                            <input type="number" name="id" value="<?=$id4?>" hidden>
                                
                                <div class="manage-top_left-form ">
                                    <div class="login-form login-form5" >
                                        <div class="login-makho login-ncc"><span class = "label label5" >Số phiếu BB:</span>
                                            <select name="sophieu1" id="cars" class="" >
                                                <option value="<?=$sophieu3?>"><?=$sophieu3?></option>
                                                <?php 
                                                        $sql = 'SELECT SoPhieuBB FROM BienBanHuy';
                                                    $employeeList = executeResult($sql);

                                                    foreach ($employeeList as $epl) {
                                                            echo '<option value= '.$epl['SoPhieuBB'].'>
                                                                    '.$epl['SoPhieuBB'].'
                                                                    </option>
                                                                    '  ;                        
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="login-tenkho login-ncc"><span class = "label label5" >Mã thuốc:</span>
                                            <select name="mathuoc" id="cars" class="" >
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
                                        <div class="login-makho login-ncc"><span class = "label label5" >Số lượng:</span><input type="text" name="soluong" id="" value="<?=$soluong2?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-list5">
                                    <ul class="form-list5" style="
    transform: translateY(17px);
">
                                            <li class="form-item5" onclick="New11()">Tạo mới</li>
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
                                              <th>Số phiếu BB</th>
                                              <th>Mã thuốc</th> 
                                              <th>Số lượng</th> 
                                              <th></th>
                                              <th></th>   
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
if (isset($_GET['timkiem1']) && $_GET['timkiem1'] != '') {
    $sql = 'SELECT * FROM ThuocHuy WHERE MaThuoc LIKE "%'.$_GET['timkiem1'].'%"';
    }else {

    $sql = 'SELECT * FROM ThuocHuy';
}
    $datmuaList = executeResult($sql);

    foreach ($datmuaList as $mua) {
            echo '<tr>
                    <td>'.$mua['SoPhieuHuy'].'</td>
                    <td>'.$mua['MaThuoc'].'</td>
                    <td>'.$mua['SoLuong'].'</td>
                    <td><div class="btn11" onclick=\'window.open("QLHuyThuoc.php?id2='.$mua['id'].'","_self")\'>Edit</div></td>
                    <td><div class="btn11" onclick="deleteThuocHuy('.$mua['id'].')">Delete</div></td>
                </tr>';                          
    }
?>   
                                    </tbody>
                                    
                                  </table>
                            </div>
                           
                        </div>
                        </div>
                        <form action="" method="get" class="timkiem" style="
    top: 53%;
    left: 59%;
">
                        
                        <div class="login-tenkho "><input type="text" name="timkiem1" placeholder="Ma thuoc">
                            <button>Tim</button></div>
                        </form>
                    </div>   
                </div>
        </div> 
<script src="../main.js"></script>
    <script type="text/javascript">
        function deleteBienBanHuy(id) {
            option = confirm('Ban co muon xoa khong?')
            if(!option) {
                return;
            }
            $.post('delete.php', {
                        'phieuhuy': id
             }, function(data) {
                alert('da xoa thanh cong');
                location.reload();
            })
                }

        function deleteThuocHuy(id) {
            option = confirm('Ban co muon xoa khong?')
            if(!option) {
                return;
            }
            $.post('delete.php', {
                        'thuochuy': id
             }, function(data) {
                alert('da xoa thanh cong');
                location.reload();
            })
                }
    </script>           
</body>
</html>








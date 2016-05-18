<?php
/* @var $this PromoteCodesController */
/* @var $model PromoteCodes */

$errorClass = count($errors) > 0 ? "error" : "";
?>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-3  col-xs-1"></div>
    <div class="coupon-content <?php echo $errorClass;?> col-lg-4 col-md-4 col-sm-6  col-xs-10">
        <?php if (count($errors) == 0) {?>
            <div class="say-thank">
                <p>Cám ơn <?php echo $model->getUserFirstName();?>!</p>
                <p>Bạn đã đăng nhập thành công.</p>
                <p>Sử dụng Coupon dưới đây để được giảm giá <?php echo $model->discount;?> thức ăn tại <?php echo $model->getTenantName();?></p>
            </div>
            <div class="qr-code">
                <?php echo $model->getQRCode(); ?>
            </div>
            <div class="promote-code">
                <?php echo $model->code;?>
            </div>

        <div class="policies">
            <div class="policies-title">
                Quy định:
            </div>
            <p>- Đọc mã và số điện thoại/email của bạn tại quầy thu ngân để đối chứng nhận giảm giá</p>
            <p>- Mỗi mã chỉ có giá trị sử dụng 1 lần duy nhất</p>
            <p>- Khuyến mãi giảm giá không có giá trị quy đổi thành tiền mặt</p>
        </div>
        <?php } else { ?>
        <div class="error">
            <?php echo $errors[0];?>
        </div>

            <form action="" method="POST">
                User: <textarea style="width: 250px;" type="text" name="User">{"name":"John", "surname":"Doe", "gender":"Male", "username":"john_user", "email":"example@example.com"}</textarea>
                <br/><br/>
                Tenant: <textarea style="width: 250px;" type="text" name="Tenant">{"id":367}</textarea>
                <br/><br/>
                Wifi Area: <textarea style="width: 250px;" type="text" name="WifiArea"></textarea>
                <br/><br/>
                Parameters: <textarea style="width: 250px;" type="text" name="Parameters"></textarea>
                <br/><br/>
                <input type="submit" value="submit">
            </form>
        <?php } ?>
    </div>
    <div class="col-sm-4 col-lg-3 col-xs-1"></div>
</div>
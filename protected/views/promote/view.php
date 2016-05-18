<?php
/* @var $this PromoteCodesController */
/* @var $model PromoteCodes */
/* @var $form CActiveForm */
?>
<div class="coupon-verification">
    <?php if ($code == "") { ?>
    <div class="form row">
        <div style="text-align: center">
            <form action="" method="GET">
                <label>Nhập Coupon Code để kiểm tra: </label>
                <input type="text" name="code">
                <?php if (isset($_GET['code'])) {?>
                <div class="coupon-error">
                    Coupon không hợp lệ! Vui lòng nhập lại.
                </div>
                <?php }?>
                <br/>
                <input type="submit" value="Kiểm tra">
            </form>
        </div>

    </div>

    <?php } else { ?>
    <div class="content row">
        <div class="view-title">
            Coupon hợp lệ! Xem chi tiết bên dưới:
        </div>
        <div class="coupon-info">
            <div class="code-info">
                <!-- Code -->
                <div class="code row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        Coupon Code:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <strong style="color: green;"><?php echo $model->code;?></strong>
                    </div>
                </div>
                <!-- Discount -->
                <div class="discount row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        Discount:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <?php echo $model->discount;?>
                    </div>
                </div>
                <!-- User -->
                <div class="user-info row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        User:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <?php echo $model->getHtmlJsonField('user_info');?>
                    </div>
                </div>
                <!-- Wifi Area -->
                <div class="wifi-area row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        Wifi Area:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <?php echo $model->getHtmlJsonField('wifi_area');?>
                    </div>
                </div>
                <!-- Tenant -->
                <div class="tenant-info row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        Tenant:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <?php echo $model->getHtmlJsonField('tenant_info');?>
                    </div>
                </div>
                <!-- Tenant -->
                <div class="tenant-info row-info">
                    <div class="left-col col-lg-2 col-md-2 col-sm-4  col-xs-12">
                        Parameters:
                    </div>
                    <div class="right-col col-lg-10 col-md-10 col-sm-8  col-xs-12">
                        <?php echo $model->getHtmlJsonField('parameters');?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php }?>
</div>
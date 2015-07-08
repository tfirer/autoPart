# 数据库表结构初始化脚本
set names utf8;



# 参与人主题域
CREATE TABLE `customer` (
   `id` INT(11) NOT NULL auto_increment COMMENT 'ID',
   `name` VARCHAR(64) NOT NULL COMMENT '名称',
   `province_id` INT(11) NOT NULL COMMENT '省份',
   `city_id` INT(11) NOT NULL COMMENT '城市',
   `district_id` INT(11) NOT NULL COMMENT '区',
   `address` VARCHAR(255) NOT NULL COMMENT '地址',
   `lng` DECIMAL(10,7) NOT NULL COMMENT '经度',
   `lat` DECIMAL(10,7) NOT NULL COMMENT '纬度',
   `contact_name` VARCHAR(20) NOT NULL COMMENT '联系人姓名',
   `contact_tel` VARCHAR(20) NOT NULL COMMENT '联系电话',
   `username` VARCHAR(50) NOT NULL COMMENT '用户名',
   `password_hash` VARCHAR(60) NOT NULL COMMENT '登录密码',
   `timeout` SMALLINT NOT NULL COMMENT '登录超时时间',
   `status` SMALLINT NOT NULL COMMENT '状态(1000有效，1100冻结，9000已删除)',
   `note` VARCHAR(255) COMMENT '备注',
   `create_time` DATETIME NOT NULL COMMENT '添加时间',
   `update_time` DATETIME NOT NULL COMMENT '更新时间',
   PRIMARY KEY (`id`),
   UNIQUE KEY i_username (`username`),
   KEY i_province_id (`province_id`),
   KEY i_city_id (`city_id`),
   KEY i_district_id (`district_id`),
   KEY i_lng (`lng`),
   KEY i_lat (`lat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin COMMENT '客户';

CREATE TABLE `distribution` (
   `id` INT(11) NOT NULL COMMENT '客户ID',
   `scramble_flag` TINYINT NOT NULL COMMENT '抢单标记',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin COMMENT '配送商';

CREATE TABLE `garage_order` (
   `id` INT(11) NOT NULL auto_increment COMMENT 'ID',
   `sn` CHAR(22) NOT NULL COMMENT '订单编号',
   `product_id` INT(11) NOT NULL COMMENT '产品ID',
   `quantity` INT(11) NOT NULL COMMENT '产品数量',
   `product_name` VARCHAR(120) NOT NULL COMMENT '产品名称',
   `product_sn` CHAR(20) NOT NULL COMMENT '产品编号',
   `status` SMALLINT NOT NULL COMMENT '状态(10000已下单，10100待发货，10200已发货，10300已收货，20000已取消)',
   `create_time` DATETIME NOT NULL COMMENT '添加时间',
   `update_time` DATETIME NOT NULL COMMENT '更新时间',
   `garage_id` INT(11) NOT NULL COMMENT '修理厂ID',
   `garage_name` VARCHAR(64) NOT NULL COMMENT '修理厂名称',
   `garage_address` VARCHAR(255) NOT NULL COMMENT '修理厂收货地址',
   `garage_contact_name` VARCHAR(20) NOT NULL COMMENT '修理厂联系人姓名',
   `garage_contact_tel` VARCHAR(20) NOT NULL COMMENT '修理厂联系电话',
   `distribution_id` INT(11) NOT NULL DEFAULT 0 COMMENT '配送商ID',
   `distribution_name` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '配送商名称',
   `distribution_contact_name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '配送商联系人姓名',
   `distribution_contact_tel` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '配送商联系电话',
   PRIMARY KEY (`id`),
   KEY i_garage_id (`garage_id`),
   KEY i_product_id (`product_id`),
   KEY i_distribution_id (`distribution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_bin COMMENT '修理厂订单';




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="msapplication-tap-highlight" content="no" />
        <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, width=device-width" />
        <link rel="stylesheet" href="lib/ionic/css/ionic.min.css" />
        <link rel="stylesheet" type="text/css" href="css/app.css" />
        <title>配送商</title>
    </head>
    <body>
        <div class="bar-dark bar bar-header nav-bar">
            <div class="buttons left-buttons"></div>
            <h1 class="title">登录</h1>
        </div>
        <div class="padding scroll-content ionic-scroll has-header">
            <div class="logo">
                <h1>配送商</h1>
            </div>
            <div class="list list-inset">
                <form id="loginForm" method="post">
                    <label class="item item-input">
                        <input name="userName" value="<?php echo $form->userName?>" type="text" placeholder="用户名">
                    </label>
                    <label class="item item-input">
                        <input name="userPassword" value="<?php echo $form->userPassword?>" type="password" placeholder="密码">
                    </label>
                    <button class="button-full button-balanced button">
                        <input type="submit" value="登录" />
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
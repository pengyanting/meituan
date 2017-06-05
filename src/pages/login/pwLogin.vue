<template>
    <div>
        <mt-header>
            <router-link to="/login" slot="left">
                <mt-button icon="back">密码登录</mt-button>
            </router-link>

        </mt-header>
        <div class='space'></div>
        <div class='page-field'>
            <div class="page-part">
                <mt-field placeholder="手机/邮箱/用户名" type="text"></mt-field>
                <mt-field placeholder="密码" type="password"></mt-field>
            </div>
        </div>
        <div style='padding: 10px;'>
            <mt-button type="default" class="loginbtn">登录</mt-button>
            <span class="right findPw">忘记密码？</span>
        </div>
    </div>
</template>
<script>

</script>
<style lang="sass">
    @import "../../assets/scss/common.scss";
   
    .mint-cell-value {
        font-size: 14px;
    }
    
    .loginbtn {
        margin: 0 auto;
        display: block;
        padding: 0 30px;
        width: 100%;
        @include loginBtn;
    }
    
    .findPw {
        margin-top: 10px;
        font-size: 14px;
        color: #009bff;
    }
</style>
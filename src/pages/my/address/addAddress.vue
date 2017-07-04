<template>
    <div>
        <HeadTop title='新增地址' style='margin-bottom:40px;'></HeadTop>
        <section>
            <div class='pageSide'>
                <mt-field label="联系人" placeholder="姓名" :attr="{ maxlength: 10 }"></mt-field>
                <mt-field label="邮箱" placeholder="请输入邮箱" type="email"></mt-field>
                <mt-field label="密码" placeholder="请输入密码" type="password"></mt-field>
                <mt-field label="手机号" placeholder="请输入手机号" type="tel"></mt-field>
                <mt-field label="网站" placeholder="请输入网址" type="url"></mt-field>
                <mt-field label="数字" placeholder="请输入数字" type="number"></mt-field>
                <mt-field label="生日" placeholder="请输入生日" type="date"></mt-field>
                <mt-field label="自我介绍" placeholder="自我介绍" type="textarea" rows="4"></mt-field>
            </div>
        </section>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    export default {
        data() {
            return {

            }
        },
        components: {
            HeadTop
        }
    }

</script>
<style lang='sass' scoped>

</style>
<template>
    <div>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>用户名</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
             <input type="text" placeholder="用户名" autofocus>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        methods: {
            handleBack() {
                this.$router.push({ path: '/my/accountSafe' });
            }
        },
        mounted() {

        },
        components: {

        }
    }

</script>
<style lang='sass'>
   .filed{
       input{
           ouline:none;
           border:0;
       }
   }
</style>
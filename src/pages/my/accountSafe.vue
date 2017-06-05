<template>
    <div>
        <mt-header fixed>
           <mt-button icon="back" slot='left' @click='handleBack'>账户与安全</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
       <section>
            <mt-cell title='头像'>
                <img src="../../assets/images/my-head.png" width="40" height="40">
            </mt-cell>
            <mt-cell title='用户名'>
                <span></span>
            </mt-cell>
        </section>
    </div>
</template>
<script>
    export default {
        data(){
            return {
               username:''
            }
        },
        mounted () {
            
        },
        methods: {
            handleBack(){
                this.$store.dispatch("SELECT_TYPE",'我的');
                this.$router.push({path:'/'});
            }
        }
    }
</script>
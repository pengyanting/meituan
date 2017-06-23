<template>
    <div>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>用户名</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <div>
             <mt-field  placeholder="用户名" :attr="{ maxlength: 24,minLength:5 }"></mt-field>
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

</style>
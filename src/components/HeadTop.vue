<template>
    <div>
          <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>{{title}}</mt-button>
        </mt-header>
    </div>
</template>
<script>
    export default {
        data(){
            return{

            }
        },
        methods: {
            handleBack(){
                this.$router.go(-1)
            }
        },
        props: ['title']
    }
</script>
<style lang='sass' scoped>

</style>
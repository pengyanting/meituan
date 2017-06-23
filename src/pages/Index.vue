<template>
    <div>
      <FootBottom></FootBottom>
    </div>
</template>
<script>
    import HeadTop from '../components/HeadTop.vue'
    import FootBottom from '../components/FootBottom.vue'
    export default {
        watch: {
            // '$route'(to, from) {//监听路由改变
            //     this.currentPathName = to.name;
            //     localStorage.setItem("title", to.name);
            // }
        },
        components: {
            HeadTop,
            FootBottom
        }
    }

</script>
<style lang="sass">

</style>
<template>
    <div class='star'>
        <ul class='star_list' @ckick='handlestar'>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
        </ul>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        methods: {
            handlestar() {
               
            }
        }
    }

</script>
<style lang="sass">
    .star {
        ul,li {
            padding: 0;
            margin: 0;
            width: 80px;
            height: 15px;
        }
        ul {
           
        }
        li {
            list-style-type: none;
            width: 15px;
            height: 15px;
            background-image: url(../assets/images/star.png);
            background-repeat: no-repeat;
            background-position: -17px 0px;
            background-size: cover;
            float: left;
            cursor: pointer;
        }
    }
</style>
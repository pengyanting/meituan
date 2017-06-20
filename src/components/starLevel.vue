<template>
    <div class='star'>
        <ul class='star_list' @ckick='handlestar'>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='star_item'></li>
            <li class='score'>{{score}}</li>
        </ul>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        props:['score'],
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
            height: 15px;
        }
        li{
            list-style-type: none;
            float: left;
            cursor: pointer;
        }
        .star_item {
            width: 15px;
            height: 15px;
            background-image: url(../assets/images/star.png);
            background-repeat: no-repeat;
            background-position: -17px 0px;
            background-size: cover;
        }
        .score{
            font-size: 12px;
            color: #feaa0c;
            line-height: 20px;
            margin: 0 5px;
        }
    }
</style>
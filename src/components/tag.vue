<template>
    <div>
        <div class='tag'>
            <ul @click='selectd'>
                <li v-for='item in list' :key='item' :class="{'blueColor':select==item.value}">
                    <input type="radio" v-model='select' :value='item.value'> {{item.value}}
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                select: this.value
            }
        },
        methods: {
           selectd(){
               this.$emit('valueChange',this.select)
           }
        },
        props: ['list','value'],
        mounted () {
           console.log(this.select)
        }
    }

</script>
<style lang='sass' scoped>
    .tag {
        align-items: center;
        display: flex;
        font-size: 16px;
        line-height: 1;
        min-height: inherit;
        overflow: hidden;
        padding: 0 0 0 115px;
        width: 100%;
        background: #fff;
        position: relative;
        &>label {
            position: absolute;
            left: 10px;
            display: flex;
            align-items: center;
        }
        &>ul {
            border-top: 1px solid #E2E2E2;
            padding: 0;
            display: flex;
            width: 100%;
            margin: 0;
            li {
                border: 1px solid #dcdcdc;
                border-radius: 3px;
                color: #626262;
                font-size: 12px;
                width: 60px;
                height: 30px;
                text-align: center;
                line-height: 30px;
                margin: 10px 10px 10px 0;
                position: relative;
                input {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    left: 0;
                    opacity: 0;
                    margin: 0;
                }
            }
            .blueColor {
                color: #00a7ff;
                border: 1px solid #00a7ff;
            }
        }
    }
</style>
<template>
    <div class='star'>
        <ul class='star_list'>
            <li class='star_item' :class='{"pos":index<getNum}' v-for='(item,index) in 5' :key='item' @click='handleClick(index)' @mousemove='handlemove(index)' @mouseout='out(index)'></li>
        </ul>
    </div>
</template>
<script>
export default {
  name: 'satr',
  data () {
    return {
      saveNum: 0
    }
  },
  methods: {
    handleClick (index) {
      if (this.disabled === '') {
        return
      }
      this.score = index + 1
      this.saveNum = index + 1
      this.$emit('starLevel', this.score)
    },
    handlemove (index) {
      if (this.disabled === '') {
        return
      }
      this.score = index + 1
    },
    out (index) {
      if (this.disabled === '') {
        return
      }
      this.score = this.saveNum
    }
  },
  props: ['score', 'disabled'],
  mounted () {
    this.saveNum = this.score
  },
  computed: {
    getNum () {
      return this.score
    }
  }
}
</script>
<style scoped>
ul {
    display: flex;
    align-items: center;
    width: auto;
}
ul,
li {
    padding: 0;
    margin: 0;
    height: 15px;
}
li {
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
.pos{
    background-position: 0px;
}
</style>

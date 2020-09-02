<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <el-button type="primary" @click="open" icon="el-icon-chat-dot-round">主要按钮</el-button>
    <el-input-number v-model="num" :min="1" :max="10" @change="handleChange"></el-input-number>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      num: 5
    }
  },
  methods: {
    open() {
      this.$message('这是一条消息提示');
    },
     handleChange(value) {
       console.log(value)
     }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

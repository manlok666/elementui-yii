<template>
  <div >
    <Header></Header>
    <el-row  class="page_center row-bg text-center"  >
      <h2>个人信息</h2>
      <p>admin - 超级管理员</p>
      <p>注册时间：2020/9/2 09:24:54</p>
      <el-divider></el-divider>
      <p>手机号: 123456789</p>
      <p>邮箱:  1234567890@163.com</p>
      <p>上次登录时间：2020/9/2 09:24:54</p>
    </el-row>
  </div>
</template>

<script>
import Header from "./Header";

export default {
  components: {Header},
  data () {
    return {
      value1: true,

    }
  },
}
</script>

<style scoped>
.page_center{
  width: 300px;
  height: 450px;
  margin: auto;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.button {
  width: 100%;
}
.text-center{
  color: #555555;
  text-align: center;
}
</style>

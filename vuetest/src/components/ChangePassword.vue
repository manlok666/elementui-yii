<template>
  <div >
  <Header></Header>
  <el-row  class="page_center"  justify="center">
    <h2 class=text-center>修改密码</h2>
    <el-form ref="formInline" :model="formInline" :rules="ruleInline">

      <el-form-item prop="old_password">
        <el-input type="password"  v-model="formInline.old_password" placeholder="请输入原密码"></el-input>
      </el-form-item>

      <el-form-item prop="new_password">
        <el-input type="password" v-model="formInline.new_password" placeholder="请输入新密码"></el-input>
      </el-form-item>

      <el-form-item prop="again_password">
        <el-input type="password" v-model="formInline.again_password" placeholder="请再输入新密码"></el-input>
      </el-form-item>

      <el-row type="flex">
        <el-button type="primary" class="button">确定</el-button>
      </el-row>

    </el-form>
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
      formInline: {
        old_password: '',
        new_password: '',
        again_password:'',
      },
      ruleInline: {
        old_password: [
          { required: true, message: '请填写旧密码', trigger: 'blur' }
        ],
        new_password: [
          { required: true, message: '请填写新密码', trigger: 'blur' }
        ],
        again_password: [
          { required: true, message: '请再填写新密码', trigger: 'blur' }
        ]
      }
    }
  },
}
</script>

<style scoped>
.page_center{
  width: 400px;
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

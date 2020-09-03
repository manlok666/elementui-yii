<template>
  <div>
    <el-row type="flex"  justify="center">
      <h1 class="bord el-icon-s-help">XXX系统</h1>
    </el-row>
    <el-row type="flex"  justify="center">
    <el-card class="box-card">
      <el-row type="flex"  justify="center">
        <br/><br/>
      </el-row>
      <div  class="text item">
        <el-form ref="formInline" :model="formInline" :rules="ruleInline">

          <el-form-item prop="user">
            <el-input v-model="formInline.user" placeholder="请输入用户名"></el-input>
          </el-form-item>

          <el-form-item prop="password">
            <el-input type="password" v-model="formInline.password" placeholder="请输入密码"></el-input>
          </el-form-item>


          <el-row type="flex">
          <el-button type="primary" class="button" @click="handleSubmit('formInline')">登录</el-button>
          </el-row>

        </el-form>
      </div>
    </el-card>
    </el-row>
  </div>
</template>
<style>
.text {
  font-size: 14px;
}

.item {
  margin-bottom: 18px;
}

.button {
  width: 70%;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: "";
}
.clearfix:after {
  clear: both
}

.box-card {
  width: 350px;
}
.bord{
  margin-top: 100px;
  color: #1e5078;
}
.button{
  width: 100%;
}

</style>

<script>
import Auth from '../services/auth.js'
import 'element-ui/lib/theme-chalk/index.css'

export default {
  data () {
    return {
      value1: true,
      formInline: {
        user: '',
        password: ''
      },
      ruleInline: {
        user: [
          { required: true, message: '请填写用户名', trigger: 'blur' }
        ],
        password: [
          { required: true, message: '请填写密码', trigger: 'blur' }
        ]
      }
    }
  },
  methods: {
    handleSubmit(name) {
      let obj = {
        name: this.formInline.user,
        password: this.formInline.password
      }
      console.log(this.formInline.user);
      if(this.formInline.user.length === 0 || this.formInline.password.length === 0){
        this.$message.error('用户名或密码不能为空');
        return;
      }
      this.$http.post('/user/login',this.$qs.stringify(obj))
        .then((res) => {
          console.log(res);
          if(res.data.success){
            this.$message.success('登录成功！');
            Auth.login(res.data.msg);
            this.$router.push({path:'/'})
          }else{
            this.$message.error(res.data.msg); // 登录失败，显示提示语
          }
        }, (err) => {
          this.$message.error('请求错误！')
        })
    }
  }
}
</script>

<template>
  <el-menu  class="nav"  mode="horizontal" @select="handleSelect">
    <title class="bord el-icon-s-help" >XXX系统</title>
    <el-menu-item index="logout" style="float: right; " @click="logout"  >登出</el-menu-item>

    <el-submenu index="user" style="float: right; ">
      <template slot="title">用户管理</template>
      <el-menu-item index="user_message">信息管理</el-menu-item>
      <el-menu-item index="change_password">修改密码</el-menu-item>
    </el-submenu>
    <el-submenu index="2" style="float: right; ">
      <template slot="title">XX管理</template>
      <el-menu-item index="item">XX管理</el-menu-item>
      <el-menu-item index="2-2">XX管理</el-menu-item>
    </el-submenu>
  </el-menu>
</template>

<script>
import Auth from '../services/auth.js'

export default {
  data(){
    return {
    }
  },
  created(){

    this.$http.get('/item').then((res)=>{
      this.msg = res.data.msg;
    })

  },
  methods:{

    logout(){
      this.$confirm('将要退出帐号, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        this.$message.warning('已退出登录！');
        Auth.logout()
        this.$router.push({path:'/login'})
      }).catch(() => {
      });
    },

    handleSelect(key) {
      if (key !== 'logout' && key !== 'item' && key !== 'change_password' && key !== 'user_message') {
        this.$message.info('没有此网页');
        // this.$router.push({path: '/' + key})
      }
      if(key === 'change_password' || key === 'user_message'){
        this.$router.push({path: '/' + key});
      }
      if(key === 'item'){
        this.$router.push({path: '/'});
      }
    }
  }
}
</script>

<style scoped>
.bord{
  margin: 18px;
  color: #1e5078;
  font-size: 20px;
  font-weight: bold;
  position: fixed;
}

.nav {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
}
</style>

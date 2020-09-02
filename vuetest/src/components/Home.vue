<template>
  <div class="content" >
    <Header></Header>
    <el-row  type="flex"  justify="center">
    <el-col :span="16" class="box-card-1">
      <div v-for="o in 50" :key="o" class="text item">
        <el-row type="flex"  justify="center">
        {{ msg + msg + msg +msg }}
        </el-row>
      </div>
      <el-backtop></el-backtop>
      <el-divider></el-divider>
      <br/><br/>
    </el-col>
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

.box-card-1 {
  margin-top: 150px;

}
</style>
<script>

import Auth from '../services/auth.js'
import Header from "./Header";

export default {
  components: {Header},
  data(){
    return {
      activeIndex: '1',
      msg:""
    }
  },
  created(){

    this.$http.get('/item').then((res)=>{
      this.msg = res.data.msg;
    })

  },
  methods:{

    logout(){
      this.$message.warning('已退出登录！');
      Auth.logout()
      this.$router.push({path:'/login'})
    }
  }
}
</script>

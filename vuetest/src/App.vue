<template>
  <div id="app" class="home">
    <router-view
      class="view"
      keep-alive
      transition
      transition-mode="out-in">
    </router-view>
    <VueFooter></VueFooter>
  </div>
</template>

<script>

import VueFooter from "./components/VueFooter";

export default {
  components: {VueFooter},
}
</script>
<style>
.home,/*设置占满*/
html,
body {
  width: 100%;
  height: 100%;
  margin: 0;
}

.view,/*设置占满*/
html,
body {
  width: 100%;
  min-height: 100%;
  margin: 0;
}

</style>

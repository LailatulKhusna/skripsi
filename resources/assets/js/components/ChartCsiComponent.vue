<template>
  <div>
     <vue-easy-pie-chart 
          :percent="csi"
          :track-color="ef3e3e"
          :size="320"
          :scale-color="ef3e3e"
          :bar-coclor="ef3e3e"
     ></vue-easy-pie-chart>

  </div>
</template>
<script>
  import VueEasyPieChart from 'vue-easy-pie-chart'
  import 'vue-easy-pie-chart/dist/vue-easy-pie-chart.css'
  
  export default {
      props:['csi'],
      components:{ 
        VueEasyPieChart 
      }
  }
</script> 
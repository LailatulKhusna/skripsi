
<script>
    import { Bar } from 'vue-chartjs'

    export default {
      extends: Bar,
      props: {
        chartdata: {
          type: Object,
          default: null
        },
        options: {
          type: Object,
          default: null
        }
      },
      mounted () {
        console.log(this.chartdata);
        let label = [];
        let data = [];
        $.each(this.chartdata,(key,val)=>{
          label.push(key);
          data.push(val);
        });
        console.log(label,data);
        this.renderChart({
          labels:label,
          datasets:[
            {
              label:'Performance',
              backgroundColor: '#f87979',
              data:data
            }
          ]
        }, {
          responsive:true,
          maintainAspectRatio:false
        })
      },
      created (){
        
      }
    }

</script>

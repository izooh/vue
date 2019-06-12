
import { Line } from 'vue-chartjs';

export default {
  props: {
  // type, required and default are optional, you can reduce it to 'options: Object'
  deta: { type:Array, required: false}
},
   extends: Line,
   mounted(){
console.log(this.deta);
    let Name= new Array();
    let Points = new Array();


       let data = this.deta
       if(data) {
          data.forEach(element => {
          Name.push(element.user.name);
          Points.push(element.perc);

          });
          this.renderChart({
          labels: Name,
          datasets: [{
             label: 'Perfomance Graph',
             backgroundColor: '#FC2525',
             data: Points
       }]
    }, {responsive: true, maintainAspectRatio: false})
  }
  else {
     console.log('No data received');
  }
}


}

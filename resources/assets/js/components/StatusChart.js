import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   data() {
      return {

      }
   },
   mounted(){
    let Name= new Array();
    let Points = new Array();

    axios.post("api/default").then((response) => {
       let data = response.data.data;
       if(data) {
          data.forEach(element => {
          Name.push(element.user.name);
          Points.push(element.TotalPoints);

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
     console.log('No data');
  }
 });

   }
}

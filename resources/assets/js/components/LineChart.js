import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   data() {
      return {
         datacollection: {
            //Data to be represented on x-axis

         //Chart.js options that controls the appearance of the chart
       }
      }
   },
   mounted(){
    let Years = new Array();
    let Labels = new Array();

    axios.get("api/rating").then((response) => {
       let data = response.data.data;
       if(data) {
          data.forEach(element => {
          Years.push(element.user.name);
          Labels.push(element.TotalPoints);

          });
          this.renderChart({
          labels: Years,
          datasets: [{
             label: 'Perfomance Graph',
             backgroundColor: '#FC2525',
             data: Labels
       }]
    }, {responsive: true, maintainAspectRatio: false})
  }
  else {
     console.log('No data');
  }
 });

   }
}

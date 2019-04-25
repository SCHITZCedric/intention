
( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetClocherMonthlyData();

		},

		ajaxGetClocherMonthlyData: function () {
			var urlPath =  'http://' + window.location.hostname + '/deoriom/public/get-clocher-chart-data';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart(response);
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {


      var ctx = document.getElementById("PieChartClocher");
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: response.clocher,
          datasets: [{
            data: response.clocher_count_data,
            backgroundColor: ['#4e73df', '#1cc88a', '#b336cc', '#cc363b', '#f4691b', '#14fab5', '#100e66' ],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false,
            position: 'bottom'
          },
          cutoutPercentage: 70,
        },
      });
		}
	};

	charts.init();

} )( jQuery );

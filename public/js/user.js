/**
 * Created by adriangracia on 11/3/16.
 */
// Any of the following formats may be used
var ctx = document.getElementById("myChart");
var url = document.URL;
if(url.substr(url.length-1) === "#")
    url = url.substr(0,url.length-1);

//ajax call to create our chart
$.ajax({
    url: url+"/comments",
    method: "GET",
    dataType: "json",
    success: function (data) {
        var dataSet = processComments(data);
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"],
                datasets: [
                    {
                        label: '# of Comments',
                        data: dataSet,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
});
//ajax call to create our chart
$.ajax({
    url: url+"/tags",
    method: "GET",
    dataType: "json",
    success: function (data) {
        var dataSet = processComments(data);
        console.log(data);
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["C++", "JAVA", "PHP"],
                datasets: [
                    {
                        label: '# of Comments',
                        data: dataSet,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
});

function processComments(data) {
    var processedData = new Uint8Array(12);

    for(var i = 0; i < data.length; i++){
        var date = new Date(data[i].created_at);
        var month = date.getMonth() + 1;

        switch(month) {
            case 1:
                processedData[0]++;
                break;
            case 2:
                processedData[1]++;
                break;
            case 3:
                processedData[2]++;
                break;
            case 4:
                processedData[3]++;
                break;
            case 5:
                processedData[4]++;
                break;
            case 6:
                processedData[5]++;
                break;
            case 7:
                processedData[6]++;
                break;
            case 8:
                processedData[7]++;
                break;
            case 9:
                processedData[8]++;
                break;
            case 10:
                processedData[9]++;
                break;
            case 11:
                processedData[10]++;
                break;
            case 12:
                processedData[11]++;
                break;
        }
    }
    return processedData;
}



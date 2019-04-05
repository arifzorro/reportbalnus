/**
 * Created by wahyuarif on 1/21/19.
 */
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            data:"",
            dataType:"json",  //ini sangat perlu untuk mendefinisikan tipe datanya JSON yang diterima
            url:"ambildatachart",
            success:function (result) {
                console.log(result);
                //coba untuk sorting
//                result.sort(function(a,b){
//                    var c = new Date(a.date);
//                    var d = new Date(b.date);
//                    var temp=c-d;
//                   // console.log(temp)
//                    return temp;
//                });


                //console.log(result.length);
                //  console.log(data["tanggal"]);
                //gitvar data=JSON.parse(data["data"]);
                //var hasilDB=JSON.parse(result);

                var save=[];
//                if(result.length == 7){
//                     save=result;
//                }
//                else if(result.length == 0){
//                    for(i=0 ;i < 7;i++){
//                        save[i]="kosong";
//                    }
//                }
//                 var temp=[];
                for(i=0 ;i < 7;i++){
                    //console.log(result[i]);
                    if(result[i] == undefined){
                        save[i]={tanggal: "kosong"}; //mengisi arraay save ke x dengan penanda tanggal kosong
                    }
                    else{
                        save[i]=result[i];
                    }
                }
                console.log(save);


//                let myChart = document.getElementById('myChart').getContext('2d');

                // Global Options
//                Chart.defaults.global.defaultFontFamily = 'Lato';
//                Chart.defaults.global.defaultFontSize = 18;
//                Chart.defaults.global.defaultFontColor = '#777';



                let massPopChart = new Chart(myChart, {
                    type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data:{
                        //labels:[result[0]['tanggal'], result[1]['tanggal'], result[2]['tanggal'], result[3]['tanggal'],result[4]['tanggal'], result[5]['tanggal']],
                        labels:[save[0]['tanggal'],save[1]['tanggal'], save[2]['tanggal'],save[3]['tanggal'],save[4]['tanggal']],
                        datasets:[{
                            label:'Kunjungan ODC',
                            fill:false,
                            lineTension:0.1,
//                            backgroundColor:"rgba(75,192,192,0.4)",
                            borderColor:"rgba(75,192,192,1)",
//                            borderCapStyle:'butt',
//                            borderDash:[],
//                            borderDashOffset:0.0,
//                            borderJoinStyle:'miter',
//                            pointBorderColor:"rgba(75,192,192,1)",
//                            pointBackgroundColor:"#FFF",
//                            PointBorderWidth:1,
//                            pointHoverRadius:5,
//                            pointHoverBackgroundColor:"rgba(75,192,192,1)",
//                            pointHoverBorderColor:"rgba(220,220,220,1)",
//                            PointHoverBorderWidth:2,
//                            pointRadius:1,
//                            pointHitRadius:10,


                            data:[
                                save[0]['jumlah_kunjungan'],
                                save[1]['jumlah_kunjungan'],
                                save[2]['jumlah_kunjungan'],
                            ],
                            //backgroundColor:'green',
//                            backgroundColor:[
//                                'rgba(255, 99, 132, 0.6)',
//                                'rgba(54, 162, 235, 0.6)',
//                                'rgba(255, 206, 86, 0.6)',
//                                'rgba(75, 192, 192, 0.6)',
//                                'rgba(153, 102, 255, 0.6)',
//                                'rgba(255, 159, 64, 0.6)',
//                                'rgba(255, 99, 132, 0.6)'
//                            ],
//                            borderWidth:1,
//                            borderColor:'#777',
//                            hoverBorderWidth:3,
//                            hoverBorderColor:'#000'
                        }]
                    },
                    options:{
//                        responsive:true,
//                        title:{
//                            display:true,
//                            text:'KUNJUNGAN',
//                            fontSize:22
//                        },
//                        legend:{
//                            display:true,
//                            position:'right',
//                            labels:{
//                                fontColor:'#000'
//                            }
//                        },
//                        layout:{
//                            padding:{
//                                left:50,
//                                right:0,
//                                bottom:0,
//                                top:0
//                            }
//                        },
                       tooltips:{
                           enabled:true,
                           mode: 'index',
                           intersect: false,
                       }

//                        hover: {
//                            mode: 'nearest',
//                            intersect: true
//                        }
                    }
                });



            }
        });
    });

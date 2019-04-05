<div class="col-md-9 col-sm-12 col-xs-12">
    <form class="filter-table form-inline hidden-xs">
        <div class="form-group">
            <label class="control-label">Tgl Input</label>
            <input name="from_tgl" type="text" class="datepicker from_tgl form-control input-sm">
        </div>
        <div class="form-group">
            <label class="control-label"> s/d</label>
            <input name="to_tgl" type="text" class="datepicker to_tgl form-control input-sm">
        </div>
        <div class="form-group">
            <button id="refresh_filter" class="refresh_filter_data btn btn-primary btn-sm" type="button">Refresh</button>
        </div>
    </form>

<div class="demo-container" style="height:300px">
    <div id="chart_plot_02" class="demo-placeholder" style="padding: 0px; position: relative;">
        <canvas id="myChart" width="1170" height="500" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1170px; height: 280px;">
        </canvas>

        <canvas class="flot-overlay" width="1170" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1170px; height: 280px;"></canvas>
        <div class="legend"><div style="position: absolute; width: 71px; height: 15px; top: -17px; right: 21px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
            <table style="position:absolute;top:-17px;right:21px;;font-size:smaller;color:#3f3f3f">
                <tbody>
                <tr>
                    <td class="legendColorBox">
                        <div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(150,202,89);overflow:hidden"></div>
                        </div>
                    </td>
                    <td class="legendLabel">Email Sent&nbsp;&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="tiles">
    <div class="col-md-4 tile">
        <span>Total Sessions</span>
        <h2>231,809</h2>
        <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
    </div>
    <div class="col-md-4 tile">
        <span>Total Revenue</span>
        <h2>$231,809</h2>
        <span class="sparkline22 graph" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
    </div>
    <div class="col-md-4 tile">
        <span>Total Sessions</span>
        <h2>231,809</h2>
        <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>
    </div>
</div>

</div>
<script src="<?php assets('js/chartjs/chart.js') ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            data:"",
            dataType:"json",  //ini sangat perlu untuk mendefinisikan tipe datanya JSON yang diterima
            url:"ambildatachart",
            success:function (result) {
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


                let myChart = document.getElementById('myChart').getContext('2d');

                // Global Options
                Chart.defaults.global.defaultFontFamily = 'Lato';
                Chart.defaults.global.defaultFontSize = 18;
                Chart.defaults.global.defaultFontColor = '#777';



                let massPopChart = new Chart(myChart, {
                    type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data:{
                        //labels:[result[0]['tanggal'], result[1]['tanggal'], result[2]['tanggal'], result[3]['tanggal'],result[4]['tanggal'], result[5]['tanggal']],
                        labels:[save[0]['tanggal'],save[1]['tanggal'], save[2]['tanggal']],
                        datasets:[{
                            label:'Population',
                            data:[
                                617594,
                                181045,
                                1253060,
                                106519,
                                105162,
                                95072
                            ],
                            //backgroundColor:'green',
                            backgroundColor:[
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(255, 99, 132, 0.6)'
                            ],
                            borderWidth:1,
                            borderColor:'#777',
                            hoverBorderWidth:3,
                            hoverBorderColor:'#000'
                        }]
                    },
                    options:{
                        title:{
                            display:true,
                            text:'Largest Cities In Massachusetts',
                            fontSize:22
                        },
                        legend:{
                            display:true,
                            position:'right',
                            labels:{
                                fontColor:'#000'
                            }
                        },
                        layout:{
                            padding:{
                                left:50,
                                right:0,
                                bottom:0,
                                top:0
                            }
                        },
                        tooltips:{
                            enabled:true
                        }
                    }
                });



            }
        });
    });




</script>
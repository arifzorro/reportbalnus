/**
 * Created by wahyuarif on 1/21/19.
 */
//function createConfig(position) {

    $.ajax({
        type: "GET",
        data: "",
        dataType: "json",  //ini sangat perlu untuk mendefinisikan tipe datanya JSON yang diterima
        url: "ambildatachart",
        success: function (result) {
            //console.log(result);

            //var container = document.querySelector('#myChart');
            var container= document.getElementById("chart_plot_02");
             // ['average', 'nearest'].forEach(function (position) {
                var div = document.createElement('div');
                div.classList.add('chart-container');

                var canvas = document.createElement('canvas');
                div.appendChild(canvas);
                container.appendChild(div);

                var ctx = canvas.getContext('2d');
                // var config = createConfig(position);
                var config = createConfig('nearest');
                console.log(config);
                new Chart(ctx, config);
             // });

            function createConfig(position) {
                var save = [];

                for (i = 0; i < 7; i++) {
                    //console.log(result[i]);
                    if (result[i] == undefined) {
                        save[i] = {tanggal: "kosong"}; //mengisi arraay save ke x dengan penanda tanggal kosong
                    }
                    else {
                        save[i] = result[i];
                    }
                }
                //console.log(save);

                return {
                    type: 'line',
                    data: {
                        labels:[save[0]['tanggal'],save[1]['tanggal'], save[2]['tanggal'],save[3]['tanggal'],save[4]['tanggal']],
                        datasets:[{
                            label:'Kunjungan ODC',
                            fill:false,
                            lineTension:0.1,
//                            backgroundColor:"rgba(75,192,192,0.4)",
                            borderColor:"rgba(75,192,192,1)",
                            data:[
                                save[0]['jumlah_kunjungan'],
                                save[1]['jumlah_kunjungan'],
                                save[2]['jumlah_kunjungan'],
                            ],
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Tooltip Position: ' + position
                        },
                        tooltips: {
                            position: position,
                            mode: 'index',
                            intersect: false,
                        },
                    }
                };
            }
        }
    });



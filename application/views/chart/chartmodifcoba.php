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

<!--    <div class="demo-container" style="height:300px">-->
        <div id="chart_plot_02" class="demo-placeholder" style="padding: 0px; position: relative;">
<!--            <canvas id="myChart" width="1170" height="500" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1170px; height: 280px;">-->
<!--            </canvas>-->

<!--            <canvas class="flot-overlay" width="1170" height="280" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1170px; height: 280px;"></canvas>-->
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
<!--    </div>-->
    <div class="tilesmodif" style="margin: 250px;">
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
            <span class="sparkline11 graph" style="height: 160px;"><canvas width="198" height="40" style="display: inline-block; width: 198px; height: 40px; vertical-align: top;"></canvas></span>F
        </div>
    </div>

</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="<?php assets('js/chartjs/chart.js') ?>"></script>
<script src="<?php assets('js/chartjs/chartbundle.js') ?>"></script>
<script src="<?php assets('js/chartjs/cobapositiontolltip.js') ?>"></script>

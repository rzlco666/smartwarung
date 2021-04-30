    <?php
    //Inisialisasi nilai variabel awal
    $jumlah=null;
    foreach ($grafik_penjualan as $item)
    {
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>


    <script type="text/javascript">
    $(function() { $('[data-plugin="knob"]').knob() });
    var options = { chart: { height: 350, type: "area", toolbar: { show: !1 } }, colors: ["#3051d3", "#e4cc37"], dataLabels: { enabled: !1 }, series: [{ name: "2021", data: [<?php echo $jumlah; ?>] },], grid: { yaxis: { lines: { show: !1 } } }, stroke: { width: 3, curve: "smooth" }, markers: { size: 0 }, xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"], title: { text: "Bulan" } }, fill: { type: "gradient", gradient: { shadeIntensity: 1, opacityFrom: .7, opacityTo: .9, stops: [0, 90, 100] } }, legend: { position: "top", horizontalAlign: "right", floating: !0, offsetY: -25, offsetX: -5 } };
    (chart = new ApexCharts(document.querySelector("#tahunan-sale-chart"), options)).render();
    </script>

    <?php
    //Inisialisasi nilai variabel awal
    $nama_warung= "";
    $jumlahh=null;
    foreach ($grafik_warung as $itemm)
    {
        $jur=$itemm->warung;
        $nama_warung .= "'$jur'". ", ";
        $jum=$itemm->total;
        $jumlahh .= "$jum". ", ";
    }
    ?>

    <script type="text/javascript">   
    if ($("#column_chart_datalabell").length) { options = { chart: { height: 350, type: "bar", toolbar: { show: !1 } }, plotOptions: { bar: { dataLabels: { position: "top" } } }, dataLabels: { enabled: !0, offsetY: -20, style: { fontSize: "12px", colors: ["#00a7e1"] } }, series: [{ name: "Total", data: [<?php echo $jumlahh; ?>] }], colors: ["#0db4d6"], grid: { borderColor: "#f1f1f1" }, xaxis: { categories: [<?php echo $nama_warung; ?>], position: "top", labels: { offsetY: -18 }, axisBorder: { show: !1 }, axisTicks: { show: !1 }, crosshairs: { fill: { type: "gradient", gradient: { colorFrom: "#D8E3F0", colorTo: "#BED1E6", stops: [0, 100], opacityFrom: .4, opacityTo: .5 } } }, tooltip: { enabled: !0, offsetY: -35 } }, fill: { gradient: { shade: "light", type: "horizontal", shadeIntensity: .25, gradientToColors: void 0, inverseColors: !0, opacityFrom: 1, opacityTo: 1, stops: [50, 0, 100, 100] } }, yaxis: { axisBorder: { show: !1 }, axisTicks: { show: !1 }, labels: { show: !1 } }, title: { text: "Total warung terlaris dengan pesanan selesai", floating: !0, offsetY: 320, align: "center", style: { color: "#444" } } };
        (chart = new ApexCharts(document.querySelector("#column_chart_datalabell"), options)).render() }
    </script>

    <?php
    //Inisialisasi nilai variabel awal
    $nama_warungg= "";
    $jumlahhh=null;
    foreach ($grafik_pendapatan as $itemmm)
    {
        $jur=$itemmm->warung;
        $nama_warungg .= "'$jur'". ", ";
        $jum=$itemmm->total;
        $jumlahhh .= "$jum". ", ";
    }
    ?>

    <script type="text/javascript">
    if ($("#column_chartt").length) { options = { chart: { height: 350, type: "bar", toolbar: { show: !1 } }, plotOptions: { bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" } }, dataLabels: { enabled: !1 }, stroke: { show: !0, width: 2, colors: ["transparent"] }, series: [{ name: "Pendapatan", data: [<?php echo $jumlahhh; ?>] }], colors: ["#3051d3"], xaxis: { categories: [<?php echo $nama_warungg; ?>] }, yaxis: { title: { text: "Rp (Rupiah)" } }, grid: { borderColor: "#f1f1f1" }, fill: { opacity: 1 }, tooltip: { y: { formatter: function(e) { return "Rp " + e } } } };
        (chart = new ApexCharts(document.querySelector("#column_chartt"), options)).render() }
    </script>

    <?php
    //Inisialisasi nilai variabel awal
    $nama_status= "";
    $jumlahhhh=null;
    foreach ($grafik_pembeli as $itemmmm)
    {
        $jur=$itemmmm->name;
        $nama_status .= "'$jur'". ", ";
        $jum=$itemmmm->total;
        $jumlahhhh .= "$jum". ", ";
    }
    ?>

    <script type="text/javascript">
    if ($("#bar_chartt").length) { options = { chart: { height: 350, type: "bar", toolbar: { show: !1 } }, plotOptions: { bar: { horizontal: !0 } }, dataLabels: { enabled: !1 }, series: [{ name: "Total", data: [<?php echo $jumlahhhh; ?>] }], colors: ["#7c8a96"], grid: { borderColor: "#f1f1f1" }, xaxis: { categories: [<?php echo $nama_status; ?>] } };
        (chart = new ApexCharts(document.querySelector("#bar_chartt"), options)).render() }
    </script>

    <?php
    //Inisialisasi nilai variabel awal
    $nama_statuss= "";
    $jumlahhhhh=null;
    foreach ($grafik_status as $itemmmmm)
    {
        $jur=$itemmmmm->status;
        $nama_statuss .= "'$jur'". ", ";
        $jum=$itemmmmm->total;
        $jumlahhhhh .= "$jum". ", ";
    }
    ?>

    <script type="text/javascript">
    if ($("#pie_chartt").length) { options = { chart: { height: 320, type: "pie" }, series: [<?php echo $jumlahhhhh; ?>], labels: [<?php echo $nama_statuss; ?>], colors: ["#3051d3", "#3ddc97", "#e4cc37", "#f06543", "#eff2f7"], legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 }, responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }] };
        (chart = new ApexCharts(document.querySelector("#pie_chartt"), options)).render() }
    </script>
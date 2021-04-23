<?php 
// echo $this->uri->segment(1);
if ($this->uri->segment(1) == "admin" && $this->uri->segment(2) == "" || $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "index") {
    # code...
    $_labels = [];
    $_totals = [];
    $_labels_buyer = [];
    $_totals_buyer = [];
    $_labels_status = [];
    $_totals_status = [];
    for ($i=0; $i < count($warungs) ; $i++) {
        array_push($_labels, $warungs[$i]['username']);
        foreach ($graph_invoice as $kuy) {
            if ($warungs[$i]['username'] == $kuy->warung) {
                array_push($_totals, $kuy->total);
            } else {
                array_push($_totals, 0);
            }
        }
    }
    foreach ($graph_invoice_buyer as $key) {
        array_push($_labels_buyer, $key->name);
        array_push($_totals_buyer, $key->total);
    }
    foreach ($graph_invoice_warung as $key) {
        array_push($_labels_status, $key->warung);
        array_push($_totals_status, $key->total);
    } ?>
<!-- <?=json_encode($_labels)?> -->
<script src="<?=base_url()?>assets/node_modules/chart.js/dist/Chart.js"></script>
<script>
var ctx = document.getElementById('invoiceChart');
var cty = document.getElementById('invoiceBuyerChart');
var ctz = document.getElementById('invoiceStatusChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($_labels)?>,
        datasets: [{
            label: 'Total pesanan per warung',
            data: <?=json_encode($_totals)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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

var buyerChart = new Chart(cty, {
    type: 'bar',
    data: {
        labels: <?=json_encode($_labels_buyer)?>,
        datasets: [{
            // label: <?=json_encode($_labels_buyer)?>,
            data: <?=json_encode($_totals_buyer)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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
var statusChart = new Chart(ctz, {
    type: 'bar',
    data: {
        labels: <?=json_encode($_labels_status)?>,
        datasets: [{
            // label: 'total of status invoices',
            data: <?=json_encode($_totals_status)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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
</script>
<?php
} ?>
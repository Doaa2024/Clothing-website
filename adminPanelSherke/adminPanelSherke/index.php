<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Elegant Dashboard</title>
<?php require_once('components/header.php');
require_once("class/index.class.php");
error_reporting(E_ERROR | E_PARSE);
$index = new Index();
$customerNb = $index->getCustomerNb();
$topCustomer = $index->getTopCustomer();
$orderTotal = $index->getOrderNb();
$orderRevenue = $index->getTotalRevenue();
$topProduct = $index->getTopProducts();
$monthlyRevenue = $index->revenueMonth();
$chart = $index->getProductsperCategory();
$xValues = array();
$yValues = array();

foreach ($chart as $data) {
    $xValues[] = $data["categories_name"];
    $yValues[] = $data["product_count"];
}

$xValuesJS = json_encode($xValues);
$yValuesJS = json_encode($yValues);
$xValues1 = array();
$yValues1 = array();
foreach ($monthlyRevenue as $data) {
    $xValues1[] = $data["month"];
    $yValues1[] = $data["total_revenue"];
}

$xValuesJS1 = json_encode($xValues1);
$yValuesJS1 = json_encode($yValues1);


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .dashboard-container .charts {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    @media (max-width: 768px) {


        .sidebar-open .charts {
            padding-left: 0;
        }
    }

    @media (max-width: 576px) {



        .dashboard-container .table-container {
            padding: 10px;
        }
    }

    .charts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
        /* Adjust spacing between charts */
    }

    .chart-container {
        flex: 1;
        min-width: 300px;
        /* Adjust minimum width as needed */
        max-width: 100%;
    }

    /* Adjust based on sidebar visibility */
    .sidebar-open .charts {
        padding-left: 250px;
        /* Adjust based on sidebar width */
    }

    .dashboard-container {
        font-family: Arial, sans-serif;

        /* Light gray background for the body */
        color: #444;
        margin: 0;
        padding: 20px;

    }

    .sidebar-open~#layoutSidenav_content {
        margin-left: 250px;
        /* Adjust based on sidebar width */
        transition: margin-left 0.3s ease;
    }

    .sidebar-closed~#layoutSidenav_content {
        margin-left: 0;
        transition: margin-left 0.3s ease;
    }

    .dashboard-container .dashboard {
        display: flex;
        justify-content: space-around;
        border-radius: 8px;
        box-shadow: 0 2px 2px rgba(255, 255, 255, 1);
        margin-top: 10px;
        flex-wrap: wrap;
        background-color: #444;
        padding: 3px;
    }

    .dashboard-container .card {
        width: 230px;
        /* Increased width */
        height: 130px;
        /* Reduced height */
        padding: 20px;

        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
        /* Dark gray background */
        color: white;
        text-align: center;
        border-radius: 6px;
        background: linear-gradient(45deg, #222222, #cccccc);
        /* Optional: Add box shadow */
        transition: transform 0.3s ease;
        overflow: hidden;
        /* Prevents overflow on hover */
        margin: 10px;
        /* Margin all a
            /* Reduced width */
    }

    .dashboard-container .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .dashboard-container .card h3 {
        margin: 0;
        font-size: 1.5em;
    }

    .dashboard-container .card p {
        margin: 10px 0 0;
        font-size: 1.2em;
    }

    .dashboard-container .charts {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 20px;
        padding-top: 1%;

    }

    .dashboard-container .chart-container {

        background-color: #4D4D4D;
        /* White smoke background for the charts */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .dashboard-container .chart-container:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .dashboard-container .table-container {
        margin-top: 20px;

        background-color: #4D4D4D;
        /* Dark gray background for the table */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-top: 3%;
    }

    .dashboard-container table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;

    }

    .dashboard-container th,
    .dashboard-container td {
        padding: 10px;
        text-align: left;
    }

    .dashboard-container th {
        background-color: #333;
        /* Darker gray for table header */
        color: white;
    }

    .dashboard-container tr:nth-child(odd) {
        background-color: #4f4f4f;
        /* Striped colors */
    }

    .dashboard-container tr:nth-child(even) {
        background-color: #3c3c3c;
        /* Striped colors */
    }

    .dashboard-container tr:hover {
        background-color: #444;
        /* Change color on hover */
    }

    .dashboard-container .table-container h2 {
        color: #fff;
        margin-bottom: 10px;
    }
</style>
</head>


<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>


    <div id="layoutSidenav_content">
        <div class="dashboard-container">
            <div class="dashboard">
                <div class="card">
                    <i class="fas fa-users" style="margin-bottom:6px;"></i>
                    <h3>Customer's Nb</h3>
                    <p><?= $customerNb[0]['number_of_customers'] ?></p>
                </div>
                <div class="card">
                    <i class="fas fa-shopping-cart" style="margin-bottom:6px;"></i>
                    <h3>Order's Nb</h3>
                    <p><?= $orderTotal[0]['number_of_orders'] ?></p>
                </div>
                <div class="card">
                    <i class="fas fa-dollar-sign" style="margin-bottom:6px;"></i>
                    <h3>Total Revenue</h3>
                    <p><?= $orderRevenue[0]['total_amount'] ?>$</p>
                </div>
                <div class="card">
                    <i class="fas fa-star" style="margin-bottom:6px;"></i>
                    <h3>Top Customer</h3>
                    <p><?= $topCustomer[0]['UserName'] ?>(<?= $topCustomer[0]['total_revenue'] ?>$)</p>
                </div>
            </div>
            <div class="charts">
                <div class="chart-container">
                    <h2 style="color:#fff; font-size:x-large;">Products Per Category</h2>
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="chart-container">
                    <h2 style="color:#fff; font-size:x-large;">Revenue Per Time</h2>
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="table-container">

                <h2>Top 5 Selling Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ProductID</th>
                            <th>Product Name</th>
                            <th>Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?= $topProduct[0]['product_id'] ?></td>
                            <td><?= $topProduct[0]['product_name'] ?></td>
                            <td><?= $topProduct[0]['total_quantity_sold'] ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?= $topProduct[1]['product_id'] ?></td>
                            <td><?= $topProduct[1]['product_name'] ?></td>
                            <td><?= $topProduct[1]['total_quantity_sold'] ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?= $topProduct[2]['product_id'] ?></td>
                            <td><?= $topProduct[2]['product_name'] ?></td>
                            <td><?= $topProduct[2]['total_quantity_sold'] ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><?= $topProduct[3]['product_id'] ?></td>
                            <td><?= $topProduct[3]['product_name'] ?></td>
                            <td><?= $topProduct[3]['total_quantity_sold'] ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><?= $topProduct[4]['product_id'] ?></td>
                            <td><?= $topProduct[4]['product_name'] ?></td>
                            <td><?= $topProduct[4]['total_quantity_sold'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php require_once('components/footer.php'); ?>
        <?php require_once('components/script.php'); ?>

    </div>
    </div>
    <script>
        var xValues = <?php echo $xValuesJS; ?>;
        var yValues = <?php echo $yValuesJS; ?>;
        var xValues1 = <?php echo $xValuesJS1; ?>;
        var yValues1 = <?php echo $yValuesJS1; ?>;

        // Function to generate alternating colors
        function generateBarColors(count) {
            var colors = [];
            var color1 = "white";
            var color2 = "#dcdcdc";
            for (var i = 0; i < count; i++) {
                colors.push(i % 2 === 0 ? color1 : color2);
            }
            return colors;
        }

        var barColors = generateBarColors(xValues.length);
        var hoverColors = barColors.map(color => 'rgba(169, 169, 169, 0.6)'); // Light gray shadow color
        new Chart("myChart1", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                    hoverBackgroundColor: hoverColors
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,

                    fontColor: 'white' // Title text color
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'white' // X-axis labels color
                        },
                        gridLines: {
                            color: 'rgba(255, 255, 255, 0.1)' // X-axis grid lines color
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: 'white', // Y-axis labels color
                            min: 1, // Set the minimum value to 1
                            stepSize: 2 // Adjust this value as needed
                        },
                        gridLines: {
                            color: 'rgba(255, 255, 255, 0.1)' // Y-axis grid lines color
                        }
                    }]
                }
            }
        });


        // Additional chart (example with a line chart)
        new Chart("myChart2", {
            type: "line",
            data: {
                labels: xValues1, // Months
                datasets: [{
                    label: 'Monthly Revenue',
                    backgroundColor: 'rgba(255, 255, 255, 0.1)', // Slightly transparent white background
                    borderColor: 'white', // Line color
                    data: yValues1, // Revenue data
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white' // Legend text color
                    }
                },
                title: {
                    display: true,

                    fontColor: 'white' // Title text color
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'white' // X-axis labels color
                        },
                        gridLines: {
                            color: 'rgba(255, 255, 255, 0.1)' // X-axis grid lines color
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: 'white', // Y-axis labels color
                            beginAtZero: true
                        },
                        gridLines: {
                            color: 'rgba(255, 255, 255, 0.1)' // Y-axis grid lines color
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
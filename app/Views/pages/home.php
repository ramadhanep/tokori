<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Dashboard<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="/img/icons/unicons/cc-warning.png" alt="transaksi" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mt-3 mb-2">Total Transaksi Bulan ini</span>
          <h3 class="card-title mb-3"><?= $saleTotal ?></h3>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="/img/icons/unicons/wallet-info.png" alt="transaksi" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mt-3 mb-2">Pendapatan Bulan ini</span>
          <h3 class="card-title mb-3"><?= rupiahFormatDashboard($salesByCurrentMonth) ?></h3>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="/img/icons/unicons/chart-success.png" alt="transaksi" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mt-3 mb-2">Total Produk</span>
          <h3 class="card-title mb-3"><?= $productTotal ?></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-4 row">
    <div class="col-md-12 col-lg-9 mb-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Total Pendapatan</h5>
          <small class="card-subtitle">Data Tahun 2023</small>
        </div>
        <div class="card-body">
          <div id="totalIncomeChart"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("css") ?>
<link rel="stylesheet" href="/vendor/libs/apex-charts/apex-charts.css" />
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
"use strict";

(function () {
  // Define colors
  const cardColor = config.colors.cardColor;
  const headingColor = config.colors.headingColor;
  const textMuted = config.colors.textMuted;
  const borderColor = config.colors.borderColor;

  // Define gradient colors
  const gradientShade = "";
  const gradientShadeIntensity = 0.8;
  const gradientOpacityFrom = 0.7;
  const gradientOpacityTo = 0.25;
  const gradientStops = [0, 95, 100];

  // Total Income Chart
  const totalIncomeChartOptions = {
    chart: {
      height: 250,
      type: "area",
      toolbar: false,
      dropShadow: {
        enabled: true,
        top: 14,
        left: 2,
        blur: 3,
        color: config.colors.primary,
        opacity: 0.15,
      },
    },
    series: [
      {
        data: <?= json_encode($salesPerMonthArray) ?>,
        name: "Pendapatan"
      },
    ],
    dataLabels: { enabled: false },
    stroke: { width: 3, curve: "straight" },
    colors: [config.colors.primary],
    fill: {
      type: "gradient",
      gradient: {
        shade: gradientShade,
        shadeIntensity: gradientShadeIntensity,
        opacityFrom: gradientOpacityFrom,
        opacityTo: gradientOpacityTo,
        stops: gradientStops,
      },
    },
    grid: {
      show: true,
      borderColor: borderColor,
      padding: { top: -15, bottom: -10, left: 0, right: 0 },
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agt",
        "Sep",
        "Okt",
        "Nov",
        "Des",
      ],
      labels: { offsetX: 0, style: { colors: textMuted, fontSize: "13px" } },
      axisBorder: { show: false },
      axisTicks: { show: false },
      lines: { show: false },
    },
    yaxis: {
      labels: {
        offsetX: -15,
        formatter: function (val) {
          return "Rp" + parseInt(val / 1e6) + "jt";
        },
        style: { fontSize: "13px", colors: textMuted },
      },
      tickAmount: 5,
    },
  };

  const totalIncomeChartElement = document.querySelector("#totalIncomeChart");
  if (totalIncomeChartElement) {
    new ApexCharts(totalIncomeChartElement, totalIncomeChartOptions).render();
  }

})();

</script>
<?= $this->endSection() ?>
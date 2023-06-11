function startload(){}

let _statspan = 1;

const percentTotalAssistance = document.getElementById('percent-total-assistance');
let percentTotalAssistanceChart = null;

const percentTotalAssistanceAmount = document.getElementById('percent-total-assistance-amount');
let percentTotalAssistanceAmountChart = null;

const percentTotalAssistanceAmountCategory = document.getElementById('percent-total-assistance-amount-category');
let percentTotalAssistanceAmountCategoryChart = null;

const percentRemainingBalance = document.getElementById('percent-remaining-balance');
let percentRemainingBalanceChart = null;

const percentTotalAssistanceBarangay = document.getElementById('percent-total-assistance-barangay');
let percentTotalAssistanceBarangayChart = null;

const percentTotalAssistanceGender = document.getElementById('percent-total-assistance-gender');
let percentTotalAssistanceGenderChart = null;

const percentTotalAssistanceAge = document.getElementById('percent-total-assistance-age');
let percentTotalAssistanceAgeChart = null;

const counter = {
    id: 'counter',
    beforeDraw( chart, args, options ) {
        const { ctx, chartArea: { top, right, bottom, left, width, height } } = chart;
        let optionSize = options.fontSize.replace('px','');
        ctx.save();
        ctx.font = options.fontSize + ' ' + options.fontFamily;
        ctx.fillStyle = 'center';
        ctx.fillText(options.dataValue, (width/2)-((options.dataValue.length)*(optionSize/4.5)), (top+(height/2)));
        ctx.font = '15px sans-serif';
        ctx.fillText(options.dataTitle, (width/2)-((options.dataTitle.length)*3.8), (top+(height/2))+18);
    }
}

let totalAssistance = ($span,$timer=false) => {
    if(percentTotalAssistanceChart != null && !$timer)
    percentTotalAssistanceChart.destroy();

    let totalAssistance = 0;
    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved", span: $span },
        success: function(result) {	
            if(percentTotalAssistanceChart != null && $timer)
            percentTotalAssistanceChart.destroy();

            totalAssistance = result['data']['total'] ?? 0;
            percentTotalAssistanceChart = new Chart(percentTotalAssistance, {
                type: 'doughnut',
                data: {
                    labels: ['Total Count'],
                    datasets: [{
                        data: [totalAssistance],
                        backgroundColor: [
                        'rgba(43, 122, 120, .8)',
                        ],
                    }]
                },
                options: {
                    cutout: '90%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        counter: {
                            fontSize: (calculateFontSize(totalAssistance)) + 'px',
                            fontFamily: 'sans-serif',
                            dataValue: numberWithCommas(totalAssistance),
                            dataTitle: 'Total Count',
                        }
                    },
                    maintainAspectRatio: false,
                },
                plugins: [counter]
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let totalAssistanceAmount = ($span,$timer=false) => {
    if(percentTotalAssistanceAmountChart != null && !$timer)
        percentTotalAssistanceAmountChart.destroy();

    let totalAssistanceAmount = 0;
    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved_amount", span: $span },
        success: function(result) {	
            if(percentTotalAssistanceAmountChart != null && $timer)
            percentTotalAssistanceAmountChart.destroy();

            totalAssistanceAmount = result['data']['total'] ?? 0;
            percentTotalAssistanceAmountChart = new Chart(percentTotalAssistanceAmount, {
                type: 'doughnut',
                data: {
                    labels: ['Total Amount'],
                    datasets: [{
                        data: [totalAssistanceAmount],
                        backgroundColor: [
                        'rgba(43, 122, 120, .8)',
                        ],
                    }]
                },
                options: {
                    cutout: '90%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        counter: {
                            fontSize: (calculateFontSize('₱ ' + totalAssistanceAmount)) + 'px',
                            fontFamily: 'sans-serif',
                            dataValue: '₱ ' + numberWithCommas(totalAssistanceAmount),
                            dataTitle: 'Total Amount',
                        }
                    },
                    maintainAspectRatio: false,
                },
                plugins: [counter]
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let totalAssistanceAmountCategory = ($span,$timer=false) => {
    if(percentTotalAssistanceAmountCategoryChart != null && !$timer)
    percentTotalAssistanceAmountCategoryChart.destroy();

    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved_amount_by_category", span: $span },
        success: function(result) {	
            let category = [];
            let values = [];
            for(let i = 0; i<result['data'].length; i++)
            {
                category.push(result['data'][i]['category']);
                values.push(result['data'][i]['amount']);
            }

            if(percentTotalAssistanceAmountCategoryChart != null && $timer)
            percentTotalAssistanceAmountCategoryChart.destroy();

            percentTotalAssistanceAmountCategoryChart = new Chart(percentTotalAssistanceAmountCategory, {
                type: 'pie',
                data: {
                    labels: category,
                    datasets: [{
                        label: 'New',
                        data: values,
                        backgroundColor: [
                            'rgba(43, 122, 120, .8)',
                            'rgba(58, 175, 169, .8)',
                        ],
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    maintainAspectRatio: false,
                }
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let remainingBalance = ($timer = false) => {
    if(percentRemainingBalanceChart != null && !$timer)
    percentRemainingBalanceChart.destroy();

    let totalRemainingBalance = 0;
    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_remaining_balance" },
        success: function(result) {	
            totalRemainingBalance = result['data']['amount'] ?? 0;

            if(percentRemainingBalanceChart != null && $timer)
            percentRemainingBalanceChart.destroy();

            percentRemainingBalanceChart = new Chart(percentRemainingBalance, {
                type: 'doughnut',
                data: {
                    labels: ['Remaining Balance'],
                    datasets: [{
                        data: [totalRemainingBalance],
                        backgroundColor: [
                            'rgba(43, 122, 120, .8)',
                        ],
                    }]
                },
                options: {
                    cutout: '90%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        counter: {
                            fontSize: (calculateFontSize('₱ ' + totalRemainingBalance)) + 'px',
                            fontFamily: 'sans-serif',
                            dataValue: '₱ ' + numberWithCommas(totalRemainingBalance),
                            dataTitle: 'Remaining Balance',
                        }
                    },
                    maintainAspectRatio: false,
                },
                plugins: [counter]
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let totalAssistanceBarangay = ($span,$timer=false) => {
    if(percentTotalAssistanceBarangayChart != null && !$timer)
        percentTotalAssistanceBarangayChart.destroy();

    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved_by_barangay", span: $span },
        success: function(result) {	
            let barangay = [];
            let values = [];
            for(let i = 0; i<result['data'].length; i++)
            {
                barangay.push(result['data'][i]['barangay']);
                values.push(result['data'][i]['total']);
            }
            if(percentTotalAssistanceBarangayChart != null && $timer)
                percentTotalAssistanceBarangayChart.destroy();

            percentTotalAssistanceBarangayChart = new Chart(percentTotalAssistanceBarangay, {
                type: 'bar',
                data: {
                    labels: barangay,
                    datasets: [{
                        label: "test",
                        data: values,
                        backgroundColor: [
                            'rgba(43, 122, 120, .8)',
                        ],
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                          grid: {
                            display: false
                          }
                        },
                        y: {
                          grid: {
                            display: false
                          }
                        }
                    },
                    maintainAspectRatio: false,
                }
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let totalAssistanceGender = ($span,$timer=false) => {
    if(percentTotalAssistanceGenderChart != null && !$timer)
    percentTotalAssistanceGenderChart.destroy();

    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved_by_gender", span: $span },
        success: function(result) {	
            let gender = [];
            let values = [];
            for(let i = 0; i<result['data'].length; i++)
            {
                gender.push(result['data'][i]['sex']);
                values.push(result['data'][i]['total']);
            }

            if(percentTotalAssistanceGenderChart != null && $timer)
            percentTotalAssistanceGenderChart.destroy();

            percentTotalAssistanceGenderChart = new Chart(percentTotalAssistanceGender, {
                type: 'pie',
                data: {
                    labels: gender,
                    datasets: [{
                        label: 'New',
                        data: values,
                        backgroundColor: [
                            'rgba(43, 122, 120, .8)',
                            'rgba(58, 175, 169, .8)',
                        ],
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    maintainAspectRatio: false,
                }
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let totalAssistanceAge = ($span,$timer=false) => {
    if(percentTotalAssistanceAgeChart != null && !$timer)
        percentTotalAssistanceAgeChart.destroy();

    $.ajax({
        url: 'controllers/dashboardController.php',
        cache: false,
        dataType: 'json',
        type: 'POST',
        data: { trans: "total_approved_by_age", span: $span },
        success: function(result) {	
            let age = [
                '0-10',
                '11-20',
                '21-30',
                '31-40',
                '41-50',
                '51-60',
                '61-70',
                '71-80',
                '81-90',
                '90+',
            ];
            let values = [
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
            ];
            for(let i = 0; i<result['data'].length; i++)
            {
                if(result['data'][i]['age'] > 90)
                    values[9] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 80)
                    values[8] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 70)
                    values[7] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 60)
                    values[6] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 50)
                    values[5] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 40)
                    values[4] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 30)
                    values[3] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 20)
                    values[2] += result['data'][i]['total'];
                else if(result['data'][i]['age'] > 10)
                    values[1] += result['data'][i]['total'];
                else
                    values[0] += result['data'][i]['total'];
            }

            if(percentTotalAssistanceAgeChart != null && $timer)
            percentTotalAssistanceAgeChart.destroy();

            percentTotalAssistanceAgeChart = new Chart(percentTotalAssistanceAge, {
                type: 'bar',
                data: {
                    labels: age,
                    datasets: [{
                        label: age,
                        data: values,
                        backgroundColor: [
                            'rgba(43, 122, 120, .8)',
                        ],
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                          grid: {
                            display: false
                          }
                        },
                        y: {
                          grid: {
                            display: false
                          }
                        }
                    },
                    maintainAspectRatio: false,
                }
            });
        },
        error: function(err){
            console.log("Failed to load statistics.");
            console.log(err);
        }
    });
}

let autorefreshstat = ()=>{
    totalAssistance(_statspan,true);
    totalAssistanceAmount(_statspan,true);
    totalAssistanceAmountCategory(_statspan,true);
    remainingBalance(true);
    totalAssistanceBarangay(_statspan,true);
    totalAssistanceGender(_statspan,true);
    totalAssistanceAge(_statspan,true);

    setTimeout(function(){autorefreshstat();}, 60000);
}

$(document).ready(function(){
    // For checking url parameters
    // const urlParams = new URLSearchParams(window.location.search);
    // const accesstoken = urlParams.get('tk');
    // console.log(accesstoken);
    // alert(accesstoken);


    _statspan = $('#statistic-span').val();
    autorefreshstat();

    $('#statistic-span').change(function(){
        _statspan = $(this).val();
        totalAssistance(_statspan);
        totalAssistanceAmount(_statspan);
        totalAssistanceAmountCategory(_statspan);
        remainingBalance();
        totalAssistanceBarangay(_statspan);
        totalAssistanceGender(_statspan);
        totalAssistanceAge(_statspan);
    });
});

let calculateFontSize = function(x){
    let len = x.toString().length;
    if(len <= 7)
        return 30;
    else
        return (30 - ((len-7)/0.3));
}

let numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
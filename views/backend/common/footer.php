<!-- footer -->
<div class="footer">
    <div class="wthree-copyright">
        <p>© 2023 MAXBOOK | Thiết kế bởi: minh</p>
    </div>
</div>
<!-- / footer -->
</section>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="<?php
echo route(); ?>/assets/js/bootstrap.js"></script>
<script src="<?php
echo route(); ?>/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php
echo route(); ?>/assets/js/scripts.js"></script>
<script src="<?php
echo route(); ?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?php
echo route(); ?>/assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php
echo route(); ?>/assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php
echo route(); ?>/assets/js/jquery.scrollTo.js"></script>
<!-- filter-tables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/<?php
echo route(); ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo route();?>assets/js/toastr.min.js "></script>
<!-- morris JavaScript -->
<script>
    $(document).ready(function () {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function () {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function () {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function () {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: $('.hero-area'),
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2007', value: 0 },
                { year: '2008', value: 20 },
                { year: '2009', value: 10 },
                { year: '2010', value: 5 },
                { year: '2011', value: 5 },
                { year: '2012', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });

        // graphArea2 = Morris.Line({
        //     element: $('.hero-area'),
        //     padding: 10,
        //     behaveLikeLine: true,
        //     gridEnabled: false,
        //     gridLineColor: '#dddddd',
        //     axes: true,
        //     resize: true,
        //     smooth: true,
        //     pointSize: 0,
        //     lineWidth: 0,
        //     fillOpacity: 0.85,
        //     data: [
        //         {period: '2015 Q1', book: 2668, order: null, customer: 2649},
        //         {period: '2015 Q2', book: 15780, order: 13799, customer: 12051},
        //         {period: '2015 Q3', book: 12920, order: 10975, customer: 9910},
        //         {period: '2015 Q4', book: 8770, order: 6600, customer: 6695},
        //         {period: '2016 Q1', book: 10820, order: 10924, customer: 12300},
        //         {period: '2016 Q2', book: 9680, order: 9010, customer: 7891},
        //         {period: '2016 Q3', book: 4830, order: 3805, customer: 1598},
        //         {period: '2016 Q4', book: 15083, order: 8977, customer: 5185},
        //         {period: '2017 Q1', book: 10697, order: 4470, customer: 2038},
        //
        //     ],
        //     lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
        //     xkey: 'period',
        //     redraw: true,
        //     ykeys: ['book', 'order', 'customer'],
        //     labels: ['Số lượng sách', 'Tổng số đơn hàng', 'Số khách hàng đăng ký tài khoản'],
        //     pointSize: 2,
        //     hideHover: 'auto',
        //     resize: true,
        //     // xLabelFormat: function (x) {
        //     //     let day = x.getDay(),
        //     //         days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        //     //     return days[day];
        //     // }
        // });

    });
</script>
<!-- calendar -->
<script type="text/javascript" src="<?php
echo route(); ?>/assets/js/monthly.js"></script>
<script type="text/javascript">
    $(window).load(function () {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }
    });
</script>
<!-- //calendar -->
<script>
    function showToast(messageType, message) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
        };

        toastr[messageType](message);
    }
</script>
<script>
    <?php customToaster('success');
    customToaster('warning');
    customToaster('error');
    customToaster('info');
    ?>
</script>
</body>
</html>

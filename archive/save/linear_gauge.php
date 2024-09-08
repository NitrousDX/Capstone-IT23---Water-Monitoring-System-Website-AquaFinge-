<div id="anychart-embed-samples-gauge-linear-04" class="anychart-embed anychart-embed-samples-gauge-linear-04">
<script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-linear-gauge.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<div id="ac_style_samples-gauge-linear-04" style="display:none;">

</div>
<script>(function(){
function ac_add_to_head(el){
	var head = document.getElementsByTagName('head')[0];
	head.insertBefore(el,head.firstChild);
}
function ac_add_link(url){
	var el = document.createElement('link');
	el.rel='stylesheet';el.type='text/css';el.media='all';el.href=url;
	ac_add_to_head(el);
}
function ac_add_style(css){
	var ac_style = document.createElement('style');
	if (ac_style.styleSheet) ac_style.styleSheet.cssText = css;
	else ac_style.appendChild(document.createTextNode(css));
	ac_add_to_head(ac_style);
}
ac_add_link('https://cdn.anychart.com/releases/8.12.1/css/anychart-ui.min.css?hcode=a0c21fc77e1449cc86299c5faa067dc4');
ac_add_style(document.getElementById("ac_style_samples-gauge-linear-04").innerHTML);
ac_add_style(".anychart-embed-samples-gauge-linear-04{width:600px;height:450px;}");
})();</script>
<div id="container"></div>
<script>
anychart.onDocumentReady(function () {

   // create data
   var data = [63];

   // set the gauge type
   var gauge = anychart.gauges.linear();

   // set the data for the gauge
   gauge.data(data);

   // set the layout
   gauge.layout('horizontal');

   // create a color scale
   var scaleBarColorScale = anychart.scales.ordinalColor().ranges(
   [
       {
           from: 0,
           to: 25,
           color: ['#D81E05', '#EB7A02']
       },
       {
           from: 25,
           to: 50,
           color: ['#EB7A02', '#FFD700']
       },
       {
           from: 50,
           to: 75,
           color: ['#FFD700', '#CAD70b']
       },
       {
           from: 75,
           to: 100,
           color: ['#CAD70b', '#2AD62A']
       }
   ]
   );

   // create a Scale Bar
   var scaleBar = gauge.scaleBar(0);

   // set the height and offset of the Scale Bar (both as percentages of the gauge height)
   scaleBar.width('5%');
   scaleBar.offset('31.5%');

   // use the color scale (defined earlier) as the color scale of the Scale Bar
   scaleBar.colorScale(scaleBarColorScale);

   // add a marker pointer
   var marker = gauge.marker(0);

   // set the offset of the pointer as a percentage of the gauge width
   marker.offset('31.5%');

   // set the marker type
   marker.type('triangle-up');

   // set the zIndex of the marker
   marker.zIndex(10);

   // configure the scale
   var scale = gauge.scale();
   scale.minimum(0);
   scale.maximum(100);
   scale.ticks().interval(10);

   // configure the axis
   var axis = gauge.axis();
   axis.minorTicks(true)
   axis.minorTicks().stroke('#cecece');
   axis.width('1%');
   axis.offset('29.5%');
   axis.orientation('top');

   // format axis labels
   axis.labels().format('{%value}%');

   // set paddings
   gauge.padding([0, 50]);

   // set the container id
   gauge.container('container');

   // initiate drawing the gauge
   gauge.draw();
});
</script>
</div>
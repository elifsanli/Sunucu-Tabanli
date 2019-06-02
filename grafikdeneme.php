<!DOCTYPE html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>
$(document).ready(function(){
showGraph();
});
function showGraph(){
$.post("grafikjson.php",
function(data){
console.log(data);
var miktar=[];
var kar=[];
for (var i in data){
miktar.push(data[i].miktar);
kar.push(data[i].kar);
};
var chartdata={
labels:miktar,
datasets:[
{
label:'Kar',
data:kar
}]
};
var cnv=$("#myChart");
var barGraph=new Chart(cnv,{
type:'bar',
data:chartdata
});
});
};
</script>
<style>
div{
width:300px;
height:300px;
}
</style>
</head>
<body>
<div>
<canvas id="myChart"></canvas>
</div>
</body>
</html>

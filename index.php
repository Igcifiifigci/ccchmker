
<html>
<head>
	
	<link href="wbindex.css" rel="stylesheet" id="bootstrap-css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"> <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"> <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"> <link rel="manifest" href="/site.webmanifest">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Phantom Checker</title>
</head>
<body background-color:"#443266">
	<br>
<center> 

 <center><h3>
<img src="assets/img/phantom.png" alt="Phantom Troupe" width="50" height="50"> Phantom Troupe</h3><br>
<center>

<div class="card-body">
<div class="md-form">
<center><div class="md-form">
<h4>Phantom Checker</h4>
</div><br>
Credit Cards :
<textarea type="text" style="text-align: center;" id="lista" class="md-textarea form-control" rows="4" placeholder="Enter Cards"></textarea>
<br>

</center>
</div>
<br>
<div class="col-md-12">
<center>
 <button class="btn btn-info" style="width: 100px; outline: none;" id="testar" onclick="enviar()" >START</button>
  <button class="btn btn-info" style="width: 100px; outline: none;" OnClientClick="return SubmitClick()">STOP</button><br><br>

<span align=left>Approved:</span> <span id="cLive" class="badge badge-success">0</span>
<span>Declined:</span> <span id="cDie" class="badge badge-danger"> 0</span>
<br>
<span>Checked:</span> <span id="total" class="badge badge-info">0</span>

<span>Total:</span> <span id="carregadas" class="badge badge-dark">0</span>

</div>
</div>
</div>
</center>
<br>
</div>
</div>
</div>
</div>


</center></center>
<div class="card-body">
<div class="card">
	<button id="mostra" class="btn btn-success">Approved</button><br>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span></br>

</div>
</div>

<div class="card">
	<button id="mostra2" class="btn btn-danger">Declined</button>
</div>

    
    <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
    </div>
  </div>
</div>
</div>
  </div>
</div>
             

</div>
<br>
</center>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){


    $("#bode").hide();
	$("#esconde").show();
	
	$('#mostra').click(function(){
	$("#bode").slideToggle();
	});

});

</script>

<script type="text/javascript">

$(document).ready(function(){


    $("#bode2").hide();
	$("#esconde2").show();
	
	$('#mostra2').click(function(){
	$("#bode2").slideToggle();
	});

});

</script>

<script title="ajax do checker">
    function enviar() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var rp = 0;
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
          var sec = $("#sec").val();
                    $.ajax({
                        url: 'api.php?lista=' + value + '&sec=' + sec,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#LIVE")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 1000 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
<footer>
<center><p><a href="http://t.me/PTHisokabot">Apply?</a></p></center>
</footer>
</body>

</html>

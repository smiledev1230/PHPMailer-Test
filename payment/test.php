<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>


<input type="text" id="text1"> +
<input type="text" id="text2">
<button id="button"> = </button>
<div id="result"></div>
<script>
$('#button').click(function() {
    var val1 = $('#text1').val();
    var val2 = $('#text2').val();
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: { text1: val1, text2: val2 },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
</script>
<?
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
echo $text1 + $text2;
?>
</body>
</html>

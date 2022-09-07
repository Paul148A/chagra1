

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<svg id="barcodig12"></svg>
    
</body>
</html>
<script type="text/javascript">
    JsBarcode("#barcodig12", "12345678", {
      format:"codabar",
      lineColor:"#000",
      width: 4,
      heigth: 30,
      displayValue: true
    })
   </script>

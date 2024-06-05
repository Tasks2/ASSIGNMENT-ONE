<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CALCULATOR</title>
    <style>
        body{
            background-color: #F0F0F0;
        }
        body, form, .nums, label, p, .btns, select{
            font-family: Arial, Helvetica, sans-serif;
        }
        form{
            margin-left: 500px;
        }
        .nums{
            width: 240px;
            height: 22.5px;
            border-radius: 5px;
            margin: 12px 15px;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            background-color: #E8F5E9;
            color: #FF8C00;
        }
        label, p{
            margin:10px;
            padding: 5px;
            font-weight: bold;
            font-size: 20px;
            color: #9ACD32;
        }
        .btns{
            width: 85px;
            height: 30px;
            margin: 10px;
            font-weight: bold;
            padding: 5px;
            font-size: 14.8px;
            border-radius: 5px;
            background-color: #E0F7FA;
            color: #FF8C00;
        }
        select{
            font-weight: bold;
            font-size: 16.5px;
            margin: 10px;
            padding: 4.5px;
            text-align: right;
            background-color: #E8F5E9;
            color: #FF8C00;
            border-radius: 3px;
            border-width: 2px;
        }
    </style>
</head>
<body>
    <form method="post">    
        <label for="" >Enter first number</label><br>
        <input type="number" name="firstNum" step="0.01" class="nums" value="0" required> <br>
        <label for="">Choose operator: </label><br>
        <select name="operator" id="">
            <option value="none" ></option>
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="times">&times;</option>
            <option value="div">&divide;</option>
            <option value="square" >&sup2;</option>
            <option value="cube" >&sup3;</option>
            <option value="raise">^</option>
            <option value="log">log</option>
            <option value="root">&radic;</option>
            <option value="cubert" >&#8731;</option>
            <option value="expon" >&exponentiale;</option>
            <option value="percentager">&percnt;</option>
        </select><br>
        <label for="">Enter second number</label><br>
        <input type="number" name="secNum" step="0.01" class="nums" value="0" required><br>
        <input type="submit" value="&equals;" name="submit" class="btns">
        <input type="submit" value="CLEAR" name="clear" class="btns"><br>    
    </form>

    <?php
    if(isset($_POST['submit'])){
        $num1 = $_POST['firstNum'];
        $num2 = $_POST['secNum'];
        $sign = $_POST['operator'];
        $answer = 0;

       switch($sign){
        case 'none':
            $answer = 0;
            break;
        case 'add':
            $answer = $num1 + $num2;
            break;
        case 'sub':
            $answer = $num1 - $num2;
            break;
        case 'times':
            $answer = $num1 * $num2;
            break;
        case 'div':
            if ($num2 != 0) {
                $answer = $num1 / $num2;
            } else {
                echo"<p style='margin-left:500px;'>  Math Error! </p>";
            }
            break;
        case 'raise':
             $answer = pow($num1,$num2);
             break;
        case 'square':
            if ($num1 !=0 && $num2 == 0)
             {
                $answer = $num1 * $num1;
             }
             else if($num2 !=0 && $num1 == 0)
             {
                $answer = $num2 * $num2;
             }
             break;
        case 'cube':
            if ($num1 !=0 && $num2 == 0)
            {
                $answer = $num1 * $num1 * $num1;
            }
            else if($num2 !=0 && $num1 == 0)
            {
                $answer = $num2 * $num2 * $num2;
            }
            break;
        case 'log':
            if ($num1 !=0 && $num2 == 0)
            {
                $answer = log10($num1);
            }
            else if($num2 !=0 && $num1 == 0)
            {
                $answer = log10($num2);
            }
            else if($num1 !=0 && $num2 != 0)
            {
                $answer =$num1 * log10($num2);
            }
            break;
        case 'root':
            if ($num1 !=0 && $num2 == 0)
            {
                 $answer = sqrt($num1);
            }
            else if($num2 !=0 && $num1 == 0)
            {
                $answer = sqrt($num2);
            }
            else if($num1 !=0 && $num2 != 0)
            {
                $answer =$num1 * sqrt($num2);
            }
            break;
        case 'cubert':
            if ($num1 !=0 && $num2 == 0)
            {
              $answer = pow($num1, 1/3);
            }
            else if($num2 !=0 && $num1 == 0)
            {
                 $answer = pow($num2, 1/3);
            }
            else if($num1 !=0 && $num2 != 0)
            {
               $answer =$num1 * pow($num2, 1/3);
            }
            break;
        case 'expon':
            if ($num1 !=0 && $num2 == 0)
            {
                $answer = exp($num1);
            }
            else if($num2 !=0 && $num1 == 0)
            {
                 $answer = exp($num2);
            }
            else if($num1 !=0 && $num2 != 0)
            {
                $answer =$num1 * exp($num2);
            }
            break;
        case 'percentager':
            $answer = ($num1 * $num2) /100;
        default:
         echo "<p>Error occured!</p>";
       }
       echo "<p step=0.01 style='margin-left:500px;' > Answer = " . number_format($answer, 3). "</p>";
    } 
    ?>

</body>
</html>
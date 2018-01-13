<!DOCTYPE html>
<html>
	<head>
		<title>A simple calculator</title>
	</head>
<body>
<form action="calculator.php" method="post">
	<table width="500" align="center" bgcolor="skyblue">
		<tr align="center">
			<td colspan="2">
			<h2>A Simple Calculator</h2>
			</td>
		</tr>
		<tr>
			<td align="right">
				<b>Enter Value 1:</b>
			</td>
			<td>
				<input type="text" name="value1" placeholder="Enter Values Here!"/>
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<b>Enter Value 2:</b>
			</td>
			<td>
				<input type="text" name="value2" placeholder="Enter Values Here!"/>
			</td>
		</tr>
		<tr>
			<td align="right">
				<b>Select an Operator</b>
			</td>
			<td>
				<select name="opt">				
					<option>Select Opertaor</option>
					<option>+</option>
					<option>-</option>
					<option>/</option>
					<option>*</option>
				</select>
			</td>
		</tr>
		
		<tr align="center">
			<td colspan="3">
				<input type="submit" name="calc" value="Calculate Now!"/>
			</td>
		</tr>
	</table>
</form>
<?php
if(isset($_POST['calc']))
{
	$value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$opt = $_POST['opt'];
	
	if($opt=='+')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'>Your Answer is: ";
		echo $value1+$value2;
		echo "</b></center>";
	}
	
	if($opt=='-')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'>Your Answer is: ";
		echo $value1-$value2;
		echo "</b></center>";
	}
	
	if($opt=='/')
	{
		echo "<br><center><b style='background: skyblue; padding: 10px;'>Your Answer is: ";
		echo $value1/$value2;
		echo "</b></center>";
	}
	
	if($opt=='*')
	{
		echo "<br><center><b style='background: pink; padding: 10px;'>Your Answer is: ";
		echo $value1*$value2;
		echo "</b></center>";
	}
}
?>
</body>
</html>
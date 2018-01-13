<!DOCTYPE html>
<html>
	<head>
		<title>A Simple Converter!</title>
	</head>
<body>
<form action="converter.php" method="post">
	<table width="600" align="center" bgcolor="skyblue">
		<tr align="center">
			<td colspan="4"><h2>Currency Converter</h2><td>
		</tr>
		<tr>
			<td align="right"><b>Enter Amount:</b></td>
			<td>
			<input type="text" name="amount" placeholder="Enter Amount"/>
			</td>
		</tr>
		<tr>
			<td align="right"><b>Convert from:</b></td>
			<td>
				<select name="from">
					<option>Select a Currency</option>
					<option>PKR</option>
					<option>USD</option>
					<option>AUD</option>
					<option>INR</option>
					<option>POUND</option>
					<option>EURO</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><b>Convert to:</b></td>
			<td>
				<select name="to">
					<option>Select a Currency</option>
					<option>EURO</option>
					<option>USD</option>
					<option>AUD</option>
					<option>INR</option>
					<option>POUND</option>
					<option>PKR</option>
				</select>
			</td>
		</tr>
		<tr align="center">
			<td colspan="4">
			<input type="submit" name="convert" value="Convert Currency"/>
			</td>
		</tr>
	</table>
<form>
<?php
if(isset($_POST['convert']))
{
	$amount = $_POST['amount'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	
	if($from=='USD' AND $to=='PKR')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'> Your Balance is: ";
		echo $amount*106;
		echo "</b></center>";
	}
	
	if($from=='USD' AND $to=='POUND')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'> Your Balance is: ";
		echo $amount*.70;
		echo "</b></center>";
	}
	
	if($from=='INR' AND $to=='PKR')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'> Your Balance is: ";
		echo $amount*1.55;
		echo "</b></center>";
	}
	
	if($from=='POUND' AND $to=='PKR')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'> Your Balance is: ";
		echo $amount*180;
		echo "</b></center>";
	}
	
	if($from=='POUND' AND $to=='INR')
	{
		echo "<br><center><b style='background: orange; padding: 10px;'> Your Balance is: ";
		echo $amount*155;
		echo "</b></center>";
	}
}
?>
</body>
</html>
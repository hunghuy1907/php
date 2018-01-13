<!DOCTYPE html>
<html>
	<head>
		<title>Simple Calculator</title>
	</head>
<body>
<form action="calc.php" method="post">

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
			<input type="text" name="value1" placeholder="Enter values"/>
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<b>Enter Value 2:</b>
			</td>
			<td>
			<input type="text" name="value2" placeholder="Enter values"/>
			</td>
		</tr>
		
		<tr>
			<td align="right">
			<b>Select an operators</b>
			</td>
			<td>
				<select name="opt">
					<option>Select Operators</option>
					<option>+</option>
					<option>-</option>
					<option>/</option>
					<option>*</option>
				</select>
			</td>
		</tr>
		
		<tr align="center">
			<td colspan="3">
			<input type="submit" name="calcc" value="Calculate Now!"/>
			</td>
		</tr>
	</table>

</form>
</body>
</html>
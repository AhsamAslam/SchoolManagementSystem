<style>
    html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}

.container2 {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 80vw;
	height: 60vh;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
    font-size: 1.8rem;

}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead th {
  background-color: #55608f;
}

tbody tr:hover {
  background-color: rgba(255, 255, 255, 0.3);
}
tbody td {
  position: relative;
}
tbody td:hover:before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -9999px;
  bottom: -9999px;
  background-color: rgba(255, 255, 255, 0.2);
  z-index: -1;
}

</style>
<div class="container2">
<table>
    <thead>
      <tr>
        <td colspan="3">Course </td>
        <td rowspan="2"> Class </td>
        <td rowspan="2"> Marks </td>
        <td colspan="2"> Grade </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CS 225 </td>
        <td colspan="2">Data Structures </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A </td>
        <td> 12.0 </td>
      </tr>
      <tr>
        <td>PHIL 105 </td>
        <td colspan="2">Ethics </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A- </td>
        <td> 10.98 </td>
      </tr>
      <tr>
        <td>ECE 310 </td>
        <td colspan="2">Digital Signal Processing </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A </td>
        <td> 12 </td>
      </tr>
      <tr>
        <td>CS 373 </td>
        <td colspan="2">Combinatorial Algorithms </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> B+ </td>
        <td> 9.99</td>
      </tr>
      <tr>
        <td>MATH 225 </td>
        <td colspan="2">Multi-Variable Calculus </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A- </td>
        <td> 10.98 </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr>
      <!-- <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr> -->
  </table>
</div>
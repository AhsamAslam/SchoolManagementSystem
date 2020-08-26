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
      <th scope="col"></th>
      <th scope="col">Monday</th>
      <th scope="col">Tuesday</th>
      <th scope="col">Wednesday</th>
      <th scope="col">Thursday</th>
      <th scope="col">Friday</th>
      <th scope="col">Saturday</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <th scope="row">7:00 - 8:00</th>
      <td>English</td>
      <td>English</td>
      <td>English</td>
      <td>English</td>
      <td>English</td>
      <td>English</td>
      </tr>
      <tr>
      <th scope="row">8:00 - 9:00</th>
      <td>Urdu</td>
      <td>Urdu</td>
      <td>Urdu</td>
      <td>Urdu</td>
      <td>Urdu</td>
      <td>Urdu</td>
      </tr>
      <tr>
      <th scope="row">9:00 - 10:00</th>
      <td>Maths</td>
      <td>Maths</td>
      <td>Maths</td>
      <td>Maths</td>
      <td>Maths</td>
      <td>Maths</td>
      </tr>
      <tr>
      <th scope="row">11:00 - 12:00</th>
      <td>Science</td>
      <td>Science</td>
      <td>Science</td>
      <td>Science</td>
      <td>Science</td>
      <td>Science</td>
      </tr>
      <tr>
      <th scope="row">1:00 - 2:00</th>
      <td>Islamiyat</td>
      <td>Islamiyat</td>
      <td>Islamiyat</td>
      <td>Islamiyat</td>
      <td>Islamiyat</td>
      <td>Islamiyat</td>
      </tr>
      <tr>
      <th scope="row">2:00 - 3:00</th>
      <td>Pak Studies</td>
      <td>Pak Studies</td>
      <td>Pak Studies</td>
      <td>Pak Studies</td>
      <td>Pak Studies</td>
      <td>Pak Studies</td>
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
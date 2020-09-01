<?php $this->load->view('templates/header');?>
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
	position: relative;
	width: 100%;
	height: 100vh;
}

table {
  margin: 0 auto;
	width: 50vw;
	height: 50vh;
  padding-top: 100px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
    font-size: 1.6rem;
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
      <th scope="col">SR. NO.</th>
      <th scope="col" colspan="6">Description</th>
      <th scope="col">Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <th scope="col">1</th>
      <th scope="col" colspan="6">Monthly Tuition Fee (Full Fee Category)</th>
      <th scope="col">Rs. 3,200/-</th>
      </tr>
      <tr>
      <th scope="col">2</th>
      <th scope="col" colspan="6">Monthly Tuition Fee (Sibling Fee Category)</th>
      <th scope="col">Rs. 2,400/-</th>
      </tr>
      <tr>
      <th scope="col">3</th>
      <th scope="col" colspan="6">Admission Fee (At the time of admission for all student categories)</th>
      <th scope="col">Rs. 2,500/-</th>
      </tr>
      <tr>
      <th scope="col">4</th>
      <th scope="col" colspan="6">Security Deposit (Refundable)</th>
      <th scope="col">Rs. 2,500/-</th>
      </tr>
      <tr>
      <th scope="col">5</th>
      <th scope="col" colspan="6">	Annual Subscription Fee (Per Academic year for all student categories)</th>
      <th scope="col">Rs. 2,500/-</th>
      </tr>
      <tr>
      <th scope="col">6</th>
      <th scope="col" colspan="6">Admission Processing Fee (At the time of admission for all student categories)</th>
      <th scope="col">Rs. 200/-</th>
      </tr>
    </tbody>
    <tfoot>
      <!-- <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr> -->
      <!-- <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr> -->
  </table>
</div>
<?php $this->load->view('templates/footer');?>
# gitHubResp

<h4>first official project ever !</h4>

VMS or Visitor Management System is an utility for the 'gate' guards who have to maintain a bulky and a very-hard-to-maintain
record book for all the visitors that visit the college for their various reasons.

VMS till now contains the following features;
<ul>
 <li>Guard login page; case sensitive pass and userName fields.(SESSION powered :D)</li>
 <li>a profile page(raw as of now); sigin, logout or view data links here.</li>
 <li>added functionality for 'View all entries', 'View Active visitors', 'Date wise Visitor Info' and more to come.</li>
 <li>Photo capture System </li>
 <li>printing the visitor badge</li>
 <li>a brand new and attractive layout</li>
 </ul>
 

<h3>DataBase Connects :</h3>

The project uses MySQLi as of now, to integrate the connections use the following 'keys';

<h3>DataBase Name = db_new</h3> (stores visitor details and user details)
  <h4>Table = info_visitor</h4>
   
  
 <table>
  <tr>
  <th>N A M E</th>
  <th>T Y P E</th>
  <th>E X T R A</th>
  </tr>
  <tr>
  <td>Serial</td>
  <td>int(11)</td>
  <td>AUTO_INCREMENT</td>
  </tr>
   <tr>
  <td>Name</td>
  <td>char(50)</td>
  <td></td>
  </tr>
   <tr>
  <td>Contact</td>
  <td>bigint(10)</td>
  <td> </td>
  </tr>
   <tr>
  <td> Purpose</td>
  <td>varchar(100)</td>
  <td></td>
  </tr>
   <tr>
  <td>meetingTo</td>
  <td>varchar(100)</td>
  <td></td>
  </tr>
   <tr>
  <td>day</td>
  <td>varchar(50)</td>
  <td></td>
  </tr>
   <tr>
  <td>month</td>
  <td>int(2)</td>
  <td></td>
  </tr>
   <tr>
  <td>year</td>
  <td>int(4)</td>
  <td></td>
  </tr>
   <tr>
  <td>Date</td>
  <td>date</td>
  <td></td>
  </tr>
   <tr>
  <td>TimeIN</td>
  <td>time</td>
  <td></td>
  </tr>
   <tr>
  <td>ReceiptID</td>
  <td>int(6)</td>
  <td></td>
  </tr>
   <tr>
  <td>Status</td>
  <td>varchar(100)</td>
  <td></td>
  </tr>
   <tr>
  <td>TimeOUT</td>
  <td>time</td>
  <td></td>
  </tr>
   <tr>
  <td>registeredBy</td>
  <td>varchar(30)</td>
  <td></td>
  </tr>
   <tr>
  <td>loggedOutBy</td>
  <td>varchar(30)</td>
  <td></td>
  </tr>
   <tr>
  <td>imagePath</td>
  <td>varchar(100)</td>
  <td></td>
  </tr>
   
  </table>
  
  
 
<h4>Table Name = login_info</h4>
<table>
<tr>
<th>N A M E</th>
<th>T Y P E</th>
<th>E X T R A</th>
</tr>
<tr>
<td>SnoPrimary</td>
<td>int(11)</td>
<td>AUTO_INCREAMENT</td>
</tr>
<tr>
<td>userName</td>
<td>varchar(30)</td>
<td>latin1_general_cs</td>
</tr>
<tr>
<td>pass</td>
<td>varchar(30)</td>
<td>latin1_general_cs</td>
</tr>

</table>


Project Development <b style = "color:green">FINISHED SUCCESSFULLY</b>

<b>Thank you so much jhuckaby/</b>

BY ~ Aditya Saxena

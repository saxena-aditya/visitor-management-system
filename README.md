# PHP based-Visitor Management System

<p>VMS or Visitor Management System is an utility for the 'gate' guards who have to maintain a bulky and a very-hard-to-maintain record books for all the visitors that visit the college for their various reasons.</p>

<p>VMS has 4 sub- sections, Front Page (Home), Add Visitor (for adding new visitors), View Data (for getting the visitor details - all fields) and a Logged out Visitor page that shows Logged out visitor data for the present day!</p>  

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
  <td>Comment</td>
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
  <tr>
  <td>StudentName</td>
  <td>varchar(40)</td>
  <td></td>
  </tr>
  <tr>
  <td>courseYear</td>
  <td>int(1)</td>
  <td></td>
  </tr> 
  <tr>
  <td>Hostel</td>
  <td>varchar(80)</td>
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


Project Development <b>FINISHED SUCCESSFULLY</b>

<b>Thank you so much jhuckaby/ for the webcam plugin!</b>

BY ~ Aditya Saxena

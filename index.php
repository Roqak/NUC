<?php
$host = "localhost";
$username = "phpmyadmin";
$password = "akinkunmi";
$db = "nuc";
$conn = mysqli_connect($host,$username,$password,$db);
if(!$conn){
    echo "Error connecting to the database";
}
if(isset($_GET['token'])){
    $token = $_GET['token'];
    echo $token;
    // $query = mysqli_query($conn,"SELECT * FROM `token` WHERE `code`='$token' AND keywords LIKE '%$search_each%'");
    $query = mysqli_query($conn,"SELECT * FROM `token` WHERE code LIKE '%$token%' LIMIT 1");

    
    if(mysqli_num_rows($query)>0)
    {
        $row = mysqli_fetch_assoc($query);
        $university = $row['university'];
        // print_r($university);
        $query2 = mysqli_query($conn,"SELECT * FROM `university_tb` WHERE `Name_of_University` LIKE '%$university%'");
    
        if(mysqli_num_rows($query2)>0)
        {
            $uni = mysqli_fetch_assoc($query2);
            print_r($uni['Name_of_University']);
            //get all the data and set as values for all fields
            // $uni['']
        }
        else
        {
            echo "\nError!!!!!";
        }
    }
    else
    {
        echo "INVALID TOKEN";
    }
 }
 $update_tb = "UPDATE
 `university_tb`
SET
 `Name_of_University` = '$_POST[university_name]',
 `Year_ of_Establishment` = '$_POST[yo_establishment]',
 `Ownership` = '$_POST[ownership]',
 `Name_of_Officer_authorised_by_the_VC` = '$_POST[name_of_officer]',
 `Rank_of_Officer_authorised_by_the_VC` = '$_POST[rank_of_officer]',
 `Telephone_Number_of_Officer_authorised_by_the_VC` = '$_POST[phone_number_of_officer]',
 `Email_Address_of_Officer_authorised_by_the_VC` = '$_POST[email_of_officer]',
 `Name_of_Pro_Chancellor` = '$_POST[name_of_prochancellor]',
 `Gender_of_Pro_Chancellor` = '$_POST[gender_of_prochancellor]',
 `Telephone_number_of_Pro_Chancellor` = '$_POST[phone_number_of_prochanellor]',
 `Email_Address_of_Pro_Chancellor` = '$_POST[email_of_prochancellor]',
 `Name_of_Vice_Chancellor` = '$_POST[name_of_vicechancellor]',
 `Gender_of_Vice_Chancellor` = '$_POST[gender_of_vicechancellor]',
 `Telephone_number_of_Vice_Chancellor` = '$_POST[phone_number_of_vicechancellor]',
 `Email_Address_of_Vice_Chancellor` = '$_POST[email_of_vicechancellor]',
 `Name_of_Registrar` = '$_POST[name_of_registrar]',
 `Gender_of_Registrar` = '$_POST[gender_of_registrar]',
 `Telephone_number_of_Registrar` = '$_POST[phone_number_of_registrar]',
 `Email_Address_of_Registrar` = '$_POST[email_of_registrar]',
 `Name_of_Bursar` = '$_POST[name_of_bursar]',
 `Gender_of_Bursar` = '$_POST[gender_of_bursar]',
 `Telephone_number_of_Bursar` = '$_POST[phone_number_of_bursar]',
 `Email_Address_of_Bursar` = '$_POST[email_of_bursar]',
 `Name_of_University_Librarian` = '$_POST[name_of_librarian]',
 `Gender_of_University_Librarian` = '$_POST[gender_of_librarian]',
 `Telephone_number_of_University_Librarian` = '$_POST[phone_number_of_librarian]',
 `Email_Address_of_University_Librarian` = '$_POST[email_of_librarian]',
 `Name_of_Director_of_Academic_Planning` = '$_POST[name_of_director_of_academic_planning]',
 `Gender_of_Director_of_Academic_Planning` = '$_POST[gender_of_director_of_academic_planning]',
 `Telephone_number_of_Director_of_Academic_Planning` = '$_POST[phone_number_of_director_of_academic_planning]',
 `Email_Address_of_Director_of_Academic_Planning` = '$_POST[email_of_director_of_academic_planning]',
 `Total_number_of_academic_programmes_in_the_university_(2018)` = '$_POST[num_of_academic_programmes]',
 `Number_With_Full_Accreditation_(2018)` = '$_POST[num_with_full_acreditation]',
 `List_of_Academic_Programmes_in_the_university_by_Faculty` = '$_POST[academic_programmes_by_facaulty]',
 `Number_of_Male_New_Entrants_Undergraduate_(UTME)` = '$_POST[num_of_new_male_undergraduates_utme]',
 `Number_of_Male_New_Entrants_Undergraduate_(Direct_Entry)` = '$_POST[num_of_male_new_undergraduates_direct_entry]',
 `Number_of_Female_New_Entrants_Undergraduate_(UTME)` = '$_POST[num_of_female_new_undergraduates_utme]',
 `Number_of_Female_New_Entrants_Undergraduate_(Direct_Entry)` = '$_POST[num_of_female_new_undergraduates_direct_entry]',
 `Male_Undergraduate_Enrolment_(2018)` = '$_POST[male_undergraduate_enrollment]',
 `Female_Undergraduate_Enrolment_(2018)` = '$_POST[female_undergraduate_enrollment]',
 `Total_Undergraduate_Enrolment_(Male_and_Female)_(2018)` = '$_POST[total_undergraduate_enrollment]',
 `Male_Postgraduate_Enrolment_(2018)` = '$_POST[male_postgraduate_enrollment]',
 `Female_Postgraduate_Enrolment_(2018)` = '$_POST[female_postgraduate_enrollment]',
 `Total_Postgraduate_Enrolment_(2018)` = '$_POST[total_postgraduate_enrollment]',
 `Enrolment_in_Masters_Programmes_(Male)` = '$_POST[enrollment_masters_male]',
 `Enrolment in Masters Programmes_(Female)` = '$_POST[enrollment_masters_female]',
 `Total_enrolment_in_Masters_Programmes` = '$_POST[enrollment_masters_total]',
 `Enrolment_in_Postgraduate_Diploma_Programmes_(Male)` = '$_POST[male_postgraduate_diploma_enrollment]',
 `Enrolment in Postgraduate Diploma Programmes_(Female)` = '$_POST[female_postgraduate_diploma_enrollment]',
 `Total_enrolment_in_Postgraduate_Diploma_programmes` = '$_POST[total_postgraduate_diploma_enrollment]',
 `Enrolment_in_PhD_programmes_(Male)` = '$_POST[enrollment_phd_male]',
 `Enrolment_in_PhD_programmes_(Female)` = '$_POST[enrollment_phd_female]',
 `Total_enrolment_in_PhD_programmes` = '$_POST[enrollment_phd_total]',
 `Percentage_students_in_Science_enrolment_in_the_university_(2018` = '$_POST[percentage_science_students]',
 `Percentage_Female_Students_in_Science_in_the_university_(2018)` = '$_POST[percentage_female_science_students]',
 `Percentage_of_special_needs_students_in_the_overall_student_popu` = '$_POST[percentage_special_need_students]',
 `Percentage_Foreign_Students_(2018)` = '$_POST[percentage_foreign_students]',
 `Percentage_of_students_from_outside_the_ geopolitical_zonal_loca` = '$_POST[percentage_students_outside_zone]',
 `Total_number_of_Graduates_(2018)` = '$_POST[number_of_graduates]',
 `Total_number_of_students_in_First_Class_(2018)` = '$_POST[number_of_firstclass]',
 `Percentage_of_female_students_in_First_Class_(2018)` = '$_POST[percentage_of_female_firstclass]',
 `Percentage_of_science_graduates_(2018)` = '$_POST[percentage_of_science_graduates]',
 `Number_of_Male_Teaching_Staff_(2018)` = '$_POST[number_male_teaching_staff]',
 `Number_of_Female_Teaching_Staff_(2018)` = '$_POST[number_female_teaching_staff]',
 `Total_Teaching_Staff_(2018)` = '$_POST[total_teaching_staff]',
 `Number_of_Male_Non_Teaching_Staff_(2018)` = '$_POST[number_male_nonteaching_staff]',
 `Number_of_Female_Non_Teaching_Staff_(2018)` = '$_POST[number_female_nonteaching_staff]',
 `Total_Non_Teaching_Staff_(2018)` = '$_POST[total_nonteaching_staff]',
 `Total_Male_Professors_(2018)` = '$_POST[number_male_proffessors]',
 `Total_Female_Professors_(2018)` = '$_POST[number_female_proffessors]',
 `Total_Number_of_Professors_(2018)` = '$_POST[total_proffessors]',
 `Percentage_Foreign_Staff` = '$_POST[percentage_foreign_staff]',
 `Percentage_of_staff_from_outside_the_geopolitical_zonal(2018)` = '$_POST[percentage_staff_outside_zone]',
 `Ratio_of_PC_to_Students_(2018)` = '$_POST[ratio_pc_to_student]',
 `Number_of_Hours_Wifi_Available_per_day_(2018)` = '$_POST[wifi_hours_per_day]',
 `Percentage_of_staff_who_use_technology_to support_their_curricul` = '$_POST[percentage_staff_technology]',
 `Percentage_of_students_who_graduated_when_due_(2018)` = '$_POST[percentage_students_graduated_when_due]',
 `Average_for_issuance_of_academic_transcript_from_application` = '$_POST[time_weeks_academic_transcript]',
 `Average_turnaround_mails_initiated_within_the_university_(2018)` = '$_POST[average_days_mail_within_university]',
 `Average_turnaround_mails_initiated_outside_the_university_(20` = '$_POST[average_days_mail_outside_university]',
 `Number_of_months_of_disruption_to_academic_calendar_(2018)` = '$_POST[months_disruption_academic_calendar]',
 `Total_Cost_in_millions_of_Naira_of_Running_the_University_(2018)` = '$_POST[cost_running_university]',
 `Percentage_of_Personnel_Cost_provided_by_the_Proprietor_(2018)` = '$_POST[percentage_cost_proprietor]',
 `Annual_Undergraduate_Tuition_Fee_SCIENCE_COURSES_(2018)` = '$_POST[annual_undergraduate_fee_science]',
 `Annual_Undergraduate_Tuition Fee_NONSCIENCE_COURSES_(2018)` = '$_POST[annual_undergraduate_fee_nonscience]',
 `Average_Annual_Undergraduate_charges_(2018)` = '$_POST[average_annual_undergraduate_charges]',
 `Total_undergraduate_fees_SCIENCE_STUDENTS_(2018)` = '$_POST[total_undergraduate_fee_nonscience]',
 `Total_undergraduate_fees_NONSCIENCE_STUDENTS_(2018)` = '$_POST[percentage_students_scholarship]',
 `Percentage_of_students_on_bursaries_(2018)` = '$_POST[percentage_students_scholarship]',
 `Total_Capital_Grants_released_to_the_University_(2018)` = '$_POST[total_grants_to_university]',
 `Percentage_of_capital_grant_released_(2018)` = '$_POST[percentage_grant_budget]',
 `Total_Overhead_Grant_released_to_the_University_(2018)` = '$_POST[total_overhead_grant_university]',
 `Percentage_of_Overhead_Grant_released_relative_budget_(2018)` = '$_POST[percentage_overhead_grant_budget]',
 `Total_Personnel_Cost_Grant_released_to_the_University_(2018)` = '$_POST[total_personnel_grant_university]',
 `Percentage_of_Personnel_Cost_Grant_released_(2018)` = '$_POST[percentage_personnel_grant_budget]',
 `TOTAL_cost_of_running_the_university_in_2018` = '$_POST[total_cost_running_university]',
 `Average_unit_cost_for_training_undergraduate_in_the_university_(` = '$_POST[average_cost_training_undergraduate]',
 `Percentage_of_total_ cost_of_running_the_university_in_2018_fund` = '$_POST[percentage_cost_university_igr]'
WHERE
 `Name_of_University` like '%$uni[Name_of_University]%'";
 $update_table = mysqli_query($conn,$update_tb);
 if(!$update_table){
     echo "Hey!! Something is wrong";
 }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap MultiStep Form</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-11">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">University Staff Details</li>
                <li>University Programmes Details</li>
                <li>General Student/Staff Details</li>
                <li>Account Setup</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">School Details</h2>
                <!-- <h3 class="fs-subtitle">Tell us something more about you</h3> -->
                <div class="row">
                    <div class="col-md-6">
                                <label>Name of University</label><input type="text" value="<?php echo $uni['Name_of_University'];?>" name="university_name" placeholder="Name of University" required />
                        <label>Year of Establishment</label><input type="text" value="<? echo $uni['Year_ of_Establishment'];?>" name="yo_establishment" placeholder="Year of Establishment" required/>
                        <label>Ownership</label><input type="text" value="<? echo $uni['Ownership'];?>"  name="ownership" placeholder="Ownership" required/>
                        <label>Name of Officer</label><input type="text"  value="<? echo $uni['Name_of_Officer_authorised_by_the_VC'];?>" name="name_of_officer" placeholder="Name of Officer" required/>
                        <label>Rank of Officer</label><input type="text" value="<? echo $uni['Rank_of_Officer_authorised_by_the_VC'];?>"  name="rank_of_officer" placeholder="Rank of Officer" required/>
                        <label>Phone Number of Officer</label><input type="text" value="<? echo $uni['Telephone_Number_of_Officer_authorised_by_the_VC'];?>"  name="phone_number_of_officer" placeholder="Phone Number of Officer" required/>
                        <label>Email of Officer</label><input type="text" value="<? echo $uni['Email_Address_of_Officer_authorised_by_the_VC'];?>"  name="email_of_officer" placeholder="Email of Officer" required/>
                        <label>Name of Pro-Chancellor</label><input type="text"  value="<? echo $uni['Name_of_Pro_Chancellor'];?>" name="name_of_prochancellor" placeholder="Name of Pro-Chancellor" required/>
                        <label>Gender of Pro-Chancellor</label><input type="text" value="<? echo $uni['Gender_of_Pro_Chancellor'];?>"  name="gender_of_prochancellor" placeholder="Gender of Pro-Chancellor" required/>
                        <label>Phone Number of Pro-Chancellor</label><input type="text" value="<? echo $uni['Telephone_number_of_Pro_Chancellor'];?>"  name="phone_number_of_prochanellor" placeholder="Phone Number of Pro-Chancellor" required/>
                        <label>Email of Pro-Chancellor</label><input type="text" value="<? echo $uni['Email_Address_of_Pro_Chancellor'];?>"  name="email_of_prochancellor" placeholder="Email of Pro-Chancellor" required/>
                        <label>Name of Vice-Chancellor</label><input type="text" value="<? echo $uni['Name_of_Vice_Chancellor'];?>"  name="name_of_vicechancellor" placeholder="Name of Vice-Chancellor" required/>
                        <label>Gender of Vice-Chancellor</label><input type="text" value="<? echo $uni['Gender_of_Vice_Chancellor'];?>"  name="gender_of_vicechancellor" placeholder="Gender of Vice-Chancellor" required/>
                        <label>Phone Number of Vice-Chancellor</label><input type="text" value="<? echo $uni['Telephone_number_of_Vice_Chancellor'];?>"  name="phone_number_of_vicechancellor" placeholder="Phone Number of Vice-Chancellor" required/>
                        <label>Email of Vice-Chancellor</label><input type="text"  value="<? echo $uni['Email_Address_of_Vice_Chancellor'];?>" name="email_of_vicechancellor" placeholder="Email of Vice-Chancellor" required/>
                        <label>Name of Registrar</label><input type="text" value="<? echo $uni['Name_of_Registrar'];?>"  name="name_of_registrar" placeholder="Name of Registrar" required/>
                    </div>
                    <div class="col-md-6">
                        
                        <label>Gender of Registrar</label><input type="text" value="<? echo $uni['Gender_of_Registrar'];?>" name="gender_of_registrar" placeholder="Gender of Registrar" required/>
                        <label>Phone Number of Registrar</label><input type="text" value="<? echo $uni['Telephone_number_of_Registrar'];?>"  name="phone_number_of_registrar" placeholder="Phone Number of Registrar" required/>
                        <label>Email of Registrar</label><input type="text" value="<? echo $uni['Email_Address_of_Registrar'];?>"  name="email_of_registrar" placeholder="Email of Registrar" required/>
                        <label>Name of Bursar</label><input type="text" value="<? echo $uni['Name_of_Bursar'];?>"  name="name_of_bursar" placeholder="Name of Bursar" required/>
                        <label>Gender of Bursar</label><input type="text" value="<? echo $uni['Gender_of_Bursar'];?>"  name="gender_of_bursar" placeholder="Gender of Bursar" required/>
                        <label>Phone Number of Bursar</label><input type="text" value="<? echo $uni['Telephone_number_of_Bursar'];?>"  name="phone_number_of_bursar" placeholder="Phone Number of Bursar" required/>
                        <label>Email of Bursar</label><input type="text" value="<? echo $uni['Email_Address_of_Bursar'];?>"  name="email_of_bursar" placeholder="Email of Bursar" required/>
                        <!-- University Librarian -->
                        <label>Name of University Librarian</label><input type="text" value="<? echo $uni['Name_of_University_Librarian'];?>"  name="name_of_librarian" placeholder="Name of Librarian" required/>
                        <label>Gender of University Librarian</label><input type="text" value="<? echo $uni['Gender_of_University_Librarian'];?>"  name="gender_of_librarian" placeholder="Gender of Librarian" required/>
                        <label>Phone Number of University Librarian</label><input type="text" value="<? echo $uni['Telephone_number_of_University_Librarian'];?>"  name="phone_number_of_librarian" placeholder="Phone Number of Librarian" required/>
                        <label>Email of University Librarian</label><input type="text" value="<? echo $uni['Email_Address_of_University_Librarian'];?>"  name="email_of_librarian" placeholder="Email of Librarian" required/>
                        <!-- Director of Academic Planning -->
                        <label>Name of Director of Academic Planning</label><input type="text" value="<? echo $uni['Name_of_Director_of_Academic_Planning'];?>"  name="name_of_director_of_academic_planning" placeholder="Name of Director of Academic Planning" required/>
                        <label>Gender of Director of Academic Planning</label><input type="text" value="<? echo $uni['Gender_of_Director_of_Academic_Planning'];?>"  name="gender_of_director_of_academic_planning" placeholder="Gender of Director of Academic Planning" required/>
                        <label>Phone Number of Director of Academic Planning</label><input type="text" value="<? echo $uni['Telephone_number_of_Director_of_Academic_Planning'];?>"  name="phone_number_of_director_of_academic_planning" placeholder="Phone Number of Director of Academic Planning" required/>
                        <label>Email of Director of Academic Planning</label><input type="text" value="<? echo $uni['Email_Address_of_Director_of_Academic_Planning'];?>"  name="email_of_director_of_academic_planning" placeholder="Email of Director of Academic Planning" required/>
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">University Programmes Details</h2>
                <!-- <h3 class="fs-subtitle">Your presence on the social network</h3> -->
                <div class="row">
                    <div class="col-md-6">
                        <label>Number of Academic Programmes(2018)</label><input type="text" value="<? echo $uni[''];?>"   name="num_of_academic_programmes" placeholder="Number of Academic Programmes(2018)" required/>
                        <label>Number with Full Acreditation</label><input type="text" value="<? echo $uni[''];?>"  name="num_with_full_acreditation" placeholder="Number with Full Acreditation" required/>
                        <label>List of Academic Programmes by Facaulty</label><textarea  value="<? echo $uni[''];?>"  rows="8" type="text" name="academic_programmes_by_facaulty" placeholder="List of Academic Programmes by Facaulty" required/></textarea>
                        <label>Number of Male New Entrants Undergraduate (UTME)</label><input  value="<? echo $uni[''];?>"  type="text" name="num_of_new_male_undergraduates_utme" placeholder="Number of Male New Entrants Undergraduate (UTME)" required/>
                        <label>Number of Male New Entrants Undergraduate (Direct Entry)</label><input value="<? echo $uni[''];?>"  type="text" name="num_of_male_new_undergraduates_direct_entry" placeholder="Number of Male New Entrants Undergraduate (Direct Entry)" required/>
                        <label>Number of Female New Entrants Undergraduate (UTME)</label><input type="text" value="<? echo $uni[''];?>"  name="num_of_female_new_undergraduates_utme" placeholder="Number of Female New Entrants Undergraduate (UTME)" required/>
                        <label>Number of Female New Entrants Undergraduate (Direct Entry)</label><input type="text" value="<? echo $uni[''];?>"  name="num_of_female_new_undergraduates_direct_entry" placeholder="Number of Female New Entrants Undergraduate (Direct Entry)" required/>
                        <label>Male Undergraduate Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="male_undergraduate_enrollment" placeholder="Male Undergraduate Enrollment(2018)" required/>
                        <label>Female Undergraduate Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="female_undergraduate_enrollment" placeholder="Female Undergraduate Enrollment(2018)" required/>
                        <label>Total Undergraduate Enrollment (Male and Female)(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_undergraduate_enrollment" placeholder="Total Undergraduate Enrollment (Male and Female)(2018)" required/>
                        <!-- Post Graduate -->
                    </div>
                    <div class="col-md-6">
                                <label>Male Postgraduate Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="male_postgraduate_enrollment" placeholder="Male Postgraduate Enrollment(2018)" required/>
                        <label>Female Postgraduate Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="female_postgraduate_enrollment" placeholder="Female Postgraduate Enrollment(2018)" required/>
                        <label>Total Postgraduate Enrollment (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_postgraduate_enrollment" placeholder="Total Postgraduate Enrollment (2018)" required/>
                        <label>Enrollment in Masters Programme (Male)</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_masters_male" placeholder="Enrollment in Masters Programme (Male)" required/>
                        <label>Enrollment in Masters Programme (Female)</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_masters_female" placeholder="Enrollment in Masters Programme (Female)" required/>
                        <label>Total Enrollment in Masters Programme</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_masters_total" placeholder="Total Enrollment in Masters Programme" required/>
                        <!-- Postgraduate Diploma Programme -->
                        <label>Male Postgraduate Diploma Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="male_postgraduate_diploma_enrollment" placeholder="Male Postgraduate Diploma Enrollment(2018)" required/>
                        <label>Female Postgraduate Diploma Enrollment(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="female_postgraduate_diploma_enrollment" placeholder="Female Postgraduate Diploma Enrollment(2018)" required/>
                        <label>Total Postgraduate Diploma Enrollment (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_postgraduate_diploma_enrollment" placeholder="Total Postgraduate Diploma Enrollment (2018)" required/>
                        <!-- PhD Programme -->
                        <label>Enrollment in PhD Programme (Male)</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_phd_male" placeholder="Enrollment in PhD Programme (Male)" required/>
                        <label>Enrollment in PhD Programme (Female)</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_phd_female" placeholder="Enrollment in PhD Programme (Female)" required/>
                        <label>Total Enrollment in PhD Programme</label><input type="text" value="<? echo $uni[''];?>"  name="enrollment_phd_total" placeholder="Total Enrollment in PhD Programme" required/>
                    </div>
                </div>


                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">General Student/Staff Details</h2>
                <!-- <h3 class="fs-subtitle">Fill in your credentials</h3> -->
                <div class="row">
                    <div class="col-md-6">
                        <label>Percentage Science Students in University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_science_students" placeholder="Percentage Science Students in University" required/>
                        <label>Percentage Female Science Students in University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_female_science_students" placeholder="Percentage Female Science Students in University" required/>
                        <label>Percentage of Special Need Students in University e.g blind, deaf etc.</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_special_need_students" placeholder="Percentage of Special Need Students in University" required/>
                        <label>Percentage of Foreign (Non-Nigerian) Students (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_foreign_students" placeholder="Percentage of Foreign (Non-Nigerian) Students" required/>
                        <label>Percentage Students Outside of Geopolitical Zone of University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_students_outside_zone" placeholder="Percentage Students Outside of Geopolitical Zone of University (2018)" required/>
                        <label>Total Number of Graduates (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_of_graduates" placeholder="Total Number of Graduates (2018)" required/>
                        <label>Total Number of First Class (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_of_firstclass" placeholder="Total Number of First Class (2018)" required/>
                        <label>Percentage of Female First Class Students (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_of_female_firstclass" placeholder="Percentage of Female First Class (2018)" required/>
                        <label>Percentage of Science Graduates (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_of_science_graduates" placeholder="Percentage of Science Graduates (2018)" required/>
                        <label>Number of Male Teaching Staff (2018)</label><input type="text"  value="<? echo $uni[''];?>" name="number_male_teaching_staff" placeholder="Number of Male Teaching Staff (2018)" required/>
                        <label>Number of Female Teaching Staff (2018)</label><input type="text"  value="<? echo $uni[''];?>" name="number_female_teaching_staff" placeholder="Number of Female Teaching Staff (2018)" required/>
                        <label>Total Teaching Staff (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_teaching_staff" placeholder="Total Teaching Staff (2018)" required/>
                        <label>Number of Male Non-Teaching Staff (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_male_nonteaching_staff" placeholder="Number of Male Non-Teaching Staff (2018)" required/>
                        <label>Number of Female Non-Teaching Staff (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_female_nonteaching_staff" placeholder="Number of Female Non-Teaching Staff (2018)" required/>
                        <label>Total Non-Teaching Staff (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_nonteaching_staff" placeholder="Total Non-Teaching Staff (2018)" required/>
                    </div>
                    <div class="col-md-6">
                                <!-- Proffessors -->
                        <label>Number of Male Proffessors (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_male_proffessors" placeholder="Number of Male Proffessors (2018)" required/>
                        <label>Number of Female Proffessors (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="number_female_proffessors" placeholder="Number of Female Proffessors (2018)" required/>
                        <label>Total Proffessors (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_proffessors" placeholder="Total Proffessors (2018)" required/>
                        <label>Percentage of Foreign (Non-Nigerian) Staff (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_foreign_staff" placeholder="Percentage of Foreign (Non-Nigerian) Staff" required/>
                        <label>Percentage Staff Outside of Geopolitical Zone of University (2018)</label><input type="text"  value="<? echo $uni[''];?>" name="percentage_staff_outside_zone" placeholder="Percentage Staff Outside of Geopolitical Zone of University (2018)" required/>
                        <label>Ratio of PC to Student (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="ratio_pc_to_student" placeholder="Ratio of PC to Student (2018)" required/>
                        <label>Number of Hours Wifi Available per day (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="wifi_hours_per_day" placeholder="Number of Hours Wifi Available per day (2018)" required/>
                        <label>Percentage staff who use technology for at least 60% of their curriculum delivery</label><input type="text"  value="<? echo $uni[''];?>" name="percentage_staff_technology" placeholder="Percentage staff who use technology for at least 60% of their curriculum delivery" required/>
                        <label>Percentage of Students Who Graduated When Due (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_students_graduated_when_due" placeholder="Percentage of Students Who Graduated When Due (2018)" required/>
                        <label>Average time (in weeks) for issuance of academic transcript(2018)</label><input type="text" value="<? echo $uni[''];?>"  name="time_weeks_academic_transcript" placeholder="Average time (in weeks) for issuance of academic transcript(2018)" required/>
                        <label>Average turnaround time of mails (in days) initiated within the university (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="average_days_mail_within_university" placeholder="Average turnaround time of mails (in days) initiated within the university (2018)" required/>
                        <label>Average turnaround time of mails (in days) initiated outside the university (2018)</label><input type="text"  value="<? echo $uni[''];?>" name="average_days_mail_outside_university" placeholder="Average turnaround time of mails (in days) initiated outside the university (2018)" required/> 
                        <label>Number of months of disruption to academic calendar (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="months_disruption_academic_calendar" placeholder="Number of months of disruption to academic calendar (2018) " required/>
                        <label>Total Cost in millions of Naira of Running the University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="cost_running_university" placeholder="Total Cost in millions of Naira of Running the University (2018)" required/>
                        <label>Percentage of Personnel Cost provided by the Proprietor (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_cost_proprietor" placeholder="Percentage of Personnel Cost provided by the Proprietor (2018)" required/>
                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>            </fieldset>

            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <!-- <h3 class="fs-subtitle">Fill in your credentials</h3> -->
                <div class="row">
                    <div class="col-md-6">
                        <label>Annual Undergraduate Tuition Fee -SCIENCE COURSES (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="annual_undergraduate_fee_science" placeholder="Annual Undergraduate Tuition Fee -SCIENCE COURSES (2018)" required/>
                        <label>Annual Undergraduate Tuition Fee -NON-SCIENCE COURSES (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="annual_undergraduate_fee_nonscience" placeholder="Annual Undergraduate Tuition Fee NON -SCIENCE COURSES (2018)" required/>
                        <label>Average Annual Undergraduate other charges (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="average_annual_undergraduate_charges" placeholder="Average Annual Undergraduate other charges (2018)" required/>
                        <label>Total Undergraduate Fee per Session(Tuition + Others) -SCIENCE COURSES (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_undergraduate_fee_nonscience" placeholder="Total Undergraduate Fee per Session(Tuition + Others) -SCIENCE COURSES (2018)" required/>
                        <label>Total Undergraduate Fee per Session(Tuition + Others) -NON-SCIENCE COURSES (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_undergraduate_fee_nonscience" placeholder="Total Undergraduate Fee per Session(Tuition + Others) -NON-SCIENCE COURSES (2018)" required/>
                        <label>Percentage of students on scholarships and loan schemes (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_students_scholarship" placeholder="Percentage of students on scholarships and loan schemes (2018)" required/>
                        <label>Total Capital Grants released to the University (2018) in MILLIONS of Naira</label><input type="text" value="<? echo $uni[''];?>"  name="total_grants_to_university" placeholder="Total Capital Grants released to the University (2018) in MILLIONS of Naira" required/>
                        <label>Percentage of capital grant released relative to approved budget (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_grant_budget" placeholder="Percentage of capital grant released relative to approved budget (2018)" required/>
                        <label>Total Overhead Grant released to the University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_overhead_grant_university" placeholder="Total Overhead Grant released to the University (2018)" required/>
                    </div>
                    <div class="col-md-6">
                        <label>Percentage of Overhead Grant released relative to approved budget (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_overhead_grant_budget" placeholder="Percentage of Overhead Grant released relative to approved budget (2018)" required/>
                        <label>Total Personnel Cost Grant released to the University (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="total_personnel_grant_university" placeholder="Total Personnel Cost Grant released to the University (2018)" required/>
                        <label>Percentage of Personnel Cost Grant released relative to approved budget (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_personnel_grant_budget" placeholder="Percentage of Personnel Cost Grant released relative to approved budget (2018)" required/>
                        <label>TOTAL cost of running the university in 2018</label><input type="text" value="<? echo $uni[''];?>"  name="total_cost_running_university" placeholder="TOTAL cost of running the university in 2018" required/>
                        <label>Average unit cost for training an undergraduate in the university (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="average_cost_training_undergraduate" placeholder="TOTAL cost of running the university in 2018" required/>
                        <label>Percentage of total cost of running the university funded from Internally-Generated Revenue (IGR) (2018)</label><input type="text" value="<? echo $uni[''];?>"  name="percentage_cost_university_igr" placeholder="Percentage of total cost of running the university funded from Internally-Generated Revenue (IGR) (2018)" required/>

                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
        <!-- <div class="dme_link">
            <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
        </div> -->
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>

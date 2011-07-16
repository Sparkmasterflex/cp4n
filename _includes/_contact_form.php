<div id="contactForm" class="clearfix">    
  <form action="_includes/form_mail.php" method="post">
    <label>First and Last Name: *<br />
      <input type="text" name=name required />
    </label>
    <label>Email: *<br />
      <input type="text" name=email required />
    </label>
    <label>Phone Number: <br />
      <input type="text" name=phone />
    </label>
    <label>Location:
      <input type="text" name=location />
      <sub>Example: Mechanicsburg</sub>
    </label>
    <sub>* indicates a required field</sub>
    <input type="submit" name=Submit />
  </form>
</div>